@extends('admin.main')
@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12 order-2 order-md-1">
                <div class="row">
                    <div class="">
                        <div class="info-box bg-light">
                            <div class="info-box-content">
                                <img src="{{$product->image}}" width="150px">
                            </div>
                            <?php if (count($images) > 0) : ?>
                                @foreach($images as $image)

                                <div class="info-box-content" style="display: flex; flex-wrap: wrap;">
                                    <!-- <div style="width:70%;"> -->

                                    <img src="{{$image->image_product}}" style="cursor: pointer;" width="100%">



                                    <!-- </div> -->
                                </div>

                                <!-- <div class="info-box-content" style="display: flex; justify-content: space-between;">
                                    <img src="{{$image->image_product}}" width="150px">
                                </div> -->
                                @endforeach
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <h4>Tên sản phẩm</h4>
                        <div class="post">
                            <h5>
                                {{$product->name}}
                            </h5>
                            <p>
                                Danh mục : {{$menu->name}}
                            </p>
                        </div>

                        <div class="post clearfix">
                            <div class="user-block">

                                <span class="username">
                                    <a href="#">Mô tả</a>
                                </span>

                            </div>

                            <h3>
                                {{$product->content}}
                            </h3>

                        </div>

                        <div class="post">
                            <div class="user-block">
                                <span class="username">
                                    <a href="#">Chi tiết</a>
                                </span>
                                <h3>
                                    {{$product->description}}
                                </h3>
                            </div>
                            <p>
                                Giá : {{number_format($product->price,0,',','.')}} VND
                            </p>
                            <p>
                                Giá khuyến mãi: {{number_format($product->price_sale,0,',','.')}} VND
                            </p>
                            <p>
                                Số lượng còn: {{$product->qty}}
                            </p>
                            <p>
                                Trạng thái: <?php if ($product->active == 0) {
                                                echo ' Reject';
                                            } elseif ($product->active == 1) {
                                                echo ' Pending';
                                            } else {
                                                echo ' Approve';
                                            }
                                            ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection