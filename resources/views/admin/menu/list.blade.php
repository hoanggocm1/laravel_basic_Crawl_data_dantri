@extends('admin.main')
@section('content')
<div class="card-body p-0">
  <div class="table-responsive">
    <table class="table m-0">
      <thead>
        <tr>
          <th>Tên danh mục</th>
          <th>Mô tả</th>
          <th>Mô tả chi tiết</th>
          <th>trạng thái</th>
          <th style="width: 75px;"> </th>
        </tr>
      </thead>
      <tbody>
        {!! \App\Helpers\Helper::listMenu($list) !!}
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