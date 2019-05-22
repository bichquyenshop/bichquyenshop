@extends('admin.layouts.auth')
@section('title','Đăng nhập')

@section('content')
<div class="login-box">
    <div class="login-logo">
        <a href="javascript:;">Bích Quyên Jewelry</a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Đăng nhập</p>

        <form method="post" action="{{route('postLogin')}}">
            @csrf
            @if($errors->has('message_login_failed'))
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                {{$errors->first('message_login_failed')}}
            </div>
            @endif
            <div class="form-group has-feedback {!! $errors->first('email','has-error') !!}">
                <input name="email" required maxlength="150" type="email" class="form-control" placeholder="Email" value="{{old('email')}}" autofocus>
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                {!! $errors->first('email','<span class="help-block">:message</span>') !!}
            </div>
            <div class="form-group has-feedback {!! $errors->first('password','has-error') !!}">
                <input required name="password" type="password" class="form-control" placeholder="Password">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                {!! $errors->first('password','<span class="help-block">:message</span>') !!}
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <a href="{{route('password.reset')}}">Quên mật khẩu</a>
                </div>
                <!-- /.col -->
                <div class="col-xs-5 pull-right">
                    <button type="submit" class="btn btn-success btn-block btn-flat">Đăng nhập</button>
                </div>
                <!-- /.col -->
            </div>
        </form>

    </div>
    <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
@stop

