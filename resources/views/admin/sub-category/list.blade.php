@extends('admin.layouts.master')
@section('header')

@stop

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Danh sách menu
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{route('index')}}"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
        <li class="active">Danh sách menu</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header">
                    <a class="btn btn-primary" href="{{ route('add_sub_menu') }}">
                        <i class="fa fa-plus"></i> Thêm mới
                    </a>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Tên</th>
                                <th>Menu</th>
                                <th width="50px" class="text-center">Sửa</th>
                                <th width="50px" class="text-center">Xóa</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($list as $subMenu)
                            <tr>
                                <td>{{$subMenu->name}}</td>
                                <td>{{$subMenu->category_name}}</td>
                                <td class="text-center">
                                    <a href="{{ route('edit_sub_menu',$subMenu->id) }}"><i class="glyphicon glyphicon-edit"></i></a>
                                </td>
                                <td class="text-center">
                                    <a href="javascript:;" class="ajax_action"  data-id="{{$subMenu->id}}" data-method="POST" data-action="{{route('delete_sub_menu')}}" data-label="Xóa sub menu?" > <i class="fa fa-remove"></i></a>
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