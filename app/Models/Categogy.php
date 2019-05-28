<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class Categogy extends Model
{
    public $table = 'category';
    public $timestamps = false;

    
    public static function getList() {
        $query = DB::table('category as ct');
        $query->join('sub_category as sc', 'sc.category_id', '=', 'ct.id');
        $query->distinct('ct.id');
        $query->select('ct.name','ct.id');
        return $query->get();
    }

    public function getListCategory() {
        return DB::table('category')->orderBy('id','desc')->get();

    }

    public function insertCategory($params=[])
    {
        $modelCategory = new Categogy();
        $modelCategory->name = $params['name'];
        $modelCategory->description = $params['description'];
        $modelCategory->save();
    }

    public function deleteCategory($id)
    {
        $category = Categogy::find($id);
        $category->delete();
    }

    public function updateCategory($modelCategory,$params=[])
    {
        $modelCategory->name = $params['name'];
        $modelCategory->description = $params['description'];
        $modelCategory->save();
    }

    public function categoryOptions()
    {
        return $this->pluck('name', 'id')->toArray();
    }
}
