<div class="blog-card">
  <a href="{{route('front.single_blog',['id' => $blog->id,'slug' =>$blog->slug])}}" class="blog-image">
    @if ($blog->attachments && isset($blog->attachments[0]))
    <img src="{{file_exists(public_path('/storage/dimensions/uploads/'.$blog->attachments[0]->file_name_without_extension.'_370x300'.'.'.$blog->attachments[0]->extension)) ? asset('storage/dimensions/uploads/'.$blog->attachments[0]->file_name_without_extension.'_370x300'.'.'.$blog->attachments[0]->extension) : $blog->attachments[0]->url}}" alt="{{$blog->attachments[0]->file_name}}" />
    @else
    <img src="{{URL::asset('front/images/placeholder.png')}}" alt="placeholder image" />
    @endif
  </a>
  <div class="blog-details">

    <div class="blog-time">
      <time>
        <strong class="day">{{date('d',strtotime($blog->blog_date ?? $blog->created_at))}}</strong>
        <span class="month">{{date('M',strtotime($blog->blog_date ?? $blog->created_at))}}</span>
      </time>
    </div>

    <div>
      <h5 class="blog-title"><a href="{{route('front.single_blog',['id' => $blog->id,'slug' =>$blog->slug])}}">{{ $blog->title}}</a></h5>
      <p class="blog-desc">
        {{ Str::limit(strip_tags($blog->description), 150, '...') }}
      </p>
    </div>

  </div>
</div>