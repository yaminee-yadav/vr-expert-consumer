<?php

	/**

	 * Checkout Form

	 *

	 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-checkout.php.

	 *

	 * HOWEVER, on occasion WooCommerce will need to update template files and you

	 * (the theme developer) will need to copy the new files to your theme to

	 * maintain compatibility. We try to do this as little as possible, but it does

	 * happen. When this occurs the version of the template file will be bumped and

	 * the readme will list any important changes.

	 *

	 * @see https://docs.woocommerce.com/document/template-structure/

	 * @package WooCommerce\Templates

	 * @version 3.5.0

	 */

	

	if ( ! defined( 'ABSPATH' ) ) {

		exit;

	}

	

	do_action( 'woocommerce_before_checkout_form', $checkout );

	

	// If checkout registration is disabled and not logged in, the user cannot checkout.

	if ( ! $checkout->is_registration_enabled() && $checkout->is_registration_required() && ! is_user_logged_in() ) {

		echo esc_html( apply_filters( 'woocommerce_checkout_must_be_logged_in_message', __( 'You must be logged in to checkout.', 'woocommerce' ) ) );

		return;

	}

	

	?>

<!-- checkout stepper -->

<ul class="chkStepper tabs-nav">

	<li class="chkStep activeStep chkStpOne"><span class="chkStepNum">1</span>Your information</li>

	<li class="chkStep chkStpTwo"><span class="chkStepNum">2</span>Attachment</li>

	<li class="chkStep chkStpThree"><span class="chkStepNum">3</span>Payment method</li>

</ul>

<form name="checkout" method="post" class="checkout woocommerce-checkout cstm-checkout-form" action="<?php echo esc_url( wc_get_checkout_url() ); ?>" enctype="multipart/form-data">

	<?php if ( $checkout->get_checkout_fields() ) : ?>

	<?php do_action( 'woocommerce_checkout_before_customer_details' ); ?>

	<div class="col2-set chkFrmWrp cstmTabStg" id="customer_details">

		<div class="col-1 chkFrmCol">

			<?php do_action( 'woocommerce_checkout_billing' ); ?>

		</div>

		<div class="col-2 chkFrmCol">

			<?php do_action( 'woocommerce_checkout_shipping' ); ?>

		</div>

	</div>

	<?php do_action( 'woocommerce_checkout_after_customer_details' ); ?>

	<?php endif; ?>

	<div class="ordrRevWrp cstmTabStg" id="order-rev-id" style="display: none;">

		<div class="sec-two-1">

			<div class="check-11 w-355 wequal">

				<h2 class="fx-20">Your information</h2>

				<div class="n-info">

					<ul class="day-rent">

						<li class="one-rent">

							<div class="flex-days">

								<div class="flex-days-1 fx-16">

									Invoice information

								</div>

								<div class="flex-days-2 mid-14">

									<a class="ch-back" href="javascript:void(0)">Change</a>

								</div>

							</div>

						</li>

					</ul>

				</div>

				<!-- first div start -->

				<div class="sc-first-div">

					<div class="S-1">

						<div class="flex-2">

							<div class="flex-133 mid-14">

								Name

							</div>

							<div class="flex-175 light-txt">

								<p id="checkname"></p>

							</div>

						</div>

						<div class="flex-2">

							<div class="flex-133 mid-14">

								E-Mail

							</div>

							<div class="flex-175 light-txt">

								<p id="checkEmail"></p>

							</div>

						</div>

					</div>

					<!-- first -s1 -->

					<div class="S-1">

						<div class="flex-2">

							<div class="flex-133 mid-14">

								Company

							</div>

							<div class="flex-175 light-txt">

								<p id="checkComp"></p>

							</div>

						</div>

						<div class="flex-2">

							<div class="flex-133 mid-14">

								VAT number

							</div>

							<div class="flex-175 light-txt">

								<p id="checkVat"></p>

							</div>

						</div>

					</div>

					<!-- first -s1 -->

					<div class="S-1">

						<div class="flex-2">

							<div class="flex-133 mid-14">

								Invoice Address

							</div>

							<div class="flex-175 light-txt">

								<p id="checkAddress"></p>

							</div>

						</div>

						<div class="flex-2">

							<div class="flex-133 mid-14">

								Invoice City

							</div>

							<div class="flex-175 light-txt">

								<p id="checkCity"></p>

							</div>

						</div>

					</div>

					<!-- first -s1 -->

					<div class="S-1">

						<div class="flex-2">

							<div class="flex-133 mid-14">

								Invoice postal code

							</div>

							<div class="flex-175 light-txt">

								<p id="checkPostcode"></p>

							</div>

						</div>

					</div>

					<!-- first -s1 -->

					<div class="S-1">

						<div class="flex-2">

							<div class="flex-133 mid-14">

								Invoice Country

							</div>

							<div class="flex-175 light-txt">

								<p id="checkCountry"></p>

							</div>

						</div>

						<div class="flex-2">

							<div class="flex-133 mid-14">

								Invoice Reference

							</div>

							<div class="flex-175 light-txt">

								<p id="checkInvoice"></p>

							</div>

						</div>

					</div>

					<!-- first -s1 -->

				</div>

				<!-- first div end -->

			
				<div class="sc-box-div">

					<hr class="ch-hr">

					<h2 class="fx-20">Shipment Adress</h2>

					<div class="S-1">

						<div class="flex-2">

							<div class="flex-133 mid-14">

								Shipment address

							</div>

							<div class="flex-175 light-txt">

								<p id="checkshipAdd"></p>

							</div>

						</div>

						<div class="flex-2">

							<div class="flex-133 mid-14">

								Shipment phone number

							</div>

							<div class="flex-175 light-txt">

								<p id="checkshipPhone"></p>

							</div>

						</div>

						<div class="flex-2">

							<div class="flex-133 mid-14">

								Name

							</div>

							<div class="flex-175 light-txt">

								<p id="checkshipName" ></p>

							</div>

						</div>

					</div>

					

				</div>
				

			</div>

			<!-- end  left 355 side -->

			<div class="wd-444 wvc">

				<div class="vv-cart-total">

					<div class="cart-collaterals vrc-total">

						<h2  class="cart-h2-head">Reservation</h2>

						<?php

							/**

							 * Cart collaterals hook.

							 *

							 * @hooked woocommerce_cross_sell_display

							 * @hooked woocommerce_cart_totals - 10

							 */

							do_action( 'woocommerce_cart_collaterals' );

							?>

						<div class="cus-cart">

							<!-- booqable div  START  -->

							<div class="normal-purchase">

								<div class="booqable-title mid-14">

									<span> Purchase </span>

									<span class="tm-ornge hovr-tx tooltip tooltip--top" data-tooltip="Bij het kopen van de installatie service maken wij uw VR of AR bril startklaar door vooraf de bril te configureren en de gewenste applicatie en/of 360 content te installeren.">

										<svg id="Component_96_1" data-name="Component 96 – 1" xmlns="http://www.w3.org/2000/svg" width="16.884" height="16.011" viewBox="0 0 16.884 18.011">

											<ellipse id="Ellipse_2439" data-name="Ellipse 2439" cx="8.442" cy="8.442" rx="8.442" ry="8.442" transform="translate(0 1.127)" fill="#f59663"></ellipse>

											<text id="i" transform="translate(6.754 13)" fill="#fff" font-size="12" font-family="Poppins-Light, Poppins" font-weight="300">

												<tspan x="0" y="0">i</tspan>

											</text>

										</svg>

									</span>

								</div>

								<!-- END Title -->

								<?php foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {			  
								
									$_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
								

									$product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

									$booqable_product_ids  = get_post_meta($product_id,'booqable_product_id',true);

									

									if($booqable_product_ids == '' || $booqable_product_ids == NULL){ 

									?>

								<div class="flx-rental-list">

									<div class="rental-products-normal light-text "> <?php

										if ( ! $product_permalink ) {

										  echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key ) . '&nbsp;' );

										} else {

										  echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $_product->get_name() ), $cart_item, $cart_item_key ) );

										}

										

										do_action( 'woocommerce_after_cart_item_name', $cart_item, $cart_item_key );

										

										// Meta data.

										echo wc_get_formatted_cart_item_data( $cart_item ); // PHPCS: XSS ok.

										

										// Backorder notification.

										

										?>

										<span>× &nbsp</span>

										<span class="pw-qunty cust_<?php echo $product_id; ?>" data-key="<?php echo $cart_item_key; ?>"data-title="<?php esc_attr_e( 'Quantity', 'woocommerce' ); ?>"><?php

											if ( $_product->is_sold_individually() ) {

											  //echo $cart_item['quantity'];

											} else {

												 $product_quantity=$cart_item['quantity'] ?>

											      <span><?php echo $product_quantity; ?></span>

										     <?php }

										?></span>

									</div>

									<div class="products-normal-price light-text fng_<?php echo $product_id; ?>"><?php

									//	echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key ); // PHPCS: XSS ok.
										echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key ); 
										?>,-</div>

								</div>

								<!-- Loop item 	END -->

								<?php } } 

									// ENd of foreachg - NON Booqable product loop ?>

								<!-- single date -->

								<div class="hr-line"></div>

							</div>

							<!-- Normal purchase -->

							<!-- booqable div  start -->

							<div class="b-rent-products">

								<div class="booqable-title mid-14">

									<span>Rental</span>

									<span class="tm-ornge hovr-tx tooltip tooltip--top" data-tooltip="Bij het kopen van de installatie service maken wij uw VR of AR bril startklaar door vooraf de bril te configureren en de gewenste applicatie en/of 360 content te installeren.">

										<svg id="Component_96_1" data-name="Component 96 – 1" xmlns="http://www.w3.org/2000/svg" width="16.884" height="16.011" viewBox="0 0 16.884 18.011">

											<ellipse id="Ellipse_2439" data-name="Ellipse 2439" cx="8.442" cy="8.442" rx="8.442" ry="8.442" transform="translate(0 1.127)" fill="#f59663"></ellipse>

											<text id="i" transform="translate(6.754 13)" fill="#fff" font-size="12" font-family="Poppins-Light, Poppins" font-weight="300">

												<tspan x="0" y="0">i</tspan>

											</text>

										</svg>

									</span>

								</div>

								<!-- END title -->

								<?php $product_count = 0;

								foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {			  

									$_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );

									$product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

									?>

								<?php global $wpdb;

									$booqable_product_ids  = get_post_meta($product_id,'booqable_product_id',true);

									

									if($booqable_product_ids){

									?>  

								<div class="wrap-pdate">

									<div class="flx-rental-list">

										<div class="rental-products-normal light-text">

											<?php

												if ( ! $product_permalink ) {

												  echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key ) . '&nbsp;' );

												} else {

												  echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $_product->get_name() ), $cart_item, $cart_item_key ) );

												}

												

												do_action( 'woocommerce_after_cart_item_name', $cart_item, $cart_item_key );

												

												// Meta data.

												echo wc_get_formatted_cart_item_data( $cart_item ); // PHPCS: XSS ok.

												

												// Backorder notification.

												

												?>

											<span>×</span>

											<span class="pw-qunty_cust "data-key="<?php echo $cart_item_key; ?>" data-title="<?php esc_attr_e( 'Quantity', 'woocommerce' ); ?>"> 

											<?php

												if ( $_product->is_sold_individually() ) {

												//   echo $cart_item['quantity'];

												} else {

													$product_quantity=$cart_item['quantity'] ?>

											      <span><?php echo $product_quantity; ?></span>

													<?php

												  }

												?>

												</span>

										</div>

										<div class="products-normal-price light-text fng_<?php echo $product_id; ?>">  <?php

											echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key ); // PHPCS: XSS ok.

											?>,-</div>

									</div>

									<!-- date START -->

									<?php global $wpdb;

										$booqable_product_ids  = get_post_meta($product_id,'booqable_product_id',true);

										

										if($booqable_product_ids){  ?>

									<div class="cl-add-1">

										<div class="show-cl">

											<p class="rantal-days">Start date</p>

											<div class="am-date">

												<i class="fas fa-calendar"></i><span class="regular-txt start-dt"><?php 

													if($cart_item['date_on_sale_from']){

													  echo $start_date = $cart_item['date_on_sale_from'][0];

													} ?></span>

											</div>

										</div>

										<div class="show-cl">

											<p class="rantal-days">End date</p>

											<div class="am-date">

												<i class="fas fa-calendar"></i>

												 <span class="regular-txt end-dt"><?php 

													if($cart_item['date_on_sale_to']){

													  echo $end_date = $cart_item['date_on_sale_to'][0];

													} 

													?>		  

												</span>

											</div>

										</div>

									</div>

								</div>

								<!-- single two date END --> 

								<?php } ?>

								<!-- Display 2 hidden input fields -->

								<?php $rental_dates = $cart_item['date_on_sale_from'][0].' - '.$cart_item['date_on_sale_to'][0]; ?>

								<input type="hidden" id="proID_<?php echo $product_id; ?>" name="hid_cart_pord_<?php echo $product_count; ?>" value="<?php echo $rental_dates; ?>">

								<!--input type="hidden" id="tfcarrello" name="tfcarrello" value="'.$totale_finito_carrello.'"-->

								<?php $product_count++; }}

									//End foreach of booqable loop

									  ?>

							</div>

							<!-- div END booqable wrap -->

							<div class="bill-amt-start">

								<div class="hr-line mt-0"></div>

								<div class="alltotal-Bill">

									<div class="bill-wrap-1 ">

										<div class="b-wrap-1 mid-14 "data-title="<?php esc_attr_e( 'Subtotal', 'woocommerce' ); ?>"><?php esc_attr_e( 'Subtotal', 'woocommerce' ); ?></div>

										<div class="b-wrap-2 regular-txt Sub_Total_data">

										€&nbsp<?php echo WC()->cart->get_subtotal(); ?>    

										</div>,-

									</div>

									<?php 
       								$site_url = site_url();
       								if ($site_url=="https://vr-expert-rental.nl"){
       
       								?>    
      								<div class="bill-wrap-1">
     

        								<div class="b-wrap-1 mid-14">BTW(21%)</div>

        								<div class="b-wrap-2 regular-txt">

        								<?php wc_cart_totals_taxes_total_html(); ?>,-    

        								</div>

      								</div>
        								<?php }?>

									<div class="hr-line"></div>

									<div class="bill-wrap-1">

										<div class="b-wrap-1 mid-14 "><?php esc_html_e( 'Total', 'woocommerce' ); ?></div>

										<div class="b-wrap-2 all-total"><?php wc_cart_totals_order_total_html(); ?><span class="price-comma">,-</span></div>

									</div>

								</div>

							</div>

							<!-- div bill amount end -->

						</div>

					</div>

				</div>

			</div>

			<!-- div 444 end -->

		</div>

		<!-- sec-two-1 end -->

    <?php do_action( 'woocommerce_checkout_before_order_review_heading' ); ?>

	<?php do_action( 'woocommerce_checkout_after_order_review' ); ?>

	</div>

   <!-- div end orderwrap -->



	<div class="col2-set chkFrmWrp cstmTabStg payment-div" id="Payment_details" style="display:none">

		<div class="p-payment" id="custom-payment">

			<div id="order_review" class="woocommerce-checkout-review-order">

				<?php do_action( 'woocommerce_checkout_order_review' ); ?>

			</div>

		</div>

	</div>

</form>





<script  type="text/javascript">

	jQuery(document).ready(function(){

	       jQuery("#next-step").click(function(){

		

				var checkName = jQuery('#billing_first_name').val();

				var checkEmail = jQuery('#billing_email').val();

				var checkComp = jQuery('#billing_company').val();

				var checkVat = jQuery('#custom_field_new').val();

		

				var checkAddress = jQuery('#billing_address_1').val();

		

				var checkCity = jQuery('#billing_city').val();

				var checkPostcode = jQuery('#billing_postcode').val();

				var checkCountry = jQuery('#billing_country option:selected').text();

				var checkInvoice = jQuery('#custom_field_invoice_refrence').val();

	          var checkshipAdd = jQuery('#shipping_address_1').val();

				var checkshipPhone = jQuery('#shipping_phone').val();

				var checkshipName = jQuery('#shipping_first_name').val();

	

				localStorage.setItem("checkName", checkName);

				localStorage.setItem("checkEmail", checkEmail);

				localStorage.setItem("checkComp", checkComp);

				localStorage.setItem("checkVat", checkVat);

				localStorage.setItem("checkAddress", checkAddress);

				localStorage.setItem("checkCity", checkCity);

				localStorage.setItem("checkPostcode", checkPostcode);

				localStorage.setItem("checkCountry", checkCountry);

				localStorage.setItem("checkInvoice", checkInvoice);

				localStorage.setItem("checkshipAdd", checkshipAdd);

				localStorage.setItem("checkshipPhone", checkshipPhone);

				localStorage.setItem("checkshipName", checkshipName);

	

	

				jQuery('#checkname').text(checkName);

				jQuery('#checkEmail').text(checkEmail);

				jQuery('#checkComp').text(checkComp);

				jQuery('#checkVat').text(checkVat);

				jQuery('#checkAddress').text(checkAddress);

				jQuery('#checkCity').text(checkCity);

				jQuery('#checkPostcode').text(checkPostcode);

				jQuery('#checkCountry').text(checkCountry);

				jQuery('#checkInvoice').text(checkInvoice);

				jQuery('#checkshipAdd').text(checkshipAdd);

				jQuery('#checkshipPhone').text(checkshipPhone);

				jQuery('#checkshipName').text(checkshipName);

	});

	

	});

</script>

<div class="chkBtnWrp">

	<a href="<?php echo home_url();?>/cart" class="chkPgBtn backShopBtn">Back to shopping cart</a>

	<a href="javascript:void(0);" class="chkPgBtn nextBtn" id="next-step" >Next</a>

</div>



<?php do_action( 'woocommerce_after_checkout_form', $checkout ); ?>