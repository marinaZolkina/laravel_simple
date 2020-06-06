@extends('layouts.app')

@section('title', "Pack {$pack->quantity}")

@section('content')

<h1>Pack: {{ $pack->quantity }}</h1>

<form action="{{ route('packs.update', $pack->id) }}" method="post" enctype="multipart/form-data">
    <input type="hidden" name="_method" value="PUT">

    @include('packs._partials.form')
</form>

@endsection