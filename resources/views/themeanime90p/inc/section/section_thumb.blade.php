<section>
    <div class="Top title-home">         
        <h2>
            <a href="{{ $item['link'] }}">{{ $item['label'] }} </a>
        </h2>
        <span class="icon-arrow">▶</span>
        <a href="{{ $item['link'] }}" class="icon-plus">+</a>
    </div>
    <ul class="MovieList Rows AX A06 B04 C03 E20">
        @foreach ($item['data'] as $movie)
            @include('themes::themeanime90p.inc.section.section_thumb_item')
        @endforeach
    </ul>
    <div class="watch-more">
        <a href="{{ $item['link'] }}" class=" btn-watchmore" >Xem Thêm <i class=" fa fa-angle-right"></i></a>
    </div>
</section>
