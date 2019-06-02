<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class Comment extends Model
{
    public $table = 'comment';
    public $timestamps = false;


    public function getList() {
        $query = DB::table('comment');
        $query->join('product', 'product.id', '=', 'comment.product_id');
        $query->select('comment.*','product.name as product_name', 'product.code');
        $query->orderBy('time','desc');
        return $query->get();

    }

    public function getCommentById($id) {
        $query = DB::table('comment');
        $query->join('product', 'product.id', '=', 'comment.product_id');
        $query->select('comment.*','product.name as product_name', 'product.code');
        $query->where('comment.id', $id);
        return $query->first();

    }

    public function updateStatusComment($model,$status)
    {
        $model->status = $status;
        $model->save();
    }

}
