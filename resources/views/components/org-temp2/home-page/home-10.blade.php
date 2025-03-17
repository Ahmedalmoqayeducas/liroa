<div class="fusion-fullwidth fullwidth-box fusion-builder-row-11 fusion-flex-container has-pattern-background has-mask-background nonhundred-percent-fullwidth non-hundred-percent-height-scrolling"
    style="--awb-border-radius-top-left:0px;--awb-border-radius-top-right:0px;--awb-border-radius-bottom-right:0px;--awb-border-radius-bottom-left:0px;--awb-margin-top:120px;--awb-margin-bottom:80px;--awb-flex-wrap:wrap;">
    <div class="fusion-builder-row fusion-row fusion-flex-align-items-flex-start fusion-flex-content-wrap"
        style="max-width:1372.8px;margin-left: calc(-4% / 2 );margin-right: calc(-4% / 2 );">
        <div class="fusion-layout-column fusion_builder_column fusion-builder-column-34 fusion_builder_column_1_1 1_1 fusion-flex-column"
            style="--awb-bg-size:cover;--awb-width-large:100%;--awb-margin-top-large:0px;--awb-spacing-right-large:1.92%;--awb-margin-bottom-large:0px;--awb-spacing-left-large:1.92%;--awb-width-medium:100%;--awb-order-medium:0;--awb-spacing-right-medium:1.92%;--awb-spacing-left-medium:1.92%;--awb-width-small:100%;--awb-order-small:0;--awb-spacing-right-small:1.92%;--awb-spacing-left-small:1.92%;">
            <div
                class="fusion-column-wrapper fusion-column-has-shadow fusion-flex-justify-content-flex-start fusion-content-layout-column">
                <div class="fusion-text fusion-text-41 fusion-text-no-margin"
                    style="--awb-content-alignment:center;--awb-font-size:19px;--awb-text-transform:capitalize;--awb-text-color:var(--awb-color5);--awb-margin-bottom:0px;">
                    <p>Passionate – Dedicated – Professional</p>
                </div>
                <div class="fusion-separator"
                    style="align-self: center;margin-left: auto;margin-right: auto;width:100%;max-width:282px;">
                    <div class="fusion-separator-border sep-single sep-dotted"
                        style="--awb-height:20px;--awb-amount:20px;--awb-sep-color:var(--awb-color4);border-color:var(--awb-color4);border-top-width:1px;">
                    </div>
                </div>
                <div class="fusion-title title fusion-title-34 fusion-sep-none fusion-title-center fusion-title-text fusion-title-size-two"
                    style="--awb-margin-top:20px;">
                    <h2 class="fusion-title-heading title-heading-center fusion-responsive-typography-calculated"
                        style="margin: 0px; --fontSize: 44; line-height: 1.4;" data-fontsize="44"
                        data-lineheight="61.6px">latest news &amp; insights</h2>
                </div>
                <div class="fusion-text fusion-text-42 fusion-text-no-margin"
                    style="--awb-content-alignment:center;--awb-margin-bottom:60px;">
                    <p>Euisque cursus metus vitae sedpharetra auctor semy mas interdum magla<br>
                        fusce nec litora diam vestibulum andyus eget ipsum faucibus</p>
                </div>
                <div class="fusion-post-cards fusion-post-cards-1 fusion-grid-archive fusion-grid-columns-3"
                    style="--awb-column-spacing:50px;--awb-columns:3;--awb-active-filter-border-size:3px;--awb-filters-height:36px;--awb-columns-medium:50%;--awb-columns-small:100%;">
                    <ul class="fusion-grid fusion-grid-3 fusion-flex-align-items-flex-start fusion-grid-posts-cards">
                        @foreach ($activities as $activity)
                            <li class="fusion-layout-column fusion_builder_column fusion-builder-column-35 fusion-flex-column post-card fusion-grid-column fusion-post-cards-grid-column"
                                style="--awb-bg-size:cover;">
                                <div
                                    class="fusion-column-wrapper fusion-flex-justify-content-flex-start fusion-content-layout-column">
                                    <div class="fusion-image-element "
                                        style="--awb-aspect-ratio:5 / 4;--awb-margin-bottom:30px;--awb-caption-title-font-family:var(--h2_typography-font-family);--awb-caption-title-font-weight:var(--h2_typography-font-weight);--awb-caption-title-font-style:var(--h2_typography-font-style);--awb-caption-title-size:var(--h2_typography-font-size);--awb-caption-title-transform:var(--h2_typography-text-transform);--awb-caption-title-line-height:var(--h2_typography-line-height);--awb-caption-title-letter-spacing:var(--h2_typography-letter-spacing);">
                                        <span
                                            class=" fusion-imageframe imageframe-none imageframe-19 hover-type-none has-aspect-ratio"
                                            style="border-radius:10px;"><a class="fusion-no-lightbox"
                                                href="{{ route('activity', $activity->id) }}" target="_self"
                                                aria-label="Blog Image Monetize"><img decoding="async" width="900"
                                                    height="758" src={{ asset(Storage::url("$activity->thumbnail")) }}
                                                    data-orig-src={{ asset(Storage::url("$activity->thumbnail")) }}
                                                    class="img-responsive wp-image-1514 img-with-aspect-ratio lazyloaded"
                                                    alt=""></a></span>
                                    </div>
                                    <div class="fusion-meta-tb fusion-meta-tb-1 floated"
                                        style="--awb-border-bottom:0px;--awb-border-top:0px;--awb-height:50px;--awb-font-size:15px;--awb-margin-left:10px;--awb-text-color:var(--awb-color8);--awb-link-color:var(--awb-color5);--awb-text-hover-color:var(--awb-color4);--awb-alignment-medium:flex-start;--awb-alignment-small:flex-start;">
                                        <span class="fusion-tb-categories">Categories: <a
                                                href="category/business-relations/index.htm" rel="category tag">Business
                                                Relations</a></span><span class="fusion-meta-tb-sep"></span>
                                    </div>
                                    <div class="fusion-title title fusion-title-35 fusion-sep-none fusion-title-text fusion-title-size-four"
                                        style="--awb-margin-top:0px;--awb-margin-right:20px;--awb-margin-bottom:0px;--awb-margin-left:10px;--awb-margin-left-small:10px;--awb-link-color:var(--awb-color8);">
                                        <h4 class="fusion-title-heading title-heading-left fusion-responsive-typography-calculated"
                                            style="margin: 0px; --fontSize: 28; line-height: 1.4;" data-fontsize="28"
                                            data-lineheight="39.2px"><a href="{{ route('activity', $activity->id) }}"
                                                class="awb-custom-text-color awb-custom-text-hover-color"
                                                target="_self">{{ $activity->title }}</a></h4>
                                    </div>
                                    <div class="fusion-separator fusion-full-width-sep"
                                        style="align-self: center;margin-left: auto;margin-right: auto;flex-grow:1;width:100%;">
                                    </div>
                                    <div class="fusion-separator"
                                        style="align-self: flex-start;margin-right:auto;margin-top:20px;width:100%;max-width:80px;">
                                        <div class="fusion-separator-border sep-single sep-dotted"
                                            style="--awb-height:20px;--awb-amount:20px;--awb-sep-color:var(--awb-color4);border-color:var(--awb-color4);border-top-width:1px;">
                                        </div>
                                    </div>
                                    <div><a class="fusion-button button-flat fusion-button-default-size button-custom fusion-button-default button-13 fusion-button-default-span fusion-button-default-type awb-b-icon-pos-right"
                                        style="--button_bevel_color:var(--awb-color5);--button_bevel_color_hover:var(--awb-color8);--button_accent_color:var(--awb-color5);--button_border_color:var(--awb-color4);--button_accent_hover_color:var(--awb-color8);--button_border_hover_color:var(--awb-color5);--button_border_width-top:0px;--button_border_width-right:0px;--button_border_width-bottom:0px;--button_border_width-left:0px;--button_gradient_top_color:hsla(var(--awb-color1-h),var(--awb-color1-s),var(--awb-color1-l),calc(var(--awb-color1-a) - 100%));--button_gradient_bottom_color:hsla(var(--awb-color1-h),var(--awb-color1-s),var(--awb-color1-l),calc(var(--awb-color1-a) - 100%));--button_gradient_top_color_hover:hsla(var(--awb-color1-h),var(--awb-color1-s),var(--awb-color1-l),calc(var(--awb-color1-a) - 100%));--button_gradient_bottom_color_hover:hsla(var(--awb-color1-h),var(--awb-color1-s),var(--awb-color1-l),calc(var(--awb-color1-a) - 100%));--button_text_transform:var(--awb-typography3-text-transform);--button_font_size:var(--awb-typography3-font-size);--button_line_height:var(--awb-typography3-line-height);--button_padding-top:20px;--button_padding-right:30px;--button_padding-bottom:20px;--button_padding-left:30px;--button_typography-letter-spacing:var(--awb-typography3-letter-spacing);--button_typography-font-family:var(--awb-typography3-font-family);--button_typography-font-weight:var(--awb-typography3-font-weight);--button_typography-font-style:var(--awb-typography3-font-style);--button_margin-top:5px;--button_margin-left:-18px;"
                                        target="_self" data-hover="icon_position"
                                        href="{{ route('activity', $activity->id) }}"><span
                                            class="fusion-button-text">read
                                            more</span><i class="fas fa-long-arrow-alt-right button-icon-right"
                                            aria-hidden="true"></i><i
                                            class="fas fa-long-arrow-alt-right button-icon-right"
                                            aria-hidden="true"></i></a></div>
                                </div>
                            </li>

                            @endforeach
                    </ul>
                    {{-- <ul
                        class="activities-container fusion-grid fusion-grid-2 fusion-flex-align-items-flex-start fusion-grid-posts-cards">

                        <li class="fusion-layout-column fusion_builder_column fusion-builder-column-19 fusion-flex-column post-card fusion-grid-column fusion-post-cards-grid-column"
                            style="--awb-bg-size:cover;">
                            <div
                                class="fusion-column-wrapper fusion-flex-justify-content-flex-start fusion-content-layout-column">
                                <div class="fusion-image-element "
                                    style="--awb-aspect-ratio:5 / 4;--awb-margin-bottom:30px;--awb-caption-title-font-family:var(--h2_typography-font-family);--awb-caption-title-font-weight:var(--h2_typography-font-weight);--awb-caption-title-font-style:var(--h2_typography-font-style);--awb-caption-title-size:var(--h2_typography-font-size);--awb-caption-title-transform:var(--h2_typography-text-transform);--awb-caption-title-line-height:var(--h2_typography-line-height);--awb-caption-title-letter-spacing:var(--h2_typography-letter-spacing);">
                                    <span
                                        class=" fusion-imageframe imageframe-none imageframe-10 hover-type-none has-aspect-ratio"
                                        style="border-radius:10px;"><a class="fusion-no-lightbox" target="_self"
                                            aria-label="Blog Image Finance"><img decoding="async" width="900"
                                                height="758"
                                                class="lazyload img-responsive wp-image-412 img-with-aspect-ratio"
                                                alt=""></a></span>
                                </div>
                                <div class="fusion-title title fusion-title-20 fusion-sep-none fusion-title-text fusion-title-size-four"
                                    style="--awb-margin-top:0px;--awb-margin-right:20px;--awb-margin-bottom:0px;--awb-margin-left:10px;--awb-margin-left-small:10px;--awb-link-color:var(--awb-color8);">
                                    <h4 class="fusion-title-heading title-heading-left" style="margin:0;"><a
                                            class="awb-custom-text-color awb-custom-text-hover-color"
                                            target="_self"></a></h4>
                                </div>
                                <div class="fusion-separator fusion-full-width-sep"
                                    style="align-self: center;margin-left: auto;margin-right: auto;flex-grow:1;width:100%;">
                                </div>
                                <div class="fusion-separator"
                                    style="align-self: flex-start;margin-right:auto;margin-top:20px;width:100%;max-width:80px;">
                                    <div class="fusion-separator-border sep-single sep-dotted"
                                        style="--awb-height:20px;--awb-amount:20px;--awb-sep-color:var(--awb-color4);border-color:var(--awb-color4);border-top-width:1px;">
                                    </div>
                                </div>
                                <div></div>
                            </div>
                        </li>
                        <div class="fusion-separator"></div>
                        @endforeach

                    </ul> --}}
                </div>
            </div>
        </div>
    </div>
</div>
