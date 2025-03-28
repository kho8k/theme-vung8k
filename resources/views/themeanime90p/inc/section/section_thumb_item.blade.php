<li class="TPostMv">
    <article id="post-{{ $movie->id }}" class="TPost C post-{{ $movie->id }} post type-post status-publish format-standard has-post-thumbnail hentry">
        <a href="{{ $movie->getUrl() }}">
            <div class="Image">
                <figure class="Objf">
                    <img width="215" height="320" data-src="{{ $movie->getThumbUrl() }}"
                        src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAA1JREFUGFdjOHPmzH8ACDADZKt3GNsAAAAASUVORK5CYII="
                        class="lazy attachment-thumbnail size-thumbnail wp-post-image"
                        alt="{{ $movie->name }} - {{ $movie->origin_name }} ({{ $movie->publish_year }})"
                        title="{{ $movie->name }} - {{ $movie->origin_name }} ({{ $movie->publish_year }})" />
                </figure>
                <div class="play"></div>
                <span
                    class="mli-quality">{{ $movie->type == 'series' ? $movie->episode_current : $movie->quality }}</span>
                    @php
                        $categories = json_decode($movie->categories->pluck('name'), true);
                        $categoriesText = implode(', ', $categories);
                    @endphp
                    <div class="category-container">
                            @foreach ($categories as $category)
                                <span class="category-box">{{ $category }}</span>
                            @endforeach
                        </div>
            </div>
            <h2 class="Title">{{ $movie->name }}</h2>
            <span class="Year">{{ $movie->origin_name }}</span>
        </a>
        {{-- <div class="TPMvCn anmt">
            <div class="Title">{{ $movie->name }}</div>
            <p class="Info">
                <span class="Vote AAIco-star">{{ $movie->getRatingStar() }}</span>
                <span class="Time AAIco-access_time">{{ $movie->episode_time }}</span>
                <span class="Date AAIco-date_range">{{ $movie->publish_year }}</span>
            </p>
            <div class="Description">
                <p>{!! mb_substr(strip_tags($movie->content), 0, 142, 'utf-8') !!}...</p>
                <p class="Director AAIco-videocam">
                    <span>Đạo diễn:</span>
                    {{ count($movie->directors) ? $movie->directors->first()['name'] : 'N/A' }}
                </p>
                <p class="Genre AAIco-movie_creation">
                    <span>Thể loại:</span>
                    {!! count($movie->categories)
                        ? '<a href="' .
                            $movie->categories->first()->getUrl() .
                            '" title="' .
                            $movie->categories->first()['name'] .
                            '">' .
                            $movie->categories->first()['name'] .
                            '</a>'
                        : 'N/A' !!}
                </p>
                <p class="Actors AAIco-person">
                    <span>Diễn viên:</span>
                    {{ count($movie->actors) ? $movie->actors->first()['name'] : 'N/A' }} <i
                        class="Button STPa AAIco-more_horiz"></i>
                </p>
            </div>
        </div> --}}
    </article>
</li>
