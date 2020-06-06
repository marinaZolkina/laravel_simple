@extends('layouts.app')

@section('title', "Show: {$pack->quantity}")

@section('content')

<p>Detalhes do post <b>{{ $pack->quantity }}</b></p>

@endsection