<?php
/**
 * Single Product Image
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-image.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.5.1
 */

defined( 'ABSPATH' ) || exit;

// Note: `wc_get_gallery_image_html` was added in WC 3.3.2 and did not exist prior. This check protects against theme overrides being used on older versions of WC.
if ( ! function_exists( 'wc_get_gallery_image_html' ) ) {
	return;
}

global $product;

$columns           = apply_filters( 'woocommerce_product_thumbnails_columns', 4 );
$post_thumbnail_id = $product->get_image_id();
$wrapper_classes   = apply_filters(
	'woocommerce_single_product_image_gallery_classes',
	array(
		'woocommerce-product-gallery',
		'woocommerce-product-gallery--' . ( $product->get_image_id() ? 'with-images' : 'without-images' ),
		'woocommerce-product-gallery--columns-' . absint( $columns ),
		'images',
	)
);

//for video, need to modify the wrapper classes, as they disable click events
$video_wrapper_classes   = apply_filters( 'woocommerce_single_product_image_gallery_classes', array(
    'woocommerce-product-gallery--' . ( $product->get_image_id() ? 'with-images' : 'without-images' ),
    'woocommerce-product-gallery--columns-' . absint( $columns ),
    'images',
) );

/* $product_video = get_post_meta(get_the_ID(), 'product_video_field', true );
$product_sub_image = get_the_post_thumbnail($post, [120]);
if($product_video){
	$iframe_product_video = '<iframe class="thumb_vod_single" width="510" height="510" src="https://www.youtube.com/embed/'.$product_video.'" frameborder="0" allowfullscreen></iframe>';
}else{
	$iframe_product_video ='No99';
} */
?>


	<?php $post_thumbnail_id = get_post_thumbnail_id( $post->ID );
	if(!empty($post_thumbnail_id)) {
	$img_ar =  wp_get_attachment_image_src( $post_thumbnail_id, 'single_product_fea' ); 
		$img_p =  $img_ar[0];
	} else {
		$img_p = placeholder_image();
	}
		
	echo '<div class="show image-link" href="'.$img_p.'"> 
	<img id="show-img" src="'.$img_p.'" href="'.$img_p.'">';	?>

	</div>	
	<div style="display:none;">
	<span class="showGalleryPopup" href="<?php echo $img_p;?>"></span>
	<?php
/* magnific popup code */
$attachment_ids = $product->get_gallery_attachment_ids();
if(!empty($attachment_ids)) {
		foreach( $attachment_ids as $attachment_id ) {
			$img_ar =  wp_get_attachment_image_src( $attachment_id, 'single_product_fea' ); 
					 $img_p_g =  $img_ar[0];
?>

<span class="showGalleryPopup" href="<?php echo $img_p_g;?>"></span>
<?php
		}
}
?>	</div>
	
	<?php 
		$attachment_ids = $product->get_gallery_attachment_ids();
		if(!empty($attachment_ids)) {
			
		echo '<div class="small-img smallImgWrapper"> 
			<div class="navSliderControl sacas">

				<img src="'.get_stylesheet_directory_uri().'/img/gallery-control-icon.png" class="icon-left" alt="" id="prev-img">
				 <img src="'.get_stylesheet_directory_uri().'/img/gallery-control-icon.png" class="icon-right" alt="" id="next-img">
			</div>
			<div class="small-container"> 
			<div id="small-img-roll">';
		
			echo '<img class="show-small-img" src="'.$img_p.'"  href="'.$img_p.'">' ;
			
				foreach( $attachment_ids as $attachment_id ) {
					$img_ar =  wp_get_attachment_image_src( $attachment_id, 'single_product_fea' ); 
					 $img_p =  $img_ar[0];
					 if($img_p == 1){
						
						echo '<picture class="show-small-img" href="'.$img_p.'"><source type="image/gif" srcset="'.$img_p.'"><img srcset="" src="'.$img_p.'" href="'.$img_p.'" alt="now" ></picture>';
					 }else{
						echo '<img srcset="" class="show-small-img" src="'.$img_p.'" href="'.$img_p.'">'; 
					 }
					
				}
				echo '</div></div></div>';
	}
	///Made in Austrial and icon display below title
 $attributes = $product->get_attributes();
foreach ( $attributes as $attribute ) {
    $values = array();
    if ( $attribute->is_taxonomy() ) {
        $attribute_taxonomy = $attribute->get_taxonomy_object();
        $attribute_values   = wc_get_product_terms( $product->get_id(), $attribute->get_name(), array( 'fields' => 'all' ) );
echo '<div class="galleryIcons">';
        foreach ( $attribute_values as $attribute_value ) {
            if(get_field('pro_attr_image','term_' . $attribute_value->term_id)){
                echo ' <img src="'.get_field('pro_attr_image','term_' . $attribute_value->term_id)['sizes']['pro_att_img'].'" >';
            }
        }
		echo '</div>';
    }
} 
?>

				
				
				   
				
   
