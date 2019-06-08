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
    public static function getCommentByIdStatus($id) {

        $query = DB::table('comment');

        $query->select('star','content','title','user_name', DB::raw('FROM_UNIXTIME(time,"%d/%m/%Y") as time'));
        $query->where('product_id',$id);
        $query->where('status',1);


        return $query->get();


    }
    public static function getCommentGroupBy($id) {

        $query = DB::select( DB::raw("
           select count(comment.id) as count, sum(comment.star) as sum, comment.`star`, star.`description` 
            from star 
            left join comment on star.`id` = comment.`star` and comment.product_id = $id and comment.status = 1 
            group by comment.`star`,star.`description`
            order by star.`id` desc"));


        return $query;


    }
    public function insertComment($params=[])
    {
        $model = new Comment();
        $model->content = $params['description'];
        $model->product_id = $params['id_product'];
        $model->title = $params['title'];
        $model->user_name = $params['user_name'];
        $model->star = $params['rating'];
        $model->time = time();
        $model->status =  0;
        $model->save();
    }

}
