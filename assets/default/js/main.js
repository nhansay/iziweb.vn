$(document).ready(function() {
    // show search box
    is_show_search_box = false;
    $("#top-search-form>button").click(function(event) {
        if (!is_show_search_box) {
            event.preventDefault();
            $(this).stop().animate({
                backgroundColor: "#EE2925"
            });
            $("#top-search-form>input").show();
            $("#top-search-form>input").stop().animate({
                width: "200px"
            });
        }
    });

    // hide search box
    $("#top-search-form>input").blur(function() {
        $(this).animate({
            width: "0"
        }, function() {
            $(this).hide();
        });
        $("#top-search-form>button").stop().animate({
            backgroundColor: "#000"
        })
    });

    // animate menu items background
    $("#menu ul>li").hover(function() {
        $(this).stop().animate({
            backgroundColor: "#303030"
        });
    }, function() {
        $(this).stop().animate({
            backgroundColor: "#000"
        });
    });

    // feature box animate
    $(".feature-box").hover(function() {
        $(this).find("i").stop().animate({
            opacity: "0"
        }, 100);
        $(this).find("div").stop().animate({
            "margin-top": "-105px"
        }, 400);
        $(this).find("p").show();
    }, function() {
        $(this).find("div").stop().animate({
            "margin-top": "15px"
        }, 400, function() {
            $(this).parent().find("p").hide();
        });
        $(this).find("i").stop().animate({
            opacity: "1"
        }, 100);
    });

    // project hover animate
    $(".project-box").hover(function() {
        $(this).find(".hover").stop().animate({
            opacity: "1",
            top: "0"
        });
    }, function() {
        $(this).find(".hover").stop().animate({
            opacity: "0",
            top: "150px"
        });
    });

    // slide animate
    $(".slide-item img").animate({
        "margin-left": "50px"
    }, 500, function() {
//        $(this).animate({
//            "margin-left": "100px"
//        });
    });
});