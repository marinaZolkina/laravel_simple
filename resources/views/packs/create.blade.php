@extends('layouts.app')

@section('title', 'Packs')

@section('content')

<h1>Create new pack</h1>

<form action="{{ route('packs.store') }}" method="post" enctype="multipart/form-data">
    @include('packs._partials.form')
</form>

@endsection