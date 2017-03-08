@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="form-inline">
                <label>category</label>
                <form>
                    <input type='text' id="name" class="form-control">
                    <button id="add_cat" class="btn btn-primary">Add</button>
                </form>
            </div>
            @foreach($categories as $category)

            <div class="col-md-12">
                <section class="">
                    <h3 id="title-{{ $category->id }}">{{ $category->name }}</h3>
                    <ul class="list-inline">
                        <li> 
                            <div class="input-group">
                                <input class="form-control" type="text" style="display: none;" id="input-{{ $category->id }}" value="{{ $category->name }}"/>
                            </div>
                        </li>
                        <li>                 
                            <div class="input-group">
                                <button class="btn btn-success btn-xs btn-edit" data-id="{{ $category->id }}"  id="button-{{ $category->id }}" value="edit">Edit</button></div></li>
                        <li>
                            <div class="input-group">
                                <button class="btn btn-danger btn-xs delete"  data-id="{{ $category->id }}">Delete</button></div></li>
                    </ul>
                </section>
                <hr>
            </div>

            @endforeach
            {{ $categories->links() }}
        </div>
    </div>

</div>
@endsection
@section('scripts')
<script type="text/javascript" src="{{ URL::to('src/js/categories.js') }}"></script>
@endsection