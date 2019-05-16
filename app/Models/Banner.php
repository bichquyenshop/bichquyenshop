<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class Banner extends Model
{
    public $table = 'banner';
    public $timestamps = false;

    public static function getList() {
        return DB::table('banner')->orderBy('ordering','asc')->get();
    }

    public function insertBanner($params=[])
    {
        $modelBanner = new Banner();
        $modelBanner->image = $params['image'];
        $modelBanner->title = $params['title'];
        $modelBanner->description = $params['description'];
        $modelBanner->ordering = $params['ordering'];
        $modelBanner->save();
    }

    public function deleteBanner($id)
    {
        $banner = Banner::find($id);
        $banner->delete();
    }

    public function updateBanner($modelBanner,$params=[])
    {
        $modelBanner->image = $params['image'];
        $modelBanner->title = $params['title'];
        $modelBanner->description = $params['description'];
        $modelBanner->ordering = $params['ordering'];
        $modelBanner->save();
    }

}
