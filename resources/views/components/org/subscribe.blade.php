<div class="fusion-fullwidth fullwidth-box fusion-builder-row-4 fusion-flex-container has-pattern-background has-mask-background nonhundred-percent-fullwidth non-hundred-percent-height-scrolling"
    style="--awb-border-radius: 0; --awb-flex-wrap: wrap;">
    <div class="fusion-builder-row fusion-row fusion-flex-align-items-flex-start fusion-flex-justify-content-center fusion-flex-content-wrap"
        style="max-width: 1372.8px; margin: 0 auto;">
        <div class="fusion-layout-column fusion_builder_column fusion-builder-column-10 fusion_builder_column_3_4 3_4 fusion-flex-column fusion-animated"
            style="--awb-padding: 60px; --awb-overflow: hidden; --awb-bg-color: var(--awb-color1); --awb-box-shadow: 2px 2px 40px 0px hsla(var(--awb-color8-h), var(--awb-color8-s), var(--awb-color8-l), calc(var(--awb-color8-a) - 90%)); --awb-border-radius: 0 0 0 25px; --awb-width-large: 75%; --awb-margin-bottom-large: -40px;">
            <div
                class="fusion-column-wrapper fusion-column-has-shadow fusion-flex-justify-content-flex-start fusion-content-layout-column">
                <!-- Title -->
                <div class="fusion-title title fusion-title-24 fusion-sep-none fusion-title-center fusion-title-text fusion-title-size-three"
                    style="--awb-margin-bottom: 0;">
                    <h3 class="fusion-title-heading title-heading-center fusion-responsive-typography-calculated"
                        style="margin: 0; --fontSize: 36; line-height: 1.3;">Keep Updated & Don’t Miss Anything!</h3>
                </div>
                <!-- Description -->
                <div class="fusion-text fusion-text-18"
                    style="--awb-content-alignment: center; --awb-text-color: var(--awb-color6); --awb-margin-top: -5px;">
                    <p>Setus vitae pharetra auctor kasu mattiy sed interdum</p>
                </div>
                <!-- Subscription Form -->
                <div class="fusion-form  fusion-form-form-wrapper fusion-form-448 has-icon-alignment"
                    style="--awb-tooltip-text-color: #ffffff; --awb-tooltip-background-color: #333333; --awb-field-margin: 15px 0; --awb-form-input-height: 60px; --awb-form-bg-color: hsla(var(--awb-color1-h), var(--awb-color1-s), var(--awb-color1-l), calc(var(--awb-color1-a) - 100%)); --awb-form-select-bg: var(--awb-color1); --awb-form-font-size: 17px; --awb-form-border-width: 0; --awb-form-border-color: var(--awb-color3); --awb-form-focus-border-color: var(--awb-color7); --awb-form-border-radius: 0;">
                    <form action="{{ route('subsicribe.store') }}" method="post" class="fusion-form fusion-form-448">
                        @csrf
                        <div class="fusion-fullwidth fullwidth-box fusion-builder-row-4-1 fusion-flex-container has-pattern-background has-mask-background nonhundred-percent-fullwidth non-hundred-percent-height-scrolling"
                            style="--awb-border-radius: 0; --awb-padding: 0;">
                            <div class="fusion-builder-row fusion-row fusion-flex-align-items-center fusion-flex-content-wrap"
                                style="width: 104%; max-width: 104%; margin: 0 auto;">
                                <!-- Email Input -->
                                <div class="fusion-layout-column fusion_builder_column fusion-builder-column-11 fusion_builder_column_3_4 3_4 fusion-flex-column"
                                    style="--awb-width-large: 75%; --awb-spacing-large: 2.56%; --awb-width-medium: 66.666666666667%; --awb-spacing-medium: 2.88%; --awb-width-small: 100%; --awb-spacing-small: 1.92%;">
                                    <div
                                        class="fusion-column-wrapper fusion-column-has-shadow fusion-flex-justify-content-flex-start fusion-content-layout-column">
                                        <div class="fusion-form-field fusion-form-email-field fusion-form-label-above"
                                            data-form-id="448">
                                            <input type="email" name="email" id="email"
                                                class="fusion-form-input" required aria-required="true"
                                                placeholder="Enter your email*" data-holds-private-data="false"
                                                autocomplete="email">
                                        </div>
                                    </div>
                                </div>
                                <!-- Submit Button -->
                                <div class="fusion-layout-column fusion_builder_column fusion-builder-column-12 fusion_builder_column_1_4 1_4 fusion-flex-column"
                                    style="--awb-width-large: 25%; --awb-spacing-large: 7.68%; --awb-width-medium: 33.333333333333%; --awb-spacing-medium: 5.76%; --awb-width-small: 100%; --awb-spacing-small: 1.92%;">
                                    <div
                                        class="fusion-column-wrapper fusion-column-has-shadow fusion-flex-justify-content-flex-start fusion-content-layout-column">
                                        <div class="fusion-form-field fusion-form-submit-field fusion-form-label-above"
                                            data-form-id="448">
                                            <button type="submit"
                                                class="fusion-button button-flat fusion-button-default-size button-custom fusion-button-default button-5 fusion-button-span-yes form-form-submit button-default"
                                                aria-label="Subscribe to updates">
                                                <span class="fusion-button-text">Subscribe</span>
                                                {{-- <i class="awb-business-long-arrow-alt-right-solid button-icon-right"
                                                    aria-hidden="true"></i> --}}
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
