<!-- START developers -->
<section class="section developers-holder">

    <svg class="sec-shape" viewBox="0 0 2600 132">
        <path d="M2600 0H0V69.1L2600 0Z" />
    </svg>

    <div class="container-fluid padding-block">
        <div class="section-title">
            <h2 class="title">{{ __('main.our_partners') }}</h2>
        </div>
        <div class="swiper devs-slider">
            <div class="swiper-wrapper">
                @foreach ($developers as $developer)
                    <div class="swiper-slide">
                        @include('front.components.developer', [
                            'developer' => $developer,
                        ])
                    </div>
                @endforeach
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
</section>
<!-- ENd developers -->
