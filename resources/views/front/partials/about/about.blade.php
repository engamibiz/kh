<!-- START BREADCRUMB -->
<nav aria-label="breadcrumb">
    <div class="container-fluid">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('front.home') }}">{{ __('main.home_title') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ __('about::about.about') }}</li>
        </ol>
    </div>
</nav>
<!-- END BREADCRUMB -->

<!-- START PAGE WRAPPER -->
<main class="main-content">

    <!-- START about-page  -->
    <section class="about-page">
        @foreach ($abouts as $about)
        <div class="about-block">
            <div class="container-fluid padding-block">
                @if (!empty($about->title))
                    <div class="section-title">
                        <h2 class="title">{{ $about->title }}</h2>
                    </div>
                @endif

                <div class="row align-items-center">
                    @if (!empty($about->description))
                        <div class="@if(!$about->image) col-12 @else col-md-6 @endif">
                            <div class="text">
                                {!! $about->description !!}
                            </div>
                        </div>
                    @endif
                    @if ($about->image)
                        <div class="col-md-6 mb-3 mb-md-0 order-md-last order-first">
                            <div class="media">
                                <img src="{{ $about->image }}" alt="{{ $about->title }}" />
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        @endforeach
    </section>


</main>
<!-- END PAGE WRAPPER -->
