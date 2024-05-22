@php
global $product;
@endphp
<div class="productBox" data-aos="fade-up" data-aos-duration="1000" data-aos-offset="-200">
  <div class="productBox__photoHolder">
    <a class="productLink" href="{!! the_permalink() !!}"></a>
    {!! do_shortcode('[ti_wishlists_addtowishlist]') !!}
    @if(has_term( 270, 'product_cat' )) 
    <div class="newTag">
      Nowość
    </div>
    @endif
    @if ( $product->is_on_sale() )  
    <div class="promotionTag">Promocja</div>
    @endif

    @if(!$product->is_in_stock())
    <div class="outOfStockTag">
      Brak w magazynie
    </div>

    <style>
      .promotionTag {
        right: 0;
    top: 130px;
    border-top-left-radius: 50px;
    background-color: #e2a269;
    color: #fff;
    position: absolute;
    z-index: 99;
    width: 130px;
    font-family: Lato;
    text-transform: uppercase;
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: 14px;
    font-weight: 700;
    height: 40px;
    border-bottom-left-radius: 50px;
      }
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
    @if(get_the_post_thumbnail_url())
    
    <div class="productBoxPhotoHolder__image" style="background-image: url('{!! get_the_post_thumbnail_url(get_the_ID(), 'thumbnail') !!}');">
    </div>
    @else
    <div class="productBoxPhotoHolder__image"
      style="background-image: url('{!! site_url() !!}/wp-content/uploads/2023/11/Group-5223.jpg');"></div>
    @endif

    @if($product->is_type('variable'))
    @if(!$product->is_in_stock())
    <div class="addToCartBoxVariable">
      <a class="btn btn-fadeBrown " href="{!! the_permalink() !!}">
        Dowiedz się więcej
      </a>
    </div>
    @else 
    <div class="addToCartBoxVariable">
      <a class="btn btn-fadeBrown " href="{!! the_permalink() !!}">
        Wybierz opcję
      </a>
    </div>
    @endif
  
    @else
    <div class="addToCartBox">
      <form action="{!! esc_url( $product->add_to_cart_url() ) !!}" class="cart" method="post"
        enctype="multipart/form-data">
        {!! woocommerce_quantity_input( array(), $product, false ); !!}
        <button type="submit" class="button alt btn btn-fadeBrown">{!! esc_html( $product->add_to_cart_text() )
          !!}</button>
      </form>
    </div>
    @endif
  </div>
  <div class="productBox__metaHolder">
    

    <a href="{!! the_permalink() !!}">
      <h5>{!! the_title() !!}</h5>
    </a>
    @php

    $result = $product->get_attribute( 'kolor' );
    $productPrice = $product->get_price();

    @endphp
    <p class="metaHolder__color">{!! $result !!}</p>
    @if($product->is_type('simple'))
    @if ( $product->is_on_sale() )  
    <p class="saleRegularPrice">
      {!! $product->get_regular_price() !!} {!! get_woocommerce_currency_symbol() !!}
    </p>

    <style>
      .saleRegularPrice {
        font-family: futura-pt;
  font-weight: 500;
  color: gray;
  font-size: 16px;
  margin-top: 8px;
  text-decoration: line-through;
  text-align: center;
      }
      </style>
    @endif
 
    @endif
    @if($product->is_type('variable'))
    @if ( $product->is_on_sale() )  
      <p class="saleRegularPrice">
        od {!! $product->get_variation_regular_price( 'min' ); !!} {!! get_woocommerce_currency_symbol(); !!}
      </p>

      <style>
        .saleRegularPrice {
          font-family: futura-pt;
    font-weight: 500;
    color: gray;
    font-size: 16px;
    margin-top: 8px;
    text-decoration: line-through;
    text-align: center;
        }
      </style>
    
    @endif
    
    <p class="metaHolder__price">od {!! woocommerce_price($productPrice) !!}</p>
    @else
    <p class="saleRegularPrice">
    </p>

    <style>
      .saleRegularPrice {
        font-family: futura-pt;
  font-weight: 500;
  color: gray;
  font-size: 16px;
  margin-top: 8px;
  text-decoration: line-through;
  text-align: center;
      }
    </style>
    <p class="metaHolder__price">{!! woocommerce_price($productPrice) !!}</p>
    @endif



  </div>
</div>
