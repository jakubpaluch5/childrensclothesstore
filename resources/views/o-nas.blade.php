{{--
  Template Name: O nas
--}}

@extends('layouts.app')

@section('content')

<link href="https://fonts.cdnfonts.com/css/lemon-tuesday" rel="stylesheet">

<section class="pageHeaderSection" style="background-image: url('{!! get_the_post_thumbnail_url() !!}')">
    <div class="container container--1320">
        <h1>{!! the_title() !!}</h1>
    </div>
</section>
<section class="aboutVideoSection">
    <div class="container container--1320">
        <iframe width="760" height="415" src="https://www.youtube-nocookie.com/embed/Ji6SB0RaHjM?si=Pl_cbNhIayoCJeEw&amp;controls=0&showinfo=0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>    </div>
</section>
    <style>
        .aboutVideoSection .container {
            display: flex;
            justify-content: center;
            padding-top: 50px;
        }
        .aboutVideoSection .container iframe {
            box-shadow: 0px 3px 6px 0px rgba(0,0,0,0.16);
        }
        @media screen and (max-width: 1000px) {
            .aboutVideoSection .container iframe {
            width: 100%;
            max-width: 100%;
            height: 400px;
        } 
        }
        @media screen and (max-width: 700px) {
            .aboutVideoSection .container iframe {
            width: 100%;
            max-width: 100%;
            height: 300px;
        } 
        }
        @media screen and (max-width: 550px) {
            .aboutVideoSection .container iframe {
            width: 100%;
            max-width: 100%;
            height: 200px;
        } 
        }
    </style>
<section class="aboutUsContentSection">
    <div class="container container--1320">
        <h5 data-aos="fade-up" data-aos-duration="1300" data-aos-offset="200">{!! get_field('tekst_nad_paragrafami') !!}</h5>
        <div class="aboutUsContentSection__row">
            <div data-aos="fade-up" data-aos-duration="1300" data-aos-offset="200" class="row__image" style="background-image: url('{!! get_field('zdjecie_w_pierwszym_paragrafie') !!}')"></div>
            <div class="row__content">
                <p data-aos="fade-up" data-aos-duration="1300" data-aos-offset="200">
                    {!! get_field('tekst_w_pierwszym_paragrafie') !!}
                </p>
            </div>
            
        </div>


        <div class="aboutUsContentSection__row aboutUsContentSection__row--reverse">
           
            <div class="row__content">
                <p data-aos="fade-up" data-aos-duration="1300" data-aos-offset="200">
                    {!! get_field('tekst_w_drugim_paragrafie') !!}
                </p>
            </div>
            <div data-aos="fade-up" data-aos-duration="1300" data-aos-offset="200" class="row__image" style="background-image: url('{!! get_field('zdjecie_kwadratowe_w_drugim_paragrafie') !!}')">
                <div class="row__insideImage" style="background-image: url('{!! get_field('zdjecie_okragle_w_drugim_paragrafie') !!}')">

                </div>
            </div>
            
        </div>

        <img data-aos="fade-up" data-aos-duration="1300" data-aos-offset="200" class="signatureImage" src="{!! get_field('podpis_na_koncu') !!}" alt="Podpis Motulinka - z miłości do dzieci">
    </div>
</section>

@endsection
