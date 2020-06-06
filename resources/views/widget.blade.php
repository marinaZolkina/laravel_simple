@extends('layouts.app')

@section('title', 'Widgets')

@section('content')

<h3>Number of packages for our widgets:{{$widgets}}</h3>
<ul class="media-list">
    @foreach($data as $key => $value)
    <li class="media">
        <div class="media-body">
            <p>{{ $key }} X {{ $value }}</p>
        </div>
    </li>
    <hr>
   
    @endforeach
</ul>
          
@endsection
