@extends('layouts.app')

@section('content')

<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ 'Edit your post Here' }}</div>
                <div class="card-body">
                    <form action="{{ url('post/update/' . $post->id ) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <label class="form-label">Title</label>
                        <input class="form-control" name="title" value="{{$post->title}}">
                        <br>
                        <label class="form-label">Content</label>
                        <textarea class="form-control" name="content" placeholder="content.."  rows="3">{!!$post->content!!}</textarea>
                        <br>
                        <label for="formFile" class="form-label">Post Picture</label>
                        <input class="form-control" type="file" name="image">
                        <br>
                        <button type="submit" class="btn btn-primary" style="float: right;">Done</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>
    <br>



</div>
@endsection
