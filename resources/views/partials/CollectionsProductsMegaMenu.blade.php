@php 
$collectionsGroup = get_field('mega_menu_kolekcji', 'options');
$collectionsAuthorCollections = $collectionsGroup['autorskie_kolekcje'];
$collectionsRestCollections = $collectionsGroup['reszta_kolekcji'];

@endphp

<div class="collectionsmegaMenu collectionsmegaMenu--products">
  <div class="collectionsmegaMenu__content">
    <h4>Autorskie kolekcje</h4>
        <div class="collectionsmegaMenuContent__highlightedCategoriesHolder">
           @php 
           $authorWalker = 1;
           @endphp
            @foreach($collectionsAuthorCollections as $collectionsAuthorCollection)

           
            
            <a class="collectionsMegaMenuLink 
            @if($authorWalker == 1) 
            is-active
             @endif
             "
             href="{!! $collectionsAuthorCollection['url_kolekcji'] !!}">{!! $collectionsAuthorCollection['nazwa_kolekcji'] !!}</a>
            @php 
            $authorWalker++;
            @endphp
            @endforeach
        </div>

        <div class="collectionsmegaMenuContent__categories">
            <h4>Pozostałe kolekcje</h4>
            <div class="restCollectionsHolder">
            @foreach($collectionsRestCollections as $collectionsRestCollection)

           
            <div class="restCollectionsLink">
            <a class="collectionsMegaMenuLink" href="{!! $collectionsRestCollection['url_kolekcji'] !!}">{!! $collectionsRestCollection['nazwa_kolekcji'] !!}</a>
        </div>
            @endforeach
        </div>
        </div>


  </div>
  @php 
           $authorWalkerColumn = 1;
           @endphp
@foreach($collectionsAuthorCollections as $collectionsAuthorCollection)

  <div class="collectionsmegaMenu__productsColumn
  @if($authorWalkerColumn == 1) 
  is-active
   @endif
  ">
    <div class="collectionsColumn__desc">
    <h5>Kolekcja</h5>
    <strong>{!! $collectionsAuthorCollection['nazwa_kolekcji'] !!}</strong>
    <p>{!! $collectionsAuthorCollection['opis_kolekcji'] !!}</p>
  </div>
  <img class="collectionsColumn__image" src="{!! $collectionsAuthorCollection['zdjecie_kolekcji'] !!}" alt="{!! $collectionsAuthorCollection['nazwa_kolekcji'] !!} - Zdjęcie kolekcji">
  </div>
  @php 
  $authorWalkerColumn++;
  @endphp
  @endforeach
  @foreach($collectionsRestCollections as $collectionsRestCollection)
  <div class="collectionsmegaMenu__productsColumn">
    <div class="collectionsColumn__desc">
    <h5>Kolekcja</h5>
    <strong>{!! $collectionsRestCollection['nazwa_kolekcji'] !!}</strong>
    <p>{!! $collectionsRestCollection['opis_kolekcji'] !!}</p>
  </div>
  <img class="collectionsColumn__image" src="{!! $collectionsRestCollection['zdjecie_kolekcji'] !!}" alt="{!! $collectionsRestCollection['nazwa_kolekcji'] !!} - Zdjęcie kolekcji">
  </div>
  @endforeach

</div>

<script>
    const collectionsMegaMenuLinks = document.querySelectorAll('.collectionsMegaMenuLink')
    const collectionsDescColumn = document.querySelectorAll('.collectionsmegaMenu__productsColumn')
    for(let q = 0; q < collectionsMegaMenuLinks.length; q++) {
        collectionsMegaMenuLinks[q].addEventListener('mouseenter', () => {
            for(let qa = 0; qa < collectionsDescColumn.length; qa++) {
                collectionsDescColumn[qa].classList.remove('is-active')
                collectionsMegaMenuLinks[qa].classList.remove('is-active')
            }
            collectionsDescColumn[q].classList.add('is-active')
            collectionsMegaMenuLinks[q].classList.add('is-active')
        })
    }



    document.querySelector('#menu-header-menu-1 .menu-item-28557').addEventListener('mouseenter', () => {
   
   document.querySelector('.collectionsmegaMenu').classList.add('is-active')
 })
 document.querySelector('.collectionsmegaMenu').addEventListener('mouseleave', () => {
   document.querySelector('.collectionsmegaMenu').classList.remove('is-active')
 })


</script>


<style>
    .collectionsMegaMenuLink.is-active {
        color: #E2A269 !important;
    }
    .collectionsColumn__desc strong {
        color: #E2A269;
        font-family: 'Lato';
        font-size: 16px;
        text-align: center;
        display: block;
        width: 100%;
        font-weight: 900;
        text-transform: uppercase;
    }
    .collectionsColumn__desc h5 {
        text-align: center;
        color: #1A1A18;
        font-family: 'Lato';
        font-size: 22px;
        text-transform: uppercase;
        font-weight: 900;
    }
    .collectionsmegaMenu__productsColumn {
        position: relative;
        display: flex;
        flex-flow: column;
        justify-content: space-between;
    }
    img.collectionsColumn__image {
        max-height: 272px !important;
        display: block;
        margin-top: 50px;
        max-width: 221px !important;
        box-shadow: 0px 3px 6px 0px rgba(0,0,0,0.18);
    }
    .collectionsColumn__desc p {
        font-family: 'Lato';
        font-size: 11px;
        margin-top: 30px;
        font-weight: 400;
    }
    .collectionsmegaMenuContent__highlightedCategoriesHolder a {
        font-size: 12px !important;
        font-weight: 900;
        font-family: 'Lato';
        color: #1A1A18;
        text-transform: uppercase;
        transition: all 0.3s ease;
    }
    .collectionsmegaMenuContent__highlightedCategoriesHolder a:hover {
        color: #E2A269 !important;
    }
    .collectionsmegaMenu__content h4 {
        font-family: 'Lato';
        font-size: 22px;
        font-weight: 900;
        color: #6E6E6E;
        text-transform: uppercase;
    }
    .collectionsmegaMenuContent__categories h4 {
        font-family: 'Lato';
        font-size: 22px;
        font-weight: 900;
        color: #6E6E6E;
        text-transform: uppercase;
    }
    .restCollectionsHolder {
        display: flex;
        flex-flow: row wrap;
        justify-content: space-between;

    }
    .restCollectionsHolder a{
        text-transform: uppercase;
        display: block;
        font-family: 'Lato';
        font-size: 14px !important;
        width: fit-content;
        font-weight: 900;
        transition: all 0.3s ease;
        color: #1A1A18;
    }
    .restCollectionsHolder a:hover {
        color: #E2A269;
    }
    .restCollectionsLink {
        margin-bottom: 40px;
        width: calc(19%);
    }
    .collectionsmegaMenu {
	 position: absolute;
	 left: 0;
	 top: 155px;
	 background-color: white;
	 box-shadow: 0px 0px 6px 0px rgba(0, 0, 0, 0.16);
	 display: flex;
	 z-index: 99;
	 flex-flow: row;
	 width: 100%;
	 transition: all 0.5s ease;
	 opacity: 0;
	 pointer-events: none;
}
 .collectionsmegaMenu:after {
	 width: 100px;
	 height: 100px;
	 content: '';
	 z-index: -1;
	 position: absolute;
     background-color: transparent;
	 top: -100px;
	 left: 230px;
}
 .collectionsmegaMenu.is-active {
	 pointer-events: all;
	 opacity: 1;
}
 @media screen and (max-width: 1300px) {
	 .collectionsmegaMenu {
		 display: none;
	}
}
 .collectionsmegaMenu .collectionsmegaMenu__content {
	 width: calc(100% - 285px);
	 padding-left: 30px;
	 padding-right: 30px;
	 padding-top: 0px;
}
 @media screen and (max-width: 1600px) {
	 .collectionsmegaMenu .collectionsmegaMenu__content {
		 width: calc(100% - 220px);
	}
}
 .collectionsmegaMenu .collectionsmegaMenu__content .collectionsmegaMenuContent__highlightedCategoriesHolder {
	 display: flex;
	 justify-content: space-between;
}
 .collectionsmegaMenu .collectionsmegaMenu__content .collectionsmegaMenuContent__highlightedCategoriesHolder a {
	 font-family: 'Lato';
	 font-size: 16px;
	 text-transform: uppercase;
	 font-weight: 900;
	 color: #6e6e6e;
	 transition: color 0.3s ease;
}
 @media screen and (max-width: 1600px) {
	 .collectionsmegaMenu .collectionsmegaMenu__content .collectionsmegaMenuContent__highlightedCategoriesHolder a {
		 font-size: 14px;
	}
}
 .collectionsmegaMenu .collectionsmegaMenu__content .collectionsmegaMenuContent__highlightedCategoriesHolder a.is-active {
	 color: #e2a269;
}
 .collectionsmegaMenu .collectionsmegaMenu__content .collectionsmegaMenuContent__categories {
	 margin-top: 50px;
	 padding-bottom: 50px;
}
 @media screen and (max-width: 1600px) {
	 .collectionsmegaMenu .collectionsmegaMenu__content .collectionsmegaMenuContent__categories {
		 margin-top: 20px;
		 padding-bottom: 20px;
	}
}
 .collectionsmegaMenu .collectionsmegaMenu__content .collectionsmegaMenuContent__categories .menu {
	 justify-content: space-between;
	 display: flex;
	 flex-flow: row wrap;
	 flex-wrap: wrap;
	 padding: 0;
}
 .collectionsmegaMenu .collectionsmegaMenu__content .collectionsmegaMenuContent__categories .menu .menu-item-has-children {
	 padding-bottom: 55px;
	 width: 16%;
}
 @media screen and (max-width: 1600px) {
	 .collectionsmegaMenu .collectionsmegaMenu__content .collectionsmegaMenuContent__categories .menu .menu-item-has-children {
		 padding-bottom: 20px;
		 width: calc(16% - 15px);
	}
}
 .collectionsmegaMenu .collectionsmegaMenu__content .collectionsmegaMenuContent__categories .menu .menu-item-has-children a {
	 text-transform: uppercase;
	 font-size: 14px;
	 font-weight: 900;
	 font-family: 'Lato';
	 color: #1a1a18;
	 position: relative;
	 transition: color 0.5s ease;
}
 @media screen and (max-width: 1600px) {
	 .collectionsmegaMenu .collectionsmegaMenu__content .collectionsmegaMenuContent__categories .menu .menu-item-has-children a {
		 font-size: 12px;
	}
}
 .collectionsmegaMenu .collectionsmegaMenu__content .collectionsmegaMenuContent__categories .menu .menu-item-has-children a:after {
	 height: 2px;
	 width: 70px;
	 background-color: #e2a269;
	 position: absolute;
	 bottom: -5px;
	 left: 0;
	 content: '';
}
 .collectionsmegaMenu .collectionsmegaMenu__content .collectionsmegaMenuContent__categories .menu .menu-item-has-children a:hover {
	 color: #e2a269;
}
 .collectionsmegaMenu .collectionsmegaMenu__content .collectionsmegaMenuContent__categories .menu .menu-item-has-children ul {
	 padding-top: 20px;
	 padding-left: 0;
	 display: flex;
	 gap: 12px;
	 flex-flow: column;
}
 @media screen and (max-width: 1600px) {
	 .collectionsmegaMenu .collectionsmegaMenu__content .collectionsmegaMenuContent__categories .menu .menu-item-has-children ul {
		 gap: 8px;
	}
}
 .collectionsmegaMenu .collectionsmegaMenu__content .collectionsmegaMenuContent__categories .menu .menu-item-has-children ul li a {
	 text-transform: uppercase;
	 font-size: 14px;
	 font-weight: 400;
	 font-family: 'Lato';
	 color: #6e6e6e;
}
 .collectionsmegaMenu .collectionsmegaMenu__content .collectionsmegaMenuContent__categories .menu .menu-item-has-children ul li a:after {
	 display: none;
}
 @media screen and (max-width: 1600px) {
	 .collectionsmegaMenu .collectionsmegaMenu__content .collectionsmegaMenuContent__categories .menu .menu-item-has-children ul li a {
		 font-size: 12px;
	}
}
 .collectionsmegaMenu .collectionsmegaMenu__productsColumn {
	 width: 285px;
	 position: relative;
	 background-color: #f6f6f6;
	 padding-left: 15px;
	 padding-right: 15px;
	 display: flex;
	 flex-flow: column;
	 align-items: center;
	 padding-top: 20px;
	 padding-bottom: 45px;
	 display: none;
}
 @media screen and (max-width: 1600px) {
	 .collectionsmegaMenu .collectionsmegaMenu__productsColumn {
		 width: 220px;
	}
}
 .collectionsmegaMenu .collectionsmegaMenu__productsColumn.is-active {
	 display: flex;
}
 .collectionsmegaMenu .collectionsmegaMenu__productsColumn .productsColumn__title {
	 margin: 0;
	 color: #1a1a18;
	 font-family: 'Lato';
	 font-size: 16px;
	 font-weight: 900;
	 text-transform: uppercase;
	 margin-bottom: 20px;
}
 .collectionsmegaMenu .collectionsmegaMenu__productsColumn .productsColumn__title:nth-of-type(2) {
	 margin-top: 25px;
}
 .collectionsmegaMenu .collectionsmegaMenu__productsColumn .productBox {
	 width: 100%;
	 margin-bottom: 0;
	 max-width: 147px;
}
 @media screen and (max-width: 1600px) {
	 .collectionsmegaMenu .collectionsmegaMenu__productsColumn .productBox {
		 max-width: 120px;
	}
}
 .collectionsmegaMenu .collectionsmegaMenu__productsColumn .productBox .productBox__metaHolder {
	 padding-top: 10px;
}
 .collectionsmegaMenu .collectionsmegaMenu__productsColumn .productBox .productBox__metaHolder .metaHolder__color {
	 font-size: 12px;
	 font-weight: 500;
	 color: #6e6e6e;
}
 .collectionsmegaMenu .collectionsmegaMenu__productsColumn .productBox .productBox__metaHolder .metaHolder__price {
	 color: #e2a269;
	 font-size: 16px;
	 font-weight: 500;
}
 .collectionsmegaMenu .collectionsmegaMenu__productsColumn .productBox h5 {
	 font-size: 12px;
	 font-weight: 700;
	 font-family: 'futura-pt';
}
 .collectionsmegaMenu .collectionsmegaMenu__productsColumn .productBox .addToCartBoxVariable, .collectionsmegaMenu .collectionsmegaMenu__productsColumn .productBox .addToCartBox {
	 display: none;
}
 .collectionsmegaMenu .collectionsmegaMenu__productsColumn .productBox .productBox__photoHolder {
	 height: 181px;
}
 @media screen and (max-width: 1600px) {
	 .collectionsmegaMenu .collectionsmegaMenu__productsColumn .productBox .productBox__photoHolder {
		 height: 140px;
	}
}
 .collectionsmegaMenu .collectionsmegaMenu__productsColumn .productBox .productBox__photoHolder .newTag {
	 display: none;
}
 .collectionsmegaMenu .collectionsmegaMenu__productsColumn .productBox .productBox__photoHolder .tinv-wishlist {
	 display: none;
}
 .stickyNavbar .collectionsmegaMenu {
	 top: 100px;
}
 
</style>