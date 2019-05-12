@extends('admin.layouts.master')

@section('header')
@stop
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Đổi mật khẩu
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{route('index')}}"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
        <li class="active"> Đổi mật khẩu</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <form role="form" method="POST" class="form-horizontal" action="{{ route('users_edit_password',$id) }}">
            @csrf
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Đổi mật khẩu</h3>
                </div>
                
                <div class="box-body">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <div class="form-group {!! $errors->first('oldPassword','has-error') !!}">
                            <label for="exampleInputPassword" class="col-sm-4 control-label">Mật khẩu cũ</label>
                            <div class="col-sm-6">
                                <input maxlength="30" required type="password" class="form-control" name="oldPassword" value="" placeholder="Mật khẩu cũ">
                                {!! $errors->first('oldPassword','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

                        <div class="form-group {!! $errors->first('password','has-error') !!}">
                            <label for="exampleInputPassword" class="col-sm-4 control-label">Mật khẩu mới</label>
                            <div class="col-sm-6">
                                <input maxlength="30" required type="password" class="form-control" name="password" value="" placeholder="Mật khẩu">
                                {!! $errors->first('password','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

                        <div class="form-group {!! $errors->first('confirm_password','has-error') !!}">
                            <label for="exampleInputPassword" class="col-sm-4 control-label">Nhập lại mật khẩu mới</label>
                            <div class="col-sm-6">
                                <input maxlength="30" required type="password" class="form-control" name="confirm_password" value="" placeholder="Nhập lại mật khẩu">
                                {!! $errors->first('confirm_password','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label"></label>
                            <div class="col-sm-6">
                                <button type="submit" class="btn btn-primary">
                                    Cập nhật
                                </button>
                                <a type="submit" class="btn btn-default margin" href="{{ route('list_product') }}">
                                    Bỏ qua
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3"></div>
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