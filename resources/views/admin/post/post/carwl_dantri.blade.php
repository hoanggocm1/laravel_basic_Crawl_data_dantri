@extends('admin.main')
@section('content')
<section style="margin: 5px;">
    <div class="title">
        <h1>Cawrl data web {{$title}}</h1>
    </div>
    <div class="content">
        <form action="carwl_dantri" method="post">
            @csrf
            <button class="btn btn-success" style="margin: 10px;"><samp> Bắt đầu Cawrl </samp></button>
        </form>
    </div>

</section>


@endsection