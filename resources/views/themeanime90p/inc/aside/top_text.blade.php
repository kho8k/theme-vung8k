
<section class="Wdgt">
    <div class="Title">
        <div class="Lnk AAIco-movie_filter">&nbsp; &nbsp;{{ $item['label'] }}</div>
    </div>
    <ul class="MovieList Newepisode">
        <!-- @foreach ($item['data'] as $movie)
            <li>
                <a href="{{ $movie->getUrl() }}" class="top_movie_week" title="{{ $movie->name }}">
                    <div class="number_movie" >
                            <span class="number-top"
                                >{{ $loop->iteration }}</span>

                    </div>
                    <div class="list_info_movie">
                        <div class="list_top_name">{{ $movie->name }}</div>
                        <div class="list_top_view">{{ formatViews($movie->view_week) }} lượt xem</div>
                    </div>
                </a>
            </li>
        @endforeach -->
        @foreach ($item['data'] as $movie)
            <li>
                <div class="TPost A">
                    <a rel="bookmark" href="{{ $movie->getUrl() }}">
                        <div class="Image">
                            <figure class="Objf TpMvPlay AAIco-play_arrow"><img width="55" height="85"
                                    data-src="{{ $movie->getThumbUrl() }}"
                                    src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAA1JREFUGFdjOHPmzH8ACDADZKt3GNsAAAAASUVORK5CYII="
                                    class="lazy attachment-img-mov-sm size-img-mov-sm wp-post-image"
                                    alt="{{ $movie->name }} - {{ $movie->origin_name }}"></figure>
                        </div>
                        <div class="list_info_movie">
                        <div class="list_top_name">{{ $movie->name }}</div>
                        <div class="list_top_view">{{ formatViews($movie->view_week) }} lượt xem</div>
                         <!-- {{ formatViews($movie->view_total) }}  -->
                        <div class="list_top_star">Điểm :{{ formatViews($movie->getRatingStar())}} </div>
                    </div>
                    </a>
                </div>
            </li>
        @endforeach
    </ul>
</section>
