<?php

namespace App\Http\Controllers;

use App\Models\Categogy;
use App\Models\Setting;
use App\Models\Banner;
use App\Models\Product;
use View;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function __construct() {

      
       $setting     = Setting::getList();
       $banner      = Banner::getList();
       $categogy    = Categogy::getList();

       View::share ( 'setting'  , $setting );
       View::share ( 'banner'   , $banner  );
       View::share ( 'categogy'   , $categogy  );
    } 
}
