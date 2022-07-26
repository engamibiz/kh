<div class="col-12 cat-div">
    @foreach($blogs as $blog)
        <!-- Include blog component -->
        @include('front.components.blog')
        <!-- ./ Include blog component -->
    @endforeach
</div>

<div class="col-12 justify-content-center blog-pagination">
    @if($blogs->hasPages())
        {{$blogs->appends(request()->input())->links('front.partials.primary.pagination')}}
    @endif
</div>
{{-- 
<script>
    // Click on pagination link
    $('.blog-pagination a').on('click', function(e){
        e.preventDefault();

        // Final url construction
        var final_url = $(this).attr('href');

        // Check id
        if (final_url.includes('id=')) {
            var url_object = new URL(final_url);
            var id = url_object.searchParams.get("id");
        } else {
            var id = '';
        }

        $.get(final_url).done(function(res) {
            // Check if no category selected "all data returned"
            if (!id) {
                $('#category-all').html(res);
            } else {
                // Category selected, update category tab
                $(`#category-${id}`).html(res);
            }

            // Change window url
            window.history.pushState({"html": final_url, "pageTitle": '{{trans('blog::blog.blogs')}}'}, "", final_url);
        });
    });
</script> --}}