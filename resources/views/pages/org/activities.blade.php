@extends('layouts.org')
@section('content')
    <!-- ======= Services Section ======= -->

    @include('components.org.branch-slide', [
        'pageName' => 'News & Insights',
        'title' => 'Client-Focused Leadership Skills',
    ])

    <!-- ======= Service Details Section ======= -->
    {{-- @include('components.org.news-insights.1') --}}
    <br>
    <br>
    <br>

    @include('components.org.news-insights.cards')

@endsection
