@extends('layouts.admin');

@section('content')

<div class="col-sm-11">

@component('admin.includes.title')
   Edit Post
@endcomponent


@if (!empty ($post))
<form action="/admin/posts/{{$post->id}}" method="POST"  style="text-align:right">
@csrf
@method('DELETE')
<button type="submit" class="btn btn-secondary "> delete post</button>
</form>

<form action="/admin/posts/{{$post->id}}" method="POST" enctype="multipart/form-data">
@csrf
@method('PATCH')
<div class="row">
    <div class="col-sm-3">
     
        <div class="form-group">
            <label for="file">movie pic</label>
            <div>
            <img src="{{url('images/posts/'.$post->photo['filename'])}}"  id="profile-img-tag" width="220px" alt="">
            </div>
            <input type="file" name="file" id="profile-tag">
        </div>
    </div>

    <div class="col-sm-9">

            <div class="form-group">
                    <label for="title">Post title</label>
            <input type="text" class="form-control" name="title" placeholder="eg:enter the movie title" value="{{$post->title}}">
            </div>
        
                <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" placeholder="eg:enter the movie name" value={{"$post->name"}}>
                </div>
        
        
                <div class="form-group">
                        <label for="category_id">Category</label>
                        <select class="form-control" name="category_id">
                            <option value="" disabled selected>select a Category </option>
                            @foreach ($categories as $category)
                        <option value="{{ $category->id}}"  {{$post->category_id==$category->id ? 'Selected':''}} >{{ $category->name}}</option>
                                
                            @endforeach
                        </select>
                </div>
                <div class="form-group">
                        <label for="description">Description</label>
                <textarea name="description"   class="form-control" rows="2">{{$post->description}}</textarea>
                </div>

                <div class="form-group">
                        <label for="review">Review</label>
                        <textarea name="review" id="article-ckeditor"  class="form-control" rows="5" >{{"$post->review"}}</textarea>
                </div>
        
        <button type="submit" class="btn btn-primary">update Post</button>

    </div>
    @component('admin.includes.formErrors')
    
@endcomponent

</div>
</div>




</form>
    
@else
    <div><strong><h6>sorry no post found</h6></strong></div>
@endif
</div>
<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        var options = {
    filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
    filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token={{csrf_token()}}',
    filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
    filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token={{csrf_token()}}'
  };
 CKEDITOR.replace( 'article-ckeditor',options );
        
        function readURL(input){
            if(input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#profile-img-tag').attr('src',e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#profile-tag").change (function(){
            readURL(this);
        });



    </script>
@endsection