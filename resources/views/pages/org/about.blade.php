@extends('layouts.org')
@section('content')
    @include('components.org.branch-slide', [
        'pageName' => 'Who We Are',
        'title' => 'Client-Focused Leadership Skills',
    ])
   

    @include('components.org.about-components.1')
    @include('components.org-temp2.home-page.home-7')
    @include('components.org.team')
    @include('components.org.about-components.3')
    @include('components.org.about-components.4')

    @include('components.org.about-components.6')
@endsection
@section('script')
    {{-- <link href="{{ asset('org/vendor/owl.carousel/assets/owl.carousel.min.css') }}" rel="stylesheet"> --}}
@endsection
