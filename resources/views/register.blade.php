{{--
  Template Name: Rejestracja
--}}

@extends('layouts.app')

@section('content')


@php 
if ( is_user_logged_in() ) {
    wp_redirect('https://motulinka.com/my-account/');
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
            <h3>Rejestracja</h3>
            <p class="registerBox__desc">Uzupełnij poniższe pola</p>
            {!! do_shortcode('[wc_reg_form_bbloomer]') !!}
        </div>
        <h4 class="haveAlreadyAccountText">Masz już konto? <a href="{!! site_url() !!}/logowanie">Zaloguj się</a></h4>
    </div>
</section>

@endsection
