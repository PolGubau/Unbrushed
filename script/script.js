$(window).on("load", function() {

    $(".loader").delay(0).hide(300);
    $(".zoom").slideUp(0);

    $(".screen_unset").slideUp(1000);



    $('.link_s').click(function() {

        $(".zoom").slideUp(300);

        $(".screen_unset").slideDown(1000);


    });




    $(".link_s").click(function() {

        var href = $(this).attr('data-href');

        // Delay setting the location for one second
        setTimeout(function() { window.location = href }, 700);
        return false;
    });



    $c = 0;
    $('.sobremi_texto').slideUp();
    $('.ficha').slideUp();


    $('.dark_mode').click(function() {
        document.body.classList.toggle("toblack");
        $('.image_item').toggleClass('image_item_dark');
    });
    $('.sobremi').click(function() {
        $('.arrowsvg').toggleClass('rotate');
        if ($c == 0) {
            $('.sobremi_texto').slideDown();
            $c = 1;
        } else {
            $('.sobremi_texto').slideUp();
            $c = 0;
        }
    })
    $('.ficha_cont').click(function() {
        $('.arrowsvg').toggleClass('rotate');
        if ($c == 0) {
            $('.ficha').slideDown();
            $c = 1;
        } else {
            $('.ficha').slideUp();
            $c = 0;
        }
    })
    $('.zoom').css("visibility", "visible");

    $(".zoomin").delay(800).slideDown(300);
    $(".zoomout").delay(1000).slideDown(300);
    $zoomvel = 150;

    $('.zoomin').on('click', function() {
        $actuallymenys10 = parseInt($('.image_item_sesion').css("width")) + $zoomvel + 'px';
        $('.image_item_sesion').css("width", $actuallymenys10);
    });

    $('.zoomout').on('click', function() {
        $actuallymenys10 = parseInt($('.image_item_sesion').css("width")) - $zoomvel + 'px';
        $('.image_item_sesion').css("width", $actuallymenys10);


    });

});