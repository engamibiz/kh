<div class="home-slider-wrapper">
    <div class="swiper home-slider">
        <div class="swiper-wrapper">
            @foreach ($sliders as $slider)
            <div class="swiper-slide">
                <a href="{{ $slider->link }}">
                <div class="img">
                    <img src="{{ URL::asset('storage/' . $slider->image) }}" alt="{{ $slider->title }}" />
                </div>
                </a>
                @if($slider->title)
                    <div class="text">
                        <h2>{{ $slider->title }}</h2>
                        <p>{{ $slider->description }}</p>
                        <a class="site-btn" href="{{ $slider->link }}">{{ __('main.know_more') }}</a>
                    </div>
                @endif
            </div>
            @endforeach
        </div>
        <div class="swiper-pagination"></div>

    </div>
</div>
