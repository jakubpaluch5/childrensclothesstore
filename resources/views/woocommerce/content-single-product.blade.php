@php 
global $product;
$product = wc_get_product(get_the_ID());
                    $productPrice = $product->get_price();
 $attachment_ids = $product->get_gallery_image_ids();
@endphp

<section class="productHeroSection">
	<div class="container container--1320">
		<div class="productHeroSection__imagesSliders">
			<div class="imagesSliders__horizontalSlider">
				<div class="splide horizontalSlider" role="group" aria-label="Splide Basic HTML Example">
					
					<div class="splide__track">
					  <ul class="splide__list">
						@if($attachment_ids)
						@foreach($attachment_ids as $attachment_id)
						<li class="splide__slide">
							<img src="{!! wp_get_attachment_url( $attachment_id ) !!}">
						  </li>
					  @endforeach
						@else
						<li class="splide__slide">
							<img src="https://motulinka.com/wp-content/uploads/2023/11/Group-5223.jpg">
						  </li>
						  <li class="splide__slide">
							<img src="https://motulinka.com/wp-content/uploads/2023/11/Group-5223.jpg">
						  </li>
						  <li class="splide__slide">
							<img src="https://motulinka.com/wp-content/uploads/2023/11/Group-5223.jpg">
						  </li>
						  <li class="splide__slide">
							<img src="https://motulinka.com/wp-content/uploads/2023/11/Group-5223.jpg">
						  </li>
						@endif
						
					  </ul>
					</div>
				  </div>
			</div>

			<div class="imagesSliders__verticalSlider">
				<div style="overflow: hidden;" class="splide verticalSlider" role="group" aria-label="Splide Basic HTML Example">
					@if ( $product->is_on_sale() )  
					<div class="promotionTag">Promocja</div>
					@endif
					@if(has_term( 270, 'product_cat' )) 
					<div class="newTag">
					  Nowość
					</div>

					
    @if(!$product->is_in_stock())
    <div class="outOfStockTag">
      Brak w magazynie
    </div>

    <style>
      .outOfStockTag {
        position: absolute;
        left: -38px;
        top: 30px;
        box-shadow: 0px 3px 12px 0px rgba(0,0,0,0.16);
        background-color: rgb(151, 24, 24);
        color: #fff;
    font-weight: 700;
    font-family: 'Lato';
    font-size: 11px;
    transform: rotate(-45deg);
    padding: 10px 30px;
    
    z-index: 99;
    text-transform: uppercase;
}
    </style>
    @endif

					{!! do_shortcode('[ti_wishlists_addtowishlist]') !!}
					@endif
				
					<div class="splide__track">
					  <ul class="splide__list">
						@if($attachment_ids)
						@foreach($attachment_ids as $attachment_id)
						<li class="splide__slide">
							<a data-lightbox="image-1"  href="{!! wp_get_attachment_url( $attachment_id ) !!}"><img src="{!! wp_get_attachment_url( $attachment_id ) !!}"></a>
						  </li>
					
					
					  @endforeach
						@else
						<li class="splide__slide">
							<a data-lightbox="image-1"  href="https://motulinka.com/wp-content/uploads/2023/11/Group-5223.jpg"><img src="https://motulinka.com/wp-content/uploads/2023/11/Group-5223.jpg"></a>
						  </li>
						  <li class="splide__slide">
							<a data-lightbox="image-1"  href="https://motulinka.com/wp-content/uploads/2023/11/Group-5223.jpg"><img src="https://motulinka.com/wp-content/uploads/2023/11/Group-5223.jpg"></a>
						  </li>
						  <li class="splide__slide">
							<a data-lightbox="image-1"  href="https://motulinka.com/wp-content/uploads/2023/11/Group-5223.jpg"><img src="https://motulinka.com/wp-content/uploads/2023/11/Group-5223.jpg"></a>
						  </li>
						  <li class="splide__slide">
							<a data-lightbox="image-1"  href="https://motulinka.com/wp-content/uploads/2023/11/Group-5223.jpg"><img src="https://motulinka.com/wp-content/uploads/2023/11/Group-5223.jpg"></a>
						  </li>
						@endif
						
					  </ul>
					</div>
				  </div>
			</div>
		</div>

		<style>
			.tinvwl-shortcode-add-to-cart {
				position: absolute;
    right: 20px;
    top: 20px;
    z-index: 11;
			}
			.tinvwl-shortcode-add-to-cart a {
				width: auto!important;
    height: auto!important;
			}
			.tinvwl-shortcode-add-to-cart img {
				max-width: 26px!important;
    min-width: 26px!important;
    max-height: unset!important;
    transition: transform .5s ease;
    width: 26px!important;
			}
			.newTag {
				position: absolute;
    z-index: 9;
    right: 0;
    top: 75px;
    height: 40px;
    width: 130px;
    background-color: #aeaeae;
    border-top-left-radius: 50px;
    border-bottom-left-radius: 50px;
    display: flex;
    justify-content: center;
    align-items: center;
    color: #fff;
    font-weight: 700;
    font-family: Lato;
    font-size: 14px;
    text-transform: uppercase;
			}
			.lightbox .lb-image {
				border: 4px solid #e2a269 !important;
				box-shadow: inset 0px 3px 12px 0px rgba(0,0,0,0.16) !important;
			}
			.lightboxOverlay
			{
				background: rgba( 0, 0, 0, 0.85 )!important;
box-shadow: 0 8px 32px 0 rgba( 31, 38, 135, 0.37 )!important;
backdrop-filter: blur( 11px )!important;
-webkit-backdrop-filter: blur( 11px )!important;
border-radius: 10px!important;
border: 1px solid rgba( 255, 255, 255, 0.18 )!important;
			}
			.lb-number {
				display: none !important;
			}
		</style>

		<script src="
		https://cdn.jsdelivr.net/npm/lightbox2@2.11.4/dist/js/lightbox.min.js
		"></script>
		<link href="
		https://cdn.jsdelivr.net/npm/lightbox2@2.11.4/dist/css/lightbox.min.css
		" rel="stylesheet">

		<div class="productHeroSection__metaHolder">
			<h4>{!! the_title() !!}</h4>
			@if($product->is_type('variable'))
			<span class="heroPrice">od {!! woocommerce_price($productPrice) !!}</span>
			@else 
			{!! woocommerce_price($productPrice) !!}
			@endif
			<script src="https://unpkg.com/slim-select@latest/dist/slimselect.min.js"></script>
    <link href="https://unpkg.com/slim-select@latest/dist/slimselect.css" rel="stylesheet">
			
	  
			@php
					do_action( 'woocommerce_single_product_summary' );


@endphp
<script>
	const mediaQuery = window.matchMedia('(min-width: 601px)')
</script>
<?php 

foreach( wc_get_attribute_taxonomies() as $values ) {
			?>
			<?php 
				$filterName = '#pa_'.$values->attribute_name;
			?>
			<script>


// Check if the media query is true
if (mediaQuery.matches) {
  
	new SlimSelect({
	  select: "<?php echo $filterName; ?>",
	  events: {
		afterChange: () => {
			document.querySelectorAll( 'table.variations select' )
                .forEach( function( select ) { 
					jQuery( select ).trigger( 'change' );
				})
    },
   
  },
	})
}


			</script>
			<?php

		}
?>



<style>
	.productHeroSection__metaHolder .variations_form select{
		width: 200px;
		font-family: 'Lato';
		font-size: 12px;
		outline: none;
		border: 1px solid #e2a26920 !important;
		font-weight: 400;
		height: 50px;
		box-shadow: 0px 3px 6px 0px rgba(0,0,0,0.16);
		border: none;
		padding-left: 10px;
		color: black !important;
		border-radius: 0px !important;
		background: white !important;
	}
	@media screen and (max-width: 600px) {
		.tabsProductSection .container .tabs.wc-tabs li a {
			font-size: 14px !important;
		}
	}
</style>
		</div>
	</div>
</section>


<section class="tabsProductSection">
	<div class="container container--1320">
		<?php
	/**
	 * Hook: woocommerce_after_single_product_summary.
	 *
	 * @hooked woocommerce_output_product_data_tabs - 10
	 * @hooked woocommerce_upsell_display - 15
	 * @hooked woocommerce_output_related_products - 20
	 */
	do_action( 'woocommerce_after_single_product_summary' );
	?>
	</div>
</section>







<section style="display: block !important;" id="homeMostBoughtSection">
	<div class="container">
	  <div class="sectionMeta">
		<h4>SPRAWDŹ PODOBNE PRODUKTY</h4>
		<p>Zobacz produkty, które moga Ci się przydać.</p>
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
			  'offset' => 20,
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
  
	  <a href="{!! site_url() !!}/shop" class="motulinkaBtn motulinkaBtn--rounded">Zobacz więcej produktów</a>
	</div>
  </section>