<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class Product extends Model
{
    public $table = 'product';
    public $timestamps = false;

    public static function getList() {
        return DB::table('product')->orderBy('id','desc')->get();
    }
    public static function getListFollowId($idProduct){
        $query = DB::table('product as pd');
        $query->join('sub_category as sc', 'pd.sub_category_id', '=', 'sc.id');
        $query->select('pd.code','pd.description','pd.name',
            'pd.color','pd.image','pd.size','pd.weight','pd.style','sc.name as name_sc');
        $query->where('pd.id',$idProduct);
        $query->orderBy('pd.id','desc');

        return $query->get();
        // return DB::table('product')->where('id',$idProduct)->get();
    }

    public function insertProduct($params=[])
    {
        $modelProduct = new Product();
        $modelProduct->name = $params['name'];
        $modelProduct->code = $params['code'];
        $modelProduct->description = $params['description'];
        $modelProduct->image = $params['image'];
        $modelProduct->image = $params['sub_category_id'];
        $modelProduct->image = $params['color'];
        $modelProduct->image = $params['size'];
        $modelProduct->image = $params['weight'];
        $modelProduct->image = $params['style'];
        $modelProduct->save();
    }

    public function deleteProduct($id)
    {
        $product = Product::find($id);
        $product->delete();
    }

    public function editProduct($modelProduct,$params=[])
    {
        $modelProduct->name = $params['name'];
        $modelProduct->code = $params['code'];
        $modelProduct->description = $params['description'];
        $modelProduct->image = $params['image'];
        $modelProduct->image = $params['sub_category_id'];
        $modelProduct->image = $params['color'];
        $modelProduct->image = $params['size'];
        $modelProduct->image = $params['weight'];
        $modelProduct->image = $params['style'];
        $modelProduct->save();
    }
}
