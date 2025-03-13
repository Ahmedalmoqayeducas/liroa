@extends('layouts.org')
@section('content')
    <!-- ======= Services Section ======= -->

    @include('components.org.branch-slide', [
        'pageName' => 'News & Insights',
        'title' => 'Client-Focused Leadership Skills',
    ])

    <!-- ======= Service Details Section ======= -->
    @include('components.org.news-insights.1')
    @include('components.org.news-insights.2')

    @include('components.org.static',['posts'=>$posts])
@endsection
