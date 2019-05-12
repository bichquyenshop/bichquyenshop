<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    public $table = 'product';
    public $timestamps = false;

    public function getList() {
        return DB::table('product')->orderBy('id','desc')->get();
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
