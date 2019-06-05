@extends('admin.layouts.master')
@section('header')

@stop

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Danh sách bình luận
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{route('index')}}"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
        <li class="active">Danh sách bình luận</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-success">
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Tên</th>
                                <th>Sản phẩm</th>
                                <th>Mã sản phẩm</th>
                                <th>Tiêu đề</th>
                                <th>Nội dung</th>
                                <th>Điểm đánh giá</th>
                                <th>Ngày giờ</th>
                                <th>Trạng thái</th>
                                <th width="50px" class="text-center">Chi tiết</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($list as $comment)
                            <tr>
                                <td>{{$comment->user_name}}</td>
                                <td>{{$comment->product_name}}</td>
                                <td>{{$comment->code}}</td>
                                <td>{{$comment->title}}</td>
                                <td>{{$comment->content}}</td>
                                <td>{{$comment->star}}</td>
                                <td>{{date('d/m/y H:i:s', $comment->time)}}</td>
                                <td>
                                    @if($comment->status == 1)
                                        {{'Hiển thị'}}
                                    @else
                                        {{'Không hiển thị'}}
                                    @endif

                                </td>

                                <td class="text-center">
                                    <a href="{{route('detail_comment', $comment->id)}}"  > <i class="fa fa-info-circle"></i></a>
                                </td>
                            </tr>

                        @endforeach
                        </tbody>
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
<script>
    $('#example1').DataTable({
        'paging'      : true,
        'lengthChange': true,
        'searching'   : true,
        'ordering'    : false,
        'info'        : true,
        'autoWidth'   : true
    })</script>
@stop