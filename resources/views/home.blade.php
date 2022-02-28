@extends('layouts.app')

@section('content')

@php
    use App\Models\Hashtag;
    $hashtags = Hashtag::get();
@endphp

<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ 'Drop your post here' }}</div>
                <div class="card-body">
                    <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <input class="form-control" name="title" placeholder="title..">
                        <textarea class="form-control" name="content" placeholder="content.." rows="3"></textarea>
                        <br>
                        <label for="formFile" class="form-label">Image</label>
                        <input class="form-control" type="file" name="image">
                        <br>
                        <label for="formFile" class="form-label">Hashtags</label>
                        <select class="form-select form-select-sm" aria-label="Choose your hashtags" name="hashtags[]" multiple="multiple" multiple data-mdb-filter="true">
                            @foreach ($hashtags as $hashtag)
                                <option value="{{ $hashtag->id }}">{{ $hashtag->name }}</option>
                            @endforeach
                        </select>
                        <br>
                        <button type="submit" class="btn btn-primary" style="float: right;">Post</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>
    <br>
    @if ( !empty($posts) )
        @foreach ( $posts as $post )
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <div>
                                <img class="rounded-circle z-depth-2" alt="10x10" style="width:30px; height:30px;" src="{{ $post->user->pp }}" data-holder-rendered="true">
                                {!! '<b>'. $post->user->name .'</b>' !!}
                            </div>

                        </div>
                        <div class="card-body">
                            <div style="padding-left:10px;">
                                {!! '<h2>' . $post->title . '</h2>' !!}
                                {!! '<h6>' . $post->updated_at . '</h6>' !!}
                                <br>
                                {!! '<h5>' . $post->content . '</h5>' !!}
                                <br>
                                @if ( !empty($post->picture) )
                                    <img style="width:100%; height:auto; margin-left:auto; margin-right:auto; display:block;" src="{{ $post->picture }}"data-holder-rendered="true" />
                                @endif
                                <br>
                                @php
                                    $hashtags = $post->hashtags;
                                @endphp
                                <br><br>
                                @foreach ($hashtags as $hashtag)
                                    <a type="button"  class="btn" style="background-color: {{ $hashtag->color }}" href="/hashtag/view/{{$hashtag->name}}">
                                        <span class="badge">
                                        {{$hashtag->name}}
                                        </span>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
        @endforeach
    @endif



</div>

{{--
@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ __('You are logged in!') }}
    </div>
@endif
--}}

@endsection
