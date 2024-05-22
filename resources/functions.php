<?php

/**
 * Do not edit anything in this file unless you know what you're doing
 */

use Roots\Sage\Config;
use Roots\Sage\Container;

/**
 * Helper function for prettying up errors
 * @param string $message
 * @param string $subtitle
 * @param string $title
 */
$sage_error = function ($message, $subtitle = '', $title = '') {
    $title = $title ?: __('Sage &rsaquo; Error', 'sage');
    $footer = '<a href="https://roots.io/sage/docs/">roots.io/sage/docs/</a>';
    $message = "<h1>{$title}<br><small>{$subtitle}</small></h1><p>{$message}</p><p>{$footer}</p>";
    wp_die($message, $title);
};

/**
 * Ensure compatible version of PHP is used
 */
if (version_compare('7.1', phpversion(), '>=')) {
    $sage_error(__('You must be using PHP 7.1 or greater.', 'sage'), __('Invalid PHP version', 'sage'));
}

/**
 * Ensure compatible version of WordPress is used
 */
if (version_compare('4.7.0', get_bloginfo('version'), '>=')) {
    $sage_error(__('You must be using WordPress 4.7.0 or greater.', 'sage'), __('Invalid WordPress version', 'sage'));
}

/**
 * Ensure dependencies are loaded
 */
if (!class_exists('Roots\\Sage\\Container')) {
    if (!file_exists($composer = __DIR__.'/../vendor/autoload.php')) {
        $sage_error(
            __('You must run <code>composer install</code> from the Sage directory.', 'sage'),
            __('Autoloader not found.', 'sage')
        );
    }
    require_once $composer;
}

/**
 * Sage required files
 *
 * The mapped array determines the code library included in your theme.
 * Add or remove files to the array as needed. Supports child theme overrides.
 */
array_map(function ($file) use ($sage_error) {
    $file = "../app/{$file}.php";
    if (!locate_template($file, true, true)) {
        $sage_error(sprintf(__('Error locating <code>%s</code> for inclusion.', 'sage'), $file), 'File not found');
    }
}, ['helpers', 'setup', 'filters', 'admin']);

/**
 * Here's what's happening with these hooks:
 * 1. WordPress initially detects theme in themes/sage/resources
 * 2. Upon activation, we tell WordPress that the theme is actually in themes/sage/resources/views
 * 3. When we call get_template_directory() or get_template_directory_uri(), we point it back to themes/sage/resources
 *
 * We do this so that the Template Hierarchy will look in themes/sage/resources/views for core WordPress themes
 * But functions.php, style.css, and index.php are all still located in themes/sage/resources
 *
 * This is not compatible with the WordPress Customizer theme preview prior to theme activation
 *
 * get_template_directory()   -> /srv/www/example.com/current/web/app/themes/sage/resources
 * get_stylesheet_directory() -> /srv/www/example.com/current/web/app/themes/sage/resources
 * locate_template()
 * ├── STYLESHEETPATH         -> /srv/www/example.com/current/web/app/themes/sage/resources/views
 * └── TEMPLATEPATH           -> /srv/www/example.com/current/web/app/themes/sage/resources
 */
array_map(
    'add_filter',
    ['theme_file_path', 'theme_file_uri', 'parent_theme_file_path', 'parent_theme_file_uri'],
    array_fill(0, 4, 'dirname')
);
Container::getInstance()
    ->bindIf('config', function () {
        return new Config([
            'assets' => require dirname(__DIR__).'/config/assets.php',
            'theme' => require dirname(__DIR__).'/config/theme.php',
            'view' => require dirname(__DIR__).'/config/view.php',
        ]);
    }, true);






// START ACF PRO OPTION PAGE CODE ---------------------------------------------------------------------------

    if( function_exists('acf_add_options_page') ) {

        acf_add_options_page(array(
            'page_title'    => 'Ustawienia szablonu',
            'menu_title'    => 'Motulinka',
            'menu_slug'     => 'theme-general-settings',
            'capability'    => 'edit_posts',
            'redirect'      => false
        ));
    
        acf_add_options_sub_page(array(
            'page_title'    => 'Ustawienia headera',
            'menu_title'    => 'Ustawienia headera',
            'parent_slug'   => 'theme-general-settings',
        ));
    
        acf_add_options_sub_page(array(
            'page_title'    => 'Ustawienia stopki',
            'menu_title'    => 'Ustawienia stopki',
            'parent_slug'   => 'theme-general-settings',
        ));
    
    }

    // END ACF PRO OPTION PAGE CODE ---------------------------------------------------------------------------







    add_filter( 'woocommerce_add_to_cart_fragments', 'iconic_cart_count_fragments', 10, 1 );

    function iconic_cart_count_fragments( $fragments ) {
        

        $fragments['div.cartCounter'] = '<div class="cartCounter">' . WC()->cart->get_cart_contents_count() . '</div>';
        
        return $fragments;
        
    }





    function opinie_post_type()
{
    register_post_type(
        'opinie',
        array(
            'labels'      => array(
                'name'          => __('Opinie', 'textdomain'),
                'singular_name' => __('Opinia', 'textdomain'),
            ),
            'public'      => true,
            'has_archive' => true,
            'menu_icon' => 'dashicons-superhero-alt',
            'supports' => ['title'],
        )
    );
}

add_action('init', 'opinie_post_type');



add_filter( 'woocommerce_breadcrumb_defaults', 'wps_breadcrumb_delimiter' );
function wps_breadcrumb_delimiter( $defaults ) {
  $defaults['delimiter'] = '<span> / </span>';
  return $defaults;
}





/**
 * Change number of products that are displayed per page (shop page)
 */
add_filter( 'loop_shop_per_page', 'new_loop_shop_per_page', 20 );

function new_loop_shop_per_page( $cols ) {
  // $cols contains the current number of products per page based on the value stored on Options –> Reading
  // Return the number of products you wanna show per page.
  $cols = 12;
  return $cols;
}





function wc_remove_checkout_fields( $fields ) {
    // Billing fields
    unset( $fields['billing']['billing_company'] );
    // unset( $fields['billing']['billing_email'] );
    // unset( $fields['billing']['billing_phone'] );
    // unset( $fields['billing']['billing_state'] );
    // unset( $fields['billing']['billing_first_name'] );
    // unset( $fields['billing']['billing_last_name'] );
    // unset( $fields['billing']['billing_address_1'] );
    // unset( $fields['billing']['billing_address_2'] );
    // unset( $fields['billing']['billing_city'] );
    // unset( $fields['billing']['billing_postcode'] );
    // Shipping fields
    unset( $fields['shipping']['shipping_company'] );
    // unset( $fields['shipping']['shipping_phone'] );
    // unset( $fields['shipping']['shipping_state'] );
    // unset( $fields['shipping']['shipping_first_name'] );
    // unset( $fields['shipping']['shipping_last_name'] );
    // unset( $fields['shipping']['shipping_address_1'] );
    // unset( $fields['shipping']['shipping_address_2'] );
    // unset( $fields['shipping']['shipping_city'] );
    // unset( $fields['shipping']['shipping_postcode'] );
    // Order fields
    // unset( $fields['order']['order_comments'] );
    return $fields;
    }
    add_filter( 'woocommerce_checkout_fields', 'wc_remove_checkout_fields' );


    add_filter( 'woocommerce_checkout_fields' , 'override_billing_checkout_fields', 20, 1 );
    function override_billing_checkout_fields( $fields ) {
        $fields['billing']['billing_phone']['placeholder'] = 'Telefon*';
        $fields['billing']['billing_email']['placeholder'] = 'Email*';
        return $fields;
    }

    add_filter('woocommerce_default_address_fields', 'override_default_address_checkout_fields', 20, 1);
function override_default_address_checkout_fields( $address_fields ) {
    $address_fields['first_name']['placeholder'] = 'Imię*';
    $address_fields['last_name']['placeholder'] = 'Nazwisko*';
    $address_fields['address_1']['placeholder'] = 'Ulica*';
    $address_fields['address_2']['placeholder'] = 'Numer domu*';
    $address_fields['state']['placeholder'] = 'Region*';
    $address_fields['postcode']['placeholder'] = 'Kod pocztowy*';
    $address_fields['city']['placeholder'] = 'Miasto*';
    return $address_fields;
}




/**
 * @snippet       WooCommerce User Registration Shortcode
 * @how-to        Get CustomizeWoo.com FREE
 * @author        Rodolfo Melogli
 * @compatible    WooCommerce 7
 * @donate $9     https://businessbloomer.com/bloomer-armada/
 */
   
 add_shortcode( 'wc_reg_form_bbloomer', 'bbloomer_separate_registration_form' );
     
 function bbloomer_separate_registration_form() {
    if ( is_user_logged_in() ) return '<p>Jesteś już zarejestrowany/zarejestrowana!</p>';
    ob_start();
    do_action( 'woocommerce_before_customer_login_form' );
    echo $html = wc_get_template_html( 'myaccount/form-login.blade.php' );
    // $dom = new DOMDocument();
    // $dom->encoding = 'utf-8';
    // $dom->loadHTML( utf8_decode( $html ) );
    // $xpath = new DOMXPath( $dom );
    // $form = $xpath->query( '//form[contains(@class,"register")]' );
    // $form = $form->item( 0 );
    // echo $dom->saveXML( $form );
    return ob_get_clean();
 }





/**
 * @snippet       WooCommerce User Login Shortcode
 * @how-to        Get CustomizeWoo.com FREE
 * @author        Rodolfo Melogli
 * @compatible    WooCommerce 7
 * @donate $9     https://businessbloomer.com/bloomer-armada/
 */
  
 add_shortcode( 'wc_login_form_bbloomer', 'bbloomer_separate_login_form' );
  
 function bbloomer_separate_login_form() {
    if ( is_user_logged_in() ) return '<p>You are already logged in</p>'; 
    ob_start();
    do_action( 'woocommerce_before_customer_login_form' );
    woocommerce_login_form( array( 'redirect' => wc_get_page_permalink( 'myaccount' ) ) );
    return ob_get_clean();
 }




/**
 * @snippet       Redirect Login/Registration to My Account
 * @how-to        Get CustomizeWoo.com FREE
 * @author        Rodolfo Melogli
 * @compatible    WooCommerce 7
 * @donate $9     https://businessbloomer.com/bloomer-armada/
 */
 
 add_action( 'template_redirect', 'bbloomer_redirect_login_registration_if_logged_in' );
 
 function bbloomer_redirect_login_registration_if_logged_in() {
     if ( is_page() && is_user_logged_in() && ( has_shortcode( get_the_content(), 'wc_login_form_bbloomer' ) || has_shortcode( get_the_content(), 'wc_reg_form_bbloomer' ) ) ) {
         wp_safe_redirect( wc_get_page_permalink( 'myaccount' ) );
         exit;
     }
 }



 function wooc_extra_register_fields() {?>

    <p class="form-row form-row-first">
    <label for="reg_billing_first_name"><?php _e( 'First name', 'woocommerce' ); ?><span class="required">*</span></label>
    <input type="text" class="input-text" name="billing_first_name" placeholder="Imię*" id="reg_billing_first_name" value="<?php if ( ! empty( $_POST['billing_first_name'] ) ) esc_attr_e( $_POST['billing_first_name'] ); ?>" />
    </p>
    <p class="form-row form-row-last">
    <label for="reg_billing_last_name"><?php _e( 'Last name', 'woocommerce' ); ?><span class="required">*</span></label>
    <input type="text" class="input-text" name="billing_last_name" placeholder="Nazwisko*" id="reg_billing_last_name" value="<?php if ( ! empty( $_POST['billing_last_name'] ) ) esc_attr_e( $_POST['billing_last_name'] ); ?>" />
    </p>
    <div class="clear"></div>
    <?php
}
add_action( 'woocommerce_register_form_start', 'wooc_extra_register_fields' );





/**
* register fields Validating.
*/
function wooc_validate_extra_register_fields( $username, $email, $validation_errors ) {
    if ( isset( $_POST['billing_first_name'] ) && empty( $_POST['billing_first_name'] ) ) {
           $validation_errors->add( 'billing_first_name_error', __( '<strong>Error</strong>: First name is required!', 'woocommerce' ) );
    }
    if ( isset( $_POST['billing_last_name'] ) && empty( $_POST['billing_last_name'] ) ) {
           $validation_errors->add( 'billing_last_name_error', __( '<strong>Error</strong>: Last name is required!.', 'woocommerce' ) );
    }
       return $validation_errors;
}
add_action( 'woocommerce_register_post', 'wooc_validate_extra_register_fields', 10, 3 );






/**
* Below code save extra fields.
*/
function wooc_save_extra_register_fields( $customer_id ) {
  
      if ( isset( $_POST['billing_first_name'] ) ) {
             //First name field which is by default
             update_user_meta( $customer_id, 'first_name', sanitize_text_field( $_POST['billing_first_name'] ) );
             // First name field which is used in WooCommerce
             update_user_meta( $customer_id, 'billing_first_name', sanitize_text_field( $_POST['billing_first_name'] ) );
      }
      if ( isset( $_POST['billing_last_name'] ) ) {
             // Last name field which is by default
             update_user_meta( $customer_id, 'last_name', sanitize_text_field( $_POST['billing_last_name'] ) );
             // Last name field which is used in WooCommerce
             update_user_meta( $customer_id, 'billing_last_name', sanitize_text_field( $_POST['billing_last_name'] ) );
      }
}
add_action( 'woocommerce_created_customer', 'wooc_save_extra_register_fields' );







/**
 * Add the code below to your theme's functions.php file
 * to add a confirm password field on the register form under My Accounts.
 */ 
function woocommerce_registration_errors_validation($reg_errors, $sanitized_user_login, $user_email) {
	global $woocommerce;
	extract( $_POST );
	if ( strcmp( $password, $password2 ) !== 0 ) {
		return new WP_Error( 'registration-error', __( 'Hasła są różne.', 'woocommerce' ) );
	}
	return $reg_errors;
}
add_filter('woocommerce_registration_errors', 'woocommerce_registration_errors_validation', 10, 3);

function woocommerce_register_form_password_repeat() {
	?>
	<p class="form-row form-row-wide">
		<label for="reg_password2"><?php _e( 'Confirm password', 'woocommerce' ); ?> <span class="required">*</span></label>
        <button type="button" id="showRepeatPassword">
        <svg xmlns="http://www.w3.org/2000/svg" width="20.513" height="15.464" viewBox="0 0 20.513 15.464">
  <g id="Icon_feather-eye" data-name="Icon feather-eye" transform="translate(-0.5 -5)" opacity="0.5">
    <path id="Path_7868" data-name="Path 7868" d="M1.5,12.732S4.866,6,10.756,6s9.256,6.732,9.256,6.732-3.366,6.732-9.256,6.732S1.5,12.732,1.5,12.732Z" fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
    <path id="Path_7869" data-name="Path 7869" d="M18.549,16.024A2.524,2.524,0,1,1,16.024,13.5,2.524,2.524,0,0,1,18.549,16.024Z" transform="translate(-5.268 -3.293)" fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
  </g>
</svg>



        </button>
        <button type="button" id="hideRepeatPassword">
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
		<input type="password" class="input-text" name="password2" placeholder="Powtórz hasło*" id="reg_password2" value="<?php if ( ! empty( $_POST['password2'] ) ) echo esc_attr( $_POST['password2'] ); ?>" />
	</p>

    <script>
    document.querySelector('#showRepeatPassword').addEventListener('click', () => {
        document.querySelector('#reg_password2').type = 'text';
        document.querySelector('#showRepeatPassword').style = 'display: none';
        document.querySelector('#hideRepeatPassword').style = 'display: block';
    })

    document.querySelector('#hideRepeatPassword').addEventListener('click', () => {
        document.querySelector('#reg_password2').type = 'password';
        document.querySelector('#hideRepeatPassword').style = 'display: none';
        document.querySelector('#showRepeatPassword').style = 'display: block';
    })
</script>
	<?php
}
add_action( 'woocommerce_register_form', 'woocommerce_register_form_password_repeat' );



// Add term and conditions check box on registration form
add_action( 'woocommerce_register_form', 'add_terms_and_conditions_to_registration', 20 );
function add_terms_and_conditions_to_registration() {

 
        ?>
        <p class="form-row terms wc-terms-and-conditions">
      
            <input type="checkbox" class="woocommerce-form__input woocommerce-form__input-checkbox input-checkbox" id="terms" name="terms"></span>
            <label style="display: flex;" for="terms" class="woocommerce-form__label woocommerce-form__label-for-checkbox checkbox">
               <span>Akceptuję <a href="<?php echo site_url() ?>/polityka-prywatnosci">Politykę prywatności</a></span>
            </label>
            <input type="hidden" name="terms-field" value="1" />
        </p>
    <?php
    
}

// Validate required term and conditions check box
add_action( 'woocommerce_register_post', 'terms_and_conditions_validation', 20, 3 );
function terms_and_conditions_validation( $username, $email, $validation_errors ) {
    if ( ! isset( $_POST['terms'] ) )
        $validation_errors->add( 'terms_error', __( 'Terms and condition are not checked!', 'woocommerce' ) );

    return $validation_errors;
}




function WOO_account_menu_items($items) {
    unset($items['downloads']);
    unset($items['dashboard']);
    unset($items['wishlist']);
    return $items;            
}

add_filter ('woocommerce_account_menu_items', 'WOO_account_menu_items');




/**
* @snippet       Rename Edit Address Tab @ My Account
* @how-to        Get CustomizeWoo.com FREE
* @author        Rodolfo Melogli
* @testedwith    WooCommerce 5.0
* @donate $9     https://businessbloomer.com/bloomer-armada/
*/
 
add_filter( 'woocommerce_account_menu_items', 'bbloomer_rename_address_my_account', 9999 );
 
function bbloomer_rename_address_my_account( $items ) {
   $items['edit-address'] = 'Moje Adresy';
   $items['orders'] = 'Moje zamówienia';
   $items['edit-account'] = 'Zmień moje dane';
   return $items;
}









/**
 * @snippet       WooCommerce Add New Tab @ My Account
 * @how-to        Get CustomizeWoo.com FREE
 * @author        Rodolfo Melogli
 * @compatible    WooCommerce 5.0
 * @donate $9     https://businessbloomer.com/bloomer-armada/
 */
  
// ------------------
// 1. Register new endpoint (URL) for My Account page
// Note: Re-save Permalinks or it will give 404 error
  
function bbloomer_add_premium_support_endpoint() {
    add_rewrite_endpoint( 'usun-konto', EP_ROOT | EP_PAGES );
}
  
add_action( 'init', 'bbloomer_add_premium_support_endpoint' );
  
// ------------------
// 2. Add new query var
  
function bbloomer_premium_support_query_vars( $vars ) {
    $vars[] = 'usun-konto';
    return $vars;
}
  
add_filter( 'query_vars', 'bbloomer_premium_support_query_vars', 0 );
  
// ------------------
// 3. Insert the new endpoint into the My Account menu
  
function bbloomer_add_premium_support_link_my_account( $items ) {
    $items['usun-konto'] = 'Usuń konto';
    return $items;
}
  
add_filter( 'woocommerce_account_menu_items', 'bbloomer_add_premium_support_link_my_account' );
  
// ------------------
// 4. Add content to the new tab
  
function bbloomer_premium_support_content() {
    ?>
    <h4>Usuwanie konta</h4>
    <p>Ta operacja jest nieodwracalna i trzeba będzie na nowo założyć konto.</p>
    <?php
    echo do_shortcode( '[wp_frontend_delete_account]' );
}
  
add_action( 'woocommerce_account_usun-konto_endpoint', 'bbloomer_premium_support_content' );
// Note: add_action must follow 'woocommerce_account_{your-endpoint-slug}_endpoint' format






// Add custom checkout field: woocommerce_review_order_before_submit
add_action( 'woocommerce_before_order_notes', 'jezyk_field' );
function jezyk_field() {
    echo '<div id="jezyk_field">';

    woocommerce_form_field( 'jezyk_field', array(
        'type'      => 'hidden',
        'value'  => true, 
        'class'     => array('woocommerce-form__label-for-checkbox'),
        'label'     => __('Język przeglądania strony'),
    ),);
    echo '</div>';
}

// Save the custom checkout field in the order meta, when checkbox has been checked
add_action( 'woocommerce_checkout_update_order_meta', 'custom_checkout_field_update_order_metajezyk_field', 10, 1 );
function custom_checkout_field_update_order_metajezyk_field( $order_id ) {

    if ( ! empty( $_POST['jezyk_field'] ) )
        update_post_meta( $order_id, 'jezyk_field', $_POST['jezyk_field'] );
}

// Display the custom field result on the order edit page (backend) when checkbox has been checked
add_action( 'woocommerce_admin_order_data_after_billing_address', 'display_custom_field_on_order_edit_pagesjezyk_field', 10, 1 );
function display_custom_field_on_order_edit_pagesjezyk_field( $order ){
    $jezyk_field = get_post_meta( $order->get_id(), 'jezyk_field', true );
        echo '<p><strong>Język przeglądania: </strong> <span style="color:red;">'. $jezyk_field .'</span></p>';
}









// Add custom checkout field: woocommerce_review_order_before_submit
add_action( 'woocommerce_before_order_notes', 'my_custom_checkout_field' );
function my_custom_checkout_field() {
    echo '<div id="my_custom_checkout_field">';

    woocommerce_form_field( 'my_field_name', array(
        'type'      => 'checkbox',
        'value'  => true, 
        'default' => 1,
        'class'     => array('input-checkbox woocommerce-form__label-for-checkbox'),
        'label'     => __('Chcę otrzymać fakturę VAT'),
    ),  WC()->checkout->get_value( 'my_field_name' ) ? $checkout->get_value( 'my_field_name' ) : 0 );
    echo '</div>';
}

// Save the custom checkout field in the order meta, when checkbox has been checked
add_action( 'woocommerce_checkout_update_order_meta', 'custom_checkout_field_update_order_meta', 10, 1 );
function custom_checkout_field_update_order_meta( $order_id ) {

    if ( ! empty( $_POST['my_field_name'] ) )
        update_post_meta( $order_id, 'my_field_name', $_POST['my_field_name'] );
}

// Display the custom field result on the order edit page (backend) when checkbox has been checked
add_action( 'woocommerce_admin_order_data_after_billing_address', 'display_custom_field_on_order_edit_pages', 10, 1 );
function display_custom_field_on_order_edit_pages( $order ){
    $my_field_name = get_post_meta( $order->get_id(), 'my_field_name', true );
    if( $my_field_name == 1 )
        echo '<p><strong>Czy chcę fakturę: </strong> <span style="color:red;">Tak</span></p>';
}









// Add custom checkout field: woocommerce_review_order_before_submit
add_action( 'woocommerce_before_order_notes', 'my_custom_checkout_field_nip' );
function my_custom_checkout_field_nip() {
    echo '<div class="companyMeta"><h4>Dane do faktury</h4>';
    echo '<div id="my_custom_checkout_field_nip">';
  

    woocommerce_form_field( 'my_field_name_nip', array(
        'type'      => 'text',
        'class'     => array('input-checkbox woocommerce-form__label-for-checkbox'),
        'label'     => __('NIP'),
        'placeholder' => 'NIP',
    ),  WC()->checkout->get_value( 'my_field_name_nip' ) );
    echo '</div>';
}

// Save the custom checkout field in the order meta, when checkbox has been checked
add_action( 'woocommerce_checkout_update_order_meta', 'custom_checkout_field_update_order_meta_nip', 10, 1 );
function custom_checkout_field_update_order_meta_nip( $order_id ) {

    if ( ! empty( $_POST['my_field_name_nip'] ) )
        update_post_meta( $order_id, 'my_field_name_nip', $_POST['my_field_name_nip'] );
}

// Display the custom field result on the order edit page (backend) when checkbox has been checked
add_action( 'woocommerce_admin_order_data_after_billing_address', 'display_custom_field_on_order_edit_pages_nip', 10, 1 );
function display_custom_field_on_order_edit_pages_nip( $order ){
    $my_field_name_nip = get_post_meta( $order->get_id(), 'my_field_name_nip', true );
    if( $my_field_name_nip == 1 )
        echo '<p><strong>NIP: </strong> <span style="color:red;">Tak</span></p>';
}






// Add custom checkout field: woocommerce_review_order_before_submit
add_action( 'woocommerce_before_order_notes', 'my_custom_checkout_field_companyname' );
function my_custom_checkout_field_companyname() {
    echo '<div id="my_custom_checkout_field_companyname">';

    woocommerce_form_field( 'my_field_name_companyname', array(
        'type'      => 'text',
        'class'     => array('input-checkbox woocommerce-form__label-for-checkbox'),
        'label'     => __('companyname'),
        'placeholder' => 'Nazwa firmy',
    ),  WC()->checkout->get_value( 'my_field_name_companyname' ) );
    echo '</div>';
    echo '</div>';
}

// Save the custom checkout field in the order meta, when checkbox has been checked
add_action( 'woocommerce_checkout_update_order_meta', 'custom_checkout_field_update_order_meta_companyname', 10, 1 );
function custom_checkout_field_update_order_meta_companyname( $order_id ) {

    if ( ! empty( $_POST['my_field_name_companyname'] ) )
        update_post_meta( $order_id, 'my_field_name_companyname', $_POST['my_field_name_companyname'] );
}

// Display the custom field result on the order edit page (backend) when checkbox has been checked
add_action( 'woocommerce_admin_order_data_after_billing_address', 'display_custom_field_on_order_edit_pages_companyname', 10, 1 );
function display_custom_field_on_order_edit_pages_companyname( $order ){
    $my_field_name_companyname = get_post_meta( $order->get_id(), 'my_field_name_companyname', true );
    if( $my_field_name_companyname == 1 )
        echo '<p><strong>Nazwa firmy: </strong> <span style="color:red;">Tak</span></p>';
}









add_filter( 'woocommerce_checkout_fields' , 'change_order_notes_placeholder' );
function change_order_notes_placeholder( $fields ) {
     $fields['order']['order_comments']['placeholder'] = _x('Uwagi do zamówienia', 'placeholder', 'woocommerce');

     return $fields;
}




// function wpse139657_orderby(){
//     if( isset($_GET['orderby']) ){
//         $order = $_GET['order'] or 'DESC';
//         set_query_var('orderby', 'meta_value_num');
//         set_query_var('orderby', 'date');
//         set_query_var('meta_type', 'numeric');
//         set_query_var('meta_key', $_GET['orderby']);
//         set_query_var('order', $order);
//     }
// }

// add_filter('pre_get_posts','wpse139657_orderby');






function collection_post_type()
{
    register_post_type(
        'collection',
        array(
            'labels'      => array(
                'name'          => __('Kolekcje', 'textdomain'),
                'singular_name' => __('Kolekcja', 'textdomain'),
            ),
            'public'      => true,
            'has_archive' => true,
            'menu_icon' => 'dashicons-groups',
            'supports' => ['title'],
        )
    );
}

add_action('init', 'collection_post_type');







/**
 * Quantity buttons
 */
add_action( 'woocommerce_after_quantity_input_field', 'arendelle_quantity_plus_sign' ); 
function arendelle_quantity_plus_sign() {
	echo '<span class="quantity__button quantity__plus">+</span>';
}
 
add_action( 'woocommerce_before_quantity_input_field', 'arendelle_quantity_minus_sign' );
function arendelle_quantity_minus_sign() {
	echo '<span class="quantity__button quantity__minus">-</span>';
}

add_action( 'wp_footer', 'arendelle_quantity_plus_minus' ); 
function arendelle_quantity_plus_minus() {

   ?>
		<script type="text/javascript">
						
			jQuery(document).ready(function($) {   
					
				var forms = jQuery('.woocommerce-cart-form, form.cart');
						forms.find('.quantity.hidden').prev( '.quantity__button' ).hide();
						forms.find('.quantity.hidden').next( '.quantity__button' ).hide();

				$(document).on( 'click', 'form.cart .quantity__button, .woocommerce-cart-form .quantity__button', function() {

					var $this = $(this);					

					// Get current quantity values
					var qty = $this.closest( '.quantity' ).find( '.qty' );
					var val = ( qty.val() == '' ) ? 0 : parseFloat(qty.val());
					var max = parseFloat(qty.attr( 'max' ));
					var min = parseFloat(qty.attr( 'min' ));
					var step = parseFloat(qty.attr( 'step' ));

					// Change the value if plus or minus
					if ( $this.is( '.quantity__plus' ) ) {
						if ( max && ( max <= val ) ) {
							qty.val( max ).change();
						} 
						else {
							qty.val( val + step ).change();
						}
					} 
					else {
						if ( min && ( min >= val ) ) {
							qty.val( min ).change();
						} 
						else if ( val >= 1 ) {
							qty.val( val - step ).change();
						}
					}							
				});          
			});
						
		</script>
   <?php
}




add_filter( 'shopmagic/core/communication_type/account_page_show', '__return_false' );





function check_current_page_template( $template ) {
    if ( is_page( 'dziekujemy-za-zamowienie' ) ) {
        $order_id = wc_get_order_id_by_order_key( $_GET['order_key'] );
        $order = wc_get_order( $order_id );


        
    $jezyk_maila = get_post_meta( $order_id, 'jezyk_field', true );


    $pl_PL = 'pl-PL';

    if($jezyk_maila == $pl_PL)
    {
        if($order->get_payment_method() == 'bacs') {


                    define("HTML_EMAIL_HEADERS", array('Content-Type: text/html; charset=UTF-8'));

                         $subject = "MotulinKa.com - Otrzymaliśmy Twoje zamówienie numer $order_id";
                         $heading = "Dziękujemy za zakupy!";
                         $shipping_method = $order->get_shipping_method();
                         $order_total = $order->get_total();
                    $get_billing_address_1 = $order->get_billing_address_1(); // Get billing address line 1.
                    $get_billing_address_2 = $order->get_billing_address_2(); // Get billing address line 2.
                    $get_billing_city = $order->get_billing_city(); // Get billing city.
                    $get_billing_company = $order->get_billing_company(); // Get billing company.
                    $get_billing_country = $order->get_billing_country(); // Get billing country.
                    $get_billing_email = $order->get_billing_email(); // Get billing email.
                    $get_billing_first_name = $order->get_billing_first_name(); // Get billing first name.
                    $get_billing_last_name = $order->get_billing_last_name(); // Get billing last name.
                    $get_billing_phone = $order->get_billing_phone(); // Get billing phone.
                    $get_billing_postcode = $order->get_billing_postcode(); // Get billing postcode.
                    $get_billing_state = $order->get_billing_state(); // Get billing state.
                    $get_customer_id = $order->get_customer_id(); // Get customer_id.
                    $get_customer_ip_address = $order->get_customer_ip_address(); // Get customer ip address.
                    $get_customer_note = $order->get_customer_note(); // Get customer note.
                    $get_customer_order_notes = $order->get_customer_order_notes(); // List order notes (public) for the customer.
                    $get_customer_user_agent = $order->get_customer_user_agent(); // Get customer user agent.
                    $get_formatted_billing_address = $order->get_formatted_billing_address(); // Get a formatted billing address for the order.
                    $get_formatted_billing_full_name = $order->get_formatted_billing_full_name(); // Get a formatted billing full name.
                    $get_formatted_shipping_address = $order->get_formatted_shipping_address(); // Get a formatted shipping address for the order.
                    $get_formatted_shipping_full_name = $order->get_formatted_shipping_full_name(); // Get a formatted shipping full name.
                    $get_shipping_address_1 = $order->get_shipping_address_1(); // Get shipping address line 1.
                    $get_shipping_address_2 = $order->get_shipping_address_2(); // Get shipping address line 2.
                    $get_shipping_address_map_url = $order->get_shipping_address_map_url(); // Get a formatted shipping address for the order.
                    $get_shipping_city = $order->get_shipping_city(); // Get shipping city.
                    $get_shipping_company = $order->get_shipping_company(); // Get shipping company.
                    $get_shipping_country = $order->get_shipping_country(); // Get shipping country.
                    $get_shipping_first_name = $order->get_shipping_first_name(); // Get shipping first name.
                    $get_shipping_last_name = $order->get_shipping_last_name(); // Get shipping_last_name.
                    $get_shipping_phone = $order->get_shipping_phone(); // Get shipping phone.
                    $get_shipping_postcode = $order->get_shipping_postcode(); // Get shipping postcode.
                    $get_shipping_state = $order->get_shipping_state(); // Get shipping state.
                    $get_user = $order->get_user(); // Get the user associated with the order. False for guests.
                    $get_user_id = $order->get_user_id(); // Alias for $order->get_customer_id();.

                    $message = "
                    <p style='font-family: 'Lato' !important; color: #000 !important; font-weight: 700 !important;'>Cześć $get_billing_first_name,</p>
                    <p style='font-family: 'Lato' !important; color: #000 !important;'>Dziękujemy za zamówienie. Jest ono wstrzymane do czasu potwierdzenia otrzymania płatności.</p>
                    <h2 style='font-family: 'Lato' !important;><span style='font-weight: 400 !important; color: #000 !important;'>Numer zamówienia:</span> $order_id </h2>
                    <h2 style='font-family: 'Lato' !important;><span style='font-weight: 400 !important; color: #000 !important;'>Metoda płatności:</span> Przelew bankowy</h2>
                    <h2 style='font-family: 'Lato' !important;><span style='font-weight: 400 !important; color: #000 !important;'>Kwota do zapłaty:</span> $order_total </h2>
                    <h2 style='font-family: 'Lato' !important;><span style='font-weight: 400 !important; color: #000 !important;'>Metoda dostawy:</span> $shipping_method </h2>
                    <h2 style='font-family: 'Lato' !important;'>Nasze dane bankowe</h2>
                    <h3 style='font-family: 'Lato' !important;'>MotulinKa PL ( PLN )</h3>
                    <ul>
                        <li>Bank: <strong>mBank</strong></li>
                        <li>Numer konta: <strong>08 1140 2004 0000 3002 8203 3927</strong></li>
                        <li>IBAN: <strong>PL08 1140 2004 0000 3002 8203 3927</strong></li>
                        <li>BIC: <strong>BREXPLPWMBK</strong></li>
                    </ul>
                    <h2 style='font-family: 'Lato' !important;'>Adres rozliczeniowy</h2>
                    <address style='padding:12px;color:#000; box-shadow: 0px 3px 6px 0px rgba(0,0,0,0.16)!important; border: 1px solid #00000030 !important;'>
                        $get_billing_first_name $get_billing_last_name
                        $get_billing_country
                        $get_billing_address_1 $get_billing_address_2 
                        $get_billing_postcode $get_billing_city
                        $get_billing_phone
                        <href='$get_billing_email' target='_blank' style='color: #000!important; font-weight:700!important;'>$get_billing_email
                        </address
                        <h2 style='font-family: 'Lato' !important; padding-top: 30px !important;'>Adres dostawy</h2>
                        <address style='padding:12px;color:#000; box-shadow: 0px 3px 6px 0px rgba(0,0,0,0.16)!important; border: 1px solid #00000030 !important;'>
                            $get_shipping_first_name $get_shipping_last_name
                            $get_shipping_country
                            $get_shipping_address_1 $get_shipping_address_2 
                            $get_shipping_postcode $get_shipping_city
                            $get_shipping_phone
                            <href='$get_billing_email' target='_blank' style='color: #000!important; font-weight:700!important;'>$get_billing_email
                            </address>
                    <p style='padding-top: 30px !important; font-family: 'Lato' !important; color: #000 !important; font-weight: 700 !important;'>Nie możemy się doczekać możliwości realizacji Twojego zamówienia!</p>

                    ";
                $mailer = WC()->mailer();
                $wrapped_message = $mailer->wrap_message($heading, $message);
                $wc_email = new WC_Email;
                $html_message = $wc_email->style_inline($wrapped_message);
                $mailer->send( $get_billing_email, $subject, $html_message, HTML_EMAIL_HEADERS );


        }
        else {
            define("HTML_EMAIL_HEADERS", array('Content-Type: text/html; charset=UTF-8'));

            $subject = "MotulinKa.com - Otrzymaliśmy Twoje zamówienie numer $order_id";
            $heading = "Dziękujemy za zakupy!";
            $shipping_method = $order->get_shipping_method();
            $order_total = $order->get_total();
       $get_billing_address_1 = $order->get_billing_address_1(); // Get billing address line 1.
       $get_billing_address_2 = $order->get_billing_address_2(); // Get billing address line 2.
       $get_billing_city = $order->get_billing_city(); // Get billing city.
       $get_billing_company = $order->get_billing_company(); // Get billing company.
       $get_billing_country = $order->get_billing_country(); // Get billing country.
       $get_billing_email = $order->get_billing_email(); // Get billing email.
       $get_billing_first_name = $order->get_billing_first_name(); // Get billing first name.
       $get_billing_last_name = $order->get_billing_last_name(); // Get billing last name.
       $get_billing_phone = $order->get_billing_phone(); // Get billing phone.
       $get_billing_postcode = $order->get_billing_postcode(); // Get billing postcode.
       $get_billing_state = $order->get_billing_state(); // Get billing state.
       $get_customer_id = $order->get_customer_id(); // Get customer_id.
       $get_customer_ip_address = $order->get_customer_ip_address(); // Get customer ip address.
       $get_customer_note = $order->get_customer_note(); // Get customer note.
       $get_customer_order_notes = $order->get_customer_order_notes(); // List order notes (public) for the customer.
       $get_customer_user_agent = $order->get_customer_user_agent(); // Get customer user agent.
       $get_formatted_billing_address = $order->get_formatted_billing_address(); // Get a formatted billing address for the order.
       $get_formatted_billing_full_name = $order->get_formatted_billing_full_name(); // Get a formatted billing full name.
       $get_formatted_shipping_address = $order->get_formatted_shipping_address(); // Get a formatted shipping address for the order.
       $get_formatted_shipping_full_name = $order->get_formatted_shipping_full_name(); // Get a formatted shipping full name.
       $get_shipping_address_1 = $order->get_shipping_address_1(); // Get shipping address line 1.
       $get_shipping_address_2 = $order->get_shipping_address_2(); // Get shipping address line 2.
       $get_shipping_address_map_url = $order->get_shipping_address_map_url(); // Get a formatted shipping address for the order.
       $get_shipping_city = $order->get_shipping_city(); // Get shipping city.
       $get_shipping_company = $order->get_shipping_company(); // Get shipping company.
       $get_shipping_country = $order->get_shipping_country(); // Get shipping country.
       $get_shipping_first_name = $order->get_shipping_first_name(); // Get shipping first name.
       $get_shipping_last_name = $order->get_shipping_last_name(); // Get shipping_last_name.
       $get_shipping_phone = $order->get_shipping_phone(); // Get shipping phone.
       $get_shipping_postcode = $order->get_shipping_postcode(); // Get shipping postcode.
       $get_shipping_state = $order->get_shipping_state(); // Get shipping state.
       $get_user = $order->get_user(); // Get the user associated with the order. False for guests.
       $get_user_id = $order->get_user_id(); // Alias for $order->get_customer_id();.
       $get_payment_method_title = $order->get_payment_method_title();
       $message = "
       <p style='font-family: 'Lato' !important; color: #000 !important; font-weight: 700 !important;'>Cześć $get_billing_first_name,</p>
       <p style='font-family: 'Lato' !important; color: #000 !important;'>Dziękujemy za zamówienie. Po opłaceniu przystąpimy do jego realizacji.</p>
       <h2 style='font-family: 'Lato' !important;><span style='font-weight: 400 !important; color: #000 !important;'>Numer zamówienia:</span> $order_id </h2>
       <h2 style='font-family: 'Lato' !important;><span style='font-weight: 400 !important; color: #000 !important;'>Metoda płatności:</span> $get_payment_method_title</h2>
       <h2 style='font-family: 'Lato' !important;><span style='font-weight: 400 !important; color: #000 !important;'>Kwota zamówienia</span> $order_total </h2>
       <h2 style='font-family: 'Lato' !important;><span style='font-weight: 400 !important; color: #000 !important;'>Metoda dostawy:</span> $shipping_method </h2>
       
       <h2 style='font-family: 'Lato' !important;'>Adres rozliczeniowy</h2>
       <address style='padding:12px;color:#000; box-shadow: 0px 3px 6px 0px rgba(0,0,0,0.16)!important; border: 1px solid #00000030 !important;'>
           $get_billing_first_name $get_billing_last_name
           $get_billing_country
           $get_billing_address_1 $get_billing_address_2 
           $get_billing_postcode $get_billing_city
           $get_billing_phone
           <href='$get_billing_email' target='_blank' style='color: #000!important; font-weight:700!important;'>$get_billing_email
           </address
           <h2 style='font-family: 'Lato' !important; padding-top: 30px !important;'>Adres dostawy</h2>
           <address style='padding:12px;color:#000; box-shadow: 0px 3px 6px 0px rgba(0,0,0,0.16)!important; border: 1px solid #00000030 !important;'>
               $get_shipping_first_name $get_shipping_last_name
               $get_shipping_country
               $get_shipping_address_1 $get_shipping_address_2 
               $get_shipping_postcode $get_shipping_city
               $get_shipping_phone
               <href='$get_billing_email' target='_blank' style='color: #000!important; font-weight:700!important;'>$get_billing_email
               </address>
       <p style='padding-top: 30px !important; font-family: 'Lato' !important; color: #000 !important; font-weight: 700 !important;'>Nie możemy się doczekać możliwości realizacji Twojego zamówienia!</p>

       ";
            $mailer = WC()->mailer();
            $wrapped_message = $mailer->wrap_message($heading, $message);
            $wc_email = new WC_Email;
            $html_message = $wc_email->style_inline($wrapped_message);
            $mailer->send( $get_billing_email, $subject, $html_message, HTML_EMAIL_HEADERS );

                    }
                    
    }



    $es_ES = 'es';

    if($jezyk_maila == $es_ES)
    {
        if($order->get_payment_method() == 'bacs') {


                    define("HTML_EMAIL_HEADERS", array('Content-Type: text/html; charset=UTF-8'));

                         $subject = "MotulinKa.com - Hemos recibido su número de pedido $order_id";
                         $heading = "Gracias por comprar!";
                         $shipping_method = $order->get_shipping_method();
                         $order_total = $order->get_total();
                    $get_billing_address_1 = $order->get_billing_address_1(); // Get billing address line 1.
                    $get_billing_address_2 = $order->get_billing_address_2(); // Get billing address line 2.
                    $get_billing_city = $order->get_billing_city(); // Get billing city.
                    $get_billing_company = $order->get_billing_company(); // Get billing company.
                    $get_billing_country = $order->get_billing_country(); // Get billing country.
                    $get_billing_email = $order->get_billing_email(); // Get billing email.
                    $get_billing_first_name = $order->get_billing_first_name(); // Get billing first name.
                    $get_billing_last_name = $order->get_billing_last_name(); // Get billing last name.
                    $get_billing_phone = $order->get_billing_phone(); // Get billing phone.
                    $get_billing_postcode = $order->get_billing_postcode(); // Get billing postcode.
                    $get_billing_state = $order->get_billing_state(); // Get billing state.
                    $get_customer_id = $order->get_customer_id(); // Get customer_id.
                    $get_customer_ip_address = $order->get_customer_ip_address(); // Get customer ip address.
                    $get_customer_note = $order->get_customer_note(); // Get customer note.
                    $get_customer_order_notes = $order->get_customer_order_notes(); // List order notes (public) for the customer.
                    $get_customer_user_agent = $order->get_customer_user_agent(); // Get customer user agent.
                    $get_formatted_billing_address = $order->get_formatted_billing_address(); // Get a formatted billing address for the order.
                    $get_formatted_billing_full_name = $order->get_formatted_billing_full_name(); // Get a formatted billing full name.
                    $get_formatted_shipping_address = $order->get_formatted_shipping_address(); // Get a formatted shipping address for the order.
                    $get_formatted_shipping_full_name = $order->get_formatted_shipping_full_name(); // Get a formatted shipping full name.
                    $get_shipping_address_1 = $order->get_shipping_address_1(); // Get shipping address line 1.
                    $get_shipping_address_2 = $order->get_shipping_address_2(); // Get shipping address line 2.
                    $get_shipping_address_map_url = $order->get_shipping_address_map_url(); // Get a formatted shipping address for the order.
                    $get_shipping_city = $order->get_shipping_city(); // Get shipping city.
                    $get_shipping_company = $order->get_shipping_company(); // Get shipping company.
                    $get_shipping_country = $order->get_shipping_country(); // Get shipping country.
                    $get_shipping_first_name = $order->get_shipping_first_name(); // Get shipping first name.
                    $get_shipping_last_name = $order->get_shipping_last_name(); // Get shipping_last_name.
                    $get_shipping_phone = $order->get_shipping_phone(); // Get shipping phone.
                    $get_shipping_postcode = $order->get_shipping_postcode(); // Get shipping postcode.
                    $get_shipping_state = $order->get_shipping_state(); // Get shipping state.
                    $get_user = $order->get_user(); // Get the user associated with the order. False for guests.
                    $get_user_id = $order->get_user_id(); // Alias for $order->get_customer_id();.

                    $message = "
                    <p style='font-family: 'Lato' !important; color: #000 !important; font-weight: 700 !important;'>Hola $get_billing_first_name,</p>
                    <p style='font-family: 'Lato' !important; color: #000 !important;'>Gracias por tu pedido. Está en espera hasta que se confirme el pago.</p>
                    <h2 style='font-family: 'Lato' !important;><span style='font-weight: 400 !important; color: #000 !important;'>Número de orden:</span> $order_id </h2>
                    <h2 style='font-family: 'Lato' !important;><span style='font-weight: 400 !important; color: #000 !important;'>Método de pago:</span> Transferencia bancaria</h2>
                    <h2 style='font-family: 'Lato' !important;><span style='font-weight: 400 !important; color: #000 !important;'>Monto a pagar:</span> $order_total </h2>
                    <h2 style='font-family: 'Lato' !important;'>Nuestros datos bancarios</h2>
                    <h3 style='font-family: 'Lato' !important;'>MotulinKa EU ( EURO )</h3>
                    <ul>
                        <li>Banco: <strong>mBank</strong></li>
                        <li>Número de cuenta: <strong>36 1140 2004 0000 3212 2086 9456</strong></li>
                        <li>IBAN: <strong>PL36 1140 2004 0000 3212 2086 9456</strong></li>
                        <li>BIC: <strong>BREXPLPWMBK</strong></li>
                    </ul>
                    <h2 style='font-family: 'Lato' !important;'>Dirección de Envio</h2>
                    <address style='padding:12px;color:#000; box-shadow: 0px 3px 6px 0px rgba(0,0,0,0.16)!important; border: 1px solid #00000030 !important;'>
                        $get_billing_first_name $get_billing_last_name
                        $get_billing_country
                        $get_billing_address_1 $get_billing_address_2 
                        $get_billing_postcode $get_billing_city
                        $get_billing_phone
                        <href='$get_billing_email' target='_blank' style='color: #000!important; font-weight:700!important;'>$get_billing_email
                        </address
                        <h2 style='font-family: 'Lato' !important; padding-top: 30px !important;'>Dirección de entrega</h2>
                        <address style='padding:12px;color:#000; box-shadow: 0px 3px 6px 0px rgba(0,0,0,0.16)!important; border: 1px solid #00000030 !important;'>
                            $get_shipping_first_name $get_shipping_last_name
                            $get_shipping_country
                            $get_shipping_address_1 $get_shipping_address_2 
                            $get_shipping_postcode $get_shipping_city
                            $get_shipping_phone
                            <href='$get_billing_email' target='_blank' style='color: #000!important; font-weight:700!important;'>$get_billing_email
                            </address>
                    <p style='padding-top: 30px !important; font-family: 'Lato' !important; color: #000 !important; font-weight: 700 !important;'>Esperamos poder cumplir con su pedido.!</p>

                    ";
                $mailer = WC()->mailer();
                $wrapped_message = $mailer->wrap_message($heading, $message);
                $wc_email = new WC_Email;
                $html_message = $wc_email->style_inline($wrapped_message);
                $mailer->send( $get_billing_email, $subject, $html_message, HTML_EMAIL_HEADERS );


        }
        else {
            define("HTML_EMAIL_HEADERS", array('Content-Type: text/html; charset=UTF-8'));

            $subject = "MotulinKa.com - Hemos recibido su número de pedido $order_id";
            $heading = "Gracias por comprar!";
            $shipping_method = $order->get_shipping_method();
            $order_total = $order->get_total();
       $get_billing_address_1 = $order->get_billing_address_1(); // Get billing address line 1.
       $get_billing_address_2 = $order->get_billing_address_2(); // Get billing address line 2.
       $get_billing_city = $order->get_billing_city(); // Get billing city.
       $get_billing_company = $order->get_billing_company(); // Get billing company.
       $get_billing_country = $order->get_billing_country(); // Get billing country.
       $get_billing_email = $order->get_billing_email(); // Get billing email.
       $get_billing_first_name = $order->get_billing_first_name(); // Get billing first name.
       $get_billing_last_name = $order->get_billing_last_name(); // Get billing last name.
       $get_billing_phone = $order->get_billing_phone(); // Get billing phone.
       $get_billing_postcode = $order->get_billing_postcode(); // Get billing postcode.
       $get_billing_state = $order->get_billing_state(); // Get billing state.
       $get_customer_id = $order->get_customer_id(); // Get customer_id.
       $get_customer_ip_address = $order->get_customer_ip_address(); // Get customer ip address.
       $get_customer_note = $order->get_customer_note(); // Get customer note.
       $get_customer_order_notes = $order->get_customer_order_notes(); // List order notes (public) for the customer.
       $get_customer_user_agent = $order->get_customer_user_agent(); // Get customer user agent.
       $get_formatted_billing_address = $order->get_formatted_billing_address(); // Get a formatted billing address for the order.
       $get_formatted_billing_full_name = $order->get_formatted_billing_full_name(); // Get a formatted billing full name.
       $get_formatted_shipping_address = $order->get_formatted_shipping_address(); // Get a formatted shipping address for the order.
       $get_formatted_shipping_full_name = $order->get_formatted_shipping_full_name(); // Get a formatted shipping full name.
       $get_shipping_address_1 = $order->get_shipping_address_1(); // Get shipping address line 1.
       $get_shipping_address_2 = $order->get_shipping_address_2(); // Get shipping address line 2.
       $get_shipping_address_map_url = $order->get_shipping_address_map_url(); // Get a formatted shipping address for the order.
       $get_shipping_city = $order->get_shipping_city(); // Get shipping city.
       $get_shipping_company = $order->get_shipping_company(); // Get shipping company.
       $get_shipping_country = $order->get_shipping_country(); // Get shipping country.
       $get_shipping_first_name = $order->get_shipping_first_name(); // Get shipping first name.
       $get_shipping_last_name = $order->get_shipping_last_name(); // Get shipping_last_name.
       $get_shipping_phone = $order->get_shipping_phone(); // Get shipping phone.
       $get_shipping_postcode = $order->get_shipping_postcode(); // Get shipping postcode.
       $get_shipping_state = $order->get_shipping_state(); // Get shipping state.
       $get_user = $order->get_user(); // Get the user associated with the order. False for guests.
       $get_user_id = $order->get_user_id(); // Alias for $order->get_customer_id();.
       $get_payment_method_title = $order->get_payment_method_title();
       $message = "
       <p style='font-family: 'Lato' !important; color: #000 !important; font-weight: 700 !important;'>Hola $get_billing_first_name,</p>
       <p style='font-family: 'Lato' !important; color: #000 !important;'>Gracias por tu pedido. Está en espera hasta que se confirme el pago.</p>
       <h2 style='font-family: 'Lato' !important;><span style='font-weight: 400 !important; color: #000 !important;'>Número de orden:</span> $order_id </h2>
       <h2 style='font-family: 'Lato' !important;><span style='font-weight: 400 !important; color: #000 !important;'>Método de pago:</span> $get_payment_method_title</h2>
       <h2 style='font-family: 'Lato' !important;><span style='font-weight: 400 !important; color: #000 !important;'>Total de la orden</span> $order_total </h2>
       
       <h2 style='font-family: 'Lato' !important;'>Dirección de Envio</h2>
       <address style='padding:12px;color:#000; box-shadow: 0px 3px 6px 0px rgba(0,0,0,0.16)!important; border: 1px solid #00000030 !important;'>
           $get_billing_first_name $get_billing_last_name
           $get_billing_country
           $get_billing_address_1 $get_billing_address_2 
           $get_billing_postcode $get_billing_city
           $get_billing_phone
           <href='$get_billing_email' target='_blank' style='color: #000!important; font-weight:700!important;'>$get_billing_email
           </address
           <h2 style='font-family: 'Lato' !important; padding-top: 30px !important;'>Dirección de entrega</h2>
           <address style='padding:12px;color:#000; box-shadow: 0px 3px 6px 0px rgba(0,0,0,0.16)!important; border: 1px solid #00000030 !important;'>
               $get_shipping_first_name $get_shipping_last_name
               $get_shipping_country
               $get_shipping_address_1 $get_shipping_address_2 
               $get_shipping_postcode $get_shipping_city
               $get_shipping_phone
               <href='$get_billing_email' target='_blank' style='color: #000!important; font-weight:700!important;'>$get_billing_email
               </address>
       <p style='padding-top: 30px !important; font-family: 'Lato' !important; color: #000 !important; font-weight: 700 !important;'>Esperamos poder cumplir con su pedido!</p>

       ";
   $mailer = WC()->mailer();
   $wrapped_message = $mailer->wrap_message($heading, $message);
   $wc_email = new WC_Email;
   $html_message = $wc_email->style_inline($wrapped_message);
   $mailer->send( $get_billing_email, $subject, $html_message, HTML_EMAIL_HEADERS );

        }
        
    }





    $it_IT = 'it';

    if($jezyk_maila == $it_IT)
    {
        if($order->get_payment_method() == 'bacs') {


                    define("HTML_EMAIL_HEADERS", array('Content-Type: text/html; charset=UTF-8'));

                         $subject = "MotulinKa.com - Abbiamo ricevuto il tuo numero d'ordine $order_id";
                         $heading = "Grazie per l'acquisto!";
                         $shipping_method = $order->get_shipping_method();
                         $order_total = $order->get_total();
                    $get_billing_address_1 = $order->get_billing_address_1(); // Get billing address line 1.
                    $get_billing_address_2 = $order->get_billing_address_2(); // Get billing address line 2.
                    $get_billing_city = $order->get_billing_city(); // Get billing city.
                    $get_billing_company = $order->get_billing_company(); // Get billing company.
                    $get_billing_country = $order->get_billing_country(); // Get billing country.
                    $get_billing_email = $order->get_billing_email(); // Get billing email.
                    $get_billing_first_name = $order->get_billing_first_name(); // Get billing first name.
                    $get_billing_last_name = $order->get_billing_last_name(); // Get billing last name.
                    $get_billing_phone = $order->get_billing_phone(); // Get billing phone.
                    $get_billing_postcode = $order->get_billing_postcode(); // Get billing postcode.
                    $get_billing_state = $order->get_billing_state(); // Get billing state.
                    $get_customer_id = $order->get_customer_id(); // Get customer_id.
                    $get_customer_ip_address = $order->get_customer_ip_address(); // Get customer ip address.
                    $get_customer_note = $order->get_customer_note(); // Get customer note.
                    $get_customer_order_notes = $order->get_customer_order_notes(); // List order notes (public) for the customer.
                    $get_customer_user_agent = $order->get_customer_user_agent(); // Get customer user agent.
                    $get_formatted_billing_address = $order->get_formatted_billing_address(); // Get a formatted billing address for the order.
                    $get_formatted_billing_full_name = $order->get_formatted_billing_full_name(); // Get a formatted billing full name.
                    $get_formatted_shipping_address = $order->get_formatted_shipping_address(); // Get a formatted shipping address for the order.
                    $get_formatted_shipping_full_name = $order->get_formatted_shipping_full_name(); // Get a formatted shipping full name.
                    $get_shipping_address_1 = $order->get_shipping_address_1(); // Get shipping address line 1.
                    $get_shipping_address_2 = $order->get_shipping_address_2(); // Get shipping address line 2.
                    $get_shipping_address_map_url = $order->get_shipping_address_map_url(); // Get a formatted shipping address for the order.
                    $get_shipping_city = $order->get_shipping_city(); // Get shipping city.
                    $get_shipping_company = $order->get_shipping_company(); // Get shipping company.
                    $get_shipping_country = $order->get_shipping_country(); // Get shipping country.
                    $get_shipping_first_name = $order->get_shipping_first_name(); // Get shipping first name.
                    $get_shipping_last_name = $order->get_shipping_last_name(); // Get shipping_last_name.
                    $get_shipping_phone = $order->get_shipping_phone(); // Get shipping phone.
                    $get_shipping_postcode = $order->get_shipping_postcode(); // Get shipping postcode.
                    $get_shipping_state = $order->get_shipping_state(); // Get shipping state.
                    $get_user = $order->get_user(); // Get the user associated with the order. False for guests.
                    $get_user_id = $order->get_user_id(); // Alias for $order->get_customer_id();.

                    $message = "
                    <p style='font-family: 'Lato' !important; color: #000 !important; font-weight: 700 !important;'>Ciao $get_billing_first_name,</p>
                    <p style='font-family: 'Lato' !important; color: #000 !important;'>Grazie per la vostra richiesta. È sospeso fino alla conferma del pagamento.</p>
                    <h2 style='font-family: 'Lato' !important;><span style='font-weight: 400 !important; color: #000 !important;'>Numero d'ordine:</span> $order_id </h2>
                    <h2 style='font-family: 'Lato' !important;><span style='font-weight: 400 !important; color: #000 !important;'>Metodo di pagamento:</span> Bonifico bancario</h2>
                    <h2 style='font-family: 'Lato' !important;><span style='font-weight: 400 !important; color: #000 !important;'>Importo da pagare:</span> $order_total </h2>
                    <h2 style='font-family: 'Lato' !important;'>Le nostre coordinate bancarie</h2>
                    <h3 style='font-family: 'Lato' !important;'>MotulinKa EU ( EURO )</h3>
                    <ul>
                        <li>Banca: <strong>mBank</strong></li>
                        <li>Numero di conto: <strong>36 1140 2004 0000 3212 2086 9456</strong></li>
                        <li>IBAN: <strong>PL36 1140 2004 0000 3212 2086 9456</strong></li>
                        <li>BIC: <strong>BREXPLPWMBK</strong></li>
                    </ul>
                    <h2 style='font-family: 'Lato' !important;'>Indirizzo di spedizione</h2>
                    <address style='padding:12px;color:#000; box-shadow: 0px 3px 6px 0px rgba(0,0,0,0.16)!important; border: 1px solid #00000030 !important;'>
                        $get_billing_first_name $get_billing_last_name
                        $get_billing_address_1 $get_billing_address_2 
                        $get_billing_postcode $get_billing_city
                        $get_billing_phone
                        <href='$get_billing_email' target='_blank' style='color: #000!important; font-weight:700!important;'>$get_billing_email
                        </address
                        <h2 style='font-family: 'Lato' !important; padding-top: 30px !important;'>Indirizzo di consegna</h2>
                        <address style='padding:12px;color:#000; box-shadow: 0px 3px 6px 0px rgba(0,0,0,0.16)!important; border: 1px solid #00000030 !important;'>
                            $get_shipping_first_name $get_shipping_last_name
                            $get_shipping_address_1 $get_shipping_address_2 
                            $get_shipping_postcode $get_shipping_city
                            $get_shipping_phone
                            <href='$get_billing_email' target='_blank' style='color: #000!important; font-weight:700!important;'>$get_billing_email
                            </address>
                    <p style='padding-top: 30px !important; font-family: 'Lato' !important; color: #000 !important; font-weight: 700 !important;'>Esperamos poder cumplir con su pedido.!</p>

                    ";
                $mailer = WC()->mailer();
                $wrapped_message = $mailer->wrap_message($heading, $message);
                $wc_email = new WC_Email;
                $html_message = $wc_email->style_inline($wrapped_message);
                $mailer->send( $get_billing_email, $subject, $html_message, HTML_EMAIL_HEADERS );


        }
        else {
            define("HTML_EMAIL_HEADERS", array('Content-Type: text/html; charset=UTF-8'));

            $subject = "MotulinKa.com - Abbiamo ricevuto il tuo numero d'ordine $order_id";
            $heading = "Grazie per l'acquisto!";
            $shipping_method = $order->get_shipping_method();
            $order_total = $order->get_total();
       $get_billing_address_1 = $order->get_billing_address_1(); // Get billing address line 1.
       $get_billing_address_2 = $order->get_billing_address_2(); // Get billing address line 2.
       $get_billing_city = $order->get_billing_city(); // Get billing city.
       $get_billing_company = $order->get_billing_company(); // Get billing company.
       $get_billing_country = $order->get_billing_country(); // Get billing country.
       $get_billing_email = $order->get_billing_email(); // Get billing email.
       $get_billing_first_name = $order->get_billing_first_name(); // Get billing first name.
       $get_billing_last_name = $order->get_billing_last_name(); // Get billing last name.
       $get_billing_phone = $order->get_billing_phone(); // Get billing phone.
       $get_billing_postcode = $order->get_billing_postcode(); // Get billing postcode.
       $get_billing_state = $order->get_billing_state(); // Get billing state.
       $get_customer_id = $order->get_customer_id(); // Get customer_id.
       $get_customer_ip_address = $order->get_customer_ip_address(); // Get customer ip address.
       $get_customer_note = $order->get_customer_note(); // Get customer note.
       $get_customer_order_notes = $order->get_customer_order_notes(); // List order notes (public) for the customer.
       $get_customer_user_agent = $order->get_customer_user_agent(); // Get customer user agent.
       $get_formatted_billing_address = $order->get_formatted_billing_address(); // Get a formatted billing address for the order.
       $get_formatted_billing_full_name = $order->get_formatted_billing_full_name(); // Get a formatted billing full name.
       $get_formatted_shipping_address = $order->get_formatted_shipping_address(); // Get a formatted shipping address for the order.
       $get_formatted_shipping_full_name = $order->get_formatted_shipping_full_name(); // Get a formatted shipping full name.
       $get_shipping_address_1 = $order->get_shipping_address_1(); // Get shipping address line 1.
       $get_shipping_address_2 = $order->get_shipping_address_2(); // Get shipping address line 2.
       $get_shipping_address_map_url = $order->get_shipping_address_map_url(); // Get a formatted shipping address for the order.
       $get_shipping_city = $order->get_shipping_city(); // Get shipping city.
       $get_shipping_company = $order->get_shipping_company(); // Get shipping company.
       $get_shipping_country = $order->get_shipping_country(); // Get shipping country.
       $get_shipping_first_name = $order->get_shipping_first_name(); // Get shipping first name.
       $get_shipping_last_name = $order->get_shipping_last_name(); // Get shipping_last_name.
       $get_shipping_phone = $order->get_shipping_phone(); // Get shipping phone.
       $get_shipping_postcode = $order->get_shipping_postcode(); // Get shipping postcode.
       $get_shipping_state = $order->get_shipping_state(); // Get shipping state.
       $get_user = $order->get_user(); // Get the user associated with the order. False for guests.
       $get_user_id = $order->get_user_id(); // Alias for $order->get_customer_id();.
       $get_payment_method_title = $order->get_payment_method_title();
       $message = "
       <p style='font-family: 'Lato' !important; color: #000 !important; font-weight: 700 !important;'>Ciao $get_billing_first_name,</p>
       <p style='font-family: 'Lato' !important; color: #000 !important;'>Grazie per la vostra richiesta. È sospeso fino alla conferma del pagamento.</p>
       <h2 style='font-family: 'Lato' !important;><span style='font-weight: 400 !important; color: #000 !important;'>Numero d'ordine:</span> $order_id </h2>
       <h2 style='font-family: 'Lato' !important;><span style='font-weight: 400 !important; color: #000 !important;'>Metodo di pagamento:</span> $get_payment_method_title</h2>
       <h2 style='font-family: 'Lato' !important;><span style='font-weight: 400 !important; color: #000 !important;'>Ordine totale</span> $order_total </h2>
       
       <h2 style='font-family: 'Lato' !important;'>Indirizzo di spedizione</h2>
       <address style='padding:12px;color:#000; box-shadow: 0px 3px 6px 0px rgba(0,0,0,0.16)!important; border: 1px solid #00000030 !important;'>
           $get_billing_first_name $get_billing_last_name
           $get_billing_country
           $get_billing_address_1 $get_billing_address_2 
           $get_billing_postcode $get_billing_city
           $get_billing_phone
           <href='$get_billing_email' target='_blank' style='color: #000!important; font-weight:700!important;'>$get_billing_email
           </address
           <h2 style='font-family: 'Lato' !important; padding-top: 30px !important;'>Indirizzo di consegna</h2>
           <address style='padding:12px;color:#000; box-shadow: 0px 3px 6px 0px rgba(0,0,0,0.16)!important; border: 1px solid #00000030 !important;'>
               $get_shipping_first_name $get_shipping_last_name
               $get_shipping_country
               $get_shipping_address_1 $get_shipping_address_2 
               $get_shipping_postcode $get_shipping_city
               $get_shipping_phone
               <href='$get_billing_email' target='_blank' style='color: #000!important; font-weight:700!important;'>$get_billing_email
               </address>
       <p style='padding-top: 30px !important; font-family: 'Lato' !important; color: #000 !important; font-weight: 700 !important;'>Esperamos poder cumplir con su pedido!</p>

       ";
   $mailer = WC()->mailer();
   $wrapped_message = $mailer->wrap_message($heading, $message);
   $wc_email = new WC_Email;
   $html_message = $wc_email->style_inline($wrapped_message);
   $mailer->send( $get_billing_email, $subject, $html_message, HTML_EMAIL_HEADERS );

        }
        
    }
    







    $en_EN = 'en';

    if($jezyk_maila == $en_EN)
    {
        if($order->get_payment_method() == 'bacs') {


                    define("HTML_EMAIL_HEADERS", array('Content-Type: text/html; charset=UTF-8'));

                         $subject = "MotulinKa.com - Thank you for your order, your order number $order_id";
                         $heading = "Thank you for your purchase!";
                         $shipping_method = $order->get_shipping_method();
                         $order_total = $order->get_total();
                    $get_billing_address_1 = $order->get_billing_address_1(); // Get billing address line 1.
                    $get_billing_address_2 = $order->get_billing_address_2(); // Get billing address line 2.
                    $get_billing_city = $order->get_billing_city(); // Get billing city.
                    $get_billing_company = $order->get_billing_company(); // Get billing company.
                    $get_billing_country = $order->get_billing_country(); // Get billing country.
                    $get_billing_email = $order->get_billing_email(); // Get billing email.
                    $get_billing_first_name = $order->get_billing_first_name(); // Get billing first name.
                    $get_billing_last_name = $order->get_billing_last_name(); // Get billing last name.
                    $get_billing_phone = $order->get_billing_phone(); // Get billing phone.
                    $get_billing_postcode = $order->get_billing_postcode(); // Get billing postcode.
                    $get_billing_state = $order->get_billing_state(); // Get billing state.
                    $get_customer_id = $order->get_customer_id(); // Get customer_id.
                    $get_customer_ip_address = $order->get_customer_ip_address(); // Get customer ip address.
                    $get_customer_note = $order->get_customer_note(); // Get customer note.
                    $get_customer_order_notes = $order->get_customer_order_notes(); // List order notes (public) for the customer.
                    $get_customer_user_agent = $order->get_customer_user_agent(); // Get customer user agent.
                    $get_formatted_billing_address = $order->get_formatted_billing_address(); // Get a formatted billing address for the order.
                    $get_formatted_billing_full_name = $order->get_formatted_billing_full_name(); // Get a formatted billing full name.
                    $get_formatted_shipping_address = $order->get_formatted_shipping_address(); // Get a formatted shipping address for the order.
                    $get_formatted_shipping_full_name = $order->get_formatted_shipping_full_name(); // Get a formatted shipping full name.
                    $get_shipping_address_1 = $order->get_shipping_address_1(); // Get shipping address line 1.
                    $get_shipping_address_2 = $order->get_shipping_address_2(); // Get shipping address line 2.
                    $get_shipping_address_map_url = $order->get_shipping_address_map_url(); // Get a formatted shipping address for the order.
                    $get_shipping_city = $order->get_shipping_city(); // Get shipping city.
                    $get_shipping_company = $order->get_shipping_company(); // Get shipping company.
                    $get_shipping_country = $order->get_shipping_country(); // Get shipping country.
                    $get_shipping_first_name = $order->get_shipping_first_name(); // Get shipping first name.
                    $get_shipping_last_name = $order->get_shipping_last_name(); // Get shipping_last_name.
                    $get_shipping_phone = $order->get_shipping_phone(); // Get shipping phone.
                    $get_shipping_postcode = $order->get_shipping_postcode(); // Get shipping postcode.
                    $get_shipping_state = $order->get_shipping_state(); // Get shipping state.
                    $get_user = $order->get_user(); // Get the user associated with the order. False for guests.
                    $get_user_id = $order->get_user_id(); // Alias for $order->get_customer_id();.

                    $message = "
                    <p style='font-family: 'Lato' !important; color: #000 !important; font-weight: 700 !important;'>HI $get_billing_first_name,</p>
                    <p style='font-family: 'Lato' !important; color: #000 !important;'>Thank you for your request. It is suspended until payment is confirmed.</p>
                    <h2 style='font-family: 'Lato' !important;><span style='font-weight: 400 !important; color: #000 !important;'>Order number:</span> $order_id </h2>
                    <h2 style='font-family: 'Lato' !important;><span style='font-weight: 400 !important; color: #000 !important;'>Payment method:</span> Bank transfer</h2>
                    <h2 style='font-family: 'Lato' !important;><span style='font-weight: 400 !important; color: #000 !important;'>Amount to be paid:</span> $order_total </h2>
                    <h2 style='font-family: 'Lato' !important;'>Our bank account details</h2>
                    <h3 style='font-family: 'Lato' !important;'>MotulinKa EU ( EURO )</h3>
                    <ul>
                        <li>Bank: <strong>mBank</strong></li>
                        <li>Account number: <strong>36 1140 2004 0000 3212 2086 9456</strong></li>
                        <li>IBAN: <strong>PL36 1140 2004 0000 3212 2086 9456</strong></li>
                        <li>BIC: <strong>BREXPLPWMBK</strong></li>
                    </ul>
                    <h2 style='font-family: 'Lato' !important;'>Shipping address</h2>
                    <address style='padding:12px;color:#000; box-shadow: 0px 3px 6px 0px rgba(0,0,0,0.16)!important; border: 1px solid #00000030 !important;'>
                        $get_billing_first_name $get_billing_last_name
                        $get_billing_country
                        $get_billing_address_1 $get_billing_address_2 
                        $get_billing_postcode $get_billing_city
                        $get_billing_phone
                        <href='$get_billing_email' target='_blank' style='color: #000!important; font-weight:700!important;'>$get_billing_email
                        </address
                        <h2 style='font-family: 'Lato' !important; padding-top: 30px !important;'>Delivery address</h2>
                        <address style='padding:12px;color:#000; box-shadow: 0px 3px 6px 0px rgba(0,0,0,0.16)!important; border: 1px solid #00000030 !important;'>
                            $get_shipping_first_name $get_shipping_last_name
                            $get_shipping_country
                            $get_shipping_address_1 $get_shipping_address_2 
                            $get_shipping_postcode $get_shipping_city
                            $get_shipping_phone
                            <href='$get_billing_email' target='_blank' style='color: #000!important; font-weight:700!important;'>$get_billing_email
                            </address>
                    <p style='padding-top: 30px !important; font-family: 'Lato' !important; color: #000 !important; font-weight: 700 !important;'>We hope to be able to fulfill our request.!</p>

                    ";
                $mailer = WC()->mailer();
                $wrapped_message = $mailer->wrap_message($heading, $message);
                $wc_email = new WC_Email;
                $html_message = $wc_email->style_inline($wrapped_message);
                $mailer->send( $get_billing_email, $subject, $html_message, HTML_EMAIL_HEADERS );


        }
        else {
            define("HTML_EMAIL_HEADERS", array('Content-Type: text/html; charset=UTF-8'));

            $subject = "MotulinKa.com - We have received your order number $order_id";
            $heading = "Thank you for your purchase!";
            $shipping_method = $order->get_shipping_method();
            $order_total = $order->get_total();
       $get_billing_address_1 = $order->get_billing_address_1(); // Get billing address line 1.
       $get_billing_address_2 = $order->get_billing_address_2(); // Get billing address line 2.
       $get_billing_city = $order->get_billing_city(); // Get billing city.
       $get_billing_company = $order->get_billing_company(); // Get billing company.
       $get_billing_country = $order->get_billing_country(); // Get billing country.
       $get_billing_email = $order->get_billing_email(); // Get billing email.
       $get_billing_first_name = $order->get_billing_first_name(); // Get billing first name.
       $get_billing_last_name = $order->get_billing_last_name(); // Get billing last name.
       $get_billing_phone = $order->get_billing_phone(); // Get billing phone.
       $get_billing_postcode = $order->get_billing_postcode(); // Get billing postcode.
       $get_billing_state = $order->get_billing_state(); // Get billing state.
       $get_customer_id = $order->get_customer_id(); // Get customer_id.
       $get_customer_ip_address = $order->get_customer_ip_address(); // Get customer ip address.
       $get_customer_note = $order->get_customer_note(); // Get customer note.
       $get_customer_order_notes = $order->get_customer_order_notes(); // List order notes (public) for the customer.
       $get_customer_user_agent = $order->get_customer_user_agent(); // Get customer user agent.
       $get_formatted_billing_address = $order->get_formatted_billing_address(); // Get a formatted billing address for the order.
       $get_formatted_billing_full_name = $order->get_formatted_billing_full_name(); // Get a formatted billing full name.
       $get_formatted_shipping_address = $order->get_formatted_shipping_address(); // Get a formatted shipping address for the order.
       $get_formatted_shipping_full_name = $order->get_formatted_shipping_full_name(); // Get a formatted shipping full name.
       $get_shipping_address_1 = $order->get_shipping_address_1(); // Get shipping address line 1.
       $get_shipping_address_2 = $order->get_shipping_address_2(); // Get shipping address line 2.
       $get_shipping_address_map_url = $order->get_shipping_address_map_url(); // Get a formatted shipping address for the order.
       $get_shipping_city = $order->get_shipping_city(); // Get shipping city.
       $get_shipping_company = $order->get_shipping_company(); // Get shipping company.
       $get_shipping_country = $order->get_shipping_country(); // Get shipping country.
       $get_shipping_first_name = $order->get_shipping_first_name(); // Get shipping first name.
       $get_shipping_last_name = $order->get_shipping_last_name(); // Get shipping_last_name.
       $get_shipping_phone = $order->get_shipping_phone(); // Get shipping phone.
       $get_shipping_postcode = $order->get_shipping_postcode(); // Get shipping postcode.
       $get_shipping_state = $order->get_shipping_state(); // Get shipping state.
       $get_user = $order->get_user(); // Get the user associated with the order. False for guests.
       $get_user_id = $order->get_user_id(); // Alias for $order->get_customer_id();.
       $get_payment_method_title = $order->get_payment_method_title();
       $message = "
       <p style='font-family: 'Lato' !important; color: #000 !important; font-weight: 700 !important;'>HI $get_billing_first_name,</p>
       <p style='font-family: 'Lato' !important; color: #000 !important;'>Thank you for your request. It is suspended until payment is confirmed.</p>
       <h2 style='font-family: 'Lato' !important;><span style='font-weight: 400 !important; color: #000 !important;'>Order number:</span> $order_id </h2>
       <h2 style='font-family: 'Lato' !important;><span style='font-weight: 400 !important; color: #000 !important;'>Payment method:</span> $get_payment_method_title</h2>
       <h2 style='font-family: 'Lato' !important;><span style='font-weight: 400 !important; color: #000 !important;'>Total order</span> $order_total </h2>
       
       <h2 style='font-family: 'Lato' !important;'>Shipping address</h2>
       <address style='padding:12px;color:#000; box-shadow: 0px 3px 6px 0px rgba(0,0,0,0.16)!important; border: 1px solid #00000030 !important;'>
           $get_billing_first_name $get_billing_last_name
           $get_billing_country
           $get_billing_address_1 $get_billing_address_2 
           $get_billing_postcode $get_billing_city
           $get_billing_phone
           <href='$get_billing_email' target='_blank' style='color: #000!important; font-weight:700!important;'>$get_billing_email
           </address
           <h2 style='font-family: 'Lato' !important; padding-top: 30px !important;'>Delivery address</h2>
           <address style='padding:12px;color:#000; box-shadow: 0px 3px 6px 0px rgba(0,0,0,0.16)!important; border: 1px solid #00000030 !important;'>
               $get_shipping_first_name $get_shipping_last_name
               $get_shipping_country
               $get_shipping_address_1 $get_shipping_address_2 
               $get_shipping_postcode $get_shipping_city
               $get_shipping_phone
               <href='$get_billing_email' target='_blank' style='color: #000!important; font-weight:700!important;'>$get_billing_email
               </address>
       <p style='padding-top: 30px !important; font-family: 'Lato' !important; color: #000 !important; font-weight: 700 !important;'>Esperamos poder cumplir con su pedido!</p>

       ";
   $mailer = WC()->mailer();
   $wrapped_message = $mailer->wrap_message($heading, $message);
   $wc_email = new WC_Email;
   $html_message = $wc_email->style_inline($wrapped_message);
   $mailer->send( $get_billing_email, $subject, $html_message, HTML_EMAIL_HEADERS );

        }
        
    }








    
    $de_DE = 'de';

    if($jezyk_maila == $de_DE)
    {
        if($order->get_payment_method() == 'bacs') {


                    define("HTML_EMAIL_HEADERS", array('Content-Type: text/html; charset=UTF-8'));

                         $subject = "MotulinKa.com - Vielen Dank für Ihre Bestellung, Ihre Bestellnummer $order_id";
                         $heading = "Danke für Ihren Einkauf!";
                         $shipping_method = $order->get_shipping_method();
                         $order_total = $order->get_total();
                    $get_billing_address_1 = $order->get_billing_address_1(); // Get billing address line 1.
                    $get_billing_address_2 = $order->get_billing_address_2(); // Get billing address line 2.
                    $get_billing_city = $order->get_billing_city(); // Get billing city.
                    $get_billing_company = $order->get_billing_company(); // Get billing company.
                    $get_billing_country = $order->get_billing_country(); // Get billing country.
                    $get_billing_email = $order->get_billing_email(); // Get billing email.
                    $get_billing_first_name = $order->get_billing_first_name(); // Get billing first name.
                    $get_billing_last_name = $order->get_billing_last_name(); // Get billing last name.
                    $get_billing_phone = $order->get_billing_phone(); // Get billing phone.
                    $get_billing_postcode = $order->get_billing_postcode(); // Get billing postcode.
                    $get_billing_state = $order->get_billing_state(); // Get billing state.
                    $get_customer_id = $order->get_customer_id(); // Get customer_id.
                    $get_customer_ip_address = $order->get_customer_ip_address(); // Get customer ip address.
                    $get_customer_note = $order->get_customer_note(); // Get customer note.
                    $get_customer_order_notes = $order->get_customer_order_notes(); // List order notes (public) for the customer.
                    $get_customer_user_agent = $order->get_customer_user_agent(); // Get customer user agent.
                    $get_formatted_billing_address = $order->get_formatted_billing_address(); // Get a formatted billing address for the order.
                    $get_formatted_billing_full_name = $order->get_formatted_billing_full_name(); // Get a formatted billing full name.
                    $get_formatted_shipping_address = $order->get_formatted_shipping_address(); // Get a formatted shipping address for the order.
                    $get_formatted_shipping_full_name = $order->get_formatted_shipping_full_name(); // Get a formatted shipping full name.
                    $get_shipping_address_1 = $order->get_shipping_address_1(); // Get shipping address line 1.
                    $get_shipping_address_2 = $order->get_shipping_address_2(); // Get shipping address line 2.
                    $get_shipping_address_map_url = $order->get_shipping_address_map_url(); // Get a formatted shipping address for the order.
                    $get_shipping_city = $order->get_shipping_city(); // Get shipping city.
                    $get_shipping_company = $order->get_shipping_company(); // Get shipping company.
                    $get_shipping_country = $order->get_shipping_country(); // Get shipping country.
                    $get_shipping_first_name = $order->get_shipping_first_name(); // Get shipping first name.
                    $get_shipping_last_name = $order->get_shipping_last_name(); // Get shipping_last_name.
                    $get_shipping_phone = $order->get_shipping_phone(); // Get shipping phone.
                    $get_shipping_postcode = $order->get_shipping_postcode(); // Get shipping postcode.
                    $get_shipping_state = $order->get_shipping_state(); // Get shipping state.
                    $get_user = $order->get_user(); // Get the user associated with the order. False for guests.
                    $get_user_id = $order->get_user_id(); // Alias for $order->get_customer_id();.

                    $message = "
                    <p style='font-family: 'Lato' !important; color: #000 !important; font-weight: 700 !important;'>Hallo $get_billing_first_name,</p>
                    <p style='font-family: 'Lato' !important; color: #000 !important;'>Vielen Dank für die Anfrage. Sie wird ausgesetzt, bis die Zahlung bestätigt ist.</p>
                    <h2 style='font-family: 'Lato' !important;><span style='font-weight: 400 !important; color: #000 !important;'>Bestellnummer:</span> $order_id </h2>
                    <h2 style='font-family: 'Lato' !important;><span style='font-weight: 400 !important; color: #000 !important;'>Bezahlverfahren:</span> Banküberweisung</h2>
                    <h2 style='font-family: 'Lato' !important;><span style='font-weight: 400 !important; color: #000 !important;'>Zu bezahlende Summe:</span> $order_total </h2>
                    <h2 style='font-family: 'Lato' !important;'>Unsere Bankverbindung</h2>
                    <h3 style='font-family: 'Lato' !important;'>MotulinKa EU ( EURO )</h3>
                    <ul>
                        <li>Bank: <strong>mBank</strong></li>
                        <li>Accountnummer: <strong>36 1140 2004 0000 3212 2086 9456</strong></li>
                        <li>IBAN: <strong>PL36 1140 2004 0000 3212 2086 9456</strong></li>
                        <li>BIC: <strong>PKOPPLPW</strong></li>
                    </ul>
                    <h2 style='font-family: 'Lato' !important;'>Lieferanschrift</h2>
                    <address style='padding:12px;color:#000; box-shadow: 0px 3px 6px 0px rgba(0,0,0,0.16)!important; border: 1px solid #00000030 !important;'>
                        $get_billing_first_name $get_billing_last_name
                        $get_billing_country
                        $get_billing_address_1 $get_billing_address_2 
                        $get_billing_postcode $get_billing_city
                        $get_billing_phone
                        <href='$get_billing_email' target='_blank' style='color: #000!important; font-weight:700!important;'>$get_billing_email
                        </address
                        <h2 style='font-family: 'Lato' !important; padding-top: 30px !important;'>Lieferadresse</h2>
                        <address style='padding:12px;color:#000; box-shadow: 0px 3px 6px 0px rgba(0,0,0,0.16)!important; border: 1px solid #00000030 !important;'>
                            $get_shipping_first_name $get_shipping_last_name
                            $get_shipping_country
                            $get_shipping_address_1 $get_shipping_address_2 
                            $get_shipping_postcode $get_shipping_city
                            $get_shipping_phone
                            <href='$get_billing_email' target='_blank' style='color: #000!important; font-weight:700!important;'>$get_billing_email
                            </address>
                    <p style='padding-top: 30px !important; font-family: 'Lato' !important; color: #000 !important; font-weight: 700 !important;'>Wir hoffen, unserem Wunsch nachkommen zu können!</p>

                    ";
                $mailer = WC()->mailer();
                $wrapped_message = $mailer->wrap_message($heading, $message);
                $wc_email = new WC_Email;
                $html_message = $wc_email->style_inline($wrapped_message);
                $mailer->send( $get_billing_email, $subject, $html_message, HTML_EMAIL_HEADERS );


        }
        else {
            define("HTML_EMAIL_HEADERS", array('Content-Type: text/html; charset=UTF-8'));

            $subject = "MotulinKa.com - Wir haben Ihre Bestellnummer erhalten $order_id";
            $heading = "Danke für Ihren Einkauf!";
            $shipping_method = $order->get_shipping_method();
            $order_total = $order->get_total();
       $get_billing_address_1 = $order->get_billing_address_1(); // Get billing address line 1.
       $get_billing_address_2 = $order->get_billing_address_2(); // Get billing address line 2.
       $get_billing_city = $order->get_billing_city(); // Get billing city.
       $get_billing_company = $order->get_billing_company(); // Get billing company.
       $get_billing_country = $order->get_billing_country(); // Get billing country.
       $get_billing_email = $order->get_billing_email(); // Get billing email.
       $get_billing_first_name = $order->get_billing_first_name(); // Get billing first name.
       $get_billing_last_name = $order->get_billing_last_name(); // Get billing last name.
       $get_billing_phone = $order->get_billing_phone(); // Get billing phone.
       $get_billing_postcode = $order->get_billing_postcode(); // Get billing postcode.
       $get_billing_state = $order->get_billing_state(); // Get billing state.
       $get_customer_id = $order->get_customer_id(); // Get customer_id.
       $get_customer_ip_address = $order->get_customer_ip_address(); // Get customer ip address.
       $get_customer_note = $order->get_customer_note(); // Get customer note.
       $get_customer_order_notes = $order->get_customer_order_notes(); // List order notes (public) for the customer.
       $get_customer_user_agent = $order->get_customer_user_agent(); // Get customer user agent.
       $get_formatted_billing_address = $order->get_formatted_billing_address(); // Get a formatted billing address for the order.
       $get_formatted_billing_full_name = $order->get_formatted_billing_full_name(); // Get a formatted billing full name.
       $get_formatted_shipping_address = $order->get_formatted_shipping_address(); // Get a formatted shipping address for the order.
       $get_formatted_shipping_full_name = $order->get_formatted_shipping_full_name(); // Get a formatted shipping full name.
       $get_shipping_address_1 = $order->get_shipping_address_1(); // Get shipping address line 1.
       $get_shipping_address_2 = $order->get_shipping_address_2(); // Get shipping address line 2.
       $get_shipping_address_map_url = $order->get_shipping_address_map_url(); // Get a formatted shipping address for the order.
       $get_shipping_city = $order->get_shipping_city(); // Get shipping city.
       $get_shipping_company = $order->get_shipping_company(); // Get shipping company.
       $get_shipping_country = $order->get_shipping_country(); // Get shipping country.
       $get_shipping_first_name = $order->get_shipping_first_name(); // Get shipping first name.
       $get_shipping_last_name = $order->get_shipping_last_name(); // Get shipping_last_name.
       $get_shipping_phone = $order->get_shipping_phone(); // Get shipping phone.
       $get_shipping_postcode = $order->get_shipping_postcode(); // Get shipping postcode.
       $get_shipping_state = $order->get_shipping_state(); // Get shipping state.
       $get_user = $order->get_user(); // Get the user associated with the order. False for guests.
       $get_user_id = $order->get_user_id(); // Alias for $order->get_customer_id();.
       $get_payment_method_title = $order->get_payment_method_title();
       $message = "
       <p style='font-family: 'Lato' !important; color: #000 !important; font-weight: 700 !important;'>Hallo $get_billing_first_name,</p>
       <p style='font-family: 'Lato' !important; color: #000 !important;'>Vielen Dank für die Anfrage. Sie wird ausgesetzt, bis die Zahlung bestätigt ist.</p>
       <h2 style='font-family: 'Lato' !important;><span style='font-weight: 400 !important; color: #000 !important;'>Bestellnummer:</span> $order_id </h2>
       <h2 style='font-family: 'Lato' !important;><span style='font-weight: 400 !important; color: #000 !important;'>Bezahlverfahren:</span> $get_payment_method_title</h2>
       <h2 style='font-family: 'Lato' !important;><span style='font-weight: 400 !important; color: #000 !important;'>Gesamtbestellung</span> $order_total </h2>
       
       <h2 style='font-family: 'Lato' !important;'>Lieferanschrift</h2>
       <address style='padding:12px;color:#000; box-shadow: 0px 3px 6px 0px rgba(0,0,0,0.16)!important; border: 1px solid #00000030 !important;'>
           $get_billing_first_name $get_billing_last_name
           $get_billing_country
           $get_billing_address_1 $get_billing_address_2 
           $get_billing_postcode $get_billing_city
           $get_billing_phone
           <href='$get_billing_email' target='_blank' style='color: #000!important; font-weight:700!important;'>$get_billing_email
           </address
           <h2 style='font-family: 'Lato' !important; padding-top: 30px !important;'>Lieferadresse</h2>
           <address style='padding:12px;color:#000; box-shadow: 0px 3px 6px 0px rgba(0,0,0,0.16)!important; border: 1px solid #00000030 !important;'>
               $get_shipping_first_name $get_shipping_last_name
               $get_shipping_country
               $get_shipping_address_1 $get_shipping_address_2 
               $get_shipping_postcode $get_shipping_city
               $get_shipping_phone
               <href='$get_billing_email' target='_blank' style='color: #000!important; font-weight:700!important;'>$get_billing_email
               </address>
       <p style='padding-top: 30px !important; font-family: 'Lato' !important; color: #000 !important; font-weight: 700 !important;'>Wir hoffen, unserem Wunsch nachkommen zu können!</p>

       ";
   $mailer = WC()->mailer();
   $wrapped_message = $mailer->wrap_message($heading, $message);
   $wc_email = new WC_Email;
   $html_message = $wc_email->style_inline($wrapped_message);
   $mailer->send( $get_billing_email, $subject, $html_message, HTML_EMAIL_HEADERS );

        }
        
    }






    }
  
    return $template;
}
add_filter( 'template_include', 'check_current_page_template' );






add_action('admin_head', 'my_custom_fonts');

function my_custom_fonts() {
  echo '<style>
    #advanced-custom-fields-pro-update {
    display: none !important;
    }
    .update-core-php #update-plugins-table , .update-core-php #upgrade-plugins-2, .update-core-php .count, .update-core-php .upgrade, .update-plugins {
        display: none !important;
    }
  </style>';
}







add_filter( 'woocommerce_show_variation_price', function() { return TRUE;} );