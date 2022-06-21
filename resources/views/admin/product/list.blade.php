@extends('admin.main')
@section('content')

<style>
  #hoverdi:hover {
    color: red;
  }
</style>

<nav class="navbar navbar-light bg-light">
  <div class="form-inline">
    <input class="mtext-107 cl2 size-114 plh2 p-r-15 m-r-2" style="margin-right: 10px;" type="text" name="keyword" id="search_product_byName" placeholder="Tìm theo tên sản phẩm">
    <input class="mtext-107 cl2 size-114 plh2 p-r-15 m-r-2" style="margin-right: 20px;" type="number" name="keyword" id="search_product_byPrice" placeholder="Tìm theo giá sản phẩm">
    <span style="margin-right: 20px;"> Hoặc</span>

    <a onclick="filter(2)" class="btn btn-success" id="statusApprove" style="margin-right: 10px;"><samp>Approve</samp>(<span id="count_Approve">{{$Approve}}</span>)</a>
    <a onclick="filter(1)" class="btn btn-warning" id="statusPending" style="margin-right: 10px;"><samp>Pending</samp>(<span id="count_Pending">{{$Pending}}</span>)</a>
    <a onclick="filter(0)" class="btn btn-danger" id="statusReject" style="margin-right: 30px;"><samp>Reject</samp>(<span id="count_Reject">{{$Reject}}</span>)</a>
    <a onclick="refresh()" class="btn btn-secondary">Đặt lại</a>
  </div>
</nav>
<div>
  <div class="card-body p-0">
    <div class="table-responsive">
      <table class="table m-0">
        <thead>
          <tr>
            <th>Tên sản phẩm</th>
            <th>Danh mục</th>
            <th>Mô tả</th>
            <th>Giá</th>
            <th>Giá giảm</th>
            <th>Kho</th>
            <th>Hình ảnh</th>
            <th>Trạng thái</th>
            <th style="width: 75px;"> </th>
          </tr>
        </thead>
        <tbody id="bodyListProduct">
          <?php if (!empty($products)) { ?>
            @foreach($products as $value)
            <tr id="listProducts_<?php echo $value->id ?>">
              <td> {{$value->name}} </td>

              @foreach($menus as $menu)
              <?php if ($value->menu_id == $menu->id) : ?>
                <td>{{$menu->name}}</td>
              <?php endif; ?>
              @endforeach

              <td>{{ $value->content  }}</td>
              <td>{{number_format($value->price,0,',','.')}} VND</td>
              <td>{{number_format($value->price_sale,0,',','.')}} VND</td>
              <td>{{ $value->qty  }}</td>
              <td><a href="{{ $value->image  }}" target="_blank">
                  <img src="{{ $value->image  }}" alt="Product Image" height="100" width="100">
                </a>
                <a href="/admin/products/editProductImage/{{ $value->id }}">Ảnh</a>
              </td>
              <td>
                <?php if ($value->active == 0) : ?>
                  Reject
                <?php elseif ($value->active == 1) : ?>
                  Pending
                <?php else : ?>
                  Approve
                <?php endif; ?>

              </td>
              <td>
                <a class="btn btn-primary btn-sm" href="/admin/products/editProduct/{{$value->id}}">
                  <i class="fas fa-edit"></i>
                </a>
                <a class="btn btn-danger btn-sm" style="color:blue; cursor: pointer;" onclick="deleteProduct(<?php echo $value->id ?>)">
                  <i id="hoverdi" class="fas fa-trash"></i>
                </a>
                <a class="btn btn-danger btn-sm" style="color:green; margin-top: 2px;" href="detailProduct/{{$value->id}}">
                  Xem
                </a>
              </td>
            </tr>
            @endforeach
          <?php } ?>
        </tbody>
      </table>
      <div class="card-tools">
        <ul class="pagination pagination-sm">
          {!!$products->links()!!}
        </ul>
      </div>
      <style>

      </style>
    </div>


    @endsection