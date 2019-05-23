@extends('admin.layouts.master')
@section('header')

@stop

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Danh sách banner
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{route('index')}}"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
        <li class="active">Danh sách banner</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-success">
                <div class="box-header">
                    <a class="btn btn-success" href="{{ route('add_banner') }}">
                        <i class="fa fa-plus"></i> Thêm mới
                    </a>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Tiêu đề</th>
                                <th>Ghi chú</th>
                                <th>Thứ tự</th>
                                <th>Url</th>
                                <th width="50px" class="text-center">Sửa</th>
                                <th width="50px" class="text-center">Xóa</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($list as $banner)
                            <tr>
                                <td>{{$banner->title}}</td>
                                <td>{{$banner->description}}</td>
                                <td>{{$banner->ordering}}</td>
                                <td>{{$banner->image}}</td>
                                <td class="text-center">
                                    <a href="{{ route('edit_banner',$banner->id) }}"><i class="glyphicon glyphicon-edit"></i></a>
                                </td>
                                <td class="text-center">
                                    <a href="javascript:;" class="ajax_action"  data-id="{{$banner->id}}" data-method="POST" data-action="{{route('delete_banner')}}" data-label="Xóa banner?" > <i class="fa fa-remove"></i></a>
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
    })
</script>
@stop