@extends('layouts.app')

@section('content')
@if ($posts)

<div class="slick-home">
    @foreach ($posts as $post )
       <div>
           <div class="slick-item" style="background:url(/images/posts/{{$post->photo['filename']}})">
           <a href="{{ url( '/post/' .$post->slug)}}" class="slick-wrapper">Post</a>
           <div class="slick-content">
               <div class="wrapper">
               <div class="slick-movie">{{$post->name }}</div>
                   <div class="slick-category">{{$post->category->name }}</div>
                   <div class="slick-title">{{$post->title }}</div>

               </div>

           </div>

           </div>
       </div>
    @endforeach

</div>
<script>
$(document).ready(function(){
    $('.slick-home').slick({
        infinite:true,
        slidesToShow:4,
        slidesToScroll:4,
        arrows:false

    })
})

</script>
    
    @endif
<div class="container">
    <div class="row justify conatin center">
        <div class="col-md-8">
                @if ($postsOther)
        <div class="home_post_list">
            <h3>Awesome review</h3>
            <div class="row">
                @foreach ($postsOther as $postOther)
                    <div class="col-md-6">
                        <div class="item">
                      <div class="date">
                          Created:{{ $postOther->created_at->diffForHumans()}}
                      </div>
                    <div class="category">
                            {{$postOther->category->name}}
  
                    </div>
                        <div class="name">
                                {{$postOther->name}}
      
                        </div>
                        <div class="text_wrapper">
                        <a href="{{ url('/post/'.$postOther->slug)}}" class="title">{{$postOther->title}}</a>
                      <div class="desc">
                    {{str_limit($postOther->description,250)}}.....read more     
                    </div>  
                    </div>

                    </div>
                    </div>
                @endforeach
            </div>
        </div>
                @endif
        </div>
        <div class="col-md-4">
            <div class="home_top_post_list">
                <h3>
                    popular reviews
                </h3>
                @if ($topPosts)
                <div>
                    @foreach ($topPosts as $topPost)
                    <a href="{{ url('/post/'.$postOther->slug)}}" class="item">
                    <div class="name">{{$topPost->name}}</div>
                    <div class="title">{{$topPost->title}}</div>
                    </a>
                        
                    @endforeach
                </div>
                    
                @endif

            </div>

        </div>

    </div>

</div>
  
@endsection
