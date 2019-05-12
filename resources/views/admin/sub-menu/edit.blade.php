@extends('admin.layouts.master')
@section('title','Cập nhật sub menu')

@section('header')
@stop
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Cập nhật sub menu
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('index')}}"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
            <li class="active">Cập nhật sub menu</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <form role="form" method="POST" enctype="multipart/form-data" class="form-horizontal" action="{{ route('edit_sub_menu', $subMenu->id) }}">
                    @csrf
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Thông tin sub menu</h3>
                        </div>

                        <div class="box-body">
                            <div class="col-md-5">
                                <div class="form-group {!! $errors->first('name','has-error') !!}">
                                    <label for="exampleInputName" class="col-sm-2 control-label">Tên</label>
                                    <div class="col-sm-6">
                                        <input required maxlength="50" type="text" id="title" class="form-control" name="name" value="{{!empty(old('name')) ? old('name') : $subMenu->name}}" placeholder="Tên">
                                        {!! $errors->first('name','<span class="help-block">:message</span>') !!}
                                    </div>
                                </div>
                                <div class="form-group {!! $errors->first('category_id','has-error') !!}">
                                    <label class="col-sm-2 control-label">Menu</label>
                                    <div class="col-sm-6">
                                        <select required class="form-control" name="category_id">
                                            <option value="" >{{'Chọn menu'}}</option>
                                            @foreach($menuOptions as $key => $value)
                                                <option value="{{ $key }}" {{ ((!empty(old('category_id')) ? old('category_id') : $subMenu->category_id)  == $key ) ? 'selected':''}}> {{ $value }}</option>
                                            @endforeach
                                        </select>
                                        {!! $errors->first('category_id','<span class="help-block">:message</span>') !!}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2"></label>
                                    <div class="col-sm-6">
                                        <button type="submit" class="btn btn-primary">
                                            Cập nhật
                                        </button>
                                        <a type="submit" class="btn btn-default margin" href="{{ route('list_menu') }}">
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