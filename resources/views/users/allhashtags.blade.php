@extends('layouts.app')

@section('content')

<div class="container">

    <div >
        @foreach ($hashtags as $hashtag)
            <a type="button"  class="btn" style="background-color: {{ $hashtag->color }}; width:100%;" href="/hashtag/view/{{$hashtag->name}}">
                <span class="badge">
                {{$hashtag->name}}
                </span>
            </a>
            <br>
            <br>
        @endforeach
    </div>

</div>
@endsection
