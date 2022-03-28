<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <?php wp_head(); 
      ?>
  </head>
  <body  <?php body_class('overflowclass');?>>
  <!--
    <div class="loaderWindow">
      <div class="spinner-G" id="circleG">
        <div class="bounce1"></div>
        <div class="bounce2"></div>
        <div class="bounce3"></div>
      </div>
    </div>
-->
    <div class="MainWeb-Content">
    <div class="max-container">
    <header class="mb-hide">
      <div class="prime-background">
        <div class="dsk-header-top">
          <?php if(get_field('logo','option')){ ?>
          <div class="Brand-logo">
            <a href="<?php echo get_site_url(); ?>" style="display:block;">
            <img src="<?php the_field('logo','option'); ?>" class="" alt="Rental logo.png" >
            </a>
          </div>
          <?php } ?>
          <!-- product search -->
          <div class="product-search">
            <form autocomplete="off" role="search" method="get" class="header-product-search" action="<?php echo esc_url( home_url( '/'  ) ); ?>">
              <div class="S-input-bar">
                <input required class="search-input header-search"    type="text" placeholder="<?php echo esc_attr_x( 'Search for products here ...', 'placeholder', 'woocommerce' ); ?>" value="<?php echo get_search_query(); ?>" name="s" id="searchInput" onkeyup="fetchResults()" title="<?php echo esc_attr_x( 'Search for products here ...', 'label', 'woocommerce' ); ?>"/>
                <button class="s-btn">
                  <svg xmlns="http://www.w3.org/2000/svg" width="15.121" height="15.018" viewBox="0 0 15.121 15.018">
                    <g id="Group_417" data-name="Group 417" transform="translate(-1477 -57)">
                      <g id="Ellipse_4" data-name="Ellipse 4" transform="translate(1477 57)" fill="#f39562" stroke="#f39562" stroke-width="3">
                        <ellipse cx="4.953" cy="4.798" rx="4.953" ry="4.798" stroke="none"/>
                        <ellipse cx="4.953" cy="4.798" rx="3.453" ry="3.298" fill="none"/>
                      </g>
                      <line id="Line_1" data-name="Line 1" x2="5.572" y2="5.262" transform="translate(1484.429 64.636)" fill="none" stroke="#f39562" stroke-linecap="round" stroke-width="3"/>
                      <circle id="Ellipse_5" data-name="Ellipse 5" cx="4.218" cy="4.218" r="4.218" transform="translate(1477.736 57.58)" fill="#fff"/>
                    </g>
                  </svg>
                </button>
              </div>
              <input   type="hidden" name="post_type" value="product" id="searchInput" />
              <div class="e-search">
                <ul class="U-search" id="datafetch">
                </ul>
              </div>
            </form>
          </div>
          <div class="eco-logo">
            <div class="eco-flex">
              <div class="eco-ch-1">
                <a href="tel:+31 30 711 6183">
                  <?php if(get_field('search_icon','option')){ ?>
                  <div class="call-hover">
                    <?php the_field('search_icon','option'); ?>
                  </div>
                  <?php } ?>
                  <div class="around-call">
                    <span class="call-to">+31 30 711 6183</span> 
                    <?php if(get_field('contact_us_icon','option')){ ?>
                    <span class="clk-action">
                    <?php the_field('contact_us_icon','option'); ?>
                    </span>
                    <?php } ?>
                  </div>
                </a>
              </div>
              <div class="eco-ch-2 ur-chek">
                <div class="cart-head">
                  <a href="<?php echo get_site_url(); ?>/my-account">
                    <svg xmlns="http://www.w3.org/2000/svg" width="512" height="512" viewBox="0 0 512 512">
                      <path d="M256 256c52.805 0 96-43.201 96-96s-43.195-96-96-96-96 43.201-96 96 43.195 96 96 96zm0 48c-63.598 0-192 32.402-192 96v48h384v-48c0-63.598-128.402-96-192-96z"/>
                    </svg>
                  </a>
                </div>
              </div>
              <div class="eco-ch-2">
                <div class="cart-head">
                  <?php if(get_field('add_to_card_icon','option')){ ?>
                  <a href="<?php echo home_url();?>/cart">   
                  <?php the_field('add_to_card_icon','option'); 
                    ?>
                  </a>
                  <?php
                    }
                    $cart_count=count(WC()->cart->get_cart());
                                   if ( $cart_count > 0 ) {
                                    ?>
                  <span class="count-products"><?php echo $cart_count; ?></span>
                  <?php            
                    }
                     ?> 
                  <?php if (!is_cart()) { ?>
                  <div class="itemscontainer Header-choise miniCartData">
                    <?php if ( ! WC()->cart->is_empty() ){?>
                    <div class="wid-377">
                      <h2 class ="header_title">Your Choice</h2>
                      <?php  foreach( WC()->cart->get_cart() as $cart_item_key => $cart_item ){
                        $product_id = $cart_item['product_id'];
                        $_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
                        $product = wc_get_product($product_id);
                        $removeurl=wc_get_cart_remove_url($product_id);
                        $product_name = $product->name;
                        
                        $product_price =  $cart_item['line_total'];
                        $product_quantity  = $cart_item['quantity'];
                        $subtotal = WC()->cart->get_cart_subtotal();
                        $booqable_product_id = get_post_meta($product_id,'booqable_product_id',true); 
                        
                        if($booqable_product_id){ 	
                           $var= 0;
                           $var = $var+1;
                        ?>
                      <div class="mini-cart-home position-relative">
                        <div class="mini-top">
                          <input type="hidden"  id="mini_remove_item" name="mini_remove_item" value="<?php echo $product_id?>">
                          <a class="right-close" href="javascript:void(0)" onclick="removefunc('<?php echo $cart_item_key;?>')">
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
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/woocommerce-placeholder.png"  alt="slx"> 
                            <?php } ?>
                            </a>
                          </div>
                          <div class="mini-top-2">
                            <a href="<?php echo get_permalink($product_id); ?>">
                              <p class="mini-p-title mid-14"><?php echo $product_name; ?></p>
                            </a>
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
                            <?php if($cart_item['installation_service'][0] ){ ?>
                            <p class="if-install light-txt">* Instalation service</p>
                            <div class="w-106 light-txt-g">
                              <p>
                                <?php 
                                  echo $cart_item['installation_service'][0];
                                  ?>
                              </p>
                            </div>
                            <?php  } ?>
                          </div>
                        </div>
                        <div class="mini-hr"></div>
                        <div class="mini-bottom" >
                          <input type="hidden" id="get_product_id_in_mini_cart" value=" <?php echo $product_id; ?>" name="get_product_id_in_mini_cart">
                          <div class="mini-bottom-qty" data-id="<?php echo $product_id; ?>" data-key="<?php echo $cart_item_key; ?>">
                            <div class="p-qty-min p-minus-minCart"><button type="button" id="sub" class="minus11">-</button></div>
                            <div class="p-quantity">
                              <input type="number" id="" class="input-text qty text" min="0" max="" name="currentVal" value="<?php echo  $product_quantity; ?>"  readonly>
                            </div>
                            <div class="p-add-max p-add-minCart"><button type="button" id="add"  class="plus11">+</button></div>
                            <input type="hidden" id="currentVal_q" value=" <?php echo $product_quantity; ?>" name="currentVal_q">
                          </div>
                          <div class="mini-bottom-day f-15">
                            <?php 	
                              if($cart_item['date_on_sale_from']){
                                $start_date = $cart_item['date_on_sale_from'][0];
                              }  
                              if($cart_item['date_on_sale_to']){
                                $end_date = $cart_item['date_on_sale_to'][0];
                              } 
                                  $sDate = new DateTime($start_date);
                                    $eDate= new DateTime($end_date);
                                    $difference =$eDate->diff($sDate);
                                    $days =  $difference->format("%a")+1;
                                    $sDate = new DateTime($start_date);
                                    $eDate= new DateTime($end_date);
                                    $difference =$eDate->diff($sDate);
                                    
                                    $days =  $difference->format("%a")+1;
                                    $price_value ='';
                                    $days_value = '';
                                    $pricePerDay= get_field('product_price_per_day',$product_id);
                                    if($pricePerDay){
                              
                                      foreach($pricePerDay as $pricePerDay1){
                              
                                           $days_value = $pricePerDay1['days'];
                                           $price_value = $pricePerDay1['price'];
                                          
                                          if($days == $days_value){
                                            
                                             $days_value = $pricePerDay1['days'];
                                             $price_value = $pricePerDay1['price'];
                                         
                                          break;
                                       
                                                    
                                   }
                                       
                                    }
                                   
                                  
                                     } else {
                                       
                                    }
                                     if($days_value==1){ 
                                        echo $days; ?> day
                            <?php }else{ 
                              echo $days; ?> days
                            <?php } ?>
                          </div>
                          <div class="mini-bottom-price f-15 text-center hhh">
                            <?php  if($price_value){ ?>
                            <span class="priceProduct priceProduct<?php echo $product_id; ?>" id="cust_id_<?php echo $var; ?>">€
                            <?php  echo $price_value * $product_quantity; ?>,-</span><?php }else{ ?>
                            <span class="priceProduct priceProduct<?php echo $product_id; ?>" id="cust_id_<?php echo $var; ?>">€<?php echo $product_price *$product_quantity;?>,-</span> <?php  } ?>
                          </div>
                        </div>
                      </div>
                      <?php
                        ++$var; 								 
                        }else{
                        ?>
                      <div class="mini-cart-home position-relative">
                        <?php 
                          ?>
                        <div class="mini-top">
                          <input type="hidden" id="mini_remove_item" name="mini_remove_item" value="<?php echo $product_id?>">
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
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/woocommerce-placeholder.png"  alt="slx"> 
                            <?php } ?>
                            </a>
                          </div>
                          <div class="mini-top-2">
                            <a href="<?php echo get_permalink($product_id); ?>">
                              <p class="mini-p-title mid-14"><?php echo $product_name; ?></p>
                            </a>
                            <div class="mini-hr"></div>
                            <div class="mini-bottom">
                              <div class="mini-bottom-qty" data-id="<?php echo $product_id; ?>" data-key="<?php echo $cart_item_key; ?>">
                                <div class="p-qty-min p-minus-minCart"><button type="button" id="sub" class="minus11">-</button></div>
                                <div class="p-quantity">
                                  <input type="number" id="" class="input-text qty text" min="0" max="" name="" value="<?php echo $product_quantity; ?>"  readonly>
                                </div>
                                <div class="p-add-max p-add-minCart"><button type="button" id="add" class="plus11">+</button></div>
                              </div>
                              <div class="mini-bottom-price f-15 text-center">
                                €<span class="priceProduct priceProduct<?php echo $product_id; ?>" id="cust_id_<?php echo $var; ?>" ><?php echo get_post_meta($product_id,'_price',true) * $product_quantity;  ?></span>,-
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <?php 
                        }
                        
                          } ?>
                      <?php ?>
                      <div class="mini-hr mh"></div>
                      <div class="min-total">
                        <div class="min-total-txt medium-txt">Subtotal</div>
                        <div class="min-total-price f-16"><span class="cartTotal"><?php echo $subtotal;?></span>,-</div>
                      </div>
                      <div class="btn-popup-css">
                        <a class="a-cart" href="<?php  echo WC()->cart->get_cart_url(); ?>">Go To Cart</a>
                      </div>
                    </div>
                    <?php }else{ ?>
                    <div>
                      <p class="woocommerce-mini-cart__empty-message"><?php esc_html_e( 'No products in the cart.', 'woocommerce' ); ?></p>
                    </div>
                    <?php } ?>
                  </div>
                  <?php } ?>
                </div>
              </div>
              <div class="eco-ch-3">
                <?php if(get_field('dropdown_icon','option')){ ?>
                <div class="t-web">
                  <?php the_field('dropdown_icon','option'); ?>
                </div>
                <?php } ?>
                <ul class="web-link">
                  <?php if(get_field( "dropdown_repeater",'option' )): ?>
                  <?php while( the_repeater_field('dropdown_repeater','option') ): ?>
                  <li class="web-li-link">
                    <?php the_sub_field('option_icon','option'); ?>
                    <a href="https://vr-expert.com/">
                    <?php the_sub_field('option_text','option'); ?>
                    </a>
                  </li>
                  <?php endwhile; ?>
                  <?php endif; ?>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="dsk-header-bottom">
          <div class="regular-container">
            <div class="menu-966">
              <nav class="d-ul" role='navigation'>
                <?php    wp_nav_menu(array(
                  'menu' => 'main-menu',
                  'theme_location' => 'main-menu',
                  'container' => false,
                  
                      )
                  ); ?>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </header>
    <!-- bar menu -->
    
    <div class="Barmenu-top">
      <div class="regular-container">
        <ul class="info-Menubar mid-14">
          <li>Free delivery</li>
          <li>Order today, receive tomorrow</li>
          <li>Expert advice</li>
        </ul>
      </div>
    </div>
    <!-- bar menu end -->
    <!-- tab or mobile menu -->
    <div class="Dsk-hide">
      <div class="mb-menu-wrap prime-background">
        <div class="mobile-header prime-background">
          <div class="mnu-container">
            <div class="mb-menu-brand">
              <div class="Brand-logo">
                <a href="<?php echo get_site_url(); ?>">
                  <p>VREXPERT</p>
                  <span class="rental-logo">Rental</span>
                </a>
              </div>
            </div>
            <div class="tb-mb-menu">
              <div class="eco-logo">
                <div class="eco-flex">
                  <div class="eco-ch-1">
                    <a href="tel:+31 30 711 6183">
                      <div class="call-hover">
                        <svg xmlns="http://www.w3.org/2000/svg" width="15.559" height="15.548" viewBox="0 0 15.559 15.548">
                          <path id="Path_548" data-name="Path 548" d="M500,578.085a4.049,4.049,0,0,1,2.285-3.611.86.86,0,0,1,.107-.036,1.231,1.231,0,0,1,.409-.042,4.285,4.285,0,0,1,.848.116l.067.022c.1.033.433.185.632.809l.955,2.742s.281.743-.2,1.14c-.015.013-.03.026-.045.04l-.892.891a.816.816,0,0,0-.219.385.488.488,0,0,0,.044.379.9.9,0,0,1,.061.113,11.061,11.061,0,0,0,4.932,4.9.683.683,0,0,0,.8-.17l.7-.68a.8.8,0,0,0,.083-.094,1.054,1.054,0,0,1,1.267-.35l2.9.988.066.022a1.018,1.018,0,0,1,.694.817c.007.046.013.092.021.138a2.573,2.573,0,0,1-.013,1.034,3.8,3.8,0,0,1-3.768,2.3,7.961,7.961,0,0,1-4.156-1.454q-.087-.06-.178-.114a18.149,18.149,0,0,1-6.39-6.761A8.519,8.519,0,0,1,500,578.085Z" transform="translate(-500 -574.393)" fill="#f39562"/>
                        </svg>
                      </div>
                      <div class="around-call">
                        <span class="call-to">+31 30 711 6183</span> 
                        <span class="clk-action">
                          <svg xmlns="http://www.w3.org/2000/svg" width="24.706" height="24.711" viewBox="0 0 24.706 24.711">
                            <path id="Path_548" data-name="Path 548" d="M500,580.261s0-4.278,3.628-5.74a1.367,1.367,0,0,1,.169-.057,1.951,1.951,0,0,1,.65-.067,6.8,6.8,0,0,1,1.346.184l.106.036c.166.053.688.293,1,1.286l1.516,4.359s.446,1.181-.315,1.811c-.024.02-.048.041-.071.063l-1.417,1.417a1.3,1.3,0,0,0-.348.612.776.776,0,0,0,.07.6,1.447,1.447,0,0,1,.1.18,17.573,17.573,0,0,0,7.831,7.795,1.083,1.083,0,0,0,1.272-.271l1.106-1.081a1.288,1.288,0,0,0,.131-.149,1.673,1.673,0,0,1,2.011-.557l4.6,1.57.1.035a1.618,1.618,0,0,1,1.1,1.3c.011.073.021.146.033.219a4.1,4.1,0,0,1-.02,1.643s-1.11,3.52-5.983,3.655a12.634,12.634,0,0,1-6.6-2.311q-.139-.1-.283-.182A28.833,28.833,0,0,1,501.6,585.866,13.549,13.549,0,0,1,500,580.261Z" transform="translate(-500 -574.393)" fill="#fff"/>
                          </svg>
                        </span>
                      </div>
                    </a>
                  </div>
                  <div class="eco-ch-2 ur-chek">
                    <div class="cart-head">
                      <a href="<?php echo get_site_url(); ?>/my-account">
                        <svg xmlns="http://www.w3.org/2000/svg" width="512" height="512" viewBox="0 0 512 512">
                          <path d="M256 256c52.805 0 96-43.201 96-96s-43.195-96-96-96-96 43.201-96 96 43.195 96 96 96zm0 48c-63.598 0-192 32.402-192 96v48h384v-48c0-63.598-128.402-96-192-96z"/>
                        </svg>
                      </a>
                    </div>
                  </div>
                  <div class="eco-ch-2">
                    <div class="cart-head">
                      <?php if(get_field('add_to_card_icon','option')){ ?>
                      <a  class="amenu" href="<?php echo home_url();?>/cart">   
                      <?php the_field('add_to_card_icon','option'); 
                        ?>
                      </a>
                      <?php
                        }
                        $cart_count=count(WC()->cart->get_cart());
                                       if ( $cart_count > 0 ) {
                                        ?>
                      <span class="count-products"><?php echo $cart_count; ?></span>
                      <?php            
                        }
                         ?> 
                      <?php 
                        $cart_count=count(WC()->cart->get_cart());
                        if ( $cart_count > 0 ) {
                        ?>
                      <span class="count-products"><?php echo $cart_count; ?></span>
                      <?php            
                        }else{ 
                             ?>
                      <?php 
                        }
                         ?>
                    </div>
                  </div>
                  <div class="eco-ch-3">
                    <div class="t-web">
                      <svg id="Group_1292" data-name="Group 1292" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path id="Path_3222" data-name="Path 3222" d="M0,0H24V24H0Z" fill="none"/>
                        <path id="Path_3223" data-name="Path 3223" d="M15,10V21H3a1,1,0,0,1-1-1V10Zm7,0V20a1,1,0,0,1-1,1H17V10ZM21,3a1,1,0,0,1,1,1V8H2V4A1,1,0,0,1,3,3Z"/>
                      </svg>
                    </div>
                    <ul class="web-link">
                      <li class="web-li-link">
                        <a href="#">
                          <svg id="Group_1300" data-name="Group 1300" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path id="Path_3222" data-name="Path 3222" d="M0,0H24V24H0Z" fill="none"/>
                            <path id="Path_3223" data-name="Path 3223" d="M15,10V21H3a1,1,0,0,1-1-1V10Zm7,0V20a1,1,0,0,1-1,1H17V10ZM21,3a1,1,0,0,1,1,1V8H2V4A1,1,0,0,1,3,3Z" fill="#f7f7f7"/>
                          </svg>
                          Rental site
                        </a>
                      </li>
                      <li class="web-li-link">
                        <a href="#">
                          <svg id="Group_1299" data-name="Group 1299" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path id="Path_3230" data-name="Path 3230" d="M0,0H24V24H0Z" fill="none"/>
                            <path id="Path_3231" data-name="Path 3231" d="M11,3V21H4a1,1,0,0,1-1-1V4A1,1,0,0,1,4,3ZM21,13v7a1,1,0,0,1-1,1H13V13ZM20,3a1,1,0,0,1,1,1v7H13V3Z" fill="#f59663"/>
                          </svg>
                          Buy site
                        </a>
                      </li>
                    </ul>
                  </div>
                  <div class="echo-ch-4">
                    <div class="mobile-hamburger">
                      <svg xmlns="http://www.w3.org/2000/svg" width="42.502" height="29.051" viewBox="0 0 42.502 29.051">
                        <g id="Component_148_1" data-name="Component 148 – 1" transform="translate(0 2)">
                          <line id="Line_8" data-name="Line 8" x2="42.502" fill="none" stroke="#fff" stroke-width="4"/>
                          <line id="Line_9" data-name="Line 9" x2="42.502" transform="translate(0 12.525)" fill="none" stroke="#fff" stroke-width="4"/>
                          <line id="Line_10" data-name="Line 10" x2="42.502" transform="translate(0 25.051)" fill="none" stroke="#fff" stroke-width="4"/>
                        </g>
                      </svg>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="bottom-mb-sch">
        <div class="mobile-serch mobile-header">
          <div class="mb-menu-src">
            <div class="product-search">
              <form autocomplete="off" role="search" method="get" class="header-product-search" action="<?php echo esc_url( home_url( '/'  ) ); ?>">
                <div class="S-input-bar">
                  <input required class="search-input"  autocomplete="false" type="text" placeholder="<?php echo esc_attr_x( 'Search for products here ...', 'placeholder', 'woocommerce' ); ?>" value="<?php echo get_search_query(); ?>" name="s" id="searchInputmobile" onkeyup="fetchResultsmobile()" title="<?php echo esc_attr_x( 'Search for products here ...', 'label', 'woocommerce' ); ?>">
                  <button class="s-btn">
                    <svg xmlns="http://www.w3.org/2000/svg" width="15.121" height="15.018" viewBox="0 0 15.121 15.018">
                      <g id="Group_417" data-name="Group 417" transform="translate(-1477 -57)">
                        <g id="Ellipse_4" data-name="Ellipse 4" transform="translate(1477 57)" fill="#f39562" stroke="#f39562" stroke-width="3">
                          <ellipse cx="4.953" cy="4.798" rx="4.953" ry="4.798" stroke="none"/>
                          <ellipse cx="4.953" cy="4.798" rx="3.453" ry="3.298" fill="none"/>
                        </g>
                        <line id="Line_1" data-name="Line 1" x2="5.572" y2="5.262" transform="translate(1484.429 64.636)" fill="none" stroke="#f39562" stroke-linecap="round" stroke-width="3"/>
                        <circle id="Ellipse_5" data-name="Ellipse 5" cx="4.218" cy="4.218" r="4.218" transform="translate(1477.736 57.58)" fill="#fff"/>
                      </g>
                    </svg>
                  </button>
                  <input type="hidden"  autocomplete="false" name="post_type" value="product" id="searchInputmobile" />
                  <div class="e-search">
                    <ul class="U-search" id="datafetchmobile">
                    </ul>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- tab or mobile end  menu -->
    <div class="mobile-menu-popup">
      <div class="mobile-header">
        <div class="mb-submenu">
          <?php    wp_nav_menu(array(
            'menu' => 'mobile-menu',
            'theme_location' => 'mobile-menu',
            'container' => false,
                )
            ); ?>
        </div>
      </div>
    </div>