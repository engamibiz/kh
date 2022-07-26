@section('title',trans('services::services.services'))

<nav id="breadcrumb" class='mb-3'>
  <ul>
    <li>
      <a href="{{route('front.home')}}">
        <ion-icon name="home-outline"></ion-icon>
      </a>
    </li>
    <li class="active"><a>{{__('services::services.services')}}</a></li>
  </ul>
</nav> <!-- #/ breadcrumb-->
<div class="hero-bg"><img src="{{URL::asset('/front/images/services-bg.jpg')}}" alt="services banner"></div>
<div class="our-services">
  <div class="inner-floating-text">
    <h1 class="text-capitalize">{{__('main.our_services')}}</h1>
    <!-- <p class="description text-capitalize">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam repudiandae saepe, fuga, facere eveniet adipisci recusandae voluptatem animi eligendi, laborum incidunt necessitatibus. Qui voluptatum repellat dignissimos, quam velit ex tenetur. Corrupti officia repellat repellendus! Eum amet eos asperiores quia autem nemo quisquam, soluta unde beatae fugit magni inventore a sint.</p> -->
  </div>
  <div class="services-list mt-5">
    <div class="row">
      @foreach($services as $service)
        <div class="col-lg-4 col-md-6 mb-4">
          <div class="service-card">
            <div class="logo logo-service">
              @if ($service->attachments && isset($service->attachments[0]))
                <img src="{{file_exists(public_path('/storage/dimensions/uploads/'.$service->attachments[0]->file_name_without_extension.'_70x70'.'.'.$service->attachments[0]->extension)) ? asset('storage/dimensions/uploads/'.$service->attachments[0]->file_name_without_extension.'_70x70'.'.'.$service->attachments[0]->extension) : $service->attachments[0]->url}}" alt="{{$service->attachments[0]->file_name}}">
              @else
                <img src="{{URL::asset('front/images/placeholder.png')}}" alt="{{$service->title}}">
              @endif
            </div>
            <span class="service-title">{{$service->title}}</span>
            <p class='desc'>{{$service->description}}</p>
          </div>
        </div>
      @endforeach
    </div>
    @if($services->hasPages())
        {{$services->appends(request()->input())->links('front.components.pagination')}}
    @endif
  </div>
</div>