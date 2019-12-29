@extends('layouts.admin');

@section('content')

<div class="col-sm-11">

@component('admin.includes.title')
   Add Post
@endcomponent




<form action="/admin/posts" method="POST" enctype="multipart/form-data">
@csrf

<div class="row">
    <div class="col-sm-3">
     
        <div class="form-group">
            <label for="file">movie pic</label>
            <div>
            <img src="{{url('images/no_movie_ph.png')}}"  id="profile-img-tag" width="220px" alt="">
            </div>
            <input type="file" name="file" id="profile-tag">
        </div>
    </div>

    <div class="col-sm-9">

            <div class="form-group">
                    <label for="title">Post title</label>
                    <input type="text" class="form-control" name="title" placeholder="eg:enter the movie title">
            </div>
        
                <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" placeholder="eg:enter the movie name">
                </div>
        
        
                <div class="form-group">
                        <label for="category_id">Category</label>
                        <select class="form-control" name="category_id">
                            <option value="" disabled selected>select a Category </option>
                            @foreach ($categories as $category)
                        <option value="{{ $category->id}}">{{ $category->name}}</option>
                                
                            @endforeach
                        </select>
                </div>
                <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description"   class="form-control" rows="2"></textarea>
                </div>

                <div class="form-group">
                        <label for="review">Review</label>
                        <textarea name="review" id="article-ckeditor"  class="form-control" rows="5"></textarea>
                </div>
        
        <button type="submit" class="btn btn-primary">Add Post</button>

  
    @component('admin.includes.formErrors')
    
@endcomponent

</div>
</div>




</form>
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