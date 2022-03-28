<footer>
  <div class="first-footer regular-txt">
    <div class="regular-container">
      <div class="f-row">
        <div class="footer-f-content">
          <div class="equal-3 listclass frsmenu">
            <h5 class="f-title">VR Expert</h5>
            <!--
              <//?php if(get_field('footer_logo','option')){ ?>
              
              <div class="footer-Brand-img">
              
                <img src="<//?php the_field('footer_logo','option'); ?>" class="size-sr" alt="Orange-footer-logo">
              
              </div>
              
              <//?php }  ?>
              -->
            <ul class="listclass">
              <?php if(get_field('address','option')){ ?>
              <?php the_field('address','option'); ?>
              <?php } ?>
            </ul>
          </div>
          <div class="equal-3 listclass">
            <h5 class="f-title">Products </h5>
            <?php    wp_nav_menu(array(
              'menu' => 'footer-menu-col-1',
              
              'theme_location' => 'footer-menu-col-1',
              
              'container' => false,
              
                  )
              
              ); ?>
            <ul class="listclass">
              <li class="listlink text-right"><a href="https://vr-expert.com/">
                <?php if(get_field('col_2_svg','option')){ ?>
                <?php the_field('col_2_svg','option'); ?>
                <?php } ?>
                </span> <?php if(get_field('col_2_text','option')){ ?>
                <?php the_field('col_2_text','option'); ?>
                <?php } ?></a>
              </li>
            </ul>
          </div>
          <div class="equal-3 listclass">
            <h5 class="f-title">Browse </h5>
            <?php    wp_nav_menu(array(
              'menu' => 'footer-menu-col-2',
              
              'theme_location' => 'footer-menu-col-2',
              
              'container' => false,
              
              
              
                  )
              
              ); ?>
            <ul class="listclass">
              <?php if(get_field('col_3_image','option')){ ?>
              <li class="listlink text-right"><a href=""><img src="	<?php the_field('col_3_image','option'); ?>" class="size-b-img" alt="product-search"></a></li>
              <?php } ?>
            </ul>
          </div>
          <div class="equal-3 listclass">
            <h5 class="f-title">
              <ul>
                <li>
                  <a target="_blank" href="">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                      <path d="M279.14 288l14.22-92.66h-88.91v-60.13c0-25.35 12.42-50.06 52.24-50.06h40.42V6.26S260.43 0 225.36 0c-73.22 0-121.08 44.38-121.08 124.72v70.62H22.89V288h81.39v224h100.17V288z"/>
                    </svg>
                  </a>
                </li>
                <li>
                  <a target="_blank" href="">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                      <path d="M416 32H31.9C14.3 32 0 46.5 0 64.3v383.4C0 465.5 14.3 480 31.9 480H416c17.6 0 32-14.5 32-32.3V64.3c0-17.8-14.4-32.3-32-32.3zM135.4 416H69V202.2h66.5V416zm-33.2-243c-21.3 0-38.5-17.3-38.5-38.5S80.9 96 102.2 96c21.2 0 38.5 17.3 38.5 38.5 0 21.3-17.2 38.5-38.5 38.5zm282.1 243h-66.4V312c0-24.8-.5-56.7-34.5-56.7-34.6 0-39.9 27-39.9 54.9V416h-66.4V202.2h63.7v29.2h.9c8.9-16.8 30.6-34.5 62.9-34.5 67.2 0 79.7 44.3 79.7 101.9V416z"/>
                    </svg>
                  </a>
                </li>
                <li>
                  <a target="_blank" href="">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                      <path d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z"/>
                    </svg>
                  </a>
                </li>
              </ul>
            </h5>
            <ul id="menu-footer-menu-col-2" class="menu">
              <?php    wp_nav_menu(array(
                'menu' => 'footer-menu-col-3',
                
                'theme_location' => 'footer-menu-col-3',
                
                'container' => false,
                
                    )
                
                ); ?>
              <!-- <li  class="listlink"><a href="">AR Headsets</a></li>
                <li  class="listlink"><a href="">Smart glass AR</a></li>
                <li  class="listlink"><a href="">Smartphone AR</a></li>
                <li  class="listlink"><a href="">AR Accessories</a></li> -->
            </ul>
          </div>
        </div>
        <!--
          <div class="footer-last-content">
          
            <div class="equal-2 w-147 listclass">
          
              <h5 class="f-title">Services</h5>
          
             
          
            </div>
          
            <div class="equal-2 w-147 listclass">
          
              <h5 class="f-title">About us</h5>
          
              </?php    wp_nav_menu(array(
          
                'menu' => 'footer-menu-col-4',
          
                'theme_location' => 'footer-menu-col-4',
          
                'container' => false,
          
                
          
                
          
                    )
          
                ); ?>
          
            </div>
          
          </div>
          -->
      </div>
    </div>
  </div>
  <div class="bottom-footer">
    <div class="container">
      <div class="f-bottom-text ">
        <?php if(get_field('privacy_policy','option')){ ?>
        <?php the_field('privacy_policy','option'); ?>
        <?php } ?>
      </div>
    </div>
  </div>
</footer>
<!-- footer --> 
<!-- Your Choise Modal  -->
<!-- style="display: block !important; "-->
<div id="myModalone" class="modal hide">
  <div class="modal-overlay"></div>
  <div class="modal-content">
    <div class="modal-header">
      <span class="close">
        <svg xmlns="http://www.w3.org/2000/svg" width="19.002" height="19.006" viewBox="0 0 19.002 19.006">
          <g id="Group_1735" data-name="Group 1735" transform="translate(0.707 0.711)">
            <line id="Line_32" data-name="Line 32" y1="17.588" x2="17.588" fill="none" stroke="#818cc4" stroke-width="2"/>
            <line id="Line_33" data-name="Line 33" x2="17.588" y2="17.394" fill="none" stroke="#818cc4" stroke-width="2"/>
          </g>
        </svg>
      </span>
      <h2 class="mb-0 f-m-20">Your choice</h2>
    </div>
    <!--
      <div id="content"></div>
      -->
    
    <div class="modal-body">
      <div class="vr-comps">

        <div class="WrapToo-Popup">
          <div class="Image-FD">
            <a class="image-popup-vertical-fit" href="http://localhost/vr-expert-consumer/wp-content/uploads/2021/12/Pico-Neo@2x.png" title="9.jpg">
            <img src="http://localhost/vr-expert-consumer/wp-content/uploads/2021/12/Pico-Neo@2x.png" class="" alt="product-search">
            </a>
          </div>
          <div class="Content-FD">
            <h2 class="product_title">game1</h2>
            <div class="sp-info usersAnp">
              <p>
                Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
              </p>
              <ul>
                <li> USP 1</li>
                <li> Another USP </li>
                <li> Great USP </li>
              </ul>
            </div>
            <div class="Cart-Vat">
              <div class="Cart-Vat-1">
                <div class="CV-price">€ 999,-</div>
                <div class="CV-text">
                  Incl. <span>21%<span> VAT
                  </span></span>
                </div>
              </div>
              <div class="Cart-Vat-3">
              <div class="Qty-Adding">
          <div class="Qty-Adding-min"><button type="button" id="sub" class="minus-one">-</button></div>
          <div class="Total-quantity">
            <input type="number"  class="Qy-adding" min="0" max="" name="">
          </div>
          <div class="Qty-Adding-max"><button type="button" id="add" class="plus-one">+</button></div>
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
        </div>
      
        <div class="pop-bottom position-relative">
          <h2 class="Maineach-head">Accesoires ></h2>
          <div id="main-carousel-popup" class="owl-carousel">
          <div class="item">
            <div class="Acc-Girds-items">
            <div class="Img-txtm">
              <h2>Accessoire name</h2>
              <div class="Acc-Girds-desc regular-txt">
                <p>
                  Lorem ipsum dolor sit amet.
                </p>
              </div>
              </div>
              <div class="image-q">
              <img src="http://localhost/vr-expert-consumer/wp-content/uploads/2021/12/Pico-Neo@2x.png" >
              </div>
              <div class="Cart-Vat">
                <div class="Cart-Vat-1">
                  <div class="CV-price">€ 999,-</div>
                  <div class="CV-text">
                    Incl. <span>21%<span> VAT
                  </div>
                </div>
                <div class="Cart-Vat-2">
                  <a class="header-btn" href="#">
                    <span class="svgcart">
                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                        <path d="M96 0C107.5 0 117.4 8.19 119.6 19.51L121.1 32H541.8C562.1 32 578.3 52.25 572.6 72.66L518.6 264.7C514.7 278.5 502.1 288 487.8 288H170.7L179.9 336H488C501.3 336 512 346.7 512 360C512 373.3 501.3 384 488 384H159.1C148.5 384 138.6 375.8 136.4 364.5L76.14 48H24C10.75 48 0 37.25 0 24C0 10.75 10.75 0 24 0H96zM128 464C128 437.5 149.5 416 176 416C202.5 416 224 437.5 224 464C224 490.5 202.5 512 176 512C149.5 512 128 490.5 128 464zM512 464C512 490.5 490.5 512 464 512C437.5 512 416 490.5 416 464C416 437.5 437.5 416 464 416C490.5 416 512 437.5 512 464z"/>
                      </svg>
                    </span>
                    +
                  </a>
                </div>
              </div>
            </div>
                </div>
            <!-- items -->
            <div class="item">
            <div class="Acc-Girds-items">
            <div class="Img-txtm">
              <h2>Accessoire name</h2>
              <div class="Acc-Girds-desc regular-txt">
                <p>
                  Lorem ipsum dolor sit amet.
                </p>
              </div>
              </div>
              <div class="image-q">
              <img src="http://localhost/vr-expert-consumer/wp-content/uploads/2021/12/Pico-Neo@2x.png" >
              </div>
              <div class="Cart-Vat">
                <div class="Cart-Vat-1">
                  <div class="CV-price">€ 999,-</div>
                  <div class="CV-text">
                    Incl. <span>21%<span> VAT
                  </div>
                </div>
                <div class="Cart-Vat-2">
                  <a class="header-btn" href="#">
                    <span class="svgcart">
                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                        <path d="M96 0C107.5 0 117.4 8.19 119.6 19.51L121.1 32H541.8C562.1 32 578.3 52.25 572.6 72.66L518.6 264.7C514.7 278.5 502.1 288 487.8 288H170.7L179.9 336H488C501.3 336 512 346.7 512 360C512 373.3 501.3 384 488 384H159.1C148.5 384 138.6 375.8 136.4 364.5L76.14 48H24C10.75 48 0 37.25 0 24C0 10.75 10.75 0 24 0H96zM128 464C128 437.5 149.5 416 176 416C202.5 416 224 437.5 224 464C224 490.5 202.5 512 176 512C149.5 512 128 490.5 128 464zM512 464C512 490.5 490.5 512 464 512C437.5 512 416 490.5 416 464C416 437.5 437.5 416 464 416C490.5 416 512 437.5 512 464z"/>
                      </svg>
                    </span>
                    +
                  </a>
                </div>
              </div>
            </div>
          </div>
            <!-- items -->
            <div class="item">
            <div class="Acc-Girds-items">
            <div class="Img-txtm">
              <h2>Accessoire name</h2>
              <div class="Acc-Girds-desc regular-txt">
                <p>
                  Lorem ipsum dolor sit amet.
                </p>
              </div>
              </div>
              <div class="image-q">
              <img src="http://localhost/vr-expert-consumer/wp-content/uploads/2021/12/Pico-Neo@2x.png" >
              </div>
              <div class="Cart-Vat">
                <div class="Cart-Vat-1">
                  <div class="CV-price">€ 999,-</div>
                  <div class="CV-text">
                    Incl. <span>21%<span> VAT
                  </div>
                </div>
                <div class="Cart-Vat-2">
                  <a class="header-btn" href="#">
                    <span class="svgcart">
                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                        <path d="M96 0C107.5 0 117.4 8.19 119.6 19.51L121.1 32H541.8C562.1 32 578.3 52.25 572.6 72.66L518.6 264.7C514.7 278.5 502.1 288 487.8 288H170.7L179.9 336H488C501.3 336 512 346.7 512 360C512 373.3 501.3 384 488 384H159.1C148.5 384 138.6 375.8 136.4 364.5L76.14 48H24C10.75 48 0 37.25 0 24C0 10.75 10.75 0 24 0H96zM128 464C128 437.5 149.5 416 176 416C202.5 416 224 437.5 224 464C224 490.5 202.5 512 176 512C149.5 512 128 490.5 128 464zM512 464C512 490.5 490.5 512 464 512C437.5 512 416 490.5 416 464C416 437.5 437.5 416 464 416C490.5 416 512 437.5 512 464z"/>
                      </svg>
                    </span>
                    +
                  </a>
                </div>
              </div>
            </div>
                </div>
            <!-- items -->
            <div class="item">
            <div class="Acc-Girds-items">
            <div class="Img-txtm">
              <h2>Accessoire name</h2>
              <div class="Acc-Girds-desc regular-txt">
                <p>
                  Lorem ipsum dolor sit amet.
                </p>
              </div>
              </div>
              <div class="image-q">
              <img src="http://localhost/vr-expert-consumer/wp-content/uploads/2021/12/Pico-Neo@2x.png" >
              </div>
              <div class="Cart-Vat">
                <div class="Cart-Vat-1">
                  <div class="CV-price">€ 999,-</div>
                  <div class="CV-text">
                    Incl. <span>21%<span> VAT
                  </div>
                </div>
                <div class="Cart-Vat-2">
                  <a class="header-btn" href="#">
                    <span class="svgcart">
                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                        <path d="M96 0C107.5 0 117.4 8.19 119.6 19.51L121.1 32H541.8C562.1 32 578.3 52.25 572.6 72.66L518.6 264.7C514.7 278.5 502.1 288 487.8 288H170.7L179.9 336H488C501.3 336 512 346.7 512 360C512 373.3 501.3 384 488 384H159.1C148.5 384 138.6 375.8 136.4 364.5L76.14 48H24C10.75 48 0 37.25 0 24C0 10.75 10.75 0 24 0H96zM128 464C128 437.5 149.5 416 176 416C202.5 416 224 437.5 224 464C224 490.5 202.5 512 176 512C149.5 512 128 490.5 128 464zM512 464C512 490.5 490.5 512 464 512C437.5 512 416 490.5 416 464C416 437.5 437.5 416 464 416C490.5 416 512 437.5 512 464z"/>
                      </svg>
                    </span>
                    +
                  </a>
                </div>
              </div>
            </div>
                </div>
            <!-- items -->
            <div class="item">
            <div class="Acc-Girds-items">
            <div class="Img-txtm">
              <h2>Accessoire name</h2>
              <div class="Acc-Girds-desc regular-txt">
                <p>
                  Lorem ipsum dolor sit amet.
                </p>
              </div>
              </div>
              <div class="image-q">
              <img src="http://localhost/vr-expert-consumer/wp-content/uploads/2021/12/Pico-Neo@2x.png" >
              </div>
              <div class="Cart-Vat">
                <div class="Cart-Vat-1">
                  <div class="CV-price">€ 999,-</div>
                  <div class="CV-text">
                    Incl. <span>21%<span> VAT
                  </div>
                </div>
                <div class="Cart-Vat-2">
                  <a class="header-btn" href="#">
                    <span class="svgcart">
                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                        <path d="M96 0C107.5 0 117.4 8.19 119.6 19.51L121.1 32H541.8C562.1 32 578.3 52.25 572.6 72.66L518.6 264.7C514.7 278.5 502.1 288 487.8 288H170.7L179.9 336H488C501.3 336 512 346.7 512 360C512 373.3 501.3 384 488 384H159.1C148.5 384 138.6 375.8 136.4 364.5L76.14 48H24C10.75 48 0 37.25 0 24C0 10.75 10.75 0 24 0H96zM128 464C128 437.5 149.5 416 176 416C202.5 416 224 437.5 224 464C224 490.5 202.5 512 176 512C149.5 512 128 490.5 128 464zM512 464C512 490.5 490.5 512 464 512C437.5 512 416 490.5 416 464C416 437.5 437.5 416 464 416C490.5 416 512 437.5 512 464z"/>
                      </svg>
                    </span>
                    +
                  </a>
                </div>
              </div>
            </div>
          </div>
           <!-- items -->
           <div class="item">
            <div class="Acc-Girds-items">
            <div class="Img-txtm">
              <h2>Accessoire name</h2>
              <div class="Acc-Girds-desc regular-txt">
                <p>
                  Lorem ipsum dolor sit amet.
                </p>
              </div>
              </div>
              <div class="image-q">
              <img src="http://localhost/vr-expert-consumer/wp-content/uploads/2021/12/Pico-Neo@2x.png" >
              </div>
              <div class="Cart-Vat">
                <div class="Cart-Vat-1">
                  <div class="CV-price">€ 999,-</div>
                  <div class="CV-text">
                    Incl. <span>21%<span> VAT
                  </div>
                </div>
                <div class="Cart-Vat-2">
                  <a class="header-btn" href="#">
                    <span class="svgcart">
                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                        <path d="M96 0C107.5 0 117.4 8.19 119.6 19.51L121.1 32H541.8C562.1 32 578.3 52.25 572.6 72.66L518.6 264.7C514.7 278.5 502.1 288 487.8 288H170.7L179.9 336H488C501.3 336 512 346.7 512 360C512 373.3 501.3 384 488 384H159.1C148.5 384 138.6 375.8 136.4 364.5L76.14 48H24C10.75 48 0 37.25 0 24C0 10.75 10.75 0 24 0H96zM128 464C128 437.5 149.5 416 176 416C202.5 416 224 437.5 224 464C224 490.5 202.5 512 176 512C149.5 512 128 490.5 128 464zM512 464C512 490.5 490.5 512 464 512C437.5 512 416 490.5 416 464C416 437.5 437.5 416 464 416C490.5 416 512 437.5 512 464z"/>
                      </svg>
                    </span>
                    +
                  </a>
                </div>
              </div>
            </div>
                </div>
            <!-- items -->
            <div class="item">
            <div class="Acc-Girds-items">
            <div class="Img-txtm">
              <h2>Accessoire name</h2>
              <div class="Acc-Girds-desc regular-txt">
                <p>
                  Lorem ipsum dolor sit amet.
                </p>
              </div>
              </div>
              <div class="image-q">
              <img src="http://localhost/vr-expert-consumer/wp-content/uploads/2021/12/Pico-Neo@2x.png" >
              </div>
              <div class="Cart-Vat">
                <div class="Cart-Vat-1">
                  <div class="CV-price">€ 999,-</div>
                  <div class="CV-text">
                    Incl. <span>21%<span> VAT
                  </div>
                </div>
                <div class="Cart-Vat-2">
                  <a class="header-btn" href="#">
                    <span class="svgcart">
                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                        <path d="M96 0C107.5 0 117.4 8.19 119.6 19.51L121.1 32H541.8C562.1 32 578.3 52.25 572.6 72.66L518.6 264.7C514.7 278.5 502.1 288 487.8 288H170.7L179.9 336H488C501.3 336 512 346.7 512 360C512 373.3 501.3 384 488 384H159.1C148.5 384 138.6 375.8 136.4 364.5L76.14 48H24C10.75 48 0 37.25 0 24C0 10.75 10.75 0 24 0H96zM128 464C128 437.5 149.5 416 176 416C202.5 416 224 437.5 224 464C224 490.5 202.5 512 176 512C149.5 512 128 490.5 128 464zM512 464C512 490.5 490.5 512 464 512C437.5 512 416 490.5 416 464C416 437.5 437.5 416 464 416C490.5 416 512 437.5 512 464z"/>
                      </svg>
                    </span>
                    +
                  </a>
                </div>
              </div>
            </div>
          </div>
           <!-- end items -->
           </div>
          </div>
           <!-- owl-carousel -->
      </div>
      
    </div>
    <!-- modelbody -->
  </div>
</div>
<!-- Your Choise Model End -->

<!-- wait lpader -->
<div id="gobal-loder" class="one-loder" >
  <div class="loader_child">
    <div id="loading-bar-spinner" class="spinner">
      <div class="spinner-icon"></div>
    </div>
  </div>
</div>
<!-- wait loder end  -->



<?php
  wp_footer();
  
  ?>
</div>
</div>
</body>
</html>