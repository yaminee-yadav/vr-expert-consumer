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
<div class="S-info-product">
  <div class="sp-info">
    <h1>text</h1>
    <h2>text</h2>
    <h3>text</h3>
    <h4>text</h4>
    <p>
      Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type
    </p>
    <ul>
      <li> USP 1</li>
      <li> Another USP </li>
      <li> Great USP </li>
    </ul>
  </div>
  <div class="Pre-orderP">
    <p class="regular-txt">Available for preorder</p>
  </div>
  <div class="Cart-Vat">
    <div class="Cart-Vat-1">
      <div class="CV-price">€ 999,-</div>
      <div class="CV-text">
        Incl. <span>21%<span> VAT
        </span></span>
      </div>
    </div>
    <div class="Cart-Vat-2">
      <a class="header-btn" href="#">
        <span class="svgcart">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
            <path d="M96 0C107.5 0 117.4 8.19 119.6 19.51L121.1 32H541.8C562.1 32 578.3 52.25 572.6 72.66L518.6 264.7C514.7 278.5 502.1 288 487.8 288H170.7L179.9 336H488C501.3 336 512 346.7 512 360C512 373.3 501.3 384 488 384H159.1C148.5 384 138.6 375.8 136.4 364.5L76.14 48H24C10.75 48 0 37.25 0 24C0 10.75 10.75 0 24 0H96zM128 464C128 437.5 149.5 416 176 416C202.5 416 224 437.5 224 464C224 490.5 202.5 512 176 512C149.5 512 128 490.5 128 464zM512 464C512 490.5 490.5 512 464 512C437.5 512 416 490.5 416 464C416 437.5 437.5 416 464 416C490.5 416 512 437.5 512 464z"></path>
          </svg>
        </span>
        +
      </a>
    </div>
  </div>
</div>
<?php do_action( 'woocommerce_after_add_to_cart_form' ); ?>
<?php endif; ?>
<style>
</style>