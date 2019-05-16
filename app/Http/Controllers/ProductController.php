<?php

namespace App\Http\Controllers;
use App\Models\Categogy;
use App\Models\Product;
use Illuminate\Http\Request;
use Image;

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
        $this->data['list'] = $products;

        return view('admin/product/list',$this->data);
    }

    public function getAdd()
    {
        $modelCategory = new Categogy();
        $categoryOptions = $modelCategory->categoryOptions();
        $this->data['menuOptions'] = $categoryOptions;
        $this->data['menu_active'] = 'product-add';
        return view('admin/product/add',$this->data);
    }

    public function postAdd(Request $request)
    {
        $this->validate($request,
            [
                "name"            => "max:100",
                "code"            => "unique:product|required|max:20",
                "style"           => "max:100",
                "color"           => "max:100",
                "weight"          => "max:100",
                "size"            => "max:100",
                "category_id"     => "required",
                "sub_category_id" => "required",
                "product_image"   =>'mimes:jpeg,jpg,png|max:1024'
            ]
        );
        $input = $request->all();
        $modelProduct = new Product();
        $input['image'] = null;
        if ($request->hasFile('product_image')) {
            //get filename with extension
            $filenamewithextension = $request->file('product_image')->getClientOriginalName();

            //get filename without extension
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

            //get file extension
            $extension = $request->file('product_image')->getClientOriginalExtension();

            //filename to store
            $filenametostore = $filename . '_' . time() . '.' . $extension;

            //Upload File
            $request->file('product_image')->storeAs('public/product_images', $filenametostore);
            $request->file('product_image')->storeAs('public/product_images/thumbnail', $filenametostore);
            $input['image'] = 'storage/product_images/thumbnail/' . $filenametostore;
            //Resize image here
            $thumbnailpath = public_path('storage/product_images/thumbnail/' . $filenametostore);
            $img = Image::make($thumbnailpath)->resize(400, 400, function ($constraint) {
                $constraint->aspectRatio();
            });
            $watermark =  Image::make(public_path('logo.png'));
            $img->insert($watermark, 'bottom-right', 10, 10);
            $img->save($thumbnailpath);

        }

        $modelProduct->insertProduct($input);
        return redirect(route('list_product'));
    }

    public function delete(Request $request)
    {
        $request->validate([
            'id' => 'required',
        ]);
        $id = (int)$request->input('id');
        $modelProduct = new Product();
        $product = Product::find($id);
        if(!$product){
            return response()->json(['error' => 1, 'message' => 'Product không tồn tại']);
        }
        $modelProduct->deleteProduct($id);
        return response()->json(['error' => 0, 'message' => 'Xóa product thành công']);
    }


    public function getEdit($productId){
        $modelCategory = new Categogy();
        $categoryOptions = $modelCategory->categoryOptions();
        $modelProduct = new Product();
        $product = Product::find($productId);
        if(!$product){
            return abort(404);
        }
        $this->data['menuOptions'] = $categoryOptions;
        $this->data['product'] = $product;
        $this->data['urlImg'] = public_path($product->image);

        return view('admin/product/edit',$this->data);
    }

    public function postEdit(Request $request, $productId){
        $modelProduct = new Product();
        $product = Product::find($productId);
        if(!$product){
            return abort(404);
        }
        $this->validate($request,
            [
                "name"            => "max:100",
                "code"            => 'required|max:20|unique:product,code, '. $productId.',id',
                "style"           => "max:100",
                "color"           => "max:100",
                "weight"          => "max:100",
                "size"            => "max:100",
                "category_id"     => "required",
                "sub_category_id" => "required",
                "product_image"   =>'mimes:jpeg,jpg,png|max:1024'
            ]
        );
        $input = $request->all();
      
        $input['image'] = $input['product_image_old'];
        if ($request->hasFile('product_image')) {
            //get filename with extension
            $filenamewithextension = $request->file('product_image')->getClientOriginalName();

            //get filename without extension
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

            //get file extension
            $extension = $request->file('product_image')->getClientOriginalExtension();

            //filename to store
            $filenametostore = $filename . '_' . time() . '.' . $extension;

            //Upload File
            $request->file('product_image')->storeAs('public/product_images', $filenametostore);
            $request->file('product_image')->storeAs('public/product_images/thumbnail', $filenametostore);
            $input['image'] = 'storage/product_images/thumbnail/' . $filenametostore;
            //Resize image here
            $thumbnailpath = public_path('storage/product_images/thumbnail/' . $filenametostore);
            $img = Image::make($thumbnailpath)->resize(400, 400, function ($constraint) {
                $constraint->aspectRatio();
            });
            $watermark =  Image::make(public_path('logo.png'));
            $img->insert($watermark, 'bottom-right', 10, 10);
            $img->save($thumbnailpath);

        }

        $modelProduct->updateProduct($product, $input);
        return redirect(route('list_product'));
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