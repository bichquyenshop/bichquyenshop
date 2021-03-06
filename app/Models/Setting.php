<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class Setting extends Model
{
     public $table = 'setting';
     public $timestamps = false;

    public static function getList() {
        return DB::table('setting')->first();
    }

    public function getSetting() {
        return DB::table('setting')->first();
    }

    public function insertSetting($params=[])
    {
        $modelSetting = new Setting();
        $modelSetting->logo = $params['logo'];
        $modelSetting->address = $params['address'];
        $modelSetting->tel = $params['tel'];
        $modelSetting->email = $params['email'];
        $modelSetting->link_fb = $params['link_fb'];
        $modelSetting->link_ins = $params['link_ins'];
        $modelSetting->link_youtube = $params['link_youtube'];
        $modelSetting->description = $params['description'];
        $modelSetting->num_view = $params['num_view'];
        $modelSetting->isFakeView = $params['isFakeView'];
        $modelSetting->num_daily_view = $params['num_daily_view'];
        $modelSetting->isFakeDailyView = $params['isFakeDailyView'];


        $modelSetting->save();
    }

    public function updateSetting($modelSetting,$params=[])
    {
        $modelSetting->logo_thumbnail = $params['logo_thumbnail'];
        $modelSetting->logo = $params['logo'];
        $modelSetting->address = $params['address'];
        $modelSetting->tel = $params['tel'];
        $modelSetting->email = $params['email'];
        $modelSetting->link_fb = $params['link_fb'];
        $modelSetting->link_ins = $params['link_ins'];
        $modelSetting->link_youtube = $params['link_youtube'];
        $modelSetting->description = $params['description'];
        $modelSetting->num_view = $params['num_view'];
        $modelSetting->isFakeView = $params['isFakeView'];
        $modelSetting->num_daily_view = $params['num_daily_view'];
        $modelSetting->isFakeDailyView = $params['isFakeDailyView'];
        $modelSetting->save();
    }

    public static function updateView()
    {
        return DB::table('setting')->increment('num_view');
    }
}
