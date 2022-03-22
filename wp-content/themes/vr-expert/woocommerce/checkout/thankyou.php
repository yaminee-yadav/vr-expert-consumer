<?php

/**

 * Thankyou page

 *

 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/thankyou.php.

 *

 * HOWEVER, on occasion WooCommerce will need to update template files and you

 * (the theme developer) will need to copy the new files to your theme to

 * maintain compatibility. We try to do this as little as possible, but it does

 * happen. When this occurs the version of the template file will be bumped and

 * the readme will list any important changes.

 *

 * @see https://docs.woocommerce.com/document/template-structure/

 * @package WooCommerce\Templates

 * @version 3.7.0

 */



defined( 'ABSPATH' ) || exit;

?>

<style>

.woocommerce-order.ds_none{

	display:none;

}

.cstmWooWrp .entry-content {

     margin-top: 0px !important; 

}

</style>

<div class="woocommerce-order ds_none">



	<?php

	if ( $order ) :



		do_action( 'woocommerce_before_thankyou', $order->get_id() );

		?>



		<?php if ( $order->has_status( 'failed' ) ) : ?>



			<p class="woocommerce-notice woocommerce-notice--error woocommerce-thankyou-order-failed"><?php esc_html_e( 'Unfortunately your order cannot be processed as the originating bank/merchant has declined your transaction. Please attempt your purchase again.', 'woocommerce' ); ?></p>



			<p class="woocommerce-notice woocommerce-notice--error woocommerce-thankyou-order-failed-actions">

				<a href="<?php echo esc_url( $order->get_checkout_payment_url() ); ?>" class="button pay"><?php esc_html_e( 'Pay', 'woocommerce' ); ?></a>

				<?php if ( is_user_logged_in() ) : ?>

					<a href="<?php echo esc_url( wc_get_page_permalink( 'myaccount' ) ); ?>" class="button pay"><?php esc_html_e( 'My account', 'woocommerce' ); ?></a>

				<?php endif; ?>

			</p>



		<?php else : ?>



			<p class="woocommerce-notice woocommerce-notice--success woocommerce-thankyou-order-received"><?php echo apply_filters( 'woocommerce_thankyou_order_received_text', esc_html__( 'Thank you. Your order has been received.', 'woocommerce' ), $order ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>



			<ul class="woocommerce-order-overview woocommerce-thankyou-order-details order_details">



				<li class="woocommerce-order-overview__order order">

					<?php esc_html_e( 'Order number:', 'woocommerce' ); ?>

					<strong><?php echo $order->get_order_number(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></strong>

				</li>



				<li class="woocommerce-order-overview__date date">

					<?php esc_html_e( 'Date:', 'woocommerce' ); ?>

					<strong><?php echo wc_format_datetime( $order->get_date_created() ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></strong>

				</li>



				<?php if ( is_user_logged_in() && $order->get_user_id() === get_current_user_id() && $order->get_billing_email() ) : ?>

					<li class="woocommerce-order-overview__email email">

						<?php esc_html_e( 'Email:', 'woocommerce' ); ?>

						<strong><?php echo $order->get_billing_email(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></strong>

					</li>

				<?php endif; ?>



				<li class="woocommerce-order-overview__total total">

					<?php esc_html_e( 'Total:', 'woocommerce' ); ?>

					<strong><?php echo $order->get_formatted_order_total(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></strong>

				</li>



				<?php if ( $order->get_payment_method_title() ) : ?>

					<li class="woocommerce-order-overview__payment-method method">

						<?php esc_html_e( 'Payment method:', 'woocommerce' ); ?>

						<strong><?php echo wp_kses_post( $order->get_payment_method_title() ); ?></strong>

					</li>

				<?php endif; ?>



			</ul>



		<?php endif; ?>



		<?php do_action( 'woocommerce_thankyou_' . $order->get_payment_method(), $order->get_id() ); ?>

		<?php do_action( 'woocommerce_thankyou', $order->get_id() ); ?>



	<?php else : ?>



		<p class="woocommerce-notice woocommerce-notice--success woocommerce-thankyou-order-received"><?php echo apply_filters( 'woocommerce_thankyou_order_received_text', esc_html__( 'Thank you. Your order has been received.', 'woocommerce' ), null ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>



	<?php endif; ?>



</div>





<?php get_header();

	

	 ?>

	 

	 





<div class="pay-success">



	<div class="pay-success-ch1 position-relative">

	<div class="pay-success-ch12"></div>

	<div class="cn-y">

			<img  class="" src="<?php echo get_stylesheet_directory_uri(); ?>/img/df-sucess.png" alt="slx">

		</div>

	</div>





	<div class="pay-success-ch2">

		<div class="w-450 position-relative">

			<div class="spc text-center">

				<div class="cr-svg">

					<div class="circle-csk">

						<div class="checkmark-csk"></div>

					</div>

					<p class="cart-h2-head mb-0">Order successfully placed</p>

				</div>

				

				<div class="sm-txt text-center">

					<p>You’re order is <?php  echo $order->get_id(); ?></p>

					<p>if you have any questions about you’re order, you can mail us at  <a href="mailto:sales@vr-expert.nl">support@vr-expert.nl</a> or call us at 

						<a  href="tel:+31 30 711 6183">+31 30 711 6183</a>

					</p>

				</div>

				<p class="t-add">

					<a class="btn-mid regular-txt" href="javascript:void(0)">Order details</a>

				</p>

					<?php 

					   

						  $order_id = $order->get_id();

						  $order = new WC_Order( $order_id );

                          $items = $order->get_items(); 

						   $total = $order->get_total(); ?>

                        



                <div class="mylst-order" style="display:none">

					

					<div class="table-wrapper">
						<table class="fl-table">
						<thead>
							<tr>
								<th>Products Name</th>
								<th>Qty</th>
								<th>Rental Period</th>
								<th>Days</th>
								<th>Price</th>
							</tr>
							</thead>
							<tbody>
								<?php  foreach ( $items as $item ) {

								$product_name = $item['name'];

								$product_id = $item['product_id'];

								$product_quantity = $item['quantity'];

								$product = wc_get_product( $product_id );

								$product_price = $product->price;

								$product_price1 = $product_price*$product_quantity;

								$singlelink = get_permalink($product_id);


								?>   
							
							
							<tr>
								<td width="200px">
									<div class="products-ImDa">
								      <div class="pd-ImDa-Image">
									   <a href="<?php echo $singlelink; ?>">
										<?php  $featured_image1 = get_the_post_thumbnail_url( $product_id); if($featured_image1){ ?>
										
										<img  class="" src="<?php echo $featured_image1; ?>" alt="slx">
										
										<?php } else { ?>
											
											<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/woocommerce-placeholder.png">
											
											<?php } ?>
										</a>
										</div>

										<div class="pd-ImDa-pname">
										<a href="<?php echo $singlelink; ?>">
										<?php echo $product_name; ?>
										</a>
										</div>
                                        </div>
								
								</td>

								<td>
									<div class="orderlst-pqty">

										<?php echo $product_quantity; ?>

										</div>
								</td>

									<?php 
								   	 $booqable_product_id = get_post_meta($product_id, 'booqable_product_id', true);
						
									 if( $booqable_product_id){
									 if($item['startDate']){
										$start_date = $item['startDate'];
										}
										if($item['endDate']){
											$end_date = $item['endDate'];
										}
									?>
										<td>
										<span class="DrentS"><?php echo $start_date; ?></span> <br> - <br> <?php
												?><span class="DrentE"><?php echo $end_date; ?></span>

										</td>
									
											<?php
													$sDate = new DateTime($start_date);
													$eDate= new DateTime($end_date);
													$difference =$eDate->diff($sDate);
													$days =  $difference->format("%a")+1;
													$pricePerDay= get_field('product_price_per_day',$product_id); ?>

								        <td>  
													<?php 
													if( $pricePerDay) {
					 		
														foreach($pricePerDay as $pricePerDay1){
														
															$days_value = $pricePerDay1['days'];
															$price_value = $pricePerDay1['price'];
															
															if($days == $days_value){
																					
																$days_value = $pricePerDay1['days'];
																$price_value = $pricePerDay1['price'];
															
															 ?>
															 <?php  if($days_value==1){ ?>
															 <span class="rentDay"><?php echo $days; ?> day</span> 
															 <?php }else{ ?>
															<span class="rentDay"><?php echo $days; ?> days</span> 
															<?php } ?>
												<?php  } } }
												?>
									</td>
									<?php }else { ?><td colspan="2"></td><?php } ?>
									<td> <?php 
											$booqable_product_id = get_post_meta($product_id, 'booqable_product_id', true);
											if( $booqable_product_id){
											if($item['startDate']){
												$start_date = $item['startDate'];
												}
												if($item['endDate']){
													$end_date = $item['endDate'];
												}
												$sDate = new DateTime($start_date);
												$eDate= new DateTime($end_date);
												$difference =$eDate->diff($sDate);
												$days =  $difference->format("%a")+1;
												$pricePerDay= get_field('product_price_per_day',$product_id);

												if( $pricePerDay) {
						 
													foreach($pricePerDay as $pricePerDay1){
													
														$days_value = $pricePerDay1['days'];
														$price_value = $pricePerDay1['price'];
														
														if($days == $days_value){
																				
															$days_value = $pricePerDay1['days'];
															$price_value = $pricePerDay1['price'];

															?>
															<span class="renttotalPrice">€<?php echo $price_value * $product_quantity;  ?></span>,-

													<?php
														}
													}
												}
												else { ?>
																€<?php echo $product_price1; ?></span>,-
													<?php	} }else{?>
														€<?php echo $product_price1; ?></span>,-
												<?php	}
														?>
								         </td>
										 
										</tr>

										<?php } ?>
							
							<tbody>
							<tfoot>
							<tr>
							<td colspan="3"><div class="or-Total">Total</div></td>
							<td  colspan="2"><div class="or-pTotal">€ <?php echo  $total; ?>,-</div></td>
							</tr>
						</tfoot>
							
						</table>
					</div>








                

				  </div>

			</div>

		

			<div class="suc-tab">

				<div class="vr-extra">

					<div class="medium-txt ch-wr-1">

						<p>Rent here the products that is now a hit</p>
						<?php $items = $order->get_items(); 
						   foreach ( $items as $item ) {
							$product_name = $item['name'];
							$product_id = $item['product_id'];
							$singlelink = get_permalink($product_id);
					    ?>

						<p><a class=" regular-txt" href="<?php echo $singlelink; ?>"><?php echo $product_name; ?> ></a></p>
						<?php } ?>

					</div>

					<div class="e-img ch-wr-2">

						<img  class="" src="<?php echo get_stylesheet_directory_uri(); ?>/img/Pico-header-home-slide.png" alt="slx">

					</div>

				</div>

			</div>

			

		</div>

	</div>

</div>

<?php get_footer();?>