<?php 

add_action('wp_ajax_myfilter2' , 'myfilter2');

add_action('wp_ajax_nopriv_myfilter2','myfilter2');


function myfilter2(){

   

    $data_array = $_POST['contentterm_data']?$_POST['contentterm_data']:'';

    $prod_assgn = $_POST['prod_assgn']?$_POST['prod_assgn']:'';

    $rating_star = $_POST['rating_star']?$_POST['rating_star']:''; 

    $result = array(); 

    if($prod_assgn){
        $prod_assgnData = array();
        foreach($prod_assgn as $data){
            if($data == 'all'){

            }else{
                array_push($prod_assgnData, $data);
            }
        }
        if($prod_assgnData){
            $prod_assgn = $prod_assgnData;
        }else{
            $prod_assgn = '';
        }
    }

  ?>

    <div class="simple-grids">

        

		 <?php 

         if(empty($data_array) || $data_array == NULL){

            $terms = get_terms([

                'taxonomy' => 'genre',

                'hide_empty' => false,

            ]);

            $data_array = array();

            foreach( $terms as $term_cat_id_all){

                array_push($data_array,$term_cat_id_all->slug);

            }

         }

           

			

            foreach ( $data_array as $term_cat_slug) { 

               

                $term_cat = get_term_by('slug', $term_cat_slug, 'genre');


                $term_cat_id = $term_cat->term_id; 

                $term_name = $term_cat->name;

				

            $meta_querys = array('relation' => 'OR');

            $tax_querys = array();

            

                if(isset($prod_assgn)){

                    foreach($prod_assgn as $prod_id){

                        $meta_querys[] = array(

                            'key' => 'product_assign',

                            'value' =>  '"'.$prod_id.'"' ,

                            'compare' => 'LIKE'

                        );

                    }

              

                }

                if(isset($rating_star)){

                    foreach($rating_star as $prod_id_star){

                        $meta_querys[] = array(

                            'key' => 'software_rating',

                            'value' => $prod_id_star ,

                            'compare' => 'LIKE'

                            

                        );

                    }

                    

                   

                }



                if(isset($term_cat_id)){

                    $tax_querys[] = array(

                        'taxonomy' =>'genre',

                        'field' => 'term_id',

                        'terms' => $term_cat_id 

                        

                    );



                }

                $args = array(

                    'post_type' => 'contents',

                    'posts_per_page' =>-1, 

                    'post_status' => 'publish',

                    'tax_query' => $tax_querys,

                    'meta_query' =>$meta_querys,


                    );

                $query = new WP_Query( $args ); 
               
                   if($query->found_posts > 0){

                echo '<div class="action-horror mb-38 ">

                        <div class="index-product slider">

                             <div id="filterData">
                                
                                <h2 class="event-title-1">'. $term_name.'<input type="hidden" id="termid'.$term_cat_id.'" value="'.$query->post_count.'"></h2>

                                <div class="owl-slider">

                                    <div  class="Actionproducts  owl-carousel" id="Actionproducts'.$term_cat_id.'">';

                                    foreach ($query->posts as $value1[0]=>$val){

                                        content_repeat_box($val); 

                                    }

                echo '</div>

                    </div>

                    </div>

                </div>

            </div> <script>carasouel('.$term_cat_id.')</script>';
                                }

            }

        

            ?>

			

    </div>

<?php

exit;

}

                

                    

                function content_repeat_box( $val){          

                      $product_id = $val->ID;
                   

                      $product_title = $val->post_title;

                      $product_content = $val->post_content;

                      $featuredurl = get_the_post_thumbnail_url($product_id);

 
              

                        $term_id_name = wp_get_object_terms( $product_id, 'genre', array( 'fields' => 'names' ) );

                        

                       foreach($term_id_name as $term_id_names){ 

                    ?>

                    <div class="item">

                        <div class="item-g-3">

                            <div class="vr-soft position-relative">

                                <div class="soft-img position-relative">
                                    <?php if($featuredurl){ ?>
                                    <img src="<?php echo $featuredurl; ?>" class="" alt="product-search">
                                    <?php } else{ ?>
                                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/woocommerce-placeholder.png" class="" alt="product-search">
                                    <?php } ?>
                                    <div class='rating-stars rating-read-onlys'>

                                        <ul>

                                        <?php   $select= get_field('software_rating',$val->ID);

                                                $i=1;

                                                $total=5;

                                                $disstar=$total-$select;



                                                for ($i = 1; $i <= $total; $i++) {

                                            

                                                if($i <= $select) {

                                                    

                                                ?>

                                                <li class='star'>

                                                <i class='fa fa-star checked'></i>

                                                </li>

                                                <?php 

                                                }else if($i<= $disstar){

                                                    ?> 

                                                    <li class='star'>

                                                    <i class='far fa-star'></i>

                                                    </li>

                                                    <?php



                                                }else{?>

                                                <li class='star'>

                                                <i class='far fa-star'></i>

                                                </li>

                                                <?php } 

                                                }

                                                    ?>          

                                        </ul>

                                    </div>

                                </div>

                               

                                <div class="vr-soft-blue">

                                    <h2 class="b-16"><?php echo $product_title; ?></h2>
                                     <div class="uneqal">
                                    <?php foreach($term_id_name as $term_ids){ ?>

                                    <p class="r-12"><?php echo $term_ids; ?></p>

                               <?php }?>
                               </div>

                                    <div class="fl-vr">

                                        <div class="items-icons">

                                            <ul>

                                            <?php

                                                    if(get_field('product_assign',$product_id)){

                                                    $assignp_ids = get_field('product_assign',$product_id); 

                                                    foreach($assignp_ids as $ids){

                                                        $product_thumbnailurl = get_the_post_thumbnail_url($ids);                             
                                                ?>

                                                <li class="r-50">
                                                    <a href="<?php echo get_the_permalink($ids); ?>">
                                                     <?php if($product_thumbnailurl){ ?>
                                                    <img src="<?php echo $product_thumbnailurl; ?>" class="" alt="product-search">
                                                    <?php } else{ ?>
                                                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/woocommerce-placeholder.png" class="" alt="product-search">
                                                    <?php } ?>
                                                    </a>
                                                </li>

                                                <?php    

                                                }

                                                }?>

                                            </ul>

                                        </div>

                                      

                                    </div>

                                
                                </div>

                               

                                <div  class="soft-data">

                                    <h3 class="b-16"><?php echo $product_title; ?></h3>

                                    <div class="w-186">

                                        <p class="sf-text r-12"><?php echo $product_content; ?></p>

                                        <?php if( have_rows('software_product_contents', $val->ID) ){ ?>

                                        <?php while( have_rows('software_product_contents', $val->ID) ){ the_row();?>

                                            <p class="sf-link r-12">

                                            <?php the_sub_field('software_product_heading',$val->ID);?>

                                               

                                            </p>  

                                            <div class="el-link">        

                                            <?php the_sub_field('software_product_link',$val->ID);?>   

                                            </div>     

                                            <?php } }?>

                                    </div>

                                </div>

                               

                            </div>

                        </div>

                    </div>

                    <?php                        

                         } ?>

<?php 

}



//Search Functionality
add_action( 'wp_footer', 'ajax_fetch_1' );

function ajax_fetch_1() { ?>



    <script type="text/javascript">



   

    jQuery('#datafetch').hide();

        function fetchResults() {

            

            var keyword = jQuery('#searchInput').val(); 

            var count = jQuery('#searchInput').val().length;

            console.log(count);

    

    if(keyword == ""){

        jQuery('#datafetch').hide();

        jQuery('#datafetch').html("");

    } else if(count > 1) {

        



                jQuery.ajax( {



                    url: '<?php echo admin_url('admin-ajax.php'); ?>',

                    type: 'post',

                    data: { action: 'data_fetch_1', keyword: jQuery('#searchInput').val() },

                    success: function(data) {

                        jQuery('#datafetch').show();

                        jQuery('#datafetch').html( data );

                    }

                });

            }



           

        }

        jQuery('#datafetchmobile').hide();

        function fetchResultsmobile() {

            

            var keyword = jQuery('#searchInputmobile').val(); 

            var count = jQuery('#searchInputmobile').val().length;

            console.log(count);

    

    if(keyword == ""){

        jQuery('#datafetchmobile').hide();

        jQuery('#datafetchmobile').html("");

    } else if(count > 1) {

        



                jQuery.ajax( {



                    url: '<?php echo admin_url('admin-ajax.php'); ?>',

                    type: 'post',

                    data: { action: 'data_fetch_mobile', keyword: jQuery('#searchInputmobile').val() },

                    success: function(data) {

                        jQuery('#datafetchmobile').show();

                        jQuery('#datafetchmobile').html( data );

                    }

                });

            }



           

        }

    

       



    </script>

<?php

}

    add_action('wp_ajax_data_fetch_1' , 'product_fetch');

    add_action('wp_ajax_nopriv_data_fetch_1','product_fetch');

    function product_fetch() {

    

        $the_query = new WP_Query( array( 'posts_per_page' => -1, 's' => esc_attr( $_POST['keyword'] ), 'post_type' => 'product' ) );

    

        if( $the_query->have_posts() ) {

            while( $the_query->have_posts() ): $the_query->the_post(); 

            $product_url = esc_url( post_permalink() );

            $product_title = get_the_title();

            $price = get_post_meta(get_the_ID(), '_price', true );

            $_product = wc_get_product( get_the_ID());

            $product_price = $_product->get_price_html();

            $product_img = get_the_post_thumbnail_url();

            $woocats = get_the_terms(get_the_ID(),'product_cat');

            $product_img = get_the_post_thumbnail_url();
           



           

        echo '<li class="repeat-Li"><a class="block Block-li" href="'.$product_url.'">

        <div class="Hs-products">

       <div class="sr-Img-1">
       
        <img src="'.get_stylesheet_directory_uri().'/img/woocommerce-placeholder.png">

        </div>

        <div class="Hsp-txt">

        <p class="prod-title">'.$product_title.'</p>';
   
        if( have_rows('product_price_per_day',$product_id) ):

          while( have_rows('product_price_per_day',$product_id) ) : the_row();

            $days_value = get_sub_field('days');
            $price_value = get_sub_field('price');

            if($days_value == 1){ 
                $days_value = get_sub_field('days');
                $price_value = get_sub_field('price'); ?>
               <?php echo'<p class="prod-price">Price: €<span class="prod-cstprice">'.$price_value.'</span>/Day</p>'; ?>
           <?php  }
             endwhile;
             else : ?>
                <?php echo'<p class="prod-price">Price: <span class="prod-cstprice">'.$product_price.'</span></p>'; 
         	 endif;
        foreach ( $woocats as $cat ) {

                echo '<p class="prod-cat">Category: <span class="prod-cstcat">'.$cat->name.'</span></p>';

            }

        

            echo '</div></div></a></li>';

     

             endwhile;

           ?>

           <div class="Search-all-button">

               <p>See more search results for '<?php echo $_POST['keyword']?>' in:</p>

        <form role="search" method="get" class=" woocommerce-product-search" action="<?php echo esc_url( home_url( '/'  ) ); ?>">

        <button type="text" class="td-widget-search-input search-field" id="searchInput" onkeyup="fetchResults()" >Show All Results</button>

            

        </form>

    </div>

           <?php

        }else{  

            echo '<div id="product-search-results-1" class="product-search-r">

                    <div id="product-search-results-content-2" class="product-search-results-c">

                        <div class="no-results-product">No Result Found.</div>

                    </div>

                </div>';            

        }

    die();

    }



    //mobile

    add_action('wp_ajax_data_fetch_mobile' , 'product_fetchmobile');

    add_action('wp_ajax_nopriv_data_fetch_mobile','product_fetchmobile');

    function product_fetchmobile() {

    

        $the_query = new WP_Query( array( 'posts_per_page' => -1, 's' => esc_attr( $_POST['keyword'] ), 'post_type' => 'product' ) );

    

        if( $the_query->have_posts() ) {

            while( $the_query->have_posts() ): $the_query->the_post(); 

            $product_url = esc_url( post_permalink() );

            $product_title=$product_content = get_the_title();

            mb_strimwidth($product_content, 0, 20, '.....');

            $price = get_post_meta(get_the_ID(), '_price', true );

            $product_price = wc_price( $price );

            $product_img = get_the_post_thumbnail_url();

        if($product_img!=''){
            $product_img = get_the_post_thumbnail_url();
        }else{ 
           $productImgUrl= '<img src="'.get_stylesheet_directory_uri().'/img/woocommerce-placeholder.png">';
        }
                    $woocats = get_the_terms(get_the_ID(),'product_cat');

          



           

        echo '<li class="repeat-Li"><a class="block Block-li" href="'.$product_url.'">

        <div class="Hs-products">

       <div class="sr-Img-1">';

       echo $productImgUrl;

        echo '</div>

        <div class="Hsp-txt">

        <p class="prod-title">'.$product_title.'</p>';
        if( have_rows('product_price_per_day',$product_id) ):
            
            while( have_rows('product_price_per_day',$product_id) ) : the_row();
           
              $days_value = get_sub_field('days');
              $price_value = get_sub_field('price');
             
              if($days_value == 1){ 
                  $days_value = get_sub_field('days');
                  $price_value = get_sub_field('price'); ?>
                 <?php echo'<p class="prod-price">Price: €<span class="prod-cstprice">'.$price_value.'</span>/Day</p>'; ?>
             <?php  }
               endwhile;
               else : ?>
                  <?php echo'<p class="prod-price">Price: <span class="prod-cstprice">'.$product_price.'</span>,-</p>';?>
            <?php	 endif;
      
        foreach ( $woocats as $cat ) {

                echo '<p class="prod-cat">Category: <span class="prod-cstcat">'.$cat->name.'</span></p>';

            }

        

            echo '</div></div></a></li>';

     

             endwhile;

           ?>

           <div class="Search-all-button">

               <p>See more search results for '<?php echo $_POST['keyword']?>' in:</p>

        <form role="search" method="get" class=" woocommerce-product-search" action="<?php echo esc_url( home_url( '/'  ) ); ?>">

        <button type="text" class="td-widget-search-input search-field" id="searchInputmobile" onkeyup="fetchResultsmobile()" >Show All Results</button>

            

        </form>

    </div>

           <?php

        }else{  

            echo '<div id="product-search-results-1" class="product-search-r">

                    <div id="product-search-results-content-2" class="product-search-results-c">

                        <div class="no-results-product">No Result Found.</div>

                    </div>

                </div>';            

        }
    die();
    }

    function __search_by_title_only( $search,  $the_query )
    {
        global $wpdb;
        if ( empty( $search ) )
            return $search;
        $q = $the_query->query_vars;
        $n = ! empty( $q['exact'] ) ? '' : '%';
        $search =
        $searchand = '';
        foreach ( (array) $q['search_terms'] as $term ) {
            $term = esc_sql( like_escape( $term ) );
            $search .= "{$searchand}($wpdb->posts.post_title LIKE '{$n}{$term}{$n}')";
            $searchand = ' AND ';
        }
        if ( ! empty( $search ) ) {
            $search = " AND ({$search}) ";
            if ( ! is_user_logged_in() )
                $search .= " AND ($wpdb->posts.post_password = '') ";
        }
        return $search;
    }
    add_filter( 'posts_search', '__search_by_title_only', 500, 2 );
?>
