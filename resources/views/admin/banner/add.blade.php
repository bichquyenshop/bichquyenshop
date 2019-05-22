@extends('admin.layouts.master')
@section('title','Thêm mới banner')

@section('header')
@stop
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Thêm mới banner
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{route('index')}}"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
        <li class="active">Thêm mới banner</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <form role="form" method="POST" enctype="multipart/form-data" class="form-horizontal" action="{{ route('add_banner') }}">
            @csrf
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Thông tin banner</h3>
                </div>
                
                <div class="box-body">
                    <div class="col-md-6">
                        <div class="form-group {!! $errors->first('title','has-error') !!}">
                            <label for="exampleInputName" class="col-sm-3 control-label">Tiêu đề</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="title" value="{{ old('title')}}" placeholder="Tiêu đề">
                                {!! $errors->first('title','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>
                        <div class="form-group {!! $errors->first('ordering','has-error') !!}">
                            <label for="exampleInputName" class="col-sm-3 control-label">Thứ tự</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" name="ordering" value="{{ old('ordering')}}" placeholder="Thứ tự">
                                {!! $errors->first('ordering','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>
                        <div class="form-group {!! $errors->first('description','has-error') !!}">
                            <label for="exampleInputName" class="col-sm-3 control-label">Ghi chú</label>
                            <div class="col-sm-9">
                                <textarea rows="4" placeholder="Ghi chú" class="form-control" name="description">{{ old('description')}}</textarea>
                                {!! $errors->first('description','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>
                        <div class="form-group {!! $errors->first('banner_image','has-error') !!}">
                            <label for="exampleInputName" class="col-sm-3 control-label">Hình ảnh <span class="required">*</span></label>
                            <div class="col-sm-9">
                                <input type="file" value="{{ old('banner_image')}}" name="banner_image" >
                                {!! $errors->first('banner_image','<span class="help-block">:message</span>') !!}
                                <p style="margin-top: 20px;">Kích thước 740 x 380</p>

                            </div>

                        </div>

                        <div class="form-group">
                            <label class="col-sm-3"></label>
                            <div class="col-sm-6">
                                <button type="submit" class="btn btn-primary">
                                    Thêm mới
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

@stop