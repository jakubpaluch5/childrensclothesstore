@php 

$megaMenu = get_field('mega_menu_produktow', 'options');
$highlightedCats = $megaMenu['wyroznione_kategorie'];
$restMainCats = $megaMenu['reszta_glownych_kategorii'];
@endphp

<div class="megaMenu megaMenu--products">
  <div class="megaMenu__content">
        <div class="megaMenuContent__highlightedCategoriesHolder">
            <a class="is-active" href="{!! site_url() !!}/produkt/bon-podarunkowy/">Bon podarunkowy</a>
           
            @foreach($highlightedCats as $highlightedCat)

           
            
            <a href="{!! $highlightedCat['wyrozniona_kategoria']['url'] !!}">{!! $highlightedCat['wyrozniona_kategoria']['title'] !!}</a>
          
            @endforeach
        </div>

        <div class="megaMenuContent__categories">
          {!! wp_nav_menu(array('menu' =>'mega-menu', 'container' => '',)); !!}
        </div>


  </div>
  <div class="megaMenu__productsColumn megaMenu__productsColumn-hc is-active">
    <p class="productsColumn__title">Bon podarunkowy</p>
    @php
    $args = array(
    'post_type' => 'product',
    'posts_per_page' => 1,
    'post__in' => array(17965),
    );
    $loop = new WP_Query( $args );
    while ( $loop->have_posts() ) : $loop->the_post();
    @endphp
    @include('partials.productBox')
    @php
    endwhile;
    wp_reset_postdata();
    @endphp
  </div>
  @foreach($highlightedCats as $highlightedCat)
  <div class="megaMenu__productsColumn megaMenu__productsColumn-hc">
    <p class="productsColumn__title">Polecamy</p>
    @php
    $args = array(
    'post_type' => 'product',
    'posts_per_page' => 1,
    'post__in' => array($highlightedCat['polecany_produkt_kategorii']),
  
    );
    $loop = new WP_Query( $args );
    while ( $loop->have_posts() ) : $loop->the_post();
    @endphp
    @include('partials.productBox')
    @php
    endwhile;
    wp_reset_postdata();
    @endphp
    <p class="productsColumn__title">Wyprzedaż</p>
    @php
    $args = array(
    'post_type' => 'product',
    'posts_per_page' => 1,
    'post__in' => array($highlightedCat['produkt_na_wyprzedazy']),  
  );
    $loop = new WP_Query( $args );
    while ( $loop->have_posts() ) : $loop->the_post();
    @endphp
    @include('partials.productBox')
    @php
    endwhile;
    wp_reset_postdata();
    @endphp
  </div>
  @endforeach

  @foreach($restMainCats as $restMainCat)
  <div class="megaMenu__productsColumn megaMenu__productsColumn--restCats">
    <p class="productsColumn__title">Polecamy</p>
    @php
    $args = array(
    'post_type' => 'product',
    'posts_per_page' => 1,
    'post__in' => array($restMainCat['polecany_produkt_kategorii']),
  
    );
    $loop = new WP_Query( $args );
    while ( $loop->have_posts() ) : $loop->the_post();
    @endphp
    @include('partials.productBox')
    @php
    endwhile;
    wp_reset_postdata();
    @endphp
    <p class="productsColumn__title">Wyprzedaż</p>
    @php
    $args = array(
    'post_type' => 'product',
    'posts_per_page' => 1,
    'post__in' => array($restMainCat['produkt_na_wyprzedazy']),  
  );
    $loop = new WP_Query( $args );
    while ( $loop->have_posts() ) : $loop->the_post();
    @endphp
    @include('partials.productBox')
    @php
    endwhile;
    wp_reset_postdata();
    @endphp
  </div>
  @endforeach




  <script>
    const newHightlightedCats = document.querySelectorAll('.megaMenuContent__highlightedCategoriesHolder a')

    const restCats = document.querySelectorAll('.megaMenuContent__categories .menu-item-has-children > a')
    const restCatProducts = document.querySelectorAll('.megaMenu__productsColumn--restCats')
    const highlightedCatProducts = document.querySelectorAll('.megaMenu__productsColumn-hc')
  
  for(let a = 0; a < newHightlightedCats.length; a++) {
    newHightlightedCats[a].addEventListener('mouseenter', () => {
      for(let ao = 0; ao < restCats.length; ao++) {
        restCats[ao].classList.remove('is-active')
        restCatProducts[ao].classList.remove('is-active')
      }
    })
  }
   
    for(let f = 0; f < restCats.length; f++) {
      restCats[f].addEventListener('mouseenter', () => {
        for(let fas = 0; fas < newHightlightedCats.length; fas++) {
          newHightlightedCats[fas].classList.remove('is-active')
          highlightedCatProducts[fas].classList.remove('is-active')
        }
        for(let fa = 0; fa < restCats.length; fa++) {
          restCats[fa].classList.remove('is-active')
          restCatProducts[fa].classList.remove('is-active')
        }
        restCats[f].classList.add('is-active')
        restCatProducts[f].classList.add('is-active')
      })
    }
	  const mobileHasChilderLi = document.querySelectorAll('.mobileMenu .menu-item-has-children');
	  const mobileHasChilderSubMenu = document.querySelectorAll('.mobileMenu .menu-item-has-children .sub-menu');
	 
	  setTimeout(function () {
        for(let ksa = 0; ksa < mobileHasChilderLi.length; ksa++) {
			 const liArrows = document.createElement('div')
			 liArrows.classList.add('liArrow')
			mobileHasChilderLi[ksa].appendChild(liArrows)
			liArrows.addEventListener('click', () => {
				mobileHasChilderSubMenu[ksa].classList.toggle('is-active')
				liArrows.classList.toggle('is-active')
			})
		}
    }, 1000);
  </script>

  <style>
    .megaMenuContent__categories .menu-item-has-children a.is-active {
      color: #E2A269 !important; 
    }
  </style>

</div>


