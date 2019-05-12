<?php

namespace App\Http\Controllers;
use App\Menu;
use App\SubMenu;
use Illuminate\Http\Request;

class SubMenuController extends Controller
{
    private $data = [];

    public function __construct()
    {
        $this->data['menu_active'] = 'sub-menu';
    }
    public function getList()
    {
        $modelSubMenu = new SubMenu();
        $subMenus = $modelSubMenu->getList();
        $this->data['list'] = $subMenus;
        return view('admin/sub-menu/list',$this->data);
    }

    public function getAdd()
    {
        $modelMenu = new Menu();
        $menuOptions = $modelMenu->menuOptions();
        $this->data['menu_active'] = 'sub-menu-add';
        $this->data['menuOptions'] = $menuOptions;
        return view('admin/sub-menu/add',$this->data);
    }

    public function postAdd(Request $request)
    {

        $this->validate($request,
            [
                "name" => "required|max:50",
                "category_id" => "required",
            ]
        );
        $input = $request->all();
        $modelSubMenu = new SubMenu();
        $modelSubMenu->insertSubMenu($input);

        $request->session()->flash('message_success', 'Thêm mới sub menu thành công');
        return redirect(route('list_sub_menu'));
    }

    public function delete(Request $request)
    {
        $request->validate([
            'id' => 'required',
        ]);
        $id = (int)$request->input('id');
        $modelSubMenu = new SubMenu();
        $subMenu = $modelSubMenu->find($id);
        if(!$subMenu){
            return response()->json(['error' => 1, 'message' => 'Sub menu không tồn tại']);
        }
        $modelSubMenu->deleteSubMenu($id);
        return response()->json(['error' => 0, 'message' => 'Xóa sub menu thành công']);
    }

    public function getEdit($id)
    {
        $modelMenu = new Menu();
        $menuOptions = $modelMenu->menuOptions();
        $modelSubMenu = new SubMenu();
        $subMenu = $modelSubMenu->find($id);
        if(!$subMenu){
            return abort(404);
        }
        $this->data['subMenu'] = $subMenu;
        $this->data['menuOptions'] = $menuOptions;
        return view('admin/sub-menu/edit',$this->data);
    }

    public function postEdit(Request $request, $id)
    {
        $this->validate($request,
            [
                "name" => "required|max:50",
                "category_id" => "required",
            ]
        );
        $modelSubMenu = new SubMenu();
        $subMenu = $modelSubMenu->find($id);
        if(!$subMenu){
            return abort(404);
        }
        $input = $request->all();
        $modelSubMenu->editSubMenu($subMenu, $input);
        $request->session()->flash('message_success', 'Cập nhật sub menu thành công');
        return redirect(route('list_sub_menu'));
    }
}