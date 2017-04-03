$( document ).ready(function() {
// //      NAV-MENU
//     var flag = true;
//     var header = $('#masthead').height();
//     var navwrapp = $('.nav-wrapp').height();
//     var admin_bar = $('#wpadminbar').height();
//     $('#button-menu').on('click', function (e) {
//         if (flag) {
//             flag = false;
//
//             $('.nav-wrapp').css("top", header + admin_bar ).slideToggle(function () {
//                 flag = true;
//             });
//         }
//     });
// //    NAV-MENU END
//    STIKY FOOTER
    var foot_height = $('.site-footer').height();
    var head_height = $('.site-header').height();
    var site_height = $(window).height();
    var content_height = site_height - head_height - foot_height;
    $('.site-content').css("height", content_height);
//    STIKY FOOTER END
});
