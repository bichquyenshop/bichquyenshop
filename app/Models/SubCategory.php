<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
class SubCategory extends Model
{
    public $table = 'sub_category';
    public $timestamps = false;

    public function getList() {
        $query = DB::table('sub_category');
        $query->join('category', 'sub_category.category_id', '=', 'category.id');
        $query->select('sub_category.*','category.name as category_name');
        $query->orderBy('id','desc');
        return $query->get();

    }

    public function insertSubCategory($params=[])
    {
        $modelSubCategory = new SubCategory();
        $modelSubCategory->name = $params['name'];
        $modelSubCategory->category_id = $params['category_id'];
        $modelSubCategory->save();
    }

    public function deleteSubCategory($id)
    {
        $modelSubCategory = SubCategory::find($id);
        $modelSubCategory->delete();
    }

    public function editSubCategory($modelSubCategory,$params=[])
    {
        $modelSubCategory->name = $params['name'];
        $modelSubCategory->category_id = $params['category_id'];
        $modelSubCategory->save();
    }
}
