<?php
/**
 * Lost password reset form.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-reset-password.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 7.0.1
 */

defined( 'ABSPATH' ) || exit;

do_action( 'woocommerce_before_reset_password_form' );
?>

<div class="resetPasswordBox">
	<h3>Resetowanie hasła</h3>

	<ul class="woocommerce-error" role="alert">
		<?php foreach ( $notices as $notice ) : ?>
			<li<?php echo wc_get_notice_data_attr( $notice ); ?>>
				<?php echo wc_kses_notice( $notice['notice'] ); ?>
			</li>
		<?php endforeach; ?>


	</ul>
	<?php foreach ( $notices as $notice ) : ?>
	<div class="woocommerce-info"<?php echo wc_get_notice_data_attr( $notice ); ?>>
		<?php echo wc_kses_notice( $notice['notice'] ); ?>
	</div>
<?php endforeach; ?>
<?php foreach ( $notices as $notice ) : ?>
	<div class="woocommerce-message"<?php echo wc_get_notice_data_attr( $notice ); ?> role="alert">
		<?php echo wc_kses_notice( $notice['notice'] ); ?>
	</div>
<?php endforeach; ?>
            <p class="loginBox__desc">Wpisz nowe hasło</p>
	<form method="post" class="woocommerce-ResetPassword lost_reset_password">


		<p class="woocommerce-form-row woocommerce-form-row--first form-row form-row-first">
			<input type="password" class="woocommerce-Input woocommerce-Input--text input-text" placeholder="Nowe hasło*" name="password_1" id="password_1" autocomplete="new-password" />
		</p>
		<p class="woocommerce-form-row woocommerce-form-row--last form-row form-row-last">
			<input type="password" class="woocommerce-Input woocommerce-Input--text input-text" placeholder="Powtórz nowe hasło*" name="password_2" id="password_2" autocomplete="new-password" />
		</p>
	
		<input type="hidden" name="reset_key" value="<?php echo esc_attr( $args['key'] ); ?>" />
		<input type="hidden" name="reset_login" value="<?php echo esc_attr( $args['login'] ); ?>" />
	
		<div class="clear"></div>
	
		<?php do_action( 'woocommerce_resetpassword_form' ); ?>
	
		<p class="woocommerce-form-row form-row">
			<input type="hidden" name="wc_reset_password" value="true" />
			<button type="submit" class="woocommerce-Button button<?php echo esc_attr( wc_wp_theme_get_element_class_name( 'button' ) ? ' ' . wc_wp_theme_get_element_class_name( 'button' ) : '' ); ?>" value="<?php esc_attr_e( 'Save', 'woocommerce' ); ?>"><?php esc_html_e( 'Save', 'woocommerce' ); ?></button>
		</p>
	
		<?php wp_nonce_field( 'reset_password', 'woocommerce-reset-password-nonce' ); ?>
	
	</form>
</div>

<style>
	.pageTitle {
		display: none;
	}
	.loginBox__desc {
		text-align: center;
	}
	.woocommerce-notices-wrapper {
		display: none;
	}
	.resetPasswordBox {
	 background-color: white;
	 max-width: 640px;
	 margin-left: auto;
	 margin-right: auto;
	 padding: 40px;
	 padding-bottom: 75px;
	 box-shadow: 0 3px 6px 0px rgba(0, 0, 0, 0.16);
}
 @media screen and (max-width: 600px) {
	 .resetPasswordBox {
		 padding: 20px;
		 padding-bottom: 40px;
	}
}
 .resetPasswordBox .u-column1 {
	 display: none;
}
 .resetPasswordBox .u-column2 h2 {
	 display: none;
}
 .resetPasswordBox h3 {
	 color: #1a1a18;
	 margin: 0;
	 font-size: 30px;
	 font-weight: 700;
	 font-family: 'Lato';
	 text-transform: uppercase;
	 text-align: center;
}
 .resetPasswordBox .registerBox__desc {
	 color: #6e6e6e;
	 font-family: 'Lato';
	 text-align: center;
	 font-size: 16px;
	 font-weight: 400;
}
 .resetPasswordBox form {
	 margin-top: 40px;
	 display: flex;
	 flex-wrap: wrap;
	 flex-flow: row wrap;
	 column-gap: 30px;
	 row-gap: 20px;
}
 .resetPasswordBox form #showRepeatPassword, .resetPasswordBox form #hideRepeatPassword, .resetPasswordBox form #showPassword, .resetPasswordBox form #hidePassword {
	 position: absolute;
	 background-color: transparent;
	 border: none;
	 cursor: pointer;
	 right: 15px;
	 top: 50%;
	 display: block;
	 z-index: 9;
	 transform: translateY(-50%);
	 transition: opacity 0.3s ease;
}
 .resetPasswordBox form #showRepeatPassword:hover, .resetPasswordBox form #hideRepeatPassword:hover, .resetPasswordBox form #showPassword:hover, .resetPasswordBox form #hidePassword:hover {
	 opacity: 0.7;
}
 .resetPasswordBox form #hideRepeatPassword, .resetPasswordBox form #hidePassword {
	 display: none;
}
 .resetPasswordBox form .form-row {
	 position: relative;
}
 .resetPasswordBox form p {
	 margin: 0;
}
 .resetPasswordBox form button[type=submit] {
	 font-family: 'Lato', sans-serif;
	 font-weight: 400;
	 z-index: 9;
	 font-size: 18px;
	 color: white;
	 border: none;
	 cursor: pointer;
	 position: relative;
	 height: 50px;
	 width: 100%;
	 display: flex;
	 justify-content: center;
	 align-items: center;
	 background-color: #e2a269;
	 border-top-right-radius: 0;
	 border-bottom-left-radius: 0;
	 transition: box-shadow 0.5s ease, padding-right 0.5s ease, border-bottom-right-radius 0.5s ease, border-top-left-radius 0.5s ease;
}
.resetPasswordBox form button[type=submit]:hover {
	background-color: #e2a269 !important;
}


 .resetPasswordBox form button[type=submit]:hover {
	 color: white;
	 border-top-left-radius: 25px;
	 border-bottom-right-radius: 25px;
}
 .resetPasswordBox form button[type=submit]:after {
	 background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='19.28' height='11.808' viewBox='0 0 19.28 11.808'%3E%3Cg id='Group_186' data-name='Group 186' transform='translate(-614 -501.192)'%3E%3Cpath id='Icon_ionic-ios-arrow-forward' data-name='Icon ionic-ios-arrow-forward' d='M15.963,12.1,11.494,7.633a.84.84,0,0,1,0-1.192.851.851,0,0,1,1.2,0L17.752,11.5a.842.842,0,0,1,.025,1.164l-5.084,5.094a.844.844,0,1,1-1.2-1.192Z' transform='translate(615.282 494.996)' fill='%23fff'/%3E%3Crect id='Rectangle_89' data-name='Rectangle 89' width='18' height='2' rx='1' transform='translate(614 506)' fill='%23fff'/%3E%3C/g%3E%3C/svg%3E%0A");
	 height: 11px;
	 background-position: center;
	 background-size: contain;
	 width: 19px;
	 position: absolute;
	 top: 53%;
	 background-repeat: no-repeat;
	 transform: translateY(-50%);
	 content: '';
	 right: 30px;
	 z-index: 9;
	 opacity: 0;
	 transition: right 0.3s ease, opacity 0.3s ease;
}
 .resetPasswordBox form button[type=submit]:hover {
	 padding-right: 20px;
	 box-shadow: 0px 3px 12px 0px rgba(0, 0, 0, 0.16);
}
 .resetPasswordBox form button[type=submit]:hover:after {
	 opacity: 1;
	 right: 15px;
}
 .resetPasswordBox form .woocommerce-privacy-policy-text {
	 display: none;
}
 .resetPasswordBox form .wc-terms-and-conditions input {
	 display: none;
}
 .resetPasswordBox form .wc-terms-and-conditions input[type=checkbox]:checked + label:before {
	 background-color: #e2a269;
}
 .resetPasswordBox form .wc-terms-and-conditions label {
	 position: relative;
	 align-items: center;
	 display: flex;
	 gap: 20px;
}
 .resetPasswordBox form .wc-terms-and-conditions label span {
	 color: #6e6e6e;
	 font-size: 16px;
	 font-weight: 400;
	 font-family: 'Lato';
}
 .resetPasswordBox form .wc-terms-and-conditions label span a {
	 color: #e2a269;
	 text-decoration: underline;
	 transition: opacity 0.3s ease;
}
 .resetPasswordBox form .wc-terms-and-conditions label span a:hover {
	 opacity: 0.7;
}
 .resetPasswordBox form .wc-terms-and-conditions label:before {
	 width: 24px;
	 cursor: pointer;
	 height: 24px;
	 min-width: 24px;
	 max-width: 24px;
	 max-height: 24px;
	 min-height: 24px;
	 content: '';
	 transition: background-color 0.3s ease;
	 border: 1px solid #b2b2b2;
	 display: block;
}
 .resetPasswordBox form .clear {
	 display: none;
}
 .resetPasswordBox form p.form-row-first, .resetPasswordBox form p.form-row-last {
	 width: 100%;
	 margin: 0;
}
 @media screen and (max-width: 600px) {
	 .resetPasswordBox form p.form-row-first, .resetPasswordBox form p.form-row-last {
		 width: 100%;
	}
}
 .resetPasswordBox form .woocommerce-form-row, .resetPasswordBox form .form-row {
	 width: 100%;
}
 .resetPasswordBox form label {
	 display: none;
}
 .resetPasswordBox form input[type=password], .resetPasswordBox form input[type=email], .resetPasswordBox form input[type=text] {
	 height: 45px;
	 width: 100%;
	 background-color: #f9f6f4;
	 color: #1a1a18;
	 font-family: 'Lato' !important;
	 outline: none;
	 font-size: 14px;
	 border: none;
	 font-weight: 400;
	 padding-left: 20px;
}
 .resetPasswordBox form input[type=password]::placeholder, .resetPasswordBox form input[type=email]::placeholder, .resetPasswordBox form input[type=text]::placeholder {
	 color: #1a1a18;
	 font-family: 'Lato' !important;
	 font-size: 14px;
	 font-weight: 400;
}
 
</style>

<?php
do_action( 'woocommerce_after_reset_password_form' );

