@extends('layouts.org')
@section('content')
    <!-- ======= Our Team Section ======= -->
    @include('components.org.branch-slide', [
        'pageName' => 'Team Work',
        'title' => 'Client-Focused Leadership Skills',
    ])
    <!-- ======= Team Section ======= -->
    <section class="team" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">
        <div class="container">

            <div class="row">
                @foreach ($team as $member)
                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                        <div class="member">
                            <div class="member-img">

                                <img src="{{ asset(Storage::url($member->picture)) }}" class="img-fluid" alt="">
                                <div class="social">
                                    <a href=""><i class="icofont-twitter"></i></a>
                                    <a href=""><i class="icofont-facebook"></i></a>
                                    <a href=""><i class="icofont-instagram"></i></a>
                                    <a href=""><i class="icofont-linkedin"></i></a>
                                </div>
                            </div>
                            <div class="member-info">
                                <h4>{{ $member->emp_name }}</h4>
                                <span>{{ $member->employment_name }}</span>
                                <p>{{ $member->description }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </section><!-- End Team Section -->
@endsection
