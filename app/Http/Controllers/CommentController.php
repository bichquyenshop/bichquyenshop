<?php

namespace App\Http\Controllers;
use App\Models\Comment;
use App\Models\Product;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    private $data = [];

    public function __construct()
    {
        $this->data['menu_active'] = 'comment';
    }

    public function getList()
    {
        $modelComment = new Comment();
        $comment = $modelComment->getList();
        $this->data['list'] = $comment;
        return view('admin/comment/list',$this->data);
    }

    public function detail($id)
    {
        $modelComment = new Comment();
        $comment = $modelComment->getCommentById($id);
        if(!$comment){
            return abort(404);
        }
        $this->data['comment'] = $comment;
        return view('admin/comment/detail',$this->data);
    }

    public function verify(Request $request)
    {
        $request->validate([
            'id' => 'required',
        ]);
        $id = (int)$request->input('id');
        $status = 0;

        $modelComment = new Comment();
        $comment = $modelComment->find($id);
        if(!$comment){
            return response()->json(['error' => 1, 'message' => 'Comment không tồn tại']);
        }

        if($comment->status == 1){
            $status = 0;
        }elseif($comment->status == 0) {
            $status = 1;
        }
        $comment->updateStatusComment($comment,$status);

        return response()->json(['error' => 0, 'message' => 'Duyệt comment thành công']);
    }

}