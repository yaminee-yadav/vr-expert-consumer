<?php get_header();?>

<?php  $thumb_id = get_post_thumbnail_id(); 
	$thumbnail_url = wp_get_attachment_image_url($thumb_id); 
	
	if($thumbnail_url){
	?> 
	<section class="images-events" style="background:url(<?php echo $thumbnail_url; ?>)"></section>
	<?php } ?>
		
<section class="sec-evnt">
	<div class="regular-container w-941">
		<div class="vr-breadcrumb">
			<ul class="breadcrumb--classic">
				<?php
					if ( function_exists('get_breadcrumb') ) {       
					?>
				<li>
					<?php get_breadcrumb(); ?>
				</li>
				<?php }
					?>
			</ul>
		</div>
		

		<div class="ev-parents">
			<div class="ev-child-1">
				<div class="Events-W">
					<div class="flex-services">
						<div class="services-ch1">
						<?php if(get_field('product_assign') ){ ?>
							<h2 class="mid-14">Hardware</h2>
						     <?php
								 $assignp_ids = get_field('product_assign',get_the_ID()); 
								 $i=0;
								 foreach($assignp_ids as $assignp_id){	
									
							     $i++;
                                  
							 ?>
							<div class="hardwere">
								 <a class="an-w" href="<?php echo get_the_permalink($assignp_id); ?>"> 
									<div class="img-hardwere">
										<?php  $Productimage = get_the_post_thumbnail_url($assignp_id); 
										if($Productimage){ ?>
									 <img src="<?php echo $Productimage; ?>" class="" alt="slx">
										<?php } else { ?>
										<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/woocommerce-placeholder.png">
										<?php } ?>
									</div>
								 </a>
								<div class="hardwere-txt position-relative">
								<a class="an-ws" href="<?php echo get_the_permalink($assignp_id); ?>"> 
									<h3 class="mid-14"> <?php echo mb_strimwidth(get_the_title($assignp_id), 0, 20, '.....'); ?></h3>
									<?php  $product = wc_get_product( $assignp_id);
								             $product_id = $item['product_id'];
										
											 $id= $product->get_id();
											$neprice = $product->price; ?>
									<p class="mid-14">From €<?php echo $neprice; ?> /Day</p>
								 </a>
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
										<?php 
											$booqable_product_ids  = get_post_meta($assignp_id,'booqable_product_id',true); 
												if($booqable_product_ids){ ?>
								<div class="x-shop hover-x">
										 
                        					<a class="a-cart" href="javascript:void(0);" onclick="open_popup(<?php echo $assignp_id; ?>);">
											
												<svg xmlns="http://www.w3.org/2000/svg" width="15" height="29" viewBox="0 0 15 29">
													<text id="_" data-name="+" transform="translate(0 22)" fill="#fff" font-size="21" font-family="Poppins-Medium, Poppins" font-weight="500">
														<tspan x="0" y="0">+</tspan>
													</text>
												</svg>
											</a>
										</div>
								<?php }else{ ?>
										<div class="x-shop hover-x">
										  <input type="hidden" id="product_id_simple" name="product_id_simple" value="<?php echo $assignp_id; ?>">
                        					<a class="a-cart" href="javascript:void(0);" onclick="add_to_cart(<?php echo $assignp_id; ?>);">
											
												<svg xmlns="http://www.w3.org/2000/svg" width="15" height="29" viewBox="0 0 15 29">
													<text id="_" data-name="+" transform="translate(0 22)" fill="#fff" font-size="21" font-family="Poppins-Medium, Poppins" font-weight="500">
														<tspan x="0" y="0">+</tspan>
													</text>
												</svg>
											</a>
										</div>
										<?php } ?>
									</div>
								</div>
							</div>
							<?php 
                                    }
                                    } 
								?>

							<p class="mid-14">Services</p>
							<p class="light-14">installation, Configuratie, Event support</p>
						</div>
						<div class="services-ch2">
							<ul class="service-count">
								<?php if($i<2){ ?>
								<li class="vr-ls-list position-relative">
									<div class="s-count-list">
										<div class="p-install">
											<img src="https://stage.rental.vr-expert.com/wp-content/themes/vr-expert/img/Installation.png" class="" alt="product-search">
										</div>
										<div class="p-name">
											<a class="sr-link medium-txt" href="<?php echo get_site_url(); ?>/servicepage">
											<?php if( get_field('installation_service_heading','option') ){  
                                               the_field('installation_service_heading','option');
                                                  }
                                                   ?>
											</a>
											<span class="hovr-tx tooltip tooltip--top" data-tooltip="Bij event support krijgt u support op locatie van experts die uw ondersteunen bij het AR of VR gedeelte van uw evenement.">
												<svg id="Component_96_1" data-name="Component 96 – 1" xmlns="http://www.w3.org/2000/svg" width="16.884" height="18.011" viewBox="0 0 16.884 18.011">
													<ellipse id="Ellipse_2439" data-name="Ellipse 2439" cx="8.442" cy="8.442" rx="8.442" ry="8.442" transform="translate(0 1.127)" fill="#818cc4"></ellipse>
													<text id="i" transform="translate(6.754 13)" fill="#fff" font-size="12" font-family="Poppins-Light, Poppins" font-weight="300">
														<tspan x="0" y="0">i</tspan>
													</text>
												</svg>
											</span>
										</div>
										<div class="p-click vservice-click">
											<a class="sr-add" href="javascript:void(0)">
												<svg xmlns="http://www.w3.org/2000/svg" width="11" height="23" viewBox="0 0 11 23">
													<text id="_" data-name="+" transform="translate(0 17)" fill="#21365d" font-size="16" font-family="Poppins-Light, Poppins" font-weight="300">
														<tspan x="0" y="0">+</tspan>
													</text>
												</svg>
											</a>
										</div>
									</div>
									
									<div class="install-v-data evnt-install-x" style="display: none;">
										<div class="v-260">
											<div class="text-v-dsc light-txt">
											<?php if( get_field('installation_service_description','option')){  
                                          the_field('installation_service_description','option');
                                          }
                                          ?>
											</div>
											<form class="myevnt-form" action="#">
												<div class="ch-vr-info">
													<div class="chek-m">
														<div class="form-group-checkbox">
															<input type="checkbox" id="css_popup_event" value="<?php  if(get_field('assign_installation_service',$assignp_id)){ the_field('assign_installation_service',$assignp_id); }else{  the_field('installation_service_product_assign','option'); }?>">
															<label for="css_popup_event"></label>
														</div>
													</div>
													
													<div class="w-241">
														<div class="p-name dp-w">
															<a class="sr-link regular-txt" href="javascript:void(0)">
																	<?php if( get_field('installation_service_heading','option') ){  
                                                					   the_field('installation_service_heading','option');
																	}
																	?>
															</a>
															<span class="hovr-tx tooltip tooltip--top" data-tooltip="<?php if( get_field('installation_service_hover_text','option') ){  
																the_field('installation_service_hover_text','option');
																}
																?>">
																<svg id="Component_96_1" data-name="Component 96 – 1" xmlns="http://www.w3.org/2000/svg" width="16.884" height="18.011" viewBox="0 0 16.884 18.011">
																	<ellipse id="Ellipse_2439" data-name="Ellipse 2439" cx="8.442" cy="8.442" rx="8.442" ry="8.442" transform="translate(0 1.127)" fill="#818cc4"></ellipse>
																	<text id="i" transform="translate(6.754 13)" fill="#fff" font-size="12" font-family="Poppins-Light, Poppins" font-weight="300">
																		<tspan x="0" y="0">i</tspan>
																	</text>
																</svg>
															</span>
														</div>
														<p class="issue-p">18- per device</p>
													</div>
												</div>
												<!-- ch-vr-info info end -->
												<div class="max-335 ds-are regular-txt" style="display: none;">
													<textarea rows="5" cols="30" name="installation_service" id="installation_service" placeholder="Installation Service"></textarea>
													<br>
													<div class="btn-ami">
                                             <div class="cart-install-btn">
											 
                                                <?php  $booqable_product_ids  = get_post_meta($assignp_id,'booqable_product_id',true); ?>
												             <?php  if($booqable_product_ids){  ?>
																<a href="javascript:void(0)" onclick="open_popup(<?php echo $assignp_id; ?>);"><span class="is-price">€18-</span>
																<span class="is-cart">
                                                      <span class="a-cart front-popupcall"  data-prod="<?php echo $assignp_id; ?>" data-key="<?php echo $cart_item_key; ?>">
                                                        <i class="fas fa-shopping-cart"></i>
															 </span>
                                                    </span></a>
																<?php }else{ ?>
																	<a href="javascript:void(0)" onclick="installation_service(<?php  if(get_field('assign_installation_service',$assignp_id)){ the_field('assign_installation_service',$assignp_id); }else{  the_field('installation_service_product_assign','option'); }?>,<?php echo $assignp_id;?>);">
					                                 <span class="is-price"  >€18-</span>
					                                
                                                   <span class="is-cart">
                                                      <span class="a-cart"  data-prod="<?php echo $assignp_id; ?>" data-key="<?php echo $cart_item_key; ?>">
                                                        <i class="fas fa-shopping-cart"></i>
															 </span>
                                                    </span> </a>
													<?php } ?>
                                                     
                                             </div>
                                          </div>
												</div>
											</form>
											
										</div>
									</div>
									<!-- div under data -->
								</li>
								<?php } ?>
								<li class="vr-ls-list position-relative">
									<div class="s-count-list">
										<div class="p-install">
											<img src="https://stage.rental.vr-expert.com/wp-content/themes/vr-expert/img/Event.png" class="" alt="product-search">
										</div>
										<div class="p-name">
											<a class="sr-link medium-txt" href="<?php get_site_url(); ?>/servicepage">
											<?php if( get_field('event_service_heading','option') ){  
                                       the_field('event_service_heading','option');
                                       }
                                       ?>
											</a>
									<span class="hovr-tx tooltip tooltip--top" data-tooltip="<?php if( get_field('event_service_hover_text','option') ){  
                                       the_field('event_service_hover_text','option');
                                       }
                                       ?>">
												<svg id="Component_96_1" data-name="Component 96 – 1" xmlns="http://www.w3.org/2000/svg" width="16.884" height="18.011" viewBox="0 0 16.884 18.011">
													<ellipse id="Ellipse_2439" data-name="Ellipse 2439" cx="8.442" cy="8.442" rx="8.442" ry="8.442" transform="translate(0 1.127)" fill="#818cc4"></ellipse>
													<text id="i" transform="translate(6.754 13)" fill="#fff" font-size="12" font-family="Poppins-Light, Poppins" font-weight="300">
														<tspan x="0" y="0">i</tspan>
													</text>
												</svg>
											</span>
										</div>
										<div class="p-click more-click">
											<a class="sr-add" href="javascript:void(0)">
												<svg xmlns="http://www.w3.org/2000/svg" width="11" height="23" viewBox="0 0 11 23">
													<text id="_" data-name="+" transform="translate(0 17)" fill="#21365d" font-size="16" font-family="Poppins-Light, Poppins" font-weight="300">
														<tspan x="0" y="0">+</tspan>
													</text>
												</svg>
											</a>
										</div>
									</div>
									<div class="install-v-data evnt-sr" style="display: none;">
										<div class="v-260">
											<div class="text-v-dsc light-txt">
											<?php if( get_field('event_service_description','option') ){  
                                          the_field('event_service_description','option');
                                          }
                                          ?>
											</div>

											<form class="myevnt-form" action="#">
                                      
									  <div class="sel-1 position-relative">
									  <label class="light-txt" for="myevent">Quantity</label>
									  <div class="box-qty <?php  if(get_field('assign_event_service_product',get_the_ID())){ the_field('assign_event_service_product',get_the_ID()); }else if( get_field('event_service_product_assign','option')){ ?>
					 				 <?php the_field('event_service_product_assign','option'); }?>">
										<span  class="quantity-minusss">-</span>
										<input type="text" name="p_quantity" id="qnts" class="quantitys" value="1" readonly>
										<span  class="quantity-plusss">+</span>
										</div>
									  </div>
									  <div class="sel-1 position-relative">
										 <label class="light-txt" for="myevent">Tell us about your event</label>
										 <textarea rows="5" cols="30" name="myevent" placeholder="Event service"></textarea><br />
									  </div>
									  <div class="flex-end position-relative">
										 <div class="cart-install-btn" onclick="event_service(<?php  if(get_field('assign_event_service_product',get_the_ID())){ the_field('assign_event_service_product',get_the_ID()); }else if( get_field('event_service_product_assign','option')){ ?>
					 				 <?php the_field('event_service_product_assign','option'); }?>);">
											<a href="#">
											  <span class="is-price" >€500-</span> </a>
										 </div>
									  </div>
								   </form>





										</div>
									</div>
								</li>
							</ul>
							<?php if(get_field('software_assign') ){?>
							<p class="mid-14">Software</p>
							<?php 	 $assignp_ids1 = get_field('software_assign',$val->ID); 
								 foreach($assignp_ids1 as $assignp_id1){ ?>
							<p><a class="hvtxt regular-txt" href="#"><?php echo get_the_title($assignp_id1); ?></a></p>
							    <?php } }?>
						</div>
						
					</div>
				</div>
			</div>
			<div class="ev-child-2">
				<div class="Editor-events">
			     	<h1><?php echo the_title();?></h1>
					<?php echo the_content(); ?>
					
				</div>
				<!-- other subs -->
				<div class="suc-tab">
					<div class="vr-extra">
						<div class="medium-txt ch-wr-1">
							<p>Rent here the products that appear in the article</p>
							<?php
								 $assignp_ids = get_field('product_assign',get_the_ID()); 
								 foreach($assignp_ids as $assignp_id){	

							 ?>
							<p><a class=" regular-txt" href="<?php echo get_the_permalink($assignp_id); ?>"><?php echo get_the_title($assignp_id); ?> > </a></p>
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
</section>

<?php 
$terms = get_the_terms( $post->ID, 'categories' );

$termsId = array();			
foreach($terms as $term){
  $termId =  $term->term_id;
  array_push($termsId,$termId);
}

?>

				  <?php 
			
				
					$args = array(
						'post_type' => 'events',
						'post_status' => 'publish',
						'posts_per_page' => -1,
						'post__not_in' => array(get_the_ID()),
						'orderby' => 'post_title',
							'order' => 'ASC' ,
							'tax_query' => array(
										'relation' => 'OR',
										array(
											'taxonomy' => 'categories',
											'field' => 'term_id', 
											'terms' => $termsId,
											'operator'=>'IN'
										),
									),
					);
			        	$wp_query= new WP_Query($args);
						if($wp_query->have_posts()) :
					?>
					<div class="vr-sec">
	<div class="w-1194">
		<div class="vr-ex-evnt">
			<div class="w-1073">
			
				<h2 class="serve-heading ev-title">Related events</h2>
				<div class="owl-slider position-relative">
					<div id="evnt-rel-products" class="owl-carousel">
						<?php 
						
							while($wp_query->have_posts()) :
							   $wp_query->the_post();
						    	$event_id = get_the_ID();
							$post_title =  get_the_title();
							$post_content =  get_the_content('','',get_the_ID());
							$posts = get_post($event_id);
							
							
							
							?>
						<div class="item">
							<div class="eev-vr">
								<div class="h-189">
									<?php  if ( has_post_thumbnail() ) { ?>
										<img src="<?php echo get_the_post_thumbnail_url($event_id); ?>" class="" alt="evnt">
									<?php  
										} else{ ?>
											<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/woocommerce-placeholder.png" class="" alt="evnt">
									 <?php } ?>
										
								</div>
								<div class="eevnt-p">
									<h2 class="medium-txt"><?php echo mb_strimwidth($post_title, 0, 25, '.....'); ?> </h2>
									<div class="text-limit light-text">
										<p><?php
											echo mb_strimwidth($post_content , 0, 90, '.....');
										 ?></p>
									</div>
									<div class="text-right">
										
										<a class="regular-txt readmore" href="<?php echo get_site_url().'/events/'.$posts->post_name ?>"> Read more&gt; </a>
									</div>
								</div>
							</div>
						</div>
						<?php 
						    endwhile; ?>
							
							</div>
						</div>
				
			</div>
		</div>
	</div>
	
</div>
							
							<?php
						endif; wp_reset_query();
							  ?>
					

<section class="section-step slider-index pd-contact">
	<div class="regular-container full-container-banner position-relative">
		<div class="cr-img position-relative">
			<div class="index-Banner call-us-section">
				<div class="banner-up">
					<div class="banner-p">
						<a href="tel:+31 30 711 6183">
						<?php if(get_field('contact_us_description','option')){ ?>
						<?php the_field('contact_us_description','option'); ?>  
						<?php  } ?>
						</a>
					</div>
					<a class="contact-btn medium-txt" href="<?php echo get_site_url(); ?>/contact"><?php if(get_field('contact_us_cta_text','option')){ ?>
					<?php the_field('contact_us_cta_text','option'); ?>  
					<?php  } ?></a>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="Brand-section">
	<div class="dsk-container position-relative">
		<div class="col-lg-12 col-md-12 col-12 text-center abb">
			<?php if(get_field('company_work_with_heading','option')){ ?>
			<h2 class="h2-heading mb-32"><?php  the_field('company_work_with_heading','option') ?></h2>
			<?php } ?>
		</div>
		<div class="Brand-list">
			<ul class="logogrid">
				<?php if(get_field('company_work_with','option') ): ?>
				<?php while( the_repeater_field('company_work_with','option') ): ?>
				<li class="logogrid__item">
					<img src="<?php the_sub_field('company_icon','option'); ?>" class="logogrid__img" alt="Coca Cola">
				</li>
				<?php endwhile; ?>
				<?php endif; ?>
			</ul>
		</div>
	</div>
</section>

<?php if ( function_exists('faqs') ) { ?>
   <?php if(get_field('faqs_left_repeater1') ){ ?>
<section class="Faq-coman position-relative">
   <div class="faq-one">
      <svg class="right__img" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="667.697" height="125.663" viewBox="0 0 667.697 125.663">
         <defs>
            <linearGradient id="linear-gradient" x1="0.99" y1="0.415" x2="0.009" y2="0.413" gradientUnits="objectBoundingBox">
               <stop offset="0" stop-color="#ededff"/>
               <stop offset="1" stop-color="#818cc4"/>
            </linearGradient>
         </defs>
         <path id="Union_289" data-name="Union 289" d="M657.123,119.883a4.787,4.787,0,1,1,4.781,4.78A4.784,4.784,0,0,1,657.123,119.883Zm-28.693,0a4.771,4.771,0,1,1,4.762,4.78A4.762,4.762,0,0,1,628.43,119.883Zm-28.744,0a4.787,4.787,0,1,1,4.785,4.78A4.784,4.784,0,0,1,599.686,119.883Zm-28.721,0a4.784,4.784,0,1,1,4.789,4.78A4.785,4.785,0,0,1,570.965,119.883Zm-28.721,0a4.8,4.8,0,1,1,4.789,4.78A4.785,4.785,0,0,1,542.244,119.883Zm-28.717,0a4.784,4.784,0,1,1,4.807,4.78A4.791,4.791,0,0,1,513.527,119.883Zm-28.7,0a4.778,4.778,0,1,1,4.768,4.78A4.767,4.767,0,0,1,484.828,119.883Zm-28.738,0a4.784,4.784,0,1,1,4.779,4.78A4.786,4.786,0,0,1,456.09,119.883Zm-25.055,0a4.787,4.787,0,1,1,4.781,4.78A4.784,4.784,0,0,1,431.035,119.883Zm-28.693,0a4.771,4.771,0,1,1,4.762,4.78A4.762,4.762,0,0,1,402.342,119.883Zm-28.744,0a4.787,4.787,0,1,1,4.785,4.78A4.784,4.784,0,0,1,373.6,119.883Zm-28.721,0a4.784,4.784,0,1,1,4.793,4.78A4.786,4.786,0,0,1,344.877,119.883Zm-28.721,0a4.8,4.8,0,1,1,4.789,4.78A4.784,4.784,0,0,1,316.156,119.883Zm-28.717,0a4.784,4.784,0,1,1,4.811,4.78A4.792,4.792,0,0,1,287.439,119.883Zm-28.7,0a4.775,4.775,0,1,1,4.762,4.78A4.762,4.762,0,0,1,258.744,119.883Zm-28.744,0a4.787,4.787,0,1,1,4.785,4.78A4.788,4.788,0,0,1,230,119.883Zm-28.961,0a4.785,4.785,0,1,1,4.775,4.78A4.782,4.782,0,0,1,201.039,119.883Zm-28.7,0a4.771,4.771,0,1,1,4.764,4.78A4.764,4.764,0,0,1,172.34,119.883Zm-28.742,0a4.786,4.786,0,1,1,4.783,4.78A4.786,4.786,0,0,1,143.6,119.883Zm-28.723,0a4.787,4.787,0,1,1,4.795,4.78A4.786,4.786,0,0,1,114.875,119.883Zm-28.721,0a4.8,4.8,0,1,1,4.789,4.78A4.785,4.785,0,0,1,86.154,119.883Zm-28.717,0a4.787,4.787,0,1,1,4.813,4.78A4.793,4.793,0,0,1,57.438,119.883Zm-28.693,0a4.775,4.775,0,1,1,4.762,4.78A4.762,4.762,0,0,1,28.744,119.883ZM0,119.883a4.787,4.787,0,1,1,4.785,4.78A4.787,4.787,0,0,1,0,119.883Zm657.123-28.8a4.787,4.787,0,1,1,4.781,4.789A4.793,4.793,0,0,1,657.123,91.086Zm-28.693,0a4.772,4.772,0,1,1,4.762,4.789A4.771,4.771,0,0,1,628.43,91.086Zm-28.744,0a4.787,4.787,0,1,1,4.785,4.789A4.794,4.794,0,0,1,599.686,91.086Zm-28.721,0a4.784,4.784,0,1,1,4.789,4.789A4.795,4.795,0,0,1,570.965,91.086Zm-28.721,0a4.8,4.8,0,1,1,4.789,4.789A4.795,4.795,0,0,1,542.244,91.086Zm-28.717,0a4.784,4.784,0,1,1,4.807,4.789A4.8,4.8,0,0,1,513.527,91.086Zm-28.7,0a4.778,4.778,0,1,1,4.768,4.789A4.776,4.776,0,0,1,484.828,91.086Zm-28.738,0a4.784,4.784,0,1,1,4.779,4.789A4.8,4.8,0,0,1,456.09,91.086Zm-25.055,0a4.787,4.787,0,1,1,4.781,4.789A4.793,4.793,0,0,1,431.035,91.086Zm-28.693,0a4.771,4.771,0,1,1,4.762,4.789A4.771,4.771,0,0,1,402.342,91.086Zm-28.744,0a4.787,4.787,0,1,1,4.785,4.789A4.794,4.794,0,0,1,373.6,91.086Zm-28.721,0a4.784,4.784,0,1,1,4.793,4.789A4.8,4.8,0,0,1,344.877,91.086Zm-28.721,0a4.8,4.8,0,1,1,4.789,4.789A4.793,4.793,0,0,1,316.156,91.086Zm-28.717,0a4.784,4.784,0,1,1,4.811,4.789A4.8,4.8,0,0,1,287.439,91.086Zm-28.7,0a4.775,4.775,0,1,1,4.762,4.789A4.771,4.771,0,0,1,258.744,91.086Zm-28.744,0a4.787,4.787,0,1,1,4.785,4.789A4.8,4.8,0,0,1,230,91.086Zm-28.961,0a4.785,4.785,0,1,1,4.775,4.789A4.792,4.792,0,0,1,201.039,91.086Zm-28.7,0a4.772,4.772,0,1,1,4.764,4.789A4.773,4.773,0,0,1,172.34,91.086Zm-28.742,0a4.786,4.786,0,1,1,4.783,4.789A4.8,4.8,0,0,1,143.6,91.086Zm-28.723,0a4.787,4.787,0,1,1,4.795,4.789A4.8,4.8,0,0,1,114.875,91.086Zm-28.721,0a4.8,4.8,0,1,1,4.789,4.789A4.795,4.795,0,0,1,86.154,91.086Zm-28.717,0a4.787,4.787,0,1,1,4.813,4.789A4.8,4.8,0,0,1,57.438,91.086Zm-28.693,0a4.775,4.775,0,1,1,4.762,4.789A4.771,4.771,0,0,1,28.744,91.086ZM0,91.086a4.787,4.787,0,1,1,4.785,4.789A4.8,4.8,0,0,1,0,91.086ZM657.123,62.329a4.787,4.787,0,1,1,9.574,0,4.787,4.787,0,0,1-9.574,0Zm-28.693,0a4.771,4.771,0,1,1,4.762,4.763A4.794,4.794,0,0,1,628.43,62.329Zm-28.744,0a4.787,4.787,0,1,1,9.574,0,4.787,4.787,0,0,1-9.574,0Zm-28.721,0a4.784,4.784,0,1,1,9.568,0,4.784,4.784,0,0,1-9.568,0Zm-28.721,0a4.8,4.8,0,1,1,4.789,4.763A4.818,4.818,0,0,1,542.244,62.329Zm-28.717,0a4.784,4.784,0,1,1,9.568,0,4.784,4.784,0,0,1-9.568,0Zm-28.7,0a4.778,4.778,0,1,1,4.768,4.763A4.8,4.8,0,0,1,484.828,62.329Zm-28.738,0a4.784,4.784,0,1,1,9.568,0,4.784,4.784,0,0,1-9.568,0Zm-25.055,0a4.787,4.787,0,1,1,4.781,4.763A4.816,4.816,0,0,1,431.035,62.329Zm-28.693,0a4.771,4.771,0,1,1,4.762,4.763A4.794,4.794,0,0,1,402.342,62.329Zm-28.744,0a4.787,4.787,0,1,1,9.574,0,4.787,4.787,0,0,1-9.574,0Zm-28.721,0a4.784,4.784,0,1,1,9.568,0,4.784,4.784,0,0,1-9.568,0Zm-28.721,0a4.8,4.8,0,1,1,4.789,4.763A4.816,4.816,0,0,1,316.156,62.329Zm-28.717,0a4.784,4.784,0,1,1,9.568,0,4.784,4.784,0,0,1-9.568,0Zm-28.7,0a4.775,4.775,0,1,1,4.762,4.763A4.794,4.794,0,0,1,258.744,62.329Zm-28.744,0a4.787,4.787,0,1,1,9.574,0,4.787,4.787,0,0,1-9.574,0Zm-28.961,0a4.785,4.785,0,1,1,4.775,4.763A4.815,4.815,0,0,1,201.039,62.329Zm-28.7,0a4.771,4.771,0,1,1,4.764,4.763A4.8,4.8,0,0,1,172.34,62.329Zm-28.742,0a4.786,4.786,0,1,1,9.572,0,4.786,4.786,0,0,1-9.572,0Zm-28.723,0a4.787,4.787,0,1,1,9.574,0,4.787,4.787,0,0,1-9.574,0Zm-28.721,0a4.8,4.8,0,1,1,4.789,4.763A4.818,4.818,0,0,1,86.154,62.329Zm-28.717,0a4.787,4.787,0,1,1,9.574,0,4.787,4.787,0,0,1-9.574,0Zm-28.693,0a4.775,4.775,0,1,1,4.762,4.763A4.794,4.794,0,0,1,28.744,62.329ZM0,62.329a4.787,4.787,0,1,1,9.574,0,4.787,4.787,0,0,1-9.574,0ZM657.123,33.56a4.787,4.787,0,1,1,4.781,4.789A4.783,4.783,0,0,1,657.123,33.56Zm-28.693,0a4.772,4.772,0,1,1,4.762,4.789A4.761,4.761,0,0,1,628.43,33.56Zm-28.744,0a4.787,4.787,0,1,1,4.785,4.789A4.784,4.784,0,0,1,599.686,33.56Zm-28.721,0a4.784,4.784,0,1,1,4.789,4.789A4.785,4.785,0,0,1,570.965,33.56Zm-28.721,0a4.8,4.8,0,1,1,4.789,4.789A4.785,4.785,0,0,1,542.244,33.56Zm-28.717,0a4.784,4.784,0,1,1,4.807,4.789A4.791,4.791,0,0,1,513.527,33.56Zm-28.7,0a4.778,4.778,0,1,1,4.768,4.789A4.766,4.766,0,0,1,484.828,33.56Zm-28.738,0a4.784,4.784,0,1,1,4.779,4.789A4.785,4.785,0,0,1,456.09,33.56Zm-25.055,0a4.787,4.787,0,1,1,4.781,4.789A4.783,4.783,0,0,1,431.035,33.56Zm-28.693,0a4.771,4.771,0,1,1,4.762,4.789A4.761,4.761,0,0,1,402.342,33.56Zm-28.744,0a4.787,4.787,0,1,1,4.785,4.789A4.784,4.784,0,0,1,373.6,33.56Zm-28.721,0a4.784,4.784,0,1,1,4.793,4.789A4.785,4.785,0,0,1,344.877,33.56Zm-28.721,0a4.8,4.8,0,1,1,4.789,4.789A4.783,4.783,0,0,1,316.156,33.56Zm-28.717,0a4.784,4.784,0,1,1,4.811,4.789A4.792,4.792,0,0,1,287.439,33.56Zm-28.7,0a4.775,4.775,0,1,1,4.762,4.789A4.761,4.761,0,0,1,258.744,33.56ZM230,33.56a4.787,4.787,0,1,1,4.785,4.789A4.787,4.787,0,0,1,230,33.56Zm-28.961,0a4.785,4.785,0,1,1,4.775,4.789A4.782,4.782,0,0,1,201.039,33.56Zm-28.7,0a4.772,4.772,0,1,1,4.764,4.789A4.763,4.763,0,0,1,172.34,33.56Zm-28.742,0a4.786,4.786,0,1,1,4.783,4.789A4.786,4.786,0,0,1,143.6,33.56Zm-28.723,0a4.787,4.787,0,1,1,4.795,4.789A4.786,4.786,0,0,1,114.875,33.56Zm-28.721,0a4.8,4.8,0,1,1,4.789,4.789A4.785,4.785,0,0,1,86.154,33.56Zm-28.717,0a4.787,4.787,0,1,1,4.813,4.789A4.792,4.792,0,0,1,57.438,33.56Zm-28.693,0a4.775,4.775,0,1,1,4.762,4.789A4.761,4.761,0,0,1,28.744,33.56ZM0,33.56a4.787,4.787,0,1,1,4.785,4.789A4.786,4.786,0,0,1,0,33.56ZM657.123,4.789A4.787,4.787,0,1,1,661.9,9.573,4.8,4.8,0,0,1,657.123,4.789Zm-28.693,0a4.772,4.772,0,1,1,4.762,4.784A4.779,4.779,0,0,1,628.43,4.789Zm-28.744,0a4.787,4.787,0,1,1,4.785,4.784A4.8,4.8,0,0,1,599.686,4.789Zm-28.721,0a4.784,4.784,0,1,1,4.789,4.784A4.8,4.8,0,0,1,570.965,4.789Zm-28.721,0a4.8,4.8,0,1,1,4.789,4.784A4.8,4.8,0,0,1,542.244,4.789Zm-28.717,0a4.784,4.784,0,1,1,4.807,4.784A4.808,4.808,0,0,1,513.527,4.789Zm-28.7,0A4.778,4.778,0,1,1,489.6,9.573,4.784,4.784,0,0,1,484.828,4.789Zm-28.738,0a4.784,4.784,0,1,1,4.779,4.784A4.8,4.8,0,0,1,456.09,4.789Zm-25.055,0a4.787,4.787,0,1,1,4.781,4.784A4.8,4.8,0,0,1,431.035,4.789Zm-28.693,0A4.771,4.771,0,1,1,407.1,9.573,4.779,4.779,0,0,1,402.342,4.789Zm-28.744,0a4.787,4.787,0,1,1,4.785,4.784A4.8,4.8,0,0,1,373.6,4.789Zm-28.721,0a4.784,4.784,0,1,1,4.793,4.784A4.8,4.8,0,0,1,344.877,4.789Zm-28.721,0a4.8,4.8,0,1,1,4.789,4.784A4.8,4.8,0,0,1,316.156,4.789Zm-28.717,0a4.784,4.784,0,1,1,4.811,4.784A4.809,4.809,0,0,1,287.439,4.789Zm-28.7,0a4.775,4.775,0,1,1,4.762,4.784A4.779,4.779,0,0,1,258.744,4.789ZM230,4.789a4.787,4.787,0,1,1,4.785,4.784A4.805,4.805,0,0,1,230,4.789Zm-28.961,0a4.785,4.785,0,1,1,4.775,4.784A4.8,4.8,0,0,1,201.039,4.789Zm-28.7,0A4.772,4.772,0,1,1,177.1,9.573,4.78,4.78,0,0,1,172.34,4.789Zm-28.742,0a4.786,4.786,0,1,1,4.783,4.784A4.8,4.8,0,0,1,143.6,4.789Zm-28.723,0a4.787,4.787,0,1,1,4.795,4.784A4.8,4.8,0,0,1,114.875,4.789Zm-28.721,0a4.8,4.8,0,1,1,4.789,4.784A4.8,4.8,0,0,1,86.154,4.789Zm-28.717,0A4.787,4.787,0,1,1,62.25,9.573,4.81,4.81,0,0,1,57.438,4.789Zm-28.693,0a4.775,4.775,0,1,1,4.762,4.784A4.779,4.779,0,0,1,28.744,4.789ZM0,4.789A4.787,4.787,0,1,1,4.785,9.573,4.8,4.8,0,0,1,0,4.789Z" transform="translate(0.5 0.5)" stroke="rgba(0,0,0,0)" stroke-miterlimit="10" stroke-width="1" fill="url(#linear-gradient)"/>
      </svg>
      <svg class="tab-right-img" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="404px" height="126px" viewBox="0 0 404 126" enable-background="new 0 0 404 126" xml:space="preserve">
         <image id="image0" width="404" height="126" x="0" y="0"
            href="data:image/png;base64,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" />
      </svg>
      <svg class="mb-right-img" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="172px" height="58px" viewBox="0 0 172 58" enable-background="new 0 0 172 58" xml:space="preserve">
         <image id="image0" width="172" height="58" x="0" y="0"
            href="data:image/png;base64,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
            KzAzOjAwPAMudwAAAABJRU5ErkJggg==" />
      </svg>
      <div class="regular-container position-relative">
        
         <div class="col-lg-12 col-md-12 col-12 text-center">
         
            <h2 class="h2-heading top-80">FAQ</h2>
			
         </div>
         <div class="Faq-small">
            <div class="umlist">
              <?php   faqs(); ?>                
            </div>
         </div>
         
      </div>
   </div>
   <div class="faq-second">
   </div>
   </div>
</section>
<?php }  ?>
<?php  } ?>  


<?php get_footer();?>