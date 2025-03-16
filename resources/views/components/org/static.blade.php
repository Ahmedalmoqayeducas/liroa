<div class="" style="margin-top: 30px;">
    <div class="row">
        <div class="col-md-12">
            <!-- Loop through data and display each item -->
            @foreach ($posts as $element)
                <div class="panel panel-default">
                    <div class="panel-heading ">
                        <h5 class="panel-title text-center text-danger bg-light" style="font-size: 1.5em;">
                            {{ $element->title }}
                            <div class="fusion-separator-border sep-single sep-dotted"
                                style="--awb-height:20px;--awb-amount:20px;--awb-sep-color:var(--awb-color4);border-color:var(--awb-color4);border-top-width:1px;">

                            </div>
                        </h5>
                        {{-- <h5 class="fusion-separator" style="align-self: flex-start;margin-right:auto;width:100%;max-width:282px;"> --}}

                        {{-- </h5> --}}
                    </div>
                    <div class="panel-body">
                        <!-- Display HTML description safely -->
                        {!! $element->description !!}
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</div>
