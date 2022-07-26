@section('page_name', trans('main.projects'))

{{-- @foreach($seo as $seo_project)
  @if($seo_project->page == 'projects')
    @if($seo_project->show_short_description)
      <div class="container mb-3">
        <div class="section-title mb-2">
          <h1 class="title text-center">{{__('main.projects')}}</h1>
        </div>
        @include('front.components.breif',['short_description' => $seo_project->short_description])
      </div>
    @endif
  @endif
@endforeach --}}


<!-- START BREADCRUMB -->
<nav aria-label="breadcrumb">
  <div class="container-fluid">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{route('front.home')}}">{{__('main.home_title')}}</a></li>
      <li class="breadcrumb-item active" aria-current="page">{{__('main.projects')}}</li>
    </ol>
  </div>
</nav>
<!-- END BREADCRUMB -->

<!-- START PAGE WRAPPER -->
<main class="main-content">

  <!-- START index-page  -->
  <section aria-label="section" class="index-page pb-5">
    <div class="container-fluid">
      @include('front.components.search-box',['url' => route('front.projects')])

      <div class="grid-container mt-5 pt-3">
        @if(isset($projects) && count($projects))
        @foreach($projects as $project)
        @include('front.components.project',['project' =>$project ])
        @endforeach
        @endif
    </div>

    @if($projects->hasPages())
    {{$projects->appends(request()->input())->links('front.partials.primary.pagination')}}
    @endif
    </div>
  </section>
  <!-- END index-page  -->

</main>
<!-- END PAGE WRAPPER -->
