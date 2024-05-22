{{--
  Template Name: Kolekcje
--}}

@extends('layouts.app')

@section('content')

<section class="pageHeaderSection" style="background-image: url('{!! get_the_post_thumbnail_url() !!}')">
    <div class="container container--1320">
        <h1>{!! the_title() !!}</h1>
    </div>
</section>


<section class="collectionsSection">
    <div class="container container--1320">
      @php
          $args = array(  
            'post_type' => 'collection',
            'posts_per_page' => -1, 
            'orderby' => 'title',
            'order' => 'ASC',
           
        );
        $loop = new WP_Query( $args ); 
        while ( $loop->have_posts() ) : $loop->the_post(); 


        $collectionLink = get_field('link_do_filtrow_na_stronie_sklepu');
          @endphp
          


          <div class="collectionRow">
            <h5 class="collectionRow__title">{!! the_title() !!}</h5>
            @if(get_field('opis_kolekcji'))
            <p class="collectionRow__desc">{!! get_field('opis_kolekcji') !!}</p>
            @else 
            <p class="collectionRow__desc">Uzupełnić</p>
            @endif
            <div class="collectionRow__wrapper">
                @if(get_field('zdjecie_kwadratowe_kolekcji'))
                  <div class="photoHolder__squarePhoto" style="background-image: url('{!! get_field('zdjecie_kwadratowe_kolekcji') !!}')">
                    <div class="squarePhoto__roundedPhoto" style="background-image: url('{!! get_field('zdjecie_zaokraglone_kolekcji') !!}')">

                    </div>
                  </div>
           
                @else
                <img class="collectionPhoto" src="{!! site_url() !!}/wp-content/uploads/2023/11/Group-5222.png" />
                @endif
               
               
                <div class="collectionRow__productSlider">
                    <h4>Produkty z kolekcji</h4>
                    <div class="splide" role="group" aria-label="Splide Basic HTML Example">
               
                        <div class="splide__track">
                              <ul class="splide__list">
                                @php
                                $argsz = array(  
                                  'post_type' => 'product',
                                  'posts_per_page' => 8, 
                                  'offset' => 0,
                                  'order' => 'DESC',
                                  'tax_query' => array(
                                  array(
                                    'taxonomy' => 'product_tag',
                                    'field'    => 'id',
                                    'terms'    => array(get_field('wybierz_kolekcje_z_listy_tagow')),
                                  ),
                                ),
                            );
                              $loopz = new WP_Query( $argsz ); 
                              while ( $loopz->have_posts() ) : $loopz->the_post(); 
                                @endphp
                                <li class="splide__slide">
                                @include('partials.productBox')
                            </li>
                                @php
                              endwhile;
                              // wp_reset_postdata(); 
                                @endphp
                              </ul>
                        </div>
                      </div>
                </div>
            </div>
            <a class="motulinkaBtn motulinkaBtn--halfRounded" href="{!! $collectionLink !!}">Zobacz kolekcję</a>
        </div>


          @php
        endwhile;
        wp_reset_postdata(); 
          @endphp



<style>
  .photoHolder__squarePhoto {
    width: 380px;
    height: 380px;
    box-shadow: 0px 3px 6px 0px rgba(0,0,0,0.18);
    background-position: center;
    background-size: cover;
    position: relative;
  }
  .squarePhoto__roundedPhoto {
    width: 300px;
    height: 300px;
    background-position: center;
    border-radius: 50%;
    background-size: cover;
    border: 12px solid #F9F6F4;
    position: absolute;
    top: 50%;
    right: -150px;
    transform: translateY(-50%);
  }
  .collectionsSection .container .collectionRow:nth-of-type(2n) .squarePhoto__roundedPhoto{
    left: -150px;
    right: unset;
  }

  @media screen and (max-width: 1400px) {
    .photoHolder__squarePhoto {
      width: 300px;
      height: 300px;
    }
    .squarePhoto__roundedPhoto {
      width: 200px;
      height: 200px;
      right: -100px;
    }
    .collectionsSection .container .collectionRow:nth-of-type(2n) .squarePhoto__roundedPhoto{
    left: -100px;
    right: unset;
  }
  }

    @media screen and (max-width: 1000px) {
      .collectionsSection .container .collectionRow:nth-of-type(2n) .squarePhoto__roundedPhoto{
    right: -100px;
    left: unset;
  }

  .photoHolder__squarePhoto {
    width: 300px;
    height: 300px;

    display: block;

  }
    }

    @media screen and (max-width: 450px) {
      .photoHolder__squarePhoto {
      width: 250px;
      height: 250px;
    }
    }
    @media screen and (max-width: 400px) {
      .photoHolder__squarePhoto {
      width: 70%;
    }
    }
</style>



    </div>
</section>

@endsection
