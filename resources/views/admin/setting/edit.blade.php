@extends('admin.layouts.master')
@section('title','Cài đặt')

@section('header')
@stop
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Cài đặt
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('index')}}"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
            <li class="active">Cài đặt</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <form role="form" method="POST" enctype="multipart/form-data" class="form-horizontal" action="{{ route('edit_setting') }}">
                    @csrf
                    <div class="box box-success">
                        <div class="box-header with-border">
                            <h3 class="box-title">Cài đặt</h3>
                        </div>

                        <div class="box-body">
                            <div class="col-md-12">
                                <div class="form-group {!! $errors->first('address','has-error') !!}">
                                    <label for="exampleInputName" class="col-sm-2 control-label">Địa chỉ</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="address" value="{{!empty(old('address')) ? old('address') : $setting->address}}" placeholder="Địa chỉ">
                                        {!! $errors->first('address','<span class="help-block">:message</span>') !!}
                                    </div>
                                </div>
                                <div class="form-group {!! $errors->first('tel','has-error') !!}">
                                    <label for="exampleInputName" class="col-sm-2 control-label">Điện thoại</label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control" name="tel" value="{{!empty(old('tel')) ? old('tel') : $setting->tel}}" placeholder="Điện thoại">
                                        {!! $errors->first('tel','<span class="help-block">:message</span>') !!}
                                    </div>
                                </div>
                                <div class="form-group {!! $errors->first('email','has-error') !!}">
                                    <label for="exampleInputName" class="col-sm-2 control-label">Email</label>
                                    <div class="col-sm-8">
                                        <input type="email" class="form-control" name="email" value="{{!empty(old('email')) ? old('email') : $setting->email}}" placeholder="Email">
                                        {!! $errors->first('email','<span class="help-block">:message</span>') !!}
                                    </div>
                                </div>
                                <div class="form-group {!! $errors->first('link_fb','has-error') !!}">
                                    <label for="exampleInputName" class="col-sm-2 control-label">Link Facebook</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="link_fb" value="{{!empty(old('link_fb')) ? old('link_fb') : $setting->link_fb}}" placeholder="Link Facebook">
                                        {!! $errors->first('link_fb','<span class="help-block">:message</span>') !!}
                                    </div>
                                </div>
                                <div class="form-group {!! $errors->first('link_ins','has-error') !!}">
                                    <label for="exampleInputName" class="col-sm-2 control-label">Link Instagram</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="link_ins" value="{{!empty(old('link_ins')) ? old('link_ins') : $setting->link_ins}}" placeholder="Link Instagram">
                                        {!! $errors->first('link_ins','<span class="help-block">:message</span>') !!}
                                    </div>
                                </div>
                                <div class="form-group {!! $errors->first('link_youtube','has-error') !!}">
                                    <label for="exampleInputName" class="col-sm-2 control-label">Link Youtube</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="link_youtube" value="{{!empty(old('link_youtube')) ? old('link_youtube') : $setting->link_youtube}}" placeholder="Link Youtube">
                                        {!! $errors->first('link_youtube','<span class="help-block">:message</span>') !!}
                                    </div>
                                </div>
                                <div class="form-group {!! $errors->first('description','has-error') !!}">
                                    <label for="exampleInputName" class="col-sm-2 control-label">Giới thiệu</label>
                                    <div class="col-sm-8">
                                        <textarea id="editor" class="form-control"  name="description" rows="5">{{!empty(old('description')) ? old('description') : $setting->description}}</textarea>
                                        {!! $errors->first('description','<span class="help-block">:message</span>') !!}
                                    </div>
                                </div>
                                <div class="form-group {!! $errors->first('logo_image','has-error') !!}">
                                    <label for="exampleInputName" class="col-sm-2 control-label">Logo</label>
                                    <div class="col-sm-8">
                                        <input type="hidden" name="id" value="{{$setting->id}}" >
                                        <input type="hidden" name="logo_image_old" value="{{$setting->logo}}" >
                                        <input type="file" value="{{ old('logo_image')}}" name="logo_image" >
                                        {!! $errors->first('logo_image','<span class="help-block">:message</span>') !!}
                                    </div>
                                </div>
                                @if($setting->logo)
                                    <div style="padding-top: 30px;" class="col-md-12 no-padding">
                                        <label for="exampleInputName" class="col-sm-2 control-label"></label>
                                        <div  class="form-group show_image">
                                            <div class="col-sm-3 ">
                                                <div>
                                                    <img class="img-responsive" src="/{{ $setting->logo}}">
                                                </div>
                                            </div>
                                            <a class="btn btn-app remove_image">
                                                <i class="fa fa-remove"></i> Xóa
                                            </a>
                                        </div>
                                    </div>
                                @endif
                                <div class="form-group">
                                    <label class="col-sm-2"></label>
                                    <div class="col-sm-6">
                                        <button type="submit" class="btn btn-success">
                                            Cập nhật
                                        </button>
                                        <a type="submit" class="btn btn-default margin" href="{{ route('edit_setting') }}">
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

        $('.remove_image').click(function(){
            $('#image').val('');
            $(this).parent().parent().remove();
        });
    });
</script>
@stop