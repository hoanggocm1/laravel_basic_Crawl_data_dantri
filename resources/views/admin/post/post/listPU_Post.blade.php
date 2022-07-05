@extends('admin.main')
@section('content')


<nav class="navbar navbar-light bg-light">

    <div class="form-inline">
        <select id="category_post" onchange="categoryChanged(this)">
            @foreach($CategoryPost as $value)
            <option value="{{$value->id}}">{{$value->category_post_name}}</option>
            @endforeach
        </select>
        <div id="div_category_children_post">
            <select id="category_children_post" style="width:306px">
                @foreach($category_children_post as $value)
                <option value="{{$value->name_slug}}">{{$value->category_post_children_name}}</option>
                @endforeach
            </select>
        </div>
        <a onclick="filterPost()" class="btn btn-success" id="filterPost" style="margin-right: 10px;">Search</a>

        <!-- <input class="mtext-107 cl2 size-114 plh2 p-r-15 m-r-2" style="margin-right: 10px;" type="text" name="keyword" id="search_product_byName" placeholder="Tìm theo tên sản phẩm">
    <input class="mtext-107 cl2 size-114 plh2 p-r-15 m-r-2" style="margin-right: 20px;" type="number" name="keyword" id="search_product_byPrice" placeholder="Tìm theo giá sản phẩm">
    <span style="margin-right: 20px;"> Hoặc</span> -->
        -------
        <a href="../publishPost_unpublishPost/1" class="btn btn-success" id="statusApprove" style="margin-right: 10px;margin-left: 10px;"> Publish </a>
        <a href="../publishPost_unpublishPost/0" class="btn btn-success" id="statusApprove" style="margin-right: 10px;margin-left: 10px;"> Unpublish </a>
        <!-- <a onclick="filter(1)" class="btn btn-warning" id="statusPending" style="margin-right: 10px;"><samp>Pending</samp>(<span id="count_Pending">Pending</span>)</a> -->
        <!-- <a onclick="filter(0)" class="btn btn-danger" id="statusReject" style="margin-right: 30px;"><samp>Reject</samp>(<span id="count_Reject">Reject</span>)</a>
    <a onclick="refresh()" class="btn btn-secondary">Đặt lại</a> -->
    </div>
</nav>
<div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table m-0">
                <thead>
                    <tr>
                        <th>Mã bài</th>
                        <th>Tên bài</th>
                        <th>Hình ảnh zoom</th>
                        <th>Hình ảnh thumb</th>
                        <th>Danh mục</th>
                        <th>Trạng thái</th>
                        <th>Thời gian</th>
                        <th style="width: 75px;"> </th>
                    </tr>
                </thead>
                <tbody id="bodyListPost">
                    @foreach($Posts as $value)
                    <tr id="idPost_{{$value->id}}">
                        <td>
                            {{$value->id}}
                        </td>
                        <td>
                            {{$value->title}}
                        </td>
                        <td>
                            <a href="{{$value->image_zoom_post}}" target="_blank">
                                <img src="{{$value->image_zoom_post}}" alt="" width="100px">
                            </a>
                        </td>
                        <td>
                            <a href="{{$value->image_thumb_post}}" target="_blank">
                                <img src="{{$value->image_thumb_post}}" alt="" width="100px">
                            </a>
                        </td>
                        <td>
                            {{$value->parent_post_children_slug}}
                        </td>
                        <td id="statusPost_{{$value->id}}">

                            {{$value->status == 1 ? 'Publish' : 'Unpublish'}}
                            <a onclick="updateStatus(<?php echo $value->id ?>,{{$value->status}});">
                                <i class="fas fa-retweet" style="color:blue; cursor: pointer;  align-items: center;" alt="'{{$value->id}}'"></i></a>
                        </td>
                        <td>
                            <?php
                            echo date_format($value->created_at, "H:i:s d/m/Y");
                            ?>
                        </td>
                        <td>
                            <a style="cursor: pointer; color: red;" onclick="deletePost(<?php echo $value->id ?>)">Xóa</a>
                            <a href="../viewPost/{{$value->id}}" style="cursor: pointer; color: blue;">Xem</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="card-tools">
                <ul class="pagination pagination-sm" id="paginate_list_product">
                    {!! $Posts->links() !!}
                </ul>
            </div>
            <style>
                .pagination {
                    padding-left: 5px;
                }
            </style>
        </div>


        @endsection