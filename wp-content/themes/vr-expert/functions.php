<?php
add_action('wp_enqueue_scripts', 'vr_expert_enqueue_styles');
add_filter('woocommerce_twenty_twenty_one_styles', '__return_false');
function vr_expert_enqueue_styles()
{
    /* CSS */
    /*wp_enqueue_style('vrexpert_fonts', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.1/css/all.min.css', array() , '1.0');*/
    wp_enqueue_style('vrexpert_jqueryui_css', get_stylesheet_directory_uri() . '/css/jquery-ui.css', array() , '1.0');
    wp_enqueue_style('vrexpert_owlcarousel_css', get_stylesheet_directory_uri() . '/css/owl.carousel.min.css', array() , '1.0');
    wp_enqueue_style('vrexpert_customstyle_css', get_stylesheet_directory_uri() . '/css/customstyle.css', array() , '1.0');
    wp_enqueue_style('vrexpert_otherspage_css', get_stylesheet_directory_uri() . '/css/otherspage.css', array() , '1.0');
    wp_enqueue_style('vrexpert_single_page_css', get_stylesheet_directory_uri() . '/css/single-page-style.css', array() , '1.0');
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
    wp_enqueue_script('vrexpert_jqueryui_js', get_stylesheet_directory_uri() . '/js/jquery-ui.js', array(
        'jquery'
    ) , '1.1', false);
   
    if(is_checkout()){
    wp_enqueue_script('vrexpert_vaidation_js', get_stylesheet_directory_uri() . '/js/jquery.validate.min.js', array(
        'jquery'
    ) , '1.1', false);
    wp_dequeue_style('vrexpert_otherspage_css');
    
    }
    if(is_archive('contents')){
    wp_enqueue_script('vrexpert_owlcustom_js', get_stylesheet_directory_uri() . '/js/owlcarasouel.js', array('jquery'), time(), false);
    wp_enqueue_script('vrexpert_multi_js', get_stylesheet_directory_uri() . '/js/jquery.multiselect.js', array('jquery'), '1.1', false);
    // wp_dequeue_style('vrexpert_single_page_css');
    }
    wp_enqueue_script('vrexpert_custom_js', get_stylesheet_directory_uri() . '/js/customjs.js', array('jquery'), time(), true);
    wp_enqueue_script('vrexpert_extra_js', get_stylesheet_directory_uri() . '/js/vr-expert-consumer.js', array(
        'jquery'
    ) , '1.1', true);
    $classes = get_body_class();
    
    if(in_array('page-template-template-privacypolicy',$classes)){
    }
}
add_image_size( 'prod_single_desc', 400, 400, false );
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
            echo "<";
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
        echo "/&nbsp";
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

add_action('init', 'events_post_type');
function events_post_type()
{
    $labels = array(
        'name' => 'Events',
        'singular_name' => 'Events',
        'menu_name' => 'Events',
        'slug_name' => 'Event',
        'all_items' => 'All Events',
        'view_item' => 'View Event',
        'add_new_item' => 'Add New Event',
        'add_new' => 'Add New Event',
        'edit_item' => 'Edit Event',
        'update_item' => 'Update Event',
        'search_items' => 'Search Event',
        'not_found' => 'Event Not found',
        'not_found_in_trash' => 'Event Not found in Trash'
    );
    $args = array(
        'label' => 'Events',
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
        'rewrite' => ["slug" => "events",
        "with_front" => false]
    );
    register_post_type('events', $args);
    $tax_labels = array(
        'name' => _x('Event_Category', 'taxonomy general name') ,
        'singular_name' => _x('categories', 'taxonomy singular name') ,
        'search_items' => __('Search categories') ,
        'all_items' => __('All categories') ,
        'parent_item' => __('Parent categories') ,
        'parent_item_colon' => __('Parent categories:') ,
        'edit_item' => __('Edit categories') ,
        'update_item' => __('Update categories') ,
        'add_new_item' => __('Add New categories') ,
        'new_item_name' => __('New categories') ,
        'menu_name' => __('Event_Category') ,
    );
    register_taxonomy('categories', array(
        'events'
    ) , array(
        'hierarchical' => true,
        'labels' => $tax_labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array(
            'slug' => 'categories',
            "with_front" => false
        ) ,
    ));
}

add_action('init', 'partners_post_type');
function partners_post_type()
{
    $labels = array(
        'name' => 'Partners',
        'singular_name' => 'Partners',
        'menu_name' => 'Partners',
        'slug_name' => 'Partner',
        'all_items' => 'All Partners',
        'view_item' => 'View Partners',
        'add_new_item' => 'Add New Partner',
        'add_new' => 'Add New Partner',
        'edit_item' => 'Edit Partner',
        'update_item' => 'Update Partner',
        'search_items' => 'Search Partner',
        'not_found' => 'Partner Not found',
        'not_found_in_trash' => 'Partner Not found in Trash'
    );
    $args = array(
        'label' => 'Partners',
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
        'rewrite' => ["slug" => "partners",
        "with_front" => false]
    );
    register_post_type('partners', $args);
    $tax_labels = array(
        'name' => _x('Partner_Category', 'taxonomy general name') ,
        'singular_name' => _x('categories', 'taxonomy singular name') ,
        'search_items' => __('Search categories') ,
        'all_items' => __('All categories') ,
        'parent_item' => __('Parent categories') ,
        'parent_item_colon' => __('Parent categories:') ,
        'edit_item' => __('Edit categories') ,
        'update_item' => __('Update categories') ,
        'add_new_item' => __('Add New categories') ,
        'new_item_name' => __('New categories') ,
        'menu_name' => __('Partner_Category') ,
    );
    register_taxonomy('pcategories', array(
        'partners'
    ) , array(
        'hierarchical' => true,
        'labels' => $tax_labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array(
            'slug' => 'categories',
            "with_front" => false
        ) ,
    ));
}

add_action('init', 'packages_post_type');
function packages_post_type()
{
    $labels = array(
        'name' => 'Packages',
        'singular_name' => 'Packages',
        'menu_name' => 'Packages',
        'slug_name' => 'packages',
        'all_items' => 'All Packages',
        'view_item' => 'View Packages',
        'add_new_item' => 'Add New Package',
        'add_new' => 'Add New Package',
        'edit_item' => 'Edit Package',
        'update_item' => 'Update Package',
        'search_items' => 'Search Package',
        'not_found' => 'Package Not found',
        'not_found_in_trash' => 'Package Not found in Trash'
    );
    $args = array(
        'label' => 'Packages',
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
        'rewrite' => ["slug" => "packages",
        "with_front" => false]
    );
    register_post_type('packages', $args);
    $tax_labels = array(
        'name' => _x('Package_Category', 'taxonomy general name') ,
        'singular_name' => _x('pkgcategories', 'taxonomy singular name') ,
        'search_items' => __('Search categories') ,
        'all_items' => __('All categories') ,
        'parent_item' => __('Parent categories') ,
        'parent_item_colon' => __('Parent categories:') ,
        'edit_item' => __('Edit categories') ,
        'update_item' => __('Update categories') ,
        'add_new_item' => __('Add New categories') ,
        'new_item_name' => __('New categories') ,
        'menu_name' => __('Package_Category') ,
    );
    register_taxonomy('pkgcategories', array(
        'packages'
    ) , array(
        'hierarchical' => true,
        'labels' => $tax_labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array(
            'slug' => 'pkgcategories',
            "with_front" => false
        ) ,
    ));
}

add_action('init', 'contents_post_type');
function contents_post_type()
{
    $labels = array(
        'name' => 'Contents',
        'singular_name' => 'Contents',
        'menu_name' => 'Contents',
        'slug_name' => 'contents',
        'all_items' => 'All Contents',
        'view_item' => 'View Contents',
        'add_new_item' => 'Add New Content',
        'add_new' => 'Add New Content',
        'edit_item' => 'Edit Content',
        'update_item' => 'Update Content',
        'search_items' => 'Search Content',
        'not_found' => 'Content Not found',
        'not_found_in_trash' => 'Content Not found in Trash'
    );
    $args = array(
        'label' => 'Contents',
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
        'rewrite' => ["slug" => "contents",
        "with_front" => false]
    );
    register_post_type('contents', $args);

    $tax_labels = array(
        'name' => _x('genre', 'taxonomy general name') ,
        'singular_name' => _x('genre', 'taxonomy singular name') ,
        'search_items' => __('Search Genre') ,
        'all_items' => __('All Genres') ,
        'parent_item' => __('Parent Genre') ,
        'parent_item_colon' => __('Parent Genre:') ,
        'edit_item' => __('Edit Genre') ,
        'update_item' => __('Update Genre') ,
        'add_new_item' => __('Add New Genre') ,
        'new_item_name' => __('New Genre') ,
        'menu_name' => __('Genre') ,
    );
    register_taxonomy('genre', array(
        'contents'
    ) , array(
        'hierarchical' => true,
        'labels' => $tax_labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array(
            'slug' => 'genre',
            "with_front" => false
        ) ,
    ));
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
        'name' => _x('Categories', 'taxonomy general name') ,
        'singular_name' => _x('Categories', 'taxonomy singular name') ,
        'search_items' => __('Search Categories') ,
        'all_items' => __('All Categories') ,
        'parent_item' => __('Parent Category') ,
        'parent_item_colon' => __('Parent Category:') ,
        'edit_item' => __('Edit Category') ,
        'update_item' => __('Update Category') ,
        'add_new_item' => __('Add New Category') ,
        'new_item_name' => __('New Category') ,
        'menu_name' => __('Category') ,
    );
    register_taxonomy('category', array(
        'faqs'
    ) , array(
        'hierarchical' => true,
        'labels' => $tax_labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array(
            'slug' => 'category',
            "with_front" => false
        ) ,
    ));

}

add_action('init', 'software_post_type');
function software_post_type()
{
    $labels = array(
        'name' => 'Software Options',
        'singular_name' => 'Software Options',
        'menu_name' => 'Software Options',
        'slug_name' => 'Software Options',
        'all_items' => 'All Software Options',
        'view_item' => 'View Software Options',
        'add_new_item' => 'Add Software Options',
        'add_new' => 'Add New Software Options',
        'edit_item' => 'Edit Software Options',
        'update_item' => 'Update Software Options',
        'search_items' => 'Search Software Options',
        'not_found' => 'Software Options Not found',
        'not_found_in_trash' => 'Software Options Not found in Trash'
    );
    $args = array(
        'label' => 'Software Options',
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
        'rewrite' => ["slug" => "software-options",
        "with_front" => false]
    );
    register_post_type('software-options', $args);
    $tax_labels = array(
        'name' => _x('Software_Category', 'taxonomy general name') ,
        'singular_name' => _x('categories', 'taxonomy singular name') ,
        'search_items' => __('Search categories') ,
        'all_items' => __('All categories') ,
        'parent_item' => __('Parent categories') ,
        'parent_item_colon' => __('Parent categories:') ,
        'edit_item' => __('Edit categories') ,
        'update_item' => __('Update categories') ,
        'add_new_item' => __('Add New categories') ,
        'new_item_name' => __('New categories') ,
        'menu_name' => __('Software_Category') ,

    );
    register_taxonomy('software_category', array(
        'software-options'
    ) , array(
        'hierarchical' => true,
        'labels' => $tax_labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array(
            'slug' => 'software_category',
            "with_front" => false
        ) ,
    ));
}

if (function_exists('acf_add_options_page'))
{
    acf_add_options_page(array(
        'page_title' => 'Theme WooCommerce Settings',
        'menu_title' => 'Theme Settings',
        'menu_slug' => 'theme-general-settings',
        'capability' => 'edit_posts',
        'redirect' => false
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
        'page_title' => 'Theme Product Category Settings',
        'menu_title' => 'Product Category Page',
        'parent_slug' => 'theme-general-settings',
    ));
    acf_add_options_sub_page(array(
        'page_title' => 'Theme contact Page Settings',
        'menu_title' => 'Contactus Page',
        'parent_slug' => 'theme-general-settings',
    ));
    acf_add_options_sub_page(array(
        'page_title' => 'Theme Events Page Settings',
        'menu_title' => 'Events Page',
        'parent_slug' => 'theme-general-settings',
    ));
    acf_add_options_sub_page(array(
        'page_title' => 'Theme partners Page Settings',
        'menu_title' => 'Partners Page',
        'parent_slug' => 'theme-general-settings',
    ));
    acf_add_options_sub_page(array(
        'page_title' => 'Theme packages Settings',
        'menu_title' => 'Packages Page',
        'parent_slug' => 'theme-general-settings',
    ));
    acf_add_options_sub_page(array(
        'page_title' => 'Theme contents Settings',
        'menu_title' => 'Contents Page',
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

add_filter('cron_schedules', 'cron_fetch_booqable');
function cron_fetch_booqable($schedules)
{
    $schedules['every_day'] = array(
        'interval' => 3600, // daily
        'display' => __('Daily fetch booqable products') ,
    );
    return $schedules;
}
// Add function to register event to WordPress init
add_action('init', 'cron_fetch_booqable_hook');
// Function which will register the event
function cron_fetch_booqable_hook()
{
    // Make sure this event hasn't been scheduled
    //Schedule an action if it's not already scheduled
    if (!wp_next_scheduled('booqable_hook'))
    {
        wp_schedule_event(time() , 'every_day', 'booqable_hook');
    }
}
///Hook into that action that'll fire every six hours
add_action('booqable_hook', 'booqable_hook_function');
//create your function, that runs on cron
add_action('booqable_hook_function', 'booqable_hook_function');
function booqable_hook_function()
{
    global $wpdb;
    $ch = curl_init();
    $delete = $wpdb->query("TRUNCATE TABLE `booqable_data`");
    curl_setopt($ch, CURLOPT_URL, 'https://vr-expert-testomgeving.booqable.com/api/1/products?api_key=3f77f941bc272c538d1d875ee3ad38efb15f11a495aacaac794113c0724cf714');

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    $contents = curl_exec($ch);

    $ObjData = json_decode($contents)->products;

    $example_data = array();

    foreach ($ObjData as $k => $cur)
    {
        $boo_id = $cur->id;
        $product_name = $cur->name;
        $product_sku = $cur->sku;
        $product_price = $cur->base_price;  //Storing Price in Decimal format
        array_push($example_data, $product_id);

        $table = 'booqable_data';
        $proDataMains = array(
            'booqable_product_id' => $boo_id,
            'booqable_product_name' => $product_name,
            'booqable_product_price' => $product_price,
            'booqable_product_sku' => $product_sku
        );

        $success = $wpdb->insert($table, $proDataMains);

    }

}

function import_pro_function()
{
    $recepients = 'yaminiyadav5281@gmail.com';
    $subject = 'Hello from yogabody';
    $message = 'This is a test mail sent by yaminee vr-expert automatically as per your schedule.';
    if (wp_mail($recepients, $subject, $message))
    {
        echo " ";
    }
    else
    {
        echo "not sent";
    }
   return insertBooqabledata_woo('');
}
function insertBooqabledata_woo()
{

    $found_flag = 0;
    $example_data = array();
    $check_boo_ids = array();

    $args = array(
        'post_type' => 'product',
        'posts_per_page' => - 1
    );
    $loop = new WP_Query($args);
    if ($loop->have_posts())
    {
        while ($loop->have_posts()):
            $loop->the_post();
            global $product;
            $pro_id = $product->get_ID();
            $check_boo_ids[$pro_id] = get_post_meta($pro_id, 'booqable_product_id', true);

        endwhile;
    }

    global $wpdb;
    $booqable_product_plugin = $wpdb->get_results("SELECT * FROM booqable_data");
    
    foreach ($booqable_product_plugin as $booqable_product_data => $booqable_product_ID)
    {
        $boo_id = $booqable_product_ID->booqable_product_id;
        $boo_product_name = $booqable_product_ID->booqable_product_name;
        $boo_product_price = $booqable_product_ID->booqable_product_price;
       $boo_product_sku = $booqable_product_ID->booqable_product_sku;
  
        foreach ($check_boo_ids as $exist_pro_id => $check_boo_id)
        {

            if ($check_boo_id == $boo_id)
            {
                $found_flag = 1;
                $caught_pro_id = $exist_pro_id;
            }
        }

        if ($found_flag == 1)
        {
            update_post_meta($caught_pro_id, '_regular_price', $boo_product_price);
            update_post_meta($caught_pro_id, '_price', $boo_product_price);
            update_post_meta($caught_pro_id,'_sku',$boo_product_sku); 
			$found_flag = 0;
         
        }
        else
        {
           
            $proDataMains_post = array(
                'post_title' => $boo_product_name,
                'post_type' => 'product',
                'post_author' => get_current_user_id() ,
                'post_status' => 'publish'
            );
            $new_proid = wp_insert_post($proDataMains_post);
            update_post_meta($new_proid, '_regular_price', $boo_product_price);
            update_post_meta($new_proid, '_price', $boo_product_price);
            add_post_meta($new_proid, 'booqable_product_id', $boo_id);
            update_post_meta($new_proid,'_sku',$boo_product_sku); 
        }

    }

    $result['data'] = $new_proid;
  

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

function custome_add_to_cart($productId, $cart_item_data)
{ ?>
<script>
  jQuery('#cartModal').modal('show');
  
  
</script>
<style>
  .container {
  padding: 2rem 0rem;
  hight:400px !important;
  width:600px !important;
  }
  .table-image {
  thead {
  td, th {
  border: 0;
  color: #666;
  font-size: 0.8rem;
  }
  }
  td, th {
  vertical-align: middle;
  text-align: center;
  &.qty {
  max-width: 2rem;
  }
  }
  }
  .price {
  margin-left: 1rem;
  }
  .modal-footer {
  padding-top: 0rem;
  }
</style>
<div class="modal fade" id="cartModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header border-bottom-0">
        <h5 class="modal-title" id="exampleModalLabel">
          Check Availability
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table table-image">
          <thead>
            <tr>
              <th scope="col"></th>
              <th scope="col">Start Date</th>
              <th></th>
              <th scope="col">End Date</th>
            </tr>
          </thead>
          </thead>
          <tbody>
            <tr>
              <td class="w-25">
                <?php echo get_the_post_thumbnail($cart_item_data); ?>
              </td>
              <td><input type="date" name="start_date" id="start_date"></td>
              <td></td>
              <td><input type="date" name="end_date" id="end_date"></td>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="modal-footer border-top-0 d-flex justify-content-between">
        <button type="button" class="btn btn-success" onclick ="check_availability();">Apply</button>
      </div>
    </div>
  </div>
</div>
<?php
    global $woocommerce, $post, $product, $wpdb;

    //echo $cart_item_data->booqable_product_id;SELECT * FROM wp_9_postmeta WHERE post_id='519' && meta_key='booqable_product_id'
    $booqable_product_id = get_post_meta($productId, 'booqable_product_id', true);
    /* 	 $booqable_product_id ='';
    foreach ($booqable_product_ids as $value){
    
     $booqable_product_id = $value->meta_value; 
    } */
    /* foreach ($booqable_product_ids as $key => $object) {
    echo $meta_key = $object->meta_key; 
    
    echo $meta_value = $object->meta_value;
    }  */

    //print_r($current_product_id);
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, 'https://vr-expert-testomgeving.booqable.com/api/1/products/' . $booqable_product_id . '?api_key=3f77f941bc272c538d1d875ee3ad38efb15f11a495aacaac794113c0724cf714');
    //552be049-03ca-4951-9bd1-2e612a52546f
    // https://company.booqable.com/api/1/products/23b6445d-c846-404b-8628-acb9023d8e5c/availability?interval=month&till=01-02-2018&from=01-01-2018
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    $contents = curl_exec($ch);

    $ObjData = json_decode($contents)->product;

    foreach ($ObjData->stock_items as $value1)
    {
        $booqable_product_id;

        if (($booqable_product_id) == ($value1->item_id))
        {

            $value1->from;
            $value1->till;
        }
    }

    //print_r($ObjData1);
    
}

add_action('wp_ajax_check_product_availability', 'check_product_availability');
add_action('wp_ajax_nopriv_check_product_availability', 'check_product_availability');
//add_filter('woocommerce_check_product_availability', 'check_product_availability');
function check_product_availability()
{
    global $woocommerce, $post, $product, $wpdb, $cart_item_date;
 $page  =  $_POST['pageName'];

	$quantity_p = '';
    $s_date = $_POST['start_date'];
    $e_date = $_POST['end_date'];
    $qty = $_POST['qty'];
   
    $accessories_id = $_POST['accessories_id'];
    $simple_accessories_id = $_POST['simple_accessories_id'];
    $installation_service = $_POST['installation_service'];
	$installation_service_product_id = $_POST['installation_service_product_id'];
  

   
    $start_date = date("Y-m-d", strtotime($s_date) );   
    $end_date = date("Y-m-d", strtotime($e_date) );
    $product_id = $_POST['current_single_product_id'];
    $sDate = new DateTime($start_date);

    $eDate= new DateTime($end_date);

    $days='';

    $difference = $eDate->diff($sDate);

  $days =  $difference->format("%a")+1;

   $booqable_product_id = get_post_meta($product_id, 'booqable_product_id', true);
if($booqable_product_id){
  $array = array();
   $productPriceTable = get_field('product_price_per_day',$product_id);
   if($productPriceTable){
       foreach($productPriceTable as $priceData){
          array_push($array,$priceData['days']);
       }
       if(in_array($days ,$array)){
       }else{
           $var = 'Please contact to the support <a href="'.get_the_permalink($product_id ).'/#products-contact">Click Here</a>';
           $res['status'] = "error";
           $res['message'] = $var;
           echo json_encode($res);
           exit;
       }
   }
}
  


    
    $var = '';

    $booqable_product_id = get_post_meta($product_id, 'booqable_product_id', true);
    if ($booqable_product_id)
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://vr-expert-testomgeving.booqable.com/api/1/products/' . $booqable_product_id . '?api_key=3f77f941bc272c538d1d875ee3ad38efb15f11a495aacaac794113c0724cf714');
        //552be049-03ca-4951-9bd1-2e612a52546f
        // https://company.booqable.com/api/1/products/23b6445d-c846-404b-8628-acb9023d8e5c/availability?interval=month&till=01-02-2018&from=01-01-2018
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        $contents = curl_exec($ch);

        $ObjData = json_decode($contents)->product;

        foreach ($ObjData->stock_items as $value1)
        {

            if (($booqable_product_id) == ($value1->item_id))
            {

                $inventry_from_date = $value1->from;
                $inventry_till_date = $value1->till;

                if (($inventry_from_date <= $start_date) && ($inventry_till_date >= $end_date)){
                    $var = 'available';
                    break;
                }
                else{
                    $var = 'This product is currently unavailable on chosen date ';
                    break;
                }
            }
        }
        if ($var == 'available'){
            $dataExist = true;
            foreach( WC()->cart->get_cart() as $key=>$item){
                if($item['product_id']==$product_id){
                    $dataExist = false;  
                   break;       
                }
    
            }

            $product_cart_id = WC()->cart->generate_cart_id($product_id);

            $res = array();

            $res['url'] = get_site_url();

            if ($dataExist)
            {
              
                // Yep, the product with ID 55 is NOT in the cart, let's add it then!
                if( have_rows('product_price_per_day',$product_id) ):

                    // Loop through rows.
                    while( have_rows('product_price_per_day',$product_id) ) : the_row();
                
                        // Load sub field value.
                        $days_value = get_sub_field('days');
                        $price_value = get_sub_field('price');
                        // Do something...
                       if($days == $days_value){
                       $days_value = get_sub_field('days');
                       
                       $price_value = get_sub_field('price');
                       break;
                    
                                 
                }
                    // End loop.
                    endwhile;
                
                // No value.
                else :
                    // Do something...
                endif;
         
                WC()
                    ->cart
                    ->add_to_cart($product_id,  $qty, 0, array() , array(
                    'date_on_sale_from' => array(
                        $_POST['start_date']
                    ) ,
                    'date_on_sale_to' => array(
                        $_POST['end_date']
                    ),
					'installation_service' => array(
                        $_POST['installation_service']
                    )

					
                ));
                if($installation_service_product_id !=='' && $accessories_id !=='' && $simple_accessories_id !==''){
					WC() ->cart ->add_to_cart($installation_service_product_id,$qty);
                    foreach($simple_accessories_id as $simple_accessories){
                        WC() ->cart ->add_to_cart($simple_accessories,$qty);
                    }
                    foreach($accessories_id as $accessories){
                        WC() ->cart ->add_to_cart($accessories,  $qty, 0, array() , array(
                            'date_on_sale_from' => array(
                                $_POST['start_date']
                            ) ,
                            'date_on_sale_to' => array(
                                $_POST['end_date']
                            ),
                            'installation_service' => array(
                                $_POST['installation_service']
                            )
                        
                        ));
                    }
				}else if($accessories_id !=='' || $installation_service_product_id !=='' || $simple_accessories_id){
                    WC() ->cart ->add_to_cart($installation_service_product_id,$qty);
                    foreach($simple_accessories_id as $simple_accessories){
                        WC() ->cart ->add_to_cart($simple_accessories,$qty);
                    }
                    foreach($accessories_id as $accessories){
                        WC() ->cart ->add_to_cart($accessories,  $qty, 0, array() , array(
                            'date_on_sale_from' => array(
                                $_POST['start_date']
                            ) ,
                            'date_on_sale_to' => array(
                                $_POST['end_date']
                            ),
                            'installation_service' => array(
                                $_POST['installation_service']
                            )
                        
                        ));
                    }
					
				 } 

                        $res['redirect'] = wc_get_cart_url();
                        $res['message'] = "Product add into cart.";
                        $res['status'] = 200;
                     echo json_encode($res);
                     exit;
             }else{

                if($installation_service_product_id !=='' && $accessories_id !=='' && $simple_accessories_id !==''){
                   
                    WC() ->cart ->add_to_cart($installation_service_product_id,$qty);
                    foreach($simple_accessories_id as $simple_accessories){
                        $qty = 1;
                        WC() ->cart ->add_to_cart($simple_accessories,$qty);
                    }
                    foreach($accessories_id as $accessories){
                        $qty =1;
                        WC() ->cart ->add_to_cart($accessories,  $qty, 0, array() , array(
                            'date_on_sale_from' => array(
                                $_POST['start_date']
                            ) ,
                            'date_on_sale_to' => array(
                                $_POST['end_date']
                            ),
                            'installation_service' => array(
                                $_POST['installation_service']
                            )
                        
                        ));
                    }
                }else if($accessories_id !=='' || $installation_service_product_id !=='' || $simple_accessories_id){
                    WC() ->cart ->add_to_cart($installation_service_product_id,$qty);
                    foreach($simple_accessories_id as $simple_accessories){
                        $qty=1;
                        WC() ->cart ->add_to_cart($simple_accessories,$qty);
                    }
                    foreach($accessories_id as $accessories){
                        $qty= 1;
                        WC() ->cart ->add_to_cart($accessories,  $qty, 0, array() , array(
                            'date_on_sale_from' => array(
                                $_POST['start_date']
                            ) ,
                            'date_on_sale_to' => array(
                                $_POST['end_date']
                            ),
                            'installation_service' => array(
                                $_POST['installation_service']
                            )
                        
                        ));
                    }
                    
                 } 
                     foreach (WC()
                      ->cart
                         ->get_cart() as $cart_item_key => $cart_item)
                       {
                         $product_data = $cart_item['data'];
                          $product_id_key = $cart_item['product_id'];
                          $quantity = $cart_item['quantity'];
					      if($cart_item['date_on_sale_from']){
                          $start_date = $cart_item['date_on_sale_from'][0];
                          }
                           if($cart_item['date_on_sale_to']){
                           $end_date = $cart_item['date_on_sale_to'][0];
                          } 

                          if ($product_id_key == $product_id){
                           
					       if(($cart_item['date_on_sale_from'][0] == $_POST['start_date']) && ($cart_item['date_on_sale_to'][0] == $_POST['end_date'])){
                              
                             if($_POST['pageName'] == 'cart'){
                               $quantity_p = $qty;
                         
                              }else{
                               $quantity_p = $cart_item['quantity'] + $qty;
                               }
						 
						       if( have_rows('product_price_per_day',$product_id) ): 
                               while( have_rows('product_price_per_day',$product_id) ) : the_row();
                
                         // Load sub field value.
                               $days_value = get_sub_field('days');
                               $price_value = get_sub_field('price');
                         // Do something...
                               if($days == $days_value){
                               $days_value = get_sub_field('days');
                               $price_value = get_sub_field('price');
                     
                                 
                            }  // End loop.
                            endwhile;
                             else :
                            endif;
              
                           WC()
                            ->cart
                            ->set_quantity($cart_item_key, $quantity_p);
                           break;

					   }else{
                           if($page == 'cart'){
                            $quantity_p=$qty;	
                            WC()->cart->remove_cart_item($cart_item_key);						   
                            WC() ->cart ->add_to_cart($product_id,$qty, 0, array() , array(
                             'date_on_sale_from' => array(
                                 $_POST['start_date']
                             ) ,
                             'date_on_sale_to' => array(
                                 $_POST['end_date']
                             ),
                             'installation_service' => array(
                                 $_POST['installation_service']
                             )
                         
                         ));
                            break;
                           }else{
                            $quantity_p=$qty;						   
                            WC() ->cart ->add_to_cart($product_id,$qty, 0, array() , array(
                             'date_on_sale_from' => array(
                                 $_POST['start_date']
                             ) ,
                             'date_on_sale_to' => array(
                                 $_POST['end_date']
                             ),
                             'installation_service' => array(
                                 $_POST['installation_service']
                             )
                         
                         ));
                            break;
                           }
                           
					   }
                    
                    } 
        

                    
                    foreach (WC()
                    ->cart
                    ->get_cart() as $cart_item_key => $cart_item)
                    {
                    $product_data = $cart_item['data'];
                    $product_id_key = $cart_item['product_id'];
                    $quantity = $cart_item['quantity'];
					
                     if($installation_service_product_id !==''){
						if($product_id_key == $installation_service_product_id){
						
						 WC()
                            ->cart
                            ->set_quantity($cart_item_key, $quantity_p);
					   }
					  }

					if($accessories_id !==''){
                        foreach($accessories_id as $accessories){
						if($product_id_key == $accessories){
						
						 WC()
                            ->cart
                            ->set_quantity($cart_item_key, $quantity_p);
					       }
				    	 }
                     }
                  if($simple_accessories_id !==''){
                    foreach($simple_accessories_id as $simple_accessories){
                    if($product_id_key == $simple_accessories){
                    WC() ->cart ->add_to_cart($simple_accessories,$qty);
                   }
                  }
				 }

                }
				   
                }
               
				
               $res['url'] = get_site_url();
               
               $res['redirect'] = wc_get_cart_url();
                $res['message'] = "Product updated into cart.";
                $res['status'] = 200;
                echo json_encode($res);
              }
        }else{
            $res['message'] = "Product Not Available on chosen date";
            $res['status'] = 400;
            echo json_encode($res);
        }
    }
    exit;
}

/**
 *Remove all possible fields
 *
 */
function wc_remove_checkout_fields($fields)
{
    // Billing fields
    unset($fields['billing']['billing_last_name']);
    unset($fields['billing']['billing_phone']);
    unset($fields['billing']['billing_state']);


    unset($fields['shipping']['shipping_last_name']);
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
    $fields['shipping_phone']['required'] = false; // To be sure "NOT required"
    unset($fields['shipping_phone']); // Remove shipping phone field
    return $fields;
}

// _x() Retrieve translated string with gettext context.
//  __() Retrieve the translation of $text.
function aditya_customfield($fields)
{
    $fields['billing']['billing_first_name']['label'] = ' Name';
    $fields['billing']['billing_first_name']['placeholder'] = 'Name…';
    $fields['billing']['billing_company']['label'] = ' Company';
    $fields['billing']['billing_company']['placeholder'] = 'Company Name..';
    $fields['billing']['billing_country']['label'] = ' Invoice Country';
    $fields['billing']['billing_country']['placeholder'] = 'Netherlands..';
    $fields['billing']['billing_city']['label'] = ' Invoice City';
    $fields['billing']['billing_city']['placeholder'] = 'Amsterdam..';
    $fields['billing']['billing_postcode']['required'] = true;
    $fields['billing']['billing_postcode']['label'] = 'Invoice Postal Code';
    $fields['billing']['billing_postcode']['placeholder'] = '4753 HM…';
    $fields['billing']['billing_email']['label'] = ' Email';
    $fields['billing']['billing_email']['placeholder'] = 'info@VRExpert.nl…';
    $fields['billing']['billing_email']['priority'] = 22;
    $fields['billing']['billing_address_1']['label'] = 'Invoice Address';
    $fields['billing']['billing_address_1']['placeholder'] = 'wibaut 65…';
    $fields['billing']['billing_address_1']['priority'] = 32;
    $fields['billing']['billing_city']['priority'] = 34;
    $fields['billing']['billing_postcode']['priority'] = 34;
    $fields['billing']['custom_field_invoice_refrence'] = array(
        'label' => __('Invoice Reference', 'woocommerce') ,
        'placeholder' => _x('type reference…', 'placeholder', 'woocommerce') ,
        'required' => false,
        'class' => array(
            'form-row-wide'
        ) ,
        'priority' => 60,
    );
    $fields['billing']['custom_field_new'] = array(
        'label' => __('VAT Number', 'woocommerce') ,
        'placeholder' => _x('0678…', 'placeholder', 'woocommerce') ,
        'required' => true,
        'class' => array(
            'form-row-wide'
        ) ,
        'priority' => 30,
    );
    $fields['shipping']['shipping_first_name']['label'] = ' Shipment contact person';
    $fields['shipping']['shipping_first_name']['placeholder'] = 'Name…';
    $fields['shipping']['shipping_first_name']['priority'] = 36;
    $fields['shipping']['shipping_address_1']['required'] = true;
    $fields['shipping']['shipping_address_1']['label'] = ' Shipment address';
    $fields['shipping']['shipping_address_1']['placeholder'] = 'wibaut 65…';
    $fields['shipping']['shipping_address_1']['priority'] = 20;
    $fields['shipping']['shipping_city']['label'] = ' Invoice city';
    $fields['shipping']['shipping_city']['placeholder'] = 'Amsterdam..';
    $fields['shipping']['shipping_city']['priority'] = 30;
    $fields['shipping_postcode']['required'] = true;
    $fields['shipping']['shipping_postcode']['label'] = ' Invoice postal code';
    $fields['shipping']['shipping_postcode']['placeholder'] = '4753 HM…';
    $fields['shipping']['shipping_postcode']['priority'] = 34;
    $fields['shipping']['shipping_country']['required'] = true;
    $fields['shipping']['shipping_country']['label'] = ' Invoice country';
    $fields['shipping']['shipping_country']['placeholder'] = 'Netherlands..';
    $fields['shipping']['shipping_country']['priority'] = 35;
    $fields['shipping']['shipping_phone']['label'] = 'Shipment Phone Number';
    $fields['shipping']['shipping_phone']['placeholder'] = '06';

    $fields['shipping']['shipping_phone']['required'] = true;

    return $fields;
}
add_filter('woocommerce_shipping_fields', 'misha_remove_fields');

function misha_remove_fields($fields)
{

    $fields['shipping_postcode']['required'] = true;
    return $fields;

}

add_filter('woocommerce_checkout_fields', 'aditya_customfield');

// add_filter( 'woocommerce_default_address_fields' , 'custom_override_default_address_fields' );
// function custom_override_default_address_fields( $fields ) {
//     $fields['billing_postcode']['label'] = 'Postcode';
//     // $fields['billing_postcode']['required'] = true;
//     return $fields;
// }
function address_customfield($fields){
    $fields['billing_postcode']['label'] = 'Postcode';
    $fields['billing_postcode']['required'] = true;
    return $fields;
 }

add_filter( 'woocommerce_default_address_fields' , 'address_customfield' );


add_action('woocommerce_checkout_process', 'my_custom_checkout_field_process');
function my_custom_checkout_field_process()
{
    // Check if set, if its not set add an error.
    /*  if ( ! $_POST['custom_field_new'] )
     wc_add_notice( __( 'Custom Field is compulsory. Please enter a value' ), 'error' ); */
}
//wc_add_notice :- Add and store a notice.

/**
 * Update the order meta with field value
 */
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
add_action('wp_ajax_check_availability_on_front_page', 'check_availability_on_front_page');
add_action('wp_ajax_nopriv_check_availability_on_front_page', 'check_availability_on_front_page');
function check_availability_on_front_page(){
    global $woocommerce, $post, $product, $wpdb, $cart_item_data;
    $s_date = $_POST['start_date_new'];
    $start_date = date("Y-m-d", strtotime($s_date) );
    $e_date = $_POST['end_date_new'];
    $end_date = date("Y-m-d", strtotime($e_date) );
    $product_id_new = $_POST['product_id'];
    $var = '';
   
  
    $booqable_product_id = get_post_meta($product_id_new, 'booqable_product_id', true);
 
    $sDate = new DateTime($start_date);

    $eDate= new DateTime($end_date);
    $difference = $eDate->diff( $sDate);
  

     $days_latest =  $difference->format("%a")+1;

  
     if($booqable_product_id){
       $array = array();
        $productPriceTable = get_field('product_price_per_day',$product_id_new);
        if($productPriceTable){
            foreach($productPriceTable as $priceData){
               array_push($array,$priceData['days']);                       
            }
            if(in_array($days_latest,$array)){
           
            }else{
                $var = 'Please contact to the support <a href="'.get_the_permalink($product_id_new).'/#products-contact">Click Here</a>';
                $res['status'] = "error";
                $res['message'] = $var;
                echo json_encode($res);
                exit;
            }
        }
    
}
   

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, 'https://vr-expert-testomgeving.booqable.com/api/1/products/' . $booqable_product_id . '?api_key=3f77f941bc272c538d1d875ee3ad38efb15f11a495aacaac794113c0724cf714');
    //552be049-03ca-4951-9bd1-2e612a52546f
    // https://company.booqable.com/api/1/products/23b6445d-c846-404b-8628-acb9023d8e5c/availability?interval=month&till=01-02-2018&from=01-01-2018
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    $contents = curl_exec($ch);

    $ObjData = json_decode($contents)->product;

    foreach ($ObjData->stock_items as $value1)
    {
     
        if ($booqable_product_id == $value1->item_id)
        {

            
             $inventry_from_date = $value1->from;
            $inventry_till_date = $value1->till;
              
            $res = array();
            if(($inventry_from_date <=$start_date) && ($inventry_till_date >= $end_date))
            {
                $var = 'Product available';
                $res['status'] = 200;
                $res['message'] = $var;
                echo json_encode($res);
                break;
            } else {
                $var = 'not available';
                $res['status'] = "error";
                $res['message'] = $var;
                echo json_encode($res);
                exit;
            }
        }
    }
    exit;
}

add_action('wp_ajax_check_availability_on_single_product_page', 'check_availability_on_single_product_page');
add_action('wp_ajax_nopriv_check_availability_on_single_product_page', 'check_availability_on_single_product_page');

function check_availability_on_single_product_page()
{
    global $woocommerce, $post, $product, $wpdb, $cart_item_data;
    $s_date = $_POST['start_date_new'];
    $start_date = date("Y-m-d", strtotime($s_date) );
    $e_date = $_POST['end_date_new'];
    $end_date = date("Y-m-d", strtotime($e_date) );
    $product_id_new = $_POST['product_id_new'];
    $var = '';
   
    //$booqable_product_ids = $wpdb->get_results("SELECT * FROM wp_9_postmeta WHERE post_id ='".$product_id_new."' && meta_key='booqable_product_id'");
    $booqable_product_id = get_post_meta($product_id_new, 'booqable_product_id', true);
    
 
    $sDate = new DateTime($start_date);

    $eDate= new DateTime($end_date);
    $difference = $eDate->diff( $sDate);
  

     $days_latest =  $difference->format("%a")+1;

  
     if($booqable_product_id){
       $array = array();
        $productPriceTable = get_field('product_price_per_day',$product_id_new);
        if($productPriceTable){
            foreach($productPriceTable as $priceData){
               array_push($array,$priceData['days']);                       
            }
            if(in_array($days_latest,$array)){
           
            }else{
                $var = 'Please contact to the support <a href="#products-contact">Click Here</a>';
                $res['status'] = "error";
                $res['message'] = $var;
                echo json_encode($res);
                exit;
            }
        }
    
}
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, 'https://vr-expert-testomgeving.booqable.com/api/1/products/' . $booqable_product_id . '?api_key=3f77f941bc272c538d1d875ee3ad38efb15f11a495aacaac794113c0724cf714');
    //552be049-03ca-4951-9bd1-2e612a52546f
    // https://company.booqable.com/api/1/products/23b6445d-c846-404b-8628-acb9023d8e5c/availability?interval=month&till=01-02-2018&from=01-01-2018
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    $contents = curl_exec($ch);

    $ObjData = json_decode($contents)->product;

    foreach ($ObjData->stock_items as $value1)
    {
     
        if ($booqable_product_id == $value1->item_id)
        {

            
             $inventry_from_date = $value1->from;
            $inventry_till_date = $value1->till;
              
            $res = array();
            if(($inventry_from_date <=$start_date) && ($inventry_till_date >= $end_date))
            {
                $var = 'Product available';
                $res['status'] = 200;
                $res['message'] = $var;
                echo json_encode($res);
                break;
            } else {
                $var = 'not available';
                $res['status'] = "error";
                $res['message'] = $var;
                echo json_encode($res);
                exit;
            }
        }
    }
    exit;
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
{          $cart_key = $_POST['cart_key']; 
           $id = $_POST['single_product_id']; 

	       $eDate = $_POST['end_date_new'];
           $sDate = $_POST['start_date_new'];
           $startDate = date("Y-m-d", strtotime($sDate) );
           $endDate = date("Y-m-d", strtotime( $eDate ) );
           $is_cart_var = $_POST['is_cart_var'];
			
    $array = array(
        'id' => $id,
		'cart_key' => $cart_key,
		'end_date_new' => $endDate,
		'start_date_new' => $startDate,
		'is_cart_var' => $is_cart_var
		
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

    $product_cart_id = WC()
        ->cart
        ->generate_cart_id($product_id);
    if (!WC()
        ->cart
        ->find_product_in_cart($product_id))
    {

        WC()
            ->cart
            ->add_to_cart($product_id);
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
            $product_data = $cart_item['line_total'];
            $product_id_key = $cart_item['product_id'];
            $quantity = $cart_item['quantity'];
            $price = WC()
                ->cart
                ->get_product_price($product_data);
            $subtotal = WC()
                ->cart
                ->get_product_subtotal($product_data, $cart_item['quantity']);

            if ($product_id_key == $product_id)
            {
                WC()
                    ->cart
                    ->set_quantity($cart_item_key, $quantity);
            }

        }
        $res['url'] = get_site_url();
        $res['message'] = "Product updated into cart.";
        $res['status'] = 200;
        echo json_encode($res);

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


//cart page button Change procced to checkout as rent now 
function woocommerce_button_proceed_to_checkout() { ?>
    <a href="<?php echo esc_url( wc_get_checkout_url() ); ?>" class="checkout-button button alt wc-forward">
    <?php esc_html_e( 'Rent Now', 'woocommerce' ); ?>
    </a>
    <?php
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


 //function for add event with simple product
  add_action('wp_ajax_add_to_cart_event_service', 'add_to_cart_event_service');
  add_action('wp_ajax_nopriv_add_to_cart_event_service', 'add_to_cart_event_service');
  function add_to_cart_event_service(){
    global $wp;
	 $res=array();
	         $event_service_product_id = $_POST['event_service_product'];
             $quantity = $_POST['quantity'];
         if (!WC()
         ->cart
         ->find_product_in_cart($event_service_product_id))
     {
        
        if(WC()->cart->add_to_cart($event_service_product_id, $quantity )){
        $res['message'] = "Event Services added into cart.";
          $res['status'] = 200;
          $res['redirect'] =   home_url( $wp->request);
         echo json_encode($res);
         exit;
        }
     }else if(WC()
     ->cart
     ->find_product_in_cart($event_service_product_id)){ 
        WC() ->cart->set_quantity($event_service_product_id, $quantity);
        $res['message'] = "Event Services updated into cart.";
        $res['status'] = 200;
        echo json_encode($res);
      exit;
     }else{
        $res['message'] = "Event Services not added into cart.";
        $res['status'] = 400;
        echo json_encode($res);
        exit;

 }
 exit;
 }
 add_action('wp_ajax_add_to_cart_installation_service', 'add_to_cart_installation_service');
 add_action('wp_ajax_nopriv_add_to_cart_installation_service', 'add_to_cart_installation_service');
 
 function add_to_cart_installation_service(){
	 $res=array();
      $product_quantity ='';
	     $installation_service_product_id = $_POST['installation_service_product_id'];
          $current_single_product_id = $_POST['current_single_product_id'];
	  foreach( WC()->cart->get_cart() as  $cart_item_key => $cart_item ){
		                                $product_id = $cart_item['product_id'];
                                              
						if($product_id == $current_single_product_id){
                           
                                  $product_quantity  = $cart_item['quantity'];
                                  WC() ->cart->set_quantity($cart_item_key, $product_quantity + 1);
                                 
                           
						           break;
								}
                                
	  }
if($product_quantity){
    $result = false;
 foreach( WC()->cart->get_cart() as  $cart_item_key => $cart_item ){
  $product_id = $cart_item['product_id'];
  if($installation_service_product_id !==''){
    if ($product_id == $installation_service_product_id){
    WC() ->cart->set_quantity($cart_item_key, $product_quantity + 1);
    $result = true;
    break;
    }else{
        $qty=1;
        WC() ->cart ->add_to_cart($installation_service_product_id,$qty);  
        $res['message'] = "Installation service added and product updated into cart.";
        $res['status'] = 200;
        echo json_encode($res);
        exit;
    }
    }
                
        }
    if($result)
    {
										   $res['message'] = "Product Updated into cart.";
                                           $res['status'] = 200;
                                           echo json_encode($res);
									       exit;
									       }else{
										   $res['message'] = "Product not Updated into cart.";
                                           $res['status'] = 400;
                                         echo json_encode($res);
									     exit;
									}
									
}else{
    if($current_single_product_id !=='' && $installation_service_product_id !==''){
        $qty = 1;
        $results= false;
        foreach( WC()->cart->get_cart() as  $cart_item_key => $cart_item ){
            $product_id = $cart_item['product_id'];
            if($installation_service_product_id !==''){
          if ($product_id == $installation_service_product_id){
             $key = $cart_item_key;
            $product_quantity_ins  = $cart_item['quantity'];
            $results= true;
          break;
          }
            }
                       
              }
              if($result){
                WC() ->cart->set_quantity($key, $product_quantity_ins + $qty);
              }else{
                WC() ->cart ->add_to_cart($installation_service_product_id,$qty);  
              }
     
      if( (WC() ->cart ->add_to_cart($current_single_product_id,$qty))){
        
            $res['message'] = " Both Product added into cart.";
            $res['redirect'] = wc_get_cart_url();
                                                   $res['status'] = 200;
                                                 echo json_encode($res);
                                                 exit; 
}else{
    $res['message'] = " Both Product not added into cart.";       
     $res['status'] = 400;
     echo json_encode($res);
      exit; 
    }

    }
}
	 exit;
 }



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
// Disable the Zip/postcode validation 

add_filter( 'woocommerce_default_address_fields' , 'njengah_disable_postcode_validation' );
 
function njengah_disable_postcode_validation( $address_fields ) {
  $address_fields['billing_postcode']['required'] = false;
  return $address_fields;
}

include 'custom-functions.php'; 

add_action('wp_ajax_myfilter_brill_category' , 'myfilter_brill_category');
add_action('wp_ajax_nopriv_myfilter_brill_category','myfilter_brill_category');
function myfilter_brill_category(){ 
  
    $term_id = $_POST['termid_data'];
    $data_array = $_POST['filter_value']?$_POST['filter_value']:'';

    $meta_query = array(
        'relation' => 'OR',
    );
   

    $result = array(); ?>
 
  <?php  if(isset( $data_array)){

        foreach( $data_array as  $data_id_array){

           
            $meta_query[] = array(
                'key' => 'type_vr_bril',
                'value' =>  $data_id_array ,
                'compare' => 'LIKE'
            );

        }
     
        

      

    }
  
    $args = array(

        'post_type' => 'product',
        'posts_per_page' =>-1, 
        'post_status' => 'publish',
        'meta_query' => $meta_query,
        'tax_query' => array(
            'relation' => 'OR',
            array(
                'taxonomy' => 'product_cat',
                'field' => 'term_id', //This is optional, as it defaults to 'term_id'
                'terms' =>  $term_id,
            ),
)

        );

     
    $query = new WP_Query( $args ); 
    
   $result='<div class="shop-child-2">';
     foreach($query->posts as $value1[0]=>$val){
          $product_id = $val->ID; 
          $product_title = $val->post_title;
          $product_content= $val->post_content;
          $singleproductlink= get_permalink($val->ID);
          
   
           echo'<div class="p-slide">';
      echo'<a class="block" href="'. $singleproductlink.'">
               <div class="p-img">';
          $featuredimageurl = get_the_post_thumbnail_url($product_id); 
          $productImgUrl= '<img src="'.get_stylesheet_directory_uri().'/img/woocommerce-placeholder.png">';
          if($featuredimageurl){
  echo'<img src="' .$featuredimageurl.'" class="" alt="slx">'; } else{
    echo $productImgUrl;
  }
  echo '</div></a> 
               <div class="p-content">
                   <h3 class="p-title medium-txt">';
           
                       echo'<a href="'.$singleproductlink.'">'; echo mb_strimwidth($product_title, 0, 20, '.....'); 
                       echo'</a>
                   </h3>
            <a class="block" href="'. $singleproductlink.'">
                   <p class="p-description regular-txt">'; echo mb_strimwidth($product_content, 0, 30, '.....'); echo'</p>
                   <div class="index-pricing medium-txt">
                       <span>
                         From €40/Day
                       </span>
                   </div>
            </a>

                   <div class="triangle-bottomright">
                       <a class="x-shop hv-hide" href="">
                           <svg id="Group_1498" data-name="Group 1498" xmlns="http://www.w3.org/2000/svg" width="18.467" height="14.729" viewBox="0 0 18.467 14.729">
                               <rect id="Rectangle_273" data-name="Rectangle 273" width="12.082" height="1.59" rx="0.795" transform="translate(5.432 10.597)" fill="#fff"></rect>
                               <circle id="Ellipse_64" data-name="Ellipse 64" cx="1.59" cy="1.59" r="1.59" transform="translate(4.478 11.55)" fill="#fff"></circle>
                               <circle id="Ellipse_65" data-name="Ellipse 65" cx="1.59" cy="1.59" r="1.59" transform="translate(14.971 11.55)" fill="#fff"></circle>
                               <rect id="Rectangle_274" data-name="Rectangle 274" width="12.082" height="1.59" rx="0.795" transform="translate(5.379 0) rotate(82)" fill="#fff"></rect>
                               <rect id="Rectangle_275" data-name="Rectangle 275" width="5.405" height="1.59" rx="0.795" transform="translate(0 0.095) rotate(-1)" fill="#fff"></rect>
                               <path id="Path_78" data-name="Path 78" d="M14462-12222.029h13.035l-1.9,7.76h-10.447Z" transform="translate(-14456.573 12223.714)" fill="#fff"></path>
                           </svg>
                       </a>
                       <div class="x-shop hover-x">
                           <a class="a-cart" href="">
                               <svg xmlns="http://www.w3.org/2000/svg" width="28" height="55" viewBox="0 0 28 55">
                                   <text id="_" data-name="+" transform="translate(0 41)" fill="#fff" font-size="39" font-family="Poppins-Medium, Poppins" font-weight="500">
                                       <tspan x="0" y="0">+</tspan>
                                   </text>
                               </svg>
                           </a>
                       </div>
                   </div>
               </div>
           </div>';
    } 
          
echo'</div>';
   
    json_encode($result);
exit();
}
add_action('wp_ajax_add_accessories_product' , 'add_accessories_product');
add_action('wp_ajax_nopriv_add_accessories_product','add_accessories_product');
function add_accessories_product(){
    global $woocommerce, $post, $product, $wpdb, $cart_item_data;
     $s_date = $_POST['start_date'];
    $start_date = date("Y-m-d", strtotime($s_date) );
     $e_date = $_POST['start_date'];
    $end_date = date("Y-m-d", strtotime($e_date) );
     $accessories_product_id = $_POST['accessories_product_id'];
    $var = '';

    //$booqable_product_ids = $wpdb->get_results("SELECT * FROM wp_9_postmeta WHERE post_id ='".$product_id_new."' && meta_key='booqable_product_id'");
    $booqable_product_id = get_post_meta($accessories_product_id, 'booqable_product_id', true);
 $booqable_product_id ;
    /* 	 foreach ($booqable_product_ids as $value){
    
        $booqable_product_id = $value->meta_value; 
    
    } */
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, 'https://vr-expert-testomgeving.booqable.com/api/1/products/' . $booqable_product_id . '?api_key=3f77f941bc272c538d1d875ee3ad38efb15f11a495aacaac794113c0724cf714');
    //552be049-03ca-4951-9bd1-2e612a52546f
    // https://company.booqable.com/api/1/products/23b6445d-c846-404b-8628-acb9023d8e5c/availability?interval=month&till=01-02-2018&from=01-01-2018
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    $contents = curl_exec($ch);

    $ObjData = json_decode($contents)->product;

    foreach ($ObjData->stock_items as $value1)
    {
     
        if ($booqable_product_id == $value1->item_id)
        {

            
             $inventry_from_date = $value1->from;
          
            $inventry_till_date = $value1->till;
           
              
            $res = array();
            if(($inventry_from_date <=$start_date) && ($inventry_till_date >= $end_date))
            {
                $var = 'Product available';
                $res['status'] = 200;
                $res['message'] = $var;
                echo json_encode($res);
                break;
            } else{
                $var = 'not available';
                $res['status'] = "error";
                $res['message'] = $var;
                echo json_encode($res);
                exit;
            }
        }
    }
    exit;
}

add_action( 'woocommerce_before_calculate_totals', 'add_custom_price' );

function add_custom_price( $cart_object ) {
    $custom_price = 10; // This will be your custome price  
    foreach ( $cart_object->cart_contents as $key => $value ) {
        $product_id_key = $value['product_id'];
        $check_boo_id = get_post_meta($product_id_key , 'booqable_product_id', true);
        if( $check_boo_id){
             
            if($value['date_on_sale_from'] != '' && $value['date_on_sale_to'] != ''){

                $start_date = $value['date_on_sale_from'][0];
                $end_date = $value['date_on_sale_to'][0];
                $sDate = new DateTime($start_date);

                $eDate= new DateTime($end_date);
            
                $days_latest='';
            
                $difference = $eDate->diff($sDate);
                $price_value = '';
            
                $days_latest =  $difference->format("%a")+1;
                $productPriceTable = get_field('product_price_per_day',$product_id_key);
                if($productPriceTable){
                    foreach($productPriceTable as $priceData){
                        $days_value = $priceData['days'];
                        if($days_value == $days_latest){
                            $price_value = $priceData['price'];
                            break;
                        }
                    }
                }
               
                if($price_value){
                    $value['data']->set_price($price_value);
                }

   
               }
             
        }


    }
}

//Admin custom css
add_action('admin_head', 'my_custom_css');
function my_custom_css() {
  echo '<style>
  .select2-container {
    z-index: 1;
 } </style>';
}

add_filter('woocommerce_get_price_html', 'edit_price_display', 10, 2);
function edit_price_display($price, $product){
    
        $currency = get_woocommerce_currency();
        $price_cstm = wc_get_price_to_display($product); // get the price without extra span tags
        if($price_cstm > 0){
            $price .= '<span class="dd cstm_price_api woocommerce-Price-amount vat" >,-</span>';
        }   
    return $price;
}

$site_url = site_url();
if ($site_url=="https://vr-expert-rental.nl"){
function custom_cart_totals_order_total_html( $value ){
    $value = '<strong>' . WC()->cart->get_total() . '</strong> ';

// If prices are tax inclusive, show taxes here.
	if ( wc_tax_enabled() && WC()->cart->display_prices_including_tax() ) {
		$tax_string_array = array();
		$cart_tax_totals  = WC()->cart->get_tax_totals();
		if ( get_option( 'woocommerce_tax_total_display' ) === 'itemized' ) {
			foreach ( $cart_tax_totals as $code => $tax ) {
				$tax_string_array[] = sprintf( '%s %s', $tax->formatted_amount, $tax->label );
			}
		} elseif ( ! empty( $cart_tax_totals ) ) {
			$tax_string_array[] = sprintf( '%s %s', wc_price( WC()->cart->get_taxes_total( true, true ) ), WC()->countries->tax_or_vat() );
		}

        if ( ! empty( $tax_string_array ) ) {
            $taxable_address = WC()->customer->get_taxable_address();
            $estimated_text  = '';
            $value .= '<small class="includes_tax">' . sprintf( __( ',-(exc. BTW)', 'woocommerce' ), implode( ', ', $tax_string_array ) . $estimated_text ) . '</small>';
        }
    }
    return $value;
}

add_filter( 'woocommerce_cart_totals_order_total_html', 'custom_cart_totals_order_total_html', 20, 1 );
}


/*update the price when price is not added in booqable */
function priceUpdate($post_id) {
    if (get_post_status($post_id) == 'publish') {
        $id = $post_id;
        $boo = get_post_meta($id,'booqable_product_id',true);
     
        if($boo){
            $price = get_post_meta($id,'_price',true);
            if($price){

            }else{
                $productPriceTable = get_field('product_price_per_day',$id);
                if($productPriceTable){
                    foreach($productPriceTable as $priceData){
                          if($priceData['days'] == '1'){
                            $price_value = $priceData['price'];
                            update_post_meta($id,'_price',$price_value);
                            update_post_meta($id,'_regular_price',$price_value);
                           // break;
                          }
                           
                        
                    }
                }
            }
        }
      
    }
}
add_action( 'acf/save_post', 'priceUpdate' );


add_action( 'woocommerce_add_order_item_meta', 'startendDate_order_item_meta', 10, 2 );

function startendDate_order_item_meta( $item_id, $cart_item ) {

	// get product meta
    $startDate = $cart_item['date_on_sale_from'];
    $endDate = $cart_item['date_on_sale_to'];

	// if not empty, update order item meta
 	if( ! empty( $startDate ) &&  ! empty( $endDate ) ) {
         $rental_date = $startDate[0].' - '.$endDate[0];
		wc_update_order_item_meta( $item_id, 'rental_date', $rental_date );
        wc_update_order_item_meta( $item_id, 'startDate', $startDate[0] );
        wc_update_order_item_meta( $item_id, 'endDate', $endDate[0] );
     
	}
	
}
add_filter( 'gform_confirmation', 'ag_custom_confirmation', 10, 4 );
function ag_custom_confirmation( $confirmation, $form, $entry, $ajax ) {
	add_filter( 'genesis_after_footer', 'ag_overlay');
	return '<div id="gform-notification">  Thankyou For Your Response !' .$confirmation.'</div>';
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
              <div class="faq_answer regular-txt"><?php echo get_the_excerpt($faqs_ids1); ?></div>
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
              <div class="faq_answer regular-txt"><?php echo get_the_excerpt($faqs_ids); ?></div>
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
                add_action( 'woocommerce_order_status_processing', 'create_order_in_booqable_account', 10, 1);
                function create_order_in_booqable_account($order_id){
                    $booqData = array();
                    $order = wc_get_order($order_id);
                    $user_id = $order->get_user_id();
                    $customer_bookable_id = get_user_meta($user_id,'booqable_customer_id',true);
                    if($customer_bookable_id){
  
                    }else{
  
                    $UserData =   get_user_by('ID',$user_id);
                    $userMainData = $UserData->data;
                    $useremail = $userMainData->user_email;
                     $name = $userMainData->user_nicename;
                       $customerDataPayload = array(
                           'customer'=>array(
                               'name' => $name,
                               'email'=> $useremail
                           )
                           );
                           $customerPayload = json_encode( $customerDataPayload );
                          
                           $url = 'https://vr-expert-testomgeving.booqable.com/api/1/customers?api_key=3f77f941bc272c538d1d875ee3ad38efb15f11a495aacaac794113c0724cf714';
  
                           $ch = curl_init();
                          curl_setopt($ch, CURLOPT_URL,$url);
                          curl_setopt($ch, CURLOPT_POST, 1);
                  
                          curl_setopt($ch, CURLOPT_POSTFIELDS, $customerPayload);
                  
                           curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
                  
                          curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  
  
                           $result = curl_exec($ch); 
                       
                           curl_close($ch);
                          $resdecodeData =  json_decode($result);
                
                      $main_result =  $resdecodeData->customer;
                      $booqable_customer_id =  $main_result->id;
                      add_user_meta($user_id,'booqable_customer_id',$booqable_customer_id);
                      $customer_bookable_id = get_user_meta($user_id,'booqable_customer_id',true);
                         
                    }
                    foreach($order->get_items() as $item_id => $item) {
                      $product = apply_filters( 'woocommerce_order_item_product', $order->get_product_from_item( $item ), $item );
                      $pid = $product->get_id();
                      $item_quantity  = $item->get_quantity(); 
                      $boo = get_post_meta($pid,'booqable_product_id',true);
                      if($boo){
                     
                        $startDate = wc_get_order_item_meta( $item_id, 'startDate', true );
                        $endDate = wc_get_order_item_meta( $item_id, 'endDate', true );
                        $dates = array(
                            'start_date' => $startDate.' 9:00',
                            'stops_at' => $endDate.' 9:00'
                        );
                        
                       $quantity['id'] = $boo;
                       $quantity['quantity'] = $item_quantity;
                           
                       array_push($booqData, $quantity);
   
                      }
                  }

                  /*booqable API call */

                  if($booqData){
                    $booqable_order_response = get_post_meta($order->get_id(),'booqable_order_response',true);
                    if($booqable_order_response == ''){
                $idsData = [];
         foreach ($booqData as $value) { 
          $idsData[$value['id']] = $value['quantity'];
      }
                    $orderCreatePayload = array(
                        'order' => array(
                            'customer_id' =>$customer_bookable_id,
                            'starts_at' =>  $dates['start_date'].' 9:00',
                            'stops_at' => $dates['stops_at'].' 9:00'
                        )
                      );
                      $bodyPayload = json_encode($orderCreatePayload);
                      $url = 'https://vr-expert-testomgeving.booqable.com/api/1/orders?api_key=3f77f941bc272c538d1d875ee3ad38efb15f11a495aacaac794113c0724cf714';

                       $ch = curl_init();
                      curl_setopt($ch, CURLOPT_URL,$url);
                      curl_setopt($ch, CURLOPT_POST, 1);
              
                      curl_setopt($ch, CURLOPT_POSTFIELDS, $bodyPayload);
              
                       curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
              
                      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);


                       $result = curl_exec($ch); 
                     
                         curl_close($ch);
                        
                         $orderCreateResponse = json_decode($result,true);
                          
                          if(array_key_exists('order',$orderCreateResponse)){ 

                          $orderID = $orderCreateResponse['order']['id'];
                         
                          $orderCreatePayload = array(
                              'ids' => $idsData
                            );
                            $bodyPayload = json_encode($orderCreatePayload);
                          $url = 'https://vr-expert-testomgeving.booqable.com/api/1/orders/'.$orderID.'/book?api_key=3f77f941bc272c538d1d875ee3ad38efb15f11a495aacaac794113c0724cf714';

                          $ch = curl_init();
                         curl_setopt($ch, CURLOPT_URL,$url);
                         curl_setopt($ch, CURLOPT_POST, 1);
              
                         curl_setopt($ch, CURLOPT_POSTFIELDS, $bodyPayload);
              
                          curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
              
                         curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                         $result = curl_exec($ch); 
                        curl_close($ch);
                         $bodyPayload= json_encode(array());
                     
                         $url = 'https://vr-expert-testomgeving.booqable.com/api/1/orders/'.$orderID.'/concept?api_key=3f77f941bc272c538d1d875ee3ad38efb15f11a495aacaac794113c0724cf714';

                        $ch = curl_init();
                        curl_setopt($ch, CURLOPT_URL,$url);
                        curl_setopt($ch, CURLOPT_POST, 1);
          
                        curl_setopt($ch, CURLOPT_POSTFIELDS, $bodyPayload);
          
                         curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
          
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                        $result = curl_exec($ch); 
                       curl_close($ch);
                        $bodyPayload= json_encode(array());
                     
                        $url = 'https://vr-expert-testomgeving.booqable.com/api/1/orders/'.$orderID.'/reserve?api_key=3f77f941bc272c538d1d875ee3ad38efb15f11a495aacaac794113c0724cf714';

                        $ch = curl_init();
                        curl_setopt($ch, CURLOPT_URL,$url);
                        curl_setopt($ch, CURLOPT_POST, 1);
          
                        curl_setopt($ch, CURLOPT_POSTFIELDS, $bodyPayload);
          
                        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
          
                         curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                        $result = curl_exec($ch); 
                        curl_close($ch); 
                        $data = get_post_meta($order->get_id(),'booqable_order_response',true);
                        if($data){
                          array_push($data,$result);
                          update_post_meta($order->get_id(),'booqable_order_response',$data);
                        }else{
                            $newArray = array();
                            array_push($newArray,$result);
                          update_post_meta($order->get_id(),'booqable_order_response',$newArray);
                        }    

                         }else{
                            update_post_meta($order->get_id(),'booqable_order_response',$result);
                         }
                        }

                  }
  
                  } 

                add_filter( 'woocommerce_registration_error_email_exists', function( $html ) {
                    $url =  wc_get_page_permalink( 'myaccount' );
                    $url = add_query_arg( 'redirect_checkout', 1, $url );
                    $html = str_replace( 'Please log in', '<a href="'.$url.'"><strong>Please log in</strong></a>', $html );
                    return $html;
                } );
                
                add_filter( 'woocommerce_login_redirect', function( $redirect, $user ) {
                    if ( $_GET['redirect_checkout'] ) {
                        return wc_get_checkout_url();
                    } elseif ( wp_get_referer() ) {
                        return wp_get_referer();
                    } else {
                        return $redirect;
                    }
                }, 10, 2 );

                if($site_url=="https://vr-expert-rental.nl"){
                    add_filter( 'woocommerce_registration_error_email_exists', function( $html ) {
                        $url =  wc_get_page_permalink( 'myaccount' );
                        $url = add_query_arg( 'redirect_checkout', y1, $url );
                        $html = str_replace( 'Log in', '<a href="'.$url.'"><strong>Log in</strong></a>', $html );
                        return $html;
                    } );
                    
                    add_filter( 'woocommerce_login_redirect', function( $redirect, $user ) {
                        if ( $_GET['redirect_checkout'] ) {
                            return wc_get_checkout_url();
                        } elseif ( wp_get_referer() ) {
                            return wp_get_referer();
                        } else {
                            return $redirect;
                        }
                    }, 10, 2 );
                }

add_action('woocommerce_admin_order_data_after_order_details', 'my_custom_order_manipulation_function');
function my_custom_order_manipulation_function( $orderID ) {
    $jsonOrderDa = json_decode($orderID,true);
   
    $orderresponse =  get_post_meta($jsonOrderDa['id'],'booqable_order_response',true);
   
    if($orderresponse){
        echo '<h3 class="form-field form-field-wide wc-customer-user">Booqable Order Id</h3>';
        foreach($orderresponse as $data){
        $jsonOrder = json_decode($data,true);
          if(array_key_exists('order',$jsonOrder)){ 
            $orderData = $jsonOrder['order'];
            $number = $orderData['number'];
            if($number){
                
                echo '<p class="form-field form-field-wide wc-customer-user"><a href="https://vr-expert-testomgeving.booqable.com/orders/'.$orderData["id"].'" target="_blank">Order Number #'.$number.'</a></p>';
            }
        }
    }
}
}
                
?>