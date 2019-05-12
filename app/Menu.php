<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Menu extends Model
{
    public $table = 'category';
    public $timestamps = false;

    public function getList() {
        return DB::table('category')->orderBy('id','desc')->get();
    }

    public function insertMenu($params=[])
    {
        $modelMenu = new Menu();
        $modelMenu->name = $params['name'];
        $modelMenu->save();
    }

    public function deleteMenu($id)
    {
        $menu = Menu::find($id);
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
