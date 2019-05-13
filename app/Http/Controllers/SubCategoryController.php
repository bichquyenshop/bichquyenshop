<?php

namespace App\Http\Controllers;
use App\Models\Categogy;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    private $data = [];

    public function __construct()
    {
        $this->data['menu_active'] = 'sub-menu';
    }
    public function getList()
    {
        $modelSubCategory = new SubCategory();
        $subCategories = $modelSubCategory->getList();
        $this->data['list'] = $subCategories;
        return view('admin/sub-category/list',$this->data);
    }

    public function getAdd()
    {
        $modelCategory = new Categogy();
        $categoryOptions = $modelCategory->categoryOptions();
        $this->data['menu_active'] = 'sub-menu-add';
        $this->data['menuOptions'] = $categoryOptions;
        return view('admin/sub-category/add',$this->data);
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
        $modelSubCategory = new SubCategory();
        $modelSubCategory->insertSubCategory($input);

        $request->session()->flash('message_success', 'Thêm mới sub menu thành công');
        return redirect(route('list_sub_menu'));
    }

    public function delete(Request $request)
    {
        $request->validate([
            'id' => 'required',
        ]);
        $id = (int)$request->input('id');
        $modelSubCategory = new SubCategory();
        $subCategory = $modelSubCategory->find($id);
        if(!$subCategory){
            return response()->json(['error' => 1, 'message' => 'Sub menu không tồn tại']);
        }
        $modelSubCategory->deleteSubCategory($id);
        return response()->json(['error' => 0, 'message' => 'Xóa sub menu thành công']);
    }

    public function getEdit($id)
    {
        $modelCategory = new Categogy();
        $categoryOptions = $modelCategory->categoryOptions();
        $modelSubCategory = new SubCategory();
        $subCategory = $modelSubCategory->find($id);
        if(!$subCategory){
            return abort(404);
        }
        $this->data['subMenu'] = $subCategory;
        $this->data['menuOptions'] = $categoryOptions;
        return view('admin/sub-category/edit',$this->data);
    }

    public function postEdit(Request $request, $id)
    {
        $this->validate($request,
            [
                "name" => "required|max:50",
                "category_id" => "required",
            ]
        );
        $modelSubCategory = new SubCategory();
        $subCategory = $modelSubCategory->find($id);
        if(!$subCategory){
            return abort(404);
        }
        $input = $request->all();
        $modelSubCategory->editSubCategory($subCategory, $input);
        $request->session()->flash('message_success', 'Cập nhật sub menu thành công');
        return redirect(route('list_sub_menu'));
    }
}