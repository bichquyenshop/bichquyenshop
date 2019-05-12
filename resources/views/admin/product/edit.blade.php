@extends('layouts.master')
@section('title','Cập nhật danh mục')

@section('header')
<!-- iCheck -->
<link rel="stylesheet" href="/static/plugins/iCheck/square/blue.css">
@stop
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Cập nhật bài viết
    </h1>
    <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{route('article_list')}}">Bài viết</a></li>
        <li class="active">Cập nhật bài viết</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <form role="form" method="POST" enctype="multipart/form-data" class="form-horizontal" action="{{ route('article_edit',$article->article_id) }}">
            @csrf
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Thông tin bài viết</h3>
                </div>
                
                <div class="box-body">
                    <div class="col-md-11">
                        <div class="form-group {!! $errors->first('name','has-error') !!}">
                            {{--@can('content.verifyCategory')--}}
                            <div class="col-sm-3 control-label"></div>
                            <div class="col-sm-6">
                                @if($article->status == config('config.status.actived'))
                                <button class="btn btn-success ajax_action_article_verify" type="button" data-id="{{$article->article_id}}" data-method="POST" data-action="{{route('article_verify')}}" data-label="Thay đổi trạng thái thành chờ duyệt?"><i class="fa fa-check"></i> Đã kích hoạt</button>
                                @else
                                <button class="btn btn-danger ajax_action_article_verify" type="button" data-id="{{$article->article_id}}" data-method="POST" data-action="{{route('article_verify')}}" data-label="Thay đổi trạng thái thành kích hoạt?"><i class="fa fa-close"></i> Chưa kích hoạt</button>
                                @endif
                            </div>
                            {{--@endcan--}}
                        </div>

                        <div class="form-group {!! $errors->first('title','has-error') !!}">
                            <label for="exampleInputName" class="col-sm-3 control-label">Tiêu đề</label>
                            <div class="col-sm-9">
                                <input type="text"  id="title" onkeyup="ChangeToSlug();" class="form-control" name="title" value="{{ !empty(old('title')) ? old('title') : $article->title}}" placeholder="Tiêu đề">
                                {!! $errors->first('title','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

                        <div class="form-group {!! $errors->first('slug','has-error') !!}">
                            <label for="exampleInputName" class="col-sm-3 control-label">Slug</label>
                            <div class="col-sm-9">
                                <input type="text"  id="slug" class="form-control" name="slug" value="{{ !empty(old('slug')) ? old('slug') : $article->slug}}" placeholder="Slug">
                                {!! $errors->first('slug','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

                        <div class="form-group {!! $errors->first('category_id', 'has-error') !!}">
                            <label for="exampleInputName" class="col-sm-3 control-label">Danh mục</label>
                            <div class="col-sm-6">
                                <select class="form-control" name="category_id">
                                    @foreach($categories as $key => $value)
                                        <option value="{{ $key }}" {{ ($article->category_id == $key ) ? 'selected' : ''}}> {{ $value }}</option>
                                    @endforeach
                                </select>
                                {!! $errors->first('category_id','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

                        <div class="form-group {!! $errors->first('description','has-error') !!}">
                            <label for="exampleInputName" class="col-sm-3 control-label">Mô tả ngắn</label>
                            <div class="col-sm-9">
                                <textarea class="form-control"  name="description" rows="3">{{ !empty(old('description')) ? old('description') : $article->description}}</textarea>
                                {!! $errors->first('description','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

                        <div class="form-group {!! $errors->first('content','has-error') !!}">
                            <label for="exampleInputName" class="col-sm-3 control-label">Nội dung</label>
                            <div class="col-sm-9">
                                <textarea id="editor" class="form-control"  name="content" rows="5">{{!empty(old('content')) ? old('content') : $article->content}}</textarea>
                                {!! $errors->first('content','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

                        <div class="form-group {!! $errors->first('input_image','has-error') !!}">
                            <label class="col-sm-3 control-label">Hình ảnh</label>
                            <div class="col-sm-6">
                                <input type="file" id="exampleInputFile" name="input_image">
                                <input type="hidden" name="image" id="image" value="{{$article->image}}">
                                {!! $errors->first('input_image','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>
                        @if($article->image)
                            <div class="form-group show_image">
                                <label class="col-sm-3 control-label"></label>
                                <div class="col-sm-6">
                                    <div style="border: 1px solid ;">
                                        <img class="img-responsive" src="{{ Image::getImageUrl($article->image,'size4')}}">
                                    </div>
                                </div>
                                <div class="col-sm-1">
                                    <a class="btn btn-app remove_image">
                                        <i class="fa fa-remove"></i> Xóa
                                    </a>
                                </div>
                            </div>
                        @endif

                    @can('content.editArticle')
                        <div class="form-group">
                            <label class="col-sm-3 control-label"></label>
                            <div class="col-sm-6">
                                <button type="submit" class="btn btn-primary">
                                    Cập nhật
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
<!-- iCheck -->
<script src="/static/plugins/iCheck/icheck.min.js"></script>

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

        $('input[type="checkbox"]').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' /* optional */
        });

        $('.remove_image').click(function(){
            $('#image').val('');
            $(this).parent().parent().remove();
        });
    });
    function call_ajax_article_verify(element){
        var data_id = $(element).attr('data-id');
        var data_method = $(element).attr('data-method');
        var data_action = $(element).attr('data-action');
        if(data_id && data_method && data_action && data_id > 0){
            $.ajax({
                method: data_method,
                url: data_action,
                type: 'json',
                data: {"id" : data_id},
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                    if(response.error == 0){
                        $.growl.notice({title: "Thành công", message: response.message });
                        location.reload();
                    } else if(response.error == 1){
                        $.growl.error({title: "Error", message: response.message });
                    }
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    $.growl.error({title: "Error", message: xhr.responseJSON.message });
                }
            });

        } else {
            $.growl.error({title: "Error", message: "Dữ liệu không chính xác" });
        }
    }
    $(document).ready(function() {
        $('.ajax_action_article_verify').click(function(){
            var self = this;
            $.confirm({
                title: 'Xác nhận!',
                content: $(this).attr('data-label'),
                buttons: {
                    confirm: function () {
                        call_ajax_article_verify(self);
                    },
                    cancel: function () {
                    },

                }
            });

        });
    });
</script>
@stop
