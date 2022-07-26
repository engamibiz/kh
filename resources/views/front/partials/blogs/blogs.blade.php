  <nav aria-label="breadcrumb">
    <div class="container-fluid">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{route('front.home')}}">{{__('main.home_title')}}</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">{{__('blog::blog.blogs')}}</li>
        </ol>
    </div>
</nav>
  <!-- END BREADCRUMB -->
  
  <!-- START PAGE WRAPPER -->
  <main class="main-content">

    <!-- START blogs-holder  -->
    <section aria-label="section" class="blogs-holder mb-1 py-5">
      <div class="container-fluid">
        <div class="grid-container">
            @foreach($blogs as $blog)
                @include('front.components.blog',['blog' => $blog])
            @endforeach
        </div>
        @if($blogs->hasPages())
            {{$blogs->appends(request()->input())->links('front.partials.primary.pagination')}}
        @endif
      </div>
    </section>
    <!-- END blogs-holder  -->

  </main>
  <!-- END PAGE WRAPPER -->