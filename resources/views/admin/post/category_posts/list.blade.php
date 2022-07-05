@extends('admin.main')
@section('content')
<div class="card-body p-0">
  <div class="table-responsive">
    <table class="table m-0">
      <thead>
        <tr>
          <th>Tên danh mục</th>
          <th>Các danh mục con</th>
          <th>trạng thái</th>
          <th style="width: 75px;"> </th>
        </tr>
      </thead>
      <tbody>
        @foreach($CategoryPost as $value)
        <tr>
          <td>
            {{$value->category_post_name}}
          </td>
          <td>
            @foreach($value->ParentPostChildren as $value_1)

            <ul>
              <a href="123">
                {{$value_1->category_post_children_name}}
              </a> ---
              <a href="editCategory_post_children/{{$value_1->id}}"> Sửa </a>
              || <a href="deleteCategory_post_children/{{$value_1->id}}"> Xóa </a>
            </ul>
            @endforeach
          </td>
          <td>
            <a href="editCategory_post_children"> Sửa </a>
            || <a href="deleteCategory_post_children"> Xóa </a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  <footer class="panel-footer">
    <div class="row">

      <div class="col-sm-5 text-center">
        <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
      </div>
      <div class="col-sm-7 text-right text-center-xs">
        <ul class="pagination pagination-sm m-t-none m-b-none">

        </ul>
      </div>
    </div>
  </footer>
</div>
@endsection