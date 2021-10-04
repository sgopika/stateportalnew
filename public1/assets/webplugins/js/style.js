// Dark Mode Function
function dark_mode(class_name) {
    class_name.forEach(element => {
        if ($(element).hasClass('dark')) {
            $(element).removeClass('dark');
            dark_mode_counter = 0;
        }
        else{
            $(element).addClass('dark');
            dark_mode_counter = 1;
        }
    });
}

$(document).ready(function() {


    // For Screen Size>1024
    if ($(window).width() >= 992) {
        $(".dropdown").hover(function() {
            $(this).find(".dropdown-menu").toggleClass("show");
            $(this).find(".dropdown-toggle").toggleClass("active");
        });
    }

    // View Search Bar
    $(".kg_search_btn").click(function() {
        $(".search-form").slideToggle("slow", "linear");
    });


    // Change Font Functionality
    var $font_ele_collection = $("body,.kg-i-font,.kg-ii-font,.kg-iii-font,.kg-iv-font,.kg-v-font,.kg-vi-font,.kg-vii-font,.kg-viii-font,.kg-ix-font,h1,h2,h3,h4,h5,h6");
    var $font_counter = 0;
    $font_ele_collection.each(function() {
        var $this = $(this);
        $this.data("orig-size", $this.css("font-size"));
    });
    $("#kg-increase-font").click(function() {
        if ($font_counter < 4) {
            changeFontSize(1);
            $(".font-size-btn .list-group-item a").removeClass("active");
            $(this).addClass("active");
            $("#kg-decrease-font").removeClass("disabled");
            $font_counter++;
        }
    });
    $("#kg-decrease-font").click(function() {
        if ($font_counter > 0) {
            changeFontSize(-1);
            $font_counter--;
            $(".font-size-btn .list-group-item a").removeClass("active");
            $(this).addClass("active");
            if ($font_counter == 0 && !$("#kg-decrease-font").hasClass("disabled")) {
                $("#kg-decrease-font").addClass("disabled");
            }
        }
    });
    $("#kg-default-font").click(function() {
        $font_ele_collection.each(function() {
            var $this = $(this);
            $this.css("font-size", $this.data("orig-size"));
        });
        $font_counter = 0;
        $(".font-size-btn .list-group-item a").removeClass("active");
        $(this).addClass("active");
        if (!$("#kg-decrease-font").hasClass("disabled")) {
            $("#kg-decrease-font").addClass("disabled");
        }
    });

    function changeFontSize(direction) {
        $font_ele_collection.each(function() {
            var $this = $(this);
            $this.css("font-size", parseInt($this.css("font-size")) + direction);
        });
    }


    // Dark Mode Activator
    var dark_mode_counter = 0;
    $('#chk').change(function() {
        var class_name = ["body", "header", ".label", ".label .fas.fa-sun", ".label .ball", ".lang-btn", ".font-size-btn li a", ".main-title h1", ".main-title h4", ".light-img", ".dark-img", ".search", ".search_input", ".search_icon", ".search_icon .fa", ".main-nav-menu .dropdown-menu", ".main-nav-menu a.nav-link", ".main-nav-menu .dropdown-menu a.dropdown-item", ".main-nav-menu .dropdown-menu .dropdown-item:hover", ".kg-primary-bg", ".carousel-caption", ".banner-tag", ".first-alert .kg-alert", ".first-alert .kg-alert .long-msg", ".img-outer", ".img-border", ".third-alert .kg-alert-content h4", ".third-alert img", ".section-what-new #gov-details", ".section-what-new #cm-details", "#article-current", ".section-articles .article-author", ".article-schema .article-date", ".head-dark", ".section-what-new #col-new-updates .table-cell", "#show-all-updates", ".kg-bg-grey", ".footer-top", ".footer-text", ".footer-bottom","#youtube-toast .toast-body",".footer-top .col-connectwithus .fa",".sidebar .related-title",  ".dark-border", ".media-container .dark-text",".carousel-item img",".section-what-new .image-gov-cm img",".govt-websites .col img",".footer-logo",".article-current-img",".related-img",".article-container .article-images img",".media-container .img-container .figure img",".media-gallery img"];
        dark_mode(class_name);
    });


    // Image and Quote Carousel Functionality
    car_sync = $(".carousel-sync");
    car_sync.carousel({
        interval: 5000
    });
    car_sync.on('slide.bs.carousel', function(ev) {
        var dir = ev.direction == 'right' ? 'prev' : 'next';
        car_sync.not('.sliding').addClass('sliding').carousel(dir);
    });
    car_sync.on('slid.bs.carousel', function(ev) {
        car_sync.removeClass('sliding');
    });

    // Bottom right buttons hide/show on scroll
    $(window).scroll(function() {
        if ($(this).scrollTop() + $(window).height() > $(document).height() - 100) {
             $('#btn-to-top').fadeIn();
            
        } else {
            $('#btn-to-top').fadeOut();
            
        }
    });
    // scroll body to 0px on click
    $('#btn-to-top').click(function() {
        $('body,html').animate({
            scrollTop: 0
        }, 400);
        return false;
    });

    // Navigate to prev page
    $('#btn-kg-back').click(function(){
        window.history.back();
    });

});