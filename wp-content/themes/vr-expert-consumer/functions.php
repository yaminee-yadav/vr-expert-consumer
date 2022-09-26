<?php
// Add filter to specific menu
add_filter('wp_nav_menu_args', 'add_filter_to_menus');
function add_filter_to_menus($args) {

    // You can test agasint things like $args['menu'], $args['menu_id'] or $args['theme_location']
    if( $args['theme_location'] == 'acf-options-header') {
        add_filter( 'wp_setup_nav_menu_item', 'head_set_icons' );
    }

   return $args;
}
add_action('wp_enqueue_scripts', 'vr_expert_enqueue_styles');
add_filter('woocommerce_twenty_twenty_one_styles', '__return_false');
function vr_expert_enqueue_styles()
{
    /* CSS */
    wp_enqueue_style('vrexpert_owlcarousel_css', get_stylesheet_directory_uri() . '/css/owl.carousel.min.css', array() , '1.0');
    wp_enqueue_style('vrexpert_customstyle_css', get_stylesheet_directory_uri() . '/css/customstyle.css', array() , '1.0');
    if(!is_front_page()){
    wp_enqueue_style('vrexpert_single_page_css', get_stylesheet_directory_uri() . '/css/single-page-style.css', array() , '1.0');
    }
    wp_enqueue_script('vrexpert_owl_carousel_js', get_stylesheet_directory_uri() . '/js/owl.carousel.min.js', array(
        'jquery'
    ) , '1.1', false);

    if(is_front_page()){
        wp_dequeue_style('vrexpert_otherspage_css');
      
        }
    if(is_product()){
    wp_enqueue_script('vrexpert_magnificpopup_js', get_stylesheet_directory_uri() . '/js/magnific-popup.js', array(
        'jquery'
    ) , '1.1', false);
    wp_dequeue_style('vrexpert_otherspage_css');
    }
    
    if(is_checkout()){
    wp_enqueue_script('vrexpert_vaidation_js', get_stylesheet_directory_uri() . '/js/jquery.validate.min.js', array(
        'jquery'
    ) , '1.1', false);
    wp_dequeue_style('vrexpert_otherspage_css');
      
    }
    wp_enqueue_script('vrexpert_custom_js', get_stylesheet_directory_uri() . '/js/customjs.js', array('jquery'), time(), true);
    wp_localize_script( 'vrexpert_custom_js', 'wordpressErrorMessage',
        array(
            'ajaxurl' => admin_url( 'admin-ajax.php' ),
            'nameError' => get_field('please_enter_name_required','option'),
            'minlengthError' => get_field('firstname_minimum_character_message','option'),
            'lastnameError' => get_field('lastname_is_required','option'),
            'emailError' => get_field('email_required_mesaage','option'),
            'validEmail' => get_field('valid_email_message','option'),
            'phoneError' => get_field('telephone_number_is_required','option'),
            'addressrequired' => get_field('address_required_message','option'),
            'postcodeRequired' => get_field('postcode_required_message','option'),
            'cityRequired' => get_field('city_required_message','option'),
            'shippingAddress' => get_field('shipment_address_required_message','option'),
            'shippingCity'=>  get_field('invoice_city_required_message','option'),
            'shippingFirstname' => get_field('shipping_contact_person_required_message','option'),
            'shipmentPhoneError' => get_field('shipment_phone_number_error','option'),
        )
    );

    $classes = get_body_class(); 
    if(in_array('page-template-template-privacypolicy',$classes)){
    }
}

function register_my_menus()
{
    register_nav_menus(array(
        'main-menu' => __('Main Menu') ,
        'mobile-menu' => __('Mobile Menu') ,
        'footer-menu-col-1' => __('Footer Menu 	col-1') ,
        'footer-menu-col-2' => __('Footer Menu 	col-2') ,
        'footer-menu-col-3' => __('Footer Menu 	col-3') ,
        'footer-menu-col-4' => __('Footer Menu 	col-4') ,

    ));
}
add_action('init', 'register_my_menus');
add_theme_support('post-thumbnails');

$ddd = '<img src=" ' . get_stylesheet_directory_uri() . '/img/home.svg" class="" alt="slx">';
function get_breadcrumb()
{
    $posttype = get_post_type();
    $postPermalink = get_post_type_archive_link($posttype);
    echo '<a class="Cstmhome" href="' . home_url() . '" rel="nofollow">' . $ddd = '<img src=" ' . get_stylesheet_directory_uri() . '/img/home.svg" class="" alt="slx">' . '</a>';
    if (is_category() || is_single())
    {
        the_category(' &bull; ');
        if (is_product())
        {
            echo '<span class="CstmSlash">';
            echo "/";
            echo '</span>';
            echo '<em>';
            the_title();
            echo '</em>';
        }
        elseif (is_single()){
            
            echo '<a class="CstmCatname" href="'. $postPermalink.'">';
            echo "/&nbsp";
            echo get_post_type();
            echo '</a>';
            echo '<span class="CstmSname">';
            echo "/&nbsp";
            the_title();
            echo '</span>';
        }
    }
    elseif (is_page())
    {
        echo '<span class="CstmSlash">';
        echo "/&nbsp";
        echo '</span>';
        echo the_title(); 
    }
    elseif (is_search())
    {
        echo "/";
        echo '"<em>';
        echo the_search_query();
        echo '</em>"';
    }
    else if (is_archive())
    {
        $term = get_queried_object(); 
        echo "/&nbsp";
        echo $term->name;
    }
       
}


add_action('init', 'faqs_post_type');
function faqs_post_type()
{
    $labels = array(
        'name' => 'Faqs',
        'singular_name' => 'Faqs',
        'menu_name' => 'Faqs',
        'slug_name' => 'Faq',
        'all_items' => 'All Faqs',
        'view_item' => 'View Faq',
        'add_new_item' => 'Add New Faq',
        'add_new' => 'Add New Faq',
        'edit_item' => 'Edit Faq',
        'update_item' => 'Update Faq',
        'search_items' => 'Search Faq',
        'not_found' => 'Faq Not found',
        'not_found_in_trash' => 'Faq Not found in Trash'
    );
    $args = array(
        'label' => 'Faqs',
        'labels' => $labels,
        'supports' => array(
            'title',
            'editor',
            'thumbnail',
            'comments'
        ) ,
        'hierarchical' => true,
        'public' => true,
        'show_in_rest   ' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => false,
        'show_in_admin_bar' => false,
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'post',
        'rewrite' => ["slug" => "faqs",
        "with_front" => false]
    );
    register_post_type('faqs', $args);
    $tax_labels = array(
        'name' => _x('Faq_Category', 'taxonomy general name') ,
        'singular_name' => _x('Faq_Category', 'taxonomy singular name') ,
        'search_items' => __('Search Categories') ,
        'all_items' => __('All Categories') ,
        'parent_item' => __('Parent Category') ,
        'parent_item_colon' => __('Parent Category:') ,
        'edit_item' => __('Edit Category') ,
        'update_item' => __('Update Category') ,
        'add_new_item' => __('Add New Category') ,
        'new_item_name' => __('New Category') ,
        'menu_name' => __('Faq_Category') ,
    );
    register_taxonomy('faq_category', array(
        'faqs'
    ) , array(
        'hierarchical' => true,
        'labels' => $tax_labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array(
            'slug' => 'faq_category',
            "with_front" => false
        ) ,
    ));

}

if (function_exists('acf_add_options_page'))
{
    acf_add_options_page(array(
        'page_title' => 'Theme General Settings',
        'menu_title' => 'Theme Settings',
        'menu_slug' => 'theme-general-settings',
        'capability' => 'edit_posts',
       // 'redirect' => false
    ));
}
if (function_exists('acf_add_options_sub_page'))
{
    acf_add_options_sub_page(array(
        'page_title' => 'Theme Header Settings',
        'menu_title' => 'Header',
        'parent_slug' => 'theme-general-settings',
    ));
    acf_add_options_sub_page(array(
        'page_title' => 'Theme Footer Settings',
        'menu_title' => 'Footer',
        'parent_slug' => 'theme-general-settings',
    ));
    acf_add_options_sub_page(array(
        'page_title' => 'Theme Single Product  Settings',
        'menu_title' => 'Single Product',
        'parent_slug' => 'theme-general-settings',
    ));
    acf_add_options_sub_page(array(
        'page_title' => 'Theme Checkout Page  Settings',
        'menu_title' => 'Checkout Page', 
        'parent_slug' => 'theme-general-settings',
    ));
    acf_add_options_sub_page(array(
        'page_title' => 'Theme Cart Page  Settings',
        'menu_title' => 'Cart Page', 
        'parent_slug' => 'theme-general-settings',
    ));
    acf_add_options_sub_page(array(
        'page_title' => 'Theme Thankyou Page  Settings',
        'menu_title' => 'Thankyou Page', 
        'parent_slug' => 'theme-general-settings',
    ));
    acf_add_options_sub_page(array(
        'page_title' => 'Theme Language  Settings',
        'menu_title' => 'Language Setting', 
        'parent_slug' => 'theme-general-settings',
    ));
    acf_add_options_sub_page(array(
        'page_title' => 'Theme  Email Editor For Track & Trace Mail',
        'menu_title' => ' Track & Trace Mail Editor', 
        'parent_slug' => 'theme-general-settings',
    ));
    acf_add_options_sub_page(array(
        'page_title' => 'Theme  Map Address',
        'menu_title' => ' Map Address Editor', 
        'parent_slug' => 'theme-general-settings',
    ));
    
}

function project_dequeue_unnecessary_styles()
{
    wp_dequeue_style('twenty-twenty-one-style');
    wp_deregister_style('twenty-twenty-one-style');
}
add_action('wp_print_styles', 'project_dequeue_unnecessary_styles');
add_action('widgets_init', 'vr_expert_widgets_init');
function vr_expert_widgets_init()
{
    // First footer widget area, located in the footer. Empty by default.
    register_sidebar(array(
        'name' => __('First Footer Widget Area', 'vr-expert') ,
        'id' => 'first-footer-widget-area',
        'description' => __('The first footer widget area', 'vr-expert') ,
        'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));
    // Second Footer Widget Area, located in the footer. Empty by default.
    register_sidebar(array(
        'name' => __('Second Footer Widget Area', 'vr-expert') ,
        'id' => 'second-footer-widget-area',
        'description' => __('The second footer widget area', 'vr-expert') ,
        'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));
    // Third Footer Widget Area, located in the footer. Empty by default.
    register_sidebar(array(
        'name' => __('Third Footer Widget Area', 'vr-expert') ,
        'id' => 'third-footer-widget-area',
        'description' => __('The third footer widget area', 'vr-expert') ,
        'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));
    // Fourth Footer Widget Area, located in the footer. Empty by default.
    register_sidebar(array(
        'name' => __('Fourth Footer Widget Area', 'vr-expert') ,
        'id' => 'fourth-footer-widget-area',
        'description' => __('The fourth footer widget area', 'vr-expert') ,
        'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));
    // Fifth Footer Widget Area, located in the footer. Empty by default.
    register_sidebar(array(
        'name' => __('Fifth Footer Widget Area', 'vr-expert') ,
        'id' => 'fifth-footer-widget-area',
        'description' => __('The fifth footer widget area', 'vr-expert') ,
        'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));
    // Last Footer Widget Area, located in the footer. Empty by default.
    register_sidebar(array(
        'name' => __('Last Footer Widget Area', 'vr-expert') ,
        'id' => 'last-footer-widget-area',
        'description' => __('The last footer widget area', 'vr-expert') ,
        'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));
}


/* create the function for the display s from vimeo account*/

function set_log($log_string)
{
    $today = date("h:i:sa");
    $upload_dir = wp_upload_dir();
    $folder = $upload_dir['basedir'] . '/logs/';
    if (!is_dir($folder))
    {
        mkdir($folder, 0755);
    }
    $filename = $upload_dir['basedir'] . '/logs/' . $today . '.txt';
    $mnth_log = fopen($filename, 'a');
    if ($mnth_log)
    {
        fwrite($mnth_log, json_encode($log_string) . "\n\n");
    }
    fclose($mnth_log);
}
add_action('wp_ajax_check_product_availability', 'check_product_availability');
add_action('wp_ajax_nopriv_check_product_availability', 'check_product_availability');
function check_product_availability()
{
    global $woocommerce, $post, $product, $wpdb, $cart_item_date;
	$quantity_p = '';
  
    $qty = $_POST['qty'];
   
    $product_id = $_POST['current_single_product_id'];
    $simple_accessories_id = $_POST['simple_accessories_id'];
  
     $product_cart_id = WC()->cart->generate_cart_id($product_id);
     $res = array();
     $dataExist = true;
     foreach( WC()->cart->get_cart() as $key=>$item){
         if($item['product_id']== $product_id){
             $dataExist = false;  
            break;       
         }
        }

     if ($dataExist == true)
 {
        WC() ->cart ->add_to_cart($product_id);
       if($simple_accessories_id !==''){
        foreach($simple_accessories_id as $simple_accessories){
                        WC() ->cart ->add_to_cart($simple_accessories);
                    }

        }
        $res['url'] = get_site_url();
        $res['message'] = "Product add into cart.";
        $res['status'] = 'success';
        echo json_encode($res);
        exit;

     }else if($dataExist == false){
        $added_msg = get_field('product_already_added_msg','option');
        $res['url'] = get_site_url();
        $res['message'] = $added_msg;
        $res['status'] = 'error';
        echo json_encode($res);
        exit;
     }else{
        $res['url'] = get_site_url();
        $res['message'] = "Something Wrong.";
        $res['status'] = 'error';
        echo json_encode($res);
        exit;
     }
    exit;
       
     

}

/**
 *Remove all possible fields
 *
 */
function wc_remove_checkout_fields($fields)
{
    unset($fields['billing']['billing_state']);

    unset($fields['shipping']['shipping_company']);
    unset($fields['shipping']['shipping_state']);

    return $fields;
}
add_filter('woocommerce_checkout_fields', 'wc_remove_checkout_fields');

remove_action('woocommerce_cart_collaterals', 'woocommerce_cross_sell_display');
// Remove shipping phone (optional)
add_filter('woocommerce_shipping_fields', 'remove_shipping_phone_field', 20, 1);
function remove_shipping_phone_field($fields)
{
    $fields['shipping_phone']['label'] = 'Shipping Phone';
    $fields['shipping_phone']['required'] = false; // To be sure "NOT required"
    $fields['shipping_phone']['priority'] = 32;
    return $fields;
}

// _x() Retrieve translated string with gettext context.
//  __() Retrieve the translation of $text.
function aditya_customfield($fields)
{
    $fields['billing']['billing_first_name']['required'] = true;
    $fields['billing']['billing_last_name']['required'] = true;
    $fields['billing']['billing_postcode']['required'] = true;
    $fields['billing']['billing_email']['priority'] = 22;
    $fields['billing']['billing_phone']['priority'] = 24;
    $fields['billing']['billing_address_1']['priority'] = 32;
    $fields['billing']['billing_city']['priority'] = 34;
    $fields['billing']['billing_postcode']['priority'] = 34;
    $fields['shipping']['shipping_first_name']['required']= true;
    $fields['shipping']['shipping_last_name']['required']= true;
    $fields['shipping']['shipping_address_1']['required'] = true;
    $fields['shipping']['shipping_address_1']['priority'] = 20;
    $fields['shipping']['shipping_city']['priority'] = 30;
    $fields['shipping_postcode']['required'] = true;
    $fields['shipping']['shipping_postcode']['priority'] = 34;
    $fields['shipping']['shipping_country']['required'] = true;
    $fields['shipping']['shipping_country']['priority'] = 35;
   
    return $fields;
}
add_filter('woocommerce_shipping_fields', 'misha_remove_fields');



// add_filter('woocommerce_checkout_fields', 'aditya_customfield');
// function address_customfield($fields){
//     $fields['billing_postcode']['label'] = 'Postcode';
//     $fields['billing_postcode']['required'] = true;
//     return $fields;
//  }

// add_filter( 'woocommerce_default_address_fields' , 'address_customfield' );


//Action hook fired after an order is created used to add custom meta to the order.
add_action('woocommerce_checkout_update_order_meta', 'my_custom_checkout_field_update_order_meta');
function my_custom_checkout_field_update_order_meta($order_id)
{
    if (!empty($_POST['custom_field_new']))
    {
        update_post_meta($order_id, 'custom_field_new', sanitize_text_field($_POST['custom_field_new']));
    }
}
//update_post_meta:-Updates a post meta field based on the given post ID.

/**
 * Display field value on the order edit page
 */
add_action('woocommerce_admin_order_data_after_billing_address', 'my_custom_checkout_field_display_admin_order_meta', 10, 1);
function my_custom_checkout_field_display_admin_order_meta($order)
{
    echo '<p><strong>' . __('Custom Field') . ':</strong> <br/>' . get_post_meta($order->get_id() , 'custom_field_new', true) . '</p>';
}
//Retrieves a post meta field for the given post ID.
add_action('woocommerce_thankyou', 'aditya_thankyou', 20);
function aditya_thankyou($order_id)
{ ?>
<p><?php echo get_post_meta($order_id, 'custom_field_new', true); ?></p>
<?php
}


add_filter('woocommerce_checkout_fields', 'misha_no_email_validation');

function misha_no_email_validation($fields)
{

    unset($fields['billing']['billing_email']['validate']);
    return $fields;

}
add_action('wp_ajax_popup_html', 'popup_html');
add_action('wp_ajax_nopriv_popup_html', 'popup_html');

function popup_html()
{       
           $id = $_POST['single_product_id']; 

			
    $array = array(
        'id' => $id
		
    );
    get_template_part('template', 'popup-model', $array);
    exit;
}

add_action('wp_ajax_update_quantity', 'update_quantity');
add_action('wp_ajax_nopriv_update_quantity', 'update_quantity');
function update_quantity()
{
    $product_id_new = $_POST['get_product_id_in_mini_cart'];
    $qty = $_POST['currentVal'];
    foreach (WC()
        ->cart
        ->get_cart() as $cart_item_key => $cart_item)
    {
       
        $product_id = $cart_item['product_id'];
       $product_data = $cart_item['data'];
        $product_id_key = $cart_item['product_id'];
        $quantity = $cart_item['quantity'];
		
        $price = WC()
            ->cart
            ->get_product_price($product_data);
        $subtotal = WC()
            ->cart
            ->get_product_subtotal($product_data, $cart_item['quantity']);
        $res = array();
        if ($cart_item_key == $_POST['item_key'])
        {
            WC()
                ->cart
                ->set_quantity($cart_item_key, $qty);
				break;
        }



    }
	$res['redirect'] = get_site_url();
    $res['message'] = "Product updated into cart.";
	 $res['class'] = "p-add-max";
	$res['cartTotal'] = WC()->cart->total;
	$res['priceProduct'] = $priceData;
    $res['status'] = 200;

    get_template_part('template', 'mini-cart', array());
    exit;
}

add_action('wp_ajax_add_to_cart_simple_product', 'add_to_cart_simple_product');
add_action('wp_ajax_nopriv_add_to_cart_simple_product', 'add_to_cart_simple_product');
function add_to_cart_simple_product()
{

    $product_id = $_POST['product_id_simple'];
    $Qty = $_POST['qty'];
    $product_cart_id = WC()
        ->cart
        ->generate_cart_id($product_id);
    if (!WC()
        ->cart
        ->find_product_in_cart($product_id))
    {

        WC()
            ->cart
            ->add_to_cart($product_id, $Qty);
        $res = array();

        $res['url'] = get_site_url();
        $res['message'] = "Product add into cart.";
        $res['status'] = 200;
        echo json_encode($res);
        exit;
    }
    else if (WC()
        ->cart
        ->find_product_in_cart($product_id))
    {

        // Loop over $cart items
        foreach (WC()
            ->cart
            ->get_cart() as $cart_item_key => $cart_item)
        {
          
            $product_id_key = $cart_item['product_id'];
            
            if ($product_id_key == $product_id)
            {
                $res['url'] = get_site_url();
                $res['message'] = "Product already added into cart.";
                $res['status'] = 200;
               echo json_encode($res);
            }
           
        }
      

    }
    else
    {
        $res['message'] = "Some thing went wrong!";
    }
    exit;
}

add_action('wp_ajax_del_item_from_minicart', 'del_item_from_minicart');
add_action('wp_ajax_nopriv_del_item_from_minicart', 'del_item_from_minicart');
function del_item_from_minicart()
{
    global $woocommerce;
    $res = array();
    $product_id1 = $_POST['mini_remove_item'];
  
           $query = WC()->cart->remove_cart_item($product_id1);
         
           $res = array();
           if ($query)
           {
               
               $res['url'] = get_the_permalink();
               $res['message'] = "Product Deleted.";
               $res['status'] = 200;
              
           }
           else
           {
               $res['message'] = "Some thing went wrong!";
           }
           echo json_encode($res);
         

		exit;
    //}
}
add_action('wp_ajax_update_quantity_single_product', 'update_quantity_single_product');
add_action('wp_ajax_nopriv_update_quantity_single_product', 'update_quantity_single_product');
function update_quantity_single_product(){
    $product_id_new = $_POST['get_product_id_in_mini_cart'];
    $qty = $_POST['currentVal'];
    foreach (WC()
        ->cart
        ->get_cart() as $cart_item_key => $cart_item){
        $product_id = $cart_item['product_id'];
        $product_data = $cart_item['data'];
        $product_id_key = $cart_item['product_id'];
        $quantity = $cart_item['quantity'];
        $price = WC()
            ->cart
            ->get_product_price($product_data);
        $subtotal = WC()
            ->cart
            ->get_product_subtotal($product_data, $cart_item['quantity']);
        $res = array();
        if ($cart_item_key == $_POST['item_key'])
        {
            WC()
                ->cart
                ->set_quantity($cart_item_key, $qty);
			$priceData = $cart_item['data']->get_price();
				break;
        }

    }
    $res['url'] = get_site_url();
    $res['redirect'] = wc_get_cart_url();
    $res['message'] = "Product updated into cart.";
	$res['cartTotal'] = WC()->cart->total;
	$res['cartsubTotal'] = WC()->cart->get_subtotal();
	$res['priceProduct'] = $priceData * $qty;
    $res['status'] = 200;
    echo json_encode($res);
    exit;
}


   //pagination code
   function vr_pagination($query = null){
    global $wp_query;
    $query = $query ? $query : $wp_query;
    $big = 999999999999999;
    $pagenum_link = html_entity_decode( get_pagenum_link() );
    $url_parts    = explode( '?', $pagenum_link );
    $query_products_count= $query->found_posts; 
    $pagenum_link = trailingslashit( $url_parts[0] ) . '%_%';
    $paginate = paginate_links(array(
        'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
        'type' => 'array',
        'total' => $query->max_num_pages,
        'format' => '?paged/%#%',
        'current' => max(1, get_query_var('paged')) ,
        'next' => true,
        'prev' => true,
        'prev_text' => ('<'),
        'next_text' =>('>'),
        'mid_size' => 2,
    ));
    if ($query->max_num_pages > 1){
          
        echo '<ul class="pagination-2 text-right">';
                 foreach ($paginate as $page){
                 echo '<li class="page-number">' . $page . '</li>';
                 }       
        echo '</ul>';  
     } 
}
//pagination code
function html_cut($text, $max_length) {
    $tags = array();
    $result = "";
    $is_open = false;
    $grab_open = false;
    $is_close = false;
    $in_double_quotes = false;
    $in_single_quotes = false;
    $tag = "";
    $i = 0;
    $stripped = 0;
    $stripped_text = strip_tags($text);
    while ($i < strlen($text) && $stripped < strlen($stripped_text) && $stripped < $max_length) {
        $symbol = $text{$i};
        $result .= $symbol;
        switch ($symbol) {
            case '<':
                $is_open = true;
                $grab_open = true;
                break;
            case '"':
                if ($in_double_quotes)
                    $in_double_quotes = false;
                else
                    $in_double_quotes = true;
                break;
            case "'":
                if ($in_single_quotes)
                    $in_single_quotes = false;
                else
                    $in_single_quotes = true;
                break;
            case '/':
                if ($is_open && !$in_double_quotes && !$in_single_quotes) {
                    $is_close = true;
                    $is_open = false;
                    $grab_open = false;
                }
                break;
            case ' ':
                if ($is_open)
                    $grab_open = false;
                else
                    $stripped++;
                break;
            case '>':
                if ($is_open) {
                    $is_open = false;
                    $grab_open = false;
                    array_push($tags, $tag);
                    $tag = "";
                } else if ($is_close) {
                    $is_close = false;
                    array_pop($tags);
                    $tag = "";
                }
                break;
            default:
                if ($grab_open || $is_close)
                    $tag .= $symbol;
                if (!$is_open && !$is_close)
                    $stripped++;
        }
        $i++;
    }
    while ($tags)
        $result .= "</" . array_pop($tags) . ">";
    return $result;
}

add_filter( 'woocommerce_default_address_fields' , 'njengah_disable_postcode_validation' );
 
function njengah_disable_postcode_validation( $address_fields ) {
  $address_fields['billing_postcode']['required'] = false;
  return $address_fields;
}

include 'custom-functions.php'; 

//Admin custom css
add_action('admin_head', 'my_custom_css');
function my_custom_css() {
  echo '<style>
  .select2-container {
    z-index: 1;
 } </style>';
}

function faqs($id = ''){
    if($id){
        echo '<div class="w-x wxvr left-faq">';
        if(get_field('faqs_left_repeater1','product_cat_'.$id) ):
        $i=0;
       while( the_repeater_field('faqs_left_repeater1','product_cat_'.$id)):
       echo '<h2 class="Topic-Faq medium-txt">'. the_sub_field('faqs_left_heading1','product_cat_'.$id).'</h2>';
        echo '<ul class="faqs faq-first">';
           if( get_sub_field('faqs_left_quesans1','product_cat_'.$id) ){
                $faq_id = get_sub_field('faqs_left_quesans1','product_cat_'.$id);
                foreach($faq_id as $faqs_ids ){

           echo '<li class="faq">'; ?>
              <h2 class="faq_question to-bottom regular-txt  <?php if($i==0){ echo "active";
                 } $i++; ?>"> <?php echo get_the_title($faqs_ids); ?></h2>
              <div class="faq_answer regular-txt"><?php echo get_the_excerpt($faqs_ids); ?></div>
              <?php  echo '</li>';
                  }
                  }
          echo '</ul>' ; ?>
        <?php endwhile; ?>
        <?php endif;
     echo '</div>' ;
     echo '<div class="w-x wxvr right-faq">';
        if(get_field('faqs_right_repeater1','product_cat_'.$id) ):
        while( the_repeater_field('faqs_right_repeater1','product_cat_'.$id)):?>
        <h2 class="Topic-Faq medium-txt"><?php the_sub_field('faqs_right_heading1','product_cat_'.$id); ?></h2>
       <?php echo '<ul class="faqs faq-first">';
          if( get_sub_field('faqs_right_quesans1','product_cat_'.$id) ){
                $faq_id1 = get_sub_field('faqs_right_quesans1','product_cat_'.$id);
                foreach($faq_id1 as $faqs_ids1 ){ ?>
            <?php echo '<li class="faq">' ; ?>
              <h2 class="faq_question to-bottom regular-txt "><?php echo get_the_title($faqs_ids1); ?></h2>
              <div class="faq_answer regular-txt"><?php  echo get_the_excerpt($faqs_ids1); ?></div>
              <?php echo '</li>';
            }
          }
        echo '</ul>'; ?>
        <?php  endwhile; ?>
        <?php endif;
    echo '</div>';
    }else{
        echo '<div class="w-x wxvr left-faq">';
        if(get_field('faqs_left_repeater1') ):
        $i=0;
       while( the_repeater_field('faqs_left_repeater1')):
       echo '<h2 class="Topic-Faq medium-txt">'. the_sub_field('faqs_left_heading1').'</h2>';
        echo '<ul class="faqs faq-first">';
           if( get_sub_field('faqs_left_quesans1') ){
                $faq_id = get_sub_field('faqs_left_quesans1');
                foreach($faq_id as $faqs_ids ){
                    
           echo '<li class="faq">'; ?>
              <h2 class="faq_question to-bottom regular-txt  <?php if($i==0){ echo "active";
                 } $i++; ?>"> <?php echo get_the_title($faqs_ids); ?></h2>
              <div class="faq_answer regular-txt"><?php $content =  get_the_excerpt($faqs_ids); 
              echo mb_strimwidth($content, 0, 300, "...");
              ?></div>
              <?php  echo '</li>';
                  }
                  }
          echo '</ul>' ; ?>
        <?php endwhile; ?>
        <?php endif;
     echo '</div>' ;
     echo '<div class="w-x wxvr right-faq">';
        if(get_field('faqs_right_repeater1') ):
        while( the_repeater_field('faqs_right_repeater1')):?>
        <h2 class="Topic-Faq medium-txt"><?php the_sub_field('faqs_right_heading1'); ?></h2>
       <?php echo '<ul class="faqs faq-first">';
          if( get_sub_field('faqs_right_quesans1') ){
                $faq_id1 = get_sub_field('faqs_right_quesans1');
                foreach($faq_id1 as $faqs_ids1 ){ ?>
            <?php echo '<li class="faq">' ; ?>
              <h2 class="faq_question to-bottom regular-txt "><?php echo get_the_title($faqs_ids1); ?></h2>
              <div class="faq_answer regular-txt"><?php echo get_the_excerpt($faqs_ids1); ?></div>
              <?php echo '</li>';
            }
          }
        echo '</ul>'; ?>
        <?php  endwhile; ?>
        <?php endif;
    echo '</div>';
    }
  
                }          
                add_filter('woocommerce_cart_item_removed_notice_type', '__return_null');
                


              add_filter( 'woocommerce_registration_error_email_exists', function ( $message ) {

                return preg_replace( '/href="#" class="showlogin"/', sprintf( 'href="%s"',site_url() . '/my-account/' ), $message );
            
            } );

                add_filter('woocommerce_get_price_html', 'edit_price_display_new', 10, 2);
                function edit_price_display_new($price, $product){
                       $currency = get_woocommerce_currency();
                       $price_cstm = wc_get_price_to_display($product); // get the price without extra span tags
                        $with_tax = $product->get_price_including_tax();
                       $without_tax = $product->get_price_excluding_tax();
                       if($with_tax && $without_tax){
                        $tax_amount = $with_tax - $without_tax;
                        }
                        else{
                         $tax_amount=0;
                        }
                        if($tax_amount && $without_tax){
                         $percent = ($tax_amount / $without_tax) * 100;
                        }else{
                         $percent=0;  
                        }
                      $tax_percent =  round($percent,1);
                      $tax = new WC_Tax();
                      if(WC()->customer){
                     $country_code = WC()->customer->get_shipping_country();
                      }
                      $rates = $tax->find_rates( array( 'country' => $country_code ) );
                       $tax_rate_name = '';
                       $tax_rate_per = '';
                       foreach( $rates as $rate ){
                       
                           $tax_rate_name = $rate['label'];
                           $tax_rate_per = $rate['rate'];
                       }
                      if($price_cstm > 0){
                            $price .= '<div class="CV-text"> incl. '. $tax_percent.'%  ' .$tax_rate_name.  '</div>' ;  
                        }
                    return $price;
                }

         function woocommerce_button_proceed_to_checkout() { ?>
            <a href="<?php echo esc_url( wc_get_checkout_url() ); ?>" class="checkout-button button alt wc-forward">
            <?php esc_html_e( the_field('buy_now_button_text','option'), 'woocommerce' ); ?>
            </a>
            <?php
           }  
       
  function hide_shipping_when_free_is_available( $rates, $package ) {
	$new_rates = array();
	foreach ( $rates as $rate_id => $rate ) {
		// Only modify rates if free_shipping is present.
		if ( 'free_shipping' === $rate->method_id || 'activeants_dhl_free_shipping' === $rate->method_id ) {
			$new_rates[ $rate_id ] = $rate;
			continue;
		}
	}

	if ( ! empty( $new_rates ) ) {
		//Save local pickup if it's present.
		foreach ( $rates as $rate_id => $rate ) {
			if ('local_pickup' === $rate->method_id ) {
				$new_rates[ $rate_id ] = $rate;
				break;
			}
		}
		return $new_rates;
	}

	return $rates;
}

add_filter( 'woocommerce_package_rates', 'hide_shipping_when_free_is_available', 10, 2 );

add_action( 'template_redirect', 'wpse_128636_redirect_post' );

function wpse_128636_redirect_post() {
  if ( is_singular( 'faqs' ) ) {
    wp_redirect(get_site_url().'/404.php');
    exit;
  }
}
add_filter( 'woocommerce_package_rates', 'bbloomer_unset_shipping_when_free_is_available_in_zone', 9999, 2 );
   
function bbloomer_unset_shipping_when_free_is_available_in_zone( $rates, $package ) {
   // Only unset rates if free_shipping is available
   if ( isset( $rates['free_shipping:8'] ) ) {
      unset( $rates['flat_rate:1'] );
   }     
   return $rates;
}
add_filter( 'wc_stripe_elements_options', 'wc_update_locale_in_stripe_element_options' );
function wc_update_locale_in_stripe_element_options( $options ) {
    return array_merge(
        $options,
        array(
            'locale' =>  get_locale(),
        )
    );
};
add_filter( 'woocommerce_adjust_non_base_location_prices', '__return_false' );
     


add_filter('woocommerce_new_order_note_data', function ($args) 
{
  
   $pattern = "/Track&amp;Trace/i";
   $pattern_new = "/Track&Trace/i";
   
       
  //$args['comment_content'] == $args['comment_content'].'----';
   if(preg_match($pattern,$args['comment_content']) || preg_match($pattern_new ,$args['comment_content'])){
    $order_id =  $args['comment_post_ID'];
    global $woocommerce;
    $order =  new WC_Order( $order_id );
    //$content_data = Array();
    $content_data[]= $args['comment_content'];
   
    $temp_array = array_push($content_data,$args['comment_content']);
    $trackData = get_post_meta($order_id,'Track&TraceData',true);
    if($trackData){
        array_push($trackData,$args['comment_content']);
        update_post_meta($order_id,'Track&TraceData', $trackData);

    }else{
        $dataNew = array($args['comment_content']);
        add_post_meta($order_id,'Track&TraceData', $dataNew);
    }
    $customer_id = $order->get_customer_id(); // Or $order->get_user_id();
  
    // Get the WP_User Object instance
    $user = $order->get_user();
    $user_roles = $user->roles;
 
    $billing_email  = $order->get_billing_email();
   
 
        $recepients =  $billing_email ;
        if(get_field('subject_for_track_&_trace_mail','option')){
        $subject = get_field('subject_for_track_&_trace_mail','option');
        }
        if(get_field('track_&_trace_mail_editor','option')){
        $body_data = get_field('track_&_trace_mail_editor','option');
        }
        $billing_first_name = $order->get_billing_first_name();
        $billing_last_name  = $order->get_billing_last_name(); 
    $body_data = str_replace("{email_address}", $billing_email  ,$body_data ); 
    $track_url = $args['comment_content'];
    $track_url_text = get_field('track_&_trace_text','option'); 
    $body_data = str_replace("{track_trace_no}",$order_id,$body_data); 
    $body_data = str_replace("{first_name}",$billing_first_name ,$body_data ); 
    $body_data = str_replace("{last_name}",$billing_last_name ,$body_data ); 
    $body_datadummy = str_replace("Track&Trace",$track_url_text,$args['comment_content']);
    $body_data = str_replace("{track_order_url_text}",$body_datadummy ,$body_data ); 
   
    $body = ''. $body_data.'';
    
    $headers = array();
    $headers[] = 'Content-Type: text/html; charset=UTF-8';
wp_mail($recepients, $subject, $body, $headers); 
   }else{
   
   }
   return $args;
    
});

add_action('wp_ajax_update_checkout_details', 'update_checkout_details');
add_action('wp_ajax_nopriv_update_checkout_details', 'update_checkout_details');
function update_checkout_details(){
?>

<div class="vv-cart-total">

<div class="cart-collaterals vrc-total">

    <h2  class="cart-h2-head"><?php if(get_field('right_section_cart_heading','option')){ the_field('right_section_cart_heading','option'); } ?></h2>

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

                <span> <?php if(get_field('purchase','option')){ the_field('purchase','option'); } ?>  </span>

                

            </div>

            <!-- END Title -->

            <?php foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {			  
            
                $_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
            

                $product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

                ?>

            <div class="flx-rental-list">

                <div class="rental-products-normal light-text "> 
                    
                <span class="length-Pro">
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
                     </span>
                     <span class="cnx-lex">× &nbsp</span>

                    <span class="pw-qunty cust_<?php echo $product_id; ?>" data-key="<?php echo $cart_item_key; ?>"data-title="<?php esc_attr_e( 'Quantity', 'woocommerce' ); ?>"><?php

                        if ( $_product->is_sold_individually() ) {
                            $product_quantity= $cart_item['quantity']; 
                            echo $product_quantity;
                        } else {
                       
                             $product_quantity= $cart_item['quantity']; 
                             ?>

                              <span><?php
                          echo $product_quantity; ?></span>

                         <?php } 

                    ?></span>

                </div>

                <div class="products-normal-price light-text fng_<?php echo $product_id; ?>"><?php

                //	echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key ); // PHPCS: XSS ok.
                    echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key ); 
                    ?></div>

            </div>

            <!-- Loop item 	END -->

            <?php } 

                // ENd of foreachg - NON Booqable product loop ?>

            <!-- single date -->
        </div>

        <!-- Normal purchase -->

        <!-- booqable div  start -->



        <!-- div END booqable wrap -->

        <div class="bill-amt-start">

            <div class="hr-line mt-0"></div>

            <div class="alltotal-Bill">

                <div class="bill-wrap-1 ">
                
                    <div class="b-wrap-1 mid-14 "data-title="<?php esc_attr_e( 'Subtotal', 'woocommerce' ); ?>"><?php esc_attr_e( 'Subtotal', 'woocommerce' ); ?></div>

                    <div class="b-wrap-2 regular-txt Sub_Total_data">

                   <?php echo wc_price( WC()->cart->get_subtotal() ); 
                    
                   $tax = new WC_Tax();   
                   $country_code =WC()->customer->get_shipping_country();
                   $rates = $tax->find_rates( array( 'country' => $country_code ) );
                     foreach( $rates as $rate ){
                        $tax_rate_name = $rate['label'];
                     }
                     echo '<small class="tax_label cart-tax-suffix"> (excl. '.$tax_rate_name.')</small>';
                      ?> 

                    </div>

                </div>

                <div class="bill-wrap-1">

                    <div class="b-wrap-1 mid-14 "><?php esc_html_e( 'Shipping', 'woocommerce' ); ?></div>

                    <div class="b-wrap-2 all-total"><?php  
                                        global $woocommerce;
                                        $cart_subtotal = $woocommerce->cart->subtotal;
                                        $current_shipping_method_cost = $woocommerce->cart->get_shipping_total();
                                                        
                    if($current_shipping_method_cost =='0'){
                        echo get_field('free_shipping','option'); 
                    }else{ ?><span class="woocommerce-Price-currencySymbol"> €</span>&nbsp<?php
                         echo $current_shipping_method_cost;
                    } ?><span class="price-comma"></span></div>

                    </div>

              
                  <div class="bill-wrap-1">

                  <?php 
                    $product = wc_get_product( $product_id );
                    $price_cstm = wc_get_price_to_display($product); // get the price without extra span tags
                    $with_tax = $product->get_price_including_tax();
                    $without_tax = $product->get_price_excluding_tax();
                    $tax_amount = $with_tax - $without_tax;
                    $percent = ($tax_amount / $without_tax) * 100;
                    $tax_percent =  round($percent,1); 
                           $tax = new WC_Tax();
              
              $country_code =WC()->customer->get_shipping_country();
              //echo  $country_code;
              $rates = $tax->find_rates( array( 'country' => $country_code ) );
                foreach( $rates as $rate ){
                  $tax_rate_name = $rate['label'];
                }?>
              
                <div class="b-wrap-1 mid-14"><?php echo  $tax_rate_name; ?> <?php   echo  $tax_percent.'%'; ?>
                                
                        </div>
                        
                    <div class="b-wrap-2 regular-txt">

                    <?php wc_cart_totals_taxes_total_html(); ?>

                    </div>

                  </div>
                

                <div class="hr-line"></div>
               

                <div class="bill-wrap-1">

                    <div class="b-wrap-1 mid-14 "><?php esc_html_e( 'Total', 'woocommerce' ); ?></div>

                    <div class="b-wrap-2 all-total"><?php wc_cart_totals_order_total_html(); ?><span class="price-comma"></span></div>

                </div>

            </div>

        </div>

        <!-- div bill amount end -->

    </div>

</div>

</div>


<?php
exit;
}
function ace_hide_shipping_title( $label ) {
	$pos = strpos( $label, ': ' );
	return substr( $label, ++$pos );
}
add_filter( 'woocommerce_cart_shipping_method_full_label', 'ace_hide_shipping_title' );
add_filter( 'woocommerce_order_shipping_to_display_shipped_via', '__return_false' );

function golden_oak_web_design_woocommerce_checkout_terms_and_conditions() {
    remove_action( 'woocommerce_checkout_terms_and_conditions', 'wc_terms_and_conditions_page_content', 30 );
  }
  add_action( 'wp', 'golden_oak_web_design_woocommerce_checkout_terms_and_conditions' );




add_filter( 'woocommerce_cart_item_price', 'kd_custom_price_message' );

add_filter( 'woocommerce_cart_item_subtotal', 'kd_custom_price_message' );  

add_filter( 'woocommerce_cart_subtotal', 'kd_custom_price_message' );  

 //add_filter( 'woocommerce_before_checkout_billing_form', 'kd_custom_price_message' ); 



function kd_custom_price_message( $price ) {

  $tax = new WC_Tax();

  $country_code =WC()->customer->get_shipping_country();

 

 $rates = $tax->find_rates( array( 'country' => $country_code ) );

 foreach( $rates as $rate ){

    $tax_rate_name = $rate['label'];

 }
    $afterPriceSymbol = $tax_rate_name;

    $tax_suffix = $price .'<small class="tax_label cart-tax-suffix">(excl. '. $afterPriceSymbol.')</small>';

    return $tax_suffix;

}
/* add content above short description */
function add_quantity_test(){
  global $product;
  if(get_field('product_available',$product->get_id())){ ?>
    <div class="Pre-orderP">
      <p class="stockok"><?php echo get_field('product_available',$product->get_id()); ?></p>
    </div>
    <?php }else if($product->is_on_backorder()){
      $product_backorder = get_field('product_backorder_msg','option');
       if($product->backorders_allowed()) echo '<p class="stockok">'.$product_backorder.'</p>';
     } 
    else if( $product->is_in_stock() ){
      $product_stock_status = get_field('product_in_stock','option');
      echo '<p class="stockok">'.$product_stock_status.'</p>';
    } else if( ! $product->is_in_stock()){ 
      $product_stock_status1 = get_field('out_of_stock','option');
      echo  '<p class="stockok">'.$product_stock_status1.'</p>';
    } 
}
add_action( 'woocommerce_single_product_summary', 'add_quantity_test', 15 );
add_filter('woocommerce_order_get_tax_totals','save_the_data_for_invoice',10,2);
function save_the_data_for_invoice( $tax_totals,$instanse){
    foreach ( $instanse->get_items( 'tax' ) as $key => $tax ) {
        $code = $tax->get_rate_code();

        if ( !isset( $tax_totals[$code] ) ) {
            $tax_totals[ $code ]         = new stdClass();
            $tax_totals[ $code ]->amount = 0;
        } 
  

        $tax_totals[ $code ]->id               = $key;
        $tax_totals[ $code ]->rate_id          = $tax->get_rate_id();
        $tax_totals[ $code ]->is_compound      = $tax->is_compound();
        $tax_totals[ $code ]->label            = $tax->get_label().' '.WC_Tax::get_rate_percent( $tax->get_rate_id());
       $tax_totals[ $code ]->amount += (float) $tax->get_tax_total() + (float) $tax->get_shipping_tax_total();
        $tax_totals[ $code ]->formatted_amount = wc_price( $tax_totals[ $code ]->amount, array( 'currency' => $instanse->get_currency() ) );
    }   
  
return $tax_totals;
}

add_filter('wpo_wcpdf_woocommerce_totals','update_structure_invoice',10,2);
function update_structure_invoice($total,$orders){
   
   $arrayNew = array();
   $count = count($total);
   $value_new = 0;
   if($count == 6){
       $k = 1;
   }else{
    $k = 2;
   }
    $i = 0;
  //  unset($total['payment_method']);
  
    unset($total['ph_est_delivery']);

    foreach($total as $key => $value){
       
       if($value['label'] == 'Verzending'){
        $data = explode(" ",strip_tags($value['value']));
        $value['value'] =  str_replace(',-',',00',$value['value']);		
						
        if($data){
            if(is_numeric($data[0])){
            $value_new = substr(strip_tags(str_replace('via','',$data[0])), 1);
            $value_new = str_replace("euro;","",$value_new);
            $value_new = str_replace('.','',$value_new);
            $value_new = str_replace(',','.',$value_new);
            }
        }
       
           array_push($arrayNew,$value);
           break;
       }
       $i++;
    }
    $j=0;
    foreach($total as $key => $value){
        if($value['label'] == 'Totaal'){
			
            $data2 = explode(" ",strip_tags($value['value']));
    
                    $value['value'] =  str_replace(',-',',00',$data2[0]);	
                    
                } 
        if($value['label'] == 'Discount'){
			
            $data1 = explode(" ",strip_tags($value['value']));
    
                    $value['value'] =  str_replace(',-',',00',$data1[0]);	
                    
                } 
        if($value['label'] == 'Verzending'){
  
        }else{
            if($value['label'] == 'Subtotaal'){
                if($value_new != 0){
                $newData = substr(strip_tags($value['value']), 1);
							$newData = str_replace("euro;","",$newData);
                            $newData = str_replace('.','',$newData);
							$newData = str_replace(',','.',$newData);
							$newDataFloat = floatval($newData);
							$value_new = $newDataFloat + floatval($value_new);
                            $fmt = new NumberFormatter( 'de_DE', NumberFormatter::CURRENCY );
							
							$value['value'] = "€".str_replace(',','.',$value_new);
                            $value['value'] = $fmt->formatCurrency(	$value_new , "EUR")."\n";
							$value['value'] =  "€".str_replace("€","",$value['value']);
            }
            
            }
          
            array_push($arrayNew,$value);
          
           
        }
        $j++;
     }
    
				
    return $arrayNew;
}

add_filter( 'pre_option_woocommerce_default_gateway' . '__return_false', 99 );
?>