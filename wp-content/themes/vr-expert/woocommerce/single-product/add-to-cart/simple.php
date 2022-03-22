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
<p class="qn-title regular-txt">Devices</p>
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
  <?php global $wpdb;
    $booqable_product_ids  = get_post_meta($product->get_id(),'booqable_product_id',true);
    
    if($booqable_product_ids){  ?>
  <p class="p-lb mid-14">Rental Date</p>
  <div class="flex-R-date regulat-txt">
    <div class="flex-R-date-1 position-relative">
      <span>
      <i>
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M96 32C96 14.33 110.3 0 128 0C145.7 0 160 14.33 160 32V64H288V32C288 14.33 302.3 0 320 0C337.7 0 352 14.33 352 32V64H400C426.5 64 448 85.49 448 112V160H0V112C0 85.49 21.49 64 48 64H96V32zM448 464C448 490.5 426.5 512 400 512H48C21.49 512 0 490.5 0 464V192H448V464z"/></svg>
      </i>
      </span>
      <?php
     global $product,$woocommerce;
    $items = $woocommerce->cart->get_cart();

foreach($items as $item => $values) {  
if($values['date_on_sale_from']){
  $start_date = $values['date_on_sale_from'][0];
 
  } 
if($values['date_on_sale_to']){

  $end_date = $values['date_on_sale_to'][0];
}
}

?>
      <input type="input" class="light-txt class-start" name="start_date_new" id="start_date_new" placeholder="start-date" value="<?php echo $start_date; ?>" <?php if($start_date != ''){echo"disabled";}?> >
    </div>
    <div class="flex-R-date-2">-</div>
    <div class="flex-R-date-3">
      <input type="input" class="light-txt class-end" name="end_date_new" id="end_date_new" placeholder="end-date" value="<?php echo $end_date; ?>" <?php if($end_date != ''){echo"disabled";
      
    } ?>>
      <input type="hidden" id="url" name="url" value="<?php echo admin_url('admin-ajax.php'); ?>">
      <input type="hidden"  name="product_id_new" value="<?php echo esc_attr( $product->get_id() ); ?>" id="product_id_new">
    </div>
  </div>
  <?php } ?>
  <div id="wait">
    <div class="loader_child">
      <div id="loading-bar-spinner" class="spinner">
        <div class="spinner-icon"></div>
      </div>
    </div>
  </div>
  <p id="response_message"></p>
  <!-- prcie start -->
  <div class="price-inst">
  <?php global $wpdb;
    $booqable_product_ids  = get_post_meta($product->get_id(),'booqable_product_id',true);

    if($booqable_product_ids){  
      $priceTable1 = get_field('product_price_per_day',$product->get_id());
     
      if( $priceTable1 ){

        // Loop through rows.
        foreach( $priceTable1 as $priceData){
    
            // Load sub field value.
            $days_value1 = $priceData['days'];
            $price_value1 = $priceData['price'];
            // Do something...
          
           if($days_value1 == 1){
 
            $price_value1 = $priceData['price'];            
    
      ?>
     <div class="price-ins-1 mid-25"><?php echo  get_woocommerce_currency_symbol(get_woocommerce_currency()).''.$price_value1 ;
    }
    // End loop.
   }
  }else{
    echo $product->get_price_html();
  }  if($price_value1>0){ ?>,-</span><?php } 
    ?></div>
    <?php }else{?>   <div class="price-ins-1 mid-25"><?php echo $product->get_price_html();?></div>    <?php } ?>
    <div class="price-ins-1 light-text">
      <p>
       <?php global $wpdb;
    $booqable_product_ids  = get_post_meta($product->get_id(),'booqable_product_id',true);
    
    if($booqable_product_ids){  ?>price per day
        <span class="small-modal">
          <svg id="Component_96_1" data-name="Component 96 – 1" xmlns="http://www.w3.org/2000/svg" width="16.884" height="18.011" viewBox="0 0 16.884 18.011">
            <ellipse id="Ellipse_2439" data-name="Ellipse 2439" cx="8.442" cy="8.442" rx="8.442" ry="8.442" transform="translate(0 1.127)" fill="#818cc4"></ellipse>
            <text id="i" transform="translate(6.754 13)" fill="#fff" font-size="12" font-family="Poppins-Light, Poppins" font-weight="300">
              <tspan x="0" y="0">i</tspan>
            </text>
          </svg>
        </span>
        <?php } ?>
      </p>
    </div>
  </div>
  <!-- prcie start end -->
  <input type="hidden" id="product_id" name="single_product_id" value="<?php echo esc_attr( $product->get_id() ); ?>">
  <?php global $wpdb;
    $booqable_product_ids  = get_post_meta($product->get_id(),'booqable_product_id',true);
    
    if($booqable_product_ids){  ?>
  <button type="button" class="single_add_to_cart_button booqable-btn abh" value="<?php echo esc_attr($product->get_id() ); ?>" onclick="open_popup(<?php echo esc_attr($product->get_id() ); ?>);" >Add to cart</button>
  <?php   }else{ ?>
  <button type="submit" name="add-to-cart" value="<?php echo esc_attr( $product->get_id() ); ?>" class="single_add_to_cart_button button alt"><?php echo esc_html( $product->single_add_to_cart_text() ); ?></button>
  <?php } ?>
  <?php do_action( 'woocommerce_after_add_to_cart_button' ); ?>
</form>
<div class="thumbs-style">
  <p>
    <a class="light-txt" href="<?php echo get_site_url()."/rental-condition"; ?>">Rental condition</a>
  </p>
</div>
<?php do_action( 'woocommerce_after_add_to_cart_form' ); ?>
<?php endif; ?>
<!-- model small -->
<div id="days-listing" class="modal hide small-mdl" tabindex="-1">
  <!-- Modal content -->
  <div class="modal-overlay4"></div>
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
        <?php global $wpdb;
                  $booqable_product_ids = get_post_meta($product->get_id(),'booqable_product_id',true);  
                  if($booqable_product_ids){  
                    $priceTable2 = get_field('product_price_per_day',$product->get_id());
                    if($priceTable2){
                      foreach( $priceTable2 as $priceData2){
                      // Loop through rows.  
                      $days_value2 = $priceData2['days'];
                      $price_value2 = $priceData2['price'];
                      ?>
                    <li class="one-rent">
                      <div class="flex-days">
                        <div class="flex-days-1 regular-txt">
                          
                        <?php  if($days_value2==1){ echo $days_value2;  ?> day
                          <?php }else{
                             echo $days_value2; ?> days
                         <?php  } ?>

                        </div>
                        <div class="flex-days-2 regular-txt">
                          Rental price <?php echo get_woocommerce_currency_symbol(get_woocommerce_currency()).''.$price_value2 ; ?>,-
                        </div>
                      </div>
                    </li>
                   <?php   
                   // End loop.
                  }
                  // No value.
                    }else {
                   
                      // Do something...
                    }
                } ?>
        </ul>
        
      </div>
    </div>
  </div>
</div>
<!-- END SMALL MODEL -->
