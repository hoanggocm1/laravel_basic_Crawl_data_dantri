@extends('admin.main')
@section('content')
<?php
if (count($imageDetails) > 0) {
?>
    <div class="imageDetails" style="padding-bottom: 5%;">
        <div class=" imageProduct" style="text-align: center;">
            <h1> Hình ảnh đại điện sản phẩm </h1>
            <div>
                <a href="{{$product->image}} " target="_blank" id="show_image_product_a{{$product->id}}">
                    <img src="{{$product->image}}" width="30%" id="show_image_product_img{{$product->id}}">
                </a>
            </div>
        </div>
        <div class="row">
            <div class="form-group " style="padding-left: 20px;">
                <label for="menu" style="padding-left: 20%;">Input image</label>
                <div class="form-group ">
                    <input type="file" name="file1" value="{{old('file1')}}" class="form-control" id="uploadImageProduct">
                </div>
                <div id="image_change_name">
                    <p style="float: left;">Đường đẫn của hình ảnh:&ensp;
                    <p style="color:green; ">{{$product->image}} </p>
                    </p>
                </div>
                <div id="image_show" style="text-align: center;">
                    <a href="{{$product->image}}" target="_blank">
                        <img src="{{$product->image}}" value="{{$product->image}}" width="150px">
                    </a>
                </div>
                <input type="hidden" name="fileImageProduct" id="file" value="{{$product->image}}">
            </div>
            <div onclick="changeImageProduct(id)" id="{{$product->id}}" style="text-align: center; justify-items: center; padding-left: 20px; color: blue; cursor: pointer;"> <i class="fas fa-edit"> Lưu</i></div>
        </div>
        <h4 style="text-align: center;">-------------------------------------------------------------------------</h4>
        <h3>Hình ảnh chi tiết sản phẩm </h3>
        <form action="/admin/products/add-images-product/{{$product->id}}" method="post">
            <div class="row">
                <div class="form-group col-md-8" style="padding-left: 20px;">
                    <label for="menu" style="padding-left: 20%;">Input images</label>
                    <input type="file" name="file1s[]" value="{{old('file1s')}}" class="form-control" multiple="multiple" id="uploadImageProducts">
                    <input type="hidden" name="demImages" id="demImages">
                    <div id="block_image" style="display: flex; ">
                    </div>
                </div>
                <button style=" height: 20%; text-align: center; justify-items: center; padding-left: 20px; color: blue; cursor: pointer;"> <i class="fas fa-edit"> Thêm</i></button>
            </div>
            @csrf
        </form>
        <div style="display: flex; justify-content: space-between;">
            <div class="block2-pic hov-img0" style="display: flex; width: 100%; flex-wrap: wrap; padding: 5px;">
                @foreach($imageDetails as $key => $imageDetail)
                <div style="width:24%; background-color: transparent;position: relative;margin: 1px;background-color: black;" id="ImageProduct{{$imageDetail->id}}">
                    <a onclick="deleteImageProduct(id)" id="{{$imageDetail->id}}" style="color: red;height: 10%;position: absolute; padding: 10px; cursor: pointer; " value="{{$imageDetail->id}}">
                        Xóa
                    </a>
                    <a href="{{$imageDetail->image_product}} " target="_blank">
                        <img src="{{$imageDetail->image_product}}" width="100%" style="padding:3px; cursor: pointer; ">
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
<?php
} else { ?>
    <div class="imageDetails" style="padding-bottom: 5%;">
        <div class=" imageProduct" style="text-align: center;">
            <h1> Hình ảnh đại điện sản phẩm </h1>
            <div>
                <a href="{{$product->image}} " target="_blank" id="show_image_product_a{{$product->id}}">
                    <img src="{{$product->image}}" width="30%" id="show_image_product_img{{$product->id}}">
                </a>
            </div>
        </div>
        <div class="row">
            <div class="form-group " style="padding-left: 20px;">
                <label for="menu" style="padding-left: 20%;">Input image</label>
                <div class="form-group ">

                    <input type="file" name="file1" value="{{old('file1')}}" class="form-control" id="uploadImageProduct">
                </div>
                <div id="image_change_name">
                    <p style="float: left;">Đường đẫn của hình ảnh:&ensp;
                    <p style="color:green; ">{{$product->image}} </p>
                    </p>
                </div>
                <div id="image_show" style="text-align: center;">
                    <a href="{{$product->image}}" target="_blank">
                        <img src="{{$product->image}}" value="{{$product->image}}" width="150px">
                    </a>
                </div>
                <input type="hidden" name="fileImageProduct" id="file" value="{{$product->image}}">

            </div>
            <div onclick="changeImageProduct(id)" id="{{$product->id}}" style="text-align: center; justify-items: center; padding-left: 20px; color: blue; cursor: pointer;"> <i class="fas fa-edit"> Lưu</i></div>
        </div>
        <h4 style="text-align: center;">-------------------------------------------------------------------------</h4>
        <h3>Hình ảnh chi tiết sản phẩm </h3>
        <form action="/admin/products/add-images-product/{{$product->id}}" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="form-group col-md-8" style="padding-left: 20px;">
                    <label for="menu" style="padding-left: 20%;">Input images</label>
                    <input type="file" name="file1s[]" value="{{old('file1s')}}" class="form-control" multiple="multiple" id="uploadImageProducts">
                    <input type="hidden" name="demImages" id="demImages">
                    <div id="block_image" style="display: flex; ">
                    </div>
                </div>
                <button style=" height: 20%; text-align: center; justify-items: center; padding-left: 20px; color: blue; cursor: pointer;"> <i class="fas fa-edit"> Thêm</i></button>
            </div>
            @csrf
        </form>
    </div>
<?php
}
?>
@endsection