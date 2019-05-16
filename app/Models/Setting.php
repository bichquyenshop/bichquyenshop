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
        return DB::table('setting')->get();
    }

  
}
