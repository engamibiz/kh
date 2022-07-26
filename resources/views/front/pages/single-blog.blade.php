@extends('front.layouts.main')

@section('page_name')
    {{ $blog->meta_title }}
@endsection
@php
$page_name = '';
@endphp
@push('meta')
    <meta name="title" content="{{ $blog->meta_title }}" />
    <meta name="description" content="{{ strip_tags(substr($blog->meta_description, 0, 150)) }}" />
    <!-- Schema.org markup for Google+ -->
    <meta itemprop="name" content="{{ $blog->meta_title }}" />
    <meta itemprop="image" content="{{ URL::asset('/front/images/logo.png') }}">
    <meta itemprop="description" content="{{ strip_tags(substr($blog->meta_description, 0, 150)) }}" />
    <!-- Twitter Card data -->
    <meta name='twitter:app:country' content='EG' />
    <meta name="twitter:site" content="@KHRealEstate" />
    <meta name="twitter:creator" content="@KHRealEstate" />
    <meta name="twitter:title" content="{{ $blog->meta_title }}">
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:image" content="{{ URL::asset('/front/images/logo.png') }}">
    <meta name="twitter:description" content="{{ strip_tags(substr($blog->meta_description, 0, 150)) }}" />
    <!-- Open Graph data -->
    <meta property="og:type" content="article" />
    <meta property="og:site_name" content="Constguide">
    <meta property="og:url" content="{{ Request::url() }}" />
    <meta property="og:title" content="{{ $blog->meta_title }}" />
    <meta property="og:image" content="{{ URL::asset('/front/images/logo.png') }}">
    <meta property="og:description" content="{{ strip_tags(substr($blog->meta_description, 0, 150)) }}" />
@endpush
@push('header-scripts')
@endpush
@section('content')
    @include('front.partials.blogs.single-blog')
@endsection
