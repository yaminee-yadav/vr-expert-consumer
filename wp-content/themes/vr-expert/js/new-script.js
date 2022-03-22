jQuery(window).on('load', function() {
    jQuery('.loaderWindow').hide();
});

jQuery(document).ready(function() {

   // jQuery('#createaccount').prop('checked');
    jQuery("#createaccount").attr('checked', 'checked');
    jQuery('#createaccount').attr('readonly', 'readonly');
    
   


    //faq
    jQuery(".faq_question.to-bottom.regular-txt.active").next().slideDown();
    jQuery(".faq_question.to-bottom.regular-txt").on("click", function() {
        if (jQuery(this).hasClass('active')) {
            jQuery(this).removeClass("active").next().slideUp();
        } else {
            jQuery(".faq_question.to-bottom.regular-txt.active").removeClass("active").next(".faq_answer").slideUp();
            jQuery(this).addClass('active').next('.faq_answer').slideDown();
        }
 
        
 
    });

    /* next perv */
    const TopactiveThis = jQuery('.tabs-nav .chkStep.chkStpOne');
    const TopsecondThis = jQuery('.tabs-nav .chkStep.chkStpTwo');
    jQuery(TopactiveThis).click(function() {
        var CX = jQuery(this).hasClass('stepDone');
        if (CX) {
            jQuery('#customer_details').show();
            jQuery('#order-rev-id').hide();
            jQuery('#Payment_details').hide();
            jQuery('#next-step').show();
            jQuery(".chkStepper li").each(function(index) {
                if (jQuery(this).hasClass('activeStep')) {
                    jQuery(this).removeClass('activeStep');
                }
            });
            jQuery(this).addClass('activeStep');
        }
    });
    jQuery(TopsecondThis).click(function() {
        var CZ = jQuery(this).hasClass('stepDone');
        if (CZ) {
            jQuery('#order-rev-id').show();
            jQuery('#next-step').show();
            jQuery('#customer_details').hide();
            jQuery('#Payment_details').hide();
            jQuery(".chkStepper li").each(function(index) {
                if (jQuery(this).hasClass('activeStep')) {
                    jQuery(this).removeClass('activeStep');
                }
            });
            jQuery(this).addClass('activeStep');
        }
    });


    const ArActive = jQuery('.tabs-nav .chkStep.chkStpOne');
    const SnActive = jQuery('.tabs-nav .chkStep.chkStpTwo');
    jQuery('.ch-back').click(function() {
        jQuery('#order-rev-id').hide();
        jQuery('#customer_details').show();
        jQuery(".chkStepper li").each(function(index) {
            if (jQuery(SnActive).hasClass('activeStep')) {
                jQuery(this).removeClass('activeStep');
            }
        });
        jQuery(ArActive).addClass('activeStep');

    });

    /* next perv */

    jQuery(".btn-mid ").click(function() {
        jQuery(".mylst-order").slideToggle();
    });
    // mobile menu dropdown toggle

    jQuery('.mb-p-menu.mb-down-mb').append('<span class="mvr-icons"></span>');
    jQuery('.mb-p-menu.mb-down-mb .mvr-icons').click(function() {
        jQuery(this).siblings("ul.sub-menu").slideToggle();
        jQuery(this).toggleClass("move-arrow");

    });


    /**Search box woocommerce  click on window remove data fatch window**/
    jQuery(document).click(function(e) {
        if (!jQuery(e.target).hasClass("datafetch") && jQuery(e.target).parents(".U-search").length === 0) {
            jQuery(".U-search").hide();
        }
    });



    // body have woocommerce-page

    if (jQuery('body').hasClass('woocommerce-page')) {
        jQuery(this).find(".Normal-Page .regular-container").first().removeClass('regular-container');
        jQuery(this).find(".Normal-Page").removeClass('Normal-Page');
        // let DivRmv =  jQuery(this).find(".Normal-Page").removeClass('Normal-Page');
    }


    // mobile arrow move

    jQuery('.mobile-hamburger').click(function() {
        jQuery('.mobile-menu-popup').toggleClass('Uactive');
        jQuery("html, body").toggleClass('overflow-active');
    });

    jQuery('body').click(function(evt) {
        var cls = evt.target.getAttribute('class');
        if (cls) {
            if (cls.split(" ").includes("Uactive")) {
                jQuery('.mobile-menu-popup').toggleClass('Uactive');
            }
        }

    });
    

    jQuery('.mini-bottom-qty .p-quantity input').attr('readonly', 'readonly');
    jQuery(' .q-123 .p-quantity input').attr('readonly', 'readonly');
    jQuery('.vr-p-data .quantity input').attr('readonly', 'readonly');
    jQuery('.cstm-inputtxt.iread textarea').attr('readonly', 'readonly');
    jQuery('.cst-input-142.readone input').attr('readonly', 'readonly');
    jQuery('.qwty-flex .input-text.qty.text').attr('readonly', 'readonly');
    jQuery('.myevnt-form input.quantitys').attr('readonly', 'readonly');
    //  jQuery('.package-d-popup li.cst-input-230.r-date-1 input').attr('readonly','readonly');
    //  jQuery('.package-d-popup li.cst-input-230.r-date-2 input').attr('readonly','readonly');
    jQuery('.package-d-popup li.cst-input-230.r-date-1 input').attr('placeholder', 'start date');
    jQuery('.package-d-popup li.cst-input-230.r-date-2 input').attr('placeholder', 'end date');
    jQuery(".onlypackage li.cst-input-230.r-date-1 input").attr('readonly', 'readonly');
    jQuery(".onlypackage li.cst-input-230.r-date-2 input").attr('readonly', 'readonly');


    /* equl height */ 

    jQuery(function() {
        function equalHeightt() {
            var heightArray = jQuery(".cst-unheight").map(function() {
                return jQuery(this).height();
            }).get();
            var equalHeightt = Math.max.apply(Math, heightArray);
            jQuery(".cst-unheight").height(equalHeightt);
        }
        equalHeightt();
    });




    jQuery(function() {
        function equalHeightt() {
            var heightArray = jQuery("#carousel-products .p-content").map(function() {
                return jQuery(this).height();
            }).get();
            var equalHeightt = Math.max.apply(Math, heightArray);
            jQuery("#carousel-products  .p-content").height(equalHeightt);
        }
        equalHeightt();
    });

    jQuery(function() {
        function equalHeightt() {
            var heightArray = jQuery(".evnt-data .txt-ent").map(function() {
                return jQuery(this).height();
            }).get();
            var equalHeightt = Math.max.apply(Math, heightArray);
            jQuery(".evnt-data .txt-ent").height(equalHeightt);
        }
        equalHeightt();
    });

    jQuery(function() {
        function equalHeightt() {
            var heightArray = jQuery(".part-height .text-min").map(function() {
                return jQuery(this).height();
            }).get();
            var equalHeightt = Math.max.apply(Math, heightArray);
            jQuery(".part-height .text-min").height(equalHeightt);
        }
        equalHeightt();
    });

    jQuery(function() {
        function equalHeightt() {
            var heightArray = jQuery(".eev-vr .text-limit").map(function() {
                return jQuery(this).height();
            }).get();
            var equalHeightt = Math.max.apply(Math, heightArray);
            jQuery(".eev-vr .text-limit").height(equalHeightt);
        }
        equalHeightt();
    });

    jQuery(function() {
        function equalHeightt() {
            var heightArray = jQuery(".shop-container .p-content").map(function() {
                return jQuery(this).height();
            }).get();
            var equalHeightt = Math.max.apply(Math, heightArray);
            jQuery(".shop-container .p-content").height(equalHeightt);
        }
        equalHeightt();
    });

    jQuery(function() {
        function equalHeightt() {
            var heightArray = jQuery("#carousel-rel-products .p-content").map(function() {
                return jQuery(this).height();
            }).get();
            var equalHeightt = Math.max.apply(Math, heightArray);
            jQuery("#carousel-rel-products .p-content").height(equalHeightt);
        }
        equalHeightt();
    });

    jQuery(function() {
        function equalHeightt() {
            var heightArray = jQuery(".vr-soft-blue h2").map(function() {
                return jQuery(this).height();
            }).get();
            var equalHeightt = Math.max.apply(Math, heightArray);
            jQuery(".vr-soft-blue h2").height(equalHeightt);
        }
        equalHeightt();
    });


    jQuery(function() {
        function equalHeightt() {
            var heightArray = jQuery(".uneqal").map(function() {
                return jQuery(this).height();
            }).get();
            var equalHeightt = Math.max.apply(Math, heightArray);
            jQuery(".uneqal").height(equalHeightt);
        }
        equalHeightt();
    });



    jQuery(function() {
        jQuery(".date_to_start, .date_to_end, .Date-GStart, .Date-GEnd, .onlypackage li.cst-input-230.r-date-1 input, .onlypackage li.cst-input-230.r-date-2 input").datepicker({
            dateFormat: 'dd-mm-yy',
            minDate: 1,

        });

    });

    jQuery(function() {
        jQuery(".package-d-popup li.cst-input-230.r-date-1 input, .package-d-popup li.cst-input-230.r-date-2 input").datepicker({
            dateFormat: 'dd-mm-yy',
            minDate: 1,
        });
    });

    //qty shorts
    jQuery(".quantity-pluss, .quantity-plusss").click(function() {
        jQuery("#qnts, #qntsE").val(Number(jQuery("#qnts, #qntsE").val()) + 1);
    });
    jQuery(".quantity-minuss, .quantity-minusss").click(function() {
        if (jQuery("#qnts, #qntsE").val() > 1)
            jQuery("#qnts, #qntsE").val(Number(jQuery("#qnts, #qntsE").val()) - 1);
    });

    jQuery('.req-btn').click(function(e) {
        e.preventDefault();
        jQuery('#tagetinfop').toggleClass('hide');
    });
    jQuery('.modal-overlay1').on('click', function() {
        jQuery('#tagetinfop').toggleClass('hide');
    });
    jQuery('#tagetinfop .close').on('click', function() {
        jQuery('#tagetinfop').toggleClass('hide');
    });


    jQuery('.thnks-p ').click(function(e) {
        e.preventDefault();
        jQuery('#modal-pakages-date').toggleClass('hide');
        jQuery('body').addClass('overflowcst');
    });
    jQuery('.modal-overlay5').on('click', function() {
        jQuery('#modal-pakages-date').toggleClass('hide');
        jQuery('body').removeClass('overflowcst');
    });
    jQuery('#modal-pakages-date .close').on('click', function() {
        jQuery('#modal-pakages-date').toggleClass('hide');
        jQuery('body').removeClass('overflowcst');
    });

    jQuery('.Packageclick').click(function(e) {
        e.preventDefault();
        jQuery('#modal-pakages').toggleClass('hide');
        jQuery('body').addClass('overflowcst');

    });
    jQuery('.modal-overlay3').on('click', function() {
        jQuery('#modal-pakages').toggleClass('hide');
        jQuery('body').removeClass('overflowcst');
    });
    jQuery('#modal-pakages .close').on('click', function() {
        jQuery('#modal-pakages').toggleClass('hide');
        jQuery('body').removeClass('overflowcst');

    });



    jQuery('.small-modal').click(function(e) {
        e.preventDefault();
        jQuery('#days-listing').toggleClass('hide');
        jQuery('body').addClass('overflowcst');
    });
    jQuery('.modal-overlay4').on('click', function() {
        jQuery('#days-listing').toggleClass('hide');
        jQuery('body').removeClass('overflowcst');

    });
    jQuery('#days-listing .close').on('click', function() {
        jQuery('#days-listing').toggleClass('hide');
        jQuery('body').removeClass('overflowcst');
    });

    // Show the first tab and hide the rest
    jQuery('.ul-1 li:first-child .al-w').addClass('active');
    jQuery('.target-tabsP').hide();
    jQuery('.target-tabsP:first').show();
    // Click function
    jQuery('.ul-1 li .al-w').click(function() {
        jQuery('.ul-1 li .al-w').removeClass('active');
        jQuery(this).addClass('active');
        jQuery('.target-tabsP').hide();
        let activeTab = jQuery(this).find('a').attr('href');
        jQuery(activeTab).fadeIn();
        return false;
    });


    jQuery(function() {

          
            
         
             if(jQuery('.filter-check').length > 0){

                jQuery('.startfilters').multiselect({
                    columns: 1,
                    placeholder: 'Released latest content',
                    // search: true,
                    // searchOptions: {
                    //     'default': 'Search States'
                    // },
                    //  selectAll: true
                });
                jQuery('.chooseHfilter').multiselect({
                    columns: 1,
                    //selectAll: true,
                    placeholder: 'Choose Headset',
                });
                jQuery('.Genresfilter').multiselect({
                    columns: 1,
                    placeholder: 'Genres',
                });


             }



        
    });

    jQuery(".dmw-packages").owlCarousel({
        autoplay: true,
        loop: false,
        margin: 28,
        dots: false,
        responsiveClass: true,
        nav: true,
        navText: [
            '<img src="../wp-content/themes/vr-expert/img/blue-left.png" alt="angle">',
            '<img src="../wp-content/themes/vr-expert/img/blue-right.png" alt="angle">'
        ],
        responsive: {
            0: {
                items: 1,
                margin: 10,

            },
            375: {
                items: 1,
                margin: 10,

            },
            767: {
                items: 1,
                margin: 10,


            },
            768: {
                items: 1.9,
                margin: 22

            },
            991: {
                items: 1.9,
                margin: 22

            },

            1023: {
                items: 3.37,



            },
            1200: {
                items: 3.37,



            }


        }
    });




    jQuery(".Actionproducts").owlCarousel({
        autoplay: true,
        loop: false,
        navRewind: false,
        rewind: true, 
        dots: false,
        responsiveClass: true,
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


    var maxHeight = 0;
    jQuery(".eev-vr .text-limit").each(function() {
        if (jQuery(this).height() > maxHeight) {
            maxHeight = jQuery(this).height();
        }
    });
    jQuery(".eev-vr .text-limit").height(maxHeight);


});

//category filter
function content_filter() {

    var contentterm = jQuery('#contentterm').val();
    var prod_assgn = jQuery('#prod_assgn').val();
    var rating_star = jQuery('#rating_star').val();
    console.log(contentterm);
    console.log(prod_assgn);
    console.log(rating_star);

    jQuery.ajax({
        url: "/wp-admin/admin-ajax.php",
        type: "POST",
        datatype: 'json',
        data: {
            action: 'myfilter2',
            contentterm_data: contentterm,
            prod_assgn: prod_assgn,
            rating_star: rating_star
        },
        beforeSend: function() {
            jQuery("#gobal-loder").show();
        },
        success: function(data) {
            jQuery("#template-content").html(data);
            jQuery("#gobal-loder").hide();
            //jQuery('.Actionproducts').owlCarousel('update');
            console.log(data);
            jQuery(function() {
                function equalHeightt() {
                    var heightArray = jQuery(".vr-soft-blue h2").map(function() {
                        return jQuery(this).height();
                    }).get();
                    var equalHeightt = Math.max.apply(Math, heightArray);
                    jQuery(".vr-soft-blue h2").height(equalHeightt);
                }
                equalHeightt();
            });
            jQuery(function() {
                function equalHeightt() {
                    var heightArray = jQuery(".uneqal").map(function() {
                        return jQuery(this).height();
                    }).get();
                    var equalHeightt = Math.max.apply(Math, heightArray);
                    jQuery(".uneqal").height(equalHeightt);
                }
                equalHeightt();
            });
            jQuery('.Actionproducts').each(function(){
                var id = jQuery(this).attr('id');
                carasouel(id);
            });
          
        },
        error: function(data) {

            console.log(data);
        }
    });

}
//Packages Page code
function package_popup(id) {
    var pro_id = id;
    jQuery('#input_2_12').val(id);
}

//Single Packages Page
function single_package(id) {
    jQuery('#input_2_12').val(id);
    var start_date = jQuery("#date_to_start").val();
    jQuery('#input_2_13').attr('placeholder', start_date);
    var end_date = jQuery("#date_to_end").val();
    jQuery('#input_2_14').attr('placeholder', end_date);
}