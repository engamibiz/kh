@if($single_unit->video || $single_unit->images ||$single_unit->amenities || ($single_unit->latitude && $single_unit->longitude)|| count($single_unit->floor_plans))

<div class="page-sections">
    <div class="accordion" id="product-acc">
    @if($single_unit->video)
        <div class="card">
            <div class="card-header">
                <h5 class="text-capitalize" data-toggle="collapse" aria-expanded="true" data-target="#video">
                    {{__('inventory::inventory.video')}}
                    <svg width="20" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </h5>
            </div>
            <div id="video" class="collapse panel-collapse show" data-parent="#product-acc">
                <div class="card-body">
                    <div class="media-holder">
                        {!!$single_unit->video!!}
                    </div>
                </div>
            </div>
        </div>
        @endif
        @if(count($single_unit->floor_plans))
        <div class="card">
            <div class="card-header">
                <h5 class="text-capitalize" data-toggle="collapse" aria-expanded="false" data-target="#floor-Plans">
                    {{__('inventory::inventory.floor_plans')}}
                    <svg width="20" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </h5>
            </div>
            <div id="floor-Plans" class="collapse panel-collapse" data-parent="#product-acc">
                <div class="card-body">
                    <div class="swiper master-slider">
                        <div class="swiper-wrapper">
                        @foreach($single_unit->floor_plans as $floor_plan)
                            <div class="swiper-slide">
                                <div class="img">
                                    <a href="{{file_exists(public_path('/storage/dimensions/uploads/'.$floor_plan->file_name_without_extension.'_720x300'.'.'.$floor_plan->extension)) ? asset('storage/dimensions/uploads/'.$floor_plan->file_name_without_extension.'_720x300'.'.'.$floor_plan->extension) : $floor_plan->url}}" class="popup-link">
                                        <img src="{{file_exists(public_path('/storage/dimensions/uploads/'.$floor_plan->file_name_without_extension.'_720x300'.'.'.$floor_plan->extension)) ? asset('storage/dimensions/uploads/'.$floor_plan->file_name_without_extension.'_720x300'.'.'.$floor_plan->extension) : $floor_plan->url}}" alt="{{$floor_plan->file_name}}">
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
        </div>
        @endif
        @if(count($single_unit->master_plans))
        <div class="card">
            <div class="card-header">
                <h5 class="text-capitalize" data-toggle="collapse" aria-expanded="false" data-target="#master-Plans">
                    {{__('inventory::inventory.master_plans')}}
                    <svg width="20" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </h5>
            </div>
            <div id="master-Plans" class="collapse panel-collapse" data-parent="#product-acc">
                <div class="card-body">
                    <div class="swiper master-slider">
                        <div class="swiper-wrapper">
                        @foreach($single_unit->master_plans as $master_plan)
                            <div class="swiper-slide">
                                <div class="img">
                                    <a href="{{file_exists(public_path('/storage/dimensions/uploads/'.$master_plan->file_name_without_extension.'_720x300'.'.'.$master_plan->extension)) ? asset('storage/dimensions/uploads/'.$master_plan->file_name_without_extension.'_720x300'.'.'.$master_plan->extension) : $master_plan->url}}" class="popup-link">
                                        <img src="{{file_exists(public_path('/storage/dimensions/uploads/'.$master_plan->file_name_without_extension.'_720x300'.'.'.$master_plan->extension)) ? asset('storage/dimensions/uploads/'.$master_plan->file_name_without_extension.'_720x300'.'.'.$master_plan->extension) : $master_plan->url}}" alt="{{$master_plan->file_name}}">
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
        </div>
        @endif
        @if(($single_unit->latitude && $single_unit->longitude))
        <div class="card">
            <div class="card-header">
                <h5 class="text-capitalize" data-toggle="collapse" aria-expanded="false" data-target="#map-loc">
                    {{__('main.map')}}
                    <svg width="20" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </h5>
            </div>
            <div id="map-loc" class="collapse panel-collapse" data-parent="#product-acc">
                <div class="card-body">
                    <div class="media-holder">
                        <div id='map'></div>
                    </div>
                </div>
            </div>
        </div>
        @endif
        @if($single_unit->images)
        <div class="card">
            <div class="card-header">
                <h5 class="text-capitalize" data-toggle="collapse" aria-expanded="false" data-target="#panorama">
                    360&#176;
                    <svg width="20" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </h5>
            </div>
            <div id="panorama" class="collapse panel-collapse" data-parent="#product-acc">
                <div class="card-body">
                    <div class="media-holder">
                        @foreach($single_unit->images as $image)
                        <iframe src="{{$image->link}}" scrolling="no" frameborder="0" allowfullscreen="allowfullscreen"></iframe>
                        @endforeach                    
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>


@endif
