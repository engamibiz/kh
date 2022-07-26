<!-- START BREADCRUMB -->
<nav aria-label="breadcrumb">
    <div class="container-fluid">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('front.home') }}">{{ __('main.home_title') }}</a></li>
            <li class="breadcrumb-item"><a
                    href="{{ route('front.developers') }}">{{ __('inventory::inventory.developers') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $developer['developer']->developer }}</li>
        </ol>
    </div>
</nav>
<!-- END BREADCRUMB -->

<!-- START PAGE WRAPPER -->
<main class="main-content">

    <!-- START index-page  -->
    <section aria-label="section" class="index-page pb-5">
        <div class="container-fluid">
            @include('front.components.search-box', [
                'url' => route('front.developers.show', [
                    'id' => $developer['developer']->id,
                    'slug' => $developer['developer']->developer,
                ]),
            ])
            <div class="mt-5 pt-3" style="box-shadow: var(--shadow);">
                <div class="bg-white p-4">
                    <div class="row">
                        <div class="col-lg-2 col-md-3">

                            <div class="dev-logo">
                                @forelse($developer['developer']->attachments as $attachment)
                                    @if ($loop->index == 0)
                                        <img class="img-fluid" src="{{ file_exists(public_path('/storage/dimensions/uploads/' .$attachment->file_name_without_extension .'_125x125' .'.' .$attachment->extension))? asset('storage/dimensions/uploads/' .$attachment->file_name_without_extension .'_125x125' .'.' .$attachment->extension): $attachment->url }}"
                                            alt="{{ $attachment->file_name }}">
                                    @else
                                    @break
                                @endif
                            @empty
                                <img class="img-fluid" src="{{ URL::asset('front/images/placeholder.png') }}"
                                    alt="{{ $developer['developer']->developer }}">
                            @endforelse
                        </div>
                    </div>

                    <div class="col-lg-10 col-md-9">
                        <h1 class="h3 font-weight-normal mb-2">{{ $developer['developer']->developer }}</h1>
                        <p class="font-weight-light">
                            {!! $developer['developer']->description !!}

                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="grid-container mt-5 pt-3">
            @if (isset($developer['projects']) && count($developer['projects']))
                @foreach ($developer['projects'] as $project)
                    @include('front.components.project', ['project' => $project])
                @endforeach
            @endif
        </div>

        @if ($developer['projects']->hasPages())
            {{ $developer['projects']->appends(request()->input())->links('front.partials.primary.pagination') }}
        @endif

    </div>
</section>
<!-- END index-page  -->

</main>
