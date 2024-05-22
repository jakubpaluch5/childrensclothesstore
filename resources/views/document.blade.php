{{--
  Template Name: Dokument
--}}

@extends('layouts.app')

@section('content')

<section class="pageHeaderSection" style="background-image: url('{!! get_the_post_thumbnail_url() !!}')">
    <div class="container container--1320">
        <h1>{!! the_title() !!}</h1>
    </div>
</section>

<section id="documentSectionBody">
    <div class="container container--1320">
        {!! the_content() !!}
    </div>
</section>

<style>
    #documentSectionBody .container {
        font-family: 'Lato' !important;
        padding-bottom: 50px;

    }
    #documentSectionBody .container ul, #documentSectionBody .container ul li{
        list-style-type: disc !important;
    }
    #documentSectionBody .container ul, #documentSectionBody .container ol {
        display: flex;
        gap: 10px;
        flex-flow: column;

    }
    #documentSectionBody .container h4 {
        font-weight: 700;
    }
</style>

@endsection
