@extends('admin.layouts.master')
@section('title','Chi tiết bình luận')

@section('header')
@stop
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Chi tiết bình luận
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('index')}}"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
            <li class="active">Chi tiết bình luận</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">

                    <div class="box box-success">
                        <div class="box-header with-border">
                            <h3 class="box-title">Thông tin menu</h3>
                        </div>

                        <div class="box-body form-horizontal">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="col-sm-2"></label>
                                    <div class="col-sm-6">
                                        <div class="col-sm-6 no-padding">
                                            @if($comment->status == 1)
                                                <button class="btn btn-success ajax_action" type="button" data-id="{{$comment->id}}" data-method="POST" data-action="{{route('verify_comment')}}" data-label="Thay đổi trạng thái thành không hiển thị?"><i class="fa fa-check"></i> Đã hiển thị</button>
                                            @else
                                                <button class="btn btn-danger ajax_action" type="button" data-id="{{$comment->id}}" data-method="POST" data-action="{{route('verify_comment')}}" data-label="Thay đổi trạng thái thành hiển thị?"><i class="fa fa-close"></i> Chưa hiển thị</button>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName" class="col-sm-2 control-label">Tên </label>
                                    <div class="col-sm-10">
                                        <input disabled type="text" class="form-control" name="name" value="{{!empty(old('user_name')) ? old('user_name') : $comment->user_name}}" placeholder="Tên">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputName" class="col-sm-2 control-label">Tên sản phẩm</label>
                                    <div class="col-sm-10">
                                        <input disabled type="text"  class="form-control" name="product_name" value="{{!empty(old('product_name')) ? old('product_name') : $comment->product_name}}" placeholder="Tên sản phẩm">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputName" class="col-sm-2 control-label">Mã sản phẩm</label>
                                    <div class="col-sm-10">
                                        <input disabled type="text"  class="form-control" name="code" value="{{!empty(old('code')) ? old('code') : $comment->code}}" placeholder="Mã sản phẩm">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputName" class="col-sm-2 control-label">Tiêu đề</label>
                                    <div class="col-sm-10">
                                        <input disabled type="text"  class="form-control" name="title" value="{{!empty(old('title')) ? old('title') : $comment->title}}" placeholder="Tiêu đề">
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <label for="exampleInputName" class="col-sm-2 control-label">Nội dung</label>
                                    <div class="col-sm-10">
                                        <textarea disabled class="form-control" placeholder="Nội dung"  name="content" rows="5">{{!empty(old('content')) ? old('content') : $comment->content}}</textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputName" class="col-sm-2 control-label">Điểm đánh giá</label>
                                    <div class="col-sm-10">
                                        <input disabled type="text"  class="form-control" name="star" value="{{!empty(old('star')) ? old('star') : $comment->star}}" placeholder="Điểm đánh giá">
                                    </div>
                                </div>


                            </div>

                        </div>

                    </div>

            </div>
        </div>

    </section>
    <!-- /.content -->
@stop

@section('script')

@stop