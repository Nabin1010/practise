@extends('layouts.admin');

@section('content')

<div class="col-sm-6">

@component('admin.includes.title')
   Edit Administrators/Authors
@endcomponent
@if (!empty ($user))

<form action="/admin/users/{{$user->id}}" method="POST"  style="text-align:right">
@csrf
@method('DELETE')
<button type="submit" class="btn btn-secondary "> delete user</button>
</form>
<form action="/admin/users/{{ $user->id}}" method="POST">
    @csrf
    @method('PATCH')
    <div class="form-group">
        <label for="name">Name</label>
    <input type="text" class="form-control" name="name" placeholder="eg:nabin" value="{{ $user->name}}">
    </div>
    
    <div class="form-group">
        <label for="email">Email</label>
        <input type="text" class="form-control" name="email" placeholder="eg:nabin@example.com"value="{{ $user->email}}">
    </div>
    
    <div class="form-group">
        <label for="  Password">Create a Password</label>
        <input type="password" class="form-control" name="password" placeholder="**********" >
    </div>
    
    <div class="form-group">
        <label for="role_id">Role</label>
        <select class="form-control" name="role_id">
            <option value="">select a role</option>
            @foreach ($roles as $role )
        <option value="{{ $role->id}}" {{$user->role_id==$role->id ? 'Selected':''}}>{{ $role->name}}</option>
            @endforeach
        </select>
        
    </div>
    
    <div class="form-group">
        <label for="active">Active</label>
        <select class="form-control" name="active">
            <option value="">select a status</option>
            <option value="1" {{ $user->active== 1 ? 'selected':''}}>yes</option>
            <option value="2" {{ $user->active== 2 ? 'selected':''}}>no</option>
        </select>
        
    </div>
    
    @component('admin.includes.formErrors')
        
    @endcomponent
    
    
    <button type="submit" class="btn btn-primary">Edit User</button>
    
    </form>
    
    
@else
    <div><strong><h6>sorry no user found</h6></strong></div>
@endif


</div>
@endsection