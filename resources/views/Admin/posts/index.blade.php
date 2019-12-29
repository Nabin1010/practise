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
@include('admin.includes.postList')
{{ $posts->links() }}

@endsection