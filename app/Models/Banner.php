<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class Banner extends Model
{
    // public $table = 'category';
    // public $timestamps = false;

    public static function getList() {
        return DB::table('banner')->get();
    }

  
}
