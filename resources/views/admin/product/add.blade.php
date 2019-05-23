@extends('admin.layouts.master')
@section('title','Thêm mới sản phẩm')

@section('header')
@stop
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Thêm mới sản phẩm
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{route('index')}}"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
        <li class="active">Thêm mới sản phẩm</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <form role="form" method="POST" enctype="multipart/form-data" class="form-horizontal" action="{{ route('add_product') }}">
            @csrf
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Thông tin sản phẩm</h3>
                </div>
                
                <div class="box-body">
                    <div class="col-md-12">

                        <div class="col-md-6 form-group {!! $errors->first('name','has-error') !!}">
                            <label for="exampleInputName" class="col-sm-4 control-label">Tên</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="name" value="{{ old('name')}}" placeholder="Tên">
                                {!! $errors->first('name','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>
                        <div class="col-md-6 form-group {!! $errors->first('code','has-error') !!}">
                            <label for="exampleInputName" class="col-sm-4 control-label">Mã sản phẩm <span class="required">*</span></label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="code" value="{{ old('code')}}" placeholder="Mã sản phẩm">
                                {!! $errors->first('code','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>
                        <div class="col-md-6 form-group {!! $errors->first('category_id','has-error') !!}">
                            <label class="col-sm-4 control-label">Menu <span class="required">*</span></label>
                            <div class="col-sm-8">
                                <select class="form-control" id="category_id" name="category_id">
                                    <option value="" >{{'Chọn menu'}}</option>
                                    @foreach($menuOptions as $key => $value)
                                        <option value="{{ $key }}" {{ (old('category_id') == $key ) ? 'selected':''}}> {{ $value }}</option>
                                    @endforeach
                                </select>
                                {!! $errors->first('category_id','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>
                        <div class="col-md-6 form-group {!! $errors->first('sub_category_id','has-error') !!}">
                            <label class="col-sm-4 control-label">Sub menu <span class="required">*</span></label>
                            <div class="col-sm-8">
                                <select class="form-control" id="sub_category_id" name="sub_category_id">
                                    <option value="" >{{'Chọn sub menu'}}</option>
                                </select>
                                {!! $errors->first('sub_category_id','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>
                        <div class="col-md-6 form-group {!! $errors->first('color','has-error') !!}">
                            <label for="exampleInputName" class="col-sm-4 control-label">Màu sắc</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="color" value="{{ old('color')}}" placeholder="Màu sắc">
                                {!! $errors->first('color','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>
                        <div class="col-md-6 form-group {!! $errors->first('size','has-error') !!}">
                            <label for="exampleInputName" class="col-sm-4 control-label">Kích thước</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="size" value="{{ old('size')}}" placeholder="Kích thước">
                                {!! $errors->first('size','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>
                        <div class="col-md-6 form-group {!! $errors->first('weight','has-error') !!}">
                            <label for="exampleInputName" class="col-sm-4 control-label">Cân nặng</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="weight" value="{{ old('weight')}}" placeholder="Cân nặng">
                                {!! $errors->first('weight','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>
                        <div class="col-md-6 form-group {!! $errors->first('style','has-error') !!}">
                            <label for="exampleInputName" class="col-sm-4 control-label">Kiểu dáng</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="style" value="{{ old('style')}}" placeholder="Kiểu dáng">
                                {!! $errors->first('style','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>
                        <div class="col-md-6 form-group {!! $errors->first('description','has-error') !!}">
                            <label for="exampleInputName" class="col-sm-4 control-label">Ghi chú</label>
                            <div class="col-sm-8">
                                <textarea class="form-control" placeholder="Ghi chú" name="description"  rows="4">{{ old('description')}}</textarea>
                                {!! $errors->first('description','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

                        <div class="col-md-6 form-group {!! $errors->first('product_image','has-error') !!}">
                            <label for="exampleInputName" class="col-sm-4 control-label">Hình ảnh</label>
                            <div class="col-sm-8">
                                <input type="file" value="{{ old('product_image')}}" name="product_image" >
                                {!! $errors->first('product_image','<span class="help-block">:message</span>') !!}
                                <p style="margin-top: 20px;">Kích thước 270 x 270</p>

                            </div>
                        </div>

                        <div class="col-md-12 form-group ">
                            <label class="col-sm-2"></label>
                            <div class="col-sm-6">
                                <button type="submit" class="btn btn-success">
                                    Thêm mới
                                </button>
                                <a type="submit" class="btn btn-default margin" href="{{ route('list_product') }}">
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
        $(document).ready(function () {
            $("#category_id").change(function() {
                var category_id = $(this).val();
                var sub_category_id = '{{old('sub_category_id')}}';
                if(category_id != '') {
                    $("#sub_category_id").empty();
                    $.ajax({
                        type: "POST",
                        url: '{{route("getSubCategory")}}',
                        data: {"category_id": category_id},
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function (data) {
                            $("#sub_category_id").append($("<option />").val('').text('Chọn sub menu'));
                            $.each(data, function (i, data) {
                                $("#sub_category_id").append($("<option />").val(data.id).text(data.name));
                            });
                            $('#sub_category_id').val(sub_category_id);
                        }
                    });
                }
            });
            $("#category_id").trigger('change');
        });
    </script>

@stop