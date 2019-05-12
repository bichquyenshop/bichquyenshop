@extends('layouts.master')
@section('title','Thêm mới danh mục')

@section('header')
<!-- iCheck -->
<link rel="stylesheet" href="/static/plugins/iCheck/square/blue.css">
@stop
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Thêm mới bài viết
    </h1>
    <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
        <li><a href="{{route('article_list')}}">Bài viết</a></li>
        <li class="active">Thêm mới bài viết</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <form role="form" method="POST" enctype="multipart/form-data" class="form-horizontal" action="{{ route('article_add') }}">
            @csrf
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Thông tin bài viết</h3>
                </div>
                
                <div class="box-body">
                    <div class="col-md-11">
                        <div class="form-group {!! $errors->first('title','has-error') !!}">
                            <label for="exampleInputName" class="col-sm-3 control-label">Tiêu đề</label>
                            <div class="col-sm-9">
                                <input type="text" id="title" onkeyup="ChangeToSlug();" class="form-control" name="title" value="{{ old('title')}}" placeholder="Tiêu đề">
                                {!! $errors->first('title','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

                        <div class="form-group {!! $errors->first('slug','has-error') !!}">
                            <label for="exampleInputName" class="col-sm-3 control-label">Slug</label>
                            <div class="col-sm-9">
                                <input type="text" id="slug" class="form-control" name="slug" value="{{ old('slug')}}" placeholder="Slug">
                                {!! $errors->first('slug','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

                        <div class="form-group {!! $errors->first('category_id', 'has-error') !!}">
                            <label for="exampleInputName" class="col-sm-3 control-label">Danh mục</label>
                            <div class="col-sm-6">
                                <select class="form-control" name="category_id">
                                    @foreach($categories as $key => $value)
                                        <option value="{{ $key }}" {{ (old('category_id') == $key ) ? 'selected':''}}> {{ $value }}</option>
                                    @endforeach
                                </select>
                                 {!! $errors->first('category_id','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

                        <div class="form-group {!! $errors->first('description','has-error') !!}">
                            <label for="exampleInputName" class="col-sm-3 control-label">Mô tả ngắn</label>
                            <div class="col-sm-9">
                                <textarea class="form-control"  name="description" rows="3">{{ old('description')}}</textarea>
                                {!! $errors->first('description','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

                        <div class="form-group {!! $errors->first('content','has-error') !!}">
                            <label for="exampleInputName" class="col-sm-3 control-label">Nội dung</label>
                            <div class="col-sm-9">
                                <textarea id="editor" class="form-control" name="content" rows="5">{{ old('content')}}</textarea>
                                {!! $errors->first('content','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

                        <div class="form-group {!! $errors->first('input_image','has-error') !!}">
                            <label class="col-sm-3 control-label">Hình ảnh</label>
                            <div class="col-sm-6">
                                <input type="file" id="exampleInputFile" name="input_image">
                                {!! $errors->first('input_image','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

                        @can('content.addArticle')
                        <div class="form-group">
                            <label class="col-sm-3"></label>
                            <div class="col-sm-6">
                                <button type="submit" class="btn btn-primary">
                                    Thêm mới
                                </button>
                                <a type="submit" class="btn btn-default margin" href="{{ route('article_list') }}">
                                    Bỏ qua
                                </a>
                            </div>
                        </div>
                        @endcan
                    </div>
                    <div class="col-md-1"></div>
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
    function ChangeToSlug()
    {
        var title, slug;

        //Lấy text từ thẻ input title
        title = document.getElementById("title").value;

        //Đổi chữ hoa thành chữ thường
        slug = title.toLowerCase();

        //Đổi ký tự có dấu thành không dấu
        slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
        slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
        slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
        slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
        slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
        slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
        slug = slug.replace(/đ/gi, 'd');
        //Xóa các ký tự đặt biệt
        slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
        //Đổi khoảng trắng thành ký tự gạch ngang
        slug = slug.replace(/ /gi, "-");
        //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
        //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
        slug = slug.replace(/\-\-\-\-\-/gi, '-');
        slug = slug.replace(/\-\-\-\-/gi, '-');
        slug = slug.replace(/\-\-\-/gi, '-');
        slug = slug.replace(/\-\-/gi, '-');
        //Xóa các ký tự gạch ngang ở đầu và cuối
        slug = '@' + slug + '@';
        slug = slug.replace(/\@\-|\-\@|\@/gi, '');
        //In slug ra textbox có id “slug”
        document.getElementById('slug').value = slug;
    }
    $(function () {
        CKEDITOR.replace( 'editor', {
            filebrowserUploadUrl: "{{route('upload_img').'?_token='.csrf_token()}}",
            filebrowserUploadMethod : 'form'
        });
    })

</script>
@stop