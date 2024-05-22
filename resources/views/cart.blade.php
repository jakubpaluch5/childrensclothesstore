{{--
  Template Name: Koszyk
--}}

@extends('layouts.app')

@section('content')

    <section class="cartSection">
        <div class="container container--1320">
            <div class="pageTitleHolder">
                     <h4 class="pageTitle">Koszyk</h4> 
                     <a class="pageTitle__backToShop" href="{!! site_url() !!}/shop"><span><svg xmlns="http://www.w3.org/2000/svg" width="6.751" height="11.808" viewBox="0 0 6.751 11.808">
                        <path id="Icon_ionic-ios-arrow-forward" data-name="Icon ionic-ios-arrow-forward" d="M15.963,12.1,11.494,7.633a.84.84,0,0,1,0-1.192.851.851,0,0,1,1.2,0L17.752,11.5a.842.842,0,0,1,.025,1.164l-5.084,5.094a.844.844,0,1,1-1.2-1.192Z" transform="translate(17.998 18.004) rotate(180)" fill="#e2a269"/>
                      </svg>
                      </span> Kontynuuj zakupy</a>
            </div>
           
            {!! do_shortcode('[woocommerce_cart]') !!}
        </div>
    </section>

    <style>
        .cartSection .container .shop_table tbody tr td a, .cartSection .container .shop_table tbody tr td span {
            font-family: 'futura-pt' !important;
        }
        .woocommerce table.shop_table tbody {
            background-color: transparent !important;
        }
        .pageTitle__backToShop {
            color: #E2A269;
            font-family: 'Lato';
            font-size: 16px;
            font-weight: 500;
            display: flex;
            gap: 15px;
            align-items: center;
            

        }
  
        .woocommerce-shipping-destination {
            font-size: 16px;
            font-weight: 400;
            font-family: 'futura-pt';
        }
        .woocommerce-page .cart-collaterals .cart_totals h2, .woocommerce .cart-collaterals .cart_totals h2 {
            text-transform: uppercase;
        }
       
        .shipping-calculator-button {
            font-size: 16px;
            font-weight: 400;
            font-family: 'futura-pt';
            display: flex;
            flex-flow: row;
            align-items: center;
        }
        .page-template-cart .cartSection .container h4.pageTitle {
            padding-top: 0px;
        }
        .pageTitleHolder {
            display: flex;
            width: 100%;
            padding-top: 50px;
            justify-content: space-between;
            align-items: center;
        }
        .pageTitleHolder h4 {
            text-transform: uppercase;
        }
        .pageTitle__backToShop:hover {
            color:#E2A269;
        }
        .pageTitle__backToShop span {
            display: block;
            color: #E2A269;
            font-family: 'Lato';
            font-size: 16px;
            font-weight: 500;
            transition: transform 0.3s ease;
        }
        .pageTitle__backToShop:hover span {
            transform: translateX(-2px);
        }
    </style>

@endsection
