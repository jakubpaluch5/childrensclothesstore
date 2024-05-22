{{--
  Template Name: Logowanie
--}}

@extends('layouts.app')

@section('content')

@php 
if ( is_user_logged_in() ) {
    wp_redirect('https://motulinka.com/my-account');
    exit;
}
@endphp

<section class="loginSection">
    <div class="container--1320 container">
        <div class="loginBox">
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
            <h3>Logowanie</h3>
            <p class="loginBox__desc">Wpisz adres e-mail i hasło</p>
            {!! do_shortcode('[wc_login_form_bbloomer]') !!}

            <p style="" class="loginBox__desc loginBox__desc--social">lub zaloguj się przy użyciu</p>

            {!! do_shortcode('[miniorange_social_login]') !!}
        </div>
        <div class="registerOrGuestBox">
            <div class="rogbRow registerRow">
                <h3>Nie masz jeszcze konta na <span>MotulinKa</span>?</h3>
                <p>Załóż konto już teraz i zyskaj dostęp do szybszego procesu zamawiania oraz pełnej historii wszystkich zamówień.</p>
                <a class="motulinkaBtn motulinkaBtn--halfRounded" href="{!! site_url() !!}/rejestracja">Załóż konto</a>
            </div>
            <div style="padding-top: 50px;" class="rogbRow GuestRow">
                <h3>Kontynuuj jako gość</h3>
                <p>Kup wybrane produkty bez logowania oraz zakładania nowego konta.</p>
                <a class="motulinkaBtn motulinkaBtn--halfRounded" href="{!! site_url() !!}/shop">Kontynuuj bez logowania</a>
            </div>
        </div>
    </div>
</section>

@endsection
