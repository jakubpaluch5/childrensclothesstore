<?php
/**
 * Review order table
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/review-order.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 5.2.0
 */

defined( 'ABSPATH' ) || exit;
?>

<div class="orderReview__details shop_table woocommerce-checkout-review-order-table">
	<?php 
		
		do_action( 'woocommerce_review_order_before_cart_contents' );
		foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
			$_product = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );

			if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_checkout_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
				?>
				<div class="detailsProduct__row">
					<div class="row__title">Produkt</div>
					<div class="row__details">
						<span class="details__productName">
							<?php echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key ) ) . '&nbsp;'; ?>
							<?php echo apply_filters( 'woocommerce_checkout_cart_item_quantity', ' <strong class="product-quantity">' . sprintf( '&times;&nbsp;%s', $cart_item['quantity'] ) . '</strong>', $cart_item, $cart_item_key ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
						</span>
						<span class="details__productPrice">
							<?php echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
						</span>
					</div>
				</div>
		
				<?php
			}
		}
		do_action( 'woocommerce_review_order_after_cart_contents' );

	?>
			
			<?php if ( WC()->cart->needs_shipping() && WC()->cart->show_shipping() ) : ?>
	

	<?php do_action( 'woocommerce_review_order_before_shipping' ); ?>



	<?php wc_cart_totals_shipping_html(); ?>

	<?php do_action( 'woocommerce_review_order_after_shipping' ); ?>

<?php endif; ?>


<div class="detailsProduct__row detailsProduct__row--total">
	<div class="row__title">Podsumowanie</div>
	<div class="row__details">
		<span class="details__productName">
			Łącznie:
		</span>
		<span class="details__productPrice">
			<?php wc_cart_totals_order_total_html(); ?>
		</span>
	</div>
</div>


<?php do_action( 'woocommerce_review_order_before_order_total' ); ?>

</div>

<style>
	.detailsProduct__row--total {
		margin-top: -5px;
	}
	#order_review #shipping_method li label bdi, #order_review #shipping_method li label span {
		color: #1A1A18;
		font-family: 'Lato';
		font-size: 14px;
		font-weight: 700;
	}
	#order_review #shipping_method li label {
		color: #1A1A18;
		font-family: 'Lato';
		font-size: 14px;
		font-weight: 700;
	}
	.detailsProduct__row--shipping {
		margin-top: -5px;
	}
	.orderReview__details {
		display: flex;
		flex-flow: column;
	}
	.row__details {
		padding-left: 30px;
		padding-right: 60px;
	}
	#order_review #shipping_method li {
		display: flex;
		justify-content: space-between;
		flex-flow: row;
	}
	#order_review #shipping_method {
		width: 100%;
	}

	#order_review #shipping_method li {
		margin: 0 !important;
	}
	#order_review #shipping_method li label{
		display: flex !important;
	}
	.details__productPrice bdi, .details__productPrice span{
		color: #1A1A18;
		font-family: 'Lato';
		font-size: 14px;
		font-weight: 700;
	}
	.details__productName {
		color: #1A1A18;
		font-family: 'Lato';
		font-size: 14px;
		font-weight: 700;
	}
	.details__productName strong {
		color: #1A1A18;
		font-family: 'Lato';
		font-size: 14px;
		font-weight: 700;
	}
	.row__details {
		display: flex;
		justify-content: space-between;
		width: calc(100% - 135px);
		align-items: center;
		padding-top: 20px;
	}
	.orderReview__details .detailsProduct__row {
		display: flex;
		flex-flow: row;
	}
	.orderReview__details .detailsProduct__row .row__title {
		background-color: #F5F5F5;
		width: 135px;
		display: flex;
		justify-content: center;
		padding-top: 20px;
		color: #262626;
		font-family: 'Lato';
		font-size: 14px;
		font-weight: 500;
		padding-bottom: 20px;
	}
</style>


