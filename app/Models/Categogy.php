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

    public function insertMenu($params=[])
    {
        $modelMenu = new Categogy();
        $modelMenu->name = $params['name'];
        $modelMenu->save();
    }

    public function deleteMenu($id)
    {
        $menu = Categogy::find($id);
        $menu->delete();
    }

    public function editMenu($modelMenu,$params=[])
    {
        $modelMenu->name = $params['name'];
        $modelMenu->save();
    }

    public function menuOptions()
    {
        return $this->pluck('name', 'id')->toArray();
    }
}
