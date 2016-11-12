jQuery(document).ready(function ($) {
    $('.flexslider').flexslider({
        animation: "slide",
        controlNav: false
    });
    $('.testimonials-slider').flexslider({
        animation: "slide",
        controlNav: true,
    });
    $('.happy-slider').flexslider({
        animation: "slide",
        animationLoop: true,
        itemWidth: 300,
        itemMargin: 5,
        minItems: 1,
        maxItems: 3,
        controlNav: true,
        move: 1
    });

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

        $order.modal("show");
    });



    $('a[href*="#"]:not([href="#"])').click(function() {
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