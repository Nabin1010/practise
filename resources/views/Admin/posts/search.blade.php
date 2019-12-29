@extends('layouts.admin');

@section('content')
@component('admin.includes.title')
    Post list
@endcomponent

@if (Session::has('flash_admin'))
<div class="flash_message">
    {{Session('flash_admin')}}
</div>
    
@endif
@include('admin.includes.searchForm')

<a href="{{ url('/admin/posts')}}">see all post</a>
@if ($posts)
<div class="count">Hey!!Found <strong>{{count($posts)}}</strong></div>
@include('admin.includes.postList')
@else
<div>
    sorry no post found
</div>
@endif




@endsection