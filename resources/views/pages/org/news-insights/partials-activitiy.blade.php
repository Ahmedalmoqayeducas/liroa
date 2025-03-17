<li class="fusion-layout-column fusion_builder_column fusion-builder-column-19 fusion-flex-column post-card fusion-grid-column fusion-post-cards-grid-column"
    style="--awb-bg-size:cover;">
    <div class="fusion-column-wrapper fusion-flex-justify-content-flex-start fusion-content-layout-column">
        <div class="fusion-image-element"
            style="--awb-aspect-ratio:5 / 4;--awb-margin-bottom:30px;--awb-caption-title-font-family:var(--h2_typography-font-family);--awb-caption-title-font-weight:var(--h2_typography-font-weight);--awb-caption-title-font-style:var(--h2_typography-font-style);--awb-caption-title-size:var(--h2_typography-font-size);--awb-caption-title-transform:var(--h2_typography-text-transform);--awb-caption-title-line-height:var(--h2_typography-line-height);--awb-caption-title-letter-spacing:var(--h2_typography-letter-spacing);">
            <span class="fusion-imageframe imageframe-none imageframe-10 hover-type-none has-aspect-ratio"
                style="border-radius:10px;">
                <a class="fusion-no-lightbox" href="{{ route('activity', $activity->id) }}" target="_self"
                    aria-label="Blog Image Finance">
                    <img decoding="async" width="900" height="758"
                        src="{{ asset(Storage::url($activity->thumbnail)) }}"
                        data-orig-src="{{ asset(Storage::url($activity->thumbnail)) }}"
                        class="lazyload img-responsive wp-image-412 img-with-aspect-ratio" alt="">
                </a>
            </span>
        </div>
        <div class="fusion-title title fusion-title-20 fusion-sep-none fusion-title-text fusion-title-size-four"
            style="--awb-margin-top:0px;--awb-margin-right:20px;--awb-margin-bottom:0px;--awb-margin-left:10px;--awb-margin-left-small:10px;--awb-link-color:var(--awb-color8);">
            <h4 class="fusion-title-heading title-heading-left" style="margin:0;">
                <a href="{{ route('activity', $activity->id) }}"
                    class="awb-custom-text-color awb-custom-text-hover-color" target="_self">{{ $activity->title }}</a>
            </h4>
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
        <div>
            <a class="fusion-button button-flat fusion-button-default-size button-custom fusion-button-default button-13 fusion-button-default-span fusion-button-default-type awb-b-icon-pos-right"
                style="--button_bevel_color:var(--awb-color5);--button_bevel_color_hover:var(--awb-color8);--button_accent_color:var(--awb-color5);--button_border_color:var(--awb-color4);--button_accent_hover_color:var(--awb-color8);--button_border_hover_color:var(--awb-color5);--button_border_width-top:0px;--button_border_width-right:0px;--button_border_width-bottom:0px;--button_border_width-left:0px;--button_gradient_top_color:hsla(var(--awb-color1-h),var(--awb-color1-s),var(--awb-color1-l),calc(var(--awb-color1-a) - 100%));--button_gradient_bottom_color:hsla(var(--awb-color1-h),var(--awb-color1-s),var(--awb-color1-l),calc(var(--awb-color1-a) - 100%));--button_gradient_top_color_hover:hsla(var(--awb-color1-h),var(--awb-color1-s),var(--awb-color1-l),calc(var(--awb-color1-a) - 100%));--button_gradient_bottom_color_hover:hsla(var(--awb-color1-h),var(--awb-color1-s),var(--awb-color1-l),calc(var(--awb-color1-a) - 100%));--button_text_transform:var(--awb-typography3-text-transform);--button_font_size:var(--awb-typography3-font-size);--button_line_height:var(--awb-typography3-line-height);--button_padding-top:20px;--button_padding-right:30px;--button_padding-bottom:20px;--button_padding-left:30px;--button_typography-letter-spacing:var(--awb-typography3-letter-spacing);--button_typography-font-family:var(--awb-typography3-font-family);--button_typography-font-weight:var(--awb-typography3-font-weight);--button_typography-font-style:var(--awb-typography3-font-style);--button_margin-top:5px;--button_margin-left:-18px;"
                target="_self" data-hover="icon_position" href="{{ route('activity', $activity->id) }}">
                <span class="fusion-button-text">read more</span>
                <i class="fas fa-long-arrow-alt-right button-icon-right" aria-hidden="true"></i>
                <i class="fas fa-long-arrow-alt-right button-icon-right" aria-hidden="true"></i>
            </a>
        </div>
    </div>
</li>
<div class="fusion-separator"></div>
