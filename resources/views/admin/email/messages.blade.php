@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <!--message begin-->
        <div class="col-md-offset-3 col-md-6">
            <h2>Messages</h2>
            <hr>
            <ul class="list-unstyled">
                <!--if no messages begin-->
                @if(count($contactMessages)==0)
                <li class="bg-warning">No message</li>
                @endif
                <!--if no messages end-->
                @foreach($contactMessages as $message)
                <li>
                    <article>
                        <h3>{{ $message->subject }} | ID = {{ $message->id }}</h3>
                        <span>Send By {{ $message->email }} | Date : {{ $message->created_at }} </span>
                    </article>
                    <ul class="list-inline">
                        <li>
                            <button class="btn btn-link show-message"   data-message="{{ $message->message }}" data-subject="{{ $message->subject }}" data-toggle="modal">
                                <i class="glyphicon glyphicon-eye-open"></i>
                                view
                            </button>
                        </li>
                        <li><button class="btn btn-link text-danger delete_message" data-id="{{ $message->id }}"><i class="glyphicon glyphicon-remove"></i> Delete</button></li>
                    </ul>
                </li>
                @endforeach
                {{ $contactMessages->links() }}
            </ul>
        </div>
        <!--message end-->
    </div>
    @include('includes.full_message')
</div>
@endsection
@section('scripts')
<script type="text/javascript" src="{{ URL::to('src/js/messages.js') }}"></script>
@endsection