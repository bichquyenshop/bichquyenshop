<?php 
namespace App\Http\Controllers;
use Hamcrest\Core\Set;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Support\Jsonable;
use App\Models\Categogy;
use App\Models\Setting;
use App\Models\Banner;
use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;


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