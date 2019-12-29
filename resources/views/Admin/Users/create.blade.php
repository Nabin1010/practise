@extends('layouts.admin');

@section('content')

<div class="col-sm-6">

@component('admin.includes.title')
   Add Administrators/Authors
@endcomponent



<form action="/admin/users" method="POST">
@csrf
<div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" name="name" placeholder="eg:nabin">
</div>

<div class="form-group">
    <label for="email">Email</label>
    <input type="text" class="form-control" name="email" placeholder="eg:nabin@example.com">
</div>

<div class="form-group">
    <label for="  Password">Create a Password</label>
    <input type="password" class="form-control" name="password" placeholder="**********">
</div>

<div class="form-group">
    <label for="role_id">Role</label>
    <select class="form-control" name="role_id">
        <option value="">select a role</option>
        @foreach ($roles as $role )
    <option value="{{ $role->id}}">{{ $role->name}}</option>
        @endforeach
    </select>
    
</div>

<div class="form-group">
    <label for="active">Active</label>
    <select class="form-control" name="active">
        <option value="">select a status</option>
        <option value="1">yes</option>
        <option value="2">no</option>
    </select>
    
</div>

@component('admin.includes.formErrors')
    
@endcomponent


<button type="submit" class="btn btn-primary">Add User</button>

</form>
</div>
@endsection