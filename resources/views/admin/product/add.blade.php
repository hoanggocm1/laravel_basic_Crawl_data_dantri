@extends('admin.main')
@section('content')



<form action="" method="POST" enctype="multipart/form-data">
    <div class="card-body">

        <div class="form-group">
            <label for="menu">Tên sản phẩm </label>
            <input type="text" name="name" class="form-control" value="{{old('name')}}" required autofocus placeholder="Nhập tên sản phẩm">
        </div>

        <div class="form-group">
            <label>Danh mục</label>
            <select class="form-control" name="menu_id">
                {!! \App\Helpers\Helper::listMenuProduct($menus) !!}
            </select>
        </div>

        <div class="form-group">
            <label>Mô tả </label>
            <textarea name="content" class="form-control" required placeholder="Điền mô tả">{{old('content')}}</textarea>
        </div>

        <div class="form-group">
            <label>Mô tả chi tiết</label>
            <textarea name="description" class="form-control" required placeholder="Chi tiết">{{old('description')}}</textarea>
        </div>
        <div class="form-group">
            <label for="menu">Giá </label>
            <input type="number" name="price" value="{{old('price')}}" required class="form-control" placeholder="Nhập giá">
        </div>
        <div class="form-group">
            <label for="menu">Giá giảm </label>
            <input type="number" name="price_sale" value="{{old('price_sale')}}" required class="form-control" placeholder="Nhập giá giảm">
        </div>
        <div class="form-group">
            <label for="menu">Quantity</label>
            <input type="number" name="qty" value="{{old('qty')}}" required class="form-control" placeholder="Nhập số lượng">
        </div>
        <div class="form-group">
            <label for="menu">Hình ảnh đại diện</label>


            <input type="file" name="file1" value="{{old('file')}}" class="form-control" id="uploadImageProduct">
            <div id="image_change_name">

            </div>
            <div id="image_show">

            </div>
            <input type="hidden" name="file" id="file">

        </div>

        <div class="form-group m-4">
            <label>Trạng thái</label>
            <div class="form-group">
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="2" type="radio" id="active" name="active" checked="">
                    <label for="active" class="custom-control-label">Approve</label>
                </div>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="1" type="radio" id="no_active" name="active">
                    <label for="no_active" class="custom-control-label">Pending</label>
                </div>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="0" type="radio" id="no_active_" name="active">
                    <label for="no_active_" class="custom-control-label">Reject</label>
                </div>
            </div>
        </div>
    </div>
    <!-- /.card-body -->

    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Thêm sản phẩm</button>
    </div>
    @csrf
</form>
<input type="hidden" id="files0sss">
<button id="testbtm"></button>
@endsection