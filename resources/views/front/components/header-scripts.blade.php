<!-- scripts -->

<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="author" content="KH Real Estate">
<meta name="publisher" content="KH Real Estate">
<meta name="yandex-verification" content="" />
<meta name="google-site-verification" content="" />
<link rel="canonical" href="{{ Request::fullUrl() }}">
<link rel="icon" type="image/x-icon" href="{{asset('front/favicon.ico')}}">

@stack('meta')

<title>@yield('page_name')</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

@if(App::getLocale() == 'en')
    <link rel="stylesheet" href="{{ URL::asset('front/css/bootstrap.min.css')}}?ver={{ env('FILES_VER') }}">
@else
    <link rel="stylesheet" href="{{ URL::asset('front/css/bootstrap-rtl.min.css')}}?ver={{ env('FILES_VER') }}">
@endif

<link rel="stylesheet" href="{{ URL::asset('front/css/index.css')}}?ver={{ env('FILES_VER') }}">
<link rel="stylesheet" href="{{ URL::asset('front/css/addition.css') }}?ver={{ env('FILES_VER') }}">
@if ($setting->pixel_code)
    {!! $setting->pixel_code !!}
@endif

@if ($setting->tags_manager)
    {!! $setting->tags_manager !!}
@endif
<!-- CSS Style -->
@stack('header-scripts')
{{-- <script src="https://www.google.com/recaptcha/api.js" async defer></script> --}}
