@extends('layouts.org')
@section('content')
    @include('components.org.branch-slide', [
        'pageName' => $page->name,
        'title' => 'Client-Focused Leadership Skills',
    ])
    @include('components.org.static', ['posts' => $posts])
@endsection
