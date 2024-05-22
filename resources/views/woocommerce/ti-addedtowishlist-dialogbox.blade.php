<?php
/**
 * The Template for displaying dialog for message added to wishlist product.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/ti-addedtowishlist-dialogbox.php.
 *
 * @version             2.5.0
 * @package           TInvWishlist\Template
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

?>
<div class="tinvwl_added_to_wishlist tinv-modal tinv-modal-open">
	<div class="tinv-overlay"></div>
	<div class="tinv-table">
		<div class="tinv-cell">
			<div class="tinv-modal-inner">
				<i class="<?php echo esc_attr( $icon ); ?>"></i>
				<div class="tinv-txt"><?php echo $msg; // WPCS: xss ok. ?></div>
				<div class="tinvwl-buttons-group tinv-wishlist-clear">
					<?php if ( isset( $wishlist_url ) ) : ?>
						<button class=" tinvwl_button_view tinvwl-btn-onclick motulinkaBtn motulinkaBtn--halfRounded"
								data-url="<?php echo esc_url( $wishlist_url ); ?>" type="button"><i
								class="ftinvwl ftinvwl-heart-o"></i><?php echo wp_kses_post( apply_filters( 'tinvwl_view_wishlist_text', tinvwl_message_placeholders( tinv_get_option( 'general', 'text_browse' ), null, $wishlist ) ) ); ?>
						</button>
					<?php endif; ?>
					<?php if ( isset( $dialog_custom_url ) && isset( $dialog_custom_html ) ) : ?>
						<button class=" tinvwl_button_view tinvwl-btn-onclick motulinkaBtn motulinkaBtn--halfRounded"
								data-url="<?php echo esc_url( $dialog_custom_url ); ?>"
								type="button"><?php echo $dialog_custom_html; // WPCS: xss ok. ?></button>
					<?php endif; ?>
					<button class=" tinvwl_button_close motulinkaBtn motulinkaBtn--halfRounded" type="button"><i
							class="ftinvwl ftinvwl-times"></i><?php esc_html_e( 'Close', 'ti-woocommerce-wishlist' ); ?>
					</button>
				</div>
				<div class="tinv-wishlist-clear"></div>
			</div>
		</div>
	</div>
</div>

<style>
.tinv-modal-inner {
        background-color: white !important;
		border-radius: 10px !important;
	box-shadow: 0px 3px 6px 0px rgba(0,0,0,0.16);
	font-family: 'Lato' !important;
    }

.tinv-wishlist .tinvwl-buttons-group button i.ftinvwl-heart-o::before, .tinv-wishlist .tinvwl-buttons-group button i.ftinvwl-key::before, .tinv-wishlist .tinvwl-buttons-group button i.ftinvwl-times::before {
	display: none !important;
}

.tinv-wishlist .tinvwl-buttons-group button {
	border: none !important;
}
</style>