<div class="view-item-slider">
    <div class="row">
        <div class="col-md-9">
            <div class="swiper gallery-large">
                <div class="swiper-wrapper gallery-holder">
                    @foreach ($single_unit->attachments as $attachment)
                        <div class="swiper-slide">
                            <meta itemprop="image" content="{{ $attachment->url }}" />
                            <a href="{{ $attachment->url }}" class="mgf-link">
                                <img src="{{ $attachment->url }}" alt="{{ $attachment->alt }}" />
                            </a>
                        </div>
                    @endforeach
                </div>
                <div class="swiper-button-next gall-unit-next-btn"></div>
                <div class="swiper-button-prev gall-unit-prev-btn"></div>
                <!-- /.gall-unit-next-btn -->
            </div>
        </div>
        <div class="col-md-3">
            <div class="swiper gallery-thumbs">
                <div class="swiper-wrapper">
                    @foreach ($single_unit->attachments as $attachment)
                        <div class="swiper-slide">
                            <div class="thumb">
                                <img src="{{ $attachment->url }}" itemprop="image" alt="{{ $single_unit->title }}" />
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
