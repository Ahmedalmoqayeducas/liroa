@extends('layouts.org')
@section('content')
    <!-- ======= Our Team Section ======= -->
    @include('components.org.branch-slide', [
        'pageName' => 'Team Work',
        'title' => 'Client-Focused Leadership Skills',
    ])
    <!-- ======= Team Section ======= -->
    <section class="team"  data-aos-easing="ease-in-out" data-aos-duration="500">
        <div class="container">

            <div class="row">
                @include('components.org-temp2.home-page.home-6')
            </div>

        </div>
    </section><!-- End Team Section -->
@endsection
