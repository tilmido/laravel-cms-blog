
@extends('layouts.master')

@section('title')
blog index page
@endsection

@section('content')
<div class="container">

    <div class="row">
        @foreach($posts as $post)
        <div class="col-md-12 col-flat">
            <h2>{{ $post->title }}</h2>
            <span class="subtitle">Posted by : {{ $post->author }} | at : {{ $post->created_at }}</span>
            <article>
                     {{ $post->body }} 
 
            </article>
            <a href="{{ route('blog.single',['post_id'=>$post->id]) }}" class="btn btn-link">More</a>
        </div>
        @endforeach
        {{ $posts->links() }}
    </div>

</div>
@endsection
