jQuery(document).ready(function(){
  // tab js
  jQuery(".info-tabsbar li:first-child").addClass("active");
  jQuery(".tab-contents").hide();
  jQuery(".tab-contents:first").show();
  jQuery(".info-tabsbar li").click(function () {
    jQuery(".info-tabsbar li").removeClass("active");
    jQuery(this).addClass("active");
    jQuery(".tab-contents").hide();
    var activeTab = jQuery(this).find("a").attr("href");
    jQuery(activeTab).fadeIn();
    return false;
  });

 // service page
 jQuery("#main-carousel-popup").owlCarousel({
  autoplay: true,
  rewind: true, 
  items: 3,
  margin: 30,
  responsiveClass: true,
  dots: false,
  nav: true,
  navText: [
    '<img src="../wp-content/themes/vr-expert/img/g-left.svg" alt="angle">',
    '<img src="../wp-content/themes/vr-expert/img/g-right.svg" alt="angle">',
  ],
  responsive: {
    0: {
      items: 1,
    },
    766: {
      items: 3,
    },
    1024: {
      items: 3,
    },
    1200: {
      items: 3,
    },
  },
});

//equal height
jQuery(function() {
  function equalHeightt() {
      var heightArray = jQuery(".Wrap-pdesc").map(function() {
          return jQuery(this).height();
      }).get();
      var equalHeightt = Math.max.apply(Math, heightArray);
      jQuery(".Wrap-pdesc").height(equalHeightt);
  }
  equalHeightt();
});
jQuery(function() {
  function equalHeightt() {
      var heightArray = jQuery(".Accesoires-Home .Acc-Girds-desc").map(function() {
          return jQuery(this).height();
      }).get();
      var equalHeightt = Math.max.apply(Math, heightArray);
      jQuery(".Accesoires-Home .Acc-Girds-desc").height(equalHeightt);
  }
  equalHeightt();
});
jQuery(function() {
  function equalHeightt() {
      var heightArray = jQuery(".Acc-AllP-list .Acc-Girds-desc").map(function() {
          return jQuery(this).height();
      }).get();
      var equalHeightt = Math.max.apply(Math, heightArray);
      jQuery(".Acc-AllP-list .Acc-Girds-desc").height(equalHeightt);
  }
  equalHeightt();
});
jQuery(function() {
  function equalHeightt() {
      var heightArray = jQuery(".allEndTabs .Wrap-pdesc").map(function() {
          return jQuery(this).height();
      }).get();
      var equalHeightt = Math.max.apply(Math, heightArray);
      jQuery(".allEndTabs .Wrap-pdesc").height(equalHeightt);
  }
  equalHeightt();
});

jQuery(function() {
  function equalHeightt() {
      var heightArray = jQuery(".Hot5-section .wrap-ai .Wrap-pdesc").map(function() {
          return jQuery(this).height();
      }).get();
      var equalHeightt = Math.max.apply(Math, heightArray);
      jQuery(".Hot5-section .wrap-ai .Wrap-pdesc").height(equalHeightt);
  }
  equalHeightt();
});
jQuery(function() {
  function equalHeightt() {
      var heightArray = jQuery(".Accesoires-Home.supported-headset .Wrap-pdesc").map(function() {
          return jQuery(this).height();
      }).get();
      var equalHeightt = Math.max.apply(Math, heightArray);
      jQuery(".Accesoires-Home.supported-headset .Wrap-pdesc").height(equalHeightt);
  }
  equalHeightt();
});

jQuery(function() {
  function equalHeightt() {
      var heightArray = jQuery(".Hot5-section.Uses-levelR .Wrap-pdesc").map(function() {
          return jQuery(this).height();
      }).get();
      var equalHeightt = Math.max.apply(Math, heightArray);
      jQuery(".Hot5-section.Uses-levelR .Wrap-pdesc").height(equalHeightt);
  }
  equalHeightt();
});

jQuery(function() {
  function equalHeightt() {
      var heightArray = jQuery(".S-info-product .sp-info").map(function() {
          return jQuery(this).height();
      }).get();
      var equalHeightt = Math.max.apply(Math, heightArray);
      jQuery(".S-info-product .sp-info").height(equalHeightt);
  }
  equalHeightt();
});
/*
jQuery(function() {
  function equalHeightt() {
      var heightArray = jQuery("#myModalone .sp-info").map(function() {
          return jQuery(this).height();
      }).get();
      var equalHeightt = Math.max.apply(Math, heightArray);
      jQuery("#myModalone .sp-info").height(equalHeightt);
  }
  equalHeightt();
});
 jQuery(function() {
   function equalHeightt() {
       var heightArray = jQuery("#myModalone .Acc-Girds-desc ").map(function() {
           return jQuery(this).height();
       }).get();
       var equalHeightt = Math.max.apply(Math, heightArray);
       jQuery("#myModalone .Acc-Girds-desc ").height(equalHeightt);
   }
   equalHeightt();
 });
*/
//quntity add using 

jQuery(".plus-one").click(function() {
  jQuery(".Qy-adding").val(Number(jQuery(".Qy-adding").val()) + 1);
});
jQuery(".minus-one").click(function() {
  if (jQuery(".Qy-adding").val() > 1)
      jQuery(".Qy-adding").val(Number(jQuery(".Qy-adding").val()) - 1);
});
//popup
jQuery('.single-p-wrap .header-btn').click(function() {
  jQuery('#myModalone').toggleClass('hide');
});
jQuery('.modal-overlay').on('click', function() {
  jQuery('#myModalone').toggleClass('hide');
});
jQuery('#myModalone .close').on('click', function() {
  jQuery('#myModalone').toggleClass('hide');
});



  });