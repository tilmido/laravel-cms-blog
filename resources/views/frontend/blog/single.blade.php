@extends('layouts.master')

@section('title')
{{ $post->title }}
@endsection

@section('content')
<div class="container">
    
    <div class="row">
        <div class="col-md-12">
            <h2>{{ $post->title }}</h2>
            <span class="subtitle">Post by : {{ $post->author }} | at : {{ $post->created_at }}</span>
            <article>
                {{ $post->body }}
            </article>
        </div>
    </div>
    
</div>
@endsection
