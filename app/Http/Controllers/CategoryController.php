<?php

namespace App\Http\Controllers;
use App\Models\Categogy;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private $data = [];

    public function __construct()
    {
        $this->data['menu_active'] = 'menu';
    }
    public function getList()
    {
        $modelCategogy = new Categogy();
        $category = $modelCategogy->getList();
        $this->data['list'] = $category;
        return view('admin/category/list',$this->data);
    }

    public function getAdd()
    {
        $this->data['menu_active'] = 'menu-add';
        return view('admin/category/add',$this->data);
    }

    public function postAdd(Request $request)
    {

        $this->validate($request,
            [
                "name" => "required|max:50",
            ]
        );
        $input = $request->all();
        $modelCategogy = new Categogy();
        $modelCategogy->insertCategory($input);

        $request->session()->flash('message_success', 'Thêm mới menu thành công');
        return redirect(route('list_menu'));
    }

    public function delete(Request $request)
    {
        $request->validate([
            'id' => 'required',
        ]);
        $id = (int)$request->input('id');
        $modelCategogy = new Categogy();
        $menu = $modelCategogy->find($id);
        if(!$menu){
            return response()->json(['error' => 1, 'message' => 'Menu không tồn tại']);
        }
        $modelCategogy->deleteCategory($id);
        return response()->json(['error' => 0, 'message' => 'Xóa menu thành công']);
    }

    public function getEdit($id)
    {
        $modelCategogy = new Categogy();
        $category = $modelCategogy->find($id);
        if(!$category){
            return abort(404);
        }
        $this->data['menu'] = $category;
        return view('admin/category/edit',$this->data);
    }

    public function postEdit(Request $request, $id)
    {
        $this->validate($request,
            [
                "name" => "required|max:50",
            ]
        );
        $modelCategogy = new Categogy();
        $category = $modelCategogy->find($id);
        if(!$category){
            return abort(404);
        }
        $input = $request->all();
        $modelCategogy->editCategory($category, $input);
        $request->session()->flash('message_success', 'Cập nhật menu thành công');
        return redirect(route('list_menu'));
    }
}