<?php

namespace App\Http\Controllers;

use App\Models\Categogy;
use App\Models\SubCategory;
use App\Models\Setting;
use App\Models\Banner;
use App\Models\Product;
use App\Models\View as ViewS;
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
       $subCategory = SubCategory::getListSub();
       $viewAll     = ViewS::count();
       $viewDate    = ViewS::countByDate(Date('y-m-d'));

       View::share ( 'st'  , $setting );
       View::share ( 'banner'   , $banner  );
       View::share ( 'categogy'   , $categogy  );
       View::share ( 'subCategory'   , $subCategory  );
       View::share ( 'viewAll'   , $viewAll  );
       View::share ( 'viewDate'   , $viewDate  );
    } 
}
