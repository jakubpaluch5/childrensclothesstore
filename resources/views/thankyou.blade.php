{{--
  Template Name: Dziękujemy
--}}

@extends('layouts.app')

@section('content')
<link href="https://fonts.cdnfonts.com/css/lemon-tuesday" rel="stylesheet">

    <section class="thankYouPageSection" style="background-image: url('{!! site_url() !!}/wp-content/uploads/2023/11/henley-design-studio-3qehZLBDsEQ-unsplash-1.jpg')">
        <div class="container container--1320">
            <h1>Dziękujemy!</h1>
            <h3>Dziękujemy za zakupy</h3>
            
            @php 
            $order_id = wc_get_order_id_by_order_key( $_GET['order_key'] );
             
            @endphp
            </h3>
            <h3>Twój nr zamówienia: {!! $order_id !!}</h3>
            <a class="motulinkaBtn motulinkaBtn--rounded" href="{!! site_url() !!}">Wróć na stronę główną</a>
        </div>
    </section>


    <style>
        .siteFooter {
            display: none !important;
        }
            .thankYouPageSection {
                background-position: center;
                background-size: cover;
                background-repeat: no-repeat;
            }
            .thankYouPageSection {
                padding-bottom: 350px;
                padding-top: 50px;
            }
            .thankYouPageSection h1, .thankYouPageSection h3 {
                margin: 0;
            }
            .thankYouPageSection h1 {
                font-size: 190px;
                text-align: left;
                font-family: 'Lemon Tuesday', sans-serif;
                color: #E2A269;
                font-weight: 400;
                padding-bottom: 86px;
            }
            .thankYouPageSection h3 {
                color: black;
                font-family: 'Lato';
                padding-bottom: 10px;
                font-weight: 700;
                font-size: 30px;
            }
            .thankYouPageSection a {
                margin-top: 30px;
            
                border-radius: 0px;
                border-bottom-right-radius: 25px;
                }

                @media screen and (max-width: 1200px) {
                    .thankYouPageSection h1 {
                        font-size: 130px;
                    }
                    .thankYouPageSection {
                        padding-bottom: 200px;
                    }
                }
                @media screen and (max-width: 800px) {
                    .thankYouPageSection h1 {
                       font-size: 14vw;
                    }
                }
                @media screen and (max-width: 600px) {
                    .thankYouPageSection h1 {
                       font-size: 12vw;
                    }
                    .thankYouPageSection h3 {
                        font-size: 20px;
                    }
                }
    </style>


@endsection
