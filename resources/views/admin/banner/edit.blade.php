@extends('admin.layouts.master')
@section('title','Cập nhật banner')

@section('header')
@stop
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Cập nhật banner
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('index')}}"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
            <li class="active">Cập nhật banner</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <form role="form" method="POST" enctype="multipart/form-data" class="form-horizontal" action="{{ route('edit_banner', $banner->id) }}">
                    @csrf
                    <div class="box box-success">
                        <div class="box-header with-border">
                            <h3 class="box-title">Thông tin banner</h3>
                        </div>

                        <div class="box-body">
                            <div class="col-md-6">
                                <div class="form-group {!! $errors->first('title','has-error') !!}">
                                    <label for="exampleInputName" class="col-sm-3 control-label">Tiêu đề</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="title" value="{{!empty(old('title')) ? old('title') : $banner->title}}" placeholder="Tiêu đề">
                                        {!! $errors->first('title','<span class="help-block">:message</span>') !!}
                                    </div>
                                </div>
                                <div class="form-group {!! $errors->first('ordering','has-error') !!}">
                                    <label for="exampleInputName" class="col-sm-3 control-label">Thứ tự</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" name="ordering" value="{{!empty(old('ordering')) ? old('ordering') : $banner->ordering}}" placeholder="Thứ tự">
                                        {!! $errors->first('ordering','<span class="help-block">:message</span>') !!}
                                    </div>
                                </div>
                                <div class="form-group {!! $errors->first('description','has-error') !!}">
                                    <label for="exampleInputName" class="col-sm-3 control-label">Ghi chú</label>
                                    <div class="col-sm-9">
                                        <textarea rows="4" placeholder="Ghi chú" class="form-control" name="description">{{!empty(old('description')) ? old('description') : $banner->description}}</textarea>
                                        {!! $errors->first('description','<span class="help-block">:message</span>') !!}
                                    </div>
                                </div>
                                <div class="form-group {!! $errors->first('banner_image','has-error') !!}">
                                    <label for="exampleInputName" class="col-sm-3 control-label">Hình ảnh <span class="required">*</span></label>
                                    <div class="col-sm-9">
                                        <input type="hidden" name="banner_image_old" value="{{$banner->image}}" >
                                        <input type="file" value="{{ old('banner_image')}}" name="banner_image" >
                                        {!! $errors->first('banner_image','<span class="help-block">:message</span>') !!}
                                        <p style="margin-top: 20px;">Kích thước 740 x 380</p>

                                    </div>
                                </div>
                                @if($banner->image)
                                    <div style="padding-top: 30px;" class="col-md-12">
                                        <div class="col-md-4 ">
                                            <a class="btn btn-app remove_image">
                                                <i class="fa fa-remove"></i> Xóa
                                            </a>

                                        </div>
                                        <div  class=" show_image">
                                            <div class="col-sm-8 no-padding">
                                                <div>
                                                    <img class="img-responsive" src="/{{ $banner->image}}">
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                @endif
                                <div class="form-group">
                                    <label class="col-sm-3"></label>
                                    <div class="col-sm-6">
                                        <button type="submit" class="btn btn-success">
                                            Cập nhật
                                        </button>
                                        <a type="submit" class="btn btn-default margin" href="{{ route('list_banner') }}">
                                            Bỏ qua
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </form>
            </div>
        </div>

    </section>
    <!-- /.content -->
@stop

@section('script')
<script>
    $(function () {
        $('.remove_image').click(function(){
            $('#image').val('');
            $(this).parent().parent().remove();
        });
    });
</script>
@stop