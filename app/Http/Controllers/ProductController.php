<?php

namespace App\Http\Controllers;
use App\Models\Categogy;
use App\Models\Product;
use App\Models\Setting;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Image;

class ProductController extends Controller
{

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
        $products = $this->buildItems($products);
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
            $img = Image::make($thumbnailpath)->resize(800, 600, function ($constraint) {
                $constraint->aspectRatio();
            });
            $modelSetting = new Setting();
            $setting = $modelSetting->getSetting();
            if(!empty($setting->logo)){
                $watermark =  Image::make(public_path($setting->logo));
                $img->insert($watermark, 'bottom-right', 10, 10);
            }

            $img->save($thumbnailpath);
        }

        $modelProduct->insertProduct($input);
        $request->session()->flash('message_success', 'Thêm sản phẩm thành công');

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
            return response()->json(['error' => 1, 'message' => 'Sản phẩm không tồn tại']);
        }
        $modelProduct->deleteProduct($id);
        return response()->json(['error' => 0, 'message' => 'Xóa sản phẩm thành công']);
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
            $img = Image::make($thumbnailpath)->resize(800, 600, function ($constraint) {
                $constraint->aspectRatio();
            });

            $modelSetting = new Setting();
            $setting = $modelSetting->getSetting();
            if(!empty($setting->logo)){
                $watermark =  Image::make(public_path($setting->logo));
                $img->insert($watermark, 'bottom-right', 10, 10);
            }

            $img->save($thumbnailpath);

        }

        $modelProduct->updateProduct($product, $input);
        $request->session()->flash('message_success', 'Cập nhật sản phẩm thành công');

        return redirect(route('list_product'));
    }


    public function buildItem($item) {
        $item->category_name = 'Khác';
        if (!empty($item->category_id)) {
            $modelCategogy = new Categogy();
            $category = $modelCategogy->find($item->category_id);
            $item->category_name = $category->name;
        }
        $item->sub_category_name = 'Khác';
        if (!empty($item->sub_category_id)) {
            $modelSubCategogy = new SubCategory();
            $subCategory = $modelSubCategogy->find($item->sub_category_id);
            $item->sub_category_name = $subCategory->name;
        }
        return $item;
    }

    /**
     * @param $items
     * @return mixed
     */
    public function buildItems($items) {
        foreach ($items as $key => $item) {
            $items[$key] = $this->buildItem($item);
        }
        return $items;
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

        return view("fontend/product/search_button_product", 
            [
                "listProduct"=> $listProduct
        ]);;
    }


}