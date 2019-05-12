@extends('admin.layouts.master')
@section('header')

@stop

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Danh sách sản phẩm
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{route('index')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Danh sách sản phẩm</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header">
                    <a class="btn btn-primary" href="{{ route('add_product') }}">
                        <i class="fa fa-plus"></i> Thêm mới
                    </a>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive">
                    <table class="table table-bordered">
                        <tr>
                            <th>Tiêu đề</th>
                            <th>Tên danh mục</th>
                            <th>Trạng thái</th>
                            <th width="50px" class="text-center">Sửa</th>
                            <th width="50px" class="text-center">Xóa</th>
                        </tr>
                        {{--@foreach($list as $article)--}}
                            {{--<tr>--}}
                                {{--<td>{{$article->title}}</td>--}}
                                {{--<td>{{ !empty($article->category_name) ? $article->category_name : "" }}</td>--}}
                                {{--<td>--}}
                                    {{--{!! Helper::status_icon($article->status) !!}--}}
                                {{--</td>--}}
                                {{--<td class="text-center">--}}
                                    {{--@can('content.editArticle')--}}
                                        {{--<a href="{{ route('article_edit',$article->article_id) }}"><i class="glyphicon glyphicon-edit"></i></a>--}}
                                    {{--@endcan--}}
                                {{--</td>--}}
                                {{--<td class="text-center">--}}
                                    {{--@can('content.deleteArticle')--}}
                                        {{--<a href="javascript:;" class="ajax_action_article"  data-id="{{$article->article_id}}" data-method="POST" data-action="{{route('article_delete')}}" data-label="Xóa bài viết?" > <i class="fa fa-remove"></i></a>--}}
                                    {{--@endcan--}}
                                {{--</td>--}}
                            {{--</tr>--}}

                        {{--@endforeach--}}

                    </table>
                </div>


                <!-- /.box-body -->
                <div class="box-footer clearfix">


                </div>
            </div>
        </div>
    </div>

</section>
@stop
<!-- /.content -->
@section('script')
    {{--<script>--}}
        {{--function call_ajax_article(element){--}}
            {{--var data_id = $(element).attr('data-id');--}}
            {{--var data_method = $(element).attr('data-method');--}}
            {{--var data_action = $(element).attr('data-action');--}}
            {{--if(data_id && data_method && data_action && data_id > 0){--}}
                {{--$.ajax({--}}
                    {{--method: data_method,--}}
                    {{--url: data_action,--}}
                    {{--type: 'json',--}}
                    {{--data: {"id" : data_id},--}}
                    {{--headers: {--}}
                        {{--'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')--}}
                    {{--},--}}
                    {{--success: function (response) {--}}
                        {{--if(response.error == 0){--}}
                            {{--$.growl.notice({title: "Thành công", message: response.message });--}}
                            {{--location.reload();--}}
                        {{--} else if(response.error == 1){--}}
                            {{--$.growl.error({title: "Error", message: response.message });--}}
                        {{--}--}}
                    {{--},--}}
                    {{--error: function (xhr, ajaxOptions, thrownError) {--}}
                        {{--$.growl.error({title: "Error", message: xhr.responseJSON.message });--}}
                    {{--}--}}
                {{--});--}}

            {{--} else {--}}
                {{--$.growl.error({title: "Error", message: "Dữ liệu không chính xác" });--}}
            {{--}--}}
        {{--}--}}

        {{--$(document).ready(function() {--}}
            {{--$('.ajax_action_article').click(function(){--}}
                {{--var self = this;--}}
                {{--$.confirm({--}}
                    {{--title: 'Xác nhận!',--}}
                    {{--content: $(this).attr('data-label'),--}}
                    {{--buttons: {--}}
                        {{--confirm: function () {--}}
                            {{--call_ajax_article(self);--}}
                        {{--},--}}
                        {{--cancel: function () {--}}
                        {{--},--}}

                    {{--}--}}
                {{--});--}}

            {{--});--}}
        {{--});--}}
    {{--</script>--}}

@stop