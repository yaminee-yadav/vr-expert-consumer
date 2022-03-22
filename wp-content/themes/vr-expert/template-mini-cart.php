                              <?php if ( ! WC()->cart->is_empty() ){?>
                              <div class="wid-377">
                                 <h2 class ="header_title">Your Choice</h2>
                                 <?php  foreach( WC()->cart->get_cart() as  $cart_item_key => $cart_item ){
                                    $product_id = $cart_item['product_id'];

                                    $product = wc_get_product($product_id);
                                    $_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
                                    $removeurl= wc_get_cart_remove_url($product_id);
                                    $product_name = $product->name;
                                    $product_price = $product->get_price();
                                    $product_quantity  = $cart_item['quantity'];
                                    $subtotal = WC()->cart->get_cart_subtotal();
                                    $booqable_product_id = get_post_meta($product_id,'booqable_product_id',true); 
                                    $var= 0;
                                    $var = $var+1;
                                    if($booqable_product_id){ 	
                                    ?>
                                 <div class="mini-cart-home position-relative">
                                    <div class="mini-top">
                                       <input type="hidden" id="mini_remove_item" name="mini_remove_item" value="<?php echo $product_id; ?>">
                                       <a class="right-close" href="javascript:void(0)" onclick="removefunc('<?php echo $cart_item_key; ?>')">
                                       <svg xmlns="http://www.w3.org/2000/svg" width="15.358" height="15.361" viewBox="0 0 15.358 15.361">
                                       <g id="Group_630" data-name="Group 630" transform="translate(0.707 0.711)">
                                          <line id="Line_32" data-name="Line 32" y1="13.943" x2="13.943" fill="none" stroke="#707070" stroke-width="2"/>
                                          <line id="Line_33" data-name="Line 33" x2="13.943" y2="13.79" fill="none" stroke="#707070" stroke-width="2"/>
                                       </g>
                                       </svg>
                                       </a>
                                       
                                       <div class="mini-top-1">
                                       <a href="<?php echo get_permalink($product_id); ?>">
                                           <?php $Original_image_url = get_the_post_thumbnail_url($product_id);
                                             if($Original_image_url){ ?>
                                             <img src="<?php echo $Original_image_url; ?>"  alt="slx"> 
                                             <?php } else{ ?>
                                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/woocommerce-placeholder.png">
                                              <?php } ?>
                                             </a> 
                                       </div>
                                       <div class="mini-top-2">
                                       <a href="<?php echo get_permalink($product_id); ?>">
                                          <p class="mini-p-title mid-14"><?php echo $product_name; ?></p></a>
                                          <div class="mini-p-Date">
                                             <p class="regular-txt">Rental date</p>
                                             <p class="mini-Date light-txt">
                                                <span class="mini-start"><?php
                                                    if($cart_item['date_on_sale_from']){
                                                   echo $start_date = $cart_item['date_on_sale_from'][0];
                                                   } ?>
                                                </span>-
                                                <span class="mini-end"><?php 
                                                  if($cart_item['date_on_sale_to']){
                                                   echo $end_date = $cart_item['date_on_sale_to'][0];
                                                   }  ?></span>
                                             </p>
                                          </div>
                                          <p class="if-install light-txt">* Instalation service</p>
                                          <div class="w-106 light-txt-g">
                                             <p> <?php if($cart_item['installation_service']){
                                                echo $cart_item['installation_service'][0];
                                                } ?></p>
                                            
                                          </div>
                                       </div>
                                    </div>
                                 
                                    <div class="mini-hr"></div>
                                    <div class="mini-bottom" >
									         <input type="hidden" id="get_product_id_in_mini_cart" value=" <?php echo $product_id; ?>" name="get_product_id_in_mini_cart">
									 
                                       <div class="mini-bottom-qty" data-id="<?php echo $product_id; ?>" data-key="<?php echo $cart_item_key; ?>">
                                          <div class="p-qty-min  p-minus-minCart"><button type="button" id="sub" class="minus11">-</button></div>
                                          <div class="p-quantity">
                                             <input type="number" id="" class="input-text qty text" min="0" max="" name="currentVal" value="<?php echo  $product_quantity; ?>"  readonly>
                                          </div>
										 
                                          <div class="p-add-max p-add-minCart"><button type="button" id="add"  class="plus11">+</button></div>
										            <input type="hidden" id="currentVal_q" value=" <?php echo $product_quantity; ?>" name="currentVal_q">
                                       </div>
                                       <div class="mini-bottom-day f-15">
                                          <?php 	if($cart_item['date_on_sale_from']){
                                             $start_date = $cart_item['date_on_sale_from'][0];
                                             }  
                                             if($cart_item['date_on_sale_to']){
                                             $end_date = $cart_item['date_on_sale_to'][0];
                                             } 
                                             $sDate = new DateTime($start_date);
                                             $eDate= new DateTime($end_date);
                                             $difference =$eDate->diff($sDate);
                                                   $days =  $difference->format("%a");
                                                   if($days==1){ 
                                                      echo $days; ?> day
                                                     <?php }else{ 
                                                     echo $days; ?> days
                                                    <?php } ?>
                                       </div>
                                       <div class="mini-bottom-price f-15 text-center">
                                          <span class="priceProduct priceProduct<?php echo $product_id; ?>" id="cust_id_<?php echo $var; ?>"><?php  echo apply_filters( 'woocommerce_cart_item_price ', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key ); // PHPCS: XSS ok.
                              ?></span>,-
                                       </div>
                                    </div>
  
                                 </div>
                                 <?php   
								  $var++; }else{
                                    ?>
                               
                                 <div class="mini-cart-home position-relative">
                               <?php 
                                     
                                    ?>
                                     
                                    <div class="mini-top">
                                       <input type="hidden" id="mini_remove_item" name="mini_remove_item" value="<?php echo $product_id;?>">
                                       <a class="right-close" href="javascript:void(0)" onclick="removefunc('<?php echo $cart_item_key;?>')"><svg xmlns="http://www.w3.org/2000/svg" width="15.358" height="15.361" viewBox="0 0 15.358 15.361">
                                          <g id="Group_630" data-name="Group 630" transform="translate(0.707 0.711)">
                                             <line id="Line_32" data-name="Line 32" y1="13.943" x2="13.943" fill="none" stroke="#707070" stroke-width="2"/>
                                             <line id="Line_33" data-name="Line 33" x2="13.943" y2="13.79" fill="none" stroke="#707070" stroke-width="2"/>
                                          </g>
                                          </svg>
                                          </a>

                                       <div class="mini-top-1"> 
                                       <a href="<?php echo get_permalink($product_id); ?>">
                                          <?php $Original_image_url = get_the_post_thumbnail_url($product_id);
                                             if($Original_image_url){ ?>
                                             <img src="<?php echo $Original_image_url; ?>"  alt="slx"> 
                                             <?php } else{ ?>
                                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/woocommerce-placeholder.png">
                                              <?php } ?>
                                             </a>
                                       </div>
                                       
                                       <div class="mini-top-2">
                                       <a href="<?php echo get_permalink($product_id); ?>">
                                          <p class="mini-p-title mid-14"><?php echo $product_name; ?></p></a>
                                          <div class="mini-hr"></div>
                                          <div class="mini-bottom">
                                             <div class="mini-bottom-qty" data-id="<?php echo $product_id; ?>" data-key="<?php echo $cart_item_key; ?>">
                                                <div class="p-qty-min  p-minus-minCart"><button type="button" id="sub" class="minus11">-</button></div>
                                                <div class="p-quantity">
                                                   <input type="number" id="" class="input-text qty text" min="0" max="" name="" value="<?php echo $product_quantity; ?>"  readonly>
                                                </div>
                                                <div class="p-add-max p-add-minCart"><button type="button" id="add" class="plus11">+</button></div>
                                             </div>
                                             <div class="mini-bottom-price f-15 text-center">
                                               €<span class="priceProduct priceProduct<?php echo $product_id; ?>" id="cust_id_<?php echo $var; ?>" ><?php echo $product_price * $product_quantity;  ?></span>,-
                                             </div>
                                          </div>
                                         
                                       </div>
                                    </div>
                                  
                                 </div>
                                 <?php 
                                  }
                                    } ?>
                              
                            
                                 <div class="mini-hr mh"></div>
                                 <div class="min-total">
                                    <div class="min-total-txt medium-txt">Subtotal</div>
                                    <div class="min-total-price f-16"><span class="cartTotal"><?php echo $subtotal;?></span>,-</div>
                                 </div>
                                 <div class="btn-popup-css">
                                    <a class="a-cart" href="<?php  echo WC()->cart->get_cart_url(); ?>">Go To Order</a>
                                 </div>
                               
                              </div>
							      <?php }else{ ?>
								  <div>
                          <p class="woocommerce-mini-cart__empty-message"><?php esc_html_e( 'No products in the cart.', 'woocommerce' ); ?></p>
								  </div>
							  <?php } ?>
                          