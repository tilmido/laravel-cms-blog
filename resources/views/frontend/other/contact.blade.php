@extends('layouts.master')

@section('title')
blog index page
@endsection

@section('content')
<div class="container">
@include('includes.infos')

    <div class="row">
        <div class="col-md-offset-3 col-md-6">
            <h2>Contact us</h2>
            <article class="center-block">
                <form method="post" action="{{ route('contact.send') }}">
                    <div class="form-group">
                        <label>Full name : </label>
                        <input type='text' class="form-control" name="full_name" value='{{ Request::old('full_name') }}'>
                    </div>
                    <div class="form-group">
                        <label>Email : </label>
                        <input type='email' class="form-control" name="email" value='{{ Request::old('email') }}'>
                    </div>
                    <div class="form-group">
                        <label>Subject : </label>
                        <input type='text' class="form-control" name="subject" value='{{ Request::old('subject') }}'>
                    </div>
                    <div class="form-group">
                        <label>Message : </label>
                        <textarea class="form-control" name="message" rows="5" >{{ Request::old('message') }}</textarea>
                    </div>
                    <input type="hidden" value="{{ Session::token() }}" name="_token"/>
                    <button class="btn btn-primary" type="submit">Send</button>
                </form>
            </article>
        </div>
    </div>

</div>
@endsection
