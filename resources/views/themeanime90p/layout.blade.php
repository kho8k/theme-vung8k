@extends('themes::layout')
<?php
if (!function_exists('formatViews')) {
    function formatViews($views)
    {
        if ($views >= 1000000) {
            return round($views / 1000000, 1) . 'M';
        } elseif ($views >= 1000) {
            return round($views / 1000, 1) . 'K';
        }
        return $views;
    }
}
?>
@php
    $menu = \Kho8k\Core\Models\Menu::getTree();
    $tops = Cache::remember('site.movies.tops', setting('site_cache_ttl', 5 * 60), function () {
        $lists = preg_split('/[\n\r]+/', get_theme_option('hotest'));
        $data = [];
        foreach ($lists as $list) {
            if (trim($list)) {
                $list = explode('|', $list);
                [$label, $relation, $field, $val, $sortKey, $alg, $limit, $template] = array_merge($list, [
                    'Phim hot',
                    '',
                    'type',
                    'series',
                    'view_total',
                    'desc',
                    4,
                    'top_thumb',
                ]);
                try {
                    $data[] = [
                        'label' => $label,
                        'template' => $template,
                        'data' => \Kho8k\Core\Models\Movie::when($relation, function ($query) use (
                            $relation,
                            $field,
                            $val
                        ) {
                            $query->whereHas($relation, function ($rel) use ($field, $val) {
                                $rel->where($field, $val);
                            });
                        })
                            ->when(!$relation, function ($query) use ($field, $val) {
                                $query->where($field, $val);
                            })
                            ->orderBy($sortKey, $alg)
                            ->limit($limit)
                            ->get(),
                    ];
                } catch (\Exception $e) {
                    # code
                }
            }
        }

        return $data;
    });

@endphp


@push('header')
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;400;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('/themes/anime90p/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('/themes/anime90p/css/fonts.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('/themes/anime90p/css/layoutStyle.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('/themes/anime90p/css/detailMoviStyle.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('/themes/anime90p/css/watchMoviStyle.css') }}" />
@endpush

@section('body')
    <div class="Tp-Wp" id="Tp-Wp">
        @include('themes::themeanime90p.inc.header')
        @if (get_theme_option('ads_header'))
            <div class="ad-container">
                {!! get_theme_option('ads_header') !!}
            </div>
        @endif
        <div class="Body Container">
            <div class="Content">
                <div class="content">
                    @yield('slider_recommended')
                    @yield('breadcrumb')
                    @yield('catalog_filter')
                    <div class="TpRwCont">
                        @yield('content')
                        @include('themes::themeanime90p.inc.aside')
                    </div>
                </div>
            </div>
        </div>
        @include('themes::themeanime90p.inc.footer')


    </div>
@endsection


@section('footer')
    @if (get_theme_option('ads_catfish'))
        <div id="catfish" style="width: 100%;position:fixed;bottom:0;left:0;z-index:222" class="mp-adz">
            <div style="margin:0 auto;text-align: center;overflow: visible;" id="container-ads">
                {!! get_theme_option('ads_catfish') !!}
            </div>
        </div>
    @endif

    <script type="text/javascript">
        function JS_Load(u) {
            var d = document,
                p = d.getElementsByTagName('HEAD')[0],
                c = d.createElement('script');
            c.type = 'text/javascript';
            c.src = u;
            p.appendChild(c);
        }
    </script>
    <script type="text/javascript">
        JS_Load('/themes/anime90p/js/default.include-footer.js');
    </script>

    <script type="text/javascript" src="{{ asset('/themes/anime90p/js/jquery-2.1.0.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/themes/anime90p/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/themes/anime90p/js/fx/util.js') }}"></script>
    <script>
        jQuery(document).ready(function(t) {
            $(".AAIco-arrow_upward").click(function() {
                $("html, body").animate({
                    scrollTop: 0
                }, "slow");
                return false;
            });
        })

        // Lazyload image
        document.addEventListener("DOMContentLoaded", function() {
            var lazyImages = [].slice.call(document.querySelectorAll("img.lazy"));

            if ("IntersectionObserver" in window) {
                let lazyImageObserver = new IntersectionObserver(function(entries, observer) {
                    entries.forEach(function(entry) {
                        if (entry.isIntersecting) {
                            let lazyImage = entry.target;
                            lazyImage.src = lazyImage.dataset.src;
                            lazyImage.classList.remove("lazy");
                            lazyImageObserver.unobserve(lazyImage);
                        }
                    });
                });

                lazyImages.forEach(function(lazyImage) {
                    lazyImageObserver.observe(lazyImage);
                });
            } else {
                // Possibly fall back to event handlers here
            }
        });
        // End lazy load image
    </script>
    {!! setting('site_scripts_google_analytics') !!}
@endsection

@push('scripts')
@endpush
