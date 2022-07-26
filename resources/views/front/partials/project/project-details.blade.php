    <div class="view-bottom-holder">
        <div class="container-fluid">

            <div class="item-tabs-holder">
                <ul class="nav nav-tabs">
                    @if ($single_project->description)
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab"
                                href="#tab-1">{{ __('inventory::inventory.description') }}</a>
                        </li>
                    @endif
                    @if (count($single_project->unit_types))
                        <li class="nav-item">
                            <a class="nav-link @if (!$single_project->description) active @endif" data-toggle="tab"
                                href="#tab-2">{{ __('inventory::inventory.unit_types') }}</a>
                        </li>
                    @endif
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab"
                            href="#tab-5">{{ __('inventory::inventory.video') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#tab-7">{{ __('main.location') }}</a>
                    </li>
                </ul>

                <div class="tab-content">
                    @if ($single_project->description)
                        <div class="tab-pane fade show active" id="tab-1">
                            <div class="tab-block item-desc">

                                <div class="row">
                                    <div class="col-lg-12 col-md-12">
                                        <p itemprop="description">
                                            {!! $single_project->description !!}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if (count($single_project->unit_types))
                        <div class="tab-pane fade @if (!$single_project->description) show active @endif" id="tab-2">
                            <div class="tab-block unit-types">

                                <div id="types-acc">

                                    @foreach ($single_project->unit_types as $unit_type)
                                        <div class="block">
                                            <button class="type-title-btn" data-toggle="collapse"
                                                data-target="#type-{{ $unit_type->id }}">
                                                {{ $unit_type->unit_type }}
                                                <span class="prop-count">
                                                    (<strong>{{ count($unit_type->units) }}</strong>
                                                    {{ __('main.properties') }})
                                                </span>
                                            </button>
                                            <div id="type-{{ $unit_type->id }}" class="collapse"
                                                data-parent="#types-acc">
                                                <ul class="type-list">
                                                    <li>
                                                        {{ __('main.area') }}:
                                                        {{ __('main.from') }}
                                                        <strong>{{ $unit_type->area_from }} m<sup>2</sup></strong>
                                                        {{ __('main.to') }}
                                                        <strong>{{ $unit_type->area_to }} m<sup>2</sup></strong>
                                                    </li>
                                                    <li>
                                                        {{ __('main.price') }}:
                                                        {{ __('main.from') }}
                                                        <strong>{{ $unit_type->price_from }}
                                                            {{ $single_project->currency_code ?? 'EGP' }}</strong>
                                                        {{ __('main.to') }}
                                                        <strong>{{ $unit_type->price_to }}
                                                            {{ $single_project->currency_code ?? 'EGP' }}</strong>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('front.unit_type', ['id' => $unit_type->id, 'title' => $unit_type->unit_type]) }}"
                                                            class="site-btn">
                                                            {{ __('main.view_properties') }}
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                            </div>
                        </div>
                    @endif

                    @if ($single_project->video)
                        <div class="tab-pane fade @if (!$single_project->description && empty($single_project->unit_types)) show active @endif" id="tab-5">
                            <div class="video tab-block">
                                <div class="embed-responsive embed-responsive-21by9">
                                    {!! $single_project->video !!}

                                </div>
                            </div>
                        </div>
                    @endif

                    @if ($single_project->latitude && $single_project->longitude)
                        <div class="tab-pane fade @if (!$single_project->description && empty($single_project->unit_types) && $single_project->video) show active @endif" id="tab-7">
                            <div class="map-loc tab-block">
                                <div class="embed-responsive embed-responsive-21by9" id="map2">
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            <!-- /.tabs-holder -->

            <div class="mt-5">
                <div class="section-title">
                    <h2 class="title">{{ __('main.related_projects') }}</h2>
                </div>

                <div class="swiper units-slider">
                    <div class="swiper-wrapper">
                        @foreach ($related_projects as $project)
                            <div class="swiper-slide">
                                @include('front.components.project', [
                                    'project' => $project,
                                ])
                            </div>
                        @endforeach
                    </div>
                    <div class="swiper-button-next units-next-btn"></div>
                    <div class="swiper-button-prev units-prev-btn"></div>
                </div>
            </div>
        </div>
    </div>










    @push('scripts')
        <script src="https://maps.googleapis.com/maps/api/js?key={{ env('MAP_KEY') }}&callback=initMapProduct&&libraries=places"
                defer></script>
        <script>
            function initMapProduct() {
                var latLng = {
                    lat: {{ $single_project->latitude }},
                    lng: {{ $single_project->longitude }}
                }; // latitude and longitude

                var map;

                var options = {
                    zoom: 15,
                    center: latLng,
                    mapTypeId: 'roadmap', // hybrid , satellite , roadmap , 
                    // panControl: true,
                    // zoomControl: true,
                    // disableDefaultUI: true,
                    // mapTypeControl: true,
                    // scaleControl: true,
                    // streetViewControl: true,
                    // overviewMapControl: true,
                    // rotateControl: true,
                };

                map = new google.maps.Map(document.getElementById("map2"), options);

                var marker = new google.maps.Marker({
                    position: latLng,
                    map: map,
                    icon: `http://maps.google.com/mapfiles/ms/icons/red-dot.png`,
                    animation: google.maps.Animation.BOUNCE,
                    title: '{{ $single_project->project }}'
                });

                var infoWindow = new google.maps.InfoWindow({
                    content: '<p>{{ $single_project->project }}</p>'
                })

                var infoWindowAccordion = new google.maps.InfoWindow({
                    content: '<p>{{ $single_project->project }}</p>'
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
