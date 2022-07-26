@extends('front.layouts.main')

@section('title', trans('main.404_not_found'))
@push('header-scripts')
        <link rel="stylesheet" href="{{URL::asset('front/css/home-page.min.css')}}">
@endpush
@section('content')
<section class="contact-page py-5">
    <div class="container text-center">
        <div class="row">
            <h3 class="m-5">{{__('main.page_404')}}</h3>
            <div class="col-12">
                <img class="w-100" src="{{URL::asset('front/images/placeholder.png')}}" alt="placeholder">
            </div>
        </div>
    </div> <!-- ./ container -->
</section> <!-- ./ contact-page -->
@endsection