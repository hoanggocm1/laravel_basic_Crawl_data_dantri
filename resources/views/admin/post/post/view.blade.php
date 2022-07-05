@extends('admin.main')
@section('content')


<div style="margin: 10px;" class="title">
    Title : {{$Post->title}}
</div>

<div style="margin: 10px;" class="content">
    Content : {{$Post->content}}
</div>

<div class="content" style="margin: 10px;">
    <a href="{{$Post->image_thumb_post}}" target="_blank">
        <img src="{{$Post->image_thumb_post}}">
    </a>
</div>

<div class="content" style="margin: 10px;">
    Content : {{$Post->description}}
</div>

<div class="created_at" style="margin: 10px;">
    Ngày tạo : {{$Post->created_at}}
</div>

<div class="status" style="margin: 10px;">
    Trạng thái : <span id="statusPostView_{{$Post->id}}">{{$Post->status == 1 ? 'Publish' : 'Unpublish'}}
        <a onclick="updateStatus(<?php echo $Post->id ?>,{{$Post->status}});">
            <i class="fas fa-retweet" style="color:blue; cursor: pointer;  align-items: center;" alt="'{{$Post->id}}'"></i></a>
    </span>
</div>
@endsection