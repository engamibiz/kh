@php
$whatsapp='';
foreach($contacts as $key => $contact){
if($key == 'whatsapp'){
foreach($contact as $whats){
$whatsapp=$whats->contact;
break;
}
}
}
$phone='';
foreach($contacts as $key => $contact){
if($key == 'phone'){
foreach($contact as $whats){
$phone=$whats->contact;
break;
}
}
}
@endphp

<!DOCTYPE html>
<html lang="en" @if(App::getLocale() == 'ar') dir="rtl" @else dir="ltr" @endif>

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">

	<title>KH Real Estate | {{$project->project}} </title>

	<link rel="icon" href="{{asset('front/landing/favicon.ico')}}">

	<link rel="stylesheet"
		href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />

	<link rel="stylesheet" href="{{asset('front/landing/css/bootstrap.min.css')}}" />
	<link rel="stylesheet" href="{{asset('front/landing/css/style.min.css')}}">
  <link rel="stylesheet" href="{{asset('front/css/addition.css')}}?ver={{env('FILES_VER')}}">

</head>

<body>

	<div class="floated-btn">
    @if($setting->active_phone_icon)
        <a href="tel:{{$phone}}">
          <i class="fas fa-phone"></i>
    @endif
      @if($setting->active_whatsapp_icon)
        <a href="whatsapp://send?phone={{$whatsapp}}">
          <i class="fab fa-whatsapp"></i>
        </a>
    @endif
	</div>

	<header class="site-header">
		<div class="container">
			<div class="flex-container">
				<div class="site-logo">
					<img src="{{asset('front/landing/images/logo.svg')}}" alt="logo">
				</div>

				<ul class="contact-info">
          @foreach($landing_contacts as $key => $contact)
          @if($key == 'phone')

					<li>
						<a href="tel:{{$contact->contact}}">
							<svg viewBox="0 0 27 26" fill="none">
								<path
									d="M22 10H20C19.9992 9.20459 19.6829 8.44199 19.1204 7.87956C18.558 7.31712 17.7954 7.00079 17 7V5C18.3256 5.00159 19.5964 5.52888 20.5338 6.46622C21.4711 7.40356 21.9984 8.6744 22 10V10Z"
									fill="currentColor" />
								<path
									d="M26 10H24C23.9979 8.14413 23.2597 6.36489 21.9474 5.05259C20.6351 3.7403 18.8559 3.00212 17 3V1C19.3861 1.00265 21.6738 1.95171 23.361 3.63896C25.0483 5.32622 25.9974 7.61386 26 10V10Z"
									fill="currentColor" />
								<path
									d="M24 26H23.83C4.18001 24.87 1.39 8.29 1 3.23C0.939051 2.43675 1.19569 1.65177 1.71347 1.04772C2.23125 0.443681 2.96776 0.0700446 3.76101 0.009001C3.84034 0.003001 3.92001 9.37591e-07 4.00001 9.37591e-07H9.27001C9.67056 -0.000386826 10.062 0.119511 10.3936 0.344163C10.7253 0.568815 10.9818 0.88787 11.13 1.26L12.65 5C12.7964 5.36355 12.8327 5.76208 12.7544 6.14609C12.6762 6.5301 12.4869 6.88267 12.21 7.16L10.08 9.31C10.4114 11.2013 11.3164 12.945 12.6723 14.3045C14.0283 15.664 15.7696 16.5737 17.66 16.91L19.83 14.76C20.1115 14.4862 20.4674 14.3013 20.8533 14.2283C21.2392 14.1554 21.638 14.1977 22 14.35L25.77 15.86C26.1365 16.0129 26.4492 16.2714 26.6683 16.6027C26.8873 16.9339 27.0028 17.3229 27 17.72V23C27 23.7956 26.6839 24.5587 26.1213 25.1213C25.5587 25.6839 24.7957 26 24 26ZM4.00001 2C3.86868 1.99961 3.73857 2.02508 3.61709 2.07497C3.49562 2.12486 3.38516 2.19819 3.29202 2.29077C3.19888 2.38335 3.12489 2.49337 3.07427 2.61455C3.02365 2.73572 2.9974 2.86568 2.99701 2.997C2.99701 3.025 2.99801 3.05267 3.00001 3.08C3.46001 9 6.41001 23 23.94 24C24.2047 24.0159 24.4648 23.926 24.6632 23.7501C24.8616 23.5742 24.982 23.3267 24.998 23.062L25 23V17.72L21.23 16.21L18.36 19.06L17.88 19C9.18001 17.91 8 9.21 8 9.12L7.94 8.64L10.78 5.77L9.28 2H4.00001Z"
									fill="currentColor" />
							</svg>
							<span>
								{{$contact->contact}}<br>
								{{-- <small>We Are Open <strong>10</strong>am - <strong>6</strong>pm</small> --}}
							</span>
						</a>
					</li>
          @endif
          @if($key == 'email')
					<li>
						<a href="mailto:{{$contact->contact}}">
							<svg viewBox="0 0 16 14" fill="none">
								<path
									d="M2 0C1.46957 0 0.960859 0.210714 0.585786 0.585786C0.210714 0.960859 0 1.46957 0 2L0 10.01C0.00264352 10.5387 0.214524 11.0448 0.58931 11.4178C0.964097 11.7907 1.4713 12 2 12H7.5C7.63261 12 7.75979 11.9473 7.85355 11.8536C7.94732 11.7598 8 11.6326 8 11.5C8 11.3674 7.94732 11.2402 7.85355 11.1464C7.75979 11.0527 7.63261 11 7.5 11H2C1.77988 11 1.5659 10.9274 1.39124 10.7934C1.21658 10.6595 1.09101 10.4716 1.034 10.259L6.674 6.788L8 7.583L15 3.383V6.5C15 6.63261 15.0527 6.75979 15.1464 6.85355C15.2402 6.94732 15.3674 7 15.5 7C15.6326 7 15.7598 6.94732 15.8536 6.85355C15.9473 6.75979 16 6.63261 16 6.5V2C16 1.46957 15.7893 0.960859 15.4142 0.585786C15.0391 0.210714 14.5304 0 14 0H2ZM5.708 6.208L1 9.105V3.383L5.708 6.208ZM1 2.217V2C1 1.73478 1.10536 1.48043 1.29289 1.29289C1.48043 1.10536 1.73478 1 2 1H14C14.2652 1 14.5196 1.10536 14.7071 1.29289C14.8946 1.48043 15 1.73478 15 2V2.217L8 6.417L1 2.217Z"
									fill="currentColor" />
								<path
									d="M16 10.5C16 11.4283 15.6313 12.3185 14.9749 12.9749C14.3185 13.6313 13.4283 14 12.5 14C11.5717 14 10.6815 13.6313 10.0251 12.9749C9.36875 12.3185 9 11.4283 9 10.5C9 9.57174 9.36875 8.6815 10.0251 8.02513C10.6815 7.36875 11.5717 7 12.5 7C13.4283 7 14.3185 7.36875 14.9749 8.02513C15.6313 8.6815 16 9.57174 16 10.5V10.5ZM12.5 8.5C12.3674 8.5 12.2402 8.55268 12.1464 8.64645C12.0527 8.74021 12 8.86739 12 9V10H11C10.8674 10 10.7402 10.0527 10.6464 10.1464C10.5527 10.2402 10.5 10.3674 10.5 10.5C10.5 10.6326 10.5527 10.7598 10.6464 10.8536C10.7402 10.9473 10.8674 11 11 11H12V12C12 12.1326 12.0527 12.2598 12.1464 12.3536C12.2402 12.4473 12.3674 12.5 12.5 12.5C12.6326 12.5 12.7598 12.4473 12.8536 12.3536C12.9473 12.2598 13 12.1326 13 12V11H14C14.1326 11 14.2598 10.9473 14.3536 10.8536C14.4473 10.7598 14.5 10.6326 14.5 10.5C14.5 10.3674 14.4473 10.2402 14.3536 10.1464C14.2598 10.0527 14.1326 10 14 10H13V9C13 8.86739 12.9473 8.74021 12.8536 8.64645C12.7598 8.55268 12.6326 8.5 12.5 8.5Z"
									fill="currentColor" />
							</svg>
							<span>
								{{$contact->contact}} <br>
								{{-- <small>You Can Mail Us</small> --}}
							</span>
						</a>
					</li>
          @endif
          @endforeach
				</ul> <!-- /.contact-info -->

				<ul class="social-list">
          @foreach($socials as $social)

          <li><a href="{{$social->link}}" target="_blank"><i class="{{$social->icon}}"></i></a></li>

      @endforeach
				</ul> <!-- /.social-list -->

			</div>
		</div>
	</header>

  @yield('content')

  @include('front.partials.landing.footer')

	<script src="{{asset('front/landing/js/jquery-3.6.0.min.js')}}"></script>
	<script src="{{asset('front/landing/js/bootstrap.bundle.min.js')}})"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
  <script src="{{URL::asset('8x/assets/js/parsley.min.js')}}?ver={{env('FILES_VER')}}" type="text/javascript"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.blockUI/2.70/jquery.blockUI.min.js" type="text/javascript"></script>
  <script src="{{URL::asset('front/js/bootstrap-flash-alert.min.js')}}?ver={{env('FILES_VER')}}" type="text/javascript"></script>
  <script src="{{ asset('front/js/intlTelInput-jquery.min.js') }}?ver={{ env('FILES_VER') }}"></script>

	<script>
		$(document).ready(function () {
			// intl tel input plugin

      $(document).ready(function () {
        $(".phone-input").each(function (e) {
          $(this).intlTelInput({ initialCountry: "eg" });
        });
      });

			$("#goTop").on("click", () => {
				$("html,body").animate({ scrollTop: 0 }, 1500)
			});

			// Init magnificPopup
			$('.gallery-grid').each(function () {
				$(this).magnificPopup({
					delegate: 'a.img-link',
					type: 'image',
					zoom: {
						enabled: true
					},
					gallery: {
						enabled: true
					}
				});
			});
		});
	</script>
  <script>

  $('.contact-from').on('click', function() {
      var form = $(this).closest('form');

      /* Parsley validate front-end */
      if (!form.parsley().isValid()) {
        // Display notification
        $.alert("{{__('main.oh_snap_change_a_few_thing_up_and_try_submitting_again')}}", {
          title: '',
          type: 'warning',
          position: ['top-right', [0, 20]],
        });

        form.find('[data-parsley-type]').each(function(i, v) {
          $(this).parsley().validate({
            focusInvalid: false,
            invalidHandler: function() {
              $(this).find(":input.error:first").focus();
            }
          });

          return;
        });
        form.find('[data-parsley-pattern]').each(function(i, v) {
          $(this).parsley().validate({
            focusInvalid: false,
            invalidHandler: function() {
              $(this).find(":input.error:first").focus();
            }
          });

          return;
        });
        form.parsley().validate({
          focusInvalid: false,
          invalidHandler: function() {
            $(this).find(":input.error:first").focus();
          }
        });

        return;
      }
      $(this).closest('form').find(".phone-input").val('+' + $(this).closest('form').find('.phone-input').intlTelInput(
                    'getSelectedCountryData')
                .dialCode + '-' + $(this).closest('form').find("input[name='phone']").val())
      console.log($(this).closest('form').find(".unit_types").val());
      // Request parameters
      var url = "{{route('contact_us.contact_us.store')}}";
      var data = form.serialize();
      var headers = {
        'content-type': 'appliction/json'
      };

      // Block UI
      $.blockUI({
        overlayColor: "#000000",
        type: "loader",
        state: "success",
        message: "<img src='{{URL::asset('front/images/loader.gif')}}'/>"
      });

      // Send the request
      $.post(url, data, headers).done(function(response) {

        // Unblock UI     
        $.unblockUI();

        // Notification message
        if (response.message) {
          // Empty notificaion messages              
          $('.messages').empty();

          // Notification type
          if (response.status) {
            $.alert(response.message, {
              title: '',
              type: 'info',
              position: ['top-right', [0, 20]],
            });

          } else {
            $.alert(response.message, {
              title: '',
              type: 'warning',
              position: ['top-right', [0, 20]],
            });
          }

          if (response.data.redirect_to) {
            window.location.href = response.data.redirect_to
          }

        }
      }).fail(function(xhr, error_text, statusText) {
        // Unblock UI            
        $.unblockUI();

        // Display notificaion
        if (xhr.responseJSON && xhr.responseJSON.errors) {
          $.each(xhr.responseJSON.errors, function(index, error) {
            $.alert(error.message, {
              title: '',
              type: 'warning',
              position: ['top-right', [0, 20]],
            });
          });
        } else {
          $.alert(statusText, {
            title: '',
            type: 'warning',
            position: ['top-right', [0, 20]],
          });

        }
      });
    });
  </script>
          <script src="https://maps.googleapis.com/maps/api/js?key={{ env('MAP_KEY') }}&callback=initMapProduct&&libraries=places"
          defer></script>
  <script>
      function initMapProduct() {
          var latLng = {
              lat: {{ $project->latitude }},
              lng: {{ $project->longitude }}
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

          map = new google.maps.Map(document.getElementById("map"), options);

          var marker = new google.maps.Marker({
              position: latLng,
              map: map,
              icon: `http://maps.google.com/mapfiles/ms/icons/red-dot.png`,
              animation: google.maps.Animation.BOUNCE,
              title: '{{ $project->project }}'
          });

          var infoWindow = new google.maps.InfoWindow({
              content: '<p>{{ $project->project }}</p>'
          })

          var infoWindowAccordion = new google.maps.InfoWindow({
              content: '<p>{{ $project->project }}</p>'
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
</body>

</html>