@php
if(Route::currentRouteName() == "front.project.properties"){
$filter_url=route('front.project.properties',['project_id'=>request('project_id'),'title'=>request('title')]);
}else{
$filter_url=route('front.properties');
}
@endphp

@section('page_name', trans('main.properties'))
  <!-- START BREADCRUMB -->
  <nav aria-label="breadcrumb">
    <div class="container-fluid">
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <li class="breadcrumb-item"><a href="{{route('front.home')}}">{{__('main.home_title')}}</a></li>
        </li>
        <li class="breadcrumb-item active" aria-current="page">{{__('main.properties')}}</li>
      </ol>
    </div>
  </nav>
  <!-- END BREADCRUMB -->
  
  <!-- START PAGE WRAPPER -->
  <main class="main-content">

    <!-- START index-page  -->
    <section class="index-page pb-5">
      <div class="container-fluid">
        @include('front.components.search-box',['url' => $filter_url])

        <div class="grid-container mt-5 pt-3">
          @foreach($properties as $property)
            @include('front.components.unit',['unit' => $property])
          @endforeach
        </div>

        @if($properties->hasPages())
          {{$properties->appends(request()->input())->links('front.partials.primary.pagination')}}
        @endif

        @if(count($properties))
          <div class="location-map padding-block">
            <div class="section-title">
              {{-- <h2 class="title">map view</h2> --}}
            </div>
            <div class="map-canvas" itemscope itemtype="https://schema.org/GeoCoordinates">
              <div id="map" itemprop="geo"></div>
            </div>
          </div>
        @endif
      </div>
    </section>
    <!-- END index-page  -->

  </main>


@push('scripts')
<script src="https://maps.googleapis.com/maps/api/js?key={{ env('MAP_KEY') }}&callback=initMap&&libraries=places" defer></script>


<script>
  function initMap() {
    // Map options
    const options = {
      zoom: 8,
      center: {
        lat: 30.0444,
        lng: 31.2357
      }
    }

    // New map
    const map = new google.maps.Map(document.getElementById('map'), options);

    // Array of markers
    const markers = Array();
    @foreach($properties as $property)
    @if($property -> latitude && $property -> longitude)
    markers.push({
      coords: {
        lat: @json($property -> latitude),
        lng: @json($property -> longitude)
      },
      iconImage: "{{URL::asset('front/images/marker-icon.png')}}",
      content: `@include('front.components.unit',['unit' => $property])`,
      url: "{{route('front.singleUnit', ['id' => $property->id,'title' => str_slug($property->default_title)])}}"
    });
    @endif

    @endforeach
    // Loop through markers
    markers.forEach((marker) => {
      addMarker(marker);
    })

    // Add Marker Function
    function addMarker(props) {
      const marker = new google.maps.Marker({
        position: props.coords,
        map: map,
        icon: props.iconImage,
        label: props.label,
        url:props.url
      });

      // Check for customicon
      if (props.iconImage) {
        // Set icon image
        marker.setIcon(props.iconImage);
      }

      // Check content
      if (props.content) {
        var infoWindow = new google.maps.InfoWindow({
          content: props.content
        });

        marker.addListener('click', function() {
          infoWindow.open(map, marker);
        });
        marker.addListener('mouseover', function() {
          infoWindow.open(map, marker);
        });
        marker.addListener('mouseout', function() {
          infoWindow.close();
        });
        marker.addListener('click', function() {
          location = props.url;
        });
      }
    }
  }
</script>
@endpush