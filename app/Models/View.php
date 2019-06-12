<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class View extends Model
{
     public $table = 'view';
     public $timestamps = false;

    public static function insertView()
    {
        $modelSetting = new View();
        $modelSetting->date = date('Y-m-d H:i:s');
        $modelSetting->save();
    }
    public static function count()
    {
        $query = DB::table('view');
        $query->select(\DB::raw('COUNT(*) AS "count"'));

        $result = $query->first();

        return $result->count;

    }
    public static function countByDate($date)
    {
        $query = DB::table('view');
        $query->whereDate('date', '=', $date);
        $query->select(\DB::raw('COUNT(*) AS "count"'));

        $result = $query->first();

        return $result->count;

    }
}
