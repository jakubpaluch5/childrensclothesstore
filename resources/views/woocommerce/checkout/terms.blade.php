<?php
/**
 * Checkout terms and conditions area.
 *
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

if ( apply_filters( 'woocommerce_checkout_show_terms', true ) && function_exists( 'wc_terms_and_conditions_checkbox_enabled' ) ) {
	do_action( 'woocommerce_checkout_before_terms_and_conditions' );

	?>
	<div class="woocommerce-terms-and-conditions-wrapper">
		<?php
		/**
		 * Terms and conditions hook used to inject content.
		 *
		 * @since 3.4.0.
		 * @hooked wc_checkout_privacy_policy_text() Shows custom privacy policy text. Priority 20.
		 * @hooked wc_terms_and_conditions_page_content() Shows t&c page content. Priority 30.
		 */
		do_action( 'woocommerce_checkout_terms_and_conditions' );
		?>

		<?php if ( wc_terms_and_conditions_checkbox_enabled() ) : ?>
			<p class="form-row validate-required">
			<input type="checkbox" class="woocommerce-form__input woocommerce-form__input-checkbox input-checkbox" id="terms" name="terms" <?php checked( apply_filters( 'woocommerce_terms_is_checked_default', isset( $_POST['terms'] ) ), true ); // WPCS: input var ok, csrf ok. ?> id="terms" />
				<label for="terms" class="termsLabel woocommerce-form__label woocommerce-form__label-for-checkbox checkbox">
					<span class="termsFakeCheckbox"></span>
					<span class="woocommerce-terms-and-conditions-checkbox-text"><?php wc_terms_and_conditions_checkbox_text(); ?></span>&nbsp;<abbr class="required" title="<?php esc_attr_e( 'required', 'woocommerce' ); ?>">*</abbr>
				</label>
				<input type="hidden" name="terms-field" value="1" />
			</p>
		<?php endif; ?>
	</div>

	<style>

		#order_review .woocommerce-form__label-for-checkbox:before {
			display: none !important;
		}
		#terms {
			display: none;
		}
		.termsFakeCheckbox {
			display: flex;
    width: 28px;
	justify-content: center;
	align-items: center;
    cursor: pointer;
    content: "";
    min-width: 28px;
    max-width: 28px;
    min-height: 28px;
    max-height: 28px;
    height: 28px;
    border: 2px solid #e2a269!important;
    border-radius: 0!important;
		}
		.termsFakeCheckbox:after {
			min-width: 13px;
    max-width: 13px;
    min-height: 13px;
    max-height: 13px;
    cursor: pointer;
    height: 13px;
    background-color: #e2a269;
	transform: scale(0);
    transition: all .3s ease;
    content: "";
		}
		#terms:checked + label .termsFakeCheckbox:after{
			transform: scale(1);
		}
	</style>
	<?php

	do_action( 'woocommerce_checkout_after_terms_and_conditions' );
}
