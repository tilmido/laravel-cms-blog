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
                <li><a href="{{ route('admin.posts')}}" class="btn btn-primary"><i class="glyphicon glyphicon-eye-open"></i> Show All Post</a></li>
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
                        <li><a href="{{ route('admin.post.view',['post_id'=>$post->id]) }}" class="btn btn-link"><i class="glyphicon glyphicon-eye-open"></i> view</a></li>
                        <li><a href="{{ route('admin.post_update',['post_id'=>$post->id]) }}"  class="btn btn-link"><i class="glyphicon glyphicon-pencil"></i> Edit</a></li>
                        <li><a href="{{ route('admin.post.delete',['post_id'=>$post->id]) }}" class="btn btn-link text-danger"><i class="glyphicon glyphicon-remove"></i> Delete</a></li>
                    </ul>
                </li>
                @endforeach
                @endif

            </ul> 
        </div>
        <!--posts end-->
        <!--message begin-->
        <div class="col-md-6">
            <h2>Messages</h2>
            <hr>
            <a href="{{ route('admin.messages') }}" class="btn btn-primary"><i class="glyphicon glyphicon-eye-open"></i> Show messages</a>
            <ul class="list-unstyled">
                <!--if no messages begin-->
                @if(count($contactMessages)==0)
                <li class="bg-warning">No message</li>
                @endif
                <!--if no messages end-->
                @foreach($contactMessages as $message)
                <li>
                    <article>
                        <h3>{{ $message->subject }}</h3>
                        <span>Send By {{ $message->email }} | Date : {{ $message->created_at }} </span>
                    </article>
                    <ul class="list-inline">
                        <li>
                            <button class="btn btn-link show-message" data-message="{{ $message->message }}" data-message="{{ $message->message }}" data-subject="{{ $message->subject }}" data-toggle="modal">
                                <i class="glyphicon glyphicon-eye-open"></i>
                                view
                            </button>
                        </li>
                        <li><button href="#" class="btn btn-link text-danger delete_message" data-id="{{ $message->id }}"><i class="glyphicon glyphicon-remove"></i> Delete</button></li>
                    </ul>
                </li>
                @endforeach

            </ul>
        </div>
        <!--message end-->
    </div>

</div>
@endsection
@include('includes.full_message')
@section('scripts')
<script src="{{ URL::to('src/js/messages.js') }}" type="text/javascript"></script>
@endsection