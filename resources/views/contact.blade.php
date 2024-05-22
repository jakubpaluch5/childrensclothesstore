{{--
  Template Name: Kontakt
--}}

@extends('layouts.app')

@section('content')









    <section class="pageHeaderSection" style="background-image: url('{!! get_the_post_thumbnail_url() !!}')">
        <div class="container container--1320">
            <h1 data-aos="fade-up"
            data-aos-duration="1000" data-aos-offset="200">{!! the_title() !!}</h1>
        </div>
    </section>


    <section style="background-image: url('https://motulinka.com/wp-content/uploads/2023/12/TLO.png')" class="contactHeroSection">
        <div class="container container--1320">
            <div class="contactHeroSection__leftSide">
                <h4 >Wyślij nam wiadomość</h4>
                {!! do_shortcode('[contact-form-7 id="1308412" title="Formularz kontaktowy"]') !!}
            </div>
            <div class="contactHeroSection__rightSide">
                <h4>SPOTKAJMY SIĘ W NASZYM <br/>
                    SKLEPIE STACJONARNYM .</h4>
                <ul class="rightSide__contactData">
                    <li>
                        <img alt="Ikonka lokalizacji" src="<?= get_template_directory_uri(); ?>/assets/images/pin.svg">
                        <p>ul. Zaborska 5/4c,32-600 Oświęcim <br/>
                        (obok ronda przy Biedronce)</p>
                    </li>
                    <li>
                        <img alt="Ikonka zegarka" src="<?= get_template_directory_uri(); ?>/assets/images/clock.svg">
                        <p>
                            Pon - Pt: 9:00 - 17:00 <br/>
                            Sob:        9:00 - 13:00
                        </p>
                    </li>
                    <li>
                        <img alt="Ikonka telefonu" src="<?= get_template_directory_uri(); ?>/assets/images/phone.svg">
                        <a href="tel:533 747 300">533 747 300</a>
                    </li>
                    <li>
                        <img alt="Ikonka maila" src="<?= get_template_directory_uri(); ?>/assets/images/mail.svg">
                        <a href="mailto:motulinkadladzieci@protonmail.com">motulinkadladzieci@protonmail.com</a>
                    </li>
                </ul>
                <ul class="rightSide__companyData">
                    <li>
                        <strong>NIP:</strong> 5492423819
                    </li>
                    <li>
                        <strong>REGON:</strong> 122573767
                    </li>
                   
                </ul>
                <div class="rightSide__socialData">
                    <a href="https://www.facebook.com/profile.php?id=100028121126999">
                        <img alt="Ikonka lokalizacji" src="<?= get_template_directory_uri(); ?>/assets/images/contact-fb-icon.svg">
                    </a>
                    <a href="https://www.instagram.com/motulinka_dladzieci/">
                        <img alt="Ikonka lokalizacji" src="<?= get_template_directory_uri(); ?>/assets/images/contact-instagram-icon.svg">
                    </a>

                </div>
            </div>
        </div>
    </section>


    <style>
        .contactHeroSection .container .contactHeroSection__leftSide form .formRow {
            margin-top: 10px;
        }
        body .contactHeroSection .container .contactHeroSection__rightSide {
            padding: 50px 60px 120px;
        }
        body .contactHeroSection .container .contactHeroSection__rightSide .rightSide__socialData {
            margin-top: 90px;
        }
    </style>

    <script>
        document.querySelector('.customCheckbox input').addEventListener('change', () => {
            document.querySelector('.customCheckbox label').classList.toggle('is-active');
        })
    </script>

    

@endsection



