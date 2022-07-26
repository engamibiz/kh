@if (count($blogs))
<!-- START blogs-holder -->
<section class="section blogs-holder">
    <svg class="sec-shape" viewBox="0 0 2600 131.1">
        <path d="M0 0L2600 0 2600 69.1 0 0z"></path>
    </svg>

    <div class="container-fluid padding-block">
        <div class="section-title">
            <h2 class="title">{{__('main.blog')}}</h2>
        </div>
        <div class="blogs-wrapper">
            <div class="swiper blogs-slider">
                <div class="swiper-wrapper">
                    @foreach ($blogs as $blog)
                        <div class="swiper-slide">
                            @include('front.components.blog', ['blog' => $blog])
                        </div>
                    @endforeach
                </div>
                <div class="swiper-button-next blog-next-btn"></div>
                <div class="swiper-button-prev blog-prev-btn"></div>
            </div>
        </div>
    </div>
    <!-- /.container -->
</section>
<!-- END blogs-holder -->
@endif

