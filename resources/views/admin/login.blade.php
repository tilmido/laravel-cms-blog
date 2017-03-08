@extends('layouts.master')

@section('content')
<div class="container">
    @include('includes.infos')
    <div class="row">
        <div class="col-md-4 col-sm-8 col-sm-offset-2 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="panel-title">
                        <i class="glyphicon glyphicon-log-in"></i>
                    </div>
                </div>
                <div class="panel-body"> 
                    <form action="{{ route('admin.login.post') }}" method="post">
                        <div class="form-group">
                            <label>Eamil </label>
                            <input type="email" class="form-control  {{ $errors->has('email')? 'input-has-error' :'' }}" name="email" value="{{ Request::old('email')}}">
                        </div>
                        <div class="form-group">
                            <label>Password </label>
                            <input type="password" class="form-control  {{ $errors->has('password')? 'input-has-error' :'' }}" name="password">
                        </div>
                        <div class="form-inline">
                            <label>remember Me: </label>
                            <input type="checkbox" class="" name="">
                        </div>
                        <div class="form-group">
                            <input type="hidden" value="{{ Session::token() }}" name="_token"/>
                            <button type="submit" class="form-control btn-primary btn" name="">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection