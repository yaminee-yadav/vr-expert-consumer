<footer>

  <div class="first-footer regular-txt">

    <div class="regular-container">

      <div class="f-row">

        <div class="footer-f-content">

          <div class="equal-3 w-216 listclass">

            <?php if(get_field('footer_logo','option')){ ?>

            <div class="footer-Brand-img">

              <img src="<?php the_field('footer_logo','option'); ?>" class="size-sr" alt="Orange-footer-logo">

            </div>

            <?php }  ?>

            <ul class="listclass">

              <?php if(get_field('address','option')){ ?>

              <?php the_field('address','option'); ?>

              <?php } ?>

            </ul>

          </div>

          <div class="equal-3 w-160 listclass">

            <h5 class="f-title">VR </h5>

            <?php    wp_nav_menu(array(

              'menu' => 'footer-menu-col-1',

              'theme_location' => 'footer-menu-col-1',

              'container' => false,

                  )

              ); ?>

            <ul class="listclass">

              <li class="listlink text-right"><a href="https://vr-expert.com/">

                <?php if(get_field('col_2_svg','option')){ ?>

                <?php the_field('col_2_svg','option'); ?>

                <?php } ?>

                </span> <?php if(get_field('col_2_text','option')){ ?>

                <?php the_field('col_2_text','option'); ?>

                <?php } ?></a>

              </li>

            </ul>

          </div>

          <div class="equal-3 w-128 listclass">

            <h5 class="f-title">AR</h5>

            <?php    wp_nav_menu(array(

              'menu' => 'footer-menu-col-2',

              'theme_location' => 'footer-menu-col-2',

              'container' => false,

              

                  )

              ); ?>

            <ul class="listclass">

              <?php if(get_field('col_3_image','option')){ ?>

              <li class="listlink text-right"><a href=""><img src="	<?php the_field('col_3_image','option'); ?>" class="size-b-img" alt="product-search"></a></li>

              <?php } ?>

            </ul>

          </div>

        </div>

        <div class="footer-last-content">

          <div class="equal-2 w-147 listclass">

            <h5 class="f-title">Services</h5>

            <?php    wp_nav_menu(array(

              'menu' => 'footer-menu-col-3',

              'theme_location' => 'footer-menu-col-3',

              'container' => false,

              

                  )

              ); ?>

          </div>

          <div class="equal-2 w-147 listclass">

            <h5 class="f-title">About us</h5>

            <?php    wp_nav_menu(array(

              'menu' => 'footer-menu-col-4',

              'theme_location' => 'footer-menu-col-4',

              'container' => false,

              

              

                  )

              ); ?>

          </div>

        </div>

      </div>

    </div>

  </div>

  <div class="bottom-footer">

    <div class="container">

      <div class="f-bottom-text ">

        <?php if(get_field('privacy_policy','option')){ ?>

        <?php the_field('privacy_policy','option'); ?>

        <?php } ?>

      </div>

    </div>

  </div>

</footer>

<!-- footer --> 

<!-- Your Choise Modal  -->

<div id="myModal" class="modal hide">

<div class="modal-overlay"></div>

  <div class="modal-content">

    <input type="hidden" id="single_product_id_new" name="single_product_id" value="" >

    <div class="modal-header">

      <span class="close">

        <svg xmlns="http://www.w3.org/2000/svg" width="19.002" height="19.006" viewBox="0 0 19.002 19.006">

          <g id="Group_1735" data-name="Group 1735" transform="translate(0.707 0.711)">

            <line id="Line_32" data-name="Line 32" y1="17.588" x2="17.588" fill="none" stroke="#818cc4" stroke-width="2"/>

            <line id="Line_33" data-name="Line 33" x2="17.588" y2="17.394" fill="none" stroke="#818cc4" stroke-width="2"/>

          </g>

        </svg>

      </span>

      <h2 class="mb-0 f-m-20">Your choice</h2>

    </div>

    <div id="content"></div>

  </div>

</div>

<!-- Your Choise Model End -->



<!-- model small  -->

<div id="days-listingw" class="modal hide small-mdl Sm-P">

<div class="modal-overlay5"></div>

  <div class="modal-content">

    <div class="modal-header">

      <span class="close">

        <svg xmlns="http://www.w3.org/2000/svg" width="19.002" height="19.006" viewBox="0 0 19.002 19.006">

          <g id="Group_1735" data-name="Group 1735" transform="translate(0.707 0.711)">

            <line id="Line_32" data-name="Line 32" y1="17.588" x2="17.588" fill="none" stroke="#818cc4" stroke-width="2"></line>

            <line id="Line_33" data-name="Line 33" x2="17.588" y2="17.394" fill="none" stroke="#818cc4" stroke-width="2"></line>

          </g>

        </svg>

      </span>

      <h2 class="mb-0 regular-txt">Products Added Popup</h2>

    </div>

    <div class="modal-body">

      <div class="div-283">

        <p id="suc_msg" class="mid-14"></p>

      </div>

    </div>

  </div>

</div>

<!-- END SMALL MODEL -->

<!-- wait lpader -->

<div id="gobal-loder" class="one-loder" >

  <div class="loader_child">

    <div id="loading-bar-spinner" class="spinner">

      <div class="spinner-icon"></div>

    </div>

  </div>

</div>

<!-- wait loder end  -->

<!-- Thankyou popup coman -->

<div id="thnks-msgs" class="modal hide SidPwidth">

<div class="modal-overlay5"></div>

  <div class="modal-content">

    <div class="modal-header">

      <span class="close">

        <svg xmlns="http://www.w3.org/2000/svg" width="19.002" height="19.006" viewBox="0 0 19.002 19.006">

          <g id="Group_1735" data-name="Group 1735" transform="translate(0.707 0.711)">

            <line id="Line_32" data-name="Line 32" y1="17.588" x2="17.588" fill="none" stroke="#818cc4" stroke-width="2"></line>

            <line id="Line_33" data-name="Line 33" x2="17.588" y2="17.394" fill="none" stroke="#818cc4" stroke-width="2"></line>

          </g>

        </svg>

      </span>

      <h2 class="mb-0 f-reg-18">Thank you for your request</h2>

    </div>

    <div class="modal-body">

      <div class="Thanksms-container">

        <p class="regular-txt">Thank you for the request we will contact you within 24 hours.</p>

        <div class="div-inputp th-alm255">

          <div class="lf-inputp">

            <label class="label-class regular-txt">Types of packages<span>*</span></label>

            <input type="input" class="pop-input light-text" placeholder="<?php echo $product_title ?>" name="" readonly>

          </div>

          <div class="rt-inputp">

            <label class="label-class regular-txt">Rent date<span>*</span></label>

            <div class="width-255">

              <div class="D-Date">

                <div class="Daticons">

                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">

                    <path id="Path_4923" data-name="Path 4923" d="M2,11H22v9a1,1,0,0,1-1,1H3a1,1,0,0,1-1-1ZM17,3h4a1,1,0,0,1,1,1V9H2V4A1,1,0,0,1,3,3H7V1H9V3h6V1h2Z" transform="translate(-2 -1)" fill="rgba(129,140,196,0.33)"/>

                  </svg>

                </div>

                <div class="Date-1 regular-txt position-relative">

                  <input type="input" class="" placeholder="08/08/2021" name="" value="" readonly >

                </div>

                <div class="ddline position-relative">

                  -

                </div>

                <div class="Date-2 regular-txt position-relative">

                  <input type="input" class="" placeholder="09/08/2021" name="" value="" readonly >

                </div>

              </div>

            </div>

          </div>

        </div>

        <!-- items 1 -->

      </div>

    </div>

    

  </div>

</div>

<!-- Thankyou popup coman end -->

<!-- model package -->

<?php if(is_archive('packages')){ ?>

<div id="modal-pakages" class="modal hide MidPwidth onlypackage">

<div class="modal-overlay3"></div>

  <div class="modal-content">

    <div class="modal-header">

      <span class="close">

        <svg xmlns="http://www.w3.org/2000/svg" width="19.002" height="19.006" viewBox="0 0 19.002 19.006">

          <g id="Group_1735" data-name="Group 1735" transform="translate(0.707 0.711)">

            <line id="Line_32" data-name="Line 32" y1="17.588" x2="17.588" fill="none" stroke="#818cc4" stroke-width="2"></line>

            <line id="Line_33" data-name="Line 33" x2="17.588" y2="17.394" fill="none" stroke="#818cc4" stroke-width="2"></line>

          </g>

        </svg>

      </span>

      <h2 class="mb-0 f-reg-18">Rental date</h2>

    </div>

    <div class="modal-body">

      <div class="mp-container gpopup-f">

        <?php  

          echo do_shortcode('[gravityform id="2" title="false" description="false" ajax="true" tabindex="49"]'); ?>

      </div>

    </div>

   

  </div>

</div>

<?php } ?>

<!-- model request cart page -->



<!-- model package -->

<?php if(is_single()){?>

<div id="modal-pakages-date" class="modal hide MidPwidth package-d-popup">

<div class="modal-overlay5"></div>

  <div class="modal-content">

    <div class="modal-header">

      <span class="close">

        <svg xmlns="http://www.w3.org/2000/svg" width="19.002" height="19.006" viewBox="0 0 19.002 19.006">

          <g id="Group_1735" data-name="Group 1735" transform="translate(0.707 0.711)">

            <line id="Line_32" data-name="Line 32" y1="17.588" x2="17.588" fill="none" stroke="#818cc4" stroke-width="2"></line>

            <line id="Line_33" data-name="Line 33" x2="17.588" y2="17.394" fill="none" stroke="#818cc4" stroke-width="2"></line>

          </g>

        </svg>

      </span>

      <h2 class="mb-0 f-reg-18">Requests for Quote</h2>

    </div>

    <div class="modal-body">

      <div class="mp-container gpopup-f">

        <?php  

          echo do_shortcode('[gravityform id="2" title="false"  description="false" ajax="fatruelse" tabindex="49"]'); ?>

      </div>

    </div>

  </div>

</div>

<!-- model request cart page -->

<?php } ?>







<?php if(is_page('cart')){ ?>

<div id="tagetinfop" class="modal hide MidPwidth">

    <div class="modal-overlay1"></div>

	<div class="modal-content">

		<div class="modal-header">

			<span class="close">

				<svg xmlns="http://www.w3.org/2000/svg" width="19.002" height="19.006" viewBox="0 0 19.002 19.006">

					<g id="Group_1735" data-name="Group 1735" transform="translate(0.707 0.711)">

						<line id="Line_32" data-name="Line 32" y1="17.588" x2="17.588" fill="none" stroke="#818cc4" stroke-width="2"></line>

						<line id="Line_33" data-name="Line 33" x2="17.588" y2="17.394" fill="none" stroke="#818cc4" stroke-width="2"></line>

					</g>

				</svg>

			</span>

			<h2 class="mb-0 f-reg-18">Request a quotation</h2>

		</div>

		<div class="modal-body">

			<div class="mp-container">

       <?php echo do_shortcode('[gravityform id="1" title="false" description="false" ajax="true" tabindex="49"]'); ?>

			</div> 

		</div>

	</div>

</div>
<?php } ?>
<!-- cart btn popup -->

<?php

  wp_footer();

  ?>

</div>

</div>
</body>

</html>