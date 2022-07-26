<div class="project-card" itemscope itemtype="https://schema.org/Product">

    <a href="{{ route('front.singleProject', ['id' => $project->id, 'slug' => $project->slug]) }}" class="proj-img"
        itemprop="url">
        @forelse($project->attachments as $attachment)
            @if (file_exists(public_path('/storage/' . $attachment->path)))
                <meta itemprop="{{ $project->project }}"
                    content="{{ file_exists(public_path('/storage/dimensionals/uploads/' .$attachment->file_name_without_extension .'_280x300' .'.' .$attachment->extension))? asset('storage/dimensionals/uploads/' .$attachment->file_name_without_extension .'_280x300' .'.' .$attachment->extension): $attachment->url }}" />
                <img src="{{ file_exists(public_path('/storage/dimensionals/uploads/' .$attachment->file_name_without_extension .'_280x300' .'.' .$attachment->extension))? asset('storage/dimensionals/uploads/' .$attachment->file_name_without_extension .'_280x300' .'.' .$attachment->extension): $attachment->url }}"
                    alt="{{ $attachment->alt }}" itemprop="{{ $project->project }}">
            @break
        @endif
    @empty
        <img src="{{ URL::asset('front/images/placeholder.png') }}" alt="{{ $project->project }}">
    @endforelse
</a>

<div class="proj-logo">
    @if ($project->developer)
        <a href="{{ route('front.singleProject', ['id' => $project->id, 'slug' => $project->slug]) }}" target="_blank"
            itemprop="url">
            @forelse($project->developer->attachments as $attachment)
                @if ($loop->index == 0)
                    <img src="{{ file_exists(public_path('/storage/dimensions/uploads/' .$attachment->file_name_without_extension .'_125x125' .'.' .$attachment->extension))? asset('storage/dimensions/uploads/' .$attachment->file_name_without_extension .'_125x125' .'.' .$attachment->extension): $attachment->url }}"
                        alt="{{ $attachment->file_name }}" itemprop="logo">
                @break
            @endif
        @empty
            <img src="{{ URL::asset('front/images/placeholder.png') }}"
                alt="{{ $project->developer->developer_name }}" itemprop="logo">
        @endforelse
    </a>
@else
    <img src="{{ URL::asset('front/images/placeholder.png') }}" alt="No Developer" itemprop="logo">
@endif
</div>

<div class="proj-info">
<h4 class="proj-title"><a
        href="{{ route('front.singleProject', ['id' => $project->id, 'slug' => $project->slug]) }}"
        itemprop="url">{{ $project->project }}</a></h4>

<p class="proj-price" itemprop="offers" itemscope itemtype="https://schema.org/Offer">
    @if ($project->price_from)
        {{ __('main.starting_price') }}: <strong itemprop="price"
            content="">{{ $project->price_from }}</strong> <small>EGP</small>
    @endif
</p>

</div>

</div>
