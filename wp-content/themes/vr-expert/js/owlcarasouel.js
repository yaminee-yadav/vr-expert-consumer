function carasouel(tid){
   // console.log(tid);
    jQuery("#"+tid).owlCarousel({
        autoplay: true,
        rewind: true, /* use rewind if you don't want loop */
         /*
        animateOut: 'fadeOut',
        animateIn: 'fadeIn',
        */
        responsiveClass: true,
        autoHeight: true,
        autoplayTimeout: 7000,
        smartSpeed: 800,
        nav: true,
        navText: [
            '<img src="../wp-content/themes/vr-expert/img/blue-left.png" alt="angle">',
            '<img src="../wp-content/themes/vr-expert/img/blue-right.png" alt="angle">'
        ],
        responsive: {
            0: {
                items: 1.56,
                margin: 24
            },
            375: {
                items: 1.56,
                margin: 24
            },
            767: {
                items: 1.56,
                margin: 24

            },
            768: {
                items: 3,
                margin: 20

            },
            991: {
                items: 3,
                margin: 20

            },

            1008: {
                items: 4.22,
                margin: 20

            },
            1200: {
                items: 4.22,
                margin: 20

            }


        }

    });

}