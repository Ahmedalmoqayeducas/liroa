@extends('layouts.org')
@section('content')
    @include('components.org.branch-slide', [
        'pageName' => 'Contact Us',
        'title' => 'Client-Focused Leadership Skills',
    ])
    <!-- ======= Contact Section ======= -->
    <section class="contact" data-aos-easing="ease-in-out" data-aos-duration="500">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="info-box">
                                <i class="bx bx-map text-danger"></i>
                                <h3>Our Address</h3>
                                @foreach ($address as $one)
                                    <p>{{ $one->text }}</p>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-box">
                                <i class="bx bx-envelope text-danger"></i>
                                <h3>Email Us</h3>
                                @foreach ($emails as $email)
                                    <p>{{ $email->text }}</p>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-box">
                                <i class="bx bx-phone-call text-danger"></i>
                                <h3>Call Us</h3>
                                @foreach ($numbers as $number)
                                    <p>{{ $number->text }}</p>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <form action="{{ route('contact.submit') }}" method="POST" role="form">
                        @csrf
                        <div class="form-row">
                            <div class="col-md-6 form-group">
                                <input type="text" name="name"
                                    class="form-control @error('name') is-invalid @enderror" id="name"
                                    placeholder="Your Name" value="{{ old('name') }}">
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 form-group">
                                <input type="email" name="email"
                                    class="form-control @error('email') is-invalid @enderror" id="email"
                                    placeholder="Your Email" value="{{ old('email') }}">
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="text" name="subject" class="form-control @error('subject') is-invalid @enderror"
                                id="subject" placeholder="Subject" value="{{ old('subject') }}">
                            @error('subject')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <textarea class="form-control @error('message') is-invalid @enderror" name="message" rows="5"
                                placeholder="Message">{{ old('message') }}</textarea>
                            @error('message')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            @if (session('success'))
                                <div class="sent-message alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif

                            @if (session('error'))
                                <div class="error-message alert alert-danger">
                                    {{ session('error') }}
                                </div>
                            @endif
                        </div>
                        <div class="text-center">
                            <button class="btn bg-danger" type="submit">Send Message</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section><!-- End Contact Section -->
    <!-- ======= Map Section ======= -->
    <section class="map mt-2">
        <div class="container-fluid p-0">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3024.2219901290355!2d-74.00369368400567!3d40.71312937933185!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25a23e28c1191%3A0x49f75d3281df052a!2s150%20Park%20Row%2C%20New%20York%2C%20NY%2010007%2C%20USA!5e0!3m2!1sen!2sbg!4v1579767901424!5m2!1sen!2sbg"
                frameborder="0" style="border:0;" allowfullscreen=""></iframe>
        </div>
    </section><!-- End Map Section -->
@endsection
