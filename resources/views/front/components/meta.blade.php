@push('meta')
@section('page_name', $meta->title )

<meta name="title" content="{{ $meta->title }}" />
<meta name="keywords" content="{{ $meta->key_words }}" />
<meta name="description" content="{{ strip_tags($meta->description) }}" />
<!-- Twitter Card data -->
<meta name='twitter:app:country' content='EG' />
<meta name="twitter:site" content="@KHRealEstate" />
<meta name="twitter:creator" content="@KHRealEstate" />
<meta name="twitter:title" content="{{ $meta->title }}">
<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:image" content="{{ URL::asset('/front/images/logo.png') }}">
<meta name="twitter:description" content="{{ strip_tags($meta->description) }}" />
<!-- Open Graph data -->
<meta property="og:type" content="article" />
<meta property="og:site_name" content="Constguide">
<meta property="og:url" content="{{Request::url()}}" />
<meta property="og:title" content="{{$meta->title}}" />
<meta property="og:image" content="{{ URL::asset('/front/images/logo.png') }}">
<meta property="og:description" content="{{ strip_tags($meta->description) }}" />
@endpush