<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // public function __construct()
    // {
       

    //     // Your constructor code here..
    // }
    private $data = [];

    public function __construct()
    {
        $this->data['menu_active'] = 'product';
        parent::__construct();
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

    // Font-end
    public function detailProduct(Request $request){
        $idProduct = $request->idProduct;
        $detailProduct = Product::getListFollowId($idProduct);
        return view("fontend/product/detail_product", 
            [
                "detailProduct"=> $detailProduct
        ]);
      
    }
    public function productCategory(Request $request){
        $idCate = $request->idCate;
        $listProduct = Product::getListProductFollowCate($idCate);
        return view("fontend/product/category_product", 
            [
                "listProduct"=> $listProduct
        ]);
    }
    public function searchInputProduct(Request $request){
        $stringSearch =  $request->stringSearch;

        $listProduct = Product::getListSearchProduct($stringSearch,3);

        return view("fontend/product/search_input_product", 
            [
                "listProduct"=> $listProduct
        ]);;
    }
    public function searchButtonProduct(Request $request){
        $stringSearch =  $request->stringSearch;

        $listProduct = Product::getListSearchProduct($stringSearch,10);

        return view("fontend/product/search_input_product", 
            [
                "listProduct"=> $listProduct
        ]);;
    }


}