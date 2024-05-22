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


<?php do_action( 'woocommerce_cart_totals_before_shipping' ); ?>

<?php wc_cart_totals_shipping_html(); ?>
<?php do_action( 'woocommerce_cart_totals_after_shipping' ); ?>




<div class="detailsProduct__row detailsProduct__row--total">
	<div class="row__title">Zniżka</div>
	<div class="row__details">
		<span class="details__productName">

		</span>
		<span class="details__productPrice">
		<?php wc_cart_totals_order_total_html(); ?>
		</span>
	</div>
</div>

<?php foreach ( WC()->cart->get_coupons() as $code => $coupon ) : ?>



<div class="detailsProduct__row detailsProduct__row--total">
	<div class="row__title"><?php wc_cart_totals_coupon_label( $coupon ); ?> </div>
	<div class="row__details">
		<span class="details__productName">

		</span>
		<span class="details__productPrice">
			<?php wc_cart_totals_coupon_html( $coupon ); ?>
		</span>
	</div>
</div>



<?php endforeach; ?>


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
	/* .woocommerce-shipping-destination, .woocommerce-shipping-calculator {
		display: none !important;
	} */
	.woocommerce ul#shipping_method li label{
		position: relative;
		display: flex !important;
		align-items: center;
    justify-content: space-between;
	}
	.woocommerce ul#shipping_method li label:after {
		cursor: pointer;
		width: 16px;
    height: 16px;
    border-radius: 50px;
    display: block;
    content: "";
    border: 1px solid #e2a269;
    transition: all .5s ease;
	}
	
	.woocommerce ul#shipping_method li input {
		display: none;
	}
	.woocommerce ul#shipping_method li input:checked~label:after {
		box-shadow: inset 0 0 0 5px #e2a269;
	}
	.shipping-calculator-button {
		width: 200px;
		height: 40px;
		box-shadow: 0px 3px 6px 0px rgba(0,0,0,0.16);
		border-radius: 5px;
		display: flex !important;
		justify-content: center;
		background-color: #e2a269;
		color: white !important;
		align-items: center;
		text-align: center;
		font-family: 'Lato' !important;
		font-weight: 500 !important;
		font-size: 14px !important;
		margin-left: auto;
		transition: opacity 0.5s ease;
	}
	.woocommerce-shipping-calculator button[type=submit] {
		width: 130px;
		height: 40px;
		box-shadow: 0px 3px 6px 0px rgba(0,0,0,0.16);
		border-radius: 5px;
		display: flex !important;
		justify-content: center;
		background-color: #e2a269 !important;
		color: white !important;
		align-items: center;
		text-align: center;
		font-family: 'Lato' !important;
		font-weight: 500 !important;
		font-size: 14px !important;
		margin-left: auto;
		transition: opacity 0.5s ease;
	}
	.woocommerce-shipping-calculator input[type=text] {
		border-radius: 0px;
		border: 1px solid #e2a269;
		font-family: 'Lato' !important;
		font-weight: 400;
		color: black;
		height: 27px;

		padding-left: 5px;
	}
	.select2-container--default .select2-selection--single {
		border: 1px solid #e2a269;
		border-radius: 0px;
		text-align: left;
	}
	.select2-container--default .select2-selection--single .select2-selection__rendered {
		font-family: 'Lato' !important;
		font-weight: 400;
		color: black;
	}
	.shipping-calculator-button:hover {
		opacity: 0.7;
	}
	.woocommerce-shipping-destination {
		text-align: right;
	}
	.woocommerce-shipping-calculator {
		text-align: right;
	}
	.woocommerce-shipping-methods li label{
		width: 100%;
		justify-content: space-between;
	}
	.cartTotalsHolder {
		box-shadow: 0px 3px 12px 0px rgba(0,0,0,0.08);
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
		padding-top: 5px;
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

	@media screen and (max-width: 600px){
		.detailsProduct__row--shipping {
			flex-flow: column !important;
		}
		.woocommerce-page .cart-collaterals .cart_totals, .woocommerce .cart-collaterals .cart_totals {
			max-width: 100%;
		}
		.detailsProduct__row .row__title {
			width: 90px;
		}
		.row__details {
			width: calc(100% - 90px);
		}
		.detailsProduct__row--shipping .row__title {
			width: 100%;
		}
		.detailsProduct__row--shipping .row__details {
			width: 100%;
			padding-top: 15px;
			padding-bottom: 15px;
		}
		.row__details {
			padding-right: 30px;
		}
		.woocommerce ul#shipping_method li {
			margin-bottom: 10px;
		}
		.shipping-calculator-button {
			font-size: 12px !important;
			width: 170px;
		}
		.woocommerce-page .cart-collaterals .cart_totals h2, .woocommerce .cart-collaterals .cart_totals h2 {
			font-size: 18px;
		}
		
	}

	#add_payment_method .wc-proceed-to-checkout a.checkout-button, .woocommerce-cart .wc-proceed-to-checkout a.checkout-button, .woocommerce-checkout .wc-proceed-to-checkout a.checkout-button {
		margin-bottom: 0px !important;
	}
</style>
