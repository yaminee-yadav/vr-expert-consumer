<?php

  /**

   * Cart totals

   *

   * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart-totals.php.

   *

   * HOWEVER, on occasion WooCommerce will need to update template files and you

   * (the theme developer) will need to copy the new files to your theme to

   * maintain compatibility. We try to do this as little as possible, but it does

   * happen. When this occurs the version of the template file will be bumped and

   * the readme will list any important changes.

   *

   * @see     https://docs.woocommerce.com/document/template-structure/

   * @package WooCommerce\Templates

   * @version 2.3.6

   */

  

  defined( 'ABSPATH' ) || exit;

  

  ?>



<div class="cus-cart">

 

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

        

       

        echo wc_get_formatted_cart_item_data( $cart_item ); // PHPCS: XSS ok.

        

        

        

        ?>

        <span>×&nbsp</span>

        <span class="pw-qunty cust_<?php echo $product_id; ?>" data-key="<?php echo $cart_item_key; ?>"data-title="<?php esc_attr_e( 'Quantity', 'woocommerce' ); ?>"><?php

          if ( $_product->is_sold_individually() ) {

            echo $cart_item['quantity'];

          } else {

            $product_quantity = woocommerce_quantity_input(

              array(

                'input_name'   => "cart[{$cart_item_key}][qty]",

                'input_value'  => $cart_item['quantity'],

                'max_value'    => $_product->get_max_purchase_quantity(),

                'min_value'    => '0',

                'product_name' => $_product->get_name(),

              ),

              $_product,

              false

            );

          }

                        

          echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item ); // PHPCS: XSS ok.

          ?></span>

      </div>

      <div class="products-normal-price light-text fng_<?php echo $product_id; ?>"><?php

        echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key ); // PHPCS: XSS ok.

        ?>,-</div>

    </div>



    

    <?php } } 

    ?>

 

    <div class="hr-line"></div>

  </div>




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

    <?php foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {			  

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

        <span>×&nbsp</span>

        <span class="pw-qunty_cust "data-key="<?php echo $cart_item_key; ?>" data-title="<?php esc_attr_e( 'Quantity', 'woocommerce' ); ?>"> <?php

          if ( $_product->is_sold_individually() ) {

          	echo $cart_item['quantity'];

          } else {

          	$product_quantity = woocommerce_quantity_input(

          		array(

          			'input_name'   => "cart[{$cart_item_key}][qty]",

          			'input_value'  => $cart_item['quantity'],

          			'max_value'    => $_product->get_max_purchase_quantity(),

          			'min_value'    => '0',

          			'product_name' => $_product->get_name(),

          		),

          		$_product,

          		false

          	);

          }

                        

          echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item ); // PHPCS: XSS ok.

          ?></span>

      </div>

      <div class="products-normal-price light-text fng_<?php echo $product_id; ?>"><?php

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

          <i class="fas fa-calendar"></i><span class="regular-txt end-dt"><?php 

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

    <?php }}

      //End foreach of booqable loop

       ?>

  </div>


  <div class="bill-amt-start">

    <div class="hr-line mt-0"></div>

    <div class="alltotal-Bill">

      <div class="bill-wrap-1 ">

        <div class="b-wrap-1 mid-14 "data-title="<?php esc_attr_e( 'Subtotal', 'woocommerce' ); ?>"><?php esc_attr_e( 'Subtotal', 'woocommerce' ); ?></div>

        <div class="b-wrap-2 regular-txt Sub_Total_data">

          <?php echo WC()->cart->get_cart_subtotal(); ?>,-  

        </div>

      </div>
      <?php 
       $site_url = site_url();
       if ($site_url=="https://vr-expert-rental.nl"){
        
       ?>    
      <div class="bill-wrap-1">
     

        <div class="b-wrap-1 mid-14">BTW(21%)</div>

        <div class="b-wrap-2 regular-txt">

        <?php wc_cart_totals_taxes_total_html(); ?>      

        </div>
              ,-
      </div>
        <?php }?>
      <div class="hr-line"></div>

      <div class="bill-wrap-1">

        <div class="b-wrap-1 mid-14 "><?php esc_html_e( 'Total', 'woocommerce' ); ?></div>

        <div class="b-wrap-2 all-total"><?php wc_cart_totals_order_total_html(); ?><span class="price-comma">,-</span></div>

      </div>

    </div>

    <div class="wc-proceed-to-checkout">

      <div class="bill-btn">

        <div class="bill-child">

          <a class="req-btn mid-14" href="javascript:void(0);">Request a quotation</a>

        </div>

        <div class="bill-child-1">

          <?php do_action( 'woocommerce_proceed_to_checkout' ); ?>

        </div>

      </div>

    </div>

  </div>



</div>





<!-- Request a Quotation button popup -->

<?php

//User detail code

 $cart_item_key= WC()->cart->get_cart(); 

 $current_user = wp_get_current_user();

  $current_user_id = $current_user->ID;

  $cur_useremail=$current_user->user_email;

  $cur_username=$current_user->user_login;



//Product Detail Code

$html  = 'Name - Qty  - Price \n';



 foreach($cart_item_key as $cart_item){

   $cart_item_key = WC()->cart->get_cart();

   $product_id= $cart_item['product_id'];

   $product = wc_get_product( $product_id );

   $product_name =  $product->name;

   $product_quantity = $cart_item['quantity'];

   $product_price = ($product->price);

   $product_price1 = $product_price*$product_quantity;

   $html .= $product->name.' × '.$product_quantity. ' - €'.$product_price1.',- \n';

   } ?>

<script>

  jQuery(".req-btn").one('click', function(){

   jQuery('#input_1_35').val("<?php echo $cur_username; ?>");

   jQuery('#input_1_39').val("<?php echo $cur_useremail; ?>");

   jQuery('#input_1_40').val("<?php echo $html; ?>" );

});

</script>


