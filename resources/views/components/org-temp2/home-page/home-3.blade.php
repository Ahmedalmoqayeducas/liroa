<div class="fusion-fullwidth fullwidth-box fusion-builder-row-4 fusion-flex-container has-pattern-background has-mask-background nonhundred-percent-fullwidth non-hundred-percent-height-scrolling"
    style="--awb-border-radius-top-left:0px;--awb-border-radius-top-right:0px;--awb-border-radius-bottom-right:0px;--awb-border-radius-bottom-left:0px;--awb-margin-top:60px;--awb-flex-wrap:wrap;">
    <div class="fusion-builder-row fusion-row fusion-flex-align-items-flex-start fusion-flex-content-wrap"
        style="max-width:1372.8px;margin-left: calc(-4% / 2 );margin-right: calc(-4% / 2 );">
        <div class="fusion-layout-column fusion_builder_column fusion-builder-column-8 fusion_builder_column_1_2 1_2 fusion-flex-column"
            style="--awb-bg-size:cover;--awb-width-large:50%;--awb-margin-top-large:0px;--awb-spacing-right-large:3.84%;--awb-margin-bottom-large:0px;--awb-spacing-left-large:3.84%;--awb-width-medium:50%;--awb-order-medium:0;--awb-spacing-right-medium:3.84%;--awb-spacing-left-medium:3.84%;--awb-width-small:100%;--awb-order-small:0;--awb-spacing-right-small:1.92%;--awb-spacing-left-small:1.92%;">
            <div
                class="fusion-column-wrapper fusion-column-has-shadow fusion-flex-justify-content-flex-start fusion-content-layout-column">
                <div class="fusion-text fusion-text-10 sm-text-align-center fusion-text-no-margin"
                    style="--awb-font-size:19px;--awb-text-transform:capitalize;--awb-text-color:var(--awb-color5);--awb-margin-bottom:0px;">
                    <p>Passionate – Dedicated – Professional</p>
                </div>
                <div class="fusion-separator fusion-no-small-visibility"
                    style="align-self: flex-start;margin-right:auto;width:100%;max-width:282px;">
                    <div class="fusion-separator-border sep-single sep-dotted"
                        style="--awb-height:20px;--awb-amount:20px;--awb-sep-color:var(--awb-color4);border-color:var(--awb-color4);border-top-width:1px;">
                    </div>
                </div>
                <div class="fusion-separator fusion-no-medium-visibility fusion-no-large-visibility"
                    style="align-self: center;margin-left: auto;margin-right: auto;width:100%;max-width:282px;">
                    <div class="fusion-separator-border sep-single sep-dotted"
                        style="--awb-height:20px;--awb-amount:20px;--awb-sep-color:var(--awb-color4);border-color:var(--awb-color4);border-top-width:1px;">
                    </div>
                </div>
                <div class="fusion-title title fusion-title-15 fusion-sep-none fusion-title-text fusion-title-size-two"
                    style="--awb-margin-top:20px;">
                    <h2 class="fusion-title-heading title-heading-left sm-text-align-center" style="margin:0;">achieve
                        your goals with purpose &amp;
                        strategy
                    </h2>
                </div>
            </div>
        </div>
        <div class="fusion-layout-column fusion_builder_column fusion-builder-column-9 fusion_builder_column_1_2 1_2 fusion-flex-column"
            style="--awb-padding-top:70px;--awb-padding-right:60px;--awb-padding-top-small:40px;--awb-padding-right-small:0px;--awb-bg-size:cover;--awb-width-large:50%;--awb-margin-top-large:0px;--awb-spacing-right-large:3.84%;--awb-margin-bottom-large:0px;--awb-spacing-left-large:3.84%;--awb-width-medium:50%;--awb-order-medium:0;--awb-spacing-right-medium:3.84%;--awb-spacing-left-medium:3.84%;--awb-width-small:100%;--awb-order-small:0;--awb-spacing-right-small:1.92%;--awb-spacing-left-small:1.92%;">
            <div
                class="fusion-column-wrapper fusion-column-has-shadow fusion-flex-justify-content-flex-start fusion-content-layout-column">
                <div class="fusion-text fusion-text-11 sm-text-align-center"
                    style="--awb-font-size:var(--awb-typography2-font-size);--awb-line-height:var(--awb-typography2-line-height);--awb-letter-spacing:var(--awb-typography2-letter-spacing);--awb-text-transform:var(--awb-typography2-text-transform);--awb-text-font-family:var(--awb-typography2-font-family);--awb-text-font-weight:var(--awb-typography2-font-weight);--awb-text-font-style:var(--awb-typography2-font-style);">
                    <p>Auisque cursus metus vitae sed pharetra auctor semy mas interdum
                        magnads augue.</p>
                </div>
                <div class="fusion-separator fusion-no-small-visibility"
                    style="align-self: flex-start;margin-right:auto;margin-top:10px;width:100%;max-width:100px;">
                    <div class="fusion-separator-border sep-single sep-dotted"
                        style="--awb-height:20px;--awb-amount:20px;--awb-sep-color:var(--awb-color4);border-color:var(--awb-color4);border-top-width:1px;">
                    </div>
                </div>
                <div class="fusion-separator fusion-no-medium-visibility fusion-no-large-visibility"
                    style="align-self: center;margin-left: auto;margin-right: auto;margin-top:10px;width:100%;max-width:100px;">
                    <div class="fusion-separator-border sep-single sep-dotted"
                        style="--awb-height:20px;--awb-amount:20px;--awb-sep-color:var(--awb-color4);border-color:var(--awb-color4);border-top-width:1px;">
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="grid-container" id="service-cards">
                @foreach ($goals as $service)
                <div class="card" style="max-width: 100%;">
                        <i class="fa-solid {{ $service->icon }}"></i>
                        <h4>{{ $service->title }}</h4>
                        <p>{{ $service->description }}</p>
                        <a href="{{ $service->link }}">
                            View Details <i class="fa-solid fa-arrow-right"></i>
                        </a>

                    </div>
                    @endforeach
            </div>
        </div>

        {{-- <script>
            $(document).ready(function() {
                const services = [{
                        title: "Data & Analytics",
                        icon: "fa-chart-bar",
                        text: "Enhance decision-making with powerful data insights.",
                        link: "expertise/data-analytics/index.htm"
                    },
                    {
                        title: "Content Planning",
                        icon: "fa-clipboard-list",
                        text: "Strategize your content for maximum engagement.",
                        link: "expertise/content-planning/index.htm"
                    },
                    {
                        title: "Business Consulting",
                        icon: "fa-briefcase",
                        text: "Optimize your business strategies for success.",
                        link: "expertise/business-consulting/index.htm"
                    },
                    {
                        title: "Sales Management",
                        icon: "fa-chart-line",
                        text: "Develop cost-effective infrastructures with intuitivism.",
                        link: "expertise/business-consulting/index.htm"
                    },
                    {
                        title: "Private Taxation",
                        icon: "fa-file-invoice-dollar",
                        text: "Optimize taxation strategies for private businesses.",
                        link: "expertise/business-consulting/index.htm"
                    },
                    {
                        title: "Marketing Strategy",
                        icon: "fa-bullhorn",
                        text: "Boost brand awareness and drive sales effectively.",
                        link: "expertise/business-consulting/index.htm"
                    }
                ];

                services.forEach(service => {
                    $("#service-cards").append(`
                        <div class="card" style="max-width: 100%;">
                            <i class="fa-solid ${service.icon}"></i>
                            <h4>${service.title}</h4>
                            <p>${service.text}</p>
                            <a href="${service.link}">
                                View Details <i class="fa-solid fa-arrow-right"></i>
                            </a>
                        </div>
                    `);
                });
            });
        </script> --}}



        {{-- <div class="fusion-fullwidth fullwidth-box fusion-builder-row-4 fusion-flex-container has-pattern-background has-mask-background nonhundred-percent-fullwidth non-hundred-percent-height-scrolling">
            <div class="fusion-builder-row fusion-row fusion-flex-align-items-flex-start fusion-flex-content-wrap">


                <div
                class="fusion-layout-column fusion_builder_column fusion-builder-column-10 fusion_builder_column_1_3 1_3 fusion-flex-column">
                <div
                class="fusion-column-wrapper fusion-column-has-shadow fusion-flex-justify-content-flex-start fusion-content-layout-column">
                <i class="fa-solid fa-chart-bar" style="font-size:56px; color:var(--awb-color6);"></i>
                <div class="fusion-title title">
                            <h4 class="fusion-title-heading">Data &amp; Analytics</h4>
                        </div>
                        <div class="fusion-text">
                            <p>Enhance decision-making with powerful data insights.</p>
                        </div>
                        <a class="fusion-button button-flat fusion-button-default-size"
                        href="expertise/data-analytics/index.htm">
                        <span class="fusion-button-text">View Details</span>
                        <i class="fa-solid fa-arrow-right"></i>
                    </a>
                </div>
            </div>
                <div
                    class="fusion-layout-column fusion_builder_column fusion-builder-column-15 fusion_builder_column_1_3 1_3 fusion-flex-column">
                    <div
                        class="fusion-column-wrapper fusion-column-has-shadow fusion-flex-justify-content-flex-start fusion-content-layout-column">
                        <i class="fa-solid fa-bullhorn" style="font-size:56px; color:var(--awb-color6);"></i>
                        <div class="fusion-title title">
                            <h4 class="fusion-title-heading">marketing strategy</h4>
                        </div>
                        <div class="fusion-text">
                            <p>Compellingly develop the cost effective infrastructures with intuitivism.</p>
                        </div>
                        <a class="fusion-button button-flat fusion-button-default-size"
                            href="expertise/business-consulting/index.htm">
                            <span class="fusion-button-text">View Details</span>
                            <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div> --}}


    </div>
</div>


@section('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }

        .container {
            max-width: 1500px;
            margin: auto;
            padding: 20px;
        }

        .grid-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            padding: 20px;
        }

        .card {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            transition: all 0.5s ease-in-out;
            width: 350px;
        }

        .card:hover {
            transform: translateY(-5px);
            transform: scale(1.05);
            background: rgba(252, 7, 88, 0.842);
        }

        .card i {
            font-size: 56px;
            color: var(--awb-color6, #007bff);
            margin-bottom: 15px;
        }

        .card h4 {
            font-size: 20px;
            margin-bottom: 10px;
            text-transform: capitalize;
        }

        .card p {
            font-size: 14px;
            color: #555;
            margin-bottom: 15px;
        }

        .card a {
            display: inline-flex;
            align-items: center;
            text-decoration: none;
            font-weight: bold;
            color: #007bff;
        }

        .card a i {
            font-size: 16px;
            margin-left: 5px;
        }

        @media (max-width: 768px) {
            .grid-container {
                flex-direction: column;
                align-items: center;
            }

            .fusion-title-heading {
                font-size: xx-large !important;
                text-align: center !important;

            }
        }
    </style>
@endsection
