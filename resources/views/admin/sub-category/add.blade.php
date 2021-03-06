@extends('admin.layouts.master')
@section('title','Thêm mới sub menu')

@section('header')
@stop
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Thêm mới sub menu
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{route('index')}}"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
        <li class="active">Thêm mới sub menu</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <form role="form" method="POST" enctype="multipart/form-data" class="form-horizontal" action="{{ route('add_sub_menu') }}">
            @csrf
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Thông tin sub menu</h3>
                </div>
                
                <div class="box-body">
                    <div class="col-md-8">
                        <div class="form-group {!! $errors->first('name','has-error') !!}">
                            <label for="exampleInputName" class="col-sm-2 control-label">Tên <span class="required">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" id="title" class="form-control" name="name" value="{{ old('name')}}" placeholder="Tên">
                                {!! $errors->first('name','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>
                        <div class="form-group {!! $errors->first('category_id','has-error') !!}">
                            <label class="col-sm-2 control-label">Menu <span class="required">*</span></label>
                            <div class="col-sm-10">
                                <select class="form-control" name="category_id">
                                    <option value="" >{{'Chọn menu'}}</option>
                                    @foreach($menuOptions as $key => $value)
                                        <option value="{{ $key }}" {{ (old('category_id') == $key ) ? 'selected':''}}> {{ $value }}</option>
                                    @endforeach
                                </select>
                                {!! $errors->first('category_id','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>
                        <div class="form-group {!! $errors->first('description','has-error') !!}">
                            <label for="exampleInputName" class="col-sm-2 control-label">Giới thiệu</label>
                            <div class="col-sm-10">
                                <textarea id="editor" class="form-control"  name="description" rows="5">{{old('description')}}</textarea>
                                {!! $errors->first('description','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2"></label>
                            <div class="col-sm-6">
                                <button type="submit" class="btn btn-success">
                                    Thêm mới
                                </button>
                                <a type="submit" class="btn btn-default margin" href="{{ route('list_sub_menu') }}">
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
            CKEDITOR.replace( 'editor', {
                filebrowserUploadUrl: "{{route('upload_img').'?_token='.csrf_token()}}",
                filebrowserUploadMethod : 'form',
                extraPlugins: 'colorbutton,colordialog,font',
                colorButton_enableAutomatic: false
            });

        });
    </script>
@stop