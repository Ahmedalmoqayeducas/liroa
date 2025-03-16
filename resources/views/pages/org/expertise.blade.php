@extends('layouts.org')
@section('content')
    @include('components.org.expertise-slide')
    @include('components.org.static', ['posts' => $posts,'page' => $page])
@endsection
