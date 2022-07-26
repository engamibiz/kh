    <!-- Start Services -->
    <section class="section services-holder">
        <svg class="sec-shape" viewBox="0 0 2600 131.1">
          <path d="M0 0L2600 0 2600 69.1 0 0z"></path>
        </svg>
        <div class="container-fluid padding-block">
          <div class="section-title">
            <h2 class="title">{{__('main.services')}}</h2>
          </div>
  
          <div class="row">
            <div class="col-xl-6">
              <div class="text-block">
                <h2>{{__('main.we_help_our_clients_sell_buy_or_rent_properties_hassle_free')}}</h2>
                {{-- <p>Utilizing his exceptional experience and knowledge of the luxury waterfront markets, Roland serves an
                  extensive and
                  elite worldwide client base. He enjoys a reputation as a tenacious Broker.</p> --}}
  
                <ul>
                  @foreach ($services as $service )
                  <li><i class="{{$service->icon}}"></i> {{$service->service}}</li>                    
                  @endforeach
                </ul>
  
                <a href="{{route('front.contact-us')}}" class="mt-5 site-btn">{{__('main.contact_us_today')}}</a>
              </div>
  
            </div>
            <div class="col-xl-6 mt-4 mt-xl-0">
              <div class="row m-0 align-items-xl-start">
                @foreach ($services as $service )
                  <div class="col-xl-6 col-lg-3 col-md-6 p-2">
                    <div class="service @if($loop->index % 2) move-top @endif">
                      <div class="service__icon" @if($loop->index % 2) style="--bg: #F9D9EA" @else style="--bg: #e0f0fd" @endif >
                        <i class="{{$service->icon}}"></i>
                      </div>
                      <h2 class="service__title">{{$service->service}}</h2>
                      <p class="service__desc">{{$service->description}}</p>
                    </div>
                  </div>
                @endforeach
              </div>
            </div>
          </div>
  
        </div>
  
      </section>
      <!-- End Services -->