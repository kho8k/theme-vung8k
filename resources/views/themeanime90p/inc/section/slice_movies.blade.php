@php
     use Kho8k\Core\Models\Movie;

$recommendations = Cache::remember('site.movies.recommendations', setting('site_cache_ttl', 5 * 60), function () {
    return Movie::where('is_recommended', true)
        ->limit(get_theme_option('recommendations_limit', 10))
        ->orderBy('updated_at', 'desc')
        ->get();
});
@endphp

<section class="slide-movies">
    <div class="Top title-home">
        <h2>
            <a href="{{ $item['link'] }}">{{ $item['label'] }} </a>
        </h2>
    </div>
    <div class="MovieListHome owl-carousel">
        @foreach ($item['data'] ?? [] as $movie)
        <article id="post-{{ $movie->id }}" class="TPost C post-carousel post-{{ $movie->id }} post type-post status-publish format-standard has-post-thumbnail hentry">
                    <a href="{{ $movie->getUrl() }}">
                        <div class="Image">
                            <figure class="Objf">
                                <img width="215" height="320" data-src="{{ $movie->getThumbUrl() }}"
                                    src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAA1JREFUGFdjOHPmzH8ACDADZKt3GNsAAAAASUVORK5CYII="
                                    class="lazy attachment-thumbnail size-thumbnail wp-post-image"
                                    alt="{{ $movie->name }} - {{ $movie->origin_name }} ({{ $movie->publish_year }})"
                                    title="{{ $movie->name }} - {{ $movie->origin_name }} ({{ $movie->publish_year }})" />
                            </figure>
                            <span
                                class="mli-quality">{{ $movie->type == 'series' ? $movie->episode_current : $movie->quality }}</span>
                            <span class=" AAIco-star rate-home">{{ $movie->getRatingStar() }}</span>
                        </div>
                        <h2 class="Title">{{ $movie->name }}</h2>
                        <span class="Year">{{ $movie->origin_name }}</span>
                    </a>

            </article>
        @endforeach
    </div>
</section>

