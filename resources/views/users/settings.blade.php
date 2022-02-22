@extends('layouts.app')

@section('content')

@php
    if(!empty($photo))
        echo $photo;
@endphp

<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ 'Update your Profile Here' }}</div>
                <div class="card-body">
                    <form action="{{ route('settings.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <label class="form-label">Name</label>
                        <input class="form-control" name="name" value="{{$user->name}}">

                        <br>
                        <label class="form-label">Email</label>
                        <input class="form-control" name="email" value="{{$user->email}}">

                        <br>
                        <label for="formFile" class="form-label">Profile Picture</label>
                        <input class="form-control" type="file" name="image">
                        <br>
                        <button type="submit" class="btn btn-primary" style="float: right;">Update</button>
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
