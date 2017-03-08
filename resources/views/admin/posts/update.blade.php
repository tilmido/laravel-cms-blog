@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">

            <form method="post" action="{{ route('admin.post.update',['post_id'=>$post->id]) }}">
                <div class="form-group">
                    <label>Title</label>
                    <input class="form-control {{ $errors->has('title')? 'input-has-error' :'' }}" name="title" type="text" value="{{ Request::old('title')? Request::old('title'):isset($post)?$post->title:'' }}" />
                </div>

                <div class="form-group">
                    <label>author</label>
                    <input class="form-control {{ $errors->has('author')? 'input-has-error' :'' }}" name="author" type="text"  value="{{ Request::old('author')? Request::old('author'):isset($post)?$post->author:'' }}" />
                </div>

                <div class="form-group">
                    <div class="form-inline">
                        <label>Add Categories</label>
                        <select class="form-control" id="cetegories_select">
                            <!--forech output cat-->
                            @foreach($categories as $categorie)
                            <option value="{{ $categorie->id }}">{{ $categorie->name }}</option>
                            @endforeach                        </select>
                        <button type="button" id="button" class="btn btn-primary">Add categorie</button>
                    </div>
                    <ul>
                        @foreach($post_categories as $post_category)
                        <li>{{ $post_category->id }}</li>
                        @endforeach                  
                    </ul>
                    <input type="text" name="categories" style="display: none" id="categories" value='{{ implode(',',$post_categories_ids) }}'/>
                </div>

                <div class="form-group">
                    <label>Text </label>
                    <textarea class="form-control {{ $errors->has('body')? 'input-has-error' :'' }}" name="body" rows='10'>{{ Request::old('body')? Request::old('body'):isset($post)?$post->body:'' }}</textarea>
                </div>

                <input type="hidden" name="_token" value="{{ Session::token() }}"/>
                <input type="hidden" name="post_id" value="{{ $post->id }}"/>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
            @section('scripts')
            <script type="text/javascript" src="{{ URL::to('src/js/post.js') }}"></script>
            @endsection

        </div>
    </div>

</div>
@endsection