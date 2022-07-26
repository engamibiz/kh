@extends('front.layouts.main')

@push('header-scripts')
@endpush

@php
$page_name = 'home';
@endphp
@foreach($seo as $seo_home)
      @if($seo_home->page == 'home')
            @include('front.components.meta',['meta' => $seo_home])
      @break
      @endif
@endforeach
@section('content')

    <!-- START BANNER -->
    @if (count($sliders))
      @include('front.partials.home.slider')
    @endif
    <!-- END BANNER -->
    <!-- START SEARCH BOX -->
    @include('front.partials.home.search')

    @include('front.partials.home.units')

    @include('front.partials.home.projects')

    <!-- END DEVELOPERS -->
    @include('front.partials.home.blogs')

    <!-- START DEVELOPERS -->
    @if (count($developers))
      <!--  START PROJECTS  -->
      @include('front.partials.home.developers')
      <!--  END PROJECTS  -->
    @endif

@endsection
@push('scripts')
<script>
      // REVEAL SCRIPT
      document.addEventListener('DOMContentLoaded', function () {
        var revealBlockOne = document.querySelector('.reveal-block.one');
        var revealBlockTwo = document.querySelector('.reveal-block.two');
        var loadingBlock = document.querySelector('.loading-block');
        var preloader = document.querySelector('.preloader');
        var image = document.querySelector('.reveal-block svg');

        var tlOne = new gsap.timeline();

        tlOne
          .to(loadingBlock, { duration: 0.2, scaleY: 0.05, ease: 'power4.in' })
          .to(loadingBlock, { duration: 1, scaleX: 1, ease: 'expo.in' })
          .to(preloader, { duration: 0, opacity: 0, ease: 'none' })
          .to(image, { duration: 0.5, y: '-100%', ease: 'expo.in' })
          .to(
            loadingBlock,
            { duration: 0.5, scaleY: 2, ease: 'expo.in' },
            '-=.5'
          )
          .to(
            loadingBlock,
            { duration: 1, y: '-100%', ease: 'expo.in' },
            '-=.5'
          )
          .to(
            revealBlockOne,
            { duration: 1, y: '-100%', ease: 'expo.in' },
            '-=.7'
          )
          .to(
            revealBlockTwo,
            { duration: 1, scale: 65, autoAlpha: 0, ease: 'expo.inOut' },
            '-=.1'
          );
      });
    </script>
  <!-- PRINT COUNT OF "home-banner-slider" SLIDES -->

  <!-- init tsparticles -->

@endpush