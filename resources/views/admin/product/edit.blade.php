@extends('admin.layouts.master')
@section('title','Cập nhật sản phẩm')

@section('header')
@stop
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Cập nhật sản phẩm
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{route('index')}}"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
        <li class="active">Cập nhật sản phẩm</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <form role="form" method="POST" enctype="multipart/form-data" class="form-horizontal" action="{{ route('edit_product', $product->id) }}">
            @csrf
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Thông tin sản phẩm</h3>
                </div>
                
                <div class="box-body">
                    <div class="col-md-12">

                        <div class="col-md-6 form-group {!! $errors->first('name','has-error') !!}">
                            <label for="exampleInputName" class="col-sm-4 control-label">Tên</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="name" value="{{ !empty(old('name')) ? old('name') : $product->name }}" placeholder="Tên">
                                {!! $errors->first('name','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>
                        <div class="col-md-6 form-group {!! $errors->first('code','has-error') !!}">
                            <label for="exampleInputName" class="col-sm-4 control-label">Mã sản phẩm <span class="required">*</span></label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="code" value="{{ !empty(old('code')) ? old('code') : $product->code }}" placeholder="Mã sản phẩm">
                                {!! $errors->first('code','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>
                        <div class="col-md-6 form-group {!! $errors->first('category_id','has-error') !!}">
                            <label class="col-sm-4 control-label">Menu</label>
                            <div class="col-sm-8">
                                <select  class="form-control" id="category_id" name="category_id">
                                    <option value="" >{{'Chọn menu'}}</option>
                                    @foreach($menuOptions as $key => $value)
                                        <option {{ (!empty(old('category_id')) ? old('category_id') : $product->category_id)  == $key ? 'selected' : '' }} value="{{ $key }}" {{ (old('category_id') == $key ) ? 'selected':''}}> {{ $value }}</option>
                                    @endforeach
                                </select>
                                {!! $errors->first('category_id','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>
                        <div class="col-md-6 form-group {!! $errors->first('sub_category_id','has-error') !!}">
                            <label class="col-sm-4 control-label">Sub menu</label>
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
                                <input type="text" class="form-control" name="color" value="{{ !empty(old('color')) ? old('color') : $product->color }}" placeholder="Màu sắc">
                                {!! $errors->first('color','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>
                        <div class="col-md-6 form-group {!! $errors->first('size','has-error') !!}">
                            <label for="exampleInputName" class="col-sm-4 control-label">Kích thước</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="size" value="{{ !empty(old('size')) ? old('size') : $product->size }}" placeholder="Kích thước">
                                {!! $errors->first('size','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>
                        <div class="col-md-6 form-group {!! $errors->first('weight','has-error') !!}">
                            <label for="exampleInputName" class="col-sm-4 control-label">Cân nặng</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="weight" value="{{ !empty(old('weight')) ? old('weight') : $product->weight }}" placeholder="Cân nặng">
                                {!! $errors->first('weight','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>
                        <div class="col-md-6 form-group {!! $errors->first('style','has-error') !!}">
                            <label for="exampleInputName" class="col-sm-4 control-label">Kiểu dáng</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="style" value="{{ !empty(old('style')) ? old('style') : $product->style }}" placeholder="Kiểu dáng">
                                {!! $errors->first('style','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

                        <div class="col-md-6 form-group {!! $errors->first('product_image','has-error') !!}">
                            <label for="exampleInputName" class="col-sm-4 control-label">Hình ảnh</label>
                            <div class="col-sm-8">
                                <input type="hidden" name="product_image_old" value="{{$product->image}}" >
                                <input type="file" name="product_image" >
                                {!! $errors->first('product_image','<span class="help-block">:message</span>') !!}
                            </div>

                            @if($product->image)
                                <div style="padding-top: 50px;" class="col-md-12">
                                    <label for="exampleInputName" class="col-sm-2 control-label"></label>
                                    <div  class="form-group show_image">
                                        <div class="col-sm-6">
                                            <div>
                                                <img class="img-responsive" src="/{{ $product->image}}">
                                            </div>
                                        </div>
                                        <a class="btn btn-app remove_image">
                                            <i class="fa fa-remove"></i> Xóa
                                        </a>
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="col-md-6 form-group {!! $errors->first('description','has-error') !!}">
                            <label for="exampleInputName" class="col-sm-4 control-label">Ghi chú</label>
                            <div class="col-sm-8">
                                <textarea class="form-control" placeholder="Ghi chú" name="description"  rows="4">{{ !empty(old('description')) ? old('description') : $product->description }}</textarea>
                                {!! $errors->first('description','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>


                        <div class="col-md-12 form-group ">
                            <label class="col-sm-1"></label>
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
        var num = 0;
        $(function () {
            $('.remove_image').click(function(){
                $('#image').val('');
                $(this).parent().parent().remove();
            });
        });
        $(document).ready(function () {
            $("#category_id").change(function() {
                var category_id = $(this).val();
                var sub_category_id = '{{!empty(old('sub_category_id')) ? old('sub_category_id') : $product->sub_category_id}}';
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
                            if(num == 0){
                                $('#sub_category_id').val(sub_category_id);
                                num = 1;
                            }
                        }
                    });
                }
            });
            $("#category_id").trigger('change');
        });
    </script>

@stop