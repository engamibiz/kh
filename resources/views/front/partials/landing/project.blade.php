
<main id="main-content" class="main-content">
    <div class="hero">
        <div class="bg-image">
            @forelse($project->attachments as $attachment)
            @if($loop->index == 0)
            <meta itemprop="{{$project->project}}" content="{{file_exists(public_path('/storage/dimensionals/uploads/'.$attachment->file_name_without_extension.'_280x300'.'.'.$attachment->extension)) ? asset('storage/dimensionals/uploads/'.$attachment->file_name_without_extension.'_280x300'.'.'.$attachment->extension) : $attachment->url}}" />
            <img src="{{$attachment->url}}" alt="{{$attachment->alt}}" itemprop="{{$project->project}}">
            @else
            @break
            @endif
            @empty
            <img src="{{URL::asset('front/img/placeholder.jpg')}}" alt="{{$project->project}}">
            @endforelse
        </div>
    </div>

    <div class="fullwidth-block project-info">
        <div class="container">
            <header>
                <h2 class="section-title">{{ $project->project }}</h2>
            </header>
                <div class="col-12">
                    {{ strip_tags($project->landing_description) }}
                </div>
        </div>
    </div>

    <div class="fullwidth-block">
        <div class="container">
            <header>
                <h2 class="section-title">{{__('main.gallary')}}</h2>
            </header>
            <div class="gallery-grid">
                @foreach($project->attachments as $attachment)
                <figure class="block">
                    <a class="img-link" href="{{$attachment->url}}">
                        <img src="{{$attachment->url}}" class="block__img" alt="">
                    </a>
                </figure>
                @endforeach
            </div> <!-- .gallery-grid -->

        </div> <!-- .container -->
    </div>

    <div class="fullwidth-block">
        <div class="container">

            <div class="row mt-5">
                <div class="col-md-6">
                    <div class="media-holder" id="map">
                    </div>
                </div>
                <div class="col-md-6 mt-3 mt-md-0">
                    <div class="media-holder">
                        {!! $project->video !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="fullwidth-block contact-form">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="request-form">
                        <h2 class="form-title text-center">{{__('main.get_in_touch')}}</h2>
                        <form action="#" class="mt-3form-contact"
                        action="{{ route('contact_us.contact_us.store') }}" method="POST" data-parsley-validate>
                        @csrf
                        <input type="hidden" name="link" value="{{ Request::url() }}">
                        <input type="hidden" name="type" value="contact">
                        <input type="hidden" name="model_name" value="{{ $project->project }}">

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="field">
                                        <label>{{__('users.full_name')}}</label>
                                        <input type="text"name="full_name" 
                                        placeholder="{{ __('users.full_name') }}" data-parsley-trigger="change focusout"
                                        required data-parsley-required-message="{{ __('main.please_enter_your_name') }}">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="field">
                                        <label>{{ __('users.mobile_number') }}</label>
                                        <input type="text" class="phone-input">
                                    </div>
                                </div>
                            </div>
                            <div class="field">
                                <label>{{ __('users.email') }}</label>
                                <input type="text">
                            </div>
                            <div class="field">
                                <label>{{ __('contactus::contact_us.message') }}</label>
                                <textarea rows="3" name="message" data-parsley-trigger="change focusout"></textarea>
                            </div>
                            <div class="field">
                                <input type="button" class="button contact-from" value="{{__('main.send_message')}}">
                            </div>
                        </form>
                    </div> <!-- .request-form -->
                </div>
                <div class="col-md-6 d-none d-md-block">
                    <div class="contact-img">
                        <img src="{{asset('front/landing/images/contact-img.svg')}}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>