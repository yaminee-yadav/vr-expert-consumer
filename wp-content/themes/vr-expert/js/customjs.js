jQuery(document).on(
  "gform_post_render",
  function (event, form_id, current_page) {
    if (jQuery("#input_2_13").length > 0) {
      jQuery("#input_2_13").datepicker({
        dateFormat: 'dd-mm-yy',
        altFormat: 'yy-mm-dd',
        minDate: 1,
    });
      jQuery("#input_2_14").datepicker({
        dateFormat: 'dd-mm-yy',
        altFormat: 'yy-mm-dd',
        minDate: 1,
    });
    }
  });

jQuery(document).ready(function () {

  var Replacetxt = "Product Details";
  jQuery('body.woocommerce-cart #tagetinfop #field_1_40 label ').text(Replacetxt);
  jQuery(' body.woocommerce-cart #tagetinfop #field_1_40 #input_1_40').attr('readonly', 'readonly');
  /*add accessiors function */
  jQuery("body").delegate(".cartData", "click", function (e) {
    jQuery(".light-txt").keyup(function () {
      jQuery("#error_message").hide();
    });
    var accessories_id = jQuery(this).attr("data-id");

    var start_date = jQuery("#start_date").val();

    var end_date = jQuery("#end_date").val();

    if (start_date == 0) {
      jQuery("#error_message").text("Please Enter the Start Date");
      return false;
    } else if (end_date == 0) {
      jQuery("#error_message").text("Please Enter the End Date");
      return false;
    } else {
      jQuery("#error_message").hide();
    }
    jQuery.ajax({
      url: "wp-admin/admin-ajax.php",
      type: "POST",
      datatype: "json",
      data: {
        action: "add_accessories_product",
        start_date: start_date,
        end_date: end_date,
        accessories_product_id: accessories_id,
      },
      beforeSend: function (res) {
        console.log("before success.");
      },
      success: function (res, status) {
        jQuery("#Pids" + accessories_id).addClass("selected_accessories");
        //  jQuery(".access_data").addClass("selected_accessories");
        jQuery("body").delegate("p", "add_accessories", function () {
          var myJSON = "";
          myJSON = JSON.stringify(res.message);
          jQuery("#availability_message").text(myJSON);
        });
        // jQuery( "body" ).delegate( "#availability_message", function() {
        //     jQuery("#availability_message").text("Product Available");
        // });

        console.log("success_message_for_check_availability=" + myJSON);
      },
      error: function (res, status) {
        jQuery("#availability_message").text("Not Available");
        //console.log(res);
        console.log("error_message_for_check_availability=" + res.message);
      },
    });
  });
  jQuery("body").delegate(".accessories_simple", "click", function () {
    var accessories_simple_id = jQuery(this).attr("value");
    if (accessories_simple_id != " ") {
      jQuery(".cst_simple_added").addClass("cst_simp_access");
    }

    add_accessories(accessories_simple_id);
  });

  jQuery(".popup-call").on("click", function () {
    var prod_id = jQuery(this).data("prod");
    var cart_key = jQuery(this).data("key");
    console.log(prod_id);
    console.log(cart_key);
    open_popup(prod_id, cart_key);
  });
  jQuery(".front-popupcall").on("click", function () {
    var prod_id = jQuery(this).data("prod");
    var cart_key = jQuery(this).data("key");
    console.log(prod_id);
    console.log(cart_key);
    open_popup(prod_id, cart_key);
  });

  // service page
  jQuery("#svc-event, #svc-event-services").owlCarousel({
    // autoplay: true,
    loop: true,
    stagePadding: 20,
    items: 2,
    margin: 56.5,
    responsiveClass: true,
    dots: false,
    nav: true,
    navText: [
      '<img src="../wp-content/themes/vr-expert/img/g-left.svg" alt="angle">',
      '<img src="../wp-content/themes/vr-expert/img/g-right.svg" alt="angle">',
    ],
    responsive: {
      0: {
        items: 1.3,
      },
      766: {
        items: 2,
      },
      1024: {
        items: 2,
      },
      1200: {
        items: 2,
      },
    },
  });

  jQuery("body").delegate(".chek-m input[type=checkbox]", "click", function () {
    if (jQuery(this).is(":checked")) {
      jQuery(".ds-are").show(1000);
    } else {
      jQuery(".ds-are").hide(1000);
    }
  });

  jQuery("body").delegate(
    ".chek-mevent input[type=checkbox]",
    "click",
    function () {
      if (jQuery(this).is(":checked")) {
        jQuery(".event-are").show(1000);
      } else {
        jQuery(".event-are").hide(1000);
      }
    }
  );

  /* q min or max */
  jQuery(function () {
    var addInput = ".vr-p-data .qty";
    var noqty = 1;
    jQuery(addInput).val(noqty);
    jQuery(".plus").on("click", function () {
      jQuery(addInput).val(++noqty);
    });
    jQuery(".minus").on("click", function () {
      //If noqty is bigger or equal to 1 subtract 1 from noqty
      if (noqty > 1) {
        jQuery(addInput).val(--noqty);
      } else {
        //Otherwise do nothing
      }
    });
  });
  // each finally
  jQuery(function () {
    jQuery(".btn-qty-p").on("click", function () {
      if (jQuery("body").hasClass("woocommerce-cart")) {
        var get_product_id_in_mini_cart = jQuery(this).attr("data-id");

        var currentVal = parseInt(
          jQuery(this).prev(".quantity").children(".qty").val()
        );
        if (currentVal != NaN) {
          jQuery(this)
            .prev(".quantity")
            .children(".qty")
            .val(currentVal + 1);
          var update_qty = jQuery(this)
            .prev(".quantity")
            .children(".qty")
            .val();
          jQuery.ajax({
            type: "POST",
            dataType: "json",
            url: "/wp-admin/admin-ajax.php",
            data: {
              action: "update_quantity_single_product",
              get_product_id_in_mini_cart: jQuery(this).attr("data-id"),
              currentVal: jQuery(this).prev(".quantity").children(".qty").val(),
              item_key: jQuery(this).attr("data-key"),
            },
            success: function (res) {
              console.log(res);
              console.log("pass");
              jQuery("#gobal-loder").hide();
              jQuery(".cartTotal").text(res.cartTotal);
              jQuery(
                ".productPrice" +
                  get_product_id_in_mini_cart +
                  " .woocommerce-Price-amount"
              ).html(
                '<bdi><span class="woocommerce-Price-currencySymbol">€</span>' +
                  res.priceProduct +
                  "</bdi>"
              );
              jQuery(".bill-amt-start .all-total").html(
                '<strong><span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">€</span>' +
                  res.cartTotal +
                  "</bdi></span></strong>"
              );
              
              window.location.reload(res.redirect);
            },
            error: function (res) {
              console.log(res);
              console.log("fail");
            },
          });
        }
      }
    });

    jQuery(".btn-qty-min").click(function () {
      var get_product_id_in_mini_cart = jQuery(this).attr("data-id");
      $current = jQuery(this);
      var currentVal = parseInt(
        jQuery(this).next(".quantity").children(".qty").val()
      );
      if (currentVal != NaN) {
        if (currentVal > 0) {
          jQuery(this)
            .next(".quantity")
            .children(".qty")
            .val(currentVal - 1);
          var update_qty = jQuery(this)
            .next(".quantity")
            .children(".qty")
            .val();
          jQuery.ajax({
            type: "POST",
            dataType: "json",
            url: "/wp-admin/admin-ajax.php",
            data: {
              action: "update_quantity_single_product",
              get_product_id_in_mini_cart: jQuery(this).attr("data-id"),
              currentVal: jQuery(this).next(".quantity").children(".qty").val(),
              item_key: jQuery(this).attr("data-key"),
            },
            success: function (res) {
              console.log(res.Total);
              jQuery("#gobal-loder").hide();
              jQuery(".cartTotal").text(res.cartTotal);
              jQuery(
                ".productPrice" +
                  get_product_id_in_mini_cart +
                  " .woocommerce-Price-amount"
              ).html(
                '<bdi><span class="woocommerce-Price-currencySymbol">€</span>' +
                  res.priceProduct +
                  "</bdi>"
              );
              jQuery(".bill-amt-start .all-total").html(
                '<strong><span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">€</span>' +
                  res.cartTotal +
                  "</bdi></span></strong>"
              );
     
              jQuery(
                ".cus-cart .flx-rental-list .products-normal-price.light-text.fng_" +
                  get_product_id_in_mini_cart +
                  ""
              ).html(
                '<span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">€' +
                  res.priceProduct +
                  "</span></bdi></span>"
              );
              jQuery(".b-wrap-2 regular-txt.Sub_Total_data").html(
                '<span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">€</span>' +
                  res.cartsubTotal +
                  "</bdi></span>"
              );
              window.location.reload(res.url);
            },
            error: function (res) {
              console.log(res);
              console.log("fail");
            },
          });
        }
      }
    });
  });
  // each finally
  jQuery(function () {
    jQuery("body").delegate(".p-add-minCart", "click", function (e) {
      var event2 = jQuery(this);
      var get_product_id_in_mini_cart = jQuery(
        "#get_product_id_in_mini_cart"
      ).val();
      var currentVal_q = jQuery("#currentVal_q").val();
      var pid = jQuery(this).parents(".mini-bottom-qty").attr("data-id");
      var currentVal = parseInt(
        jQuery(this).prev(".p-quantity").children(".qty").val()
      );
      if (currentVal != NaN) {
        jQuery(this)
          .prev(".p-quantity")
          .children(".qty")
          .val(currentVal + 1);
        jQuery.ajax({
          type: "POST",
          url: "/wp-admin/admin-ajax.php",
          data: {
            action: "update_quantity",
            get_product_id_in_mini_cart: jQuery(this)
              .parents(".mini-bottom-qty")
              .attr("data-id"),
            currentVal: jQuery(this).prev(".p-quantity").children(".qty").val(),
            item_key: jQuery(this).parents(".mini-bottom-qty").attr("data-key"),
          },
          beforeSend: function () {
            // setting a timeout
            jQuery("#gobal-loder").show();
          },
          success: function (res) {
            jQuery("#gobal-loder").hide();
            jQuery(".miniCartData").html(res);

          
            console.log(this);
          },
        });
      }
    });

    jQuery("body").delegate(".p-minus-minCart", "click", function () {
      var get_product_id_in_mini_cart = jQuery(
        "#get_product_id_in_mini_cart"
      ).val();
      var currentVal = parseInt(
        jQuery(this).next(".p-quantity").children(".qty").val()
      );
      var pid = jQuery(this).parents(".mini-bottom-qty").attr("data-id");
      if (currentVal != NaN) {
        if (currentVal > 0) {
          jQuery(this)
            .next(".p-quantity")
            .children(".qty")
            .val(currentVal - 1);
          jQuery.ajax({
            type: "POST",
            url: "/wp-admin/admin-ajax.php",
            data: {
              action: "update_quantity",
              get_product_id_in_mini_cart: jQuery(this)
                .parents(".mini-bottom-qty")
                .attr("data-id"),
              currentVal: jQuery(this)
                .next(".p-quantity")
                .children(".qty")
                .val(),
              item_key: jQuery(this)
                .parents(".mini-bottom-qty")
                .attr("data-key"),
            },
            beforeSend: function (res) {
              // setting a timeout
              jQuery("#gobal-loder").show();
            },
            success: function (res) {
              jQuery("#gobal-loder").hide();
              jQuery(".miniCartData").html(res);
            },
          });
        }
      }
    });
  });

  // destroy.owl.carousel if  width less than 767
  function owlInitialize() {
    if (jQuery(window).width() > 767) {
      jQuery("#carousel-products").owlCarousel({
        autoplay: true,
        loop: true,
        margin: 20,
        items: 4,
        dots: false,
        nav: true,
        responsiveClass: true,
        navText: [
          '<img src="./wp-content/themes/vr-expert/img/left-angle.svg" alt="angle">',
          '<img src="./wp-content/themes//vr-expert/img/right-angle.svg" alt="angle">',
        ],

        responsive: {
          0: {
            items: 1,
          },

          600: {
            items: 3,
            margin: 11,
          },
          1008: {
            items: 4,
          },
          1024: {
            items: 4,
          },
        },
      });
    } else {
      jQuery("#carousel-products").owlCarousel("destroy");
    }
  }

  jQuery(document).ready(function (e) {
    owlInitialize();
  });

  jQuery(window).resize(function () {
    owlInitialize();
  });

  // testimonial index
  jQuery("#Testimonial-carousel").owlCarousel({
    autoplay: true,
    loop: true,
    margin: 24,
    center: true,
    responsiveClass: true,
    nav: true,
    navText: [
      '<img src="./wp-content/themes/vr-expert/img/left-angle.svg" alt="angle">',
      '<img src="./wp-content/themes/vr-expert/img/right-angle.svg" alt="angle">',
    ],
    responsive: {
      0: {
        items: 1.3,
        center: false,
        margin: 20,
      },
      375: {
        items: 1.3,
        center: false,
        margin: 20,
      },
      767: {
        items: 1.3,
        center: false,
        margin: 20,
      },
      768: {
        items: 2,
        center: false,
        margin: 20,
      },
      991: {
        items: 2,
        center: false,
      },

      1008: {
        items: 3,
      },
      1200: {
        items: 3,
      },
    },
  });

  // single page 5
  jQuery("#carousel-rel-products").owlCarousel({
    //  autoplay: true,
    loop: false,
    dots: false,
    margin: 14,
    responsiveClass: true,
    nav: true,
    navText: [
      '<img src="../wp-content/themes/vr-expert/img/left-angle.svg" alt="angle">',
      '<img src="../wp-content/themes/vr-expert/img/right-angle.svg" alt="angle">',
    ],
    responsive: {
      0: {
        items: 1.65,
        nav: false,
        margin: 11.22,
      },
      375: {
        items: 1.65,
        nav: false,
        margin: 11.22,
      },
      767: {
        items: 1.65,
        nav: false,
        margin: 11.22,
      },
      768: {
        items: 3,
        nav: false,
        margin: 11.39,
      },
      991: {
        items: 3,
        nav: false,
        margin: 11.39,
      },

      1008: {
        items: 5,
      },
      1200: {
        items: 5,
      },
    },
  });
  // carousel-soft-products
  jQuery("#carousel-soft-products").owlCarousel({
    // autoplay: true,
    // loop: true,
    margin: 22.5,
    dots: false,
    responsiveClass: true,
    nav: true,
    navText: [
      '<img src="../wp-content/themes/vr-expert/img/left-angle.svg" alt="angle">',
      '<img src="../wp-content/themes/vr-expert/img/right-angle.svg" alt="angle">',
    ],
    responsive: {
      0: {
        items: 1.7,
        nav: false,
        margin: 25,
      },
      375: {
        items: 1.7,
        nav: false,
        margin: 25,
      },
      767: {
        items: 1.7,
        nav: false,
        margin: 25,
      },
      768: {
        items: 3,
        nav: false,
        margin: 20,
      },
      991: {
        items: 3,
        nav: false,
        margin: 20,
      },

      1008: {
        items: 4.3,
      },
      1200: {
        items: 4.3,
      },
    },
  });

  //equ
  jQuery("#w-carousel").owlCarousel({
    // autoplay: true,
    loop: true,
    items: 1,
    responsiveClass: true,
    nav: true,
    navText: [
      '<img src="./wp-content/themes/vr-expert/img/left-angle.svg" alt="angle">',
      '<img src="./wp-content/themes/vr-expert/img/right-angle.svg" alt="angle">',
    ],
    responsive: {
      0: {
        items: 1,
      },

      600: {
        items: 1,
      },

      1008: {
        items: 1,
      },
    },
  });
  // main slider
  jQuery("#main-carousel").owlCarousel({
    autoplay: true,
    loop: true,
    items: 1,
    responsiveClass: true,
    nav: true,
    navText: [
      '<img src="./wp-content/themes/vr-expert/img/header-left-angle.svg" alt="angle">',
      '<img src="./wp-content/themes/vr-expert/img/header-right-angle.svg" alt="angle">',
    ],
    responsive: {
      0: {
        items: 1,
      },

      600: {
        items: 1,
      },

      1024: {
        items: 1,
      },

      1366: {
        items: 1,
      },
    },
  });

  jQuery("#event-cut-sl1,#event-cut-sl2").owlCarousel({
    autoplay: true,
    loop: true,
    margin: 63,
    dots: false,
    responsiveClass: true,
    nav: false,
    navText: [
      '<img src="../wp-content/themes/vr-expert/img/left-angle.svg" alt="angle">',
      '<img src="../wp-content/themes/vr-expert/img/right-angle.svg" alt="angle">',
    ],
    responsive: {
      0: {
        items: 1.3,
        margin: 20,
      },
      375: {
        items: 1.3,
        margin: 20,
      },
      600: {
        items: 1.3,
        margin: 20,
      },
      766: {
        items: 1.9,
        margin: 20,
      },
      991: {
        items: 2,
      },

      1008: {
        items: 3,
      },
      1200: {
        items: 3,
      },
    },
  });

  jQuery("#f-event1,#f-event2,#f-event3").owlCarousel({
    autoplay: true,
    // autoHeight: true,
    loop: false,
    // loop: true,
    margin: 63,
    dots: false,
    responsiveClass: true,
    nav: false,
    navText: [
      '<img src="../wp-content/themes/vr-expert/img/left-angle.svg" alt="angle">',
      '<img src="../wp-content/themes/vr-expert/img/right-angle.svg" alt="angle">',
    ],
    responsive: {
      0: {
        items: 1.3,
        margin: 20,
      },
      375: {
        items: 1.3,
        margin: 20,
      },
      600: {
        items: 1.3,
        margin: 20,
      },
      766: {
        items: 2,
        margin: 20,
      },
      991: {
        items: 2,
      },

      1008: {
        items: 3,
      },
      1200: {
        items: 3,
      },
    },
  });

  //equal height

  jQuery("#evnt-rel-products").owlCarousel({
    autoplay: true,
    loop: false,
    //items: 3,
    margin: 58,
    dots: true,
    responsiveClass: true,
    nav: false,
    responsive: {
      0: {
        items: 1,
      },

      766: {
        items: 2,
        margin: 27.48,
      },

      1024: {
        items: 3,
      },

      1200: {
        items: 3,
      },
    },
  });

  //assoc
  jQuery("#accessories-pop").owlCarousel({
    autoplay: true,
   // loop: false,
    rewind: true,
    margin: 24.5,
    autoplayTimeout: 7000,
    smartSpeed: 800,
    responsiveClass: true,
    dots: false,
    nav: true,
    navText: [
      '<img src="../wp-content/themes/vr-expert/img/popup-right.png" alt="angle">',
      '<img src="../wp-content/themes/vr-expert/img/popup-right.png" alt="angle">',
    ],
    responsive: {
      0: {
        items: 1,
      },

      766: {
        items: 2,
      },

      1024: {
        items: 2.23,
      },

      1200: {
        items: 2.23,
      },
    },
  });

  /* equl height */
  var maxHeight = 0;
  jQuery(".list-Event-Icons").each(function () {
    if (jQuery(this).height() > maxHeight) {
      maxHeight = jQuery(this).height();
    }
  });
  jQuery(".list-Event-Icons").height(maxHeight);

  var maxHeight = 0;
  jQuery(".Testi-Tesxt").each(function () {
    if (jQuery(this).height() > maxHeight) {
      maxHeight = jQuery(this).height();
    }
  });
  jQuery(".Testi-Tesxt").height(maxHeight);

  var maxHeight = 0;
  jQuery(".text-amount").each(function () {
    if (jQuery(this).height() > maxHeight) {
      maxHeight = jQuery(this).height();
    }
  });
  jQuery(".text-amount").height(maxHeight);

  var maxHeight = 0;
  jQuery(".service-xc").each(function () {
    if (jQuery(this).height() > maxHeight) {
      maxHeight = jQuery(this).height();
    }
  });
  jQuery(".service-xc").height(maxHeight);

  // range datepicker
  // single datepicker
  jQuery(function () {
    jQuery(
      " .class-start, .class-end, .pe-date, .ps-date,  #rstart_date, #eend_date"
    ).datepicker({
      dateFormat: "dd-mm-yy",
      minDate: 1,
    });
  });

  // event side toogle
  jQuery(".p-click.vservice-click").click(function () {
    jQuery(".evnt-sr").hide();
    jQuery(".evnt-install-x").slideToggle();
  });
  jQuery(".p-click.more-click").click(function () {
    jQuery(".evnt-install-x").hide();
    jQuery(".evnt-sr").slideToggle();
  });
});

function exportData() {}
// single element custom image slaider both
jQuery(document).ready(function () {
  var sync1 = jQuery(".single-element");
  var sync2 = jQuery(".navigation-thumbs");
  var thumbnailItemClass = ".owl-item";
  var slides = sync1
    .owlCarousel({
      video: true,
      // startPosition: 12,
      items: 1,
      loop: false,
      autoplay: false,
      autoplayHoverPause: false,
      responsiveClass: true,
      nav: true,
      navText: [
        '<img src="../wp-content/themes/vr-expert/img/p-left.png" alt="angle">',
        '<img src="../wp-content/themes/vr-expert/img/p-right.png" alt="angle">',
      ],
      dots: false,
    })
    .on("changed.owl.carousel", syncPosition);

  function syncPosition(el) {
    $owl_slider = jQuery(this).data("owl.carousel");
    var loop = $owl_slider.options.loop;

    if (loop) {
      var count = el.item.count - 1;
      var current = Math.round(el.item.index - el.item.count / 2 - 0.5);
      if (current < 0) {
        current = count;
      }
      if (current > count) {
        current = 0;
      }
    } else {
      var current = el.item.index;
    }

    var owl_thumbnail = sync2.data("owl.carousel");
    var itemClass = "." + owl_thumbnail.options.itemClass;

    var thumbnailCurrentItem = sync2
      .find(itemClass)
      .removeClass("synced")
      .eq(current);

    thumbnailCurrentItem.addClass("synced");

    if (!thumbnailCurrentItem.hasClass("active")) {
      var duration = 300;
      sync2.trigger("to.owl.carousel", [current, duration, true]);
    }
  }
  var thumbs = sync2
    .owlCarousel({
      //startPosition: 12,
      items: 4,
      loop: false,
      //margin:11.52,
      autoplay: false,
      nav: false,
      dots: false,
      responsive: {
        0: {
          items: 3,
        },
        375: {
          items: 3,
        },
        600: {
          items: 3,
        },
        766: {
          items: 3,
        },
        991: {
          items: 3,
        },

        1024: {
          items: 4,
        },
      },
      onInitialized: function (e) {
        var thumbnailCurrentItem = jQuery(e.target)
          .find(thumbnailItemClass)
          .eq(this._current);
        thumbnailCurrentItem.addClass("synced");
      },
    })
    .on("click", thumbnailItemClass, function (e) {
      e.preventDefault();
      var duration = 300;
      var itemIndex = jQuery(e.target).parents(thumbnailItemClass).index();
      sync1.trigger("to.owl.carousel", [itemIndex, duration, true]);
    })
    .on("changed.owl.carousel", function (el) {
      var number = el.item.index;
      $owl_slider = sync1.data("owl.carousel");
      $owl_slider.to(number, 100, true);
    });

    if(jQuery('#sync1').length > 0){

        jQuery(".image-popup-vertical-fit").magnificPopup({
          type: "image",
          mainClass: "mfp-with-zoom",
          gallery: {
            enabled: true,
          },
          zoom: {
            enabled: true,
            duration: 300, // duration of the effect, in milliseconds
            easing: "ease-in-out", // CSS transition easing function

            opener: function (openerElement) {
              return openerElement.is("img")
                ? openerElement
                : openerElement.find("img");
            },
          },
        });
    }





});

// start new  ready function with
jQuery(document).ready(function () {
  // js for the add to cart/checkout validation
  if (jQuery(".cstm-checkout-form").length > 0) {
  var validation = jQuery(".cstm-checkout-form").validate({
    rules: {
      billing_first_name: "required",
      billing_email: "required",
      billing_address_1: "required",
      billing_city: "required",
      billing_postcode: "required",
      custom_field_new: "required",
      shipping_address_1: "required",
      shipping_city: "required",
      shipping_postcode: "required",
      shipping_first_name: "required",
      shipping_phone: "required",
      billing_first_name: {
        required: true,
        minlength: 4,
      },
    },
    messages: {
      billing_first_name: "Please enter your Name",
      billing_first_name: {
        required: "Please enter Name",
        minlength: "Your Firstname must consist of at least 4 characters",
      },
      billing_email: "Please enter your Email",
      billing_email: {
        required: "Please enter your Email",
        email: "Please Enter valid email Address",
      },
      billing_address_1: "Please enter your Address",
      billing_city: "Please enter your City",
      billing_postcode: "Please enter your Postcode",
      custom_field_new: "Please enter your Vat Number",
      shipping_address_1: "Please enter your Shipping Address",
      shipping_city: "Please enter your Invoice city",
      shipping_postcode: "Please enter your Postal Code",
      shipping_first_name: "Please enter Shipment contactperson name",
      shipping_phone: "Please enter Shipment Number",
    },
  });
}

  jQuery("#next-step").on("click", function (event) {
    jQuery('html, body').animate({scrollTop:0},500);
    if (validation.form()) {
      event.preventDefault();
      const activeThis = jQuery(".tabs-nav .chkStep.activeStep");
      const stepOne = jQuery(".tabs-nav .chkStep.chkStpOne");
      const stepTwo = jQuery(".tabs-nav .chkStep.chkStpTwo");
      const stepThree = jQuery(".tabs-nav .chkStep.chkStpThree");

      if (jQuery(activeThis)) {
        jQuery(activeThis).removeClass("activeStep");
        jQuery(activeThis).next(".tabs-nav .chkStep").addClass("activeStep");
      }
      if (jQuery(stepOne).hasClass("activeStep")) {
        jQuery("#customer_details").show();
        jQuery("#order-rev-id").hide();
        jQuery("#Payment_details").hide();
      } else if (jQuery(stepTwo).hasClass("activeStep")) {
        jQuery("#order-rev-id").show();
        jQuery("#customer_details").hide();
        jQuery("#Payment_details").hide();
        jQuery(stepTwo).prev(stepOne).addClass("stepDone");
        jQuery(".chkStepper .chkStep.stepDone .chkStepNum").text("");
      } else if (jQuery(stepThree).hasClass("activeStep")) {
        jQuery("#order-rev-id").hide();
        jQuery("#Payment_details").show();
        jQuery("#customer_details").hide();
        jQuery(stepThree).prev(stepTwo).addClass("stepDone");
        jQuery(".chkStepper .chkStep.stepDone .chkStepNum").text("");
      } else {
        jQuery("#order-rev-id").hide();
        jQuery("#customer_details").hide();
        jQuery("#Payment_details").hide();
      }

      if (jQuery(".chkStep.chkStpThree").hasClass("activeStep")) {
        jQuery("#next-step").hide();
        jQuery(".entry-content").addClass("ad-diff");

      }
if (jQuery('#ship-to-different-address-checkbox').is(":checked")) {
            jQuery('.shipping_address').show();
            jQuery('.sc-box-div').show();
} else {
    jQuery('.shipping_address').hide();
    jQuery('.sc-box-div').hide();
}
    
    }
  });

  // model js
  jQuery(".small-modal").click(function () {
    jQuery("#days-listing").show();
  });
  jQuery("#days-listing .close").click(function () {
    jQuery("#days-listing").hide();
  });

  // tab js
  // Show the first tab and hide the rest
  jQuery(".t-tabs li:first-child").addClass("active");
  jQuery(".tab-content").hide();
  jQuery(".tab-content:first").show();
  jQuery(".t-tabs li").click(function () {
    jQuery(".t-tabs li").removeClass("active");
    jQuery(this).addClass("active");
    jQuery(".tab-content").hide();
    var activeTab = jQuery(this).find("a").attr("href");
    jQuery(activeTab).fadeIn();
    return false;
  });
  // on change
  jQuery(function () {
    jQuery(".colors").hide();
    jQuery("#display-1 .sl-v:first-child").show();
    jQuery("#tab_selector").change(function () {
      jQuery(".colors").hide();
      jQuery("#" + jQuery(this).val()).show();
    });
  });
});
//yamini js

function check_availability(current_single_product_id,product_cart_key) {

  var installation_service_product = "";
  if (jQuery("#css_popup").is(":checked")) {
    installation_service_product = jQuery("#css_popup").val().trim();
  } else if (jQuery("#css_installation").is(":checked")) {
    installation_service_product = jQuery("#css_installation").val().trim();
  
  }

  var product_id = jQuery("#product_id").val();
  var start_date = jQuery("#start_date").val();

  var end_date = jQuery("#end_date").val();
  var qty = jQuery("#myModal .qty").val();


  jQuery("#start_date").change(function () {
    jQuery(".startdatecheck1").remove();
  });

  jQuery("#end_date").change(function () {
    jQuery(".enddatecheck1").remove();
  });
  var accessories = [];
  if (jQuery(".selected_accessories").length > 0) {
    jQuery(".selected_accessories").each(function () {
      var pid = jQuery(this).attr("data-id");
      accessories.push(pid);
    });
  }
  var simple_accessories = []; 
  if (jQuery(".cst_simp_access").length > 0) {
    jQuery(".cst_simp_access").each(function () {
      var simple_pid = jQuery(this).children("a").attr("value");
      simple_accessories.push(simple_pid);
    });
  }
  console.log(simple_accessories);
  //Popup Date Validation start
  if (start_date == "") {
    jQuery(".startdatecheck1").remove();
    jQuery("#start_date").after(
      '<span class="startdatecheck1">Enter Start date</span>'
    );
    jQuery(".startdatecheck1").css("color", "red");
    return false;
  } else if (!start_date == "") {
    jQuery(".startdatecheck1").remove();
  }

  if (end_date == "") {
    jQuery(".enddatecheck1").remove();
    jQuery("#end_date").after(
      '<span class="enddatecheck1">Enter End date</span>'
    );
    jQuery(".enddatecheck1").css("color", "red");

    return false;
  } else if (!end_date == "") {
    jQuery(".enddatecheck1").remove();
  }
  //Popup Date Validation start
  if(jQuery('body').hasClass('woocommerce-cart')){
    var pageName = 'cart';
  }else{
    var pageName = '';
  }

  jQuery.ajax({
    type: "POST",
    dataType: "json",
    url: "/wp-admin/admin-ajax.php",
    data: {
      action: "check_product_availability",
      start_date: start_date,
      end_date: end_date,
      product_id: product_id,
      installation_service_product_id: installation_service_product,
      current_single_product_id: current_single_product_id,
      qty: qty,
      accessories_id: accessories,
      simple_accessories_id: simple_accessories,
      pageName: pageName,
    },
    beforeSend: function (res) {
      // setting a timeout
      jQuery("#gobal-loder").show();
    },
    success: function (res) {
      console.log("check_product_availability -> successs " + res.status);
      if (res.status == 200) {
        if (jQuery("body").hasClass("home")) {
          jQuery("#days-listingw").toggleClass("hide");
          jQuery("#suc_msg").html(res.message);
          jQuery("#gobal-loder").hide();
          jQuery("#myModal").hide();
          setTimeout(function () {
            jQuery("#days-listingw").toggleClass("hide");
          }, 3000);
        window.location.reload(res.url);
        } else {
        window.location.href = res.redirect;
        }
      } else {
        jQuery("#gobal-loder").hide();
        jQuery("#error_message").html(res.message);

        //Yaminee add no date aviale text
      }
    },
    error: function (res) {
      console.log("check_product_availability -> error " + res);
    },
  });
}
jQuery(".modal-overlay").on("click", function () {
  jQuery("#myModal").toggleClass("hide");
  jQuery("body").removeClass("overflowcst");
});
jQuery("#myModal .close").on("click", function () {
  jQuery("#myModal").toggleClass("hide");
  jQuery("body").removeClass("overflowcst");
});
jQuery("#days-listingw .close").click(function () {
  jQuery("#myModal").hide();
});

jQuery("#end_date_new").change(testMessage);
function testMessage() {
  var end_date_new = jQuery("#end_date_new").val();
  var start_date_new = jQuery("#start_date_new").val();
  var url = jQuery("#url").val();
  var product_id_new = jQuery("#product_id_new").val();

  jQuery.ajax({
    type: "POST",
    dataType: "json",
    url: url,
    data: {
      action: "check_availability_on_single_product_page",
      end_date_new: end_date_new,
      start_date_new: start_date_new,
      product_id_new: product_id_new,

    },
    beforeSend: function () {
      jQuery("#wait").show();
    },

    success: function (res) {
      console.log(res);

      jQuery("#response_message").html(res.message);
      jQuery("#wait").hide();
    },
    error: function (res) {
      console.log(res);
      jQuery("#response_message").html("Something went wrong!");
      jQuery("#wait").hide();
    },
  });
}

// validation for single page
jQuery("#start_date_new").click(function () {
  jQuery(".startdatecheck").hide();
});
jQuery("#end_date_new").click(function () {
  jQuery(".enddatecheck").hide();
});
// on cklick on add to cart everyplaces code
function open_popup(id, cart_key="") {
  // validation for single page
  if (jQuery("body").is(".single-product")) {
    var start_date_new = jQuery("#start_date_new").val();
    var end_date_new = jQuery("#end_date_new").val();
    jQuery("#start_date_new").change(function () {
      jQuery(".startdatecheck").remove();
    });

    jQuery("#end_date_new").change(function () {
      jQuery(".enddatecheck").remove();
    });

    if (start_date_new == 0) {
      jQuery(".startdatecheck").remove();
      jQuery("#start_date_new").after(
        '<span class="startdatecheck">Enter Start date</span>'
      );
      jQuery(".startdatecheck").css("color", "red");
      return false;
    } else if (!start_date_new == "") {
      jQuery(".startdatecheck").remove();
    }
    if (end_date_new == 0) {
      jQuery(".enddatecheck").hide();
      jQuery("#end_date_new").after(
        '<span class="enddatecheck">Enter End date</span>'
      );
      jQuery(".enddatecheck").css("color", "red");
      return false;
    } else if (!end_date_new == "") {
      jQuery(".startdatecheck1").remove();
    }
  }
  // validation for single page
  var url = jQuery("#url").val();

  var single_product_id = id;
  var cart_key = cart_key;
  console.log("run open_popup" + cart_key);
  jQuery("#single_product_id_new").val(single_product_id);
  var end_date_new = jQuery("#end_date_new").val();
  var start_date_new = jQuery("#start_date_new").val();
  if (start_date_new) {
    jQuery("#start_date").val(start_date_new);
    jQuery("#start_date").prop("disabled", true);
  }
  if (end_date_new) {
    jQuery("#end_date").val(end_date_new);
    jQuery("#end_date").prop("disabled", true);
  }
  var is_cart_var = "no";
  if (jQuery("body").hasClass("woocommerce-cart")) {
    is_cart_var = "yes";
  }
  jQuery("#myModal").toggleClass("hide");
  jQuery("body").addClass("overflowcst");
  jQuery.ajax({
    type: "POST",
    url: "/wp-admin/admin-ajax.php",
    data: {
      action: "popup_html",
      end_date_new: end_date_new,
      start_date_new: start_date_new,
      single_product_id: id,
      cart_key: cart_key,
      is_cart_var: is_cart_var,
    },
    beforeSend: function (result) {
      jQuery("#wait").show();
      console.log(result);
      jQuery("#myModal #content").html("");
    },
    success: function (result) {
      //assoc
   
      jQuery("#wait").hide();

      jQuery("#myModal #content").html(result);
      var end_date_new = jQuery("#end_date_new").val();

      var start_date_new = jQuery("#start_date_new").val();
      if (start_date_new) {
        jQuery("#start_date").val(start_date_new);
        jQuery("#start_date").prop("disabled", true);
      }
      if (end_date_new) {
        jQuery("#end_date").val(end_date_new);
        jQuery("#end_date").prop("disabled", true);
      }
      if(jQuery('#css').prop('checked')){
          jQuery('#myModal #css_popup').prop('checked',true);
          jQuery('#myModal .ds-are').show();
          jQuery('#myModal textarea[name=installation_service]').val(jQuery('.install-v-data .ds-are textarea[name=installation_service]').val());
      }
      jQuery("#accessories-pop").owlCarousel({
        autoplay: true,
       // loop: false,
       autoplayTimeout: 7000,
       smartSpeed: 800,
        rewind: true,
        margin: 24.5,
        responsiveClass: true,
        dots: false,
        nav: true,
        navText: [
          '<img src="../wp-content/themes/vr-expert/img/popup-right.png" alt="angle">',
          '<img src="../wp-content/themes/vr-expert/img/popup-right.png" alt="angle">',
        ],
        responsive: {
          0: {
            items: 1,
          },

          766: {
            items: 2,
          },

          1024: {
            items: 2.23,
          },

          1200: {
            items: 2.23,
          },
        },
      });
      //display quantity with +/- quantity

      console.log(cart_key);
      if (cart_key) {
        if (jQuery("body").hasClass("home")) {
          var addInput = ".q-123 .qty";
          if (jQuery(".cart .qty").length > 0) {
            var noqty = jQuery(".cart .qty").val();
          } else {
            var noqty = 1;
          }
          jQuery(addInput).val(noqty);
        }
      } else {
        var addInput = ".q-123 .qty";
        if (jQuery(".cart .qty").length > 0) {
          var noqty = jQuery(".cart .qty").val();
        } else {
          var noqty = 1;
        }
        jQuery(addInput).val(noqty);
      }

      jQuery(".plus1").on("click", function () {
        var Datav = jQuery(this)
          .parent(".p-add-max")
          .prev(".p-quantity")
          .children(".qty")
          .val();
        jQuery(this)
          .parent(".p-add-max")
          .prev(".p-quantity")
          .children(".qty")
          .val(++Datav);
      });

      jQuery(".minus1").on("click", function () {
        var Datav = jQuery(this)
          .parent(".p-qty-min")
          .next(".p-quantity")
          .children(".qty")
          .val();
        if (Datav > 1) {
          jQuery(this)
            .parent(".p-qty-min")
            .next(".p-quantity")
            .children(".qty")
            .val(--Datav);
        } else {
          // Otherwise do nothing
        }
      });
      //date-picker js
      jQuery(function () {
        jQuery(" .ps-date, .pe-date").datepicker({
          dateFormat: "dd-mm-yy",
          minDate: 1,
        });
      });
    },
    error: function (result) {
      console.log("error " + result);
    },
  });
}
//add to cart js
function add_to_cart(id) {
  jQuery.ajax({
    type: "POST",
    dataType: "json",
    url: "/wp-admin/admin-ajax.php",
    data: {
      action: "add_to_cart_simple_product",
      product_id_simple: id,
    },
    beforeSend: function (res) {
      // setting a timeout
      jQuery("#gobal-loder").show();
    },
    success: function (res) {
      setTimeout(function () {
        jQuery("#gobal-loder").hide();
      }, 500);


      jQuery("#suc_msg").text(res.message);
      window.location.reload(res.url);

      console.log(res);
    },
    complete: function () {
      jQuery("#days-listingw").toggleClass("hide");
    },
  });
}

// yamini js script end

// cross icon js
function removefunc(product_id) {

  var mini_remove_item = jQuery("#mini_remove_item").val();
  jQuery.ajax({
    type: "POST",
    dataType: "json",
    url: "/wp-admin/admin-ajax.php",
    data: {
      action: "del_item_from_minicart",
      mini_remove_item: product_id,
    },
    beforeSend: function (res) {
      // setting a timeout
       jQuery("#gobal-loder").show();
    },
    success: function (res) {

    location.reload(true);
    jQuery("#gobal-loder").hide();
    },
  });
}
function installation_service(installation_service_product_id, id) {
  var installation_service_product = "";
  console.log(installation_service_product_id);
  if (jQuery("#css_popup").is(":checked")) {
    installation_service_product = installation_service_product_id;
  } else if (jQuery("#css_popup_event").is(":checked")) {
    installation_service_product = installation_service_product_id;
  } else {
    if (jQuery("#css").is(":checked")) {
      installation_service_product = installation_service_product_id;
    }
  }
  jQuery.ajax({
    type: "POST",
    dataType: "json",
    url: "/wp-admin/admin-ajax.php",
    data: {
      action: "add_to_cart_installation_service",
      installation_service_product_id: installation_service_product,
      current_single_product_id: id,
    },
    beforeSend: function (res) {
      // setting a timeout
      jQuery("#gobal-loder").show();
    },
    success: function (res) {
      jQuery("#gobal-loder").hide();

      jQuery("#days-listingw").toggleClass("hide");
      jQuery("#suc_msg").text(res.message);
      setTimeout(function () {
        jQuery("#days-listingw").toggleClass("hide");
      }, 1000);
      window.location.reload(res.url);

      console.log(res);
    },
  });
}
//function for event service add simple product
function event_service(event_service_product_id) {

  var qty = jQuery("." + event_service_product_id + " #qnts").val();

  jQuery.ajax({
    type: "POST",
    dataType: "json",
    url: "/wp-admin/admin-ajax.php",
    data: {
      action: "add_to_cart_event_service",
      event_service_product: event_service_product_id,
      quantity: qty,
    },
    beforeSend: function (res) {
      // setting a timeout
    },
    success: function (res) {
      console.log(res);
      jQuery("#gobal-loder").hide();
      jQuery("#days-listingw").toggleClass("hide");
      jQuery("#suc_msg").text(res.message);
      setTimeout(function () {
        jQuery("#days-listingw").toggleClass("hide");
      }, 1000);
      window.location.reload(res.url);
    },
  });
}

function vrill_filter(id, termid) {
  var filter_value = id;

  var vr_brill_val = [];

  if (jQuery('input[name="type_brill"]:checked').length !== 0) {
    jQuery('input[name="type_brill"]:checked').each(function () {
      vr_brill_val.push(jQuery(this).val());
    });
  }


  jQuery.ajax({
    url: "wp-admin/admin-ajax.php",
    type: "POST",
    datatype: "json",
    data: {
      action: "myfilter_brill_category",
      filter_id: filter_value,
      filter_value: vr_brill_val,
      termid_data: termid,
    },
    beforeSend: function () {
      jQuery("#gobal-loder").show();
    },
    success: function (data) {
      jQuery("#gobal-loder").hide();
      jQuery(function () {
        function equalHeightt() {
          var heightArray = jQuery(".shop-container .p-content")
            .map(function () {
              return jQuery(this).height();
            })
            .get();
          var equalHeightt = Math.max.apply(Math, heightArray);
          jQuery(".shop-container .p-content").height(equalHeightt);
        }
        equalHeightt();
      });
      jQuery("#filter_data").html(data);
    },
    error: function (data) {
      console.log(data);
    },
  });
}
function add_accessories(accessories_id) {}


/* new script code here */

jQuery(window).on('load', function() {
  jQuery('.loaderWindow').hide();
});

jQuery(document).ready(function() {

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
    function equalHeightt() {
        var heightArray = jQuery(".fl-vr").map(function() {
            return jQuery(this).height();
        }).get();
        var equalHeightt = Math.max.apply(Math, heightArray);
        jQuery(".fl-vr").height(equalHeightt);
    }
    equalHeightt();
});



  jQuery(function() {
      jQuery(".date_to_start, .date_to_end, .Date-GStart, .Date-GEnd, .onlypackage li.cst-input-230.r-date-1 input, .onlypackage li.cst-input-230.r-date-2 input").datepicker({
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
              
              });
              jQuery('.chooseHfilter').multiselect({
                  columns: 1,
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
                var heightArray = jQuery(".fl-vr").map(function() {
                    return jQuery(this).height();
                }).get();
                var equalHeightt = Math.max.apply(Math, heightArray);
                jQuery(".fl-vr").height(equalHeightt);
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