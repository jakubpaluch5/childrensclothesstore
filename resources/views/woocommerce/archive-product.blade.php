@extends('layouts.app')

@section('content')


@if(is_product_category('nowosc'))

@php

$thumbnail_id = get_woocommerce_term_meta( 270, 'thumbnail_id', true );
$image = wp_get_attachment_url( $thumbnail_id );

@endphp
<section class="pageHeaderSection"
	style="background-image: url('{!! $image !!}')">
	<div class="container container--1320">
		<h1>Nowości</h1>
	</div>
</section>



<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;




?>


<section class="showProductsSection">
	<div  style="padding-bottom: 0px !important; margin-bottom: 0 !important;" class="container container--1320">
		<div class="orderBox">
			<div class="orderBox__selectedOption">
				<div class="selectedOption__text">
					Sortowanie
				</div>
				<div class="selectedOption__icon">
					<svg class="sOi__arrow" xmlns="http://www.w3.org/2000/svg" width="11.808" height="6.751"
						viewBox="0 0 11.808 6.751">
						<path id="Icon_ionic-ios-arrow-forward" data-name="Icon ionic-ios-arrow-forward"
							d="M15.963,12.1,11.494,7.633a.84.84,0,0,1,0-1.192.851.851,0,0,1,1.2,0L17.752,11.5a.842.842,0,0,1,.025,1.164l-5.084,5.094a.844.844,0,1,1-1.2-1.192Z"
							transform="translate(18.004 -11.246) rotate(90)" fill="#fff" />
					</svg>

				</div>
			</div>

			<div class="orderBox__optionsMenu">
				{{-- <div class="optionsMenu__option optionsMenu__option--alpha" onclick="document.location.href='?orderby=alphabetical'"> --}}
					<div class="optionsMenu__option optionsMenu__option--alpha" onclick="document.location.href='?orderby=czxczxczcx'">

					<div class="optionsMenuOption__text">
						Alfabetycznie A - Z
					</div>
					<div class="optionsMenuOption__icon">
						<svg xmlns="http://www.w3.org/2000/svg" width="13.608" height="13.608" viewBox="0 0 13.608 13.608">
							<path id="Icon_awesome-sort-alpha-down" data-name="Icon awesome-sort-alpha-down" d="M5.346,11.97H3.888V2.736A.486.486,0,0,0,3.4,2.25H2.43a.486.486,0,0,0-.486.486V11.97H.486a.486.486,0,0,0-.343.83l2.43,2.916a.486.486,0,0,0,.687,0L5.69,12.8A.487.487,0,0,0,5.346,11.97Zm7.29-1.944H8.748a.486.486,0,0,0-.486.486v.972a.486.486,0,0,0,.486.486h1.7L8.589,14.11a.972.972,0,0,0-.326.727v.536a.486.486,0,0,0,.486.486h3.888a.486.486,0,0,0,.486-.486V14.4a.486.486,0,0,0-.486-.486h-1.7l1.861-2.14a.972.972,0,0,0,.326-.727v-.536A.486.486,0,0,0,12.636,10.026Zm.943-2.593-1.8-4.86a.486.486,0,0,0-.458-.323H10.063a.486.486,0,0,0-.458.323L7.8,7.433a.486.486,0,0,0,.457.649h.754a.486.486,0,0,0,.463-.337l.134-.392H11.77l.134.392a.486.486,0,0,0,.464.337h.755a.486.486,0,0,0,.457-.649ZM10.194,5.652l.5-1.458.5,1.458Z" transform="translate(0 -2.25)" fill="#1a1a18"/>
						  </svg>								  
					</div>
				</div>
				<div class="optionsMenu__option optionsMenu__option--reverseaplha" onclick="document.location.href='?orderby=reverse_alpha'">
					<div class="optionsMenuOption__text">
						Alfabetycznie Z - A
					</div>
					<div class="optionsMenuOption__icon">
						<svg xmlns="http://www.w3.org/2000/svg" width="13.608" height="13.608" viewBox="0 0 13.608 13.608">
							<path id="Icon_awesome-sort-alpha-down-alt" data-name="Icon awesome-sort-alpha-down-alt" d="M5.346,11.97H3.888V2.736A.486.486,0,0,0,3.4,2.25H2.43a.486.486,0,0,0-.486.486V11.97H.486a.486.486,0,0,0-.343.83l2.43,2.916a.486.486,0,0,0,.687,0L5.69,12.8A.487.487,0,0,0,5.346,11.97Zm3.4-3.888h3.888a.486.486,0,0,0,.486-.486V6.624a.486.486,0,0,0-.486-.486h-1.7L12.8,4a.972.972,0,0,0,.326-.727V2.736a.486.486,0,0,0-.486-.486H8.748a.486.486,0,0,0-.486.486v.972a.486.486,0,0,0,.486.486h1.7L8.589,6.334a.972.972,0,0,0-.326.727V7.6A.486.486,0,0,0,8.748,8.082Zm4.832,7.127-1.8-4.86a.486.486,0,0,0-.458-.323H10.063a.486.486,0,0,0-.458.323l-1.8,4.86a.486.486,0,0,0,.457.649h.754a.486.486,0,0,0,.463-.337l.134-.392H11.77l.134.392a.486.486,0,0,0,.464.337h.755a.486.486,0,0,0,.457-.649Zm-3.385-1.781.5-1.458.5,1.458Z" transform="translate(0 -2.25)" fill="#1a1a18"/>
						  </svg>								  
					</div>
				</div>
				<div class="optionsMenu__option optionsMenu__option--pricedesc" onclick="document.location.href='?orderby=price-desc'">
					<div class="optionsMenuOption__text">
						Najdroższe
					</div>
					<div class="optionsMenuOption__icon">
						<svg xmlns="http://www.w3.org/2000/svg" width="13.608" height="8.748" viewBox="0 0 13.608 8.748">
							<path id="Icon_awesome-sort-amount-up" data-name="Icon awesome-sort-amount-up" d="M2.43,11.664H.486A.486.486,0,0,0,0,12.15v.972a.486.486,0,0,0,.486.486H2.43a.486.486,0,0,0,.486-.486V12.15A.486.486,0,0,0,2.43,11.664ZM6.318,3.888H.486A.486.486,0,0,0,0,4.374v.972a.486.486,0,0,0,.486.486H6.318A.486.486,0,0,0,6.8,5.346V4.374A.486.486,0,0,0,6.318,3.888ZM4.374,7.776H.486A.486.486,0,0,0,0,8.262v.972a.486.486,0,0,0,.486.486H4.374a.486.486,0,0,0,.486-.486V8.262A.486.486,0,0,0,4.374,7.776ZM8.262,0H.486A.486.486,0,0,0,0,.486v.972a.486.486,0,0,0,.486.486H8.262a.486.486,0,0,0,.486-.486V.486A.486.486,0,0,0,8.262,0Z" transform="translate(0 8.748) rotate(-90)" fill="#313131"/>
						  </svg>
						  
					</div>
				</div>
				<div class="optionsMenu__option optionsMenu__option--price" onclick="document.location.href='?orderby=price'">
					<div class="optionsMenuOption__text">
						Najtańsze
					</div>
					<div class="optionsMenuOption__icon">
						<svg xmlns="http://www.w3.org/2000/svg" width="13.608" height="8.748" viewBox="0 0 13.608 8.748">
							<path id="Icon_awesome-sort-amount-up-alt" data-name="Icon awesome-sort-amount-up-alt" d="M.486,1.944H2.43a.486.486,0,0,0,.486-.486V.486A.486.486,0,0,0,2.43,0H.486A.486.486,0,0,0,0,.486v.972A.486.486,0,0,0,.486,1.944Zm0,3.888H4.374a.486.486,0,0,0,.486-.486V4.374a.486.486,0,0,0-.486-.486H.486A.486.486,0,0,0,0,4.374v.972A.486.486,0,0,0,.486,5.832Zm7.776,5.832H.486A.486.486,0,0,0,0,12.15v.972a.486.486,0,0,0,.486.486H8.262a.486.486,0,0,0,.486-.486V12.15A.486.486,0,0,0,8.262,11.664ZM.486,9.72H6.318A.486.486,0,0,0,6.8,9.234V8.262a.486.486,0,0,0-.486-.486H.486A.486.486,0,0,0,0,8.262v.972A.486.486,0,0,0,.486,9.72Z" transform="translate(0 8.748) rotate(-90)" fill="#313131"/>
						  </svg>
						  
					</div>
				</div>
				<div class="optionsMenu__option optionsMenu__option--date" onclick="document.location.href='?orderby=date'">
					<div class="optionsMenuOption__text">
						Najnowsze
					</div>
					<div class="optionsMenuOption__icon">
						<svg xmlns="http://www.w3.org/2000/svg" width="11.598" height="10.769" viewBox="0 0 11.598 10.769">
							<path id="Icon_ionic-ios-star-outline" data-name="Icon ionic-ios-star-outline" d="M13.408,7.1H9.6L8.442,3.649a.419.419,0,0,0-.787,0L6.5,7.1H2.664a.415.415,0,0,0-.414.414.3.3,0,0,0,.008.07.4.4,0,0,0,.173.293l3.13,2.206-1.2,3.492a.415.415,0,0,0,.142.466.4.4,0,0,0,.233.1.508.508,0,0,0,.259-.093l3.055-2.177L11.1,14.051a.485.485,0,0,0,.259.093.372.372,0,0,0,.23-.1.41.41,0,0,0,.142-.466l-1.2-3.492,3.1-2.226.075-.065a.4.4,0,0,0-.305-.691ZM10.115,9.5a.727.727,0,0,0-.264.823l.779,2.27a.1.1,0,0,1-.158.119l-2-1.429a.723.723,0,0,0-.422-.135.71.71,0,0,0-.419.135l-2,1.426a.1.1,0,0,1-.158-.119l.779-2.27a.73.73,0,0,0-.267-.828l-2.1-1.478a.1.1,0,0,1,.06-.189H6.5a.724.724,0,0,0,.686-.494l.766-2.283a.1.1,0,0,1,.2,0l.766,2.283a.724.724,0,0,0,.686.494h2.519a.1.1,0,0,1,.06.186Z" transform="translate(-2.25 -3.375)" fill="#1a1a18"/>
						  </svg>
						  
					</div>
				</div>
			</div>
		</div>

		<script>
		
			document.querySelector('.orderBox__selectedOption').addEventListener('click', () => {
				document.querySelector('.orderBox').classList.toggle('is-open')
			})

			const queryString = window.location.search;
			if(queryString == '?orderby=alphabetical')
			{
				document.querySelector('.optionsMenu__option--alpha').classList.add('is-active')
				document.querySelector('.selectedOption__icon').innerHTML = document.querySelector('.optionsMenu__option--alpha .optionsMenuOption__icon').innerHTML;
			}
			else if(queryString == '?orderby=reverse_alpha') {
				document.querySelector('.optionsMenu__option--reverseaplha').classList.add('is-active')
				document.querySelector('.selectedOption__icon').innerHTML = document.querySelector('.optionsMenu__option--reverseaplha .optionsMenuOption__icon').innerHTML;
			}
			else if(queryString == '?orderby=price-desc') {
				document.querySelector('.optionsMenu__option--pricedesc').classList.add('is-active')
				document.querySelector('.selectedOption__icon').innerHTML = document.querySelector('.optionsMenu__option--pricedesc .optionsMenuOption__icon').innerHTML;
			}
			else if(queryString == '?orderby=price') {
				document.querySelector('.optionsMenu__option--price').classList.add('is-active')
				document.querySelector('.selectedOption__icon').innerHTML = document.querySelector('.optionsMenu__option--price .optionsMenuOption__icon').innerHTML;
			}
			else if(queryString == '?orderby=date') {
				document.querySelector('.optionsMenu__option--date').classList.add('is-active')
				document.querySelector('.selectedOption__icon').innerHTML = document.querySelector('.optionsMenu__option--date .optionsMenuOption__icon').innerHTML;
			}
		</script>

		<style>
			.woocommerce-ordering {
				display: none !important;
			}
			.orderBox {
				margin-left: auto;
				margin-bottom: 30px;
				z-index: 99;
				position: relative;
				width: 200px;
				box-shadow: 0px 2px 4px 0px rgba(0,0,0,0.12);
				
			}
			.orderBox__optionsMenu {
				position: absolute;
				z-index: 9999;
				top: 40px;
				box-shadow: 0px 2px 4px 0px rgba(0,0,0,0.12);

				background-color: white;
				width: 100%;
				display: flex;
				left: 0;
				flex-flow: column;
				
				max-height: 0;
				overflow: hidden;
				pointer-events: none;
				transition: all 0.3s ease;
			}
			.orderBox.is-open .orderBox__optionsMenu{
				max-height: 300px;
				pointer-events: all;
			}
			.sOi__arrow {
				transition: transform 0.3s ease;
			}
			.orderBox.is-open .sOi__arrow {
				transform: rotate(180deg);
			}
			.optionsMenu__option {
				display: flex;
				align-items: center;
				transition: all 0.2s ease;
				cursor: pointer;
			}

		
			.optionsMenuOption__icon {
				width: 55px;
				transition: all 0.2s ease;
				display: flex;
				justify-content: center;
				align-items: center;
				height: 40px;
			}
			.optionsMenuOption__text {
				width: calc(100% - 55px);
				height: 40px;
				font-family: 'Lato';
				font-size: 12px;
				display: flex;
				padding-left: 20px;
				justify-content: flex-start;
				align-items: center;
				font-weight: 400;
				color: #1A1A18;
				transition: all 0.2s ease;
			}
			.optionsMenu__option:hover {
				background: #e2a269;
			}
			.optionsMenu__option:hover .optionsMenuOption__text {
				color: white;
			}

			.optionsMenu__option.is-active {
				pointer-events: none;
			}
			
			.optionsMenu__option.is-active .optionsMenuOption__icon svg path{
				fill: #e2a269 !important;
			}
			.optionsMenu__option.is-active .optionsMenuOption__text {
				color: #e2a269;
			}

			.optionsMenu__option:hover .optionsMenuOption__icon svg path{
				fill: white !important;
			}

			.orderBox .orderBox__selectedOption {
				display: flex;
				width: 100%;
				flex-flow: row;
				align-items: center;
				cursor: pointer;
				height: 40px;
				position: relative;
				background: white;
				transition: opacity 0.3s ease;
			}
			.orderBox__selectedOption:hover {
				opacity: 0.8;
			}

			.selectedOption__text {
				width: calc(100% - 55px);
				display: flex;
				justify-content: center;
				text-transform: uppercase;
				align-items: center;
				font-family: 'Lato';
				font-size: 16px;
				font-weight: 700;

			}

			.selectedOption__icon {
				width: 55px;
				display: flex;
				align-items: center;
				justify-content: center;
				background: #e2a269;
				height: 40px;
			}
			.selectedOption__icon svg path {
				fill: white !important;
			}
		
		</style>

	</div>
	<div style="padding-top: 0px !important; margin-top: 0 !important;" class="container container--1320">
		

		<style>
			.showProductsSection {
				padding-top: 50px;
			}

			.woocommerce .products ul::after,
			.woocommerce .products ul::before,
			.woocommerce ul.products::after,
			.woocommerce ul.products::before {
				display: none;
			}

			.productBox .productBox__metaHolder h5 {
				font-family: 'Lato';
			}

			.showProductsSection .container .productsWrapper {
				width: 100%;
				justify-content: space-between;
			}

			.showProductsSection .container .productsWrapper .products .productBox {
				width: calc(25% - 45px);
			}

			@media screen and (max-width: 1100px) {
				.showProductsSection .container .productsWrapper .products .productBox {
					width: calc(33% - 45px);
				}

				.showProductsSection .container .productsWrapper .products {
					justify-content: space-between;
					column-gap: 0px;
				}
			}

			@media screen and (max-width: 800px) {
				.showProductsSection .container .productsWrapper .products .productBox {
					width: calc(50% - 20px);
				}

				.showProductsSection .container .productsWrapper .products {
					justify-content: space-between;
					column-gap: 0px;
				}
			}

			@media screen and (max-width: 500px) {
				.showProductsSection .container .productsWrapper .products .productBox {
					width: calc(100%);
				}
			}
		</style>

		<div class="productsWrapper">



			<?php
if ( woocommerce_product_loop() ) {

	/**
	 * Hook: woocommerce_before_shop_loop.
	 *
	 * @hooked woocommerce_output_all_notices - 10
	 * @hooked woocommerce_result_count - 20
	 * @hooked woocommerce_catalog_ordering - 30
	 */
	do_action( 'woocommerce_before_shop_loop' );

	woocommerce_product_loop_start();

	if ( wc_get_loop_prop( 'total' ) ) {
		while ( have_posts() ) {
			the_post();

			/**
			 * Hook: woocommerce_shop_loop.
			 */
			do_action( 'woocommerce_shop_loop' );

			?>
			@include('partials.productBox')
			<?php
		}
	}

	woocommerce_product_loop_end();

	/**
	 * Hook: woocommerce_after_shop_loop.
	 *
	 * @hooked woocommerce_pagination - 10
	 */
	do_action( 'woocommerce_after_shop_loop' );
} else {
	/**
	 * Hook: woocommerce_no_products_found.
	 *
	 * @hooked wc_no_products_found - 10
	 */
	do_action( 'woocommerce_no_products_found' );
}

/**
 * Hook: woocommerce_after_main_content.
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */
do_action( 'woocommerce_after_main_content' );

/**
 * Hook: woocommerce_sidebar.
 *
 * @hooked woocommerce_get_sidebar - 10
 */




?>
		</div>
	</div>
	








	@else




	<div class="container breadcrumbHolder container--woocommerce">
		<?php 		woocommerce_breadcrumb();
	 ?>
	</div>


	<?php
	/**
	 * The Template for displaying product archives, including the main shop page which is a post type archive
	 *
	 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
	 *
	 * HOWEVER, on occasion WooCommerce will need to update template files and you
	 * (the theme developer) will need to copy the new files to your theme to
	 * maintain compatibility. We try to do this as little as possible, but it does
	 * happen. When this occurs the version of the template file will be bumped and
	 * the readme will list any important changes.
	 *
	 * @see https://docs.woocommerce.com/document/template-structure/
	 * @package WooCommerce\Templates
	 * @version 3.4.0
	 */
	
	defined( 'ABSPATH' ) || exit;
	
	
	
	
	?>


	<section class="showProductsSection">
		<div class="container container--1320">




			<button class="filtersButton"><span class="ex">Rozwiń filtry</span><span class="sp">Zwiń
					filtry</span></button>
			<div class="filterSidebar">
				<div class="filterSidebar__categories filterSidebar__categories--cat">
					<h5>Kategorie <button class="expandCollapseButton expandCollapseButton--categories"><svg xmlns="http://www.w3.org/2000/svg" width="11.808" height="6.751" viewBox="0 0 11.808 6.751">
						<path id="Icon_ionic-ios-arrow-forward" data-name="Icon ionic-ios-arrow-forward" d="M15.963,12.1,11.494,7.633a.84.84,0,0,1,0-1.192.851.851,0,0,1,1.2,0L17.752,11.5a.842.842,0,0,1,.025,1.164l-5.084,5.094a.844.844,0,1,1-1.2-1.192Z" transform="translate(18.004 -11.246) rotate(90)" fill="#e2a269"/>
					  </svg>
					  
					  </button></h5>
					{!! do_shortcode('[br_filter_single filter_id=28668]') !!}
				</div>
				<div class="filterSidebar__categories filterSidebar__categories--coll">
					<h5>Kolekcje<button class="expandCollapseButton expandCollapseButton--coll"><svg xmlns="http://www.w3.org/2000/svg" width="11.808" height="6.751" viewBox="0 0 11.808 6.751">
						<path id="Icon_ionic-ios-arrow-forward" data-name="Icon ionic-ios-arrow-forward" d="M15.963,12.1,11.494,7.633a.84.84,0,0,1,0-1.192.851.851,0,0,1,1.2,0L17.752,11.5a.842.842,0,0,1,.025,1.164l-5.084,5.094a.844.844,0,1,1-1.2-1.192Z" transform="translate(18.004 -11.246) rotate(90)" fill="#e2a269"/>
					  </svg>
					  
					  </button></h5>
					{!! do_shortcode('[br_filter_single filter_id=28760]') !!}
				</div>
				<div class="filterSidebar__otherFilters">

					<h5>Filtry</h5>
					<div class="otherFilters__body">

						{!! do_shortcode('[br_filter_single filter_id=28669]') !!}

						{!! do_shortcode('[br_filter_single filter_id=28670]') !!}

						{!! do_shortcode('[br_filter_single filter_id=28671]') !!}
					</div>
				</div>
			</div>
			<script>
				document.querySelector('.expandCollapseButton--categories').addEventListener('click', () => {
					document.querySelector('.filterSidebar__categories--cat').classList.toggle('is-collapse')
				})
				document.querySelector('.expandCollapseButton--coll').addEventListener('click', () => {
					document.querySelector('.filterSidebar__categories--coll').classList.toggle('is-collapse')
				})
				
			</script>
			<link
			rel="stylesheet"
			href="https://unpkg.com/simplebar@latest/dist/simplebar.css"
		  />
		  <script src="https://unpkg.com/simplebar@latest/dist/simplebar.min.js"></script>
		  <!-- or -->
		  <link
			rel="stylesheet"
			href="https://cdn.jsdelivr.net/npm/simplebar@latest/dist/simplebar.css"
		  />
		  <script src="https://cdn.jsdelivr.net/npm/simplebar@latest/dist/simplebar.min.js"></script>
		  <script>
			Array.prototype.forEach.call(
  document.querySelectorAll('.otherFilters__body .bapf_ckbox .bapf_body'),
  (el) => new SimpleBar(el, { autoHide: false })
);
		  </script>
			<style>
				.bapf_sfilter ul li label{
					transition: opacity 0.3s ease;
				}
				.bapf_sfilter ul li label:hover {
					opacity: 0.7;
				}
				.simplebar-track.simplebar-vertical .simplebar-scrollbar:before {
    background-color: #e2a269 !important;
	opacity: 1 !important;
	box-shadow: 0px 3px 6px 0px rgba(0,0,0,0.16) !important;
}
				.otherFilters__body .bapf_ckbox .bapf_body {
					max-height: 170px;
					overflow-y: scroll;
				}
				.otherFilters__body .bapf_ckbox .bapf_body::-webkit-scrollbar {
					display: unset !important;
				}
				.filterSidebar h5 {
					position: relative;
					
				}
				.expandCollapseButton {
					width: 30px;
					height: 30px;
					border-radius: 50px;
					background-color: white;
					position: absolute;
					right: 20px;
					cursor: pointer;
					border: none;
					top: 50%;
					display: flex;
					justify-content: center;
					align-items: center;
					transition: all 0.3s ease;
					
					transform: translateY(-50%);
				}
				.expandCollapseButton:hover {
					opacity: 0.7;
				}
				.expandCollapseButton svg {
					transform: rotate(180deg);
					transition: all 0.3s ease;
				}
				.filterSidebar__categories.is-collapse .expandCollapseButton svg{
					transform: rotate(0) !important;
				}
				.filterSidebar__categories .berocket_single_filter_widget{
					transition: all 0.3s ease;
					overflow: hidden;
					max-height: 3000px;
				}
				.filterSidebar__categories.is-collapse .berocket_single_filter_widget{
					max-height: 0px;
				}
				.woocommerce-result-count {
					display: none !important;
				}
				.filtersButton {
					display: none;
				}

				@media screen and (max-width: 900px) {
					.filterSidebar {
						max-height: 0px;
						overflow: hidden;
						transition: max-height 0.5s ease;
					}

					.filterSidebar.is-active {
						max-height: 5000px;
					}

					.filtersButton {
						position: fixed;
						z-index: 999999;
						bottom: 80px;

						right: 20px;
						border-radius: 50px;
						background-color: #e2a269;
						border: none;
						width: 200px;
						height: 50px;
						box-shadow: 0px 3px 12px 0px rgba(0, 0, 0, 0.16);
						display: flex;
						justify-content: center;
						align-items: center;


					}

					.filtersButton span {
						font-family: 'Lato';
						font-size: 16px;
						font-weight: 400;
						color: white;
					}

					.filtersButton .sp {
						display: none;
					}

					.filtersButton.is-active .sp {
						display: block;
					}

					.filtersButton.is-active .ex {
						display: none;
					}
				}
			</style>
			<script>
				document.querySelector('.filtersButton').addEventListener('click', () => {
					document.querySelector('.filterSidebar').classList.toggle('is-active');
					document.querySelector('.filtersButton').classList.toggle('is-active')
				})
			</script>



			<div class="productsWrapper">
			


				<div class="orderBox">
					<div class="orderBox__selectedOption">
						<div class="selectedOption__text">
							Sortowanie
						</div>
						<div class="selectedOption__icon">
							<svg class="sOi__arrow" xmlns="http://www.w3.org/2000/svg" width="11.808" height="6.751"
								viewBox="0 0 11.808 6.751">
								<path id="Icon_ionic-ios-arrow-forward" data-name="Icon ionic-ios-arrow-forward"
									d="M15.963,12.1,11.494,7.633a.84.84,0,0,1,0-1.192.851.851,0,0,1,1.2,0L17.752,11.5a.842.842,0,0,1,.025,1.164l-5.084,5.094a.844.844,0,1,1-1.2-1.192Z"
									transform="translate(18.004 -11.246) rotate(90)" fill="#fff" />
							</svg>

						</div>
					</div>

					<div class="orderBox__optionsMenu">
						<div class="optionsMenu__option optionsMenu__option--alpha" onclick="alfabetycznie()">

							<script>
								function alfabetycznie() {
									const urlParams = new URLSearchParams(window.location.search);

								urlParams.set('orderby', 'alphabetical');

								window.location.search = urlParams;
								}
							</script>
							<div class="optionsMenuOption__text">
								Alfabetycznie A - Z
							</div>
							<div class="optionsMenuOption__icon">
								<svg xmlns="http://www.w3.org/2000/svg" width="13.608" height="13.608" viewBox="0 0 13.608 13.608">
									<path id="Icon_awesome-sort-alpha-down" data-name="Icon awesome-sort-alpha-down" d="M5.346,11.97H3.888V2.736A.486.486,0,0,0,3.4,2.25H2.43a.486.486,0,0,0-.486.486V11.97H.486a.486.486,0,0,0-.343.83l2.43,2.916a.486.486,0,0,0,.687,0L5.69,12.8A.487.487,0,0,0,5.346,11.97Zm7.29-1.944H8.748a.486.486,0,0,0-.486.486v.972a.486.486,0,0,0,.486.486h1.7L8.589,14.11a.972.972,0,0,0-.326.727v.536a.486.486,0,0,0,.486.486h3.888a.486.486,0,0,0,.486-.486V14.4a.486.486,0,0,0-.486-.486h-1.7l1.861-2.14a.972.972,0,0,0,.326-.727v-.536A.486.486,0,0,0,12.636,10.026Zm.943-2.593-1.8-4.86a.486.486,0,0,0-.458-.323H10.063a.486.486,0,0,0-.458.323L7.8,7.433a.486.486,0,0,0,.457.649h.754a.486.486,0,0,0,.463-.337l.134-.392H11.77l.134.392a.486.486,0,0,0,.464.337h.755a.486.486,0,0,0,.457-.649ZM10.194,5.652l.5-1.458.5,1.458Z" transform="translate(0 -2.25)" fill="#1a1a18"/>
								  </svg>								  
							</div>
						</div>
						<div class="optionsMenu__option optionsMenu__option--reverseaplha" onclick="alfabetycznieRev()">
							<div class="optionsMenuOption__text">
								Alfabetycznie Z - A
							</div>
							<div class="optionsMenuOption__icon">
								<svg xmlns="http://www.w3.org/2000/svg" width="13.608" height="13.608" viewBox="0 0 13.608 13.608">
									<path id="Icon_awesome-sort-alpha-down-alt" data-name="Icon awesome-sort-alpha-down-alt" d="M5.346,11.97H3.888V2.736A.486.486,0,0,0,3.4,2.25H2.43a.486.486,0,0,0-.486.486V11.97H.486a.486.486,0,0,0-.343.83l2.43,2.916a.486.486,0,0,0,.687,0L5.69,12.8A.487.487,0,0,0,5.346,11.97Zm3.4-3.888h3.888a.486.486,0,0,0,.486-.486V6.624a.486.486,0,0,0-.486-.486h-1.7L12.8,4a.972.972,0,0,0,.326-.727V2.736a.486.486,0,0,0-.486-.486H8.748a.486.486,0,0,0-.486.486v.972a.486.486,0,0,0,.486.486h1.7L8.589,6.334a.972.972,0,0,0-.326.727V7.6A.486.486,0,0,0,8.748,8.082Zm4.832,7.127-1.8-4.86a.486.486,0,0,0-.458-.323H10.063a.486.486,0,0,0-.458.323l-1.8,4.86a.486.486,0,0,0,.457.649h.754a.486.486,0,0,0,.463-.337l.134-.392H11.77l.134.392a.486.486,0,0,0,.464.337h.755a.486.486,0,0,0,.457-.649Zm-3.385-1.781.5-1.458.5,1.458Z" transform="translate(0 -2.25)" fill="#1a1a18"/>
								  </svg>								  
							</div>
						</div>
						<script>
							function alfabetycznieRev() {
								const urlParams = new URLSearchParams(window.location.search);

							urlParams.set('orderby', 'reverse_alpha');

							window.location.search = urlParams;
							}
						</script>
						<div class="optionsMenu__option optionsMenu__option--pricedesc" onclick="priceDesc()">
							<div class="optionsMenuOption__text">
								Najdroższe
							</div>
							<div class="optionsMenuOption__icon">
								<svg xmlns="http://www.w3.org/2000/svg" width="13.608" height="8.748" viewBox="0 0 13.608 8.748">
									<path id="Icon_awesome-sort-amount-up" data-name="Icon awesome-sort-amount-up" d="M2.43,11.664H.486A.486.486,0,0,0,0,12.15v.972a.486.486,0,0,0,.486.486H2.43a.486.486,0,0,0,.486-.486V12.15A.486.486,0,0,0,2.43,11.664ZM6.318,3.888H.486A.486.486,0,0,0,0,4.374v.972a.486.486,0,0,0,.486.486H6.318A.486.486,0,0,0,6.8,5.346V4.374A.486.486,0,0,0,6.318,3.888ZM4.374,7.776H.486A.486.486,0,0,0,0,8.262v.972a.486.486,0,0,0,.486.486H4.374a.486.486,0,0,0,.486-.486V8.262A.486.486,0,0,0,4.374,7.776ZM8.262,0H.486A.486.486,0,0,0,0,.486v.972a.486.486,0,0,0,.486.486H8.262a.486.486,0,0,0,.486-.486V.486A.486.486,0,0,0,8.262,0Z" transform="translate(0 8.748) rotate(-90)" fill="#313131"/>
								  </svg>
								  
							</div>
						</div>
						<script>
							function priceDesc() {
								const urlParams = new URLSearchParams(window.location.search);

							urlParams.set('orderby', 'price-desc');

							window.location.search = urlParams;
							}
						</script>
						<div class="optionsMenu__option optionsMenu__option--price" onclick="price()">
							<div class="optionsMenuOption__text">
								Najtańsze
							</div>
							<div class="optionsMenuOption__icon">
								<svg xmlns="http://www.w3.org/2000/svg" width="13.608" height="8.748" viewBox="0 0 13.608 8.748">
									<path id="Icon_awesome-sort-amount-up-alt" data-name="Icon awesome-sort-amount-up-alt" d="M.486,1.944H2.43a.486.486,0,0,0,.486-.486V.486A.486.486,0,0,0,2.43,0H.486A.486.486,0,0,0,0,.486v.972A.486.486,0,0,0,.486,1.944Zm0,3.888H4.374a.486.486,0,0,0,.486-.486V4.374a.486.486,0,0,0-.486-.486H.486A.486.486,0,0,0,0,4.374v.972A.486.486,0,0,0,.486,5.832Zm7.776,5.832H.486A.486.486,0,0,0,0,12.15v.972a.486.486,0,0,0,.486.486H8.262a.486.486,0,0,0,.486-.486V12.15A.486.486,0,0,0,8.262,11.664ZM.486,9.72H6.318A.486.486,0,0,0,6.8,9.234V8.262a.486.486,0,0,0-.486-.486H.486A.486.486,0,0,0,0,8.262v.972A.486.486,0,0,0,.486,9.72Z" transform="translate(0 8.748) rotate(-90)" fill="#313131"/>
								  </svg>
								  
							</div>
						</div>
						<script>
							function price() {
								const urlParams = new URLSearchParams(window.location.search);

							urlParams.set('orderby', 'price');

							window.location.search = urlParams;
							}
						</script>
						<div class="optionsMenu__option optionsMenu__option--date" onclick="date()">
							<div class="optionsMenuOption__text">
								Najnowsze
							</div>
							<div class="optionsMenuOption__icon">
								<svg xmlns="http://www.w3.org/2000/svg" width="11.598" height="10.769" viewBox="0 0 11.598 10.769">
									<path id="Icon_ionic-ios-star-outline" data-name="Icon ionic-ios-star-outline" d="M13.408,7.1H9.6L8.442,3.649a.419.419,0,0,0-.787,0L6.5,7.1H2.664a.415.415,0,0,0-.414.414.3.3,0,0,0,.008.07.4.4,0,0,0,.173.293l3.13,2.206-1.2,3.492a.415.415,0,0,0,.142.466.4.4,0,0,0,.233.1.508.508,0,0,0,.259-.093l3.055-2.177L11.1,14.051a.485.485,0,0,0,.259.093.372.372,0,0,0,.23-.1.41.41,0,0,0,.142-.466l-1.2-3.492,3.1-2.226.075-.065a.4.4,0,0,0-.305-.691ZM10.115,9.5a.727.727,0,0,0-.264.823l.779,2.27a.1.1,0,0,1-.158.119l-2-1.429a.723.723,0,0,0-.422-.135.71.71,0,0,0-.419.135l-2,1.426a.1.1,0,0,1-.158-.119l.779-2.27a.73.73,0,0,0-.267-.828l-2.1-1.478a.1.1,0,0,1,.06-.189H6.5a.724.724,0,0,0,.686-.494l.766-2.283a.1.1,0,0,1,.2,0l.766,2.283a.724.724,0,0,0,.686.494h2.519a.1.1,0,0,1,.06.186Z" transform="translate(-2.25 -3.375)" fill="#1a1a18"/>
								  </svg>
								  
							</div>
						</div>
						<script>
							function date() {
								const urlParams = new URLSearchParams(window.location.search);

							urlParams.set('orderby', 'date');

							window.location.search = urlParams;
							}
						</script>
					</div>
				</div>

				<script>
				
					document.querySelector('.orderBox__selectedOption').addEventListener('click', () => {
						document.querySelector('.orderBox').classList.toggle('is-open')
					})

					const queryString = window.location.search;
				
					const url = new URL(window.location.href);

const page = url.searchParams.get('orderby');
					if(page == 'alphabetical')
					{
						document.querySelector('.optionsMenu__option--alpha').classList.add('is-active')
						document.querySelector('.selectedOption__icon').innerHTML = document.querySelector('.optionsMenu__option--alpha .optionsMenuOption__icon').innerHTML;
					}
					else if(page == 'reverse_alpha') {
					
						document.querySelector('.optionsMenu__option--reverseaplha').classList.add('is-active')
						document.querySelector('.selectedOption__icon').innerHTML = document.querySelector('.optionsMenu__option--reverseaplha .optionsMenuOption__icon').innerHTML;
					}
					else if(page == 'price-desc') {
						document.querySelector('.optionsMenu__option--pricedesc').classList.add('is-active')
						document.querySelector('.selectedOption__icon').innerHTML = document.querySelector('.optionsMenu__option--pricedesc .optionsMenuOption__icon').innerHTML;
					}
					else if(page == 'price') {
						document.querySelector('.optionsMenu__option--price').classList.add('is-active')
						document.querySelector('.selectedOption__icon').innerHTML = document.querySelector('.optionsMenu__option--price .optionsMenuOption__icon').innerHTML;
					}
					else if(page == 'date') {
						document.querySelector('.optionsMenu__option--date').classList.add('is-active')
						document.querySelector('.selectedOption__icon').innerHTML = document.querySelector('.optionsMenu__option--date .optionsMenuOption__icon').innerHTML;
					}
				</script>

				<style>
					.woocommerce-ordering {
						display: none !important;
					}
					.orderBox {
						margin-left: auto;
						margin-bottom: 30px;
						z-index: 99;
						position: relative;
						width: 200px;
						box-shadow: 0px 2px 4px 0px rgba(0,0,0,0.12);
						
					}
					.orderBox__optionsMenu {
						position: absolute;
						z-index: 9999;
						top: 40px;
						box-shadow: 0px 2px 4px 0px rgba(0,0,0,0.12);

						background-color: white;
						width: 100%;
						display: flex;
						left: 0;
						flex-flow: column;
						
						max-height: 0;
						overflow: hidden;
						pointer-events: none;
						transition: all 0.3s ease;
					}
					.orderBox.is-open .orderBox__optionsMenu{
						max-height: 300px;
						pointer-events: all;
					}
					.sOi__arrow {
						transition: transform 0.3s ease;
					}
					.orderBox.is-open .sOi__arrow {
						transform: rotate(180deg);
					}
					.optionsMenu__option {
						display: flex;
						align-items: center;
						transition: all 0.2s ease;
						cursor: pointer;
					}

				
					.optionsMenuOption__icon {
						width: 55px;
						transition: all 0.2s ease;
						display: flex;
						justify-content: center;
						align-items: center;
						height: 40px;
					}
					.optionsMenuOption__text {
						width: calc(100% - 55px);
						height: 40px;
						font-family: 'Lato';
						font-size: 12px;
						display: flex;
						padding-left: 20px;
						justify-content: flex-start;
						align-items: center;
						font-weight: 400;
						color: #1A1A18;
						transition: all 0.2s ease;
					}
					.optionsMenu__option:hover {
						background: #e2a269;
					}
					.optionsMenu__option:hover .optionsMenuOption__text {
						color: white;
					}

					.optionsMenu__option.is-active {
						pointer-events: none;
					}
					
					.optionsMenu__option.is-active .optionsMenuOption__icon svg path{
						fill: #e2a269 !important;
					}
					.optionsMenu__option.is-active .optionsMenuOption__text {
						color: #e2a269;
					}

					.optionsMenu__option:hover .optionsMenuOption__icon svg path{
						fill: white !important;
					}

					.orderBox .orderBox__selectedOption {
						display: flex;
						width: 100%;
						flex-flow: row;
						align-items: center;
						cursor: pointer;
						height: 40px;
						position: relative;
						background: white;
						transition: opacity 0.3s ease;
					}
					.orderBox__selectedOption:hover {
						opacity: 0.8;
					}

					.selectedOption__text {
						width: calc(100% - 55px);
						display: flex;
						justify-content: center;
						text-transform: uppercase;
						align-items: center;
						font-family: 'Lato';
						font-size: 16px;
						font-weight: 700;

					}

					.selectedOption__icon {
						width: 55px;
						display: flex;
						align-items: center;
						justify-content: center;
						background: #e2a269;
						height: 40px;
					}
					.selectedOption__icon svg path {
						fill: white !important;
					}
				
				</style>


				<?php
	if ( woocommerce_product_loop() ) {
	
		/**
		 * Hook: woocommerce_before_shop_loop.
		 *
		 * @hooked woocommerce_output_all_notices - 10
		 * @hooked woocommerce_result_count - 20
		 * @hooked woocommerce_catalog_ordering - 30
		 */
		do_action( 'woocommerce_before_shop_loop' );
	
		woocommerce_product_loop_start();
	
		if ( wc_get_loop_prop( 'total' ) ) {
			while ( have_posts() ) {
				the_post();
	
				/**
				 * Hook: woocommerce_shop_loop.
				 */
				do_action( 'woocommerce_shop_loop' );
	
				?>
				@include('partials.productBox')
				<?php
			}
		}
	
		woocommerce_product_loop_end();
	
		/**
		 * Hook: woocommerce_after_shop_loop.
		 *
		 * @hooked woocommerce_pagination - 10
		 */
		do_action( 'woocommerce_after_shop_loop' );
	} else {
		/**
		 * Hook: woocommerce_no_products_found.
		 *
		 * @hooked wc_no_products_found - 10
		 */
		do_action( 'woocommerce_no_products_found' );
	}
	
	/**
	 * Hook: woocommerce_after_main_content.
	 *
	 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
	 */
	do_action( 'woocommerce_after_main_content' );
	
	/**
	 * Hook: woocommerce_sidebar.
	 *
	 * @hooked woocommerce_get_sidebar - 10
	 */
	
	
	
	
	?>
			</div>
		</div>
		

		@endif

		@endsection