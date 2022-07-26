<script src="{{ asset('front/js/jquery.min.js') }}?ver={{ env('FILES_VER') }}"></script>
<script src="{{ asset('front/js/bootstrap.bundle.min.js') }}?ver={{ env('FILES_VER') }}"></script>
<script src="{{ asset('front/js/swiper-bundle.min.js') }}?ver={{ env('FILES_VER') }}"></script>
<script src="{{ asset('front/js/bootstrap-select.min.js') }}?ver={{ env('FILES_VER') }}"></script>
<script src="{{ asset('front/js/jquery.magnific-popup.min.js')}}?ver={{ env('FILES_VER') }}"></script>
<script src="{{ asset('front/js/intlTelInput-jquery.min.js') }}?ver={{ env('FILES_VER') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/gsap.min.js"></script>
<script src="{{ asset('front/index.js') }}?ver={{ env('FILES_VER') }}"></script>
<script>
    $('select.selectpicker').selectpicker();

</script>
@if (Route::currentRouteName() == 'front.home')
    <script>
        const tl = gsap.timeline({
            defaults: {
                duration: 1
            }
        });

        tl
            .to("#silver-shape", {
                y: 0,
                autoAlpha: 1,
                delay: .3,
                ease: "power2.inOut"
            })

            .to("#tower", {
                y: 0,
                autoAlpha: 1,
                ease: "power3.out"
            }, "-=.5")

            .to("#logo-txt", {
                x: 0,
                clipPath: "polygon(100% 0, 0 0, 0 100%, 100% 100%)",
                ease: "expo.inOut"
            }, "-=.7")

            .to("#gold-shape-1", {
                autoAlpha: 1,
                x: 0,
                ease: "power1.out"
            }, "-=.5")

            .to("#gold-shape-2", {
                autoAlpha: 1,
                x: 0,
                ease: "power1.out"
            }, "<")

            .to(".splash-screen", {
                yPercent: -100,
                ease: "expo.inOut"
            })
    </script>
@endif
<script src="{{ URL::asset('8x/assets/js/parsley.min.js') }}?ver={{ env('FILES_VER') }}" type="text/javascript">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.blockUI/2.70/jquery.blockUI.min.js" type="text/javascript">
</script>
<script src="{{ URL::asset('front/js/bootstrap-flash-alert.min.js') }}?ver={{ env('FILES_VER') }}"
type="text/javascript"></script>

<script>
    // var ddSelect2;
    var rtl = false;
    @if (LaravelLocalization::getCurrentLocaleDirection() == 'rtl')
        rtl =true;
    @endif

    var darkMood = "{{ __('main.dark_mode') }}";
    var lightMood = "{{ __('main.light_mode') }}";
</script>

@include('front.components.custom-scripts')

@if (App::environment('local'))
@else
    @include('front.components.custom-scripts-min')
@endif

@php
$contact_phones = [];
foreach ($contacts as $key => $contact) {
    if ($key == 'phone') {
        foreach ($contact as $phone) {
            array_push($contact_phones, $phone->contact);
        }
    }
}
$contact_phones = implode(', ', $contact_phones);

$contact_emails = [];
foreach ($contacts as $key => $contact) {
    if ($key == 'email') {
        foreach ($contact as $email) {
            array_push($contact_emails, $email->contact);
        }
    }
}
$contact_emails = implode(', ', $contact_emails);

$contact_address = [];
foreach ($contacts as $key => $contact) {
    if ($key == 'address') {
        foreach ($contact as $address) {
            array_push($contact_address, $address->contact);
        }
    }
}
$contact_address = implode(', ', $contact_address);

$social_urls = [];
foreach ($socials as $social) {
    array_push($social_urls, $social->link);
}

@endphp
<!-- SCHEMA JSON-LD -->
<script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "Organization",
        "name": "KH Real Estate Properties",
        "image": "{{ URL::asset('/front/images/logo.png') }}",
        "url": "{{ env('APP_URL_FULL') }}",
        "address": {
            "@type": "PostalAddress",
            "addressLocality": "{{ $contact_address }}",
            "postalCode": "",
            "streetAddress": ""
        },
        "telephone": "{{ $contact_phones }}",
        "faxNumber": "",
        "email": "{{ $contact_emails }}",
        "sameAs": @json($social_urls),
        "member": [{
                "@type": "Organization"
            },
            {
                "@type": "Organization"
            }
        ]
    }
</script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-978GWHJCCS"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-978GWHJCCS');
</script>
@stack('scripts')
