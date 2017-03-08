@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">

            <form method="post" action="{{ route('admin.post.create') }}">
                <div class="form-group">
                    <label>Title</label>
                    <input class="form-control {{ $errors->has('title')? 'input-has-error' :'' }}" name="title" type="text" value="{{ Request::old('title') }}" />
                </div>

                <div class="form-group">
                    <label>author</label>
                    <input class="form-control {{ $errors->has('author')? 'input-has-error' :'' }}" name="author" type="text"  value="{{ Request::old('author') }}" />
                </div>

                <div class="form-group">
                    <div class="form-inline">
                        <label>Add Categories</label>
                        <select class="form-control" id="cetegories_select">
                            <!--forech output cat-->
                            @foreach($categories as $categorie)
                            <option value="{{ $categorie->id }}">{{ $categorie->name }}</option>
                            @endforeach
                        </select>
                        <button type="button" id='button' class="btn btn-primary">Add categorie</button>
                    </div>
                    <ul id="catigory_added">
                        <li></li>
                    </ul>
                    <input type="text" style="display: none" name="categories" value="" id="categorires"/>
                </div>

                <div class="form-group">
                    <label>Text </label>
                    <textarea class="form-control {{ $errors->has('body')? 'input-has-error' :'' }}" name="body" rows='10'>{{ Request::old('body') }}</textarea>
                </div>

                <input type="hidden" name="_token" value="{{ Session::token() }}"/>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
            @section('scripts')
            <script type="text/javascript" src="{{ URL::to('src/js/post.js') }}"></script>
            @endsection

        </div>
    </div>

</div>
@endsection