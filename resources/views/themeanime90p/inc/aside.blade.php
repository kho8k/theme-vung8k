
@php
    $top_view_day = \Kho8k\Core\Models\Movie::orderBy('view_day', 'desc')->limit(15)->get();
@endphp

<aside class="widget-area" role="complementary">
    {{-- <div class="Dvr-300">
    </div> --}}


    @foreach ($tops as $item)
        @include('themes::themeanime90p.inc.aside.' . $item['template'])
    @endforeach
    {{-- <div class="Dvr-300">
    </div> --}}
    <div class="tag-list-main">
    </div>
</aside>
