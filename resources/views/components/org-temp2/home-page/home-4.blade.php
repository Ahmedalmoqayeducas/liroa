<!-- About Section -->
<section class="about-section">
    <div style="max-width: 100%;" class="container">
        <div class="about-content row">
            <!-- Image -->
            <div class="col-md-6 about-image">
                <img src="{{ asset('org/img/about.jpg') }}" alt="About Us">
            </div>

            <!-- Text Content -->
            <div class="col-md-6 about-text">
                <p class="text-uppercase text-warning">Passionate – Dedicated – Professional</p>
                <h2 class="fusion-title-heading">It’s not about business, <br> it’s about ‘YOU’!</h2>
                <p>We strive to provide exceptional services and solutions tailored to your needs. Our mission, vision,
                    and strategy guide us in delivering excellence.</p>

                <!-- Tabs -->
                <div class="tabs-container">
                    <ul class="nav nav-tabs" id="aboutTabs">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#mission"><i
                                    class="fa-solid fa-flag"></i> Mission</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#vision"><i class="fa-solid fa-bookmark"></i>
                                The Vision</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#strategy"><i
                                    class="fa-solid fa-lightbulb"></i> Strategy</a>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <div id="mission" class="tab-pane  show active text-dark">
                            <p class="text-dark">We are committed to delivering innovative solutions and outstanding
                                support to our
                                clients, ensuring long-term success and growth.</p>
                        </div>
                        <div id="vision" class="tab-pane  text-dark">
                            <p class="text-dark">Our vision is to be a leader in our industry, providing top-notch
                                services that empower
                                businesses and individuals to reach their full potential.</p>
                        </div>
                        <div id="strategy" class="tab-pane  text-dark">
                            <p class="text-dark">We implement effective strategies that focus on innovation,
                                collaboration, and efficiency
                                to achieve outstanding results for our clients.</p>
                        </div>
                    </div>
                </div>


                <!-- Contact Info Section -->
                <button class="btn-danger rounded-pill px-4 py-2 center contact-info ">
                    <i class="fa-solid fa-phone"></i>
                    <p>+1 (800) 555 555</p>
                </button>

            </div>
        </div>
    </div>
</section>

<!-- Bootstrap 5 -->
{{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"> --}}

<!-- FontAwesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">



<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<style>
    /* Custom Styling */
    .nav-tabs .nav-link {
        color: #495057;
        font-weight: 500;
        transition: 0.3s;
    }

    .nav-tabs .nav-link:hover {
        color: #007bff;
    }

    .nav-tabs .nav-link.active {
        background-color: #007bff;
        color: #fff;
        border: none;
    }

    .tab-content {
        padding: 20px;
        background: #f8f9fa;
        border-radius: 5px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    /* Contact Info Styling */
    .contact-info {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        background-color: #df3179;
        /* Primary blue */
        color: #fff;
        padding: 12px 20px;
        border-radius: 8px;
        font-size: 18px;
        font-weight: bold;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
        max-width: 300px;
        margin: 20px auto;
        transition: all 0.3s ease-in-out;
    }

    .contact-info i {
        font-size: 20px;
    }

    .contact-info:hover {
        background-color: #5b0eeb;
        /* Darker blue on hover */
        transform: scale(1.05);
    }
</style>
