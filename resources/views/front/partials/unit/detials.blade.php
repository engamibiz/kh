<div class="view-bottom-holder">
    <div class="container-fluid">

        <div class="item-tabs-holder">
            <ul class="nav nav-tabs">
                @if ($single_unit->description)
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#tab-1">{{ __('main.description') }}</a>
                    </li>
                @endif
                @if ($single_unit->price || $single_unit->area || $single_unit->bedroom || $single_unit->bathroom || $single_unit->offering_type || $single_unit->payment_method || $single_unit->furnishing_status || $single_unit->finishing_type || $single_unit->country || $single_unit->region || $single_unit->city || $single_unit->area_place)
                    <li class="nav-item">
                        <a class="nav-link @if(!$single_unit->description) active @endif" data-toggle="tab" href="#tab-2">{{ __('main.details') }}</a>
                    </li>
                @endif
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#tab-3">{{ __('main.features') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab"
                        href="#tab-4">{{ __('inventory::inventory.floor_plans') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab"
                        href="#tab-5">{{ __('inventory::inventory.video') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#tab-6">360&#176;</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#tab-7">{{ __('main.map') }}</a>
                </li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane fade show active" id="tab-1">
                    <div class="tab-block item-desc">
                        <h3 class="block-title">{{ __('main.description') }}</h3>
                        <p itemprop="description">
                            {!! $single_unit->description !!}
                        </p>
                    </div>
                </div>

                <div class="tab-pane fade" id="tab-2">
                    <div class="tab-block unit-details">
                        <h3 class="block-title">{{ __('main.details') }}</h3>
                        <div class="row">

                            <div class="col-md-6">
                                <div class="item" itemscope itemtype="https://schema.org/Offer">
                                    <strong>{{ __('main.price') }}:</strong>
                                    <span itemprop="price">
                                        {{ $single_unit->price }}
                                        <small itemprop="priceCurrency"
                                            content="EGP">{{ $single_unit->currency_code ?? 'EGP' }}</small>
                                    </span>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="item">
                                    <strong>{{ __('main.area') }}:</strong>
                                    <bdi>
                                        <span>{{ $single_unit->area }}
                                            {{ $single_unit->area_unit }}</span>
                                    </bdi>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="item">
                                    <strong>{{ __('inventory::inventory.bedrooms') }}:</strong>
                                    <span>{{ $single_unit->bedroom }}</span>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="item">
                                    <strong>{{ __('inventory::inventory.bathrooms') }}:</strong>
                                    <span>{{ $single_unit->bathroom }}</span>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="item">
                                    <strong>{{ __('inventory::inventory.offering_type') }}:</strong>
                                    <span>{{ $single_unit->offering_type }}</span>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="item">
                                    <strong>{{ __('inventory::inventory.payment_method') }}: </strong>
                                    <span>{{ $single_unit->payment_method }}</span>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="item">
                                    <strong>{{ __('inventory::inventory.furnishing_status') }}: </strong>
                                    <span>{{ $single_unit->furnishing_status }}</span>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="item">
                                    <strong>{{ __('inventory::inventory.finishing_type') }}: </strong>
                                    <span>{{ $single_unit->finishing_type }}</span>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="item">
                                    <strong>{{ __('main.location') }}:</strong>
                                    <span>
                                        <span itemprop="{{ $single_unit->title }}">
                                            <?php $locations_array = []; ?>
                                            @if ($single_unit->country)
                                                <?php array_push($locations_array, $single_unit->country->name); ?>
                                            @endif
                                            @if ($single_unit->region)
                                                <?php array_push($locations_array, $single_unit->region->name); ?>
                                            @endif
                                            @if ($single_unit->city)
                                                <?php array_push($locations_array, $single_unit->city->name); ?>
                                            @endif
                                            @if ($single_unit->area_place)
                                                <?php array_push($locations_array, $single_unit->area_place->name); ?>
                                            @endif
                                            @if (count($locations_array))
                                                {{ implode(', ', $locations_array) }}
                                            @endif

                                        </span>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                @if ($single_unit->amenities || $single_unit->facilities)
                    <div class="tab-pane fade" id="tab-3">
                        <div class="facilities tab-block">
                            <h3 class="block-title">{{ __('inventory::inventory.facilities') }}</h3>
                            <ul>
                                @foreach ($single_unit->amenities as $amenity)
                                    <li><i class="far fa-check-circle"></i> {{ $amenity->amenity }}</li>
                                @endforeach
                                @foreach ($single_unit->facilities as $facility)
                                    <li><i class="far fa-check-circle"></i> {{ $facility->facility }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif
                @if (count($single_unit->floor_plans))
                    <div class="tab-pane fade" id="tab-4">
                        <div class="floor-Plans tab-block">
                            <div class="swiper floor-slider">
                                <div class="swiper-wrapper gallery-holder">
                                    @foreach ($single_unit->floor_plans as $floor_plan)
                                        <div class="swiper-slide">
                                            <div class="item">
                                                <a href="{{ file_exists(public_path('/storage/dimensions/uploads/' .$floor_plan->file_name_without_extension .'_720x300' .'.' .$floor_plan->extension))? asset('storage/dimensions/uploads/' .$floor_plan->file_name_without_extension .'_720x300' .'.' .$floor_plan->extension): $floor_plan->url }}"
                                                    class="mgf-link">
                                                    <img src="{{ file_exists(public_path('/storage/dimensions/uploads/' .$floor_plan->file_name_without_extension .'_720x300' .'.' .$floor_plan->extension))? asset('storage/dimensions/uploads/' .$floor_plan->file_name_without_extension .'_720x300' .'.' .$floor_plan->extension): $floor_plan->url }}"
                                                        alt="{{ $floor_plan->file_name }}">
                                                </a>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                                <!-- /.swiper-wrapper -->
                                <div class="swiper-pagination"></div>
                            </div>
                        </div>
                    </div>
                @endif
                @if ($single_unit->video)
                    <div class="tab-pane fade" id="tab-5">
                        <div class="video tab-block">
                            <div class="embed-responsive embed-responsive-21by9">
                                {!! $single_unit->video !!}
                            </div>
                        </div>
                    </div>
                @endif
                @if ($single_unit->images)
                    <div class="tab-pane fade" id="tab-6">
                        <div class="panorama tab-block">
                            <div class="embed-responsive embed-responsive-21by9">
                                @foreach ($single_unit->images as $image)
                                    <iframe src="{{ $image->link }}" scrolling="no" frameborder="0"
                                        allowfullscreen="allowfullscreen"></iframe>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif
                <div class="tab-pane fade" id="tab-7">
                    <div class="map-loc tab-block">
                        <div class="embed-responsive embed-responsive-21by9" id='map'>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- /.tabs-holder -->
        @include('front.partials.unit.related')

    </div>
</div>

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
    <script src="https://maps.googleapis.com/maps/api/js?key={{ env('MAP_KEY') }}&callback=initMap&&libraries=places"
        defer></script>
    <script>
        //  GOOGLE MAPS API

        function initMap() {
            var latLng;
            @if ($single_unit->latitude && $single_unit->longitude)
                latLng = {
                lat: @json($single_unit->latitude),
                lng: @json($single_unit->longitude)
                }; // latitude and longitude
            @endif

            var map;

            var options = {
                zoom: 9,
                center: latLng,
                mapTypeId: 'roadmap', // hybrid , satellite , roadmap ,
            };

            map = new google.maps.Map(document.getElementById("map"), options);

            var marker = new google.maps.Marker({
                position: latLng,
                map: map,
                icon: 'http://maps.google.com/mapfiles/ms/icons/red-dot.png',
                animation: google.maps.Animation.BOUNCE,
                title: '{{ $single_unit->title }}'
            });


            var infoWindow = new google.maps.InfoWindow({
                content: '<p>{{ $single_unit->title }}</p>'
            })

            marker.addListener('click', function() {
                infoWindow.open(map, marker);
            });


            google.maps.event.addListener(marker, 'click', function() {
                var pos = map.getZoom();
                map.setZoom(12);
                map.setCenter(marker.getPosition());
                window.setTimeout(function() {
                    map.setZoom(pos);
                }, 3000);
            });

        }
    </script>
@endpush
