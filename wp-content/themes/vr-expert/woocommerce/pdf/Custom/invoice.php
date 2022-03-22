<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly ?>
<?php do_action( 'wpo_wcpdf_before_document', $this->type, $this->order ); ?>

<table class="head container">
	<tr>
		<td class="header">
		<?php
		if( $this->has_header_logo() ) {
			$this->header_logo();
		} else {
			echo $this->get_title();
		}
		?>
		</td>
		<td class="shop-info">
			<div class="shop-name"><h3><?php $this->shop_name(); ?></h3></div>
			<div class="shop-address"><?php $this->shop_address(); ?></div>
		</td>
	</tr>
</table>

<h1 class="document-type-label">
<?php if( $this->has_header_logo() ) echo $this->get_title(); ?>
</h1>
<?php  ?>

<?php do_action( 'wpo_wcpdf_after_document_label', $this->type, $this->order ); ?>

<?php
$billing_reference = $this->order->get_meta('billing_reference');
?>
<?php
$billing_kvk_nummer = $this->order->get_meta('billing_kvk_nummer');
?>

<table class="order-data-addresses">
	<tr>
		<td class="address billing-address">
			<!-- <h3><?php _e( 'Billing Address:', 'woocommerce-pdf-invoices-packing-slips' ); ?></h3> -->
			<?php do_action( 'wpo_wcpdf_before_billing_address', $this->type, $this->order ); ?>
			<?php $this->billing_address(); ?>
			<?php do_action( 'wpo_wcpdf_after_billing_address', $this->type, $this->order ); ?>
			<?php if ( isset($this->settings['display_email']) ) { ?>
			<div class="billing-email"><?php $this->billing_email(); ?></div>
			<?php } ?>
			<?php if ( isset($this->settings['display_phone']) ) { ?>
			<div class="billing-phone"><?php $this->billing_phone(); ?></div>
			<?php } ?>
			<?php if ( isset($billing_reference) ) { ?>
			<div class="billing-reference"><?php echo $billing_reference; ?></div>
			<?php } ?>
			<?php if ( isset($billing_kvk_nummer) ) { ?>
			<div class="billing-kvk-nummer"><?php echo $billing_kvk_nummer; ?></div>
			<?php } ?>
		</td>
		<td class="address shipping-address">
			<?php //if ( isset($this->settings['display_shipping_address']) && $this->ships_to_different_address()) { ?>
			<h3><?php //_e( 'Ship To:', 'woocommerce-pdf-invoices-packing-slips' ); ?></h3>
			<?php // do_action( 'wpo_wcpdf_before_shipping_address', $this->type, $this->order ); ?>
			<?php //$this->shipping_address(); ?>
			<?php //do_action( 'wpo_wcpdf_after_shipping_address', $this->type, $this->order ); ?>
			<?php //} ?>
		</td>
		<td class="order-data">
			<table>
				<?php do_action( 'wpo_wcpdf_before_order_data', $this->type, $this->order ); ?>
				<?php if ( isset($this->settings['display_number']) ) { ?>
				<tr class="invoice-number">
					<th><?php _e( 'Invoice Number:', 'woocommerce-pdf-invoices-packing-slips' ); ?></th>
					<td><?php $this->invoice_number(); ?></td>
				</tr>
				<?php } ?>
				<?php if ( isset($this->settings['display_date']) ) { ?>
				<tr class="invoice-date">
					<th><?php _e( 'Invoice Date:', 'woocommerce-pdf-invoices-packing-slips' ); ?></th>
					<td><?php $this->invoice_date(); ?></td>
				</tr>
				<?php } ?>
				<tr class="order-number">
					<th><?php _e( 'Order Number:', 'woocommerce-pdf-invoices-packing-slips' ); ?></th>
					<td><?php $this->order_number(); ?></td>
				</tr>
				<tr class="order-date">
					<th><?php _e( 'Order Date:', 'woocommerce-pdf-invoices-packing-slips' ); ?></th>
					<td><?php $this->order_date(); ?></td>
				</tr>
				<tr class="payment-method">
					<th><?php _e( 'Payment Method:', 'woocommerce-pdf-invoices-packing-slips' ); ?></th>
					<td><?php $this->payment_method(); ?></td>
				</tr>
				<?php do_action( 'wpo_wcpdf_after_order_data', $this->type, $this->order ); ?>
			</table>			
		</td>
	</tr>
</table>

<?php do_action( 'wpo_wcpdf_before_order_details', $this->type, $this->order ); ?>
<?php //print("<pre>".print_r($this->get_order_items(),true)."</pre>"); 
//print_r($this->get_order_items()); ?>
<table class="order-details">
	<thead>
		<tr>
			<th class="a-number"><?php _e('Article', 'woocommerce-pdf-invoices-packing-slips' ); ?></th>
			<th class="description"><?php _e('Description', 'woocommerce-pdf-invoices-packing-slips' ); ?></th>
			<th class="booqable-date"><?php _e('Rental Date', 'woocommerce-pdf-invoices-packing-slips' ); ?></th>
			<th class="quantity"><?php _e('Quantity', 'woocommerce-pdf-invoices-packing-slips' ); ?></th>
			<th class="price">Price<?php //_e('Price', 'woocommerce-pdf-invoices-packing-slips' ); ?></th>
			<th class="price"><?php _e('Amount', 'woocommerce-pdf-invoices-packing-slips' ); ?></th>
		</tr>
	</thead>
	<tbody>
		<?php $items = $this->get_order_items(); $i = 1; $j=0; if( sizeof( $items ) > 0 ) : foreach( $items as $item_id => $item ) : ?>
		<?php do_action( 'wpo_wcpdf_before_item_meta', $this->type, $item, $this->order  ); ?>
			<?php if( empty($item['meta']) == TRUE ) : 
			
				?>
			<tr class="<?php echo apply_filters( 'wpo_wcpdf_item_row_class', $item_id, $this->type, $this->order, $item_id ); ?>">
				<td class="a-number"><?php echo $item['sku'];?></td>
				<td class="description">
					<span class="item-name"><?php echo $item['name']; ?></span>
					
				
					<!-- <span class="item-meta"><?php //echo $item['meta']; ?></span> -->
				</td> 
				<td class="order-date"><?php echo ''; ?></td>
				<td class="quantity"><?php echo $item['quantity']; ?></td>
				<td class="price"><?php echo $item['single_line_total']; ?></td>
				<td class="price"><?php echo $item['order_price']; ?></td>
			</tr>
			<?php else:
		
				$meta_list = explode('Service', $item['meta']);
				$removed = array_shift($meta_list);
				$item_quantity = intval($item['quantity']);
				$item_slt = floatval(str_replace(',', '', explode('&euro;', strip_tags($item['single_line_total']))[1]));
				$item_op = floatval(str_replace(',', '', explode('&euro;', strip_tags($item['order_price']))[1]));
				foreach( $meta_list as $meta_item_id => $meta_item ) :
					$meta_item_arr = explode(':', $meta_item);
					$meta_item_name = trim($meta_item_arr[1]);
					$meta_item_name = strip_tags($meta_item_name);
					$meta_item_price = floatval(explode('€', $meta_item_arr[0])[1]);
					$item_slt = $item_slt - $meta_item_price;
					$item_op = $item_op - $meta_item_price * $item_quantity;
				endforeach;
				$metaData = explode(':', $item['meta']);
			?>
			<tr class="<?php echo apply_filters( 'wpo_wcpdf_item_row_class', $item_id, $this->type, $this->order, $item_id ); ?>">
				<td class="a-number"  style="border-bottom:0"><?php echo $item['sku'];?></td>
				<td class="description" style="border-bottom:0">
					<span class="item-name"><?php echo $item['name']; ?></span>
				</td>
			
				<td class="order-date"><?php if($metaData){ $str = str_replace("startDate", " ", $metaData[1]); echo $str; }else{echo '';} ?></td>

			
				<td class="quantity" style="border-bottom:0"><?php echo $item['quantity']; ?></td>
				<?php if( $item_slt <= 0 || $item_op <= 0 ) :?>
				<td class="price" style="border-bottom:0"><?php echo $item['single_line_total']; ?></td>
				<td class="price" style="border-bottom:0"><?php echo $item['order_price']; ?></td>
				<?php else: ?>
				<td class="price" style="border-bottom:0"><?php echo '&euro;' . $item_slt ?></td>
				<td class="price" style="border-bottom:0"><?php echo '&euro;' . $item_op ?></td>
				<?php endif; ?>
			</tr>
			
			<?php foreach( $meta_list as $meta_item_id => $meta_item ) :
					$meta_item_arr = explode(':', $meta_item);
					$meta_item_name = trim($meta_item_arr[1]);
					$meta_item_name = strip_tags($meta_item_name);
					$meta_item_price = floatval(explode('€', $meta_item_arr[0])[1]);?>
				<tr class="<?php echo apply_filters( 'wpo_wcpdf_item_row_class', $item_id, $this->type, $this->order, $item_id ); ?>">
				<td class="a-number" style="border-top:0; border-bottom:0"></td>
				<td class="description" style="border-top:0; border-bottom:0">
					<span class="item-name"><?php echo $meta_item_name;?></span>
				</td>
				<td class="quantity" style="border-top:0; border-bottom:0"><?php echo $item['quantity']; ?></td>
				<td class="price" style="border-top:0; border-bottom:0"><?php echo '&euro;' . $meta_item_price ?></td>
				<td class="price" style="border-top:0; border-bottom:0"><?php echo '&euro;' . $meta_item_price * intval($item['quantity']); ?></td>
				</tr>
			<?php endforeach; ?> 
		    <?php endif; ?>
		    <?php  endforeach; endif; ?>
	</tbody>
	<tfoot>
		<tr class="no-borders">
			<td class="no-borders"></td>
			<td class="no-borders"></td>
			<td class="no-borders">
				<div class="customer-notes">
					<?php do_action( 'wpo_wcpdf_before_customer_notes', $this->type, $this->order ); ?>
					<?php if ( $this->get_shipping_notes() ) : ?>
						<h3><?php _e( 'Customer Notes', 'woocommerce-pdf-invoices-packing-slips' ); ?></h3>
						<?php $this->shipping_notes(); ?>
					<?php endif; ?>
					<?php do_action( 'wpo_wcpdf_after_customer_notes', $this->type, $this->order ); ?>
				</div>				
			</td>
			<td class="no-borders" colspan="2">
				<table class="totals">
					<tfoot>
						<?php foreach( $this->get_woocommerce_totals() as $key => $total ) : ?>
						<tr class="<?php echo $key; ?>">
							<td class="no-borders"></td>
							<th class="description"><?php echo $total['label']; ?></th>
							
							<td class="price"><span class="totals-price"><?php echo $total['value']; ?></span></td>
						</tr>
						<?php endforeach; ?>
					</tfoot>
				</table>
			</td>
		</tr>
	</tfoot>
</table>
<?php do_action( 'wpo_wcpdf_after_order_details', $this->type, $this->order ); ?>
<?php if ( $this->get_footer() ): ?>
<div id="footer">
	<?php $this->footer(); ?>
</div><!-- #letter-footer -->
<?php endif; ?>
<?php do_action( 'wpo_wcpdf_after_document', $this->type, $this->order ); ?>