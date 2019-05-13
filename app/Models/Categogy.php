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
        return DB::table('category')->orderBy('id','desc')->get();
    }

    public function insertCategory($params=[])
    {
        $modelCategory = new Categogy();
        $modelCategory->name = $params['name'];
        $modelCategory->save();
    }

    public function deleteCategory($id)
    {
        $category = Categogy::find($id);
        $category->delete();
    }

    public function editCategory($modelCategory,$params=[])
    {
        $modelCategory->name = $params['name'];
        $modelCategory->save();
    }

    public function categoryOptions()
    {
        return $this->pluck('name', 'id')->toArray();
    }
}
