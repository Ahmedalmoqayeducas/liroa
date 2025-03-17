@extends('layouts.org')
@section('content')
    <!-- ======= Services Section ======= -->

    @include('components.org.branch-slide', [
        'pageName' => 'News & Insights',
        'title' => 'Client-Focused Leadership Skills',
    ])
    <!-- ======= Service Details Section ======= -->
    <br>
    <br>
    <br>
    <div class="fusion-fullwidth fullwidth-box fusion-builder-row-5 fusion-flex-container has-pattern-background has-mask-background nonhundred-percent-fullwidth non-hundred-percent-height-scrolling"
        style="--awb-border-radius-top-left:0px;--awb-border-radius-top-right:0px;--awb-border-radius-bottom-right:0px;--awb-border-radius-bottom-left:0px;--awb-margin-bottom:60px;--awb-flex-wrap:wrap;">
        <div class="fusion-builder-row fusion-row fusion-flex-align-items-flex-start fusion-flex-content-wrap"
            style="max-width:1372.8px;margin-left: calc(-4% / 2 );margin-right: calc(-4% / 2 );">
            <div class="fusion-layout-column fusion_builder_column fusion-builder-column-13 fusion_builder_column_2_3 2_3 fusion-flex-column"
                style="--awb-bg-size:cover;--awb-width-large:66.666666666667%;--awb-margin-top-large:0px;--awb-spacing-right-large:2.88%;--awb-margin-bottom-large:0px;--awb-spacing-left-large:2.88%;--awb-width-medium:60%;--awb-order-medium:0;--awb-spacing-right-medium:3.2%;--awb-spacing-left-medium:3.2%;--awb-width-small:100%;--awb-order-small:0;--awb-spacing-right-small:1.92%;--awb-spacing-left-small:1.92%;">
                <div
                    class="fusion-column-wrapper fusion-column-has-shadow fusion-flex-justify-content-flex-start fusion-content-layout-column">
                    <div class="fusion-post-cards fusion-post-cards-3 fusion-grid-archive fusion-grid-columns-2"
                        style="--awb-column-spacing:50px;--awb-columns:2;--awb-active-filter-border-size:3px;--awb-filters-height:36px;--awb-row-spacing:50px;--awb-columns-medium:100%;--awb-columns-small:100%;">
                        @yield('activityContent')

                    </div>
                </div>
            </div>
            @include('components.org.news-insights.ads')
        </div>
    </div>
@endsection
