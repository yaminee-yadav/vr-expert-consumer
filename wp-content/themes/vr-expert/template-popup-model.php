
<?php  if($args['is_cart_var']=='yes'){ ?>
<div class="modal-body <?php echo $args['cart_key'];?>">
  <div class="Top-p-conent">
    <div class="Top-p-img">
      <?php 
        global $product,$woocommerce;
        $product = wc_get_product($args['id']);
        echo woocommerce_get_product_thumbnail( $args['cart_key']);
        $items = $woocommerce->cart->get_cart();
        $booqable_id = 0;
        foreach($items as $item => $values) { 
	     	$product_id = $values['product_id'];
        $product_data = $values['data'];
         $product_id_key = $values['product_id'];
         $quantity = $values['quantity'];
		 
 if ($item == $args['cart_key'])
        {
           
			  if($values['date_on_sale_from']){
            $start_date = $values['date_on_sale_from'][0];
            } 
          if($values['date_on_sale_to']){
			  
            $end_date = $values['date_on_sale_to'][0];
            } 
			 $quantity = $values['quantity'];
        
      }
      $booqable_id = get_post_meta($product_id,'booqable_product_id',true);
      if($booqable_id){
        $i++;
      }

    }
	
        
       
		?>
    </div>
    <div class="Top-p-cf"> 
      
      <h2 class="medium-txt"><?php
      
          echo get_the_title($product_id );

		  ?></h2>
    
	<?php 
  
  
  ?>
      <div class="pop-qty">
        <p class="p-lb mid-14">Devices </p>
        <div class="q-123">
          <div class="p-qty-min"><button type="button" id="sub" class="minus1">-</button></div>
          <div class="p-quantity">
            <input type="number" id="" class="input-text qty text" min="0" max="" name="" value="<?php echo $quantity; ?>" readonly>
          </div>
          <div class="p-add-max"><button type="button" id="add" class="plus1">+</button></div>
        </div>
      </div>
      <!-- pqty end -->
      <div class="vr-abl-dv position-relative">
        <div class="vr-abl-ch1">
          <p class="p-lb mid-14">Rental date</p>

          <form class="myevnt-form" action="#">
            
            <div class="flex-R-date regulat-txt">
              <div class="flex-R-date-1 position-relative">
                <span>
                <i>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M96 32C96 14.33 110.3 0 128 0C145.7 0 160 14.33 160 32V64H288V32C288 14.33 302.3 0 320 0C337.7 0 352 14.33 352 32V64H400C426.5 64 448 85.49 448 112V160H0V112C0 85.49 21.49 64 48 64H96V32zM448 464C448 490.5 426.5 512 400 512H48C21.49 512 0 490.5 0 464V192H448V464z"/></svg>
                </i>
                </span>
                <input type="input" class="light-txt ps-date" id="start_date" placeholder="start-date" name="start_date"  value="<?php echo $start_date; ?>" <?php if($i == 1){  }else{if($start_date!=''){echo"disabled"; }} ?>>
              </div>
              <div class="flex-R-date-2">-</div>
              <div class="flex-R-date-3">
                <input type="input" class="light-txt pe-date"  id="end_date" placeholder="end-date" name="end_date" value="<?php  echo $end_date; ?>" <?php if($i == 1){ }else{if($end_date!==''){echo "disabled";} }?>>
			
                <input type="hidden"  name="product_id" value="<?php echo esc_attr( $product_id); ?>" id="product_id">
                
              </div>
            </div>
            <p class="mid-14" id="error_message"></p>
             <div class="ch-vr-info">
              <div class="chek-m">
                <div class="form-group-checkbox">
                  <input type="checkbox" id="css_installation" value="<?php  if(get_field('assign_installation_service',$args['id'])){
											   the_field('assign_installation_service', $args['id']); }else if( get_field('installation_service_product_assign','option')){ 
					     the_field('installation_service_product_assign','option'); }?>">
                  <label for="css_installation"></label>
                </div>
              </div>
              <!-- check m div end -->
              <div class="w-241">
                <div class="p-name dp-w">
              <a class="sr-link regular-txt " href="javascript:void(0)" onclick="add_to_cart(<?php echo $product_id ?>);">
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
            <!-- ch-vr-info info eeeeend -->
            <div class="max-335 ds-are regular-txt">
              <textarea  rows="5" cols="30" name="installation_service" id="installation_service" placeholder="Installation Service"></textarea> <br />
            </div>
          </form>

        </div>
		
			
		
        <div class="vr-abl-ch2">
          <p class="tp-f1825 text-center">Total price</p>
          <p class="tp-price text-center">
          <?php  
      if( have_rows('product_price_per_day',$args['id']) ):
        
        while( have_rows('product_price_per_day',$args['id']) ) : the_row();
            
            $days_value = get_sub_field('days');
            $price_value = get_sub_field('price');
           if($days_value == 1){
           $days_value = get_sub_field('days');
           $price_value = get_sub_field('price');
      ?>
       <p class="tp-price text-center">
            <?php echo  get_woocommerce_currency_symbol(get_woocommerce_currency()).''.$price_value ;
            if($price_value>0){ ?>,-</span><?php } 
          }
          endwhile;
      else :
        echo $product->get_price_html( $args['id']);
      
      endif;
        ?>
         </p>
          <p class="t-add">
            <button type="button" class="btn-mid regular-txt" onclick ="check_availability(<?php echo $args['id'];?>,'<?php echo $args['cart_key']; ?>');">Add To Cart</button>
          </p>
		  <p style="color:green;" id="success_msg"></p>
        </div>
      </div>
    </div>
		<?php ?>
  </div>
</div>
<?php }else{ ?>
<div class="modal-body">
  <div class="Top-p-conent">
    <div class="Top-p-img">
      <?php 
      
        global $product,$woocommerce;
        $product = wc_get_product($args['id']);
      
        $items = $woocommerce->cart->get_cart();

        foreach($items as $item => $values) { 
         
       
             
			  if($values['date_on_sale_from']){
          $start_date = $values['date_on_sale_from'][0];
         
          } 
        if($values['date_on_sale_to']){
      
          $end_date = $values['date_on_sale_to'][0];
        }
        }
        
       
        if(woocommerce_get_product_thumbnail( $args['id'])){
        echo woocommerce_get_product_thumbnail( $args['id']); }
        else{ ?>
          <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/woocommerce-placeholder.png">
       <?php } ?>
    </div>
    <div class="Top-p-cf"> 
      <h2 class="medium-txt"><?php
          echo get_the_title($args['id']); ?></h2>
      <div class="pop-qty">
        <p class="p-lb mid-14">Devices</p>
        <div class="q-123">
          <div class="p-qty-min"><button type="button" id="sub" class="minus1">-</button></div>
          <div class="p-quantity">
            <input type="number" id="" class="input-text qty text"   min="0" max="" name="" readonly>
          </div>
          <div class="p-add-max"><button type="button" id="add" class="plus1">+</button></div>
        </div>
      </div>
      <!-- pqty end -->
      <div class="vr-abl-dv position-relative">
        <div class="vr-abl-ch1">
          <p class="p-lb mid-14">Rental date</p>

          <form class="myevnt-form" action="#">
            <div class="flex-R-date regulat-txt">
              <div class="flex-R-date-1 position-relative">
                <span>
                <i>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M96 32C96 14.33 110.3 0 128 0C145.7 0 160 14.33 160 32V64H288V32C288 14.33 302.3 0 320 0C337.7 0 352 14.33 352 32V64H400C426.5 64 448 85.49 448 112V160H0V112C0 85.49 21.49 64 48 64H96V32zM448 464C448 490.5 426.5 512 400 512H48C21.49 512 0 490.5 0 464V192H448V464z"/></svg>
                </i>
                </span>
                <input type="input" class="light-txt ps-date" id="start_date"  placeholder="start-date" name="start_date" value="<?php echo  $start_date; ?>" <?php if($start_date!=''){echo"disabled";} ?> >
              </div>
              <div class="flex-R-date-2">-</div>
              <div class="flex-R-date-3">
                <input type="input" class="light-txt pe-date"  id="end_date" placeholder="end-date" name="end_date"value="<?php echo  $end_date; ?>" <?php if($end_date!=''){echo"disabled";} ?> >
				<p id="error_enddate" style="color:red;"></p>
                <input type="hidden"  name="product_id" value="<?php echo esc_attr( $args['id']); ?>" id="product_id">
              
              </div>
             
            </div>
            <p id="error_message" style="color:red;"></p>
			
            <div class="ch-vr-info">
              <div class="chek-m">
                <div class="form-group-checkbox">
                  <input type="checkbox" id="css_popup" value="<?php  if(get_field('assign_installation_service', $args['id'])){ the_field('assign_installation_service',$args['id']); }else { ?> 
					   <?php  the_field('installation_service_product_assign','option'); }?>">
                  <label for="css_popup"></label>
                </div>
              </div>
              <!-- check m div end -->
              <div class="w-241">
                <div class="p-name dp-w">
                  <a class="sr-link regular-txt" href="<?php echo get_site_url(); ?>/services">
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
            <div class="max-335 ds-are regular-txt">
              <textarea  rows="5" cols="30" name="installation_service" id="installation_service" placeholder="Installation Service"></textarea> <br />
            </div>
			
			

			
          </form>

        </div>
        <div class="vr-abl-ch2">
          <p class="tp-f1825 text-center">Total price</p>
          <p class="tp-price text-center">
          <?php  
      if( have_rows('product_price_per_day',$args['id']) ):
        while( have_rows('product_price_per_day',$args['id']) ) : the_row();
            $days_value = get_sub_field('days');
            $price_value = get_sub_field('price');
           if($days_value == 1){
           $days_value = get_sub_field('days');
           $price_value = get_sub_field('price');
      ?>
       <p class="tp-price text-center">
      <?php echo  get_woocommerce_currency_symbol(get_woocommerce_currency()).''.$price_value ;
      if($price_value>0){ ?>,-</span><?php } 
    }
    endwhile;
else :
  echo $product->get_price_html( $args['id']);
endif;
  ?>
      </p>
					<div class="btn-popup-css">
						<button type="button" class="a-cart thnks-p" onclick ="check_availability(<?php echo $args['id'];?>);"><span class="s1">Add to cart</span><span class="s2">Add to cart</span></button>
					</div>
		  <p style="color:green;" id="success_msg"></p>
        </div>
      </div>
    </div>
  </div>
</div>
<?php } ?>
<!-- start bp content -->
<div class="B-p-conent">
  <?php 
        global $woocommerce, $product;
        $product_data = new WC_Product($args['id']);
        
        $cross_sell_ids = $product_data->get_cross_sell_ids(); 
         if($cross_sell_ids){ ?>
  <h3 class="medium-txt mb-0">Accessories</h3>
  <div class="as-wrap">
    <div class="as-slider position-relative">
      <div id="accessories-pop" class="owl-carousel owl-theme">
        <?php 	
          foreach( $cross_sell_ids as $cross_sell_id){
            $productCrossell = wc_get_product($cross_sell_id);
           $producttitle=get_the_title($cross_sell_id);
           $product1 = new WC_Product($cross_sell_id);
           $shortdescription= $product1->get_short_description();
           $crossAccessories= get_the_post_thumbnail($cross_sell_id);
          ?>
        <div class="item">
          <div class="flex-as">
            <div class="flex-as-ch1">
              <?php if($crossAccessories){	echo $crossAccessories; } else {
                ?><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/woocommerce-placeholder.png"><?php
              } ?> 
            </div>
            <div class="flex-as-ch2 position-relative">
              <p class="mid-14 txx-mid"><a lass="mid-14" href="#"> <?php echo mb_strimwidth(get_the_title($cross_sell_id), 0, 20, '.....'); ?> </a></p>
              <p class="mid-14"><?php  echo $productCrossell->get_price_html($cross_sell_id); ?>/</p>
                 <?php  $booqable_id= get_post_meta($cross_sell_id, 'booqable_product_id', true);
                        if($booqable_id){
                        ?>
                     <div class="triangle-bottomright access_data" id="Pids<?php echo $cross_sell_id;?>" data-id="<?php echo $cross_sell_id;?>">
                       <div class="cartData" data-id="<?php echo $cross_sell_id; ?>">
                           <a class="x-shop hv-hide"  href="javascript:void(0)" value="<?php echo $cross_sell_id;?>"  >
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
                           <div class="x-shop hover-x " >
                              <p id="availability_message"></p>
                              <a class=""  href="javascript:void(0)" >
                                 <svg xmlns="http://www.w3.org/2000/svg" width="15" height="29" viewBox="0 0 15 29">
                                    <text id="_" data-name="+" transform="translate(0 22)" fill="#fff" font-size="21" font-family="Poppins-Medium, Poppins" font-weight="500">
                                       <tspan x="0" y="0">+</tspan>
                                    </text>
                                 </svg>
                              </a>
                           </div>
                        </div>
                        <div class="x-shop if-slct-product">
                           <svg xmlns="http://www.w3.org/2000/svg" width="25.105" height="27.12" viewBox="0 0 25.105 27.12">
                              <path id="Path_575" data-name="Path 575" d="M46.209,55.887l9.2,7.188L68.338,39.942" transform="translate(-44.978 -38.966)" fill="none" stroke="#fff" stroke-width="4"></path>
                           </svg>
                        </div>
                     </div>
                     <?php }else{ ?>
                     <div class="triangle-bottomright cst_simple_added ">
                        <a class="x-shop hv-hide accessories_simple "  href="javascript:void(0)" value="<?php echo $cross_sell_id;?>" id="Pids<?php echo $cross_sell_id;?>">
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
                           <a class="accessories_simple"  href="javascript:void(0)" id="Pids<?php echo $cross_sell_id;?>" value="<?php echo $cross_sell_id;?>">
                              <svg xmlns="http://www.w3.org/2000/svg" width="15" height="29" viewBox="0 0 15 29">
                                 <text id="_" data-name="+" transform="translate(0 22)" fill="#fff" font-size="21" font-family="Poppins-Medium, Poppins" font-weight="500">
                                    <tspan x="0" y="0">+</tspan>
                                 </text>
                              </svg>
                           </a>
                        </div>
                        <div class="x-shop if-slct-product">
                           <svg xmlns="http://www.w3.org/2000/svg" width="25.105" height="27.12" viewBox="0 0 25.105 27.12">
                              <path id="Path_575" data-name="Path 575" d="M46.209,55.887l9.2,7.188L68.338,39.942" transform="translate(-44.978 -38.966)" fill="none" stroke="#fff" stroke-width="4"></path>
                           </svg>
                        </div>
                     </div>
                     <?php } ?>
            </div>
          </div>
        </div>
     <?php } ?>
  </div>
  <?php } ?>