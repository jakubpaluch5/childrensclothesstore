{{--
  Template Name: Zapomniałeś hasła
--}}

@extends('layouts.app')

@section('content')

@php 
if ( is_user_logged_in() ) {
    wp_redirect('https://motulinka.com/my-account');
    exit;
}
@endphp

<section class="registerSection">
    <div class="container--1320 container">
        <div class="registerBox">
            <ul class="woocommerce-error" role="alert">
                <?php foreach ( $notices as $notice ) : ?>
                    <li <?php echo wc_get_notice_data_attr( $notice ); ?>>
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
            <h3>Przypomij hasło</h3>
            <p class="registerBox__desc">Zapomniane hasło? Proszę wprowadzić nazwę użytkownika lub adres e-mail. Wyślemy w wiadomości email, odnośnik potrzebny do utworzenia nowego hasła.
            </p>
            {!! wc_get_template( 'myaccount/form-lost-password.php', array( 'form' => 'lost_password' ) ); !!}
        </div>
        <h4 class="haveAlreadyAccountText"><a href="{!! site_url() !!}/logowanie">Powrót</a></h4>
    </div>
</section>


<style>
    .preloader-plus {
        display: none !important;
    }
</style>

@endsection
