@extends('layouts.app')

@section('content')


<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ 'Create hashtag here' }}</div>
                <div class="card-body">
                    <form action="{{ route('hashtag.store') }}" method="POST">
                        @csrf
                        @method('POST')
                        <input class="form-control" name="name" placeholder="name..">
                        <textarea class="form-control" name="description" placeholder="description.." rows="3"></textarea>
                        <br>
                        <label for="form-control" class="form-label">Color</label>
                        <input type="color" name="color" class="form-control">
                        <br>
                        <button type="submit" class="btn btn-success" style="float: right;">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>
    <br>
</div>

{{--
@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ __('You are logged in!') }}
    </div>
@endif
--}}

@endsection
