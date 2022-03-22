<?php
	/**
	 * Simple product add to cart
	 *
	 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/add-to-cart/simple.php.
	 *
	 * HOWEVER, on occasion WooCommerce will need to update template files and you
	 * (the theme developer) will need to copy the new files to your theme to
	 * maintain compatibility. We try to do this as little as possible, but it does
	 * happen. When this occurs the version of the template file will be bumped and
	 * the readme will list any important changes.
	 *
	 * @see https://docs.woocommerce.com/document/template-structure/
	 * @package WooCommerce\Templates
	 * @version 3.4.0
	 */
	
	defined( 'ABSPATH' ) || exit;
	
	global $product;
	
	if ( ! $product->is_purchasable() ) {
		return;
	}
	
	echo wc_get_stock_html( $product ); // WPCS: XSS ok.
	
	if ( $product->is_in_stock() ) : ?>
<?php do_action( 'woocommerce_before_add_to_cart_form' ); ?>
<form class="cart" action="<?php echo esc_url( apply_filters( 'woocommerce_add_to_cart_form_action', $product->get_permalink() ) ); ?>" method="post" enctype='multipart/form-data'>
	<?php do_action( 'woocommerce_before_add_to_cart_button' ); ?>
	<?php
		do_action( 'woocommerce_before_add_to_cart_quantity' );
		
		woocommerce_quantity_input(
			array(
				'min_value'   => apply_filters( 'woocommerce_quantity_input_min', $product->get_min_purchase_quantity(), $product ),
				'max_value'   => apply_filters( 'woocommerce_quantity_input_max', $product->get_max_purchase_quantity(), $product ),
				'input_value' => isset( $_POST['quantity'] ) ? wc_stock_amount( wp_unslash( $_POST['quantity'] ) ) : $product->get_min_purchase_quantity(), // WPCS: CSRF ok, input var ok.
			)
		);
		
		do_action( 'woocommerce_after_add_to_cart_quantity' );
		?>
	<!-- rental date start -->
	<style>
		.price-inst{
		display:flex;
		margin:19px 0 0 0;
		align-items: center;
		}
		.small-modal{
		cursor:pointer;
		}
		.price-ins-1{
		margin-right:20px;
		}
		.mid-25 {
		font-family: 'Poppins-Medium';
		font-size: 25px;
		line-height: 38px;
		}
		.small-modal svg {
		width:16px;
		height:16px;
		}
		.flex-R-date
		{
		display:flex;
		max-width: 255px;
		width: 100%;
		background: #FFF;
		box-shadow: 0px 3px 6px #00000029;
		align-items: center;
		}
		.flex-R-date-1 input {
		width: 100%;
		border: 0;
		padding: 6px 0 6px 36px;
		}
		.flex-R-date-3 input {
		width: 100%;
		border: 0;
		}
		.flex-R-date-2{
		width: 38px;
		border: 0;
		}
		.flex-R-date-1 span
		{
		position: absolute;
		left: 10px;
		top: 6px;
		pointer-events: none;
		}
		.flex-R-date-1 span i
		{
		color: #818CC4;
		width: 20px;
		font-size: 20px;
		pointer-events: none;
		}
		/* single sv */
		.myevnt-form .flex-R-date {
		max-width:100%;
		margin-bottom:10px;
		}
		.myevnt-form .Date-data .flex-R-date input {
		padding: 6px 0 6px 43px;
		box-shadow: unset;
		margin-bottom: 0px;
		}
		.myevnt-form .Date-data .flex-R-date-1 input {
		padding: 6px 0 6px 40px;
		}
		.myevnt-form .Date-data .flex-R-date-3 input{
		padding: 6px 0 6px 20px;
		}
		.myevnt-form .flex-R-date-2 {
		width: 38px;
		border: 0;
		display: flex;
		align-items: center;
		justify-content: center;
		}
		.f-26,
		.vr-p-data .product_title{
		font-family: 'Poppins-Medium';
		font-size: 26px;
		color: #21365D;
		line-height: 39px;
		}
		/* end new cl scss */
		/* The Modal (background) normal */
		.modal {
		display: none; /* Hidden by default */
		position: fixed; /* Stay in place */
		z-index: 1; /* Sit on top */
		padding-top: 100px; /* Location of the box */
		left: 0;
		top: 0;
		width: 100%; /* Full width */
		height: 100%; /* Full height */
		overflow: auto; /* Enable scroll if needed */
		background-color: rgb(0,0,0); /* Fallback color */
		background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
		z-index: 9;
		}
		/* Modal Content */
		.modal-content {
		position: relative;
		background-color: #fefefe;
		margin: auto;
		padding: 0;
		border: 1px solid #888;
		width: 80%;
		box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
		-webkit-animation-name: animatetop;
		-webkit-animation-duration: 0.4s;
		animation-name: animatetop;
		animation-duration: 0.4s
		}
		/* Add Animation */
		@-webkit-keyframes animatetop {
		from {top:-300px; opacity:0} 
		to {top:0; opacity:1}
		}
		@keyframes animatetop {
		from {top:-300px; opacity:0}
		to {top:0; opacity:1}
		}
		/* The Close Button */
		.close {
		color: white;
		float: right;
		}
		.modal-header {
		padding: 2px 16px;
		background-color: #5cb85c;
		color: white;
		}
		/* small model */
		.modal.small-mdl .modal-content {
		max-width:366px;
		width:100%;
		}
		.modal.small-mdl .modal-header {
		background: #EDEDFF;
		padding: 14px 27px 14px 30px;
		color:#000;
		}
		.modal.small-mdl .close svg {
		width: 12px;
		height: 11px;
		cursor: pointer; 
		}
		.div-283
		{
		max-width:282px;
		margin: 0 auto;
		padding:18px 0 18px 0px;
		}
		
		/* end small model */
		/* midium model*/
		.modal-header {
		background: #EDEDFF;
		padding:20px 32px 20px 16px;
		}
		.f-m-20{
		font-family: 'Poppins-Medium';
		font-size: 20px;
		line-height: 30px;
		color: #0A0A09;
		}
		.modal-footer {
		padding: 2px 16px;
		background-color: #5cb85c;
		color: white;
		}
		.Top-p-conent
		{
		padding:21px  32px 22px 41px;
		display:flex;
		justify-content: space-between;
		}
		.Top-p-img{
		max-width:114px;
		width:100%;
		}
		.Top-p-img img{
		width:114px;
		height:114px;
		object-fit:cover;
		}
		.Top-p-cf
		{
		max-width:457px;
		width:100%;
		}
		.Top-p-cf h2{
		margin-bottom:6px;
		}
		/* qty */
		.q-123  .p-quantity input[type=number]::-webkit-inner-spin-button,
		.q-123 .p-quantity input[type=number]::-webkit-outer-spin-button {
		-webkit-appearance: none;
		margin: 0;
		}
		.q-123
		{
		max-width:117px;
		display:flex;
		border: 1px solid #E8E7E7;
		margin-bottom:15px;
		}
		.q-123 .p-quantity input {
		border-radius: 0;
		max-width: 50px;
		width: 100%;
		border: 0;
		text-align: center;
		color: #000;
		height: 31px;
		border-left: 1px solid #E8E7E7;
		border-right: 1px solid #E8E7E7;
		}
		.q-123  button {
		width: 32px;
		height: 31px;
		background: transparent;
		border-radius: 0;
		border: 0;
		cursor: pointer;
		font-size: 16px;
		font-weight: 600;
		}
		/* qty end */
		.vr-abl-dv
		{
		display: flex;
		justify-content: space-between;
		}
		.vr-abl-ch1
		{
		max-width:254px;
		width:100%;
		}
		.vr-abl-ch2
		{
		max-width:154px;
		width:100%;
		}
		.vr-abl-ch1 .sel-1 label
		{
		font-size:14px;
		color:#000;
		}
		.ch-vr-info
		{
		margin-top:15px;
		display:flex;
		}
		/* custom checkbox */
		.form-group-checkbox input {
		padding: 0;
		height: initial;
		width: initial;
		margin-bottom: 0;
		display: none;
		cursor: pointer;
		}
		.form-group-checkbox label {
		position: relative;
		cursor: pointer;
		}
		.form-group-checkbox label:before {
		content:'';
		-webkit-appearance: none;
		background-color: transparent;
		border: 1px solid #E4E4E4;
		/* box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05), inset 0px -15px 10px -12px rgba(0, 0, 0, 0.05);*/
		padding: 9px;
		display: inline-block;
		position: relative;
		vertical-align: middle;
		cursor: pointer;
		}
		.form-group-checkbox input:checked + label:after {
		content: '';
		display: block;
		position: absolute;
		top: 4px;
		left: 6px;
		width: 8px;
		height: 14px;
		border: solid #fff;
		border-width: 0 2px 2px 0;
		transform: rotate(45deg);
		}
		.form-group-checkbox input:checked + label:before {
		background-color:#33B7BD;
		}
		/* w-241 */
		.w-241{
		max-width:241px;
		width:100%;
		}
		.p-name.dp-w
		{
		}
		.p-name.dp-w {
		max-width: unset;
		margin-left: 13px;
		margin-right: unset;
		}
		.p-name.dp-w span
		{
		width: 16px;
		height: 16px;
		}
		.p-name.dp-w span svg
		{
		width: 16px;
		height: 16px;
		position:relative;
		top:-2px;
		}
		/* tool tips */
		.tooltip {
		position: relative;
		/* text-decoration: underline dotted;
		cursor: help;
		*/
		}
		.tooltip::before,
		.tooltip::after {
		position: absolute;
		opacity: 0;
		visibility: hidden;
		transition: opacity 0.3s ease-in-out;
		}
		.tooltip:hover::before,
		.tooltip:hover::after {
		opacity: 1;
		visibility: visible;
		}
		.tooltip::before {
		content: attr(data-tooltip);
		z-index: 2;
		width: 316px;
		background: #EDEDFF;
		padding: 10px;
		font-family: 'Poppins-Regular';
		font-size: 14px;
		line-height: 21px;
		}
		.tooltip::after {
		content: "";
		width: 0;
		height: 0;
		}
		.tooltip--top::before,
		.tooltip--top::after {
		bottom: 100%;
		left: 50%;
		/* transform: translate(-50%);*/
		transform: translate(-24%);
		margin-bottom: 23px;
		}
		.tooltip--top::after {
		margin-bottom: -1px;
		border-left: 23px solid transparent;
		border-right: 23px solid transparent;
		border-top: 23px solid #EDEDFF;
		margin-left: -12px;
		}
		/* tool tips */
		.issue-p
		{
		font-family: 'Poppins-Regular';
		font-size: 12px;
		line-height: 18px;
		font-weight: 300;
		margin-left:13px;
		color: #818CC4;
		}
		/* ch-vr-info info end */
		.max-335
		{
		max-width:335px;
		width:100%;
		background:#F7F7F7;
		/*   position:absolute;*/
		padding: 17px 39px 39px 33px;
		}
		.max-335 .sel-1 .issue-p{
		font-size:12px;
		margin-left: unset;
		color:#21365D;
		}
		.tp-f1825
		{
		font-family: 'Poppins-Regular';
		font-size:18px;
		line-height:25px;
		margin-bottom:18px;
		}
		.vr-abl-ch2 p.tp-price
		{
		text-align:center;
		margin-bottom:21px;
		}
		.btn-mid {
		width: 100%;
		display: flex;
		align-items: center;
		justify-content: center;
		height: 35px;
		background: var(--orange);
		border: 0;
		color: #fff;
		border-radius: 25px;
		}
		.t-add .btn-mid:hover
		{
		background: linear-gradient(90deg, rgba(51,183,189,1) 0%, rgba(35,129,134,1) 35%, rgba(34,124,129,1) 100%);
		}
		/* class bp */
		.B-p-conent
		{
		background: #F7F7F7;
		padding:18px  29px 41px 36px;
		}
		.as-wrap
		{
		margin-top:10px;
		}
		/* asoc*/
		.flex-as{
		display:flex;
		background:#fff;
		}
		.flex-as-ch1{
		max-width:89px;
		width:100%;
		display:flex;
		align-items:center;
		justify-content: center;
		box-shadow: 0px 3px 6px #00000029;
		}
		.as-slider .owl-carousel  .flex-as-ch1 img{
		width:79px;
		width:79px;
		}
		.flex-as-ch2{
		max-width:178px;
		width:100%;
		padding: 5px 0 5px 18px;
		box-shadow: 0px 3px 6px #00000029;
		}
		.flex-as-ch2 .triangle-bottomright
		{
		width: 51px;
		height: 49px;
		border-bottom: 49px solid var(--orange);
		border-left: 51px solid transparent;
		}
		.flex-as-ch2 .x-shop {
		left: -24px;
		top: 23px;
		}
		.flex-as-ch2 .triangle-bottomright:hover .x-shop.hover-x {
		left: -23px;
		top: 19px;
		}
		.flex-as-ch2 .triangle-bottomright:hover
		{
		border-bottom: 49px solid #32B9BF;
		}
		.txx-mid
		{
		margin-bottom:15px;
		min-height:42px;
		}
		/* midium modal */
	</style>
	<div class="rent-date">
	<h3 class="regular-txt mb-0">Rental Date</h3>
	<!--
		<td><input type="date" name="start_date" id="start_date"></td>
		<td>-</td>
		<td><input type="date" name="end_date" id="end_date"></td>
		-->
	<div class="flex-R-date regulat-txt">
		<div class="flex-R-date-1 position-relative">
			<span>
			<i class="fas fa-calendar"></i>
			</span>
			<input type="input" class="light-txt" id="start_date1" name="range">
		</div>
		<div class="flex-R-date-2">-</div>
		<div class="flex-R-date-3">
			<input type="input" class="light-txt" id="end_date1" name="range">
		</div>
	</div>
	<!-- rental date end -->
	<!-- prcie start -->
	<div class="price-inst">
		<div class="price-ins-1 mid-25"><?php echo $product->get_price_html();?></div>
		<div class="price-ins-1 light-text">
			<p>
				price per day 
				<span class="small-modal">
					<svg id="Component_96_1" data-name="Component 96 – 1" xmlns="http://www.w3.org/2000/svg" width="16.884" height="18.011" viewBox="0 0 16.884 18.011">
						<ellipse id="Ellipse_2439" data-name="Ellipse 2439" cx="8.442" cy="8.442" rx="8.442" ry="8.442" transform="translate(0 1.127)" fill="#818cc4"></ellipse>
						<text id="i" transform="translate(6.754 13)" fill="#fff" font-size="12" font-family="Poppins-Light, Poppins" font-weight="300">
							<tspan x="0" y="0">i</tspan>
						</text>
					</svg>
				</span>
			</p>
		</div>
	</div>
	<!-- prcie start end -->
	<input type="hidden" id="product_id" value="<?php echo esc_attr( $product->get_id() ); ?>">
	<?php global $wpdb;
		$booqable_product_ids = $wpdb->get_results("SELECT * FROM wp_9_postmeta WHERE post_id ='". $product->get_id() ."' && meta_key='booqable_product_id'"); 
		if($booqable_product_ids){ ?>
	<button type="button" class="single_add_to_cart_button booqable-btn" value="<?php echo esc_attr($product->get_id() ); ?>" onclick="open_popup();" >Add to cart</button>
	<?php  }else{ ?>
	<button type="submit" name="add-to-cart" value="<?php echo esc_attr( $product->get_id() ); ?>" class="single_add_to_cart_button button alt"><?php echo esc_html( $product->single_add_to_cart_text() ); ?></button>
	<?php } ?>
	<?php do_action( 'woocommerce_after_add_to_cart_button' ); ?>
</form>
<div class="thumbs-style">
	<p>
		<a class="light-txt" href="#">Rental condition</a>
	</p>
</div>
<?php do_action( 'woocommerce_after_add_to_cart_form' ); ?>
<?php endif; ?>
<!-- The Modal -->
<div id="myModal" class="modal">
	<!-- Modal content -->
	<div class="modal-content">
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
		<div class="modal-body">
			<div class="Top-p-conent">
				<div class="Top-p-img">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/Pico-header-home-slide.png" alt="product-search">
				</div>
				<div class="Top-p-cf">
					<h2 class="medium-txt">Pico G2 4K</h2>
					<div class="pop-qty">
						<p class="p-lb mid-14">Aantal stuks</p>
						<div class="q-123">
							<div class="p-qty-min"><button type="button" id="sub" class="minus">-</button></div>
							<div class="p-quantity">
								<input type="number" id="" class="input-text qty text"  min="0" max="" name="">
							</div>
							<div class="p-add-max"><button type="button" id="add" class="plus">+</button></div>
						</div>
					</div>
					<!-- pqty end -->
					<div class="vr-abl-dv position-relative">
						<div class="vr-abl-ch1">
							<form class="myevnt-form" action="#">
							<!--
								<div class="sel-1 Date-data position-relative">
									<label class="regular-txt" for="Choose-content">Date</label>
									<input type="input" class="light-txt hasDatepicker" id="range-date" name="range">
									<span class="set-clnd"><i class="fas fa-calendar"></i></span>
								</div>
								-->
								<div class="flex-R-date regulat-txt">
		<div class="flex-R-date-1 position-relative">
			<span>
			<i class="fas fa-calendar"></i>
			</span>
			<input type="input" class="light-txt"  name="start_date" id="start_date"  name="range">
		</div>
		<div class="flex-R-date-2">-</div>
		<div class="flex-R-date-3">
			<input type="input" class="light-txt" name="end_date" id="end_date" name="range">
			<input type="hidden"  name="product_id" value="<?php echo esc_attr( $product->get_id() ); ?>" id="product_id">
		</div>
	</div>
							<div class="ch-vr-info">
									<div class="chek-m">
										<div class="form-group-checkbox">
											<input type="checkbox" id="css">
											<label for="css"></label>
										</div>
									</div>
									<!-- check m div end -->
									<div class="w-241">
										<div class="p-name dp-w">
											<a class="sr-link regular-txt" href="#">
											Installation Service 
											</a>
											<span class="hovr-tx tooltip tooltip--top"  data-tooltip="Bij het kopen van de installatie service maken wij uw VR of AR bril startklaar door vooraf de bril te configureren en de gewenste applicatie en/of 360 content te installeren.">
												<svg id="Component_96_1" data-name="Component 96 – 1" xmlns="http://www.w3.org/2000/svg" width="16.884" height="18.011" viewBox="0 0 16.884 18.011">
													<ellipse id="Ellipse_2439" data-name="Ellipse 2439" cx="8.442" cy="8.442" rx="8.442" ry="8.442" transform="translate(0 1.127)" fill="#818cc4"></ellipse>
													<text id="i" transform="translate(6.754 13)" fill="#fff" font-size="12" font-family="Poppins-Light, Poppins" font-weight="300">
														<tspan x="0" y="0">i</tspan>
													</text>
												</svg>
											</span>
										</div>
										<p class="issue-p">18,- per device</p>
									</div>
								</div>
								<!-- ch-vr-info info end -->
								<div class="max-335">
									<div class="sel-1 position-relative">
										<label class="issue-p" for="Choose-content">Number of staff</label>
										<select class="light-txt" multiple="multiple" id="Choose-content">
											<option value="">Choose content</option>
											<option value="" data-badge="">Own content (+€0,00)</option>
											<option value="" data-badge="">Dash Dash world (+€5,00)</option>
											<option value="" data-badge="">Dead and buried (+€5,00)</option>
											<option value="" data-badge="">Death Horizon (+€5,00)</option>
										</select>
									</div>
									<div class="flex-end position-relative">
										<div class="cart-install-btn">
											<a href="#"><span class="is-price">€500,-</span> <span class="is-cart"><i class="fas fa-shopping-cart"></i></span> </a>
										</div>
									</div>
								</div>
							</form>
						</div>
						<div class="vr-abl-ch2">
							<p class="tp-f1825 text-center">Total price</p>
							<p class="tp-price text-center">€299,-</p>
							<p class="t-add">
							<!--
								<a class="btn-mid regular-txt" href="">Add to card</a>
								-->
								 <button type="button" class="btn-mid regular-txt" onclick ="check_availability();">Apply</button>
							</p>
						</div>
					</div>
				</div>
			</div>
			<!-- start bp content -->
			<div class="B-p-conent">
				<h3 class="medium-txt mb-0">Accessories</h3>
				<div class="as-wrap">
					<div class="as-slider position-relative">
						<div id="accessories-pop" class="owl-carousel owl-theme">
						<?php 	
			
			     global $woocommerce, $product;
				 $product = new WC_Product( $product->get_id());
				
				//  print_r( $product);
			     $upsells = $product->get_upsells();
				   $cross_sell_ids = $product->get_cross_sell_ids(); 
				foreach($cross_sell_ids as $cross_sell_id){
			
				
			
			
			?>
							<div class="item">
								<div class="flex-as">
									<div class="flex-as-ch1">
									<?php 	echo get_the_post_thumbnail($cross_sell_id); ?>
										<!--<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/products-service-01.png" alt="product-search">-->
									</div>
									<div class="flex-as-ch2 position-relative">
										<p class="mid-14 txx-mid"><?php echo get_the_title($cross_sell_id); ?></p>
										<p class="mid-14"><?php echo $product->get_price_html($cross_sell_id); ?>/</p>
										<div class="triangle-bottomright">
											<a class="x-shop hv-hide" href="#">
												<svg xmlns="http://www.w3.org/2000/svg" width="14.345" height="11.44" viewBox="0 0 14.345 11.44">
													<g id="Group_1573" data-name="Group 1573" transform="translate(0 0)">
														<rect id="Rectangle_273" data-name="Rectangle 273" width="9.385" height="1.235" rx="0.617" transform="translate(4.219 8.231)" fill="#fff"></rect>
														<circle id="Ellipse_64" data-name="Ellipse 64" cx="1.235" cy="1.235" r="1.235" transform="translate(3.478 8.971)" fill="#fff"></circle>
														<circle id="Ellipse_65" data-name="Ellipse 65" cx="1.235" cy="1.235" r="1.235" transform="translate(11.628 8.971)" fill="#fff"></circle>
														<rect id="Rectangle_274" data-name="Rectangle 274" width="9.385" height="1.235" rx="0.617" transform="translate(4.178 0) rotate(82)" fill="#fff"></rect>
														<rect id="Rectangle_275" data-name="Rectangle 275" width="4.198" height="1.235" rx="0.617" transform="translate(0 0.073) rotate(-1)" fill="#fff"></rect>
														<path id="Path_78" data-name="Path 78" d="M14462-12222.029h10.127l-1.475,6.027h-8.115Z" transform="translate(-14457.781 12223.338)" fill="#fff"></path>
													</g>
												</svg>
											</a>
											<div class="x-shop hover-x">
												<a class="" href="#">
													<svg xmlns="http://www.w3.org/2000/svg" width="15" height="29" viewBox="0 0 15 29">
														<text id="_" data-name="+" transform="translate(0 22)" fill="#fff" font-size="21" font-family="Poppins-Medium, Poppins" font-weight="500">
															<tspan x="0" y="0">+</tspan>
														</text>
													</svg>
												</a>
											</div>
										</div>
									</div>
								</div>
							</div>
							<?php	
				 
				
				}
				?>
							<!-- items end -->
				
					
						</div>
					</div>
					<!-- slider-last -->
				</div>
			</div>
			<!-- end bp content -->
		</div>
		
	</div>
</div>
<!-- model small -->
<div id="days-listing" class="modal small-mdl">
	<!-- Modal content -->
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
			<h2 class="mb-0 regular-txt">Price per day</h2>
		</div>
		<div class="modal-body">
			<div class="div-283">
				<ul class="day-rent">
					<li class="one-rent">
						<div class="flex-days">
							<div class="flex-days-1 regular-txt">
								1 day
							</div>
							<div class="flex-days-2 regular-txt">
								Rental price €40,-
							</div>
						</div>
					</li>
					<li class="one-rent">
						<div class="flex-days">
							<div class="flex-days-1 regular-txt">
								1 day
							</div>
							<div class="flex-days-2 regular-txt">
								Rental price €45,-
							</div>
						</div>
					</li>
					<li class="one-rent">
						<div class="flex-days">
							<div class="flex-days-1 regular-txt">
								1 day
							</div>
							<div class="flex-days-2 regular-txt">
								Rental price €50,-
							</div>
						</div>
					</li>
					<li class="one-rent">
						<div class="flex-days">
							<div class="flex-days-1 regular-txt">
								1 day
							</div>
							<div class="flex-days-2 regular-txt">
								Rental price €55,-
							</div>
						</div>
					</li>
					<li class="one-rent">
						<div class="flex-days">
							<div class="flex-days-1 regular-txt">
								1 day
							</div>
							<div class="flex-days-2 regular-txt">
								Rental price €60,-
							</div>
						</div>
					</li>
					<li class="one-rent">
						<div class="flex-days">
							<div class="flex-days-1 regular-txt">
								1 day
							</div>
							<div class="flex-days-2 regular-txt">
								Rental price €65,-
							</div>
						</div>
					</li>
					<li class="one-rent">
						<div class="flex-days">
							<div class="flex-days-1 regular-txt">
								1 day
							</div>
							<div class="flex-days-2 regular-txt">
								Rental price €70,-
							</div>
						</div>
					</li>
					<li class="one-rent">
						<div class="flex-days">
							<div class="flex-days-1 regular-txt">
								1 day
							</div>
							<div class="flex-days-2 regular-txt">
								Rental price €75,-
							</div>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>