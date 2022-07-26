@extends('front.layouts.main')

@push('header-scripts')
@endpush

@php
$page_name = 'blogs';
@endphp

@foreach($seo as $seo_blog)
      @if($seo_blog->page == 'blogs')
            @include('front.components.meta',['meta' => $seo_blog])
      @break
      @endif
@endforeach
@section('content')

      @include('front.partials.blogs.blogs')
@endsection