<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class Product extends Model
{
    public $table = 'product';
    public $timestamps = false;

    public static function getListIndex() {
        return DB::table('product')->orderBy('id','desc')->limit(4)->get();
    }
    public static function getList() {
        return DB::table('product')->orderBy('id','desc')->get();
    }
  
    public function insertProduct($params=[])
    {
        $modelProduct = new Product();
        $modelProduct->name = $params['name'];
        $modelProduct->code = $params['code'];
        $modelProduct->description = $params['description'];
        $modelProduct->image = $params['image'];
        $modelProduct->category_id = $params['category_id'];
        $modelProduct->sub_category_id = $params['sub_category_id'];
        $modelProduct->color = $params['color'];
        $modelProduct->size = $params['size'];
        $modelProduct->weight = $params['weight'];
        $modelProduct->style = $params['style'];
        $modelProduct->save();
    }

    public function deleteProduct($id)
    {
        $product = Product::find($id);
        $product->delete();
    }

    public function updateByCategoryId($category_id)
    {
        return DB::table('product')
            ->where('category_id', $category_id)
            ->update(['category_id' => null, 'sub_category_id' => null]);
    }

    public function updateBySubCategoryId($sub_category_id)
    {
        return DB::table('product')
            ->where('sub_category_id', $sub_category_id)
            ->update(['category_id' => null, 'sub_category_id' => null]);
    }

    public function updateProduct($modelProduct, $params=[])
    {
        $modelProduct->name = $params['name'];
        $modelProduct->code = $params['code'];
        $modelProduct->description = $params['description'];
        $modelProduct->image = $params['image'];
        $modelProduct->category_id = $params['category_id'];
        $modelProduct->sub_category_id = $params['sub_category_id'];
        $modelProduct->color = $params['color'];
        $modelProduct->size = $params['size'];
        $modelProduct->weight = $params['weight'];
        $modelProduct->style = $params['style'];
        $modelProduct->save();
    }

      public static function getListFollowId($idProduct){
        $query = DB::table('product as pd');
        $query->join('sub_category as sc', 'pd.sub_category_id', '=', 'sc.id');
        $query->select('pd.id','pd.code','pd.description','pd.name',
            'pd.color','pd.image','pd.size','pd.weight','pd.style','sc.name as name_sc');
        $query->where('pd.id',$idProduct);
        $query->orderBy('pd.id','desc');

        return $query->get();
    
    }
    public static function getListProductFollowCate($idCate,$offset,$limit){
        $query = DB::table('product as pd');
        $query->select('pd.id','pd.code','pd.name','pd.sub_category_id','pd.image','pd.category_id');
        $query->where('pd.category_id',$idCate);
        $query->limit($limit);
        $query->offset($offset); 
        $query->orderBy('pd.id','desc');
        return $query->get();
    
    }
    public static function getListProductFollowSubCate($idSubCate,$offset,$limit){
        $query = DB::table('product as pd');
        $query->select('pd.id','pd.code','pd.name','pd.sub_category_id','pd.image','pd.category_id');
        $query->where('pd.sub_category_id',$idSubCate);
        $query->limit($limit);
        $query->offset($offset); 
        $query->orderBy('pd.id','desc');
        return $query->get();
    
    }
    public static function getListSearchProduct($stringSearch,$offset,$limit){
        $query = DB::table('product as pd');
        $query->select('pd.id','pd.name','pd.image','pd.code');
        $query->where('pd.name', 'like', '%'.$stringSearch.'%');
        $query->orWhere('pd.code', 'like', '%'.$stringSearch.'%');
        $query->offset($offset); // từ vị trí 20
        $query->limit($limit);
        $query->orderBy('pd.id','desc');
        
        return $query->get();
    }

}
