@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <!--posts begin-->
        <div class="col-md-6">
            <ul class="list-inline">
                <li><a href="{{ route('admin.post_update',['post_id'=>$post->id]) }}"  class="btn btn-success"><i class="glyphicon glyphicon-pencil"></i> Edit</a></li>
                <li><a href="{{ route('admin.post.delete',['post_id'=>$post->id]) }}" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i> Delete</a></li>
            </ul>
            <article>
                <h3>{{ $post->title }}</h3>
                <span>Postedby: {{ $post->author }} | {{ $post->created_at }} </span>
                <p>
                    {{ $post->body }}
                </p>
            </article> 

        </div>
        <!--posts end-->
    </div>
</div>
@endsection
