@if (count($projects))
    <!-- START PROJECTS -->
    <section class="section projects-holder">
        <svg class="sec-shape" viewBox="0 0 2600 132">
            <path d="M2600 0H0V69.1L2600 0Z" />
        </svg>
        <div class="container-fluid padding-block">
            <div class="section-title">
                <h2 class="title">{{ __('main.featured_projects') }}</h2>
            </div>
            <div class="swiper projects-slider">
                <div class="swiper-wrapper">
                    @foreach ($projects as $project)
                        <div class="swiper-slide">
                            @include('front.components.project', ['project' => $project])
                        </div>
                    @endforeach
                </div>
                <div class="swiper-button-next proj-next-btn"></div>
                <div class="swiper-button-prev proj-prev-btn"></div>
            </div>
        </div>
    </section>
@endif
<!-- ENd PROJECTS -->
