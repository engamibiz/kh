
@push('scripts')
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v10.0" nonce="BzrEAzdr"></script>
@endpush
<!-- START BREADCRUMB -->
<nav aria-label="breadcrumb">
  <div class="container-fluid">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{route('front.home')}}">{{__('main.home_title')}}</a></li>
      <li class="breadcrumb-item"><a href="{{route('front.blogs')}}">{{__('blog::blog.blogs')}}</a></li>
      @if(!empty($blog->categories))
        <li class="breadcrumb-item"><a href="{{route('front.blogs',['category_slug'=>$blog->categories[0]->slug])}}">{{$blog->categories[0]->title}}</a></li>
      @endif
      <li class="breadcrumb-item active" aria-current="page">{{$blog->title}}</li>
    </ol>
  </div>
</nav>
<!-- END BREADCRUMB -->
  <!-- START PAGE WRAPPER -->
  <main class="main-content">

    <!-- START blogs-page  -->
    <section class="view-blog-page pb-5">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-8">
            <div class="blog">
              <div class="blog__image">
                @foreach($blog->attachments as $attachment)
                  <img  src="{{file_exists(public_path('/storage/dimensions/uploads/'.$attachment->file_name_without_extension.'_560x400'.'.'.$attachment->extension)) ? asset('storage/dimensions/uploads/'.$attachment->file_name_without_extension.'_560x400'.'.'.$attachment->extension) : $attachment->url}}" alt="{{$attachment->file_name}}">
                @endforeach

              </div>
              
              <div class="blog__details">
                <h6 class="blog-title text-capitalize">{{$blog->title}}</h6>
                <p class="blog-info">
                  
                    <span class="mr-3"><bdi> <i class="far fa-edit"></i>{{$blog->blog_creator ?? $blog->creator->full_name}} </bdi></span>
                    <span> <bdi><i class="far fa-clock"></i> {{date('d M Y',strtotime($blog->blog_date ?? $blog->created_at))}} </bdi></span>
                </p>
                {!! $blog->description !!}

              </div>
            </div>
          </div>
          <div class="col-md-4">
            <aside class="sidebar">
              <div class="widget">
                <h5 class="widget__title">{{__('main.letest_news')}}</h5>
                <ul class="widget__list">
                  @foreach($related_blogs as $related_blog)
                    <li>
                      <a href="{{route('front.single_blog',['id' => $related_blog->id,'slug' =>$related_blog->slug])}}">
                        @if ($related_blog->attachments && isset($related_blog->attachments[0]))
                          <img src="{{file_exists(public_path('/storage/dimensions/uploads/'.$related_blog->attachments[0]->file_name_without_extension.'_370x300'.'.'.$related_blog->attachments[0]->extension)) ? asset('storage/dimensions/uploads/'.$related_blog->attachments[0]->file_name_without_extension.'_370x300'.'.'.$related_blog->attachments[0]->extension) : $related_blog->attachments[0]->url}}" alt="{{$related_blog->attachments[0]->file_name}}" />
                        @else
                          <img src="{{URL::asset('front/images/placeholder.png')}}" alt="placeholder image" />
                        @endif
                        {{$related_blog->title}}
                      </a>
                    </li>
                  @endforeach
                </ul>
              </div>
              <div class="widget mt-3">
                <h5 class="widget__title">{{__('main.archives')}}</h5>
                <ul class="widget__list">
                  @foreach($archives as $archive)
                  <li>
                    <a href="{{route('front.blogs',['created_at' => date('Y-m',strtotime($archive->created_at))])}}">{{$archive->new_date}}</a>
                  </li>
                @endforeach
                </ul>
              </div>
            </aside>
          </div>
        </div>
      </div>
    </section>
    <!-- END blogs-page  -->

  </main>
  <!-- END PAGE W