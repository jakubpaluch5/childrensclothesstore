{{--
  Template Name: Moje konto
--}}

@extends('layouts.app')

@section('content')

@php 
if ( !is_user_logged_in() ) {
  
        wp_redirect('https://motulinka.com/logowanie/');
    exit;
  
    
}
@endphp


<section class="myAccountSection">
    <div class="container--1320 container">
        <h3 class="pageTitle">Moje konto</h3>
       
            {!! do_shortcode('[woocommerce_my_account]') !!}
    </div>
</section>

@endsection
