<div class="MovieListSldCn">
    <div class="MovieListSld owl-carousel">
        @foreach ($item['data'] as $movie)
            <div class="TPostMv">
                <div class="TPost D">
                    <a href="{{ $movie->getUrl() }}">
                        <div class="Image">
                            <figure class="Objf">
                                <img class="TPostBg lazy" data-src="{{ $movie->getPosterUrl() }}"
                                    src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAA1JREFUGFdjOHPmzH8ACDADZKt3GNsAAAAASUVORK5CYII="
                                    alt="{{ $movie->name }}" title="{{ $movie->name }}">
                            </figure>
                        </div>
                    </a>
                    <div class="TPMvCn">
                        <a href="{{ $movie->getUrl() }}">
                            <div class="Title">{{ $movie->name }}</div>
                        </a>

                        <div class="Description">
                            <p>{!! mb_substr($movie->content, 0, 80, 'utf-8') !!}...</p>
                        </div>
                        <a href="{{ $movie->getUrl() }}" class="Button TPlay AAIco-play_arrow">Xem Ngay
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
