<section class="Wdgt">
    <div class="Title">
        <div class="View AAIco-remove_red_eye">&nbsp; &nbsp;{{ $item['label'] }}</div>
    </div>
    <ul class="MovieList">
        @foreach ($item['data'] as $movie)
            <li>
                <div class="TPost A">
                    <a rel="bookmark" href="{{ $movie->getUrl() }}">
                        <span class="Top">#{{ $loop->index + 1 }}<i></i></span>
                        <div class="Image">
                            <figure class="Objf TpMvPlay AAIco-play_arrow"><img width="55" height="85"
                                    data-src="{{ $movie->getThumbUrl() }}"
                                    src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAA1JREFUGFdjOHPmzH8ACDADZKt3GNsAAAAASUVORK5CYII="
                                    class="lazy attachment-img-mov-sm size-img-mov-sm wp-post-image"
                                    alt="{{ $movie->name }} - {{ $movie->origin_name }}"></figure>
                        </div>
                        <div class="Title">{{ $movie->name }}</div>
                    </a>
                    <p class="Info">
                        <span class="Vote AAIco-star">{{ $movie->getRatingStar() }}</span>
                        <span class="Date AAIco-date_range">{{ $movie->publish_year }}</span>
                        <span class="View AAIco-remove_red_eye">{{ formatViews($movie->view_total) }}</span>
                        <br />
                        <span class="Qlty">{{ $movie->quality }} - {{ $movie->language }}</span>
                    </p>
                </div>
            </li>
        @endforeach
    </ul>
</section>
