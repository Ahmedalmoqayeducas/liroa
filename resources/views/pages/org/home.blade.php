@extends('layouts.org')
@section('content')
    @include('components.org.activities')

    @include('components.org-temp2.home-page.home-3', ['goals' => $goals])
    @include('components.org-temp2.home-page.home-4')
    @include('components.org.team')
    @include('components.org-temp2.home-page.home-6', ['team' => $team])
    @include('components.org-temp2.home-page.home-7')
    @include('components.org-temp2.home-page.home-8')
    @include('components.org-temp2.home-page.home-9')
    <br>
    <br>
    @include('components.org.subscribe')
@endsection
@section('slide')
    @include('components.org.slide')
@endsection
