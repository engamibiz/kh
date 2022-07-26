<div class="search-box">
    <form action=" {{ isset($url) ? $url : route('front.properties') }}" class="search-form" method="GET">

        <div class="search-fields-holder">
            <div class="search-fields">
                <div class="form-group mb-0">
                    <label class="select-label">{{ __('main.type_to_find') }}</label>
                    <input type="text" name="q" class="form-control" value="{{request()->input('q')}}" placeholder="find  villa, duplex .....">
                </div>
                <div class="form-group mb-0">
                    <label class="select-label">{{ __('main.location') }}</label>
                    <select class="selectpicker" data-dropdown-align-right="true" data-width="100%" name="region_id[]"
                        multiple>
                        @foreach ($regions as $region)
                            <option value="{{ $region->id }}" @if (request('region_id') && in_array($region->id, request('region_id'))) selected @endif>
                                {{ $region->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group mb-0">
                    <label class="select-label">{{__('main.purpose')}}</label>
                    <select class="selectpicker" data-dropdown-align-right="true" data-width="100%" name="purpose_ids[]" multiple>
                        @foreach ($purposes as $purpose)
                            <option value="{{ $purpose->id }}" @if (request('purpose_ids') && in_array($purpose->id, request('purpose_ids'))) selected @endif>
                                {{ $purpose->purpose }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group mb-0">
                    <label class="select-label">{{__('main.area')}} <small>(m<sup>2</sup>)</small></label>
                    <select class="selectpicker" data-dropdown-align-right="true" data-width="100%" name="area">
                        <option></option>
                            @foreach ($unit_prices_list['units'] as $unit_price)
                                @if (!is_null($unit_price->price))
                                <option data-content="{{ $unit_price->area }} <small>m<sup>2</sup></small>">{{ $unit_price->area }} <small>m<sup>2</sup></small>
                                </option>
                                @endif
                            @endforeach
                    </select>
                </div>
            </div>

            <div class="collapse" id="advanceSearch">
                <div class="search-fields">
                    <div class="form-group mb-0">
                        <label class="select-label">{{ __('main.min_price') }}</label>
                        <select class="selectpicker" data-dropdown-align-right="true" data-width="100%" name="price_from">
                            <option></option>
                            @foreach ($unit_prices_list['units'] as $unit_price)
                                @if (!is_null($unit_price->price))
                                    <option value="{{ $unit_price->price }}">{{ $unit_price->price }} EGP</option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group mb-0">
                        <label class="select-label">{{ __('main.max_price') }}</label>
                        <select class="selectpicker" data-dropdown-align-right="true" data-width="100%" name="price_to">
                            <option></option>
                            @foreach ($unit_prices_list['units'] as $unit_price)
                                @if (!is_null($unit_price->price))
                                    <option value="{{ $unit_price->price }}">{{ $unit_price->price }} EGP</option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group mb-0">
                        <label class="select-label">{{ __('inventory::inventory.bedrooms') }}</label>
                        <select class="selectpicker" data-dropdown-align-right="true" data-width="100%"
                            name="bedrooms[]" multiple>
                            @foreach ($bedrooms as $bedroom)
                                <option value="{{ $bedroom->id }}" @if (request('bedrooms') && in_array($bedroom->id, request('bedrooms'))) selected @endif>
                                    {{ $bedroom->bedroom }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group mb-0">
                        <label class="select-label">{{ __('inventory::inventory.bathrooms') }}</label>
                        <select class="selectpicker" data-dropdown-align-right="true" data-width="100%"
                            name="bathrooms[]" multiple>
                            @foreach ($bathrooms as $bathroom)
                                <option value="{{ $bathroom->id }}" @if (request('bathrooms') && in_array($bathroom->id, request('bathrooms'))) selected @endif>
                                    {{ $bathroom->bathroom }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group mb-0">
                        <label class="select-label">Offering Type</label>
                        <select class="selectpicker" data-dropdown-align-right="true" data-width="100%"
                            name="offering_types[]" multiple>
                            @foreach ($offering_types as $offering_type)
                                @if ($offering_type->is_searchable)
                                    <option>{{ $offering_type->offering_type }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group mb-0">
                        <label class="select-label">{{ __('main.finishing_type') }}</label>
                        <select class="selectpicker" data-dropdown-align-right="true" data-width="100%"
                            name="finishing_types[]" multiple>
                            @foreach ($finishing_types as $finishing_type)
                                <option value="{{ $finishing_type->id }}"
                                    @if (request('finishing_types') && in_array($finishing_type->id, request('finishing_types'))) selected @endif>
                                    {{ $finishing_type->finishing_type }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="collapse" id="moreOptions">
                    <div class="search-fields more-options-holder p-3">
                        @foreach ($facilities as $facility)
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" name="facilities" class="custom-control-input" value="{{ $facility->id }}"
                                    id="feat-{{ $facility->id }}">
                                <label class="custom-control-label" for="feat-{{ $facility->id }}"
                                    @if (request('facilities') && in_array($facility->id, request('facilities'))) selected @endif>{{ $facility->facility }}</label>
                            </div>
                        @endforeach
                        @foreach ($amenities as $amenity)
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" name="amenities" class="custom-control-input" value="{{ $amenity->id }}"
                                    id="feat-{{ $amenity->id }}">
                                <label class="custom-control-label" for="feat-{{ $amenity->id }}"
                                    @if (request('facilities') && in_array($amenity->id, request('facilities'))) selected @endif>{{ $amenity->amenity }}</label>
                            </div>
                        @endforeach
                    </div>
                </div>

                <button type="button" data-toggle="collapse" data-target="#moreOptions" aria-expanded="false"
                    class="form-btn more-options-btn">
                </button>

            </div>
        </div>

        <div class="search-btns-holder">
            <button type="button" class="form-btn advance-search-btn" data-toggle="collapse"
                data-target="#advanceSearch" aria-expanded="false">
                <span class="text d-md-none">{{ __('main.advanced_search') }}</span>
                <span class="advance-search-arrow">
                    <span>{{ __('main.advanced_search') }}</span>
                    <svg width="37" viewBox="0 0 37 32">
                        <g fill="none">
                            <g stroke="currentColor">
                                <path d="M31 1C31 21 20.8 31 0.5 31"></path>
                                <path d="M25 8C25 8 26.9 5.7 30.8 1L36 8"></path>
                            </g>
                        </g>
                    </svg>
                </span>
            </button>

            <button type="submit" class="form-btn submit-btn">{{ __('main.search') }}</button>

        </div>

    </form>
</div>



@push('scripts')
    <script>
    </script>
@endpush
