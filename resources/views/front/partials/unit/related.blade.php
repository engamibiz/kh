@if (count($relates))
    <div class="mt-5">
        <div class="section-title">
            <h2 class="title">{{ __('main.related_units') }}</h2>
        </div>

        <div class="swiper units-slider">
            <div class="swiper-wrapper">
                @foreach ($relates as $unit)
                    <div class="swiper-slide">
                        @include('front.components.unit', ['unit' => $unit])
                    </div>
                @endforeach
            </div>
            <div class="swiper-button-next units-next-btn"></div>
            <div class="swiper-button-prev units-prev-btn"></div>
        </div>
    </div>
@endif
