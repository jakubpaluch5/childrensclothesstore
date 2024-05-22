<?php
/**
 * Login form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/global/form-login.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     7.0.1
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( is_user_logged_in() ) {
	return;
}

?>
<form class="woocommerce-form woocommerce-form-login login" method="post" <?php echo ( $hidden ) ? 'style="display:none;"' : ''; ?>>

	<?php do_action( 'woocommerce_login_form_start' ); ?>

	<?php echo ( $message ) ? wpautop( wptexturize( $message ) ) : ''; // @codingStandardsIgnoreLine ?>

	<p class="form-row form-row-first">
		<label for="username"><?php esc_html_e( 'Username or email', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
		<input placeholder="Email*" type="text" class="input-text" name="username" id="username" autocomplete="username" />
	</p>
	<p class="form-row form-row-last">
		<button type="button" id="showPassword">
			<svg xmlns="http://www.w3.org/2000/svg" width="20.513" height="15.464" viewBox="0 0 20.513 15.464">
	  <g id="Icon_feather-eye" data-name="Icon feather-eye" transform="translate(-0.5 -5)" opacity="0.5">
		<path id="Path_7868" data-name="Path 7868" d="M1.5,12.732S4.866,6,10.756,6s9.256,6.732,9.256,6.732-3.366,6.732-9.256,6.732S1.5,12.732,1.5,12.732Z" fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
		<path id="Path_7869" data-name="Path 7869" d="M18.549,16.024A2.524,2.524,0,1,1,16.024,13.5,2.524,2.524,0,0,1,18.549,16.024Z" transform="translate(-5.268 -3.293)" fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
	  </g>
	</svg>
	
	
	
			</button>
			<button type="button" id="hidePassword">
			<svg xmlns="http://www.w3.org/2000/svg" width="20.513" height="19.895" viewBox="0 0 20.513 19.895">
	  <g id="Group_5216" data-name="Group 5216" transform="translate(-1192.5 -590.553)">
		<g id="Group_5215" data-name="Group 5215">
		  <g id="Icon_feather-eye" data-name="Icon feather-eye" transform="translate(1192 588)" opacity="0.5">
			<path id="Path_7868" data-name="Path 7868" d="M1.5,12.732S4.866,6,10.756,6s9.256,6.732,9.256,6.732-3.366,6.732-9.256,6.732S1.5,12.732,1.5,12.732Z" fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
			<path id="Path_7869" data-name="Path 7869" d="M18.549,16.024A2.524,2.524,0,1,1,16.024,13.5,2.524,2.524,0,0,1,18.549,16.024Z" transform="translate(-5.268 -3.293)" fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
		  </g>
		  <line id="Line_30" data-name="Line 30" x2="18" y2="18.5" transform="translate(1193.5 591.25)" fill="none" stroke="#7b7a79" stroke-width="2"/>
		</g>
	  </g>
	</svg>
	
	
	
	
			</button>
		<label for="password"><?php esc_html_e( 'Password', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
		<input placeholder="Hasło*" class="input-text woocommerce-Input" type="password" name="password" id="password" autocomplete="current-password" />
	</p>
	
	<script>
		document.querySelector('#showPassword').addEventListener('click', () => {
			document.querySelector('#password').type = 'text';
			document.querySelector('#showPassword').style = 'display: none';
			document.querySelector('#hidePassword').style = 'display: block';
		})
	
		document.querySelector('#hidePassword').addEventListener('click', () => {
			document.querySelector('#password').type = 'password';
			document.querySelector('#hidePassword').style = 'display: none';
			document.querySelector('#showPassword').style = 'display: block';
		})
	</script>
	
	<div class="clear"></div>

	<?php do_action( 'woocommerce_login_form' ); ?>
	<div class="formWrapper">
	<p class="form-row remember">
		
			<input class="woocommerce-form__input woocommerce-form__input-checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever" /> 
			<label style="display: flex;" for="rememberme" class="woocommerce-form__label woocommerce-form__label-for-checkbox woocommerce-form-login__rememberme">Zapamiętaj mnie</label>
		<?php wp_nonce_field( 'woocommerce-login', 'woocommerce-login-nonce' ); ?>
		<input type="hidden" name="redirect" value="<?php echo esc_url( $redirect ); ?>" />
		
	</p>
	<p class="lost_password">
		<a href="{!! site_url() !!}/zapomniales-hasla">Zapominałeś hasła?</a>
	</p>
</div>
	<button type="submit" class="woocommerce-button button woocommerce-form-login__submit<?php echo esc_attr( wc_wp_theme_get_element_class_name( 'button' ) ? ' ' . wc_wp_theme_get_element_class_name( 'button' ) : '' ); ?>" name="login" value="<?php esc_attr_e( 'Login', 'woocommerce' ); ?>"><?php esc_html_e( 'Login', 'woocommerce' ); ?></button>

	<div class="clear"></div>

	<?php do_action( 'woocommerce_login_form_end' ); ?>

</form>
