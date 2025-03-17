@extends('pages.org.activities')
@section('activityContent')
    {{-- <div class="fusion-row" style="max-width:100%;">

        <section id="content" style="width: 100%;">
            <div id="post-1523"
                class="post-1523 post type-post status-publish format-standard has-post-thumbnail hentry category-audit-taxation tag-taxation">

                <div class="post-content">
                    <div class="fusion-fullwidth fullwidth-box fusion-builder-row-3 fusion-flex-container has-pattern-background has-mask-background nonhundred-percent-fullwidth non-hundred-percent-height-scrolling"
                        style="--awb-border-radius-top-left:0px;--awb-border-radius-top-right:0px;--awb-border-radius-bottom-right:0px;--awb-border-radius-bottom-left:0px;--awb-margin-top:60px;--awb-margin-bottom:60px;--awb-flex-wrap:wrap;">
                        <div class="fusion-builder-row fusion-row fusion-flex-align-items-flex-start fusion-flex-justify-content-center fusion-flex-content-wrap"
                            style="max-width:1372.8px;margin-left: calc(-4% / 2 );margin-right: calc(-4% / 2 );">
                            <div class="fusion-layout-column fusion_builder_column fusion-builder-column-7 fusion_builder_column_2_3 2_3 fusion-flex-column"
                                style="--awb-bg-size:cover;--awb-width-large:66.666666666667%;--awb-margin-top-large:0px;--awb-spacing-right-large:2.88%;--awb-margin-bottom-large:0px;--awb-spacing-left-large:2.88%;--awb-width-medium:83.333333333333%;--awb-order-medium:0;--awb-spacing-right-medium:2.304%;--awb-spacing-left-medium:2.304%;--awb-width-small:100%;--awb-order-small:0;--awb-spacing-right-small:1.92%;--awb-spacing-left-small:1.92%;">

                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div> <!-- fusion-row --> --}}

    <div class="fusion-image-element "
        style="--awb-aspect-ratio: 100 / 65;--awb-caption-title-font-family:var(--h2_typography-font-family);--awb-caption-title-font-weight:var(--h2_typography-font-weight);--awb-caption-title-font-style:var(--h2_typography-font-style);--awb-caption-title-size:var(--h2_typography-font-size);--awb-caption-title-transform:var(--h2_typography-text-transform);--awb-caption-title-line-height:var(--h2_typography-line-height);--awb-caption-title-letter-spacing:var(--h2_typography-letter-spacing);">
        <span class=" fusion-imageframe  imageframe-6 hover-type-none has-aspect-ratio" style="border-radius:10px;"><img
                decoding="async" width="900" height="758" title="Blog Image Mission"
                src="{{ asset(Storage::url("$activity->thumbnail")) }}"
                data-orig-src="{{ asset(Storage::url("$activity->thumbnail")) }}"
                class="img-responsive wp-image-1515 img-with-aspect-ratio lazyloaded" alt=""></span>
    </div>

    <div class="fusion-content-tb fusion-content-tb-1" style="--awb-margin-top:40px;">
        <div class="fusion-fullwidth fullwidth-box fusion-builder-row-3-1 fusion-flex-container has-pattern-background has-mask-background nonhundred-percent-fullwidth non-hundred-percent-height-scrolling"
            style="--awb-border-radius-top-left:0px;--awb-border-radius-top-right:0px;--awb-border-radius-bottom-right:0px;--awb-border-radius-bottom-left:0px;--awb-flex-wrap:wrap;">
            <div class="fusion-builder-row fusion-row fusion-flex-align-items-flex-start fusion-flex-content-wrap"
                style="max-width:1372.8px;margin-left: calc(-4% / 2 );margin-right: calc(-4% / 2 );">
                <div class="fusion-layout-column fusion_builder_column fusion-builder-column-8 fusion_builder_column_1_1 1_1 fusion-flex-column"
                    style="--awb-bg-size:cover;--awb-width-large:100%;--awb-margin-top-large:0px;--awb-spacing-right-large:1.92%;--awb-margin-bottom-large:0px;--awb-spacing-left-large:1.92%;--awb-width-medium:100%;--awb-order-medium:0;--awb-spacing-right-medium:1.92%;--awb-spacing-left-medium:1.92%;--awb-width-small:100%;--awb-order-small:0;--awb-spacing-right-small:1.92%;--awb-spacing-left-small:1.92%;">
                    <div
                        class="fusion-column-wrapper fusion-column-has-shadow fusion-flex-justify-content-flex-start fusion-content-layout-column">
                        <div class="fusion-title title fusion-title-14 fusion-sep-none fusion-title-text fusion-title-size-three"
                            style="--awb-margin-top:20px;">
                            <h3 class="fusion-title-heading title-heading-left" style="margin:0;">{{ $activity->title }}
                            </h3>
                        </div>
                        <div class="fusion-text fusion-text-8 fusion-text-no-margin" style="--awb-margin-bottom:40px;">
                            {{ $activity->description }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
