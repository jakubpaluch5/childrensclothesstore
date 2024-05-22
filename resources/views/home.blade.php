{{--
  Template Name: Strona główna
--}}

@extends('layouts.app')

@section('content')

@php $homeHeroSliderData = get_field('glowny_slajder_hero'); @endphp
<section style="display: block !important;" id="homeHeroSliderSection" class="splide" aria-label="Splide Basic HTML Example">
  <button class="homeHeroSlider__arrow homeHeroSlider__arrow--left">
    <img alt="Home hero slajder - strzałka w lewo" src="<?= get_template_directory_uri(); ?>/assets/images/home/hero-slider-arrow.svg">
  </button>
  <button class="homeHeroSlider__arrow homeHeroSlider__arrow--right">
    <img alt="Home hero slajder - strzałka w prawo" src="<?= get_template_directory_uri(); ?>/assets/images/home/hero-slider-arrow.svg">
  </button>
  <div class="splide__track">
		<ul class="splide__list">
      @foreach($homeHeroSliderData as $homeHeroSlideData)
      <li class="splide__slide" style="background-image: url('{!! $homeHeroSlideData['tlo_slajdu'] !!}')">
		  @if($homeHeroSlideData['czy_brazowy_tytul'])
		   <h2 style="color: #945128 !important;">
          {!! $homeHeroSlideData['tytul_slajdu'] !!}
        </h2>
		  @else
		   <h2>
          {!! $homeHeroSlideData['tytul_slajdu'] !!}
        </h2>
		  @endif
       
          @if($homeHeroSlideData['czy_dodac_przycisk'])
          <a href="{!! $homeHeroSlideData['przycisk_na_slajdzie']['url'] !!}" class="motulinkaBtn motulinkaBtn--string motulinkaBtn--string--white">Sprawdź</a>
          @endif
      </li>

      @endforeach
		
		</ul>
  </div>
</section>




<section style="display: block !important;" id="homeCategoriesFadeSection" class="splide" aria-label="Splide Basic HTML Example">
  <div class="splide__track">
		<ul class="splide__list">
      @php
        $product_parent_categories_args = array(
          'orderby' => 'name',
          'order' => 'ASC',
          'parent' => 0,
          'exclude' => get_field('slajder_z_kategoriami_-_wyklucz_kategorie'),
        );
        $product_parent_categories = get_terms( 'product_cat', $product_parent_categories_args );
      @endphp
      @foreach($product_parent_categories as $product_parent_category)
      @php
       $product_parent_category_thumbnail_id = get_term_meta( $product_parent_category->term_id, 'thumbnail_id', true );
	    $product_parent_category_image = wp_get_attachment_url( $product_parent_category_thumbnail_id );
      @endphp
      <li class="splide__slide homeCategoriesFadeSection__categoryBox">
      
        
     
          <div class="categoryBox__photo"
          @if($product_parent_category_image)
          style="background-image: url('{!! $product_parent_category_image !!}')"
          @else 
          style="background-image: url('{!! site_url() !!}/wp-content/uploads/2023/11/Group-5222.jpg')"
          @endif 
          ></div>
          <h3>{!! $product_parent_category->name !!}</h3>
          <a class="categoryBox__link" href="{!! the_field('link_do_sklepu', 'product_cat_'.$product_parent_category->term_id) !!}"></a>
      </li>

      @endforeach
{{-- foreach ($product_categories as $category) {
  echo $category->name;
  $thumbnail_id = get_term_meta( $category->term_id, 'thumbnail_id', true );
	    $image = wp_get_attachment_url( $thumbnail_id );
      echo $image;
  echo '<br/>';
} --}}

	
		</ul>
  </div>
</section>

<style>
  .homeCategoriesFadeSection__categoryBox {
    position: relative;
  }
  .categoryBox__link {
    position: absolute;
    z-index: 10;
    top: 0;
    left: 0;
    display: block;
    width: 100%;
    height: 100%;
  }
</style>

<section style="display: block !important;" id="homeNewProductsSection">
  <div class="container">
    <div class="sectionMeta">
      <h4 data-aos="fade-up" data-aos-duration="1300" data-aos-offset="200">ZOBACZ NASZE NOWOŚCI</h4>
      <p data-aos="fade-up" data-aos-duration="1300" data-aos-offset="200">Poznaj najnowsze produkty, które dla Was przygotowaliśmy.</p>
    </div>
    <div class="productsWrapper wrapper">
          @php
          $args = array(  
            'post_type' => 'product',
            'posts_per_page' => 8, 
            'order' => 'DESC',
            'tax_query' => array(
            array(
              'taxonomy' => 'product_cat',
              'field'    => 'slug',
              'terms'    => array('nowosc'),
            ),
          ),);
        $loop = new WP_Query( $args ); 
        while ( $loop->have_posts() ) : $loop->the_post(); 
          @endphp
          @include('partials.productBox')
          @php
        endwhile;
        wp_reset_postdata(); 
          @endphp
    </div>
    <a  href="{!! site_url() !!}/kategoria-produktu/nowosc" class="motulinkaBtn motulinkaBtn--rounded">Sprawdź wszystkie nowości</a>
  </div>
</section>




<section style="display: flex !important;" id="homeAboutUsSection">
  <div class="homeAboutUsSection__leftSide" style="background-image: url('{!! get_field('sekcja_o_nas_-_zdjecie_po_lewej') !!}');">
    <div data-aos="fade-right" data-aos-duration="1300" data-aos-offset="200" class="leftSide__circle leftSide__circle--top">
      <p>{!! get_field('sekcja_o_nas_-_tekst_kola_na_gorze') !!}</p>
    </div>

    <div data-aos="fade-right" data-aos-duration="1300" data-aos-offset="200" class="leftSide__circle leftSide__circle--middle">
      <p>{!! get_field('sekcja_o_nas_-_tekst_kola_w_srodku') !!}</p>
    </div>

    <div data-aos="fade-right" data-aos-duration="1300" data-aos-offset="200" class="leftSide__circle leftSide__circle--bottom">
      <p>{!! get_field('sekcja_o_nas_-_tekst_kola_na_dole') !!}</p>
    </div>
  </div>
  <div class="homeAboutUsSection__rightSide" style="background-attachment: fixed; background-image: url('https://motulinka.com/wp-content/uploads/2023/12/TLO.png');">
    <div class="rightSide__content">
      <h4 data-aos="fade-up" data-aos-duration="1300" data-aos-offset="200">
        {!! get_field('sekcja_o_nas_-_tytul_po_prawej') !!}
      </h4>
      <p data-aos="fade-up" data-aos-duration="1300" data-aos-offset="200">
        {!! get_field('sekcja_o_nas_-_opis_po_prawej') !!}
      </p>
      <a  class="motulinkaBtn motulinkaBtn--halfRounded" href="{!! site_url() !!}/o-nas/">Dowiedz się więcej</a>
    </div>
  </div>
</section>


<section style="display: block !important;" id="homeMostBoughtSection">
  <div class="container">
    <div class="sectionMeta">
      <h4 data-aos="fade-up" data-aos-duration="1300" data-aos-offset="200">POZNAJ NAJCZĘŚCIEJ KUPOWANE PRODUKTY</h4>
      <p data-aos="fade-up" data-aos-duration="1300" data-aos-offset="200">Produkty cieszące się największym zainteresowaniem.</p>
    </div>
    <div class="splide homeMostBoughtSlider" role="group" aria-label="Splide Basic HTML Example">
      <button class="homeMostBoughtSlider__arrow homeMostBoughtSlider__arrow--left">
        <img alt="Home hero slajder - strzałka w lewo" src="<?= get_template_directory_uri(); ?>/assets/images/home/hero-slider-arrow.svg">
      </button>
      <button class="homeMostBoughtSlider__arrow homeMostBoughtSlider__arrow--right">
        <img alt="Home hero slajder - strzałka w prawo" src="<?= get_template_directory_uri(); ?>/assets/images/home/hero-slider-arrow.svg">
      </button>
      <div class="splide__track">
        <ul class="splide__list">
          @php
          $args = array(  
            'post_type' => 'product',
            'order' => 'ASC',
            'offset' => 150,
            'posts_per_page' => 8, 
           
        );
        $loop = new WP_Query( $args ); 
        while ( $loop->have_posts() ) : $loop->the_post(); 
          @endphp
          <li class="splide__slide">
          @include('partials.productBox')
          </li>
          @php
        endwhile;
        wp_reset_postdata(); 
          @endphp
        </ul>
      </div>
    </div>

    <a  href="{!! site_url() !!}/shop" class="motulinkaBtn motulinkaBtn--rounded">Zobacz więcej produktów</a>
  </div>
</section>


<section id="homeTestimonialSliderSection" style="background-attachment: fixed; display: block !important;background-image: url('https://motulinka.com/wp-content/uploads/2023/12/TLO.png')">
  <div class="container">
    <div class="sectionMeta">
      <h4 data-aos="fade-up" data-aos-duration="1300" data-aos-offset="200">CO MÓWIĄ O NAS NASI KLIENCI</h4>
    </div>
    <div class="splide homeTestimonialSlider" role="group" aria-label="Splide Basic HTML Example">
      <button class="homeTestimonialSlider__arrow homeTestimonialSlider__arrow--left">
        <img alt="Home hero slajder - strzałka w lewo" src="<?= get_template_directory_uri(); ?>/assets/images/home/hero-slider-arrow.svg">
      </button>
      <button class="homeTestimonialSlider__arrow homeTestimonialSlider__arrow--right">
        <img alt="Home hero slajder - strzałka w prawo" src="<?= get_template_directory_uri(); ?>/assets/images/home/hero-slider-arrow.svg">
      </button>
      <div class="splide__track">
        <ul class="splide__list">
          @php
          $args = array(  
            'post_type' => 'opinie',
            'posts_per_page' => 3, 
           
        );
        $loop = new WP_Query( $args ); 
        while ( $loop->have_posts() ) : $loop->the_post(); 
          @endphp
          <li data-aos="fade-up" data-aos-duration="1300" data-aos-offset="200" class="splide__slide">
            <div  class="slideTestimonialBox">
            <h5>{!! the_title() !!}</h5>
            <span class="testimonialDate">{!! get_the_date('d M, Y') !!}</span>
            <div class="testimonialStarsHolder">
              <img alt="Gwiazdka opinii" src="<?= get_template_directory_uri(); ?>/assets/images/home/star.svg">
              <img alt="Gwiazdka opinii" src="<?= get_template_directory_uri(); ?>/assets/images/home/star.svg">
              <img alt="Gwiazdka opinii" src="<?= get_template_directory_uri(); ?>/assets/images/home/star.svg">
              <img alt="Gwiazdka opinii" src="<?= get_template_directory_uri(); ?>/assets/images/home/star.svg">
              <img alt="Gwiazdka opinii" src="<?= get_template_directory_uri(); ?>/assets/images/home/star.svg">
            </div>
            <p>
              {!! get_field('tresc_opinii') !!}
            </p>
          </div>
          </li>
          @php
        endwhile;
        wp_reset_postdata(); 
          @endphp
        </ul>
      </div>
    </div>
    <a href="https://www.google.com/search?q=motulinka&oq=motulinka+&gs_lcrp=EgZjaHJvbWUyBggAEEUYOTIGCAEQRRg8MgYIAhBFGEEyBggDEEUYPDIGCAQQRRg8MgYIBRBFGDzSAQgzNTc4ajBqMagCALACAA&sourceid=chrome&ie=UTF-8#lrd=0x47169589feb24a23:0x6728035043823c69,1,,,," class="motulinkaBtn motulinkaBtn--rounded">Zobacz więcej opinii</a>
  </div>
</section>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css">
<script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>

<script>
     const homeTestimonialSlider = new Splide( '#homeTestimonialSliderSection .splide', {
      type   : 'loop',
      perPage: 3,
      perMove: 1,
      arrows: false,
      pagination: false,
      destroy: false,
      focus: 'center',
      width: '1500px',
      padding: '0',
      gap: '70px',
      padding: false,
      breakpoints: {
        1000: {
          destroy: false,
          perPage: 1,
          gap: '20px',
        },
        600: {
          destroy: false,
          perPage: 1,
          padding: false,
          gap: '10px',
        },
       
      },
    } );
    
    homeTestimonialSlider.mount();


    document.querySelector('.homeTestimonialSlider__arrow--left').addEventListener('click', () => {
      homeTestimonialSlider.go('<')
    })
    
    document.querySelector('.homeTestimonialSlider__arrow--right').addEventListener('click', () => {
      homeTestimonialSlider.go('>')
    })

</script>

<style>
  #homeTestimonialSliderSection .container .splide .splide__slide {
    max-width: unset !important;
  }
  #homeTestimonialSliderSection .container .splide .splide__slide:nth-of-type(2) {
    padding: 40px 20px;
  }
  #homeTestimonialSliderSection .container .splide .homeTestimonialSlider__arrow {
    display: flex;
  }
  #homeTestimonialSliderSection .container .splide .homeTestimonialSlider__arrow {
    position: absolute;
    top: 48%;
    transform: translateY(-50%);
    z-index: 9;
    opacity: 0;
    background-color: #e2a269;
    border: none;
    width: 38px;
    height: 70px;
    left: 20px;
    display: flex;
    justify-content: center;
    align-items: center;
    border-top-right-radius: 50px;
    border-bottom-right-radius: 50px;
    cursor: pointer;
    transition: box-shadow .5s ease,opacity .5s ease, top 0.5s ease;
  }
  #homeTestimonialSliderSection .container .splide:hover .homeTestimonialSlider__arrow {
    opacity: 1;
    top: 45%;
    box-shadow: 0px 3px 6px 0px rgba(0,0,0,0.16);
  }
  #homeTestimonialSliderSection .container .splide .homeTestimonialSlider__arrow img {
    filter: brightness(0) invert(1);

  }
  #homeTestimonialSliderSection .container .splide .homeTestimonialSlider__arrow.homeTestimonialSlider__arrow--right {
    left: unset;
    transform: translateY(-50%) rotate(180deg);
    right: 20px;
  }
  .slideTestimonialBox {
    box-shadow: 0px 3px 6px 0px rgba(0,0,0,0.16);
    background-color: white;
    display: flex;
    flex-flow: column;
    align-items: center;
    padding: 40px 20px;
    border-radius: 15px;
    transition: transform 0.3s ease;
  }
  #homeTestimonialSliderSection .container .splide .splide__track .splide__slide {
    background-color: transparent;
    box-shadow: unset;
    padding: 0;
  }
  #homeTestimonialSliderSection .container .splide .splide__track .splide__slide.is-active .slideTestimonialBox{
    transform: scale(1.15);
  }
  #homeTestimonialSliderSection .container .splide .splide__track {
    padding-top: 20px;
  }
  
</style>


@endsection
