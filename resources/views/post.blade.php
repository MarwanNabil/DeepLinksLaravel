@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $post[0]->title }}</div>
                <div class="card-body">
                    {{ $post[0]->content }}
                </div>
            </div>
        </div>
    </div>

</div>

@endsection
