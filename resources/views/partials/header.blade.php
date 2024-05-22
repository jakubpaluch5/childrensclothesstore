<?php 

if(is_front_page()){ // visited has never been set, so set it and show the popup
?>
<div class="newsletterPopUpOverlay">

</div>
<div class="newsletterPopUp">
    <button class="newsletterPopUp__close" type="button">
        <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" viewBox="0 0 21 21">
            <path id="Icon_material-close" data-name="Icon material-close" d="M28.5,9.615,26.385,7.5,18,15.885,9.615,7.5,7.5,9.615,15.885,18,7.5,26.385,9.615,28.5,18,20.115,26.385,28.5,28.5,26.385,20.115,18Z" transform="translate(-7.5 -7.5)"/>
        </svg>          
    </button>
    <div class="newsletterPopUp__leftSide">
        <div class="leftSide__photo" style="background-image: url('https://motulinka.com/wp-content/uploads/2023/12/Image-2.jpg')"></div>
    </div>
    <div class="newsletterPopUp__rightSide">

        <h3>Bądź z nami na bieżąco!</h3>
        <h4>Chcesz otrzymać <span>5%</span> rabatu na pierwsze zamówienie?</h4>
        <h4>Zapisz się do naszego newslettera i otrzymuj informację o <span>nowościach</span>!</h4>
        {!! do_shortcode('[contact-form-7 id="bff0bb5" title="Newsletter PopUp"]') !!}
    </div>
</div>

<style>
    .swal2-container.swal2-backdrop-show, .swal2-container.swal2-noanimation {
        background: transparent !important;
        z-index: 999999999999999999999999999999999999;
    }
    .footer-newsletter-form p {
        display: flex;
        flex-flow: row;
        align-items: center;
    }
    .swal2-loader {
        border-color: #e2a269 transparent #e2a269 transparent !important;
    }
    .swal2-icon.swal2-error [class^=swal2-x-mark-line] {
        background-color: #E2A269 !important;
    }
    .swal2-icon.swal2-error {
        color: #E2A269 !important;
        border-color: #E2A269 !important;
    }
    .swal2-content {
        font-family: 'Lato';
        font-weight: 700;
        font-size: 16px;
        color: black;
    }
    .swal2-popup.swal2-modal {
        box-shadow: 0px 3px 6px 0px rgba(0,0,0,0.26);
    }
    .swal2-close {
        color: #E2A269 !important;
    }
    .swal2-timer-progress-bar {
        background: #e2a269 !important; 
    }
    .swal2-icon.swal2-success .swal2-success-ring {
        border: .25em solid #e2a269 !important;
    }
    .swal2-icon.swal2-success [class^=swal2-success-line] {
        background-color: #e2a269 !important; 
    }
    .newsletterPopUp__rightSide form input[type=submit] {
        background-color: #e2a269;
    border-top-right-radius: 30px;
    height: 61px;
    border: none;
    font-family: Lato;
    outline: none !important;
    color: #fff;
    width: 300px;
    font-size: 18px;
    font-weight: 400;
    cursor: pointer;
    transition: border-top-right-radius .3s ease;
    }
    .newsletterPopUp__rightSide form input[type=submit]:hover {
        border-top-right-radius: 0px;
    }
    .newsletterPopUp__rightSide form input[type=email]{
        background-color: #fff;
    border-bottom-left-radius: 30px;
    border: 2px solid #e2a269;
    height: 61px;
    padding-left: 50px;
    font-family: futura-pt,sans-serif;
    font-size: 20px;
    font-weight: 400;
    color: #000;
    width: 470px;
    box-sizing: border-box;
    transition: border-bottom-left-radius .5s ease;
    }
    .newsletterPopUp__rightSide form input[type=email][aria-invalid=true] {
        border-color: #E2A269 !important;
  
    }
    .newsletterPopUp__rightSide form input[type=email][aria-invalid=true]::placeholder {
        color: red !important;
    }
    .newsletterPopUp__rightSide form input[type=email]:focus {
        border-bottom-left-radius: 0px;
        outline: none;
    }
    .newsletterPopUp__rightSide .newsletterCheckbox .wpcf7-form-control-wrap {
        display: none;
    }
    .newsletterPopUp__rightSide .newsletterCheckbox label span{

        font-family: 'Lato';
        font-size: 14px;
        font-weight: 400;
        color: #000000;
    }
    .newsletterPopUp__rightSide .newsletterCheckbox input[type=checkbox] {
        display: none;
    }
    .newsletterPopUp__rightSide .newsletterCheckbox label span a {
        color: #E2A269;
        text-decoration: underline;
    }
    .newsletterPopUp__rightSide .newsletterCheckbox p {
        margin: 0;
        padding: 0;
    }
    .newsletterPopUp__rightSide .newsletterCheckbox label{
        position: relative;
        display: flex;
        flex-flow: row;
        gap: 12px;
        
    }
    .newsletterPopUp__rightSide .newsletterCheckbox label:before {
        border: 1px solid #B2B2B2;
        min-width: 24px;
        width: 24px;
        content: '';
        cursor: pointer;
        display: block;
        margin-top: -4px;
        max-width: 24px;
        min-height: 24px;
        max-height: 24px;
        transition: background 0.3s ease;
        height: 24px;
    }
    .newsletterPopUp__rightSide .newsletterCheckbox label.is-active:before {
        background: #E2A269;
    }
    .newsletterPopUp__rightSide h3 {
        color: #1A1A18;
        font-family: 'Lato';
        font-size: 30px;
        font-weight: 900;
    }
    .newsletterPopUp__rightSide h4 {
        color: #1A1A18;
        font-family: 'Lato';
        font-size: 24px;
        font-weight: 700;
    }
    .newsletterPopUp__rightSide h4 span {
        color: #E2A269;
    }
    .newsletterPopUp__rightSide {
        height: 100%;
        width: calc(100% - 541px);
        padding-left: 36px;
        padding-bottom: 50px;
        padding-right: 36px;

    }
    .newsletterPopUp__leftSide {
        width: 444px;
        display: flex;
        align-items: center;
        height: 100%;
    }
    .leftSide__photo {
        width: 541px;
        height: 550px;
        min-width: 541px;
        background-position: center;
        background-size: cover;
        min-height: 550px;
        box-shadow: 0px 3px 6px 0px rgba(0,0,0,0.16);
    }
    .newsletterPopUp__close {
        position: absolute;
        top: 30px;
        right: 30px;
        cursor: pointer;
        background: transparent;
        border: none;
    }
    .newsletterPopUp__close svg {
        display: block;
        transition: transform 0.3s ease;
    }
    .newsletterPopUp__close:hover svg {
        transform: rotate(15deg);
    }
    .newsletterPopUp {
        height: 506px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        width: 1411px;
        background: white;
        z-index: 9999999999999999999999;
        box-shadow: 0px 3px 6px 0px rgba(0,0,0,0.16);
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        position: fixed;
        top: 52%;
        transition: top 0.5s ease, opacity 0.5s ease;
        pointer-events: none;
        opacity: 0 !important;
    }
    .newsletterPopUp.is-active {
        opacity: 1 !important;
        pointer-events: all;
        top: 50%;
    }
    .newsletterPopUpOverlay {
        width: 100vw;
        height: 100vh;
        position: fixed;
        backdrop-filter: blur( 1px );
-webkit-backdrop-filter: blur( 1px );
        top: 0;
        z-index: 99999999999999999999;
        left:0;
        background-color: #5A5A5A62;
        transition: opacity 0.5s ease;
        pointer-events: none;
        opacity: 0 !important;
    }
    .newsletterPopUpOverlay.is-active {
        pointer-events: all;
        opacity: 1 !important;
    }

    @media screen and (max-width: 1600px) {
        .leftSide__photo {

            min-width: 450px;
            width: 450px;

        }
        .newsletterPopUp__rightSide {
            width: calc(100% - 450px);
        }
        .newsletterPopUp {
            width: 1250px;
        }
    }
    @media screen and (max-width: 1400px) {
        .newsletterPopUp__rightSide h3 {
            font-size: 25px;
            margin-bottom: 5px;
            padding-bottom: 5px;
        }
        .newsletterPopUp__rightSide h4 {
            font-size: 20px;
            margin-bottom: 5px;
            padding-bottom: 5px;
        }
        .newsletterPopUp {
            height: 460px;
        }
        .newsletterPopUpForm {
            margin-top: 15px;
        }
        .leftSide__photo {
            height: 500px;
            min-height: 500px;
            min-width: 400px;
    width: 400px;
    
        }
        .newsletterPopUp__leftSide {
            width: 400px;
        }
        .newsletterPopUp__rightSide {
            width: calc(100% - 395px)
        }
        .newsletterPopUp {
            width: 1100px;
        }
        .newsletterPopUp__rightSide form input[type=email] {
            width: 350px;
        }
    }
    @media screen and (max-width: 1200px) {
        .leftSide__photo {
            width: 100%;
            min-width: unset;
            min-height: unset;
            height: 100%;
        }
        .newsletterPopUp__leftSide {
            width: 30%;
        }
        .newsletterPopUp__rightSide {
            width: 70%;
        }
        .newsletterPopUp {
            width: 95%;
        }
        .newsletterPopUp__rightSide .newsletterCheckbox label span {
            font-size: 12px;
        }
    }
    @media screen and (max-width: 1000px) {
        .newsletterPopUp {
            height: auto;
            flex-flow: column;
        }
        .newsletterPopUp__rightSide {
            width: 100%;
            display: flex;
            flex-flow: column;
            align-items: center;
            text-align: center;
        }
        .wpcf7-spinner {
            display: none;
        }
        .newsletterPopUp__leftSide {
            width: 100%;
            padding-top: 50px;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .leftSide__photo {
            height: 300px;
            width: 40%;
        }
        .newsletterPopUp__rightSide h4 {
            margin: 0;
        }
        .newsletterPopUp__rightSide .newsletterCheckbox label span {
            text-align: left;
        }
        .footer-newsletter-form p {
            justify-content: center;
        }
    }
    @media screen and (max-width: 800px) {
        .leftSide__photo {
            height: 270px;
        }
        .newsletterPopUp__rightSide form input[type=email] {
            width: 100%;
            border-radius: unset !important;
        }
        .newsletterPopUp__rightSide form input[type=submit] {
            width: 100%;
            border-radius: unset !important;
        }
        .footer-newsletter-form p {
            flex-flow: column;
            gap: 10px;
        }
        .wpcf7-form-control-wrap {
            width: 100%;
        }
        .newsletterPopUp__rightSide h3 {
            font-size: 21px;
        }
        .newsletterPopUp__rightSide h4 {
            font-size: 14px;
        }
    }
    @media screen and (max-width: 600px) {
        .newsletterPopUp__rightSide form input[type=email] {
            height: 40px;

        }
        .newsletterPopUp__rightSide form input[type=submit] {
            height: 40px;
            font-size: 11px;
        }
        .newsletterPopUp__rightSide form input[type=email] {
            padding-left: 20px;
        }
        .newsletterPopUp__rightSide form input[type=email]::placeholder {
            font-size: 11px;
        }
        .newsletterPopUp__rightSide .newsletterCheckbox label span {
            font-size: 10px;
        }
        .newsletterPopUp__rightSide {
            padding-left: 15px;
            padding-right: 15px;
        }
        .newsletterPopUp__rightSide {
            padding-bottom: 10px;
        }
        .newsletterPopUp__leftSide {
            padding-top: 0px;
        }
        .leftSide__photo {
            width: 100%;
            box-shadow: unset !important;
            background-position: top;
            height: 141px;
        }
        .newsletterPopUp__close {
            top: 10px;
            right: 10px;
        }
        
    }
</style>

<script>


    if (document.cookie.indexOf("popupShown=true") == -1) {
    document.cookie = "popupShown=true; max-age=1209600"; // 86400: seconds in a day
        
    const closeNewsletterButton = document.querySelector('.newsletterPopUp__close')
    const popUpOverlay = document.querySelector('.newsletterPopUpOverlay');
    const popUpNewsletter = document.querySelector('.newsletterPopUp')

    setTimeout(function () {
        popUpOverlay.classList.add('is-active')
        
    }, 7000);
    setTimeout(function () {
        popUpNewsletter.classList.add('is-active')
        
    }, 7500);


    closeNewsletterButton.addEventListener('click', () => {
        popUpNewsletter.classList.remove('is-active')

        setTimeout(function () {
            popUpOverlay.classList.remove('is-active')
        
    }, 500);

    })


    popUpOverlay.addEventListener('click', () => {
        popUpNewsletter.classList.remove('is-active')

        setTimeout(function () {
            popUpOverlay.classList.remove('is-active')
        
    }, 500);

    })

    const fakeLabels = document.querySelectorAll('.newsletterPopUp__rightSide .newsletterCheckbox label')
    const fakeCheckboxes = document.querySelectorAll('.newsletterPopUp__rightSide .newsletterCheckbox input[type=checkbox]')
    for(let ff = 0; ff < fakeLabels.length; ff++) {
        fakeCheckboxes[ff].addEventListener('change', () => {
           fakeLabels[ff].classList.toggle('is-active')
        })
    }
}
    else {
    }



</script>

<? }?>




<div class="siteHeader">

    
    @if(get_woocommerce_currency() =='PLN')
    <div class="siteHeaderInfo">
        <div class="container">
            <span style="font-weight: 700;">DARMOWA DOSTAWA</span> na terenie całego kraju, przy zakupach za minimum 500 zł
        </div>
    </div>
    @endif

      

    <style>
        .siteHeaderInfo {
            font-size: 20px;
            position: absolute;
            height: 40px;
            width: 100%;
            display: flex;
            align-items: center;
            background-color: #e2a269;
            bottom: -40px;
            left: 0;
            text-align: center;
            color: white;
            transition: all 0.3s ease;
            overflow: hidden;
        }
        .siteHeader.stickyNavbar .siteHeaderInfo {
            opacity: 0;
            bottom: 0px;
            height: 0;
        }

        @media screen and (max-width: 800px) {
            .siteHeaderInfo {
                font-size: 13px;
            }
        }
        @media screen and (max-width: 600px) {
            .siteHeaderInfo {
                font-size: 10px;
            }
        }
    </style>
    <div class="container wrapper">
        <div class="siteHeader__navHolder">
            <button class="hamburger hamburger--vortex" type="button">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </button>
          
            <div class="mobileMenu">
                <div style="display: none !important;">{!! wp_nav_menu(array('menu' =>'header-menu', 'container' => '',)); !!}</div>
                {!! wp_nav_menu(array('menu' =>'mobile-menu', 'container' => '',)); !!}
                <div class="mobileMenuProductsBox">
                    <a href="#" class="motulinkaBtn motulinkaBtn--rounded">Wróć</a>
                    <div class="mobileMenuProductsBox__scrollbarArea">
                        <div class="scrollbarArea__highlightedCats">
                        @php 
                        $megaMenus = get_field('mega_menu_produktow', 'options');

                        $highlightedCatsy = $megaMenus['wyroznione_kategorie'];

                        @endphp
                          <a class="is-active" href="{!! site_url() !!}/produkt/bon-podarunkowy/">Bon podarunkowy</a>
           
                          @foreach($highlightedCatsy as $highlightedCata)
              
                         
                          
                          <a href="{!! $highlightedCata['wyrozniona_kategoria']['url'] !!}">{!! $highlightedCata['wyrozniona_kategoria']['title'] !!}</a>
                        
                          @endforeach
                        </div>
                    {!! wp_nav_menu(array('menu' =>'mega-menu-mobile', 'container' => '',)); !!}
                    </div>
                </div>
                <div class="mobileMenuCollectionsBox">
                    <a href="#" class="motulinkaBtn motulinkaBtn--rounded">Wróć</a>
                    <div class="mobileMenuCollectionsBox__scrollbarArea">
                        <ul class="sub-menu">
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
                        
                            <li><a href="{!! $collectionLink !!}">{!! the_title() !!}</a></li>
              
                        @php
                      endwhile;
                      wp_reset_postdata(); 
                        @endphp
                        </ul>
                    </div>
                </div>
            </div>
            <style>
                .mobileMenuProductsBox .motulinkaBtn--rounded {
                    margin-bottom: 15px !important;
                }
                .scrollbarArea__highlightedCats {
                    display: flex;
                    gap: 20px;
                    flex-flow: column;
                    padding-bottom: 10px;
                }
                .scrollbarArea__highlightedCats a {
                    color: #1a1a18;
    font-size: 24px !important;
    font-family: futura-pt,sans-serif;
    font-weight: 500;
    border-bottom: 1px solid gray;
    width: 100%;
    display: flex;
    font-style: normal;
    text-transform: uppercase;
    transition: color .3s ease;
    position: relative;
                }
                  #menu-item-32559 a::after {
                    position: absolute;
                    right: 20px;
                    top: 50%;
                    transform: translateY(-50%);
                    width: 22px;
                    background-size: contain;
                    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16.499' height='22.844' viewBox='0 0 16.499 22.844'%3E%3Cpath id='Icon_ionic-md-arrow-dropdown' data-name='Icon ionic-md-arrow-dropdown' d='M9,13.5,20.422,30,31.844,13.5Z' transform='translate(-13.5 31.844) rotate(-90)'/%3E%3C/svg%3E%0A");
                    background-position: center;
                    background-repeat: no-repeat;
                    height: 16px;
                    content: '';
                }
                #menu-item-32559 a {
                    position: relative;
                }
              
                 .mobileMenuCollectionsBox .motulinkaBtn--rounded:after {
                    display: none;
                    
                }
                .mobileMenuCollectionsBox .motulinkaBtn--rounded {
                    width: 160px !important;
                    padding-right: 0px !important;
                }
                .mobileMenu #menu-mobile-menu {
                    z-index: -2 !important;
                }
                .mobileMenuCollectionsBox__scrollbarArea {
                    height: 60vh;
                    width: 100%;
                    overflow-y: scroll;
                    
                }
                .mobileMenuCollectionsBox__scrollbarArea .sub-menu {
                    gap: 15px !important;
                    margin-top: 10px !important;
                }
                .mobileMenuCollectionsBox__scrollbarArea a {
                    font-size: 24px !important;
                }
                .mobileMenuCollectionsBox__scrollbarArea .sub-menu a {
                    font-size: 18px !important;
                }
                .mobileMenuCollectionsBox__scrollbarArea::-webkit-scrollbar {
  display: unset !important;
}
                .mobileMenuCollectionsBox {
                    position: fixed;
                    top: 0;
                    left: 0;
                    background-color: white;
                    z-index: 2;
                    width: 100vw;
                    height: 100vh;
                    padding-left: 30px;
                    padding-right: 30px;
                    display: none !important;
                    flex-flow: column;
                    justify-content: center;
                    align-items: center;
                }
            </style>
            <style>
                .mobileMenuProductsBox .motulinkaBtn--rounded:after {
                    display: none;
                    
                }
                .mobileMenuProductsBox .motulinkaBtn--rounded {
                    width: 160px !important;
                    padding-right: 0px !important;
                }
                .mobileMenu #menu-mobile-menu {
                    z-index: -2 !important;
                }
                .mobileMenuProductsBox__scrollbarArea {
                    height: 60vh;
                    width: 100%;
                    overflow-y: scroll;
                    
                }
                .mobileMenuProductsBox__scrollbarArea .sub-menu {
                    gap: 15px !important;
                    margin-top: 10px !important;
                }
                .mobileMenuProductsBox__scrollbarArea a {
                    font-size: 24px !important;
                }
                .mobileMenuProductsBox__scrollbarArea .sub-menu a {
                    font-size: 18px !important;
                }
                .mobileMenuProductsBox__scrollbarArea::-webkit-scrollbar {
  display: unset !important;
}
                .mobileMenuProductsBox {
                    position: fixed;
                    top: 0;
                    left: 0;
                    background-color: white;
                    z-index: 2;
                    width: 100vw;
                    height: 100vh;
                    padding-left: 30px;
                    padding-right: 30px;
                    display: none !important;
                    flex-flow: column;
                    justify-content: center;
                    align-items: center;
                }
         
                
                
                
            </style>
            <script>
                document.querySelector('.hamburger').addEventListener('click', () => {
                    document.body.classList.toggle('is-active')
                })
                document.querySelector('#menu-item-28938').addEventListener('click', () => {
                    document.querySelector('.mobileMenuProductsBox').style = 'display: flex !important;';
                })

                document.querySelector('#menu-item-32559').addEventListener('click', () => {
                    document.querySelector('.mobileMenuCollectionsBox').style = 'display: flex !important;';
                })

                document.querySelector('.mobileMenuProductsBox .motulinkaBtn').addEventListener('click', () => {
                    document.querySelector('.mobileMenuProductsBox').style = 'display: none !important;';
                })

                document.querySelector('.mobileMenuCollectionsBox .motulinkaBtn').addEventListener('click', () => {
                    document.querySelector('.mobileMenuCollectionsBox').style = 'display: none !important;';
                })
                
            </script>
            {!! wp_nav_menu(array('menu' =>'header-menu', 'container' => '',)); !!}
        </div>
        <div class="siteHeader__logoHolder">
            <a class="siteHeader__logo siteHeader__logo--beforeScroll" href="{!! site_url() !!}">
                <img src="{!! the_field('logo', 'options') !!}" alt="Motulinka - Sygnet Logo">
            </a>
            <a class="siteHeader__logo siteHeader__logo--afterScroll" href="{!! site_url() !!}">
                <img src="{!! the_field('logo_po_scrollu', 'options') !!}" alt="Motulinka - Napis Logo">
            </a>
        </div>
        <div class="siteHeader__functionalHolder wrapper">
            {!! do_shortcode('[fibosearch]') !!}
            {!! do_shortcode('[gtranslate]') !!}
            <div class="xoo-wsc-cart-trigger iconHolder">

                <img alt="Ikonka koszyka - otwórz koszyk"
                    src="<?= get_template_directory_uri(); ?>/assets/images/header/cart-icon.svg">
                <div class="cartCounter">
                    0

                </div>

            </div>
            {!! do_shortcode('[woocommerce_currency_switcher_drop_down_box]') !!}
            <div class="iconHolder iconHolder--wishlist">
                <a href="{!! site_url() !!}/wishlist"><img alt="Ikonka ulubionych - otwórz ulubione"
                        src="<?= get_template_directory_uri(); ?>/assets/images/header/wishlist-icon.svg"></a>
                <div class="wishListCounter">
                    {!! do_shortcode('[ti_wishlist_products_counter]') !!}
                </div>
            </div>
            <div class="iconHolder iconHolder--myaccount">
                <a href="{!! site_url() !!}/logowanie"><img alt="Ikonka moje konto - otwórz panel klienta"
                        src="<?= get_template_directory_uri(); ?>/assets/images/header/myaccount-icon.svg"></a>
            </div>
        </div>

        @include('partials.ProductsMegaMenu')
        @include('partials.CollectionsProductsMegaMenu')
    </div>

</div>

<div class="mobileBottomFunctionalBar">
    <a href="{!! site_url() !!}">
        <svg xmlns="http://www.w3.org/2000/svg" width="16.122" height="17.747" viewBox="0 0 16.122 17.747">
            <g id="Icon_feather-home" data-name="Icon feather-home" transform="translate(-3.75 -2.25)">
                <path id="Path_177" data-name="Path 177"
                    d="M4.5,8.686,11.811,3l7.311,5.686v8.936A1.625,1.625,0,0,1,17.5,19.247H6.125A1.625,1.625,0,0,1,4.5,17.622Z"
                    transform="translate(0 0)" fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round"
                    stroke-width="1.5" />
                <path id="Path_178" data-name="Path 178" d="M13.5,26.123V18h4.874v8.123"
                    transform="translate(-4.126 -6.877)" fill="none" stroke="#000" stroke-linecap="round"
                    stroke-linejoin="round" stroke-width="1.5" />
            </g>
        </svg>
    </a>
    {!! do_shortcode('[fibosearch]') !!}
    <div class="iconHolder iconHolder--wishlist">
        <a href="{!! site_url() !!}/wishlist"><img alt="Ikonka ulubionych - otwórz ulubione"
                src="<?= get_template_directory_uri(); ?>/assets/images/header/wishlist-icon.svg"></a>
        <div class="wishListCounter">
            {!! do_shortcode('[ti_wishlist_products_counter]') !!}
        </div>
    </div>
    <div class="xoo-wsc-cart-trigger iconHolder">

        <img alt="Ikonka koszyka - otwórz koszyk"
            src="<?= get_template_directory_uri(); ?>/assets/images/header/cart-icon.svg">
        <div class="cartCounter">
            0

        </div>

    </div>
    <a href="{!! site_url() !!}/logowanie"><img alt="Ikonka moje konto - otwórz panel klienta"
            src="<?= get_template_directory_uri(); ?>/assets/images/header/myaccount-icon.svg"></a>
</div>
</div>

    {{-- <script>
        document.querySelector('')
    </script> --}}

<style>
    .mobileBottomFunctionalBar img, .mobileBottomFunctionalBar svg {
        width: 24px;
    }
    .mobileBottomFunctionalBar {
        position: fixed;
        z-index: 999;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 50px;
        background: white;
        padding-left: 30px;
        padding-right: 30px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        box-shadow: 0px -3px 6px 0px rgba(0,0,0,0.08);
        display: none;
    }
    .mobileBottomFunctionalBar .wishListCounter a::before {
        display: none;
    }
    .wishlist_products_counter_text {
        display: none;
    }
    .mobileBottomFunctionalBar .wishListCounter {
        position: absolute;
    bottom: 2px;
    right: -6px;
    pointer-events: none;
    width: 19px;
    border: 1px solid #fff;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 19px;
    background-color: #e2a269;
    border-radius: 50px;
    font-family: futura-pt;
    font-weight: 500;
    font-size: 10px;
    color: #fff;
    }
    .mobileBottomFunctionalBar .iconHolder{
        position: relative;
    }
    .mobileBottomFunctionalBar .cartCounter {
        position: absolute;
    bottom: 2px;
    right: -12px;
    width: 19px;
    border: 1px solid #fff;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 19px;
    background-color: #e2a269;
    border-radius: 50px;
    font-family: futura-pt;
    font-weight: 500;
    font-size: 10px;
    color: #fff;
    }
    @media screen and (max-width: 700px) {
        .mobileBottomFunctionalBar {
            display: flex;
        }
    }
</style>

<script>
    document.querySelector('#dgwt-wcas-search-input-1').addEventListener('focus', () => {
        document.body.classList.add('is-active')
    })
    document.querySelector('#dgwt-wcas-search-input-1').addEventListener('focusout', () => {
        document.body.classList.remove('is-active')
    })
</script>

<style>
    body.is-active {
        width: 100vw !important;
        height: 100vh !important;
        overflow: hidden !important;
    }
</style>



<script>
    
	setTimeout(function () {
		// console.log(document.getElementsByTagName('html')[0].getAttribute('lang'))
		// document.getElementsByTagName('html')[0].getAttribute('lang');
        if(document.getElementsByTagName('html')[0].getAttribute('lang') == 'es' && document.getElementById('alg_currency_select').getElementsByTagName('option')[0].selected == true) {
            document.getElementById('alg_currency_select').getElementsByTagName('option')[1].selected = 'selected';
            setTimeout(function () {
                jQuery(document.querySelector('#alg_currency_select')).trigger('change');
            }, 2000);
        }
        if(document.getElementsByTagName('html')[0].getAttribute('lang') == 'en' && document.getElementById('alg_currency_select').getElementsByTagName('option')[0].selected == true) {
            document.getElementById('alg_currency_select').getElementsByTagName('option')[1].selected = 'selected';
            setTimeout(function () {
                jQuery(document.querySelector('#alg_currency_select')).trigger('change');
            }, 2000);
        }
        if(document.getElementsByTagName('html')[0].getAttribute('lang') == 'it' && document.getElementById('alg_currency_select').getElementsByTagName('option')[0].selected == true) {
            document.getElementById('alg_currency_select').getElementsByTagName('option')[1].selected = 'selected';
            setTimeout(function () {
                jQuery(document.querySelector('#alg_currency_select')).trigger('change');
            }, 2000);
        }
        if(document.getElementsByTagName('html')[0].getAttribute('lang') == 'de' && document.getElementById('alg_currency_select').getElementsByTagName('option')[0].selected == true) {
            document.getElementById('alg_currency_select').getElementsByTagName('option')[1].selected = 'selected';
            setTimeout(function () {
                jQuery(document.querySelector('#alg_currency_select')).trigger('change');
            }, 2000);
        }
        if(document.getElementsByTagName('html')[0].getAttribute('lang') == 'pl-PL' && document.getElementById('alg_currency_select').getElementsByTagName('option')[1].selected == true) {
            document.getElementById('alg_currency_select').getElementsByTagName('option')[0].selected = 'selected';
            setTimeout(function () {
                jQuery(document.querySelector('#alg_currency_select')).trigger('change');
            }, 2000);
        }
	}, 5000);




    setTimeout(function () {
        document.querySelector('a[data-gt-lang="it"]').addEventListener('click', () => {
            document.getElementById('alg_currency_select').getElementsByTagName('option')[1].selected =
                'selected';
            setTimeout(function () {
                jQuery(document.querySelector('#alg_currency_select')).trigger('change');
            }, 2000);



        })

        document.querySelector('a[data-gt-lang="de"]').addEventListener('click', () => {
            document.getElementById('alg_currency_select').getElementsByTagName('option')[1].selected =
                'selected';

            setTimeout(function () {
                jQuery(document.querySelector('#alg_currency_select')).trigger('change');
            }, 2000);
        })

        document.querySelector('a[data-gt-lang="en"]').addEventListener('click', () => {
            document.getElementById('alg_currency_select').getElementsByTagName('option')[1].selected =
                'selected';

            setTimeout(function () {
                jQuery(document.querySelector('#alg_currency_select')).trigger('change');
            }, 2000);
        })


        document.querySelector('a[data-gt-lang="es"]').addEventListener('click', () => {
            document.getElementById('alg_currency_select').getElementsByTagName('option')[1].selected =
                'selected';

            setTimeout(function () {
                jQuery(document.querySelector('#alg_currency_select')).trigger('change');
            }, 2000);
        })

        document.querySelector('a[data-gt-lang="pl"]').addEventListener('click', () => {
            document.getElementById('alg_currency_select').getElementsByTagName('option')[0].selected =
                'selected';

            setTimeout(function () {
                jQuery(document.querySelector('#alg_currency_select')).trigger('change');
            }, 2000);
        })
    }, 2000);
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
  document.querySelectorAll('.mobileMenuCollectionsBox__scrollbarArea'),
  (el) => new SimpleBar(el, { autoHide: false })
);
		  </script>
<style>
	.simplebar-track.simplebar-vertical .simplebar-scrollbar:before {
    background-color: #e2a269 !important;
	opacity: 1 !important;
	box-shadow: 0px 3px 6px 0px rgba(0,0,0,0.16) !important;
}

/* Hide scrollbar for Chrome, Safari and Opera */
.mobileMenuCollectionsBox__scrollbarArea::-webkit-scrollbar {
  display: none;
}

/* Hide scrollbar for IE, Edge and Firefox */
.mobileMenuCollectionsBox__scrollbarArea {
  -ms-overflow-style: none;  /* IE and Edge */
  scrollbar-width: none;  /* Firefox */
}
</style>



