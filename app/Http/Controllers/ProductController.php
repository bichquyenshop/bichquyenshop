<?php

namespace App\Http\Controllers;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $data = [];

    public function __construct()
    {
        $this->data['menu_active'] = 'product';
    }
    public function getList()
    {
        $modelProduct = new Product();
        $products = $modelProduct->getList();
        $this->data['products'] = $products;
        return view('admin/product/list',$this->data);
    }

    public function getAdd()
    {
        return view('admin/product/add',$this->data);

    }

    public function postAdd(Request $request)
    {

        $this->validate($request,
            [
                "name" => "required",
                "price"  =>"required",
            ]
        );
        $input = $request->all();
        $modelProduct = new Product();

        $image = $request->file('img');
        if(!empty($image)){
            $path = 'images';
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move($path, $filename);
            $input['image'] = $path."/".$filename;
        }

        $modelProduct->insertProduct($input);
        return redirect('admin/product')->with("message","Thêm thành công");
    }

    public function delete(Request $request){
        $input = $request->all();
        $modelProduct = new Product();
        $modelProduct->deleteProduct($input['deleteId']);
        return redirect('admin/product')->with("message","Xóa thành công");
    }

    public function getEdit(Request $request){
        $modelProduct = new Product();
        $row = $modelProduct->find( $request->editId);
        return view('product.edit',compact('row'));
    }

    public function edit(Request $request, $id){
        $this->validate($request,
            [
                "name" => "required",
                "price"  =>"required",
            ]
        );
        $modelProduct = new Product();
        $product = Product::find($id);
        $input = $request->all();
        $input['image'] = $product->image;
        $image = $request->file('img');

        if(!empty($image)){
            $path = 'images';
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move($path, $filename);
            $input['image'] = $path."/".$filename;
        }

        $modelProduct->editProduct($product, $input);
        return redirect('admin/product')->with("message","Cập nhật thành công");
    }
}