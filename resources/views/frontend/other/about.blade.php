@extends('layouts.master')

@section('title')
blog index page
@endsection

@section('content')
<div class="container">

    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            @include('includes.infoblog')
        </div> 
    </div>

</div>
@endsection
