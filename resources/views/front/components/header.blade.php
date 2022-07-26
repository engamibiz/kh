<style>
    @media screen and (min-width: 700px) {
        .top_tel{
            display: none;
        }
    }

</style>
<header id="main-header" class="main-header">
    <div class="container-fluid">
        <nav class="navbar p-0 inner-menu navbar-top">
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('front.home') }}">{{ __('main.home_title') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('front.about') }}">{{ __('main.about_us') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('front.contact-us') }}">{{ __('main.contact_us') }}</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="{{ route('front.blogs') }}">{{ __('main.news') }}</a>
                    @if (count($blog_categories))
                        <div class="dropdown-menu">
                            @foreach ($blog_categories as $blog_category)
                                <a class="dropdown-item"
                                    href="{{ route('front.blogs', ['category_slug' => $blog_category->slug]) }}">{{ $blog_category->title }}</a>
                            @endforeach
                        </div>
                    @endif
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('front.careers') }}">{{ __('main.careers') }}</a>
                </li>
            </ul>

            <ul class="nav">
                @foreach ($socials as $social)
                    <li class="nav-item">
                        <a class="nav-link social-link @if (strpos($social->icon, 'facebook')) facebook
                        @elseif(strpos($social->icon, 'twitter'))
                            twitter
                        @elseif(strpos($social->icon, 'instagram'))
                            instagram
                        @elseif(strpos($social->icon, 'linkedin'))
                            linkedin
                        @elseif(strpos($social->icon, 'youtube'))
                            youtube
                        @elseif(strpos($social->icon, 'twitter'))
                            twitter
                        @elseif(strpos($social->icon, 'snapchat'))
                            snapchat
                        @elseif(strpos($social->icon, 'telegram'))
                            telegram @endif 
                        "
                            href="{{ $social->link }}" target="_blank">
                            @if (strpos($social->icon, 'snapchat'))
                                <svg viewBox="0 0 24 24" width="20">
                                    <path fill="#fffc00" d="M0 0h24v24H0z" />
                                    <path fill="#fff" stroke="#004274"
                                        d="M11.871 21.764c-1.19 0-1.984-.561-2.693-1.056-.503-.357-.976-.696-1.533-.79a4.568 4.568 0 0 0-.803-.066c-.472 0-.847.071-1.114.125-.17.03-.312.058-.424.058-.116 0-.263-.032-.32-.228-.05-.16-.081-.312-.112-.459-.08-.37-.147-.597-.286-.62-1.489-.227-2.38-.57-2.554-.976-.014-.044-.031-.09-.031-.125-.01-.125.08-.227.205-.25 1.181-.196 2.242-.824 3.138-1.858.696-.803 1.035-1.579 1.066-1.663 0-.01.009-.01.009-.01.17-.351.205-.65.102-.895-.191-.46-.825-.656-1.257-.79-.111-.03-.205-.066-.285-.093-.37-.147-.986-.46-.905-.892.058-.312.472-.535.811-.535.094 0 .174.014.24.05.38.173.723.262 1.017.262.366 0 .54-.138.584-.182a24.93 24.93 0 0 0-.035-.593c-.09-1.365-.192-3.059.24-4.03 1.298-2.907 4.053-3.14 4.869-3.14L12.156 3h.05c.815 0 3.57.227 4.868 3.139.437.971.33 2.67.24 4.03l-.008.067c-.01.182-.023.356-.032.535.045.035.205.169.535.173.286-.008.598-.102.954-.263a.804.804 0 0 1 .312-.066c.125 0 .25.03.357.066h.009c.299.112.495.321.495.54.009.205-.152.517-.914.825-.08.03-.174.067-.285.093-.424.13-1.057.335-1.258.79-.111.24-.066.548.103.895 0 .01.009.01.009.01.049.124 1.337 3.049 4.204 3.526a.246.246 0 0 1 .205.25c0 .044-.009.089-.031.129-.174.41-1.057.744-2.555.976-.138.022-.205.25-.285.62a6.831 6.831 0 0 1-.112.459c-.044.147-.138.227-.298.227h-.023c-.102 0-.24-.013-.423-.049a5.285 5.285 0 0 0-1.115-.116c-.263 0-.535.023-.802.067-.553.09-1.03.433-1.534.79-.717.49-1.515 1.051-2.697 1.051h-.254z" />
                                </svg>
                            @else
                                <i class="{{ $social->icon }}"></i>
                            @endif
                        </a>
                    </li>
                @endforeach
            </ul>
        </nav>

        <nav class="navbar px-0 navbar-expand-lg">
            <div class="top_tel" style="height: 50px;width: 100%">
                <a class="nav-link" href="tel:{{ $phone_number }}">
                    <span><i class="fa-solid fa-phone"></i> {{ $phone_number }}</span>
                </a>
            </div>

            <a class="navbar-brand" href="{{ route('front.home') }}">
                <img src="{{ asset('front/images/full-logo.png') }}" alt="KH Logo">
            </a>

            <div class="inner-menu middle-menu flex-grow-1">
                <ul class="nav">

                    @foreach ($contacts as $key => $contact)
                        @if ($key == 'phone')
                            @foreach ($contact as $phone)
                                <li class="nav-item nav-item--middle ml-auto">
                                    <a href="tel:{{ $phone->contact }}">
                                        <strong>
                                            <img width="20" src="{{ asset('front/images/phone.png') }}" />
                                            {{ __('main.contact_us') }}:
                                        </strong>
                                        {{ $phone->contact }}
                                    </a>
                                </li>
                            @endforeach
                        @endif

                        @if ($key == 'email')
                            @foreach ($contact as $email)
                                <li class="nav-item nav-item--middle ml-auto">
                                    <a href="mailto:{{ $email->contact }}">
                                        <strong>
                                            <img width="20" src="{{ asset('front/images/letter.png') }}" />
                                            {{ __('main.send_message') }}:
                                        </strong>
                                        {{ $email->contact }}
                                    </a>
                                </li>
                            @endforeach
                        @endif
                    @endforeach
                    

                </ul>
            </div>
            @foreach (LaravelLocalization::getSupportedLanguagesKeys() as $locale)
                        @if (App::getLocale() == 'en')
                            @if ($locale == 'ar')
                                @if ($setting->enable_ar)
                                    <li class="nav-item lang-item ml-auto">
                                        <a class="nav-link"
                                            href="{{ LaravelLocalization::getLocalizedURL($locale) }}">
                                            <img src="{{ asset('front/images/egypt-flag.png') }}" width="20" />
                                            <span>{{ Config::get('laravellocalization.supportedLocales.' . $locale . '.native') }}</span>
                                        </a>
                                    </li>
                                @endif
                            @endif
                        @endif
                        @if (App::getLocale() == 'ar')
                            @if ($locale == 'en')
                                <li class="nav-item lang-item ml-auto">
                                    <a class="nav-link"
                                        href="{{ LaravelLocalization::getLocalizedURL($locale) }}">
                                        <img src="{{ asset('front/images/england-flag.png') }}" width="20" />
                                        <span>{{ Config::get('laravellocalization.supportedLocales.' . $locale . '.native') }}</span>
                                    </a>
                                </li>
                            @endif
                        @endif
                    @endforeach
                    <button class="navbar-toggler" data-toggle="collapse" data-target="#toggle-menu" aria-expanded="false">
                        <div class="line line1"></div>
                        <div class="line line2"></div>
                        <div class="line line3"></div>
                      </button>
        </nav>

        <nav class="inner-menu main-menu">
            <ul class="nav">
                <li class="nav-item active">
                    <a href="{{ route('front.home') }}" class="nav-link"><i class="fas fa-home"></i></a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('front.projects') }}">{{ __('main.projects') }}</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#">{{ __('main.properties') }}</a>
                    <div class="dropdown-menu">
                        @foreach ($offering_types as $offering_type)
                            <a class="dropdown-item"
                                href="{{ route('front.properties', ['offering_types[]' => $offering_type->id]) }}">{{ $offering_type->offering_type }}</a>
                        @endforeach
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link"
                        href="{{ route('front.developers') }}">{{ __('inventory::inventory.developers') }}</a>
                </li>

            </ul>
        </nav>

        <div class="collapse navbar-collapse" id="toggle-menu">
            <ul class="navbar-nav navbar-nav-scroll">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('front.home') }}">{{ __('main.home_title') }}</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('front.about') }}">{{ __('main.about_us') }}</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link"
                        href="{{ route('front.projects') }}">{{ __('inventory::inventory.projects') }}</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#">{{ __('main.properties') }}</a>
                    <div class="dropdown-menu">
                        @foreach ($offering_types as $offering_type)
                            <a class="dropdown-item"
                                href="{{ route('front.properties', ['offering_types[]' => $offering_type->id]) }}">{{ $offering_type->offering_type }}</a>
                        @endforeach
                </li>

                <li class="nav-item">
                    <a class="nav-link"
                        href="{{ route('front.developers') }}">{{ __('inventory::inventory.developers') }}</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle"
                        href="{{ route('front.blogs') }}">{{ __('main.news') }}</a>
                    @if (count($blog_categories))
                        <div class="dropdown-menu">
                            @foreach ($blog_categories as $blog_category)
                                <a class="dropdown-item"
                                    href="{{ route('front.blogs', ['category_slug' => $blog_category->slug]) }}">{{ $blog_category->title }}</a>
                            @endforeach
                        </div>
                    @endif
                </li>

                <li class="nav-item">
                    <a class="nav-link"
                        href="{{ route('front.contact-us') }}">{{ __('main.contact_us') }}</a>
                </li>

                <li class="nav-item phone-item">
                    <a class="nav-link" href="tel:{{ $phone_number }}">
                        <span>{{ $phone_number }}</span>
                    </a>
                </li>

            </ul>
        </div>

    </div>
</header>
