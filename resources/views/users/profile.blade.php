@extends('layouts.app')

@section('content')


@if ( !empty($posts) )

        @foreach ( $posts as $post )

            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <div style="float:left;">
                                <img class="rounded-circle z-depth-2" alt="10x10" style="width:30px; height:30px;" src="{{ $post->user->pp }}" data-holder-rendered="true">
                                {!! '<b>'. $post->user->name .'</b>' !!}
                            </div>
                            <div style="float:right; form-inline">
                                <a type="submit" href=" {{ url('post/edit/' . $post->id ) }}" class="btn btn-warning">Edit</a>
                                <a type="submit" href=" {{ url('post/delete/' . $post->id ) }} " class="btn btn-danger">Delete</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div style="padding-left:10px;">
                                {!! '<h2>' . $post->title . '</h2>' !!}
                                {!! '<h5>' . $post->content . '</h5>' !!}
                                <br>
                                @if ( !empty($post->picture) )
                                    <img style="width:100%; height:auto; margin-left:auto; margin-right:auto; display:block;" src="{{ $post->picture }}"data-holder-rendered="true" />
                                @endif
                                <br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
        @endforeach


    @endif

@endsection
