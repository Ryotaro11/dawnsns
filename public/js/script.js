$(function() {
    $('.modalopen').each(function() {
        $(this).on('click', function() {
            var target = $(this).data('target');
            var modal = document.getElementById(target);
            console.log(modal);
            $(modal).fadeIn();
            return false;
        });
    });
    $('.inner').on('click touchend', function (event) {
        if (!$(event.target).closest('.inner-content').length) {
            $('.js-modal').fadeOut();
            return false;
        }
    });
    // $('.modalClose').on('click', function() {
    //     $('.js-modal').fadeOut();
    //     return false;
    // });
});
//ハンバーガーメニュー
// $(function() {
//     $('.menu-trigger').click(function() {
//         var test = 1;
//         console.log(test)
//         $(this).toggleClass('active');
//         if ($(this).hasClass('active')) {
//             $('.gnavi').addClass('active');
//         } else {
//             $('.gnavi').removeClass('active');
//         }
//     });
// });
$(function() {
        $('.menu-trigger').click(function() {
            $(this).toggleClass('active');
            if ($(this).hasClass('active')) {
                $('.gnavi').addClass('active');
            } else {
                $('.gnavi').removeClass('active');
            }
        });
    });
// $(function() {
//     $('.menu-trigger').click(function() {
//         $('.gnavi').slideToggle();
//     });
// });
//メニュー内を閉じておく
$(function() {
    $('.gnavi').click(function() {
        $('.gnavi').removeClass('active');
       $('.menu-trigger').removeClass('active');

    });
});
