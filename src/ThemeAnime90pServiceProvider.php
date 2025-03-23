<?php

namespace Kho8k\ThemeAnime90p;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class ThemeAnime90pServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->setupDefaultThemeCustomizer();
    }

    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views/', 'themes');

        $this->publishes([
            __DIR__ . '/../resources/assets' => public_path('themes/anime90p')
        ], 'anime90p-assets');
    }

    protected function setupDefaultThemeCustomizer()
    {
        config(['themes' => array_merge(config('themes', []), [
            'anime90p' => [
                'name' => 'Anime90p',
                'author' => 'opdlnf01@gmail.com',
                'package_name' => 'kho8k/theme-anime90p',
                'publishes' => ['anime90p-assets'],
                'preview_image' => '',
                'options' => [
                    [
                        'name' => 'recommendations_limit',
                        'label' => 'Recommended movies limit',
                        'type' => 'number',
                        'value' => 10,
                        'wrapperAttributes' => [
                            'class' => 'form-group col-md-4',
                        ],
                        'tab' => 'List'
                    ],
                    [
                        'name' => 'per_page_limit',
                        'label' => 'Pages limit',
                        'type' => 'number',
                        'value' => 20,
                        'wrapperAttributes' => [
                            'class' => 'form-group col-md-4',
                        ],
                        'tab' => 'List'
                    ],
                    [
                        'name' => 'movie_related_limit',
                        'label' => 'Movies related limit',
                        'type' => 'number',
                        'value' => 10,
                        'wrapperAttributes' => [
                            'class' => 'form-group col-md-4',
                        ],
                        'tab' => 'List'
                    ],
                    [
                        'name' => 'latest',
                        'label' => 'Home Page',
                        'type' => 'code',
                        'hint' => 'display_label|relation|find_by_field|value|limit|show_more_url|show_template (slider_poster|section_thumb)',
                        'value' => "Phim chiếu rạp||is_shown_in_theater|1|6|/danh-sach/phim-bo|slider_poster\r\nPhim bộ mới||type|series|10|/danh-sach/phim-bo|section_thumb\r\nPhim lẻ mới||type|single|10|/danh-sach/phim-le|section_thumb",
                        'attributes' => [
                            'rows' => 5
                        ],
                        'tab' => 'List'
                    ],
                    [
                        'name' => 'hotest',
                        'label' => 'Danh sách hot',
                        'type' => 'code',
                        'hint' => 'Label|relation|find_by_field|value|sort_by_field|sort_algo|limit|show_template (top_text|top_thumb|top_poster)',
                        'value' => "Phim sắp chiếu||status|trailer|publish_year|desc|4|top_poster\r\nTop phim lẻ||type|single|view_total|desc|9|top_text\r\nTop phim bộ||type|series|view_total|desc|9|top_thumb",
                        'attributes' => [
                            'rows' => 5
                        ],
                        'tab' => 'List'
                    ],
                    [
                        'name' => 'additional_css',
                        'label' => 'Additional CSS',
                        'type' => 'code',
                        'value' => "<style>img.logoiframe {width: 15%;position: absolute;top: 2%;left: 3%;background-color: #00000010;z-index: 100;}</style>",
                        'tab' => 'Custom CSS'
                    ],
                    [
                        'name' => 'body_attributes',
                        'label' => 'Body attributes',
                        'type' => 'text',
                        'value' => "class='home blog wp-custom-logo NoBrdRa' style='background-image: url(/themes/anime90p/images/background.png);'",
                        'tab' => 'Custom CSS'
                    ],
                    [
                        'name' => 'additional_header_js',
                        'label' => 'Header JS',
                        'type' => 'code',
                        'value' => "",
                        'tab' => 'Custom JS'
                    ],
                    [
                        'name' => 'additional_body_js',
                        'label' => 'Body JS',
                        'type' => 'code',
                        'value' => <<<HTML
                        <script>
                            document.addEventListener("DOMContentLoaded", function() {
                                setTimeout(function() {
                                    var playerDiv = document.getElementById("dooplay_player_response");

                                    if (playerDiv) {
                                        var imgElement = document.createElement("img");
                                        imgElement.src = "/storage/images/logovl.png";  // Đường dẫn hình ảnh
                                        imgElement.alt = "logo";  // Thuộc tính alt của ảnh
                                        imgElement.className = "logoiframe";  // Thêm class 'logoiframe'
                                        playerDiv.appendChild(imgElement);
                                    }
                                }, 500); // Chờ 1 giây sau khi script trước đã thực thi
                            });
                        </script>
                        <script>
                        var catfishDiv = `<div class="custom-banner-video">
                                                <div class="banner-ads">
                                                </div>
                                            </div>
                                            <style>
                                            .custom-banner-video {
                                                text-align: center;
                                                margin: 5px;
                                            }
                                            </style>
                                            `;
                                            var headerDiv = `
                                            <div class="custom-banner-video">
                                                <div class="banner-ads">
                                                </div>
                                            </div>
                                            <style>
                                            .custom-banner-video {
                                                text-align: center;
                                                margin: 5px;
                                            }
                                            
                                            </style>`;

                        var targetBottomElement = document.querySelector("#watch-block");
                        var targetTopElement = document.querySelector("#watch-block");
                        if (targetBottomElement) {
                            targetBottomElement.insertAdjacentHTML("afterend", catfishDiv);
                        }
                        if (targetTopElement) {
                            targetTopElement.insertAdjacentHTML("afterbegin", headerDiv);
                        }
                        </script>
                        HTML,
                        'tab' => 'Custom JS'
                    ],
                    [
                        'name' => 'additional_footer_js',
                        'label' => 'Footer JS',
                        'type' => 'code',
                        'value' => "",
                        'tab' => 'Custom JS'
                    ],
                    [
                        'name' => 'footer',
                        'label' => 'Footer',
                        'type' => 'code',
                        'value' => <<<EOT
                        <div class="WebDescription">
                            Phim Chiếu Rạp | <a href="#" class="z-link" target="blank"
                                title="mPhimMoi | Xem Phim Online | Phim Hay | Phim Mới">Phim Mới</a>
                            <br>
                            <a href="#" tag="" title="" target="_blank">Text Link</a>,
                            <a href="#" tag="" title="" target="_blank">Text Link</a>,
                            <a href="#" tag="" title="" target="_blank">Text Link</a>,
                            <a href="#" tag="" title="" target="_blank">Text Link</a>,
                        </div>
                        <div class="footer-line"></div>
                        <p class="Copy">
                            Copyright ® 2021. All Rights Reserved...
                        </p>
                        EOT,
                        'tab' => 'Custom HTML'
                    ],
                    [
                        'name' => 'ads_header',
                        'label' => 'Ads header',
                        'type' => 'code',
                        'value' => <<<EOT
                        <img src="" alt="">
                        EOT,
                        'tab' => 'Ads'
                    ],
                    [
                        'name' => 'ads_catfish',
                        'label' => 'Ads catfish',
                        'type' => 'code',
                        'value' => <<<EOT
                        <img src="" alt="">
                        EOT,
                        'tab' => 'Ads'
                    ]
                ],
            ]
        ])]);
    }
}
