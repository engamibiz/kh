 @if (count($units))


 <!-- START units -->
 <section class="section units-holder">
     <svg class="sec-shape" viewBox="0 0 2600 131.1">
         <path d="M0 0L2600 0 2600 69.1 0 0z"></path>
     </svg>
     <div class="container-fluid padding-block">
         <div class="section-title">
             <h2 class="title">{{ __('main.properties') }}</h2>
         </div>
         <div class="swiper units-slider">
             <div class="swiper-wrapper">
                 @foreach ($units as $unit)
                     <div class="swiper-slide">
                         @include('front.components.unit', ['unit' => $unit])
                     </div>
                 @endforeach
             </div>
             <div class="swiper-button-next units-next-btn"></div>
             <div class="swiper-button-prev units-prev-btn"></div>
         </div>
     </div>
 </section>
 @endif
 <!-- ENd units -->
