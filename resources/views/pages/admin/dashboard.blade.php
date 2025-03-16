@extends('layouts.dashboard')
@section('content')
    <div class="card p-6">
        <div class="grid xl:grid-cols-4 lg:grid-cols-2 md:grid-cols-2 grid-cols-1 gap-5 place-content-center">
            <div class="flex space-x-4 h-full items-center rtl:space-x-reverse">
                <div class="flex-none">
                    <div class="h-20 w-20 rounded-full">
                        {{-- @dd(asset(Storage::url("$user->image"))) --}}
                        <img src="{{ asset(Storage::url("$user->image")) }}" alt="" class="w-full h-full">
                    </div>

                </div>

                <div class="flex-1">
                    <h4 class="text-xl font-medium mb-2">
                        <span class="block font-light">
                            {{ __('dashboard.good_evning') }}
                        </span>
                        <span class="block"> {{ $user->name }}</span>
                    </h4>
                    <p class="text-sm dark:text-slate-300">{{ __('dashboard.welcom') }}
                    </p>

                </div>
            </div>

            <!-- BEGIN: Group Chart3 -->

            <div class="bg-slate-50 dark:bg-slate-900 rounded p-4">
                <div class="text-slate-600 dark:text-slate-400 text-sm mb-1 font-medium">
                    {{ __('dashboard.posts') }}
                </div>
                <div class="text-slate-900 dark:text-white text-lg font-large">
                    {{ $posts }}
                </div>
                <div class="ml-auto max-w-[124px]">
                    <div id="clmn_chart_1" style="min-height: 48px;">
                        <div id="apexchartszdid2ri5" class="apexcharts-canvas apexchartszdid2ri5 apexcharts-theme-light"
                            style="width: 124px; height: 48px;"><svg id="SvgjsSvg2582" width="124" height="48"
                                xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink"
                                xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg" xmlns:data="ApexChartsNS"
                                transform="translate(0, 0)" style="background: transparent;">
                                <g id="SvgjsG2584" class="apexcharts-inner apexcharts-graphical"
                                    transform="translate(16.085714285714285, 0)">
                                    <defs id="SvgjsDefs2583">
                                        <linearGradient id="SvgjsLinearGradient2587" x1="0" y1="0"
                                            x2="0" y2="1">
                                            <stop id="SvgjsStop2588" stop-opacity="0.4" stop-color="rgba(216,227,240,0.4)"
                                                offset="0"></stop>
                                            <stop id="SvgjsStop2589" stop-opacity="0.5" stop-color="rgba(190,209,230,0.5)"
                                                offset="1"></stop>
                                            <stop id="SvgjsStop2590" stop-opacity="0.5" stop-color="rgba(190,209,230,0.5)"
                                                offset="1"></stop>
                                        </linearGradient>
                                        <clipPath id="gridRectMaskzdid2ri5">
                                            <rect id="SvgjsRect2592" width="130" height="50" x="-15.085714285714285"
                                                y="-1" rx="0" ry="0" opacity="1" stroke-width="0"
                                                stroke="none" stroke-dasharray="0" fill="#fff"></rect>
                                        </clipPath>
                                        <clipPath id="forecastMaskzdid2ri5"></clipPath>
                                        <clipPath id="nonForecastMaskzdid2ri5"></clipPath>
                                        <clipPath id="gridRectMarkerMaskzdid2ri5">
                                            <rect id="SvgjsRect2593" width="103.82857142857142" height="52" x="-2" y="-2"
                                                rx="0" ry="0" opacity="1" stroke-width="0" stroke="none"
                                                stroke-dasharray="0" fill="#fff"></rect>
                                        </clipPath>
                                    </defs>
                                    <rect id="SvgjsRect2591" width="8.556734693877551" height="48" x="0" y="0"
                                        rx="0" ry="0" opacity="1" stroke-width="0" stroke-dasharray="3"
                                        fill="url(#SvgjsLinearGradient2587)" class="apexcharts-xcrosshairs" y2="48"
                                        filter="none" fill-opacity="0.9"></rect>
                                    <g id="SvgjsG2614" class="apexcharts-grid">
                                        <g id="SvgjsG2615" class="apexcharts-gridlines-horizontal" style="display: none;">
                                            <line id="SvgjsLine2625" x1="-12.085714285714285" y1="12"
                                                x2="111.91428571428571" y2="12" stroke="#e0e0e0"
                                                stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline">
                                            </line>
                                            <line id="SvgjsLine2626" x1="-12.085714285714285" y1="24"
                                                x2="111.91428571428571" y2="24" stroke="#e0e0e0"
                                                stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline">
                                            </line>
                                            <line id="SvgjsLine2627" x1="-12.085714285714285" y1="36"
                                                x2="111.91428571428571" y2="36" stroke="#e0e0e0"
                                                stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline">
                                            </line>
                                        </g>
                                        <g id="SvgjsG2616" class="apexcharts-gridlines-vertical" style="display: none;">
                                            <line id="SvgjsLine2618" x1="0" y1="0" x2="0"
                                                y2="48" stroke="#e0e0e0" stroke-dasharray="0"
                                                stroke-linecap="butt" class="apexcharts-gridline"></line>
                                            <line id="SvgjsLine2619" x1="19.965714285714284" y1="0"
                                                x2="19.965714285714284" y2="48" stroke="#e0e0e0"
                                                stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline">
                                            </line>
                                            <line id="SvgjsLine2620" x1="39.93142857142857" y1="0"
                                                x2="39.93142857142857" y2="48" stroke="#e0e0e0"
                                                stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline">
                                            </line>
                                            <line id="SvgjsLine2621" x1="59.89714285714285" y1="0"
                                                x2="59.89714285714285" y2="48" stroke="#e0e0e0"
                                                stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline">
                                            </line>
                                            <line id="SvgjsLine2622" x1="79.86285714285714" y1="0"
                                                x2="79.86285714285714" y2="48" stroke="#e0e0e0"
                                                stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline">
                                            </line>
                                            <line id="SvgjsLine2623" x1="99.82857142857142" y1="0"
                                                x2="99.82857142857142" y2="48" stroke="#e0e0e0"
                                                stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline">
                                            </line>
                                        </g>
                                        <line id="SvgjsLine2630" x1="0" y1="48" x2="99.82857142857142"
                                            y2="48" stroke="transparent" stroke-dasharray="0"
                                            stroke-linecap="butt"></line>
                                        <line id="SvgjsLine2629" x1="0" y1="1" x2="0"
                                            y2="48" stroke="transparent" stroke-dasharray="0"
                                            stroke-linecap="butt"></line>
                                    </g>
                                    <g id="SvgjsG2617" class="apexcharts-grid-borders" style="display: none;">
                                        <line id="SvgjsLine2624" x1="-12.085714285714285" y1="0"
                                            x2="111.91428571428571" y2="0" stroke="#e0e0e0" stroke-dasharray="0"
                                            stroke-linecap="butt" class="apexcharts-gridline"></line>
                                        <line id="SvgjsLine2628" x1="-12.085714285714285" y1="48"
                                            x2="111.91428571428571" y2="48" stroke="#e0e0e0" stroke-dasharray="0"
                                            stroke-linecap="butt" class="apexcharts-gridline"></line>
                                    </g>
                                    <g id="SvgjsG2594" class="apexcharts-bar-series apexcharts-plot-series">
                                        <g id="SvgjsG2595" class="apexcharts-series" rel="1" seriesName="Revenue"
                                            data:realIndex="0">
                                            <path id="SvgjsPath2599"
                                                d="M -4.278367346938776 48.001 L -4.278367346938776 32.001 L 2.2783673469387757 32.001 L 2.2783673469387757 48.001 Z"
                                                fill="rgba(12,231,250,1)" fill-opacity="1" stroke="#"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="2"
                                                stroke-dasharray="0" class="apexcharts-bar-area" index="0"
                                                clip-path="url(#gridRectMaskzdid2ri5)"
                                                pathTo="M -4.278367346938776 48.001 L -4.278367346938776 32.001 L 2.2783673469387757 32.001 L 2.2783673469387757 48.001 Z"
                                                pathFrom="M -4.278367346938776 48.001 L -4.278367346938776 48.001 L 2.2783673469387757 48.001 L 2.2783673469387757 48.001 L 2.2783673469387757 48.001 L 2.2783673469387757 48.001 L 2.2783673469387757 48.001 L -4.278367346938776 48.001 Z"
                                                cy="32" cx="3.2783673469387757" j="0" val="40"
                                                barHeight="16" barWidth="8.556734693877551"></path>
                                            <path id="SvgjsPath2601"
                                                d="M 9.982857142857142 48.001 L 9.982857142857142 20.001 L 16.539591836734694 20.001 L 16.539591836734694 48.001 Z"
                                                fill="rgba(12,231,250,1)" fill-opacity="1" stroke="#"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="2"
                                                stroke-dasharray="0" class="apexcharts-bar-area" index="0"
                                                clip-path="url(#gridRectMaskzdid2ri5)"
                                                pathTo="M 9.982857142857142 48.001 L 9.982857142857142 20.001 L 16.539591836734694 20.001 L 16.539591836734694 48.001 Z"
                                                pathFrom="M 9.982857142857142 48.001 L 9.982857142857142 48.001 L 16.539591836734694 48.001 L 16.539591836734694 48.001 L 16.539591836734694 48.001 L 16.539591836734694 48.001 L 16.539591836734694 48.001 L 9.982857142857142 48.001 Z"
                                                cy="20" cx="17.539591836734694" j="1" val="70"
                                                barHeight="28" barWidth="8.556734693877551"></path>
                                            <path id="SvgjsPath2603"
                                                d="M 24.24408163265306 48.001 L 24.24408163265306 30.001 L 30.800816326530608 30.001 L 30.800816326530608 48.001 Z"
                                                fill="rgba(12,231,250,1)" fill-opacity="1" stroke="#"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="2"
                                                stroke-dasharray="0" class="apexcharts-bar-area" index="0"
                                                clip-path="url(#gridRectMaskzdid2ri5)"
                                                pathTo="M 24.24408163265306 48.001 L 24.24408163265306 30.001 L 30.800816326530608 30.001 L 30.800816326530608 48.001 Z"
                                                pathFrom="M 24.24408163265306 48.001 L 24.24408163265306 48.001 L 30.800816326530608 48.001 L 30.800816326530608 48.001 L 30.800816326530608 48.001 L 30.800816326530608 48.001 L 30.800816326530608 48.001 L 24.24408163265306 48.001 Z"
                                                cy="30" cx="31.800816326530608" j="2" val="45"
                                                barHeight="18" barWidth="8.556734693877551"></path>
                                            <path id="SvgjsPath2605"
                                                d="M 38.505306122448985 48.001 L 38.505306122448985 8.001 L 45.06204081632654 8.001 L 45.06204081632654 48.001 Z"
                                                fill="rgba(12,231,250,1)" fill-opacity="1" stroke="#"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="2"
                                                stroke-dasharray="0" class="apexcharts-bar-area" index="0"
                                                clip-path="url(#gridRectMaskzdid2ri5)"
                                                pathTo="M 38.505306122448985 48.001 L 38.505306122448985 8.001 L 45.06204081632654 8.001 L 45.06204081632654 48.001 Z"
                                                pathFrom="M 38.505306122448985 48.001 L 38.505306122448985 48.001 L 45.06204081632654 48.001 L 45.06204081632654 48.001 L 45.06204081632654 48.001 L 45.06204081632654 48.001 L 45.06204081632654 48.001 L 38.505306122448985 48.001 Z"
                                                cy="8" cx="46.06204081632654" j="3" val="100"
                                                barHeight="40" barWidth="8.556734693877551"></path>
                                            <path id="SvgjsPath2607"
                                                d="M 52.76653061224489 48.001 L 52.76653061224489 18.001 L 59.323265306122444 18.001 L 59.323265306122444 48.001 Z"
                                                fill="rgba(12,231,250,1)" fill-opacity="1" stroke="#"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="2"
                                                stroke-dasharray="0" class="apexcharts-bar-area" index="0"
                                                clip-path="url(#gridRectMaskzdid2ri5)"
                                                pathTo="M 52.76653061224489 48.001 L 52.76653061224489 18.001 L 59.323265306122444 18.001 L 59.323265306122444 48.001 Z"
                                                pathFrom="M 52.76653061224489 48.001 L 52.76653061224489 48.001 L 59.323265306122444 48.001 L 59.323265306122444 48.001 L 59.323265306122444 48.001 L 59.323265306122444 48.001 L 59.323265306122444 48.001 L 52.76653061224489 48.001 Z"
                                                cy="18" cx="60.323265306122444" j="4" val="75"
                                                barHeight="30" barWidth="8.556734693877551"></path>
                                            <path id="SvgjsPath2609"
                                                d="M 67.02775510204081 48.001 L 67.02775510204081 32.001 L 73.58448979591836 32.001 L 73.58448979591836 48.001 Z"
                                                fill="rgba(12,231,250,1)" fill-opacity="1" stroke="#"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="2"
                                                stroke-dasharray="0" class="apexcharts-bar-area" index="0"
                                                clip-path="url(#gridRectMaskzdid2ri5)"
                                                pathTo="M 67.02775510204081 48.001 L 67.02775510204081 32.001 L 73.58448979591836 32.001 L 73.58448979591836 48.001 Z"
                                                pathFrom="M 67.02775510204081 48.001 L 67.02775510204081 48.001 L 73.58448979591836 48.001 L 73.58448979591836 48.001 L 73.58448979591836 48.001 L 73.58448979591836 48.001 L 73.58448979591836 48.001 L 67.02775510204081 48.001 Z"
                                                cy="32" cx="74.58448979591836" j="5" val="40"
                                                barHeight="16" barWidth="8.556734693877551"></path>
                                            <path id="SvgjsPath2611"
                                                d="M 81.28897959183674 48.001 L 81.28897959183674 16.001 L 87.84571428571428 16.001 L 87.84571428571428 48.001 Z"
                                                fill="rgba(12,231,250,1)" fill-opacity="1" stroke="#"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="2"
                                                stroke-dasharray="0" class="apexcharts-bar-area" index="0"
                                                clip-path="url(#gridRectMaskzdid2ri5)"
                                                pathTo="M 81.28897959183674 48.001 L 81.28897959183674 16.001 L 87.84571428571428 16.001 L 87.84571428571428 48.001 Z"
                                                pathFrom="M 81.28897959183674 48.001 L 81.28897959183674 48.001 L 87.84571428571428 48.001 L 87.84571428571428 48.001 L 87.84571428571428 48.001 L 87.84571428571428 48.001 L 87.84571428571428 48.001 L 81.28897959183674 48.001 Z"
                                                cy="16" cx="88.84571428571428" j="6" val="80"
                                                barHeight="32" barWidth="8.556734693877551"></path>
                                            <path id="SvgjsPath2613"
                                                d="M 95.55020408163264 48.001 L 95.55020408163264 12.001 L 102.1069387755102 12.001 L 102.1069387755102 48.001 Z"
                                                fill="rgba(12,231,250,1)" fill-opacity="1" stroke="#"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="2"
                                                stroke-dasharray="0" class="apexcharts-bar-area" index="0"
                                                clip-path="url(#gridRectMaskzdid2ri5)"
                                                pathTo="M 95.55020408163264 48.001 L 95.55020408163264 12.001 L 102.1069387755102 12.001 L 102.1069387755102 48.001 Z"
                                                pathFrom="M 95.55020408163264 48.001 L 95.55020408163264 48.001 L 102.1069387755102 48.001 L 102.1069387755102 48.001 L 102.1069387755102 48.001 L 102.1069387755102 48.001 L 102.1069387755102 48.001 L 95.55020408163264 48.001 Z"
                                                cy="12" cx="103.1069387755102" j="7" val="90"
                                                barHeight="36" barWidth="8.556734693877551"></path>
                                            <g id="SvgjsG2597" class="apexcharts-bar-goals-markers"
                                                style="pointer-events: none">
                                                <g id="SvgjsG2598" className="apexcharts-bar-goals-groups"></g>
                                                <g id="SvgjsG2600" className="apexcharts-bar-goals-groups"></g>
                                                <g id="SvgjsG2602" className="apexcharts-bar-goals-groups"></g>
                                                <g id="SvgjsG2604" className="apexcharts-bar-goals-groups"></g>
                                                <g id="SvgjsG2606" className="apexcharts-bar-goals-groups"></g>
                                                <g id="SvgjsG2608" className="apexcharts-bar-goals-groups"></g>
                                                <g id="SvgjsG2610" className="apexcharts-bar-goals-groups"></g>
                                                <g id="SvgjsG2612" className="apexcharts-bar-goals-groups"></g>
                                            </g>
                                        </g>
                                        <g id="SvgjsG2596" class="apexcharts-datalabels" data:realIndex="0"></g>
                                    </g>
                                    <line id="SvgjsLine2631" x1="-12.085714285714285" y1="0"
                                        x2="111.91428571428571" y2="0" stroke="#b6b6b6" stroke-dasharray="0"
                                        stroke-width="1" stroke-linecap="butt" class="apexcharts-ycrosshairs"></line>
                                    <line id="SvgjsLine2632" x1="-12.085714285714285" y1="0"
                                        x2="111.91428571428571" y2="0" stroke-dasharray="0" stroke-width="0"
                                        stroke-linecap="butt" class="apexcharts-ycrosshairs-hidden"></line>
                                    <g id="SvgjsG2633" class="apexcharts-yaxis-annotations"></g>
                                    <g id="SvgjsG2634" class="apexcharts-xaxis-annotations"></g>
                                    <g id="SvgjsG2635" class="apexcharts-point-annotations"></g>
                                    <g id="SvgjsG2636" class="apexcharts-xaxis" transform="translate(0, 0)">
                                        <g id="SvgjsG2637" class="apexcharts-xaxis-texts-g" transform="translate(0, -4)">
                                        </g>
                                    </g>
                                </g>
                                <g id="SvgjsG2644" class="apexcharts-yaxis" rel="0"
                                    transform="translate(-18, 0)"></g>
                                <g id="SvgjsG2585" class="apexcharts-annotations"></g>
                            </svg>
                            <div class="apexcharts-legend" style="max-height: 24px;"></div>
                            <div class="apexcharts-tooltip apexcharts-theme-light">
                                <div class="apexcharts-tooltip-title"
                                    style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"></div>
                                <div class="apexcharts-tooltip-series-group" style="order: 1;"><span
                                        class="apexcharts-tooltip-marker"></span>
                                    <div class="apexcharts-tooltip-text"
                                        style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                        <div class="apexcharts-tooltip-y-group"><span
                                                class="apexcharts-tooltip-text-y-label"></span><span
                                                class="apexcharts-tooltip-text-y-value"></span></div>
                                        <div class="apexcharts-tooltip-goals-group"><span
                                                class="apexcharts-tooltip-text-goals-label"></span><span
                                                class="apexcharts-tooltip-text-goals-value"></span></div>
                                        <div class="apexcharts-tooltip-z-group"><span
                                                class="apexcharts-tooltip-text-z-label"></span><span
                                                class="apexcharts-tooltip-text-z-value"></span></div>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light">
                                <div class="apexcharts-yaxistooltip-text"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-slate-50 dark:bg-slate-900 rounded p-4">
                <div class="text-slate-600 dark:text-slate-400 text-sm mb-1 font-medium">
                    {{ __('dashboard.likes') }}
                </div>
                <div class="text-slate-900 dark:text-white text-lg font-medium">
                    195
                </div>
                <div class="ml-auto max-w-[124px]">
                    <div id="clmn_chart_2" style="min-height: 48px;">
                        <div id="apexcharts05yljicq" class="apexcharts-canvas apexcharts05yljicq apexcharts-theme-light"
                            style="width: 124px; height: 48px;"><svg id="SvgjsSvg2645" width="124" height="48"
                                xmlns="http://www.w3.org/2000/svg" version="1.1"
                                xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev"
                                class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)"
                                style="background: transparent;">
                                <g id="SvgjsG2647" class="apexcharts-inner apexcharts-graphical"
                                    transform="translate(16.085714285714285, 0)">
                                    <defs id="SvgjsDefs2646">
                                        <linearGradient id="SvgjsLinearGradient2650" x1="0" y1="0"
                                            x2="0" y2="1">
                                            <stop id="SvgjsStop2651" stop-opacity="0.4"
                                                stop-color="rgba(216,227,240,0.4)" offset="0"></stop>
                                            <stop id="SvgjsStop2652" stop-opacity="0.5"
                                                stop-color="rgba(190,209,230,0.5)" offset="1"></stop>
                                            <stop id="SvgjsStop2653" stop-opacity="0.5"
                                                stop-color="rgba(190,209,230,0.5)" offset="1"></stop>
                                        </linearGradient>
                                        <clipPath id="gridRectMask05yljicq">
                                            <rect id="SvgjsRect2655" width="130" height="50"
                                                x="-15.085714285714285" y="-1" rx="0" ry="0"
                                                opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0"
                                                fill="#fff"></rect>
                                        </clipPath>
                                        <clipPath id="forecastMask05yljicq"></clipPath>
                                        <clipPath id="nonForecastMask05yljicq"></clipPath>
                                        <clipPath id="gridRectMarkerMask05yljicq">
                                            <rect id="SvgjsRect2656" width="103.82857142857142" height="52" x="-2"
                                                y="-2" rx="0" ry="0" opacity="1" stroke-width="0"
                                                stroke="none" stroke-dasharray="0" fill="#fff"></rect>
                                        </clipPath>
                                    </defs>
                                    <rect id="SvgjsRect2654" width="8.556734693877551" height="48" x="0" y="0"
                                        rx="0" ry="0" opacity="1" stroke-width="0"
                                        stroke-dasharray="3" fill="url(#SvgjsLinearGradient2650)"
                                        class="apexcharts-xcrosshairs" y2="48" filter="none" fill-opacity="0.9">
                                    </rect>
                                    <g id="SvgjsG2677" class="apexcharts-grid">
                                        <g id="SvgjsG2678" class="apexcharts-gridlines-horizontal"
                                            style="display: none;">
                                            <line id="SvgjsLine2688" x1="-12.085714285714285" y1="12"
                                                x2="111.91428571428571" y2="12" stroke="#e0e0e0"
                                                stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline">
                                            </line>
                                            <line id="SvgjsLine2689" x1="-12.085714285714285" y1="24"
                                                x2="111.91428571428571" y2="24" stroke="#e0e0e0"
                                                stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline">
                                            </line>
                                            <line id="SvgjsLine2690" x1="-12.085714285714285" y1="36"
                                                x2="111.91428571428571" y2="36" stroke="#e0e0e0"
                                                stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline">
                                            </line>
                                        </g>
                                        <g id="SvgjsG2679" class="apexcharts-gridlines-vertical" style="display: none;">
                                            <line id="SvgjsLine2681" x1="0" y1="0" x2="0"
                                                y2="48" stroke="#e0e0e0" stroke-dasharray="0"
                                                stroke-linecap="butt" class="apexcharts-gridline"></line>
                                            <line id="SvgjsLine2682" x1="19.965714285714284" y1="0"
                                                x2="19.965714285714284" y2="48" stroke="#e0e0e0"
                                                stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline">
                                            </line>
                                            <line id="SvgjsLine2683" x1="39.93142857142857" y1="0"
                                                x2="39.93142857142857" y2="48" stroke="#e0e0e0"
                                                stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline">
                                            </line>
                                            <line id="SvgjsLine2684" x1="59.89714285714285" y1="0"
                                                x2="59.89714285714285" y2="48" stroke="#e0e0e0"
                                                stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline">
                                            </line>
                                            <line id="SvgjsLine2685" x1="79.86285714285714" y1="0"
                                                x2="79.86285714285714" y2="48" stroke="#e0e0e0"
                                                stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline">
                                            </line>
                                            <line id="SvgjsLine2686" x1="99.82857142857142" y1="0"
                                                x2="99.82857142857142" y2="48" stroke="#e0e0e0"
                                                stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline">
                                            </line>
                                        </g>
                                        <line id="SvgjsLine2693" x1="0" y1="48" x2="99.82857142857142"
                                            y2="48" stroke="transparent" stroke-dasharray="0"
                                            stroke-linecap="butt"></line>
                                        <line id="SvgjsLine2692" x1="0" y1="1" x2="0"
                                            y2="48" stroke="transparent" stroke-dasharray="0"
                                            stroke-linecap="butt"></line>
                                    </g>
                                    <g id="SvgjsG2680" class="apexcharts-grid-borders" style="display: none;">
                                        <line id="SvgjsLine2687" x1="-12.085714285714285" y1="0"
                                            x2="111.91428571428571" y2="0" stroke="#e0e0e0" stroke-dasharray="0"
                                            stroke-linecap="butt" class="apexcharts-gridline"></line>
                                        <line id="SvgjsLine2691" x1="-12.085714285714285" y1="48"
                                            x2="111.91428571428571" y2="48" stroke="#e0e0e0" stroke-dasharray="0"
                                            stroke-linecap="butt" class="apexcharts-gridline"></line>
                                    </g>
                                    <g id="SvgjsG2657" class="apexcharts-bar-series apexcharts-plot-series">
                                        <g id="SvgjsG2658" class="apexcharts-series" rel="1" seriesName="Revenue"
                                            data:realIndex="0">
                                            <path id="SvgjsPath2662"
                                                d="M -4.278367346938776 48.001 L -4.278367346938776 32.001 L 2.2783673469387757 32.001 L 2.2783673469387757 48.001 Z"
                                                fill="rgba(80,199,147,1)" fill-opacity="1" stroke="#"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="2"
                                                stroke-dasharray="0" class="apexcharts-bar-area" index="0"
                                                clip-path="url(#gridRectMask05yljicq)"
                                                pathTo="M -4.278367346938776 48.001 L -4.278367346938776 32.001 L 2.2783673469387757 32.001 L 2.2783673469387757 48.001 Z"
                                                pathFrom="M -4.278367346938776 48.001 L -4.278367346938776 48.001 L 2.2783673469387757 48.001 L 2.2783673469387757 48.001 L 2.2783673469387757 48.001 L 2.2783673469387757 48.001 L 2.2783673469387757 48.001 L -4.278367346938776 48.001 Z"
                                                cy="32" cx="3.2783673469387757" j="0" val="40"
                                                barHeight="16" barWidth="8.556734693877551"></path>
                                            <path id="SvgjsPath2664"
                                                d="M 9.982857142857142 48.001 L 9.982857142857142 20.001 L 16.539591836734694 20.001 L 16.539591836734694 48.001 Z"
                                                fill="rgba(80,199,147,1)" fill-opacity="1" stroke="#"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="2"
                                                stroke-dasharray="0" class="apexcharts-bar-area" index="0"
                                                clip-path="url(#gridRectMask05yljicq)"
                                                pathTo="M 9.982857142857142 48.001 L 9.982857142857142 20.001 L 16.539591836734694 20.001 L 16.539591836734694 48.001 Z"
                                                pathFrom="M 9.982857142857142 48.001 L 9.982857142857142 48.001 L 16.539591836734694 48.001 L 16.539591836734694 48.001 L 16.539591836734694 48.001 L 16.539591836734694 48.001 L 16.539591836734694 48.001 L 9.982857142857142 48.001 Z"
                                                cy="20" cx="17.539591836734694" j="1" val="70"
                                                barHeight="28" barWidth="8.556734693877551"></path>
                                            <path id="SvgjsPath2666"
                                                d="M 24.24408163265306 48.001 L 24.24408163265306 30.001 L 30.800816326530608 30.001 L 30.800816326530608 48.001 Z"
                                                fill="rgba(80,199,147,1)" fill-opacity="1" stroke="#"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="2"
                                                stroke-dasharray="0" class="apexcharts-bar-area" index="0"
                                                clip-path="url(#gridRectMask05yljicq)"
                                                pathTo="M 24.24408163265306 48.001 L 24.24408163265306 30.001 L 30.800816326530608 30.001 L 30.800816326530608 48.001 Z"
                                                pathFrom="M 24.24408163265306 48.001 L 24.24408163265306 48.001 L 30.800816326530608 48.001 L 30.800816326530608 48.001 L 30.800816326530608 48.001 L 30.800816326530608 48.001 L 30.800816326530608 48.001 L 24.24408163265306 48.001 Z"
                                                cy="30" cx="31.800816326530608" j="2" val="45"
                                                barHeight="18" barWidth="8.556734693877551"></path>
                                            <path id="SvgjsPath2668"
                                                d="M 38.505306122448985 48.001 L 38.505306122448985 8.001 L 45.06204081632654 8.001 L 45.06204081632654 48.001 Z"
                                                fill="rgba(80,199,147,1)" fill-opacity="1" stroke="#"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="2"
                                                stroke-dasharray="0" class="apexcharts-bar-area" index="0"
                                                clip-path="url(#gridRectMask05yljicq)"
                                                pathTo="M 38.505306122448985 48.001 L 38.505306122448985 8.001 L 45.06204081632654 8.001 L 45.06204081632654 48.001 Z"
                                                pathFrom="M 38.505306122448985 48.001 L 38.505306122448985 48.001 L 45.06204081632654 48.001 L 45.06204081632654 48.001 L 45.06204081632654 48.001 L 45.06204081632654 48.001 L 45.06204081632654 48.001 L 38.505306122448985 48.001 Z"
                                                cy="8" cx="46.06204081632654" j="3" val="100"
                                                barHeight="40" barWidth="8.556734693877551"></path>
                                            <path id="SvgjsPath2670"
                                                d="M 52.76653061224489 48.001 L 52.76653061224489 18.001 L 59.323265306122444 18.001 L 59.323265306122444 48.001 Z"
                                                fill="rgba(80,199,147,1)" fill-opacity="1" stroke="#"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="2"
                                                stroke-dasharray="0" class="apexcharts-bar-area" index="0"
                                                clip-path="url(#gridRectMask05yljicq)"
                                                pathTo="M 52.76653061224489 48.001 L 52.76653061224489 18.001 L 59.323265306122444 18.001 L 59.323265306122444 48.001 Z"
                                                pathFrom="M 52.76653061224489 48.001 L 52.76653061224489 48.001 L 59.323265306122444 48.001 L 59.323265306122444 48.001 L 59.323265306122444 48.001 L 59.323265306122444 48.001 L 59.323265306122444 48.001 L 52.76653061224489 48.001 Z"
                                                cy="18" cx="60.323265306122444" j="4" val="75"
                                                barHeight="30" barWidth="8.556734693877551"></path>
                                            <path id="SvgjsPath2672"
                                                d="M 67.02775510204081 48.001 L 67.02775510204081 32.001 L 73.58448979591836 32.001 L 73.58448979591836 48.001 Z"
                                                fill="rgba(80,199,147,1)" fill-opacity="1" stroke="#"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="2"
                                                stroke-dasharray="0" class="apexcharts-bar-area" index="0"
                                                clip-path="url(#gridRectMask05yljicq)"
                                                pathTo="M 67.02775510204081 48.001 L 67.02775510204081 32.001 L 73.58448979591836 32.001 L 73.58448979591836 48.001 Z"
                                                pathFrom="M 67.02775510204081 48.001 L 67.02775510204081 48.001 L 73.58448979591836 48.001 L 73.58448979591836 48.001 L 73.58448979591836 48.001 L 73.58448979591836 48.001 L 73.58448979591836 48.001 L 67.02775510204081 48.001 Z"
                                                cy="32" cx="74.58448979591836" j="5" val="40"
                                                barHeight="16" barWidth="8.556734693877551"></path>
                                            <path id="SvgjsPath2674"
                                                d="M 81.28897959183674 48.001 L 81.28897959183674 16.001 L 87.84571428571428 16.001 L 87.84571428571428 48.001 Z"
                                                fill="rgba(80,199,147,1)" fill-opacity="1" stroke="#"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="2"
                                                stroke-dasharray="0" class="apexcharts-bar-area" index="0"
                                                clip-path="url(#gridRectMask05yljicq)"
                                                pathTo="M 81.28897959183674 48.001 L 81.28897959183674 16.001 L 87.84571428571428 16.001 L 87.84571428571428 48.001 Z"
                                                pathFrom="M 81.28897959183674 48.001 L 81.28897959183674 48.001 L 87.84571428571428 48.001 L 87.84571428571428 48.001 L 87.84571428571428 48.001 L 87.84571428571428 48.001 L 87.84571428571428 48.001 L 81.28897959183674 48.001 Z"
                                                cy="16" cx="88.84571428571428" j="6" val="80"
                                                barHeight="32" barWidth="8.556734693877551"></path>
                                            <path id="SvgjsPath2676"
                                                d="M 95.55020408163264 48.001 L 95.55020408163264 12.001 L 102.1069387755102 12.001 L 102.1069387755102 48.001 Z"
                                                fill="rgba(80,199,147,1)" fill-opacity="1" stroke="#"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="2"
                                                stroke-dasharray="0" class="apexcharts-bar-area" index="0"
                                                clip-path="url(#gridRectMask05yljicq)"
                                                pathTo="M 95.55020408163264 48.001 L 95.55020408163264 12.001 L 102.1069387755102 12.001 L 102.1069387755102 48.001 Z"
                                                pathFrom="M 95.55020408163264 48.001 L 95.55020408163264 48.001 L 102.1069387755102 48.001 L 102.1069387755102 48.001 L 102.1069387755102 48.001 L 102.1069387755102 48.001 L 102.1069387755102 48.001 L 95.55020408163264 48.001 Z"
                                                cy="12" cx="103.1069387755102" j="7" val="90"
                                                barHeight="36" barWidth="8.556734693877551"></path>
                                            <g id="SvgjsG2660" class="apexcharts-bar-goals-markers"
                                                style="pointer-events: none">
                                                <g id="SvgjsG2661" className="apexcharts-bar-goals-groups"></g>
                                                <g id="SvgjsG2663" className="apexcharts-bar-goals-groups"></g>
                                                <g id="SvgjsG2665" className="apexcharts-bar-goals-groups"></g>
                                                <g id="SvgjsG2667" className="apexcharts-bar-goals-groups"></g>
                                                <g id="SvgjsG2669" className="apexcharts-bar-goals-groups"></g>
                                                <g id="SvgjsG2671" className="apexcharts-bar-goals-groups"></g>
                                                <g id="SvgjsG2673" className="apexcharts-bar-goals-groups"></g>
                                                <g id="SvgjsG2675" className="apexcharts-bar-goals-groups"></g>
                                            </g>
                                        </g>
                                        <g id="SvgjsG2659" class="apexcharts-datalabels" data:realIndex="0"></g>
                                    </g>
                                    <line id="SvgjsLine2694" x1="-12.085714285714285" y1="0"
                                        x2="111.91428571428571" y2="0" stroke="#b6b6b6" stroke-dasharray="0"
                                        stroke-width="1" stroke-linecap="butt" class="apexcharts-ycrosshairs"></line>
                                    <line id="SvgjsLine2695" x1="-12.085714285714285" y1="0"
                                        x2="111.91428571428571" y2="0" stroke-dasharray="0" stroke-width="0"
                                        stroke-linecap="butt" class="apexcharts-ycrosshairs-hidden"></line>
                                    <g id="SvgjsG2696" class="apexcharts-yaxis-annotations"></g>
                                    <g id="SvgjsG2697" class="apexcharts-xaxis-annotations"></g>
                                    <g id="SvgjsG2698" class="apexcharts-point-annotations"></g>
                                    <g id="SvgjsG2699" class="apexcharts-xaxis" transform="translate(0, 0)">
                                        <g id="SvgjsG2700" class="apexcharts-xaxis-texts-g" transform="translate(0, -4)">
                                        </g>
                                    </g>
                                </g>
                                <g id="SvgjsG2707" class="apexcharts-yaxis" rel="0"
                                    transform="translate(-18, 0)"></g>
                                <g id="SvgjsG2648" class="apexcharts-annotations"></g>
                            </svg>
                            <div class="apexcharts-legend" style="max-height: 24px;"></div>
                            <div class="apexcharts-tooltip apexcharts-theme-light">
                                <div class="apexcharts-tooltip-title"
                                    style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"></div>
                                <div class="apexcharts-tooltip-series-group" style="order: 1;"><span
                                        class="apexcharts-tooltip-marker"></span>
                                    <div class="apexcharts-tooltip-text"
                                        style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                        <div class="apexcharts-tooltip-y-group"><span
                                                class="apexcharts-tooltip-text-y-label"></span><span
                                                class="apexcharts-tooltip-text-y-value"></span></div>
                                        <div class="apexcharts-tooltip-goals-group"><span
                                                class="apexcharts-tooltip-text-goals-label"></span><span
                                                class="apexcharts-tooltip-text-goals-value"></span></div>
                                        <div class="apexcharts-tooltip-z-group"><span
                                                class="apexcharts-tooltip-text-z-label"></span><span
                                                class="apexcharts-tooltip-text-z-value"></span></div>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light">
                                <div class="apexcharts-yaxistooltip-text"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-slate-50 dark:bg-slate-900 rounded p-4">
                <div class="text-slate-600 dark:text-slate-400 text-sm mb-1 font-medium">
                    {{ __('dashboard.comments') }}
                </div>
                <div class="text-slate-900 dark:text-white text-lg font-medium">
                 0
                </div>
                <div class="ml-auto max-w-[124px]">
                    <div id="clmn_chart_3" style="min-height: 48px;">
                        <div id="apexchartsnv3kgbo5" class="apexcharts-canvas apexchartsnv3kgbo5 apexcharts-theme-light"
                            style="width: 124px; height: 48px;"><svg id="SvgjsSvg2708" width="124" height="48"
                                xmlns="http://www.w3.org/2000/svg" version="1.1"
                                xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev"
                                class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)"
                                style="background: transparent;">
                                <g id="SvgjsG2710" class="apexcharts-inner apexcharts-graphical"
                                    transform="translate(16.085714285714285, 0)">
                                    <defs id="SvgjsDefs2709">
                                        <linearGradient id="SvgjsLinearGradient2713" x1="0" y1="0"
                                            x2="0" y2="1">
                                            <stop id="SvgjsStop2714" stop-opacity="0.4"
                                                stop-color="rgba(216,227,240,0.4)" offset="0"></stop>
                                            <stop id="SvgjsStop2715" stop-opacity="0.5"
                                                stop-color="rgba(190,209,230,0.5)" offset="1"></stop>
                                            <stop id="SvgjsStop2716" stop-opacity="0.5"
                                                stop-color="rgba(190,209,230,0.5)" offset="1"></stop>
                                        </linearGradient>
                                        <clipPath id="gridRectMasknv3kgbo5">
                                            <rect id="SvgjsRect2718" width="130" height="50"
                                                x="-15.085714285714285" y="-1" rx="0" ry="0"
                                                opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0"
                                                fill="#fff"></rect>
                                        </clipPath>
                                        <clipPath id="forecastMasknv3kgbo5"></clipPath>
                                        <clipPath id="nonForecastMasknv3kgbo5"></clipPath>
                                        <clipPath id="gridRectMarkerMasknv3kgbo5">
                                            <rect id="SvgjsRect2719" width="103.82857142857142" height="52" x="-2"
                                                y="-2" rx="0" ry="0" opacity="1" stroke-width="0"
                                                stroke="none" stroke-dasharray="0" fill="#fff"></rect>
                                        </clipPath>
                                    </defs>
                                    <rect id="SvgjsRect2717" width="8.556734693877551" height="48" x="0" y="0"
                                        rx="0" ry="0" opacity="1" stroke-width="0"
                                        stroke-dasharray="3" fill="url(#SvgjsLinearGradient2713)"
                                        class="apexcharts-xcrosshairs" y2="48" filter="none" fill-opacity="0.9">
                                    </rect>
                                    <g id="SvgjsG2740" class="apexcharts-grid">
                                        <g id="SvgjsG2741" class="apexcharts-gridlines-horizontal"
                                            style="display: none;">
                                            <line id="SvgjsLine2751" x1="-12.085714285714285" y1="12"
                                                x2="111.91428571428571" y2="12" stroke="#e0e0e0"
                                                stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline">
                                            </line>
                                            <line id="SvgjsLine2752" x1="-12.085714285714285" y1="24"
                                                x2="111.91428571428571" y2="24" stroke="#e0e0e0"
                                                stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline">
                                            </line>
                                            <line id="SvgjsLine2753" x1="-12.085714285714285" y1="36"
                                                x2="111.91428571428571" y2="36" stroke="#e0e0e0"
                                                stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline">
                                            </line>
                                        </g>
                                        <g id="SvgjsG2742" class="apexcharts-gridlines-vertical" style="display: none;">
                                            <line id="SvgjsLine2744" x1="0" y1="0" x2="0"
                                                y2="48" stroke="#e0e0e0" stroke-dasharray="0"
                                                stroke-linecap="butt" class="apexcharts-gridline"></line>
                                            <line id="SvgjsLine2745" x1="19.965714285714284" y1="0"
                                                x2="19.965714285714284" y2="48" stroke="#e0e0e0"
                                                stroke-dasharray="0" stroke-linecap="butt"
                                                class="apexcharts-gridline"></line>
                                            <line id="SvgjsLine2746" x1="39.93142857142857" y1="0"
                                                x2="39.93142857142857" y2="48" stroke="#e0e0e0"
                                                stroke-dasharray="0" stroke-linecap="butt"
                                                class="apexcharts-gridline"></line>
                                            <line id="SvgjsLine2747" x1="59.89714285714285" y1="0"
                                                x2="59.89714285714285" y2="48" stroke="#e0e0e0"
                                                stroke-dasharray="0" stroke-linecap="butt"
                                                class="apexcharts-gridline"></line>
                                            <line id="SvgjsLine2748" x1="79.86285714285714" y1="0"
                                                x2="79.86285714285714" y2="48" stroke="#e0e0e0"
                                                stroke-dasharray="0" stroke-linecap="butt"
                                                class="apexcharts-gridline"></line>
                                            <line id="SvgjsLine2749" x1="99.82857142857142" y1="0"
                                                x2="99.82857142857142" y2="48" stroke="#e0e0e0"
                                                stroke-dasharray="0" stroke-linecap="butt"
                                                class="apexcharts-gridline"></line>
                                        </g>
                                        <line id="SvgjsLine2756" x1="0" y1="48"
                                            x2="99.82857142857142" y2="48" stroke="transparent"
                                            stroke-dasharray="0" stroke-linecap="butt"></line>
                                        <line id="SvgjsLine2755" x1="0" y1="1" x2="0"
                                            y2="48" stroke="transparent" stroke-dasharray="0"
                                            stroke-linecap="butt"></line>
                                    </g>
                                    <g id="SvgjsG2743" class="apexcharts-grid-borders" style="display: none;">
                                        <line id="SvgjsLine2750" x1="-12.085714285714285" y1="0"
                                            x2="111.91428571428571" y2="0" stroke="#e0e0e0"
                                            stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline">
                                        </line>
                                        <line id="SvgjsLine2754" x1="-12.085714285714285" y1="48"
                                            x2="111.91428571428571" y2="48" stroke="#e0e0e0"
                                            stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline">
                                        </line>
                                    </g>
                                    <g id="SvgjsG2720" class="apexcharts-bar-series apexcharts-plot-series">
                                        <g id="SvgjsG2721" class="apexcharts-series" rel="1"
                                            seriesName="Revenue" data:realIndex="0">
                                            <path id="SvgjsPath2725"
                                                d="M -4.278367346938776 48.001 L -4.278367346938776 32.001 L 2.2783673469387757 32.001 L 2.2783673469387757 48.001 Z"
                                                fill="rgba(250,145,107,1)" fill-opacity="1" stroke="#"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="2"
                                                stroke-dasharray="0" class="apexcharts-bar-area" index="0"
                                                clip-path="url(#gridRectMasknv3kgbo5)"
                                                pathTo="M -4.278367346938776 48.001 L -4.278367346938776 32.001 L 2.2783673469387757 32.001 L 2.2783673469387757 48.001 Z"
                                                pathFrom="M -4.278367346938776 48.001 L -4.278367346938776 48.001 L 2.2783673469387757 48.001 L 2.2783673469387757 48.001 L 2.2783673469387757 48.001 L 2.2783673469387757 48.001 L 2.2783673469387757 48.001 L -4.278367346938776 48.001 Z"
                                                cy="32" cx="3.2783673469387757" j="0" val="40"
                                                barHeight="16" barWidth="8.556734693877551"></path>
                                            <path id="SvgjsPath2727"
                                                d="M 9.982857142857142 48.001 L 9.982857142857142 20.001 L 16.539591836734694 20.001 L 16.539591836734694 48.001 Z"
                                                fill="rgba(250,145,107,1)" fill-opacity="1" stroke="#"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="2"
                                                stroke-dasharray="0" class="apexcharts-bar-area" index="0"
                                                clip-path="url(#gridRectMasknv3kgbo5)"
                                                pathTo="M 9.982857142857142 48.001 L 9.982857142857142 20.001 L 16.539591836734694 20.001 L 16.539591836734694 48.001 Z"
                                                pathFrom="M 9.982857142857142 48.001 L 9.982857142857142 48.001 L 16.539591836734694 48.001 L 16.539591836734694 48.001 L 16.539591836734694 48.001 L 16.539591836734694 48.001 L 16.539591836734694 48.001 L 9.982857142857142 48.001 Z"
                                                cy="20" cx="17.539591836734694" j="1" val="70"
                                                barHeight="28" barWidth="8.556734693877551"></path>
                                            <path id="SvgjsPath2729"
                                                d="M 24.24408163265306 48.001 L 24.24408163265306 30.001 L 30.800816326530608 30.001 L 30.800816326530608 48.001 Z"
                                                fill="rgba(250,145,107,1)" fill-opacity="1" stroke="#"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="2"
                                                stroke-dasharray="0" class="apexcharts-bar-area" index="0"
                                                clip-path="url(#gridRectMasknv3kgbo5)"
                                                pathTo="M 24.24408163265306 48.001 L 24.24408163265306 30.001 L 30.800816326530608 30.001 L 30.800816326530608 48.001 Z"
                                                pathFrom="M 24.24408163265306 48.001 L 24.24408163265306 48.001 L 30.800816326530608 48.001 L 30.800816326530608 48.001 L 30.800816326530608 48.001 L 30.800816326530608 48.001 L 30.800816326530608 48.001 L 24.24408163265306 48.001 Z"
                                                cy="30" cx="31.800816326530608" j="2" val="45"
                                                barHeight="18" barWidth="8.556734693877551"></path>
                                            <path id="SvgjsPath2731"
                                                d="M 38.505306122448985 48.001 L 38.505306122448985 8.001 L 45.06204081632654 8.001 L 45.06204081632654 48.001 Z"
                                                fill="rgba(250,145,107,1)" fill-opacity="1" stroke="#"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="2"
                                                stroke-dasharray="0" class="apexcharts-bar-area" index="0"
                                                clip-path="url(#gridRectMasknv3kgbo5)"
                                                pathTo="M 38.505306122448985 48.001 L 38.505306122448985 8.001 L 45.06204081632654 8.001 L 45.06204081632654 48.001 Z"
                                                pathFrom="M 38.505306122448985 48.001 L 38.505306122448985 48.001 L 45.06204081632654 48.001 L 45.06204081632654 48.001 L 45.06204081632654 48.001 L 45.06204081632654 48.001 L 45.06204081632654 48.001 L 38.505306122448985 48.001 Z"
                                                cy="8" cx="46.06204081632654" j="3" val="100"
                                                barHeight="40" barWidth="8.556734693877551"></path>
                                            <path id="SvgjsPath2733"
                                                d="M 52.76653061224489 48.001 L 52.76653061224489 18.001 L 59.323265306122444 18.001 L 59.323265306122444 48.001 Z"
                                                fill="rgba(250,145,107,1)" fill-opacity="1" stroke="#"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="2"
                                                stroke-dasharray="0" class="apexcharts-bar-area" index="0"
                                                clip-path="url(#gridRectMasknv3kgbo5)"
                                                pathTo="M 52.76653061224489 48.001 L 52.76653061224489 18.001 L 59.323265306122444 18.001 L 59.323265306122444 48.001 Z"
                                                pathFrom="M 52.76653061224489 48.001 L 52.76653061224489 48.001 L 59.323265306122444 48.001 L 59.323265306122444 48.001 L 59.323265306122444 48.001 L 59.323265306122444 48.001 L 59.323265306122444 48.001 L 52.76653061224489 48.001 Z"
                                                cy="18" cx="60.323265306122444" j="4" val="75"
                                                barHeight="30" barWidth="8.556734693877551"></path>
                                            <path id="SvgjsPath2735"
                                                d="M 67.02775510204081 48.001 L 67.02775510204081 32.001 L 73.58448979591836 32.001 L 73.58448979591836 48.001 Z"
                                                fill="rgba(250,145,107,1)" fill-opacity="1" stroke="#"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="2"
                                                stroke-dasharray="0" class="apexcharts-bar-area" index="0"
                                                clip-path="url(#gridRectMasknv3kgbo5)"
                                                pathTo="M 67.02775510204081 48.001 L 67.02775510204081 32.001 L 73.58448979591836 32.001 L 73.58448979591836 48.001 Z"
                                                pathFrom="M 67.02775510204081 48.001 L 67.02775510204081 48.001 L 73.58448979591836 48.001 L 73.58448979591836 48.001 L 73.58448979591836 48.001 L 73.58448979591836 48.001 L 73.58448979591836 48.001 L 67.02775510204081 48.001 Z"
                                                cy="32" cx="74.58448979591836" j="5" val="40"
                                                barHeight="16" barWidth="8.556734693877551"></path>
                                            <path id="SvgjsPath2737"
                                                d="M 81.28897959183674 48.001 L 81.28897959183674 16.001 L 87.84571428571428 16.001 L 87.84571428571428 48.001 Z"
                                                fill="rgba(250,145,107,1)" fill-opacity="1" stroke="#"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="2"
                                                stroke-dasharray="0" class="apexcharts-bar-area" index="0"
                                                clip-path="url(#gridRectMasknv3kgbo5)"
                                                pathTo="M 81.28897959183674 48.001 L 81.28897959183674 16.001 L 87.84571428571428 16.001 L 87.84571428571428 48.001 Z"
                                                pathFrom="M 81.28897959183674 48.001 L 81.28897959183674 48.001 L 87.84571428571428 48.001 L 87.84571428571428 48.001 L 87.84571428571428 48.001 L 87.84571428571428 48.001 L 87.84571428571428 48.001 L 81.28897959183674 48.001 Z"
                                                cy="16" cx="88.84571428571428" j="6" val="80"
                                                barHeight="32" barWidth="8.556734693877551"></path>
                                            <path id="SvgjsPath2739"
                                                d="M 95.55020408163264 48.001 L 95.55020408163264 12.001 L 102.1069387755102 12.001 L 102.1069387755102 48.001 Z"
                                                fill="rgba(250,145,107,1)" fill-opacity="1" stroke="#"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="2"
                                                stroke-dasharray="0" class="apexcharts-bar-area" index="0"
                                                clip-path="url(#gridRectMasknv3kgbo5)"
                                                pathTo="M 95.55020408163264 48.001 L 95.55020408163264 12.001 L 102.1069387755102 12.001 L 102.1069387755102 48.001 Z"
                                                pathFrom="M 95.55020408163264 48.001 L 95.55020408163264 48.001 L 102.1069387755102 48.001 L 102.1069387755102 48.001 L 102.1069387755102 48.001 L 102.1069387755102 48.001 L 102.1069387755102 48.001 L 95.55020408163264 48.001 Z"
                                                cy="12" cx="103.1069387755102" j="7" val="90"
                                                barHeight="36" barWidth="8.556734693877551"></path>
                                            <g id="SvgjsG2723" class="apexcharts-bar-goals-markers"
                                                style="pointer-events: none">
                                                <g id="SvgjsG2724" className="apexcharts-bar-goals-groups"></g>
                                                <g id="SvgjsG2726" className="apexcharts-bar-goals-groups"></g>
                                                <g id="SvgjsG2728" className="apexcharts-bar-goals-groups"></g>
                                                <g id="SvgjsG2730" className="apexcharts-bar-goals-groups"></g>
                                                <g id="SvgjsG2732" className="apexcharts-bar-goals-groups"></g>
                                                <g id="SvgjsG2734" className="apexcharts-bar-goals-groups"></g>
                                                <g id="SvgjsG2736" className="apexcharts-bar-goals-groups"></g>
                                                <g id="SvgjsG2738" className="apexcharts-bar-goals-groups"></g>
                                            </g>
                                        </g>
                                        <g id="SvgjsG2722" class="apexcharts-datalabels" data:realIndex="0"></g>
                                    </g>
                                    <line id="SvgjsLine2757" x1="-12.085714285714285" y1="0"
                                        x2="111.91428571428571" y2="0" stroke="#b6b6b6" stroke-dasharray="0"
                                        stroke-width="1" stroke-linecap="butt" class="apexcharts-ycrosshairs"></line>
                                    <line id="SvgjsLine2758" x1="-12.085714285714285" y1="0"
                                        x2="111.91428571428571" y2="0" stroke-dasharray="0" stroke-width="0"
                                        stroke-linecap="butt" class="apexcharts-ycrosshairs-hidden"></line>
                                    <g id="SvgjsG2759" class="apexcharts-yaxis-annotations"></g>
                                    <g id="SvgjsG2760" class="apexcharts-xaxis-annotations"></g>
                                    <g id="SvgjsG2761" class="apexcharts-point-annotations"></g>
                                    <g id="SvgjsG2762" class="apexcharts-xaxis" transform="translate(0, 0)">
                                        <g id="SvgjsG2763" class="apexcharts-xaxis-texts-g"
                                            transform="translate(0, -4)"></g>
                                    </g>
                                </g>
                                <g id="SvgjsG2770" class="apexcharts-yaxis" rel="0"
                                    transform="translate(-18, 0)"></g>
                                <g id="SvgjsG2711" class="apexcharts-annotations"></g>
                            </svg>
                            <div class="apexcharts-legend" style="max-height: 24px;"></div>
                            <div class="apexcharts-tooltip apexcharts-theme-light">
                                <div class="apexcharts-tooltip-title"
                                    style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"></div>
                                <div class="apexcharts-tooltip-series-group" style="order: 1;"><span
                                        class="apexcharts-tooltip-marker"></span>
                                    <div class="apexcharts-tooltip-text"
                                        style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                        <div class="apexcharts-tooltip-y-group"><span
                                                class="apexcharts-tooltip-text-y-label"></span><span
                                                class="apexcharts-tooltip-text-y-value"></span></div>
                                        <div class="apexcharts-tooltip-goals-group"><span
                                                class="apexcharts-tooltip-text-goals-label"></span><span
                                                class="apexcharts-tooltip-text-goals-value"></span></div>
                                        <div class="apexcharts-tooltip-z-group"><span
                                                class="apexcharts-tooltip-text-z-label"></span><span
                                                class="apexcharts-tooltip-text-z-value"></span></div>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light">
                                <div class="apexcharts-yaxistooltip-text"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- END: Group Chart3 -->
        </div>
    </div>
@endsection
