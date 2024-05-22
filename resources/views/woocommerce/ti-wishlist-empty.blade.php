<?php
/**
 * The Template for displaying empty wishlist.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/ti-wishlist-empty.php.
 *
 * @version             2.5.2
 * @package           TInvWishlist\Template
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

?>
<div class="tinv-wishlist woocommerce tinv-wishlist-clear">
	<?php do_action( 'tinvwl_before_wishlist', $wishlist ); ?>
	<?php if ( function_exists( 'wc_print_notices' ) && isset( WC()->session ) ) {
		wc_print_notices();
	} ?>
    <h4 class="emptyWishlistText">Twoja lista ulubionych produktów jest pusta</h4>
    <a href="{!! site_url() !!}/shop" class="motulinkaBtn motulinkaBtn--rounded">Przejdź do sklepu</a>

	<?php do_action( 'tinvwl_wishlist_is_empty' ); ?>


    <style>
        .tinv-header {
            display: none;
        }
        .emptyWishlistText {
            font-family: 'Lato';
            font-size: 24px;
            font-weight: 900;
            text-align: center;
            color: #1A1A18;
        }
        .tinv-wishlist .motulinkaBtn {
            margin-left: auto;
            margin-right: auto;
        }
    </style>
	
</div>
