<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubMenu extends Model
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

    public function insertSubMenu($params=[])
    {
        $modelSubMenu = new SubMenu();
        $modelSubMenu->name = $params['name'];
        $modelSubMenu->category_id = $params['category_id'];
        $modelSubMenu->save();
    }

    public function deleteSubMenu($id)
    {
        $modelSubMenu = SubMenu::find($id);
        $modelSubMenu->delete();
    }

    public function editSubMenu($modelSubMenu,$params=[])
    {
        $modelSubMenu->name = $params['name'];
        $modelSubMenu->category_id = $params['category_id'];
        $modelSubMenu->save();
    }
}
