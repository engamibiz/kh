{{-- <div class="contact__holder hide">
    <button class="close-contact-us">
        <svg width="20" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg>
    </button>
    <div class="desc">
        <p>
            @switch(Route::currentRouteName())
                @case('front.home')
                    @php
                        $page_name = 'home';
                    @endphp
                @break

                @case('front.about')
                    @php
                        $page_name = 'about';
                    @endphp
                @break

                @case('front.blogs')
                    @php
                        $page_name = 'blogs';
                    @endphp
                @break

                @case('front.projects')
                    @php
                        $page_name = 'projects';
                    @endphp
                @break

                @case('front.properties')
                    @php
                        $page_name = 'properties';
                    @endphp
                @break

                @case('front.careers')
                    @php
                        $page_name = 'careers';
                    @endphp
                @break

                @case('front.contact-us')
                    @php
                        $page_name = 'contact';
                    @endphp
                @break

                @case('front.unit_type')
                    @php
                        $page_name = 'unit_type';
                    @endphp
                @break

                @case('front.developers')
                    @php
                        $page_name = 'developers';
                    @endphp
                @break

                @default
                    @php
                        $page_name = '';
                    @endphp
            @endswitch
            @if (in_array(
    $page_name,
    collect($seo)->pluck('page')->toArray(),
    ))
                @foreach ($seo as $seo_page)
                    @if ($seo_page->page == $page_name)
                        {{ $seo_page->popup_contact_us_title }}
                    @endif
                @endforeach
            @else
                {{ __('main.when_would_you_like_to_receive_a_call_from_our_real_estate_consultant') }}
            @endif
        </p>

    </div>
    <form action="{{ route('contact_us.contact_us.store') }}" method="POST" class="form-contact"
        data-parsley-validate>
        @csrf
        <input type="hidden" name="link" value="{{ Request::url() }}">
        <input type="hidden" name="type" value="{{ $type }}">
        <input type="hidden" name="position" value="{{ isset($position) ? $position : null }}">
        <input type="hidden" name="city_id" value="{{ isset($city_id) ? $city_id : null }}">
        <input type="hidden" name="model_name" value="{{ isset($model_name) ? $model_name : null }}">

        <!-- <div class="form-group booking-group">
            <input type="text" class="form-control booking-date" name="best_time_to_call_from" placeholder="{{ __('main.select_the_day') }}" />
            <input type="text" class="form-control booking-time" name="best_time_to_call_from_time" placeholder="{{ __('main.set_the_time') }}" />
        </div> -->
        <div class="form-group booking-date">
            <input type="text" class="form-control booking-date" name="best_time_to_call_from"
                placeholder="{{ __('main.select_the_day') }}" />
        </div>
        <div class="form-group booking-time">
            <input type="text" class="form-control booking-time" name="best_time_to_call_from_time"
                placeholder="{{ __('main.set_the_time') }}" />
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="full_name" placeholder="{{ __('users.full_name') }}"
                data-parsley-trigger="change focusout" required
                data-parsley-required-message="{{ __('main.please_enter_your_name') }}">
        </div>
        <div class="form-group">
            <input type="email" class="form-control" name="email" placeholder="{{ __('users.email') }}" required
                data-parsley-required-message="{{ __('main.please_enter_your_email') }}">
        </div>
        <div class="form-group">
            <input type="text" class="form-control phone-input" placeholder="{{ __('users.mobile_number') }}"
                name="phone" data-parsley-trigger="change focusout" required
                data-parsley-required-message="{{ __('main.please_enter_your_mobile_number') }}">
        </div>
        <div class="form-group">
            <textarea rows='3' class="form-control" placeholder="{{ __('contactus::contact_us.message') }}"
                name="message" data-parsley-trigger="change focusout"></textarea>
        </div>
        <input class="myField" data-parsley-errors-container="#errorContainer" data-parsley-required="true"
            value="" type="text" style="display:none;" data-parsley-required-message="please verify you not spam">
        <span id='errorContainer'></span>

        <div class="g-recaptcha" data-sitekey="{{ env('NOCAPTCHA_SITEKEY') }}" data-callback="recaptchaCallback">
        </div>

        <div class="form-group">
            <button type="submit" class="site-btn contact-from">
                {{ __('main.send') }}
            </button>
        </div>
    </form>
</div> --}}


<div class="contact__holder hide">
    <button class="show-contact-us" title="{{ __('main.contact_us') }}">
        <i class="fas fa-envelope"></i>
    </button>

    <div class="form-holder">
        <button class="close-contact-us">
            <svg width="20" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
        <h3 class="form-title">{{ __('main.contact_us') }}</h3>
        {{-- <p class="form-desc">Use the form below to contact us!</p> --}}

        <form action="{{ route('contact_us.contact_us.store') }}" method="POST" class="form-contact"
            data-parsley-validate>
            @csrf
            <input type="hidden" name="link" value="{{ Request::url() }}">
            <input type="hidden" name="type" value="{{ $type }}">
            <input type="hidden" name="position" value="{{ isset($position) ? $position : null }}">
            <input type="hidden" name="city_id" value="{{ isset($city_id) ? $city_id : null }}">
            <input type="hidden" name="model_name" value="{{ isset($model_name) ? $model_name : null }}">

            <div class="form-group">
                <input type="text" class="form-control" name="full_name" placeholder="{{ __('users.full_name') }}"
                    data-parsley-trigger="change focusout" required
                    data-parsley-required-message="{{ __('main.please_enter_your_name') }}">
            </div>

            <div class="form-group">
                <input type="text" class="form-control phone-input" placeholder="{{ __('users.mobile_number') }}"
                    name="phone" data-parsley-trigger="change focusout" required
                    data-parsley-required-message="{{ __('main.please_enter_your_mobile_number') }}">
            </div>

            <div class="form-group">
                <input type="email" class="form-control" name="email" placeholder="{{ __('users.email') }}"
                    required data-parsley-required-message="{{ __('main.please_enter_your_email') }}">
            </div>

            <div class="form-group">
                <textarea rows='4' class="form-control" placeholder="{{ __('contactus::contact_us.message') }}"
                    name="message" data-parsley-trigger="change focusout"></textarea>
            </div>

            <div class="form-group mb-0">
                <button type="submit" class="site-btn contact-from">
                    {{ __('main.send') }}
                </button>
            </div>

        </form>
    </div>

</div>
