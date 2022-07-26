<!-- START BREADCRUMB -->
<nav aria-label="breadcrumb">
    <div class="container-fluid">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('front.home') }}">{{ __('main.home_title') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ __('main.thank_you') }}</li>
        </ol>
    </div>
</nav>
<!-- END BREADCRUMB -->

<!-- START PAGE WRAPPER -->
<main class="main-content">

    <!-- START thank's-page  -->
    <section class="thank-page pt-3 pb-5">
        <div class="container-fluid">
            <div class="check text-center mb-2">
                <img src="{{ URL::asset('front/images/check.png') }}" alt="Success Image" />
            </div>
            <div class="section-title">
                <h1 class="title">{{ __('main.thank_you') }} ({{ $name }})
                    {{ __('main.for_your_intrest') }}</h1>
                <p>
                    @if (App::getLocale() == 'en')
                        @if ($setting->thank_you_message_en)
                            {!! str_replace('$model_name', $model_name, $setting->thank_you_message_en) !!}
                        @endif
                    @else
                        @if ($setting->thank_you_message_ar)
                            {!! str_replace('$model_name', $model_name, $setting->thank_you_message_ar) !!}
                        @endif
                    @endif
                </p>
            </div>

            <div class="mt-5">
                <div class="section-title text-center">
                    <h2 class="title">{{ __('main.similar_listings') }}</h2>
                </div>
                <div class="swiper units-slider">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <unit-card data-img="images/unit-1.jpg" data-area="250" data-price="3.4 m" data-beds="4"
                                data-rooms="3" data-bath="3" data-title="Villa with Amazing View">
                            </unit-card>
                        </div>
                        @foreach ($units as $unit)
                            <div class="swiper-slide">
                                @include('front.components.unit', ['unit' => $unit])
                            </div>
                        @endforeach

                    </div>
                    <div class="swiper-button-next units-next-btn"></div>
                    <div class="swiper-button-prev units-prev-btn"></div>
                </div>
            </div>
        </div>
    </section>
    <!-- END thank's-page  -->

</main>
<!-- END PAGE WRAPPER -->
