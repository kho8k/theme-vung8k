jQuery(document).ready(function () {
    var rated = false;
    var score_current = parseFloat(jQuery("#score_current").val()) || 0;
    var hint_current = jQuery("#hint_current").val();

    function formatScore(score) {
        return parseFloat(score).toFixed(1);
    }


    function updateScoreDisplay() {
        jQuery("#TPVotes").html("<span>Điểm</span> " + formatScore(score_current));
    }

    function scorehint(score) {
        var hints = {
            1: "Dở tệ",
            2: "Dở",
            3: "Không hay",
            4: "Không hay lắm",
            5: "Bình thường",
            6: "Xem được",
            7: "Có vẻ hay",
            8: "Hay",
            9: "Rất hay",
            10: "Hay tuyệt"
        };
        return hints[score] || "";
    }

    function updateStars(score) {
        jQuery("#star i").each(function (index) {
            if (index < Math.floor(score)) {
                jQuery(this).css("color", "#66cc33");
            } else if (index === Math.floor(score) && score % 1 !== 0) {
                jQuery(this).css("color", "#99e066");
            } else {
                jQuery(this).css("color", "#555");
            }
        });
    }

    updateScoreDisplay();
    updateStars(score_current);

    jQuery("#star i").on("mouseenter", function () {
        var index = jQuery(this).index() + 1;
        jQuery("#hint").html(scorehint(index));
        updateStars(index);
    });

    jQuery("#star").on("mouseleave", function () {
        jQuery("#hint").html(hint_current);
        updateStars(score_current);
    });

    jQuery("#star i").on("click", function () {
        if (!rated) {
            var score = jQuery(this).index() + 1;
            score_current = score;
            jQuery("#score_current").val(score_current);
            jQuery("#hint").html(scorehint(score_current));
            updateScoreDisplay();
            updateStars(score_current);

            console.log("Đang gửi đánh giá:", score);

            jQuery.ajax({
                url: URL_POST_RATING,
                type: "POST",
                dataType: "JSON",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content")
                },
                data: JSON.stringify({ rating: score }),
            })
                .done(function (data) {
                    console.log("Phản hồi từ server:", data);
                    if (data.status === "success") {
                        alert("Chúc mừng! Bạn đã gửi đánh giá thành công");

                        if (typeof data.rating_count !== "undefined") {
                            jQuery(".num-rating").text("(" + data.rating_count + " Đánh giá)");
                        }

                        if (typeof data.rating_star !== "undefined") {
                            score_current = parseFloat(data.rating_star);
                            jQuery("#score_current").val(score_current);
                            jQuery("#hint").html(scorehint(score_current));
                            updateScoreDisplay();
                            updateStars(score_current);
                        }

                        rated = true;
                    } else {
                        alert("Có lỗi xảy ra, đánh giá chưa được gửi đi.");
                    }
                })
                .fail(function (jqXHR, textStatus, errorThrown) {
                    console.error("Lỗi AJAX:", textStatus, errorThrown);
                    alert("Lỗi! Không thể gửi đánh giá. Hãy thử lại sau.");
                });
        } else {
            alert("Bạn đã đánh giá phim này rồi!");
        }
    });

    jQuery("#star").css("width", "170px");
    jQuery("#hint").css("font-size", "12px");
});
