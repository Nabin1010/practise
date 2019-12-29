@extends('layouts.app')

@section('content')
    <div class="conatainer post_container">
        <div class="row justify-content-center">
            <div class="wrapper">
                <div class="col-md-12">
               <div>
                   <div class="date">
                       {{$post->created_at->format( 'M Y D')}}

                   </div>
                   <div class="title">
                       {{$post->title}}

                   </div>
                   <div class="reviewer_top">
                      created by <span> {{$post->user->name}}</span>

                   </div>
               </div>
               <div class="review_container">
                   {!!html_entity_decode($post->review)!!}

               </div>

                </div>

            </div>

        </div>

    </div>
@endsection