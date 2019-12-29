@extends('layouts.admin');

@section('content')

<div class="col-sm-5">




@component('admin.includes.title')
 
Edit Categories

@endcomponent

    <div class="col-sm-5">
    <form action="/admin/categories/{{$category->id}}" method="POST">
    @csrf
    @method('PATCH')
    <div class="form-group">
        <label for="name">Category name</label>
    <input type="text" class="form-control" name="name" placeholder="enter the category name" value="{{$category->name}}">


    </div>
    <button type="submit" class="btn btn-primary">edit this category</button>
    @component('admin.includes.formErrors')
    
    @endcomponent
</form>

</div>

@endsection