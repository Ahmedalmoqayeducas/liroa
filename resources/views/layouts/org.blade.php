<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Life is Right of All</title>
    <link rel="shortcut icon" href="{{ asset('wp-content/uploads/2022/11/favicon-32x32-1.png') }}" type="image/x-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,700,700i&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('org/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('org/vendor/animate.css/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('org/vendor/icofont/icofont.min.css') }}" rel="stylesheet">
    <link href="{{ asset('org/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('org/vendor/venobox/venobox.css') }}" rel="stylesheet">
    <link href="{{ asset('org/vendor/owl.carousel/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('org/vendor/aos/aos.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('dashboard/summernote/summernote-bs4.min.css') }}">

    <!-- Template Main CSS File -->
    <link href="{{ asset('org/css/style.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('dashboard/css/sidebar-menu.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard/css/SimpleBar.css') }}">

    <!-- Additional CSS from WordPress -->
    <link rel="stylesheet"
        href="{{ asset('wp-content/uploads/fusion-styles/04a65e9ac2df8d06e6794ef20f0589d1.min.css') }}">
    {{-- <link rel="stylesheet"
        href="{{ asset('wp-content/themes/Avada/includes/lib/assets/fonts/icomoon/awb-icons.woff') }}" as="font"
        type="font/woff" crossorigin="">
    <link rel="stylesheet"
        href="{{ asset('wp-content/themes/Avada/includes/lib/assets/fonts/fontawesome/webfonts/fa-brands-400.woff2') }}"
        as="font" type="font/woff2" crossorigin="">
    <link rel="stylesheet"
        href="{{ asset('wp-content/themes/Avada/includes/lib/assets/fonts/fontawesome/webfonts/fa-regular-400.woff2') }}"
        as="font" type="font/woff2" crossorigin="">
    <link rel="stylesheet"
        href="{{ asset('wp-content/themes/Avada/includes/lib/assets/fonts/fontawesome/webfonts/fa-solid-900.woff2') }}"
        as="font" type="font/woff2" crossorigin="">
    <link rel="stylesheet" href="{{ asset('wp-content/uploads/fusion-icons/Business-v3.8/fonts/Business.ttf') }}"
        as="font" type="font/ttf" crossorigin="">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet"> --}}
    <!-- Meta Tags -->
    <meta name="description"
        content="Making your business profitable for today & tomorrow. Inspiring customers & supporting through experience our projects.">
    <meta property="og:locale" content="en_US">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Life is Right of All">
    <meta property="og:title" content="Life is Right of All">
    <meta property="og:description"
        content="Making your business profitable for today & tomorrow. Inspiring customers & supporting through experience our projects.">
    <meta property="og:url" content="https://liroa.org/">
    <meta property="og:image" content={{ asset('org/img/logo-avada-business-01.png') }}>
    <meta property="og:image:width" content="966">
    <meta property="og:image:height" content="219">
    <meta property="og:image:type" content="image/png">

    <!-- Additional Scripts -->
    <script type="text/javascript">
        var doc = document.documentElement;
        doc.setAttribute('data-useragent', navigator.userAgent);
    </script>
    @yield('style')
    <style>
        body {
            max-width: 100% !important;
            overflow-x: hidden !important;
        }

        #header {
            /* width: 100% !important; */
        }
    </style>
</head>

<body
    class=" home page-template page-template-100-width
     page-template-100-width-php page page-id-8 fusion-image-hovers
     fusion-pagination-sizing fusion-button_type-flat fusion-button_span-no
     fusion-button_gradient-linear avada-image-rollover-circle-yes avada-image-rollover-yes
    avada-image-rollover-direction-left fusion-body ltr
     fusion-sticky-header no-tablet-sticky-header no-mobile-sticky-header
      no-mobile-slidingbar no-mobile-totop fusion-disable-outline fusion-sub-menu-fade
      mobile-logo-pos-left layout-wide-mode avada-has-boxed-modal-shadow-
       layout-scroll-offset-full avada-has-zero-margin-offset-top
       fusion-top-header menu-text-align-center mobile-menu-design-classic
        fusion-show-pagination-text fusion-header-layout-v3 avada-responsive
        avada-footer-fx-none avada-menu-highlight-style-bar fusion-search-form-clean
         fusion-main-menu-search-overlay fusion-avatar-circle avada-dropdown-styles
          avada-blog-layout-large avada-blog-archive-layout-large avada-header-shadow-no
           avada-menu-icon-position-left avada-has-megamenu-shadow avada-has-mobile-menu-search
            avada-has-main-nav-search-icon avada-has-breadcrumb-mobile-hidden avada-has-titlebar-hide
             avada-header-border-color-full-transparent avada-has-pagination-width_height
              avada-flyout-menu-direction-fade avada-ec-views-v1
               awb-link-decoration"
    data-awb-post-id="8">

    <!-- ======= Header ======= -->
    @include('components.org.page-header')
    <!-- End Header -->

    <!-- ======= Hero Section ======= -->
    @yield('slide')
    <!-- End Hero -->

    <main id="main" class="clearfix width-100">
        @yield('content')
    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    @include('components.org.footer')
    <!-- End Footer -->

    <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

    <script>
        window.off_canvas_777 = {
            "type": "sliding-bar",
            "width": "100%",
            "width_medium": "",
            "width_small": "",
            "height": "full",
            "custom_height": "",
            "custom_height_medium": "",
            "custom_height_small": "",
            "horizontal_position": "flex-start",
            "horizontal_position_medium": "",
            "horizontal_position_small": "",
            "vertical_position": "flex-end",
            "vertical_position_medium": "",
            "vertical_position_small": "",
            "content_layout": "column",
            "align_content": "center",
            "valign_content": "flex-start",
            "content_wrap": "wrap",
            "enter_animation": "slideShort",
            "enter_animation_direction": "left",
            "enter_animation_speed": 0.5,
            "enter_animation_timing": "ease",
            "exit_animation": "slideShort",
            "exit_animation_direction": "left",
            "exit_animation_speed": 0.5,
            "exit_animation_timing": "ease",
            "off_canvas_state": "closed",
            "sb_height": "",
            "position": "left",
            "transition": "overlap",
            "css_class": "",
            "css_id": "",
            "sb_enter_animation": "slideShort",
            "sb_enter_animation_speed": 0.5,
            "sb_enter_animation_timing": "ease",
            "sb_exit_animation": "slideShort",
            "sb_exit_animation_speed": 0.5,
            "sb_exit_animation_timing": "ease",
            "background_color": "hsla(var(--awb-color8-h),var(--awb-color8-s),calc(var(--awb-color8-l) - 5%),calc(var(--awb-color8-a) - 10%))",
            "background_image": "",
            "background_position": "left top",
            "background_repeat": "repeat",
            "background_size": "",
            "background_custom_size": "",
            "background_blend_mode": "none",
            "oc_scrollbar": "hidden",
            "oc_scrollbar_background": "#f2f3f5",
            "oc_scrollbar_handle_color": "#65bc7b",
            "margin": "",
            "padding": {
                "top": "",
                "bottom": ""
            },
            "box_shadow": "no",
            "box_shadow_position": "",
            "box_shadow_blur": "0",
            "box_shadow_spread": "0",
            "box_shadow_color": "",
            "border_radius": "",
            "border_width": "",
            "border_color": "",
            "overlay": "yes",
            "overlay_z_index": "",
            "overlay_page_scrollbar": "yes",
            "overlay_background_color": "hsla(var(--awb-color8-h),var(--awb-color8-s),var(--awb-color8-l),calc(var(--awb-color8-a) - 10%))",
            "overlay_background_image": "",
            "overlay_background_position": "left top",
            "overlay_background_repeat": "repeat",
            "overlay_background_size": "",
            "overlay_background_custom_size": "",
            "overlay_background_blend_mode": "none",
            "overlay_close_on_click": "yes",
            "close_on_anchor_click": "no",
            "close_on_esc": "yes",
            "auto_close_after_time": "",
            "close_button": "yes",
            "close_button_position": "right",
            "show_close_button_after_time": "",
            "close_button_margin": "",
            "close_button_color": "var(--awb-color1)",
            "close_button_color_hover": "var(--awb-color5)",
            "close_icon_size": "30",
            "close_button_custom_icon": "",
            "on_page_load": "no",
            "time_on_page": "no",
            "time_on_page_duration": "",
            "on_scroll": "no",
            "scroll_direction": "up",
            "scroll_to": "position",
            "scroll_position": "",
            "scroll_element": "",
            "on_click": "no",
            "on_click_element": "",
            "exit_intent": "no",
            "after_inactivity": "no",
            "inactivity_duration": "",
            "on_add_to_cart": "no",
            "frequency": "forever",
            "frequency_xtimes": "",
            "frequency_xdays": "",
            "after_x_page_views": "no",
            "number_of_page_views": "",
            "after_x_sessions": "no",
            "number_of_sessions": "",
            "when_arriving_from": "",
            "users": "all",
            "users_roles": "",
            "device": "",
            "status_css_animations": "desktop",
            "has_js_rules": false
        };
    </script>
    {{-- <div id="awb-oc-2005" class="awb-off-canvas-wrap type-popup"
        style="--awb-horizontal-position:center;--awb-vertical-position:center;--awb-overlay-background-color:hsla(var(--awb-color8-h),var(--awb-color8-s),calc(var(--awb-color8-l) - 10%),calc(var(--awb-color8-a) - 6%));--awb-width:1000px;--awb-box-shadow:;--awb-border-bottom-right-radius:10px;--awb-border-top-right-radius:10px;--awb-background-color:#ffffff;--awb-content-layout:column;--awb-align-content:flex-start;--awb-valign-content:flex-start;--awb-content-wrap:wrap;--awb-close-icon-size:16px;"
        data-id="2005">
        <div class="awb-off-canvas" tabindex="-1"><button class="off-canvas-close awb-icon-close close-position-right"
                aria-label="Close"></button>
            <div class="awb-off-canvas-inner content-layout-column" style="">
                <div class="off-canvas-content">
                    <div class="fusion-fullwidth fullwidth-box fusion-builder-row-15 fusion-flex-container has-pattern-background has-mask-background nonhundred-percent-fullwidth non-hundred-percent-height-scrolling"
                        style="--link_color: var(--awb-color7);--awb-border-radius-top-left:0px;--awb-border-radius-top-right:0px;--awb-border-radius-bottom-right:0px;--awb-border-radius-bottom-left:0px;--awb-padding-right:0px;--awb-padding-left:0px;--awb-flex-wrap:wrap;">
                        <div class="awb-background-mask"
                            style="background-image:  url(data:image/svg+xml;utf8,%3Csvg%20width%3D%221920%22%20height%3D%22954%22%20fill%3D%22none%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%3E%3Cg%20clip-path%3D%22url%28%23prefix__clip0_58_745%29%22%20fill%3D%22rgba%28244%2C245%2C250%2C1%29%22%3E%3Cpath%20d%3D%22M250.018-408.977c69.019-18.494%20142.66%201.238%20193.185%2051.763L718.31-82.107c50.525%2050.525%2070.258%20124.167%2051.764%20193.185L669.378%20486.881c-18.493%2069.019-72.403%20122.928-141.421%20141.422L152.154%20728.999c-69.019%2018.493-142.66-1.239-193.186-51.764l-275.106-275.107c-50.525-50.525-70.258-124.167-51.764-193.185l100.696-375.803c18.493-69.018%2072.403-122.928%20141.421-141.421l375.803-100.696zM1646.73%201264.15c33.13%208.88%2068.48-.59%2092.73-24.84l147.89-147.89a96.031%2096.031%200%200024.85-92.732l-54.13-202.022a96.012%2096.012%200%2000-67.89-67.882l-202.02-54.132c-33.13-8.877-68.47.595-92.73%2024.847l-147.89%20147.89a95.994%2095.994%200%2000-24.84%2092.729l54.13%20202.022a95.967%2095.967%200%200067.88%2067.88l202.02%2054.13zM1572.48%20252.659a23.996%2023.996%200%200023.18%206.211l50.5-13.533a23.97%2023.97%200%200016.97-16.97l13.54-50.506a24.004%2024.004%200%2000-6.21-23.182l-36.98-36.973a23.993%2023.993%200%2000-23.18-6.211l-50.5%2013.533a24%2024%200%2000-16.98%2016.97l-13.53%2050.506a24.004%2024.004%200%20006.21%2023.182l36.98%2036.973z%22%2F%3E%3C%2Fg%3E%3Cdefs%3E%3CclipPath%20id%3D%22prefix__clip0_58_745%22%3E%3Cpath%20fill%3D%22%23fff%22%20d%3D%22M0%200h1920v954H0z%22%2F%3E%3C%2FclipPath%3E%3C%2Fdefs%3E%3C%2Fsvg%3E);opacity: 1 ;transform: scale(1, 1);mix-blend-mode:normal;">
                        </div>
                        <div class="fusion-builder-row fusion-row fusion-flex-align-items-stretch fusion-flex-content-wrap"
                            style="max-width:calc( 1320px + 0px );margin-left: calc(-0px / 2 );margin-right: calc(-0px / 2 );">
                            <div class="fusion-layout-column fusion_builder_column fusion-builder-column-48 fusion-flex-column"
                                style="--awb-padding-top-small:120px;--awb-padding-bottom-small:120px;--awb-bg-position:center center;--awb-bg-size:cover;--awb-width-large:40%;--awb-margin-top-large:0px;--awb-spacing-right-large:0px;--awb-margin-bottom-large:0px;--awb-spacing-left-large:0px;--awb-width-medium:40%;--awb-order-medium:0;--awb-spacing-right-medium:0px;--awb-spacing-left-medium:0px;--awb-width-small:100%;--awb-order-small:0;--awb-spacing-right-small:0px;--awb-spacing-left-small:0px;">
                                <div class="fusion-column-wrapper lazyload fusion-column-has-shadow fusion-flex-justify-content-flex-start fusion-content-layout-column fusion-empty-column-bg-image fusion-column-has-bg-image"
                                    data-bg-url="http://liroa.org/wp-content/uploads/2022/10/business-newsletter-1.jpg"
                                    data-bg="http://liroa.org/wp-content/uploads/2022/10/business-newsletter-1.jpg">
                                    <img decoding="async"
                                        class="fusion-empty-dims-img-placeholder fusion-no-large-visibility fusion-no-medium-visibility"
                                        src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==">
                                </div>
                            </div>
                            <div class="fusion-layout-column fusion_builder_column fusion-builder-column-49 fusion-flex-column"
                                style="--awb-padding-top:50px;--awb-padding-right:80px;--awb-padding-bottom:50px;--awb-padding-left:80px;--awb-bg-size:cover;--awb-width-large:60%;--awb-margin-top-large:0px;--awb-spacing-right-large:0px;--awb-margin-bottom-large:0px;--awb-spacing-left-large:0px;--awb-width-medium:60%;--awb-order-medium:0;--awb-spacing-right-medium:0px;--awb-spacing-left-medium:0px;--awb-width-small:100%;--awb-order-small:0;--awb-spacing-right-small:0px;--awb-spacing-left-small:0px;">
                                <div
                                    class="fusion-column-wrapper fusion-column-has-shadow fusion-flex-justify-content-center fusion-content-layout-column">
                                    <div
                                        class="fusion-title title fusion-title-41 fusion-sep-none fusion-title-text fusion-title-size-three">
                                        <h3 class="fusion-title-heading title-heading-left" style="margin:0;">
                                            looking for a reliable partner in business?</h3>
                                    </div>
                                    <div class="fusion-separator"
                                        style="align-self: flex-start;margin-right:auto;margin-bottom:10px;width:100%;max-width:80px;">
                                        <div class="fusion-separator-border sep-single sep-solid"
                                            style="--awb-height:20px;--awb-amount:20px;--awb-sep-color:var(--awb-color5);border-color:var(--awb-color5);border-top-width:2px;">
                                        </div>
                                    </div>
                                    <div class="fusion-text fusion-text-46">
                                        <p>Setus ipsum pharetra sa auctor kassa lorem matiy dui valite interdum.
                                            Nulla facilis integer valites.</p>
                                    </div>
                                    <div class="fusion-form fusion-form-builder fusion-form-form-wrapper fusion-form-2010 has-icon-alignment"
                                        style="--awb-tooltip-text-color:#ffffff;--awb-tooltip-background-color:#333333;--awb-form-input-height:60px;--awb-form-bg-color:hsla(var(--awb-color1-h),var(--awb-color1-s),var(--awb-color1-l),calc(var(--awb-color1-a) - 100%));--awb-form-select-bg:var(--awb-color1);--awb-form-font-size:17px;--awb-form-border-width-top:0px;--awb-form-border-width-bottom:1px;--awb-form-border-width-right:0px;--awb-form-border-width-left:0px;--awb-form-border-color:var(--awb-color3);--awb-form-focus-border-color:var(--awb-color7);--awb-form-focus-border-hover-color:hsla(var(--awb-color7-h),var(--awb-color7-s),var(--awb-color7-l),calc(var(--awb-color7-a) - 50%));--awb-form-border-radius:0px;--awb-icon-alignment-top:0px;--awb-icon-alignment-bottom:1px;--awb-icon-alignment-font-size:17px;"
                                        data-form-id="2010"
                                        data-config="{&quot;form_id&quot;:&quot;2010&quot;,&quot;form_post_id&quot;:&quot;2010&quot;,&quot;post_id&quot;:8,&quot;form_type&quot;:&quot;ajax&quot;,&quot;confirmation_type&quot;:&quot;message&quot;,&quot;redirect_url&quot;:&quot;&quot;,&quot;field_labels&quot;:{&quot;email&quot;:&quot;&quot;},&quot;field_logics&quot;:{&quot;email&quot;:&quot;&quot;},&quot;field_types&quot;:{&quot;email&quot;:&quot;email&quot;,&quot;submit_2&quot;:&quot;submit&quot;},&quot;nonce_method&quot;:&quot;ajax&quot;}">
                                        <form action="https://liroa.org/" method="post"
                                            class="fusion-form fusion-form-2010">
                                            <div class="fusion-fullwidth fullwidth-box fusion-builder-row-15-1 fusion-flex-container has-pattern-background has-mask-background nonhundred-percent-fullwidth non-hundred-percent-height-scrolling"
                                                style="--awb-border-radius-top-left:0px;--awb-border-radius-top-right:0px;--awb-border-radius-bottom-right:0px;--awb-border-radius-bottom-left:0px;--awb-padding-right:0px;--awb-padding-left:0px;--awb-flex-wrap:wrap;">
                                                <div class="fusion-builder-row fusion-row fusion-flex-align-items-center fusion-flex-content-wrap"
                                                    style="width:104% !important;max-width:104% !important;margin-left: calc(-4% / 2 );margin-right: calc(-4% / 2 );">
                                                    <div class="fusion-layout-column fusion_builder_column fusion-builder-column-50 fusion_builder_column_1_1 1_1 fusion-flex-column"
                                                        style="--awb-bg-size:cover;--awb-width-large:100%;--awb-margin-top-large:0px;--awb-spacing-right-large:1.92%;--awb-margin-bottom-large:0px;--awb-spacing-left-large:1.92%;--awb-width-medium:100%;--awb-order-medium:0;--awb-spacing-right-medium:1.92%;--awb-spacing-left-medium:1.92%;--awb-width-small:100%;--awb-order-small:0;--awb-spacing-right-small:1.92%;--awb-spacing-left-small:1.92%;">
                                                        <div
                                                            class="fusion-column-wrapper fusion-column-has-shadow fusion-flex-justify-content-flex-start fusion-content-layout-column">
                                                            <div class="fusion-form-field fusion-form-email-field fusion-form-label-above"
                                                                style="" data-form-id="2010"><input
                                                                    type="email" name="email" id="email"
                                                                    value="" class="fusion-form-input"
                                                                    required="true" aria-required="true"
                                                                    placeholder="Enter your email*"
                                                                    data-holds-private-data="false"></div>
                                                        </div>
                                                    </div>
                                                    <div class="fusion-layout-column fusion_builder_column fusion-builder-column-51 fusion_builder_column_1_1 1_1 fusion-flex-column"
                                                        style="--awb-bg-size:cover;--awb-width-large:100%;--awb-margin-top-large:0px;--awb-spacing-right-large:1.92%;--awb-margin-bottom-large:0px;--awb-spacing-left-large:1.92%;--awb-width-medium:100%;--awb-order-medium:0;--awb-spacing-right-medium:1.92%;--awb-spacing-left-medium:1.92%;--awb-width-small:100%;--awb-order-small:0;--awb-spacing-right-small:1.92%;--awb-spacing-left-small:1.92%;">
                                                        <div
                                                            class="fusion-column-wrapper fusion-column-has-shadow fusion-flex-justify-content-flex-start fusion-content-layout-column">
                                                            <div class="fusion-form-field fusion-form-submit-field fusion-form-label-above"
                                                                style="" data-form-id="2010">
                                                                <div><button type="submit"
                                                                        class="fusion-button button-flat fusion-button-default-size button-custom fusion-button-default button-20 fusion-button-span-yes  form-form-submit button-default"
                                                                        style="--button_accent_color:var(--awb-color1);--button_accent_hover_color:var(--awb-color1);--button_border_hover_color:var(--awb-color1);--button_gradient_top_color:var(--awb-color5);--button_gradient_bottom_color:var(--awb-color5);--button_gradient_top_color_hover:var(--awb-color6);--button_gradient_bottom_color_hover:var(--awb-color6);--button_padding-top:20px;--button_padding-right:80px;--button_padding-bottom:22px;--button_padding-left:80px;"
                                                                        data-form-number="2010" tabindex=""><span
                                                                            class="fusion-button-text">Subscribe</span><i
                                                                            class="awb-business-long-arrow-alt-right-solid button-icon-right"
                                                                            aria-hidden="true"></i></button></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="fusion-text fusion-text-47"
                                        style="--awb-font-size:13px;--awb-text-color:var(--awb-color4);">
                                        <p>By entering your email, you are agreed to our <strong><u><span
                                                        style="color: var(--awb-color6);"><a href="#">Terms
                                                            &amp;
                                                            Conditions</a></span></u></strong>.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    <script>
        window.off_canvas_2005 = {
            "type": "popup",
            "width": "1000px",
            "width_medium": "",
            "width_small": "",
            "height": "fit",
            "custom_height": "",
            "custom_height_medium": "",
            "custom_height_small": "",
            "horizontal_position": "center",
            "horizontal_position_medium": "",
            "horizontal_position_small": "",
            "vertical_position": "center",
            "vertical_position_medium": "",
            "vertical_position_small": "",
            "content_layout": "column",
            "align_content": "flex-start",
            "valign_content": "flex-start",
            "content_wrap": "wrap",
            "enter_animation": "zoom",
            "enter_animation_direction": "static",
            "enter_animation_speed": 0.5,
            "enter_animation_timing": "ease",
            "exit_animation": "zoom",
            "exit_animation_direction": "static",
            "exit_animation_speed": 0.5,
            "exit_animation_timing": "ease",
            "off_canvas_state": "closed",
            "sb_height": "",
            "position": "left",
            "transition": "overlap",
            "css_class": "",
            "css_id": "",
            "sb_enter_animation": "slideShort",
            "sb_enter_animation_speed": 0.5,
            "sb_enter_animation_timing": "ease",
            "sb_exit_animation": "slideShort",
            "sb_exit_animation_speed": 0.5,
            "sb_exit_animation_timing": "ease",
            "background_color": "#ffffff",
            "background_image": "",
            "background_position": "left top",
            "background_repeat": "repeat",
            "background_size": "",
            "background_custom_size": "",
            "background_blend_mode": "none",
            "oc_scrollbar": "default",
            "oc_scrollbar_background": "#f2f3f5",
            "oc_scrollbar_handle_color": "#65bc7b",
            "margin": {
                "right": "",
                "left": ""
            },
            "padding": {
                "right": "",
                "left": ""
            },
            "box_shadow": "no",
            "box_shadow_position": {
                "vertical": "2px",
                "horizontal": "2px"
            },
            "box_shadow_blur": "8",
            "box_shadow_spread": "0",
            "box_shadow_color": "",
            "border_radius": {
                "bottom_right": "10px",
                "top_left": "",
                "top_right": "10px",
                "bottom_left": ""
            },
            "border_width": "",
            "border_color": "",
            "overlay": "yes",
            "overlay_z_index": "",
            "overlay_page_scrollbar": "yes",
            "overlay_background_color": "hsla(var(--awb-color8-h),var(--awb-color8-s),calc(var(--awb-color8-l) - 10%),calc(var(--awb-color8-a) - 6%))",
            "overlay_background_image": "",
            "overlay_background_position": "left top",
            "overlay_background_repeat": "repeat",
            "overlay_background_size": "",
            "overlay_background_custom_size": "",
            "overlay_background_blend_mode": "none",
            "overlay_close_on_click": "yes",
            "close_on_anchor_click": "no",
            "close_on_esc": "yes",
            "auto_close_after_time": "",
            "close_button": "yes",
            "close_button_position": "right",
            "show_close_button_after_time": "",
            "close_button_margin": "",
            "close_button_color": "",
            "close_button_color_hover": "",
            "close_icon_size": "16",
            "close_button_custom_icon": "",
            "on_page_load": "no",
            "time_on_page": "no",
            "time_on_page_duration": "30",
            "on_scroll": "yes",
            "scroll_direction": "down",
            "scroll_to": "position",
            "scroll_position": "5000px",
            "scroll_element": "",
            "on_click": "no",
            "on_click_element": "",
            "exit_intent": "no",
            "after_inactivity": "no",
            "inactivity_duration": "",
            "on_add_to_cart": "no",
            "frequency": "forever",
            "frequency_xtimes": "",
            "frequency_xdays": "",
            "after_x_page_views": "no",
            "number_of_page_views": "",
            "after_x_sessions": "no",
            "number_of_sessions": "",
            "when_arriving_from": "",
            "users": "all",
            "users_roles": "",
            "device": ["desktop"],
            "status_css_animations": "desktop",
            "conditions_enabled": "yes",
            "layout_conditions": "{\"front_page\":{\"label\":\"Front Page\",\"type\":\"singular\",\"mode\":\"include\",\"singular\":\"front_page\"},\"specific_page|8\":{\"label\":\"Business Home Alternate\",\"type\":\"singular\",\"mode\":\"include\",\"singular\":\"specific_page|8\",\"parent\":\"specific_page\"}}",
            "has_js_rules": false
        };
    </script>
    <script type="text/javascript">
        var fusionNavIsCollapsed = function(e) {
                var t, n;
                window.innerWidth <= e.getAttribute("data-breakpoint") ? (e.classList.add("collapse-enabled"), e.classList
                        .remove("awb-menu_desktop"), e.classList.contains("expanded") || (e.setAttribute("aria-expanded",
                            "false"), window.dispatchEvent(new Event("fusion-mobile-menu-collapsed", {
                            bubbles: !0,
                            cancelable: !0
                        }))), (n = e.querySelectorAll(".menu-item-has-children.expanded")).length && n.forEach(function(e) {
                            e.querySelector(".awb-menu__open-nav-submenu_mobile").setAttribute("aria-expanded", "false")
                        })) : (null !== e.querySelector(
                            ".menu-item-has-children.expanded .awb-menu__open-nav-submenu_click") && e.querySelector(
                            ".menu-item-has-children.expanded .awb-menu__open-nav-submenu_click").click(), e.classList
                        .remove("collapse-enabled"), e.classList.add("awb-menu_desktop"), e.setAttribute("aria-expanded",
                            "true"), null !== e.querySelector(".awb-menu__main-ul") && e.querySelector(".awb-menu__main-ul")
                        .removeAttribute("style")), e.classList.add("no-wrapper-transition"), clearTimeout(t), t =
                    setTimeout(() => {
                        e.classList.remove("no-wrapper-transition")
                    }, 400), e.classList.remove("loading")
            },
            fusionRunNavIsCollapsed = function() {
                var e, t = document.querySelectorAll(".awb-menu");
                for (e = 0; e < t.length; e++) fusionNavIsCollapsed(t[e])
            };

        function avadaGetScrollBarWidth() {
            var e, t, n, l = document.createElement("p");
            return l.style.width = "100%", l.style.height = "200px", (e = document.createElement("div")).style.position =
                "absolute", e.style.top = "0px", e.style.left = "0px", e.style.visibility = "hidden", e.style.width =
                "200px", e.style.height = "150px", e.style.overflow = "hidden", e.appendChild(l), document.body.appendChild(
                    e), t = l.offsetWidth, e.style.overflow = "scroll", t == (n = l.offsetWidth) && (n = e.clientWidth),
                document.body.removeChild(e), jQuery("html").hasClass("awb-scroll") && 10 < t - n ? 10 : t - n
        }
        fusionRunNavIsCollapsed(), window.addEventListener("fusion-resize-horizontal", fusionRunNavIsCollapsed);
    </script>
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
    <script type="text/javascript" src="{{ asset('wp-includes/js/jquery/jquery.min.js?ver=3.7.1') }}" id="jquery-core-js">
    </script>
    <script src="{{ asset('dashboard/js/SimpleBar.js') }}"></script>
    <script src="{{ asset('dashboard/js/sidebar-menu.js') }}"></script>
    <script type="text/javascript"
        src="wp-content/uploads/fusion-scripts/a2d2254adf93ffe2b1a3339712db8398.min.js?ver=3.11.10" id="fusion-scripts-js">
    </script>
    <script type="text/javascript">
        jQuery(document).ready(function() {
            var ajaxurl = 'https://liroa.org/wp-admin/admin-ajax.php';
            if (0 < jQuery('.fusion-login-nonce').length) {
                jQuery.get(ajaxurl, {
                    'action': 'fusion_login_nonce'
                }, function(response) {
                    jQuery('.fusion-login-nonce').html(response);
                });
            }
        });
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="{{ asset('dashboard/summernote/summernote-bs4.min.js') }}"></script>
    <script>
        $(function() {
            // Summernote
            $('#summernote').summernote()


        })
    </script>
    </div>

    {{-- <section class="to-top-container to-top-right to-top-floating" aria-labelledby="awb-to-top-label"> --}}
    <a href="#" id="toTop" class="fusion-top-top-link">
        <span id="awb-to-top-label" class="screen-reader-text">Go to Top</span>
    </a>
    {{-- </section> --}}
</body>

</html>
