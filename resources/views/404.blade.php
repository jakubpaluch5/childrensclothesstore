@extends('layouts.app')

@section('content')

<link href="https://fonts.cdnfonts.com/css/lemon-tuesday" rel="stylesheet">

    <section class="fourZeroFourSection" style="background-image: url('{!! site_url() !!}/wp-content/uploads/2023/11/Group-5216-1.png')">
        <div class="container">
            <h1>404</h1>
            <h3>
                UPS... PRZEPRASZAMY, STRONA <br/>
KTÓREJ SZUKASZ NIE ISTNIEJE 
            </h3>
            <a href="{!! site_url() !!}" class="motulinkaBtn motulinkaBtn--halfRounded">Wróć na stronę główną</a>
        </div>
    </section>


    <style>
        .siteFooter {
            display: none;
        }
         .fourZeroFourSection .container  {
            padding-top: 20px;
            display: flex;
            flex-flow: column;
            
            align-items: flex-end;
            padding-bottom: 380px;
            padding-right: 90px;
         }
         .fourZeroFourSection {
            background-position: center;
            background-size: cover;
         }
        .fourZeroFourSection .container h1 {
            font-family: 'Lemon Tuesday', sans-serif;
            font-size: 239px;
            font-weight: 400;
            margin: 0;
            margin-right: 250px;
            transform: rotate(-30deg);

        }
        .fourZeroFourSection .container h3 {
            font-family: 'Lato';
            font-size: 30px;
            font-weight: 700;
            margin-top: -20px;
            color: #1A1A18;
        }
        .fourZeroFourSection .container a {
            border-top-right-radius: 0px;
        }
        @media screen and (max-width: 1200px) {
            .fourZeroFourSection .container {
                padding-right: 0px;
                padding-bottom: 300px;
            }
        }
        @media screen and (max-width: 900px) {
            .fourZeroFourSection .container h1 {
                margin-right: 170px;
            }
        }
        @media screen and (max-width: 600px) {
            .fourZeroFourSection .container h1 {
                margin-right: 0;
                font-size: 180px;
                transform: none;
            }
            .fourZeroFourSection .container h3 {
                font-size: 24px;
                text-align: right
            }
            .fourZeroFourSection  .container {
                max-width: 100%;
                padding-left: 15px;
                padding-right: 15px;
            }
        }
    </style>
@endsection
