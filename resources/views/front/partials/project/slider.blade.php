<div class="view-item-slider">
    @if ($single_project->developer)
        <div class="dev-logo">
            @forelse($single_project->developer->attachments as $attachment)
                @if ($loop->index == 0)
                    <img src="{{ file_exists(public_path('/storage/dimensions/uploads/' .$attachment->file_name_without_extension .'_125x125' .'.' .$attachment->extension))? asset('storage/dimensions/uploads/' .$attachment->file_name_without_extension .'_125x125' .'.' .$attachment->extension): $attachment->url }}"
                        alt="{{ $attachment->file_name }}">
                @else
                @break
            @endif
        @empty
            <img src="{{ URL::asset('front/images/placeholder.png') }}"
                alt="{{ $single_project->developer->developer_name }}">
        @endforelse
    </div>
@endif
<div class="row">
    <div class="col-md-9">
        <div class="swiper gallery-large">
            <div class="swiper-wrapper gallery-holder">
                @if (count($single_project->attachments))
                    @foreach ($single_project->attachments as $attachment)
                        <div class="swiper-slide">
                            <meta itemprop="image" content="{{ $attachment->url }}" />
                            <a href="{{ $attachment->url }}" class="mgf-link">
                                <img src="{{ $attachment->url }}" alt="Unit Image" />
                            </a>
                        </div>
                    @endforeach
                @else
                    <div class="swiper-slide">
                        <meta itemprop="image" content="{{ asset('front/images/placeholder.png') }}" />
                        <a href="{{ $attachment->url }}" class="mgf-link">
                            <img src="{{ asset('front/images/placeholder.png') }}" alt="Product No Image"
                                itemprop="image">
                        </a>
                    </div>
                @endif
            </div>
            <div class="swiper-button-next gall-unit-next-btn"></div>
            <div class="swiper-button-prev gall-unit-prev-btn"></div>
            <!-- /.gall-unit-next-btn -->
        </div>
    </div>
    <div class="col-md-3">
        @if (count($single_project->attachments))
            <div class="swiper gallery-thumbs">
                <div class="swiper-wrapper">
                    @foreach ($single_project->attachments as $attachment)
                        <div class="swiper-slide">
                            <div class="thumb">
                                <img src="{{ $attachment->url }}" alt="{{ $attachment->alt }}"
                                    itemprop="image">
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

    </div>
</div>
</div>
