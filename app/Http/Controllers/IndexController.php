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
        $modelCategogy = new Categogy();
       
        
        $menu = $modelCategogy->getList();
        // $setting = Setting::getList();
        // $banner = Banner::getList();
        $banner = Banner::getList();
        $product = Product::getList();
        return view("fontend/index", 
            [
                // "categogy"=> $menu,
                // "setting"=> $setting,
                // "banner"=> $banner,
                "product"=> $product,

            ]
        );
    }
   
}