<div class="dev-holder">
    <a href="{{ route('front.developers.show', ['id' => $developer->id, 'slug' => $developer->slug]) }}"
        class="dev-img">
        @forelse($developer->attachments as $attachment)
            @if ($loop->index == 0)
                <img src="{{ file_exists(public_path('/storage/dimensions/uploads/' .$attachment->file_name_without_extension .'_125x125' .'.' .$attachment->extension))? asset('storage/dimensions/uploads/' .$attachment->file_name_without_extension .'_125x125' .'.' .$attachment->extension): $attachment->url }}"
                    alt="{{ $attachment->file_name }}">
            @break
        @endif
    @empty
        <img src="{{ URL::asset('front/images/placeholder.png') }}" alt="placeholder">
    @endforelse
</a>
<h6 class="dev-name"><a
        href="{{ route('front.developers.show', ['id' => $developer->id, 'slug' => $developer->slug]) }}">{{ $developer->developer }}</a>
</h6>
</div>
