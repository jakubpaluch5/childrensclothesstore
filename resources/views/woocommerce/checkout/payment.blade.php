<?php
/**
 * Checkout Payment Section
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/payment.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 8.1.0
 */

defined( 'ABSPATH' ) || exit;

if ( ! wp_doing_ajax() ) {
	do_action( 'woocommerce_review_order_before_payment' );
}

?>

<div  id="payment" class="woocommerce-checkout-payment">
	<?php if ( WC()->cart->needs_payment() ) : ?>
	<div class="detailsProduct__row detailsProduct__row--payment">
		<div class="row__title">Metoda <br/> płatności</div>
		<div class="row__details">
			<ul class="wc_payment_methods payment_methods methods">
				<?php
				if ( ! empty( $available_gateways ) ) {
					foreach ( $available_gateways as $gateway ) {
						wc_get_template( 'checkout/payment-method.php', array( 'gateway' => $gateway ) );
					}
				} else {
					echo '<li>';
					wc_print_notice( apply_filters( 'woocommerce_no_available_payment_methods_message', WC()->customer->get_billing_country() ? esc_html__( 'Sorry, it seems that there are no available payment methods. Please contact us if you require assistance or wish to make alternate arrangements.', 'woocommerce' ) : esc_html__( 'Please fill in your details above to see available payment methods.', 'woocommerce' ) ), 'notice' ); // phpcs:ignore WooCommerce.Commenting.CommentHooks.MissingHookComment
					echo '</li>';
				}
				?>
			</ul>
		</div>
	</div>
		
	<?php endif; ?>
	<div class="form-row place-order">
		<noscript>
			<?php
			/* translators: $1 and $2 opening and closing emphasis tags respectively */
			printf( esc_html__( 'Since your browser does not support JavaScript, or it is disabled, please ensure you click the %1$sUpdate Totals%2$s button before placing your order. You may be charged more than the amount stated above if you fail to do so.', 'woocommerce' ), '<em>', '</em>' );
			?>
			<br/><button type="submit" class="button alt<?php echo esc_attr( wc_wp_theme_get_element_class_name( 'button' ) ? ' ' . wc_wp_theme_get_element_class_name( 'button' ) : '' ); ?>" name="woocommerce_checkout_update_totals" value="<?php esc_attr_e( 'Update totals', 'woocommerce' ); ?>"><?php esc_html_e( 'Update totals', 'woocommerce' ); ?></button>
		</noscript>

		<?php wc_get_template( 'checkout/terms.php' ); ?>

		<?php do_action( 'woocommerce_review_order_before_submit' ); ?>

		<?php echo apply_filters( 'woocommerce_order_button_html', '<button type="submit" class="button alt' . esc_attr( wc_wp_theme_get_element_class_name( 'button' ) ? ' ' . wc_wp_theme_get_element_class_name( 'button' ) : '' ) . '" name="woocommerce_checkout_place_order" id="place_order" value="' . esc_attr( $order_button_text ) . '" data-value="' . esc_attr( $order_button_text ) . '">' . esc_html( $order_button_text ) . '</button>' ); // @codingStandardsIgnoreLine ?>

		<?php do_action( 'woocommerce_review_order_after_submit' ); ?>

		<?php wp_nonce_field( 'woocommerce-process_checkout', 'woocommerce-process-checkout-nonce' ); ?>
	</div>
</div>
<style>
	#add_payment_method #payment div.payment_box::before, .woocommerce-cart #payment div.payment_box::before, .woocommerce-checkout #payment div.payment_box::before {
		/* display: none; */
	}
	#add_payment_method #payment div.payment_box::before, .woocommerce-cart #payment div.payment_box::before, .woocommerce-checkout #payment div.payment_box::before {
		display: none;
	}
	.paynow-data-processing-info .expand {
		display: none;
	}
	.payment_method_pay_by_paynow_pl_pbl {
		font-size: 14px !important;
		font-family: 'Lato' !important;
	
		color: #1A1A18 !important;
		font-weight: 400 !important;
	}
	.paynow-payment-option-pbl input[type=radio]:checked + label {
		border: 1px solid #e2a269;
		box-shadow: 0px 3px 6px 0px rgba(0,0,0,0.16);

		background-color: white;
	}
	#add_payment_method #payment div.payment_box, .woocommerce-cart #payment div.payment_box, .woocommerce-checkout #payment div.payment_box {
		background-color: white;
		box-shadow: 0px 3px 6px 0px rgba(0,0,0,0.1);
		border: 1px solid #e2a269;
	}
	.payment_box p {
		font-size: 14px;
		font-family: 'Lato';
		margin: 0;
		padding: 0;
		color: #1A1A18;
		font-weight: 400;
	}
	.wc_payment_method.payment_method_bacs {
		display: block !important;
	}
	.wc_payment_methods  {
		width: 100%;
		padding: 0 !important;
	}
	.payment_box label:before {
		display: none !important;
		
	}
	.about_paypal {
		display: none;
	}
	.wc_payment_method label {
		display: flex;
		flex-flow: row;
		align-items: center;
		width: 100%;
		font-family: 'Lato';
		font-size: 14px;
		font-weight: 700;
		color: #262626;
		justify-content: space-between;
	}
	.wc_payment_method input[type=radio] {
		display: none;
	}
	.wc_payment_method input:checked + label:before {
		box-shadow: inset 0 0 0 5px #e2a269;
	}
	.wc_payment_method label:before {
		width: 16px;
		max-width: 16px;
		order: 3;
		min-width: 16px;
    height: 16px;

	max-height: 16px;
	min-height: 16px;
    border-radius: 50px;
    display: block;
    content: "";
    border: 1px solid #e2a269;
    transition: all .5s ease;
	}
	.detailsProduct__row--payment {
		display: flex;
		flex-flow: row;
	}
	.detailsProduct__row--payment .row__title {
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
	.detailsProduct__row--payment .row__details {
		display: flex;
		justify-content: space-between;
		width: calc(100% - 135px);
		align-items: center;
		padding-top: 20px;
	}
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
<?php
if ( ! wp_doing_ajax() ) {
	do_action( 'woocommerce_review_order_after_payment' );
}





