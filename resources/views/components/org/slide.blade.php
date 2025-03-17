<section id="hero" class="d-flex justify-content-center align-items-center">
    <div id="heroCarousel" class="container carousel carousel-fade" data-ride="carousel">
        <!-- Slide 1 -->
        {{-- <div class="carousel-item active" data-bg-image="{{ asset('org/img/portfolio/portfolio-1.jpg') }}">
            <div class="carousel-container">
                <h2 class="animated fadeInDown">Making your business<br>profitable for today and tomorrow</h2>
                <p class="animated fadeInUp">
                <h3 class="text-white">Inspiring customers & supporting through experience</h3>
                </p>
                <div>
                    <a href="#" class="bg-danger text-white btn-get-started animated fadeInUp ">Our Projects</a>
                    <a href="#" class="bg-info text-white btn-get-started animated fadeInUp fw-bold"
                        style="font-size: 1rem">Learn More</a>
                </div>
            </div>
        </div> --}}
        @php
            $i=0;
        @endphp
        @foreach ($slides as $slide)
            <!-- Slide 2 -->
            <div class="carousel-item @if($i==0) active @endif" data-bg-image="{{ Storage::url($slide->thumbnail) }}">
                <div class="carousel-container">
                    <h2 class="animated fadeInDown">{{ $slide->title }}</h2>
                    <p class="animated fadeInUp">
                    <h3 class="text-white">{{ $slide->card_description }}</h3>
                    </p>
                    <div>
                        <a href="{{ route('activity', $slide->id) }}" class="bg-danger text-white btn-get-started animated fadeInUp">Read More</a>
                    </div>
                </div>
            </div>
            @php
                $i++;
            @endphp
        @endforeach

        <!-- Slide 2 -->
        {{-- <div class="carousel-item" data-bg-image="{{ asset('org/img/portfolio/portfolio-2.jpg') }}">
            <div class="carousel-container">
                <h2 class="animated fadeInDown">Lorem Ipsum Dolor</h2>
                <p class="animated fadeInUp">
                <h3 class="text-white">Innovative strategies for growth and success.</h3>
                </p>
                <div>
                    <a href="#" class="bg-danger text-white btn-get-started animated fadeInUp">Read More</a>
                </div>
            </div>
        </div> --}}

        <!-- Slide 3 -->
        {{-- <div class="carousel-item" data-bg-image="{{ asset('org/img/portfolio/portfolio-3.jpg') }}">
            <div class="carousel-container">
                <h2 class="animated fadeInDown">Maximize Your Potential</h2>
                <p class="animated fadeInUp">
                <h3 class="text-white">Explore strategies to deliver results that matter.</h3>
                </p>
                <div>
                    <a href="#" class="bg-danger text-white btn-get-started animated fadeInUp">Our Services</a>
                </div>
            </div>
        </div> --}}

        <!-- Carousel Controls -->
        <a class="carousel-control-prev" href="#heroCarousel" role="button" data-slide="prev">
            {{-- <span class="carousel-control-prev-icon" aria-hidden="true"></span> --}}
            {{-- <span class="sr-only">Previous</span> --}}
        </a>
        <a class="carousel-control-next" href="#heroCarousel" role="button" data-slide="next">
            {{-- <span class="carousel-control-next-icon" aria-hidden="true"></span> --}}
            {{-- <span class="sr-only">Next</span> --}}
        </a>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const heroSection = document.getElementById('hero');
        const heroCarousel = document.getElementById('heroCarousel');
        const nextButton = document.querySelector('.carousel-control-next');
        const prevButton = document.querySelector('.carousel-control-prev');

        // Function to update the slide information
        const updateSlideInfo = () => {
            const activeSlide = document.querySelector('.carousel-item.active');
            const bgImageUrl = activeSlide.getAttribute('data-bg-image'); // Fetch the image URL
            heroSection.style.setProperty('--hero-bg-image', `url(${bgImageUrl})`); // Update background

            // Optionally update text or other elements (if needed)
            const title = activeSlide.querySelector('h2').textContent;
            const description = activeSlide.querySelector('h3').textContent;

            console.log(`Current Slide: ${title} - ${description}`); // Debug information
            // Update other elements dynamically as needed.
        };

        // Automatically switch slides every 3 seconds
        setInterval(() => {
            $(heroCarousel).carousel('next'); // Trigger the next slide
            setTimeout(updateSlideInfo, 600); // Delay to ensure the slide transition is complete
        }, 4000);

        // Update slide information on manual navigation (Next/Previous buttons)
        nextButton.addEventListener('click', () => {
            $(heroCarousel).carousel('next'); // Trigger the next slide
            setTimeout(updateSlideInfo, 600);
        });

        prevButton.addEventListener('click', () => {
            $(heroCarousel).carousel('prev'); // Trigger the previous slide
            setTimeout(updateSlideInfo, 600);
        });

        // Initialize the first slide background
        updateSlideInfo();
    });
</script>
<!-- jQuery (required for Bootstrap JS) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
