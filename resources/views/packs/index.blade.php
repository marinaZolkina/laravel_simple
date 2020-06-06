@extends('layouts.app')

@section('title', 'List packs')

@section('content')

<h1>
    Packs
    <a href="{{ route('packs.create') }}" class="btn btn-primary">
        <i class="fas fa-plus-square"></i>
    </a>
</h1>

@include('includes.alerts')

<ul class="media-list">
    @forelse($packs as $pack)
    <li class="media">
        <div class="media-body">
            <p>
                {{ $pack->quantity }}
                
                <a href="{{ route('packs.edit', $pack->id) }}">Edit</a>
            </p>
        </div>
    </li>
    <hr>
    @empty
    <li class="media">
        <p>List packs is empty!</p>
    </li>
    @endforelse
</ul>

@endsection