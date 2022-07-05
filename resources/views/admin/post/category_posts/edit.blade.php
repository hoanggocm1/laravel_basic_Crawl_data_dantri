@extends('admin.main')
@section('content')

<form action="" method="POST">
    <div class="card-body">
        <div class="form-group ">
            <label for="menu">Tên danh mục </label>
            <input type="text" name="name" class="form-control" value="{{ $menu->name }}" required>
        </div>
        <div class="form-group">
            <label>Danh mục</label>
            <select class="form-control" name="parent_id">
                <option value="0" {{ $menu->parent_id == 0 ? 'selected' : '' }}>Danh mục cha</option>
                @foreach ($getParent as $getParent1)
                <option value="{{ $getParent1->id }}" {{ $menu->parent_id == $getParent1->id ? 'selected' : '' }}> {{ $getParent1->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Mô tả </label>
            <textarea name="description" class="form-control" required>{{ $menu->description }}</textarea>
        </div>
        <div class="form-group">
            <label>Mô tả chi tiết</label>
            <textarea name="content" class="form-control" required> {{$menu->content}}</textarea>
        </div>
        <div class="form-group m-4">
            <label> Kích hoạt</label>
            <div class="form-group">
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="1" type="radio" id="active" name="active" {{ $menu->active == 1 ? 'checked' : '' }}>
                    <label for="active" class="custom-control-label">Có</label>
                </div>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="0" type="radio" id="no_active" name="active" {{ $menu->active == 0 ? 'checked' : '' }}>
                    <label for="no_active" class="custom-control-label">Không</label>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Chỉnh sửa danh mục</button>
        </div>
        @csrf
</form>
@endsection