@extends('layouts.admin');

@section('content')

<div class="col-sm-11">




@component('admin.includes.title')
 
Categories

@endcomponent
<div class="row">
    <div class="col-sm-4">
      
        <table class="table table-stripped admin users_table">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Category Name </td>
                </tr>
            </thead>
            <tbody>
                @if ($categories)
                @foreach ($categories as $category)

                <tr>
                <th>{{ $category->id}}</th>
                <th> <a href="{{url('/admin/categories/'.$category->id.'/edit/') }}">{{ $category->name }}</a> </th>
                </tr>
                    
                @endforeach
                    
                @endif
            </tbody>
        </table>


    </div>

    <div class="col-sm-5">
<form action="/admin/categories" method="POST">
    @csrf
    <div class="form-group">
        <label for="name">Category name</label>
        <input type="text" class="form-control" name="name" placeholder="enter the category name">


    </div>
    <button type="submit" class="btn btn-primary">add a category</button>
    @component('admin.includes.formErrors')
    
    @endcomponent
</form>
    </div>
</div>


</div>

@endsection