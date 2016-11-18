jQuery(document).ready(function ($) {

    //init sliders
    $('.flexslider').flexslider({
        animation: "slide",
        controlNav: false
    });
    $('.testimonials-slider').flexslider({
        animation: "slide",
        controlNav: true
    });
    var width = $(window).width();
    var iw, mi, im;

    if ( width > 540 ) {
        iw = 300;
        mi = 1;
        im = 10;
    }
    if ( width > 640 ) {
        iw = 225;
        mi = 1;
        im = 5;
    }
    if (width > 900) {
        iw = 300;
        mi = 3;
        im = 5;
    }
    $('.happy-slider').flexslider({
        animation: "slide",
        animationLoop: true,
        itemWidth: iw,
        itemMargin: im,
        minItems: 1,
        maxItems: mi,
        controlNav: true,
        move: 1
    });
    //end sliders


    //set timer to end action
    var deadline = $('.sale-slogan').attr('data-end');
    initializeClock('clockdiv', deadline);

    function getTimeRemaining(endtime){
        var t = Date.parse(endtime) - Date.parse(new Date());
        var seconds = Math.floor( (t/1000) % 60 );
        var minutes = Math.floor( (t/1000/60) % 60 );
        var hours = Math.floor( (t/(1000*60*60)) % 24 );
        var days = Math.floor( t/(1000*60*60*24) );
        if ( days < 10 ) {
            days = '0'+days;
        }
        if ( hours < 10 ) {
            hours = '0'+hours;
        }
        if ( minutes < 10 ) {
            minutes = '0'+minutes;
        }
        if ( seconds < 10 ) {
            seconds = '0'+seconds;
        }
        return {
            'total': t,
            'days': days,
            'hours': hours,
            'minutes': minutes,
            'seconds': seconds
        };

    }


    //initialize actions timer
    function initializeClock(id, endtime){
        var clock = document.getElementById(id);
        var timeinterval = setInterval(function(){
            var t = getTimeRemaining(endtime);
            var timer = '<ul class="t" id="timer_c_2">';
            timer += '<li><div class="dts">' + t.days;
            timer += '<div class="l">'+$('.sale-slogan').attr('data-d')+'</div></div>';
            timer += '</li>';
            timer += '<li><div class="dts">' + t.hours;
            timer += '<div class="l">'+$('.sale-slogan').attr('data-h')+'</div></div>';
            timer += '</li>';
            timer += '<li><div class="dts">' + t.minutes;
            timer += '<div class="l">'+$('.sale-slogan').attr('data-m')+'</div></div>';
            timer += '</li>';
            timer += '<li><div class="dts">' + t.seconds;
            timer += '<div class="l">'+$('.sale-slogan').attr('data-s')+'</div></div>';
            timer += '</li>';
            timer += '</ul>';
            if ( $('.thumb-wrapper').length > 0 ) {
                clock.innerHTML = timer;
            }
            if(t.total<=0){
                clearInterval(timeinterval);
            }
        },1000);
    }
    if ( $('.thumb-wrapper').length == 0 ) {
        $('.for-sale').remove();
    }

    //cart modal
    $(document).on( 'click', '.send', function() {
        var $parrent = $(this).closest('.about-bouquet');
        var title = $parrent.find('.bouquet-title').text();
        var description = $parrent.find('.bouquet-title').attr('data-desc');
        var length = $parrent.find('.length').text();
        var price = $parrent.find('.price').text();
        var counter = $parrent.find('.counter').text();
        var image = $parrent.find('.wp-post-image').attr('src');
        var $order = $('#order');
        $order.find('.qty').text(counter);
        $order.find('.price').text(price);
        $order.find('.length').text(length);
        $order.find('.order-image').attr('src', image);
        $order.find('.bouquet-title').text(title);
        $order.find('.bouquet-description').html(description);
        $order.find('.stotal').text(price);
        $order.find('.sshipping').text('0 грн.');
        $order.find('.sfull-total').text(price);
        $order.find('.prize input').val('-');
        $order.find('.bouquet-name input').val(title).text(title);
        $order.modal("show");
    });

    $(document).on( 'click', '.actions-bouquet', function() {
        var $parrent = $(this).closest('.for-sale').find('.bouquet');
        var title = $parrent.find('.bouquet-title').text();
        var description = $parrent.find('.bouquet-title').attr('data-desc');
        var length = $parrent.find('.length').text();
        var price = $parrent.find('.price').text();
        var counter = $parrent.find('.counter').text();
        var image = $parrent.find('.wp-post-image').attr('src');
        var $order = $('#order');
        $order.find('.qty').text(counter);
        $order.find('.price').text(price);
        $order.find('.length').text(length);
        $order.find('.order-image').attr('src', image);
        $order.find('.bouquet-title').text(title);
        $order.find('.bouquet-name input').val(title);
        $order.find('.prize input').val('+');
        $order.find('.bouquet-description').html(description);
        $order.find('.stotal').text(price);
        $order.find('.sshipping').text('0 грн.');
        $order.find('.sfull-total').text(price);
        $order.find('.characteristics').after('<p class="prize"></p>');
        $order.find('.prize input').val('+');
        $order.find('.bouquet-name input').val(title).text(title);
        $order.modal("show");
    });

    $(document).on( 'click', '.own-bouquet', function() {
        $('#create-own-bouquet').modal("show");
    });
    $('.gf_repeater_add').append(' додати ще квітку');
    $('.gf_repeater_remove').append(' прибрати попередню квітку');

    //slow scroll
    $('#main-menu a[href*="#"]:not([href="#"])').click(function() {
        if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
            if (target.length) {
                $('html, body').animate({
                    scrollTop: target.offset().top
                }, 1000);
                return false;
            }
        }
    });
});