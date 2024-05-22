{{--
  Template Name: Lista życzeń
--}}

@extends('layouts.app')

@section('content')


<section class="wisthListSection">
    <div class="container container--1320">
      <h4 class="wisthListHeader">Ulubione</h4>
    {!! do_shortcode('[ti_wishlistsview]') !!}
</div>
</section>

<style>


  .social-buttons {
    display: none;
  }
  .wisthListSection .container {
    padding-top: 50px;
    padding-bottom: 130px;
  }
  .wisthListHeader {
    font-family: 'Lato';
    color: #1A1A18;
    font-weight: 900;
    text-transform: uppercase;
    font-size: 24px;
  }
  .wishlistWrapper {
    display: flex;
    flex-flow: row wrap;
    margin-top: 30px;
    
    flex-wrap: wrap;
    justify-content: flex-start;
    column-gap: 50px;
  }
  .wishlistWrapper .productBox {
    width: calc(25% - 38px);
  }


  @media screen and (max-width: 1000px) {
    .wishlistWrapper {
      column-gap: 40px;
    }
    .wishlistWrapper .productBox {
      width: calc(33% - 24px);
    }
    .wisthListSection .container {
    padding-top: 30px;
    padding-bottom: 50px;
  }
  }

  @media screen and (max-width: 850px) {
    .wishlistWrapper {
      column-gap: 20px;
    }
    .wishlistWrapper .productBox {
      width: calc(33% - 11px);
    }
  }

  @media screen and (max-width: 730px) {
    .wishlistWrapper .productBox {
      width: calc(33% - 12px);
    }
  }


  @media screen and (max-width: 600px) {
    .wishlistWrapper .productBox {
      width: calc(50% - 12px);
    }
  }
  @media screen and (max-width: 500px) {
    .wishlistWrapper .productBox {
      width: calc(100%);
    }
    .productBox .productBox__metaHolder {
      padding-left: 0px;
      padding-right: 0px;
    }
  }
</style>

@endsection
