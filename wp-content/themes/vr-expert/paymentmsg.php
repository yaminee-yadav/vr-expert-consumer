<?php get_header();
	/*
	 * Template Name: paymentmessage
	 */
	 ?>
<style>
	.pay-success{
	display:flex;
	}
	.pay-success-ch1,
	.pay-success-ch2
	{
	width:50%;
	}
	.pay-success-ch1{
	height:664px;
	background: url(/vr-expert-local-new/wp-content/themes/vr-expert/img/confetti@2x.png);
	background-repeat: no-repeat !important;
	background-size: cover !important;
	background-color: #EDEDFF;
	}
	.cn-y
	{
	position: absolute;
	left: 50%;
	bottom: 0;
	transform: translateX(-50%);
	}
	.pay-success-ch2
	{
	display: flex;
	justify-content: center;
	align-items: center;
	}
	.w-450
	{
	max-width:450px;
	width:100%;
	margin:0 auto;
	}
	/* chmarkes*/
	.circle-csk {
	position: relative;
	background: #F59663;
	border-radius: 50%;
	width: 48px;
	height: 48px;
	margin-right:22px;
	}
	.checkmark-csk {
	position: absolute;
	transform: rotate(
	45deg) translate(-50%, -50%);
	left: 26%;
	top: 45%;
	height: 28px;
	width: 16px;
	border-bottom: 3px solid white;
	border-right: 3px solid white;
	}
	/* chmarkes*/
	.cr-svg{
	display:flex;
	align-items: center;
	justify-content: center;
	}
	.cr-svg .cart-h2-head {
	margin-bottom:unset !important;
	}
	.sm-txt{
	margin:24px 0 48px 0;
	}
	.sm-txt p{
	font-size:20px;
	font-family: 'Poppins-Light';
	font-weight: 300;
	}
	.sm-txt p a{
	font-family: 'Poppins-Medium';
	color:#000;
	font-weight:500;
	}
	.spc .t-add{
	max-width:154px;
	width:100%;
	margin: 0 auto;
	}
	.spc {
	margin-bottom:70px;
	}
	.btn-mid {
	width: 100%;
	display: flex;
	align-items: center;
	justify-content: center;
	height: 35px;
	background: var(--orange);
	border: 0;
	color: #fff;
	border-radius: 25px;
	}
	/*suc-tab*/
	.suc-tab{
	display:flex;
	background: #EDEDFF;
	border-radius:17px;
	max-width: 418px;
	margin: 0 auto;
	}
	.vr-extra
	{
	display: flex;
	flex-wrap: wrap;
	padding-left: 24px;
	align-items: center;
	}
	.ch-wr-1{
	max-width:238px;
	width:100%;
	color:#21365D;
	}
	.vr-extra a {
	color: #21365D;
	text-decoration: underline;
	}
	.ch-wr-2 {
	max-width: 156px;
	width:100%;
	}
	.ch-wr-2 img {
	width: 156px;
	}
	@media (max-width: 1023px){
	.pay-success-ch1 {
	height:524px;
	}
	.w-450 {
	max-width: 317px;
	}
	.circle-csk {
	width: 39px;
	height: 39px;
	margin-right: 11px;
	}
	.cr-svg .cart-h2-head {
	font-size: 16px;
	line-height: 23px;
	}
	.sm-txt {
	margin: 12px 0 48px 0;
	}
	.sm-txt p {
	font-size: 14px;
	}
	.spc {
	margin-bottom: 54px;
	}
	.suc-tab {
	max-width: 297px;
	}
	.vr-extra {
	padding-left: 17px;
	}
	.ch-wr-1,
	.ch-wr-2  {
	max-width: 140px;
	}
	.ch-wr-2 img {
	width: 140px;
	}
	.ch-wr-1 a {
	white-space: nowrap;
	font-family: 'Poppins-Light';
	}
	.checkmark-csk {
	left: 26%;
	top: 47%;
	height: 23px;
	width: 13px;
	}
	}
	@media (max-width: 767px){
	.pay-success {
	flex-direction: column;
	}
	.pay-success-ch1 {
	height: 367px;
	width:100%;
	}
	.cn-y {
	position: unset;
	width: 100%;
	transform: unset; 
	}
	.cn-y img,
	.pay-success-ch2{
	max-width:100%;
	}
	.pay-success-ch2{
	width:100%;
	}
	.spc {
	margin-top: 30px;
	margin-bottom: 54px;
	}
	.suc-tab {
	margin-bottom: 69px;
	}
	}
</style>
<?php 
$order = wc_get_order( $order_id );

echo $order_data = $order->get_data(); // The Order data
?>
<div class="pay-success">
	<div class="pay-success-ch1 position-relative">
		<div class="cn-y">
			<img  class="" src="<?php echo get_stylesheet_directory_uri(); ?>/img/df-sucess.png" alt="slx">
		</div>
	</div>
	<div class="pay-success-ch2">
		<div class="w-450 position-relative">
			<div class="spc text-center">
				<div class="cr-svg">
					<div class="circle-csk">
						<div class="checkmark-csk"></div>
					</div>
					<p class="cart-h2-head mb-0">Order successfully placed</p>
				</div>
				<!-- content -div start -->
				<div class="sm-txt text-center">
					<p>You’re order is ……….</p>
					<p>if you have any questions about you’re order, you can mail us at  <a href="" mailto="support@vr-expert.nl">support@vr-expert.nl</a> or call us at 
						<a  href="tel:+31 30 711 6183">+31 30 711 6183</a>
					</p>
				</div>
				<p class="t-add">
					<a class="btn-mid regular-txt" href="">Order details</a>
				</p>
			</div>
			<!-- other subs -->
			<div class="suc-tab">
				<div class="vr-extra">
					<div class="medium-txt ch-wr-1">
						<p>Rent here the products that is now a hit</p>
						<p><a class=" regular-txt" href="">Go back to the rental shop ></a></p>
						<p><a class=" regular-txt" href="">Speak with a professional ></a></p>
					</div>
					<div class="e-img ch-wr-2">
						<img  class="" src="<?php echo get_stylesheet_directory_uri(); ?>/img/Pico-header-home-slide.png" alt="slx">
					</div>
				</div>
			</div>
			<!-- other subs -->
		</div>
	</div>
</div>
<?php get_footer();?>