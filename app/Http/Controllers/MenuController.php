<?php

namespace App\Http\Controllers;
use App\Menu;
use Illuminate\Http\Request;

class CategogyController extends Controller
{
    private $data = [];

    public function __construct()
    {
        $this->data['menu_active'] = 'menu';
    }
    public function getList()
    {
        $modelMenu = new Menu();
        $menus = $modelMenu->getList();
        $this->data['list'] = $menus;
        return view('admin/menu/list',$this->data);
    }

    public function getAdd()
    {
        $this->data['menu_active'] = 'menu-add';
        return view('admin/menu/add',$this->data);
    }

    public function postAdd(Request $request)
    {

        $this->validate($request,
            [
                "name" => "required|max:50",
            ]
        );
        $input = $request->all();
        $modelMenu = new Menu();
        $modelMenu->insertMenu($input);

        $request->session()->flash('message_success', 'Thêm mới menu thành công');
        return redirect(route('list_menu'));
    }

    public function delete(Request $request)
    {
        $request->validate([
            'id' => 'required',
        ]);
        $id = (int)$request->input('id');
        $modelMenu = new Menu();
        $menu = $modelMenu->find($id);
        if(!$menu){
            return response()->json(['error' => 1, 'message' => 'Menu không tồn tại']);
        }
        $modelMenu->deleteMenu($id);
        return response()->json(['error' => 0, 'message' => 'Xóa menu thành công']);
    }

    public function getEdit($id)
    {
        $modelMenu = new Menu();
        $menu = $modelMenu->find($id);
        if(!$menu){
            return abort(404);
        }
        $this->data['menu'] = $menu;
        return view('admin/menu/edit',$this->data);
    }

    public function postEdit(Request $request, $id)
    {
        $this->validate($request,
            [
                "name" => "required|max:50",
            ]
        );
        $modelMenu = new Menu();
        $menu = $modelMenu->find($id);
        if(!$menu){
            return abort(404);
        }
        $input = $request->all();
        $modelMenu->editMenu($menu, $input);
        $request->session()->flash('message_success', 'Cập nhật menu thành công');
        return redirect(route('list_menu'));
    }
}