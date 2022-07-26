<!-- START BREADCRUMB -->
<nav aria-label="breadcrumb">
    <div class="container-fluid">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('front.home') }}">{{ __('main.home_title') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ __('main.contact_us') }}</li>
        </ol>
    </div>
</nav>
<!-- END BREADCRUMB -->

  
  <!-- START PAGE WRAPPER -->
  <main class="main-content">

    <!-- START contact-page  -->
    <section class="contact-page pb-5">
      <div class="container-fluid">
        <div class="contact-info">
          <h1>{{__('main.we_are_here_for_you')}}</h1>

          <div class="row">
            @foreach ($contacts as $key => $contact)
            @if ($key == 'phone')
            <div class="col-md-3">
              <div class="block">
                <span>{{__('contactus::contact_us.phone')}}</span>

                    @if ($key == 'phone')
                        @foreach ($contact as $phone)
                                <a href="tel:{{ $phone->contact }}">
                                    <i class="fa fa-phone"></i>
                                    <bdi>{{ $phone->contact }}</bdi>
                                </a>
                        @endforeach
                    @endif
                
              </div>
            </div>
            @endif
            @endforeach
            @foreach ($contacts as $key => $contact)
            @if ($key == 'email')
            <div class="col-md-3">
              <div class="block">
                <span>{{__('main.email')}}</span>

                    @if ($key == 'email')
                        @foreach ($contact as $email)
                                <a href="mailto:{{ $email->contact }}">
                                    <i class="fa fa-envelope"></i>
                                    {{ $email->contact }}
                                </a>
                        @endforeach
                    @endif
              </div>
            </div>
            @endif
            @endforeach
            {{-- <div class="col-md-3">
              <div class="block">
                <span>Opening Hours</span>
                <p>Open 24 Hours</p>
              </div>
            </div> --}}
            @foreach ($contacts as $key => $contact)
            @if ($key == 'address')
            <div class="col-md-3">
              <div class="block">
                <span>{{__('settings::settings.website_contact_us_address')}}</span>
                    @if ($key == 'address')
                        @foreach ($contact as $address)
                                <p>
                                    <bdi>
                                        @if (App::getLocale() == 'ar')
                                            {{ $address->contact_ar }}
                                        @else
                                            {{ $address->contact }}
                                        @endif
                                    </bdi>
                                </p>

                        @endforeach
                    @endif
              </div>
            </div>
            @endif
            @endforeach
          </div>
        </div>
        <div class="row">
            <div class="col-md-6">
              <div class="contact__holder">
                <div class="form-holder">
                  <h3 class="form-title">{{__('main.contact_us')}}</h3>
                  {{-- <p class="form-desc">Use the form below to contact us!</p> --}}
                  <form action="{{ route('contact_us.contact_us.store') }}" method="POST" class="form-contact"
                  data-parsley-validate>
                  @csrf
                  <input type="hidden" name="link" value="{{ Request::url() }}">
                  <input type="hidden" name="type" value="contact">
                  <input type="hidden" name="position" value="{{ isset($position) ? $position : null }}">
                  <input type="hidden" name="city_id" value="{{ isset($city_id) ? $city_id : null }}">
                  <input type="hidden" name="model_name" value="{{ isset($model_name) ? $model_name : null }}">
        
                    <div class="form-group">
                      <input type="text" class="form-control" name="full_name" placeholder="{{ __('users.full_name') }}"
                      data-parsley-trigger="change focusout" required
                      data-parsley-required-message="{{ __('main.please_enter_your_name') }}">
                    </div>
  
                    <div class="form-group">
                      <input type="text" class="form-control phone-input" inputmode="tel" placeholder="{{ __('users.mobile_number') }}"
                      name="phone" data-parsley-trigger="change focusout" required
                      data-parsley-required-message="{{ __('main.please_enter_your_mobile_number') }}">
                    </div>
  
                    <div class="form-group">
                      <input type="email" class="form-control" inputmode="email" name="email" placeholder="{{ __('users.email') }}"
                      required data-parsley-required-message="{{ __('main.please_enter_your_email') }}">
                    </div>
  
                    <div class="form-group">
                      <textarea rows='4' class="form-control" placeholder="{{ __('contactus::contact_us.message') }}"
                      name="message" data-parsley-trigger="change focusout"></textarea>
                    </div>
  
                    <div class="form-group mb-0">
                      <button type="submit" class="site-btn contact-from">{{ __('main.send') }}</button>
                    </div>
  
                  </form>
                </div>
  
              </div>
            </div>
  
            <div class="col-md-6">
                <div class="map" id="map">
                    {{-- <iframe
                      src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3908.9369315999456!2d104.9260212137754!3d11.556379047474792!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31095116c8b3ef2d%3A0x22da2eb9661e4221!2sKH%20Real%20Estate!5e0!3m2!1sen!2seg!4v1644162352519!5m2!1sen!2seg"
                      allowfullscreen="" loading="lazy"></iframe> --}}
                </div>
            </div>
          </div>
      </div>
    </section>
    <!-- END contact-page  -->

  </main>
  <!-- END PAGE WRAPPER -->









@push('scripts')
    <script src="https://maps.googleapis.com/maps/api/js?key={{ env('MAP_KEY') }}&callback=initMap&&libraries=places"
        defer></script>
    <script>
        // GOOGLE MAPS API
        function initMap() {
            @if (count($branches))
                var latLng = {
                lat: {{ $branches[0]->latitude }},
                lng: {{ $branches[0]->longitude }}
                }; // latitude and longitude
            @endif

            var options = {
                zoom: 18,
                center: latLng,
                mapTypeId: 'roadmap', // hybrid , satellite , roadmap , terrain
                scrollwheel: false,
                draggable: true,
                streetViewControl: false,

            };

            var map = new google.maps.Map(document.getElementById('map'), options);

            var marker = new google.maps.Marker({
                position: latLng,
                map: map,
                icon: 'http://maps.google.com/mapfiles/ms/icons/red-dot.png',
                animation: google.maps.Animation.BOUNCE,
                title:
                @if (!empty($branches[0]->branch))
                    "{{ $branches[0]->branch }}"
                @else "{{ env('APP_NAME') }}"
                @endif
            });

            var infoWindow = new google.maps.InfoWindow({
                content:
                @if (!empty($branches[0]->branch))
                    '<p>{{ $branches[0]->branch }}</p>'
                @else '<p>{{ env('APP_NAME') }}</p>'
                @endif
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

            // Add other markers if any
            var markers_array = [];
            var info_windows_array = [];

            @foreach ($branches as $branch)
                @if ($loop->index != 0)
                    @if ($branch->latitude && $branch->longitude)
                        latLng = {
                        lat: {{ $branch->latitude }},
                        lng: {{ $branch->longitude }}
                        }; // latitude and longitude
            
                        markers_array[{{ $loop->index - 1 }}] = new google.maps.Marker({
                        position: latLng,
                        map: map,
                        icon: 'http://maps.google.com/mapfiles/ms/icons/red-dot.png',
                        animation: google.maps.Animation.BOUNCE,
                        title: @if (!empty($branch->branch))
                            "<p>{{ $branch->branch }}</p>"
                        @else "{{ env('APP_NAME') }}"
                        @endif
                        });
            
                        info_windows_array[{{ $loop->index - 1 }}] = new google.maps.InfoWindow({
                        content: @if (!empty($branch->branch))
                            '<p>{{ $branch->branch }}</p>'
                        @else '<p>{{ env('APP_NAME') }}</p>'
                        @endif
                        })
            
                        markers_array[{{ $loop->index - 1 }}].addListener('click', function() {
                        info_windows_array[{{ $loop->index - 1 }}].open(map, markers_array[{{ $loop->index - 1 }}]);
                        });
            
                        google.maps.event.addListener(markers_array[{{ $loop->index - 1 }}], 'click', function() {
                        var pos = map.getZoom();
                        map.setZoom(12);
                        map.setCenter(markers_array[{{ $loop->index - 1 }}].getPosition());
                        window.setTimeout(function() {
                        map.setZoom(pos);
                        }, 3000);
                        });
                    @endif
                @endif
            @endforeach
        }
    </script>

    <script src="https://parsleyjs.org/dist/parsley.js"></script>

    // <script>
    //     $('.subscribe-from').on('click', function() {
    //         var form = $(this).closest('form');

    //         /* Parsley validate front-end */
    //         if (!form.parsley().isValid()) {
    //             // Display notification                
    //             $('.messages').empty();
    //             $('#notification').css('background-color', 'red');
    //             $('#notification .messages').append(`<span>` +
    //                 '{{ trans('
    //                                                                         main.oh_snap_change_a_few_thing_up_and_try_submitting_again ') }}' +
    //                 `</span> <br>`);
    //             $('#notification').fadeIn("slow");
    //             $('.dismiss').click(function() {
    //                 $('#notification').fadeOut('slow')
    //             });

    //             form.find('[data-parsley-type]').each(function(i, v) {
    //                 $(this).parsley().validate({
    //                     focusInvalid: false,
    //                     invalidHandler: function() {
    //                         $(this).find(":input.error:first").focus();
    //                     }
    //                 });

    //                 return;
    //             });
    //             form.find('[data-parsley-pattern]').each(function(i, v) {
    //                 $(this).parsley().validate({
    //                     focusInvalid: false,
    //                     invalidHandler: function() {
    //                         $(this).find(":input.error:first").focus();
    //                     }
    //                 });

    //                 return;
    //             });
    //             form.parsley().validate({
    //                 focusInvalid: false,
    //                 invalidHandler: function() {
    //                     $(this).find(":input.error:first").focus();
    //                 }
    //             });

    //             return;
    //         }

    //         var url = "{{ route('front.subscribe') }}";
    //         var headers = {
    //             'content-type': 'appliction/json'
    //         };
    //         var data = $('.form-subscribe').serialize()

    //         // Send  subscribe request
    //         $.post(url, data, headers).done(function(response) {
    //             // Empty notificaion messages              
    //             $('.messages').empty();

    //             // Notification type 
    //             if (response.status) {
    //                 $('#notification').css('background-color', 'green');
    //             } else {
    //                 $('#notification').css('background-color', 'red');
    //             }

    //             // Display notification 
    //             $('#notification .messages').append(`<span>` + response.message + `</span> <br>`);
    //             $('#notification').fadeIn("slow");

    //             // Dismiss
    //             $('.dismiss').click(function() {
    //                 $('#notification').fadeOut('slow')
    //             });
    //             setTimeout(function() {
    //                 $('#notification').fadeOut('slow')
    //             }, 2000);

    //         }).fail(function(xhr, error_text, statusText) {
    //             // Empty notification message
    //             $('.messages').empty();

    //             // Notification type
    //             $('#notification').css('background-color', 'red');

    //             // Display notificaion
    //             if (xhr.responseJSON && xhr.responseJSON.errors) {
    //                 $.each(xhr.responseJSON.errors, function(index, error) {
    //                     $('#notification .messages').append(`<span>` + error.message +
    //                         `</span> <br>`);
    //                 });
    //             } else {
    //                 $('#notification .messages').append(`<span>` + statusText + `</span> <br>`);
    //             }
    //             $('#notification').fadeIn("slow");

    //             // Dismiss notification
    //             $('.dismiss').click(function() {
    //                 $('#notification').fadeOut('slow')
    //             });
    //         });
    //     });
    // </script>
@endpush
