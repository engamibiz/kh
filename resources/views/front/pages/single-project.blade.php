@extends('front.layouts.main')

@section('page_name')
{{$single_project->meta_title ? $single_project->meta_title : $single_project->project}}
@endsection
@php
       $page_name ='';
      @endphp
@push('header-scripts')
@endpush
@push('meta')
<meta name="title" content="{{$single_project->meta_title ? $single_project->meta_title : $single_project->project}}" />
<meta name="description" content="{{ strip_tags($single_project->meta_description ? $single_project->meta_description : substr($single_project->description, 0, 150)) }}" />
<!-- Schema.org markup for Google+ -->
<meta itemprop="name" content="{{$single_project->meta_title ? $single_project->meta_title : $single_project->project}}" />
<meta itemprop="image" content="{{ URL::asset('/front/images/logo.png') }}">
<meta itemprop="description" content="{{ strip_tags($single_project->meta_description ? $single_project->meta_description : substr($single_project->description, 0, 150)) }}" />
<!-- Twitter Card data -->
<meta name='twitter:app:country' content='EG' />
<meta name="twitter:site" content="@KHRealEstate" />
<meta name="twitter:creator" content="@KHRealEstate" />
<meta name="twitter:title" content="{{$single_project->meta_title ? $single_project->meta_title : $single_project->project}}">
<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:image" content="{{ URL::asset('/front/images/logo.png') }}">
<meta name="twitter:description" content="{{ strip_tags($single_project->meta_description ? $single_project->meta_description : substr($single_project->description, 0, 150)) }}" />
<!-- Open Graph data -->
<meta property="og:type" content="article" />
<meta property="og:site_name" content="Constguide">
<meta property="og:url" content="{{Request::url()}}" />
<meta property="og:title" content="{{$single_project->meta_title ? $single_project->meta_title : $single_project->project}}" />
<meta property="og:image" content="{{ URL::asset('/front/images/logo.png') }}">
<meta property="og:description" content="{{ strip_tags($single_project->meta_description ? $single_project->meta_description : substr($single_project->description, 0, 150)) }}" />
@endpush

@section('content')
  <!-- START BREADCRUMB -->
  <nav aria-label="breadcrumb">
    <div class="container-fluid">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('front.home')}}">{{__('main.home_title')}}</a></li>
        <li class="breadcrumb-item"><a href="{{route('front.projects')}}">{{__('main.projects')}}</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{$single_project->project}}</li>

      </ol>
    </div>
  </nav>
  <!-- END BREADCRUMB -->

  <!-- START PAGE WRAPPER -->
  <main class="main-content">

    <!-- START view-page  -->
    <section class="view-page pb-5" itemscope itemtype="http://schema.org/Product">
      <div class="view-top-holder">

        <div class="sticky-holder">
          <div class="container-fluid">
            <div class="row align-items-center justify-content-between">
              <div class="col-md-6">
                <div class="page-title">
                  <h1 itemprop="name">{{$single_project->project}}</h1>
                </div>
              </div>
              <div class="col-md-6 text-md-right mt-2 mt-md-0">
                <div class="item-price">
                  <p>
                    <span class="label">{{__('main.starting_price')}}:</span>
                    <strong>{{$single_project->price_from}}</strong>
                    <small>{{$single_project->currency_code ? $single_project->currency_code : 'EGP'}}</small>
                  </p>
                </div>

              </div>

            </div>

            <div class="row align-items-center justify-content-between mt-2">
              @if ($single_project->country || $single_project->region || $single_project->city || $single_project->area)
              <div class="col-md-6">
                <address class="item-address m-0" itemscope itemtype="https://schema.org/Place">
                  <i class="fas fa-map-marker-alt"></i>
                  <span itemprop="name">
                    <?php $locations_array = []; ?>
                    @if ($single_project->country)
                        <?php array_push($locations_array, $single_project->country->name); ?>
                    @endif
                    @if ($single_project->region)
                        <?php array_push($locations_array, $single_project->region->name); ?>
                    @endif
                    @if ($single_project->city)
                        <?php array_push($locations_array, $single_project->city->name); ?>
                    @endif
                    @if ($single_project->area)
                        <?php array_push($locations_array, $single_project->area->name); ?>
                    @endif
                    @if (count($locations_array))
                        {{ implode(', ', $locations_array) }}
                    @endif
                  </span>
                </address>
              </div>
          @endif


              <div class="col-md-6 mt-2 mt-md-0">
                <nav class="item-share">
                  <ul class="justify-content-md-end">
                    <li>
                      <svg viewBox="0 0 24 24" width="20">
                        <path fill="none" d="M0 0h24v24H0z" />
                        <path fill="var(--blue-clr-400)"
                          d="M13.576 17.271l-5.11-2.787a3.5 3.5 0 1 1 0-4.968l5.11-2.787a3.5 3.5 0 1 1 .958 1.755l-5.11 2.787a3.514 3.514 0 0 1 0 1.458l5.11 2.787a3.5 3.5 0 1 1-.958 1.755z" />
                      </svg>
                      <span>:</span>
                    </li>
                    <li>
                      <a href="https://www.facebook.com/sharer/sharer.php?u={{ route('front.singleProject', ['id' => $single_project->id,'slug' => str_slug($single_project->default_value)]) }}" title="Facebook">
                        <i class="fab fa-facebook-f"></i>
                      </a>
                    </li>
                    <li>
                      <a href="https://twitter.com/intent/tweet?text={{ route('front.singleProject', ['id' => $single_project->id,'slug' => str_slug($single_project->default_value)]) }}" title="Twitter">
                        <i class="fab fa-twitter"></i>
                      </a>
                    </li>
                    {{-- <li>
                      <a href="#" title="Instagram">
                        <i class="fab fa-instagram"></i>
                      </a>
                    </li> --}}
                    <li>
                      <a href="https://www.linkedin.com/shareArticle/?mini=true&url={{ route('front.singleProject', ['id' => $single_project->id,'slug' => str_slug($single_project->default_value)]) }}" title="Linkedin">
                        <i class="fab fa-linkedin-in"></i>
                      </a>
                    </li>
                    <li>
                      <a href="http://pinterest.com/pin/create/button/?url={{ route('front.singleProject', ['id' => $single_project->id,'slug' => str_slug($single_project->default_value)]) }}" title="Pinterest">
                        <i class="fab fa-pinterest-p"></i>
                      </a>
                    </li>
                  </ul>
                </nav>
              </div>
            </div>

          </div>
        </div>

        <div class="container-fluid">

          @include('front.partials.project.slider')

          @if ($single_project->amenities || $single_project->facilities)
          <ul class="item-overview-data">
            @foreach ($single_project->amenities as $amenity)
              <li>
                @if(count($amenity->attachments))
                @foreach($amenity->attachments as $attachment)
                  @if ($loop->index == 0)
                      <img width="25" src="{{ $attachment->url }}"
                          alt="{{ $attachment->file_name }}">
                  @else
                    @break
                  @endif
                @endforeach
                @else
                  {!! $amenity->svg !!}
                @endif
                <span>{{ $amenity->amenity }}</span>
              </li>
            @endforeach
            @foreach ($single_project->facilities as $facility)
              <li>
                @if(count($facility->attachments))
                  @foreach($facility->attachments as $attachment)
                  @if ($loop->index == 0)
                      <img width="25" src="{{ $attachment->url }}"
                          alt="{{ $attachment->file_name }}">
                  @else
                    @break
                  @endif
              @endforeach
                @else
                  {!! $facility->svg !!}
                @endif
                <span>{{ $facility->facility }}</span>
              </li>
            @endforeach            
          </ul>
          @endif

        </div>
      </div>
      @include('front.partials.project.project-details')

    </section>
    <!-- END view-page  -->

  </main>
  <!-- END PAGE WRAPPER -->

@endsection

@php
  $images = [];
  if($single_project->attachments){

    foreach($single_project->attachments as $attch){
      array_push($images,$attch->url);
    }
  }
@endphp
@push('scripts')
<script>
  // INIT MAGNIFIC PLUGIN
  $(document).ready(function () {

    $('.gallery-holder').each(function () {
      $(this).magnificPopup({
        delegate: 'a.mgf-link',
        type: 'image',
        midClick: true,
        gallery: {
          enabled: true
        },
        zoom: {
          enabled: true,
          duration: 300,
          opener: function (element) {
            return element.find('img');
          }
        }
      });
    });
  });
</script>
<script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "Product",
    "name": "{{$single_project->project}}",
    "image": @json($images),
    "description": "{{$single_project->meta_description}}",
    "sku": "{{$single_project->id}}",
    "mpn": "{{$single_project->id}}",
    "brand": { "@type": "Brand", "name": "{{$single_project->developer ? $single_project->developer->developer : 'KH Real Estate'}}" },
    "review": {
      "@type": "Review",
      "reviewRating": {
        "@type": "Rating",
        "ratingValue": "4",
        "bestRating": "5"
      },
      "author": { "@type": "Organization", "name": "KH Real Estate" }
    },
    "aggregateRating": {
      "@type": "AggregateRating",
      "ratingValue": "4.4",
      "reviewCount": "89"
    },
    "offers": {
      "@type": "Offer",
      "url": "{{Request::fullUrl()}}",
      "priceCurrency": "EGP",
      "price": "{{$single_project->price_from_for_schema}}",
      "priceValidUntil": "{{$single_project->delivery_date_for_schema}}",
      "itemCondition": "https://schema.org/UsedCondition",
      "availability": "https://schema.org/InStock"
    }
  }
</script>
@endpush