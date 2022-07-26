<div class="row">
    @if (count($discover['areas']))
        <div class="col-md-4 mb-3">
            <h3 class="footer-title">{{ __('main.areas') }}</h3>
            <ul class="footer-widget">
                @foreach ($discover['areas'] as $area)
                    <li>
                        <a
                            href="{{ route('front.areas.show', ['id' => $area->id,'slug' => str_slug($area->default_value),'type' => 'project']) }}">{{ $area->second_title ? $area->second_title : $area->default_second_title }}
                            <span>({{ $area->projects_count }} {{ __('main.projects') }})</span></a>
                    </li>
                @endforeach

                <li>
                    <a class="more-link" href="{{ route('front.projects') }}"
                        data-text="{{ __('main.more') }}">{{ __('main.more') }}</a>
                </li>
            </ul>
        </div>
    @endif
    @if (count($discover['developers']))

        <div class="col-md-4 mb-3">
            <h3 class="footer-title">{{ __('main.developers') }}</h3>
            <ul class="footer-widget">
                @foreach ($discover['developers'] as $developer)
                    <li>
                        <a
                            href="{{ route('front.developers.show', ['id' => $developer->id, 'slug' => str_slug($developer->default_value)]) }}">{{ $developer->value ? $developer->value : $developer->default_value }}
                            <span>({{ $developer->projects_count }} {{ __('main.projects') }})</span></a>
                    </li>
                @endforeach
                <li>
                    <a class="more-link" href="{{ route('front.developers') }}">{{ __('main.more') }}</a>
                </li>
            </ul>
        </div>

    @endif
    @if (count($discover['projects']))
        <div class="col-md-4 mb-3">
            <h3 class="footer-title">{{ __('main.compound') }}</h3>
            <ul class="footer-widget">
                @foreach ($discover['projects'] as $project)
                    <li>
                        <a
                            href="{{ route('front.project.properties', ['project_id' => $project->id, 'title' => $project->slug]) }}">{{ $project->second_title ? $project->second_title : $project->default_second_title }}
                            <span>({{ $project->units_count }} {{ __('main.properties') }})</span></a>
                    </li>
                @endforeach
                <li><a class="more-link" href="{{ route('front.properties') }}"
                        data-text="{{ __('main.more') }}">{{ __('main.more') }}</a></li>
            </ul>
        </div>
    @endif
    {{-- <div class="col-md-3 mb-3">
        <h3 class="footer-title">Hot properties</h3>
        <ul class="footer-widget">
            <li><a href="#">Sarai Croons - Studio for sale</a></li>
            <li><a href="#">La Vista Bay - Chalet Typical for sale</a></li>
            <li><a href="#">La Vista Ras El Hikma - Twinhouse - Not sea view for sale</a></li>
            <li><a href="#">Shalya Taj City - Apartment Garden for sale</a></li>
            <li><a href="#">La Vista Ras El Hikma - Twinhouse - Not sea view for sale</a></li>
            <li><a href="#">Shalya Taj City - Apartment Garden for sale</a></li>
            <li><a href="#">La Vista Bay - Chalet Typical for sale</a></li>
            <li><a href="#">La Vista Ras El Hikma - Twinhouse - Not sea view for sale</a></li>
            <li><a href="#">Shalya Taj City - Apartment Garden for sale</a></li>
            <li><a href="#">Hacienda Bay - Water Villa for sale</a></li>
            <li><a class="more-link" href="#">More</a></li>
        </ul>
    </div> --}}
</div>
