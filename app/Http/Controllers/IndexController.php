<?php 
namespace App\Http\Controllers;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Support\Jsonable;
use App\Models\Categogy;
use App\Models\Setting;
use App\Models\Banner;
use App\Models\Product;
use App\Http\Controllers\Controller;


class IndexController extends Controller
{

    public function __construct()
    {
        parent::__construct();

        // Your constructor code here..
    }
    public function menu()
    {

        // $product = Product::getListIndex();
         // $producta = Product::all();
         $product = Product::getListIndex();
         // $product->perPage('3');
         // $product->perPage(2);
         // $product->withPath('custom/url');
        // echo "<pre>";
        // print_r($product);
        // die();
        return view("fontend/index", 
            [

                "product"=> $product,

            ]
        );
    }
   
}