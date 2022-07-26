<!-- START main-search SECTION -->
<section class="main-search">
    <div class="container-fluid">
        <div class="home-search">
            {{-- <h2 class="search-title">
                <span class="icon">
                    <svg width="25" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </span>
                <span class="text">Find your next Perfect home</span>
            </h2> --}}
            @include('front.components.search-box', [
                'url' => route('front.properties'),
                'form_id' => 'search-form',
            ])
        </div>
    </div>
</section>
<!-- START main-search SECTION -->
