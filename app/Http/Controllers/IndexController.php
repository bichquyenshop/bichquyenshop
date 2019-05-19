<?php 
namespace App\Http\Controllers;

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
        $product = Product::getListIndex();
        return view("fontend/index", 
            [

                "product"=> $product,

            ]
        );
    }
   
}