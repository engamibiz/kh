<!-- START BREADCRUMB -->
<nav aria-label="breadcrumb">
    <div class="container-fluid">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('front.home') }}">{{ __('main.home_title') }}</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">{{ __('inventory::inventory.developers') }}
            </li>
        </ol>
    </div>
</nav>

<!-- END BREADCRUMB -->
<!-- START PAGE WRAPPER -->
<main class="main-content">

    <!-- START index-page  -->
    <section aria-label="section" class="index-page devs-page pb-5">
        <div class="container-fluid">

            <div class="grid-container mt-5 pt-3">
                @foreach ($developers as $developer)
                    @include('front.components.developer', [
                        'developer' => $developer,
                    ])
                @endforeach
            </div>

            @if ($developers->hasPages())
                {{ $developers->links('front.partials.primary.pagination') }}
            @endif

        </div>
    </section>
    <!-- END index-page  -->

</main>
<!-- END PAGE WRAPPER -->
