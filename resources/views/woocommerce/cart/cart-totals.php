<?php
/**
 * Cart totals
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart-totals.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 2.3.6
 */

defined( 'ABSPATH' ) || exit;

?>
<div class="cart_totals <?php echo ( WC()->customer->has_calculated_shipping() ) ? 'calculated_shipping' : ''; ?>">

	<?php do_action( 'woocommerce_before_cart_totals' ); ?>

	<h2><?php esc_html_e( 'Cart totals', 'woocommerce' ); ?></h2>

	<div class="cartTotalsHolder">

	<div class="detailsProduct__row detailsProduct__row--total">
	<div class="row__title">Kwota</div>
	<div class="row__details">
		<span class="details__productName">

		</span>
		<span class="details__productPrice">
		<?php wc_cart_totals_subtotal_html(); ?>
		</span>
	</div>
</div>



<?php if ( WC()->cart->needs_shipping() && WC()->cart->show_shipping() ) : ?>

<?php do_action( 'woocommerce_cart_totals_before_shipping' ); ?>

<?php wc_cart_totals_shipping_html(); ?>

<?php do_action( 'woocommerce_cart_totals_after_shipping' ); ?>

<?php elseif ( WC()->cart->needs_shipping() && 'yes' === get_option( 'woocommerce_enable_shipping_calc' ) ) : ?>


	<th><?php esc_html_e( 'Shipping', 'woocommerce' ); ?></th>
	<td data-title="<?php esc_attr_e( 'Shipping', 'woocommerce' ); ?>"><?php woocommerce_shipping_calculator(); ?></td>


<?php endif; ?>
<div class="detailsProduct__row detailsProduct__row--total">
	<div class="row__title">Łącznie</div>
	<div class="row__details">
		<span class="details__productName">

		</span>
		<span class="details__productPrice">
		<?php wc_cart_totals_order_total_html(); ?>
		</span>
	</div>
</div>


	
		


		


		<?php do_action( 'woocommerce_cart_totals_before_order_total' ); ?>


		<?php do_action( 'woocommerce_cart_totals_after_order_total' ); ?>


	<div class="wc-proceed-to-checkout">
		<?php do_action( 'woocommerce_proceed_to_checkout' ); ?>
	</div>

	<?php do_action( 'woocommerce_after_cart_totals' ); ?>

</div>
</div>

<style>
	.cartTotalsHolder {
		background-color: white !important;
	}
	.detailsProduct__row--total {
		margin-top: -5px;
	}
	#shipping_method li label bdi, #shipping_method li label span {
		color: #1A1A18;
		font-family: 'Lato';
		font-size: 14px;
		font-weight: 700;
	}
	#shipping_method li label {
		color: #1A1A18;
		font-family: 'Lato';
		font-size: 14px;
		font-weight: 700;
	}
	.detailsProduct__row--shipping {
		margin-top: -5px;
	}
	{
		display: flex;
		flex-flow: column;
	}
	.row__details {
		padding-left: 30px;
		padding-right: 60px;
	}
	#shipping_method li {
		display: flex;
		justify-content: space-between;
		flex-flow: row;
	}
	#shipping_method {
		width: 100%;
	}

	#shipping_method li {
		margin: 0 !important;
	}
	#shipping_method li label{
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
	.detailsProduct__row {
		display: flex;
		flex-flow: row;
	}
	.detailsProduct__row .row__title {
		background-color: #F5F5F5 !important;
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