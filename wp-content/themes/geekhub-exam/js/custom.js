$( document ).ready(function() {

//Clients slider
    $('.clients-slider').slick({
        infinite: true,
        slidesToShow: 4,
        slidesToScroll: 1,
        dots: false,
        autoplay: true,
        arrows: false,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 4,
                    slidesToScroll: 4,
                    infinite: true,
                    dots: true
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]

    });
//Clients slider end
//Scroll down
    $('.arrow-icon').click(function(){
        $('html, body').animate({scrollTop:$('#welcome').position().top}, 2000);
    });

//Scroll down end
//    STIKY FOOTER
    var foot_height = $('.site-footer').height();
    var head_height = $('.site-header').height();
    var site_height = $(window).height();
    var content_height = site_height - head_height - foot_height;
    $('.site-content').css("min-height", content_height);
//    STIKY FOOTER END
});
