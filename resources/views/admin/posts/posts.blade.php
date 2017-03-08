@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <!--posts begin-->
        <div class="col-md-6">
            <h2>Postes</h2>
            <hr>
            <ul class="list-inline">
                <li><a href="{{ route('admin.post_create')}}" class="btn btn-primary"><i class="glyphicon glyphicon-pencil"></i> Create Post</a></li>
            </ul>
            <ul class="list-unstyled">
                <!--if no posts begin-->
                @if(count($posts)==0)
                <li class="bg-warning">No posts.</li>

                <!--if no posts end-->
                @else
                @foreach($posts as $post)
                <li>
                    <article>
                        <h3>{{ $post->title }}</h3>
                        <span>Postedby: {{ $post->author }} | {{ $post->created_at }} </span>
                        <p>
                            {{ $post->body }}
                        </p>
                    </article>
                    <ul class="list-inline">
                        <li><a href="{{ route('admin.post.view',$post->id) }}" class="btn btn-primary"><i class="glyphicon glyphicon-eye-open"></i> view</a></li>
                        <li><a href="{{ route('admin.post_update',['post_id'=>$post->id]) }}"  class="btn btn-success"><i class="glyphicon glyphicon-pencil"></i> Edit</a></li>
                        <li><a href="{{ route('admin.post.delete',['post_id'=>$post->id]) }}" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i> Delete</a></li>
                    </ul>
                </li>
                @endforeach
                @endif

            </ul> 
        </div>
        <!--posts end-->
    </div>
</div>
@endsection
