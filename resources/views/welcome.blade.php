<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <!-- <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css"> -->

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">


        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 64px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body class="pretty bg-light">


            <div class="container">

                <div class="row">
                    <div class="col-8">

                <h1 class="pt-5 pb-4 text-danger">
                    Laravel Bookmarks
                </h1>

                <h5 class="pb-4">
                    This website helps you manage groups of URLs by saving bookmarks and organizing them into catalogues.
                </h5>

                <h5 class="pb-4">
                    Have a bunch of recipes you refer to frequently? Create a "Recipe Box" catalogue. Have a bunch of cat photos
                    you look at all day? Create a "cat-a-logue"! Need help keeping up with all your memes? Create a "Meme-or-ies"
                    catalogue. The only limit is your tolerance for puns!
                </h5>

                <h5>Click the "Register" button below to get started, or "Login" if you're a returning user.</h5>

                <div class="pt-4">
                    <a href="/login" class="btn btn-danger pl-4 pr-4 pt-2 pb-2">Login</a>
                    <span class="pl-5"></span>
                    <a href="/register" class="btn btn-danger pl-4 pr-4 pt-2 pb-2">Register</a>
                </div>

            </div>


            <div class="col-4">
            </div>

        </div>


            </div>
        <!-- </div> -->
    </body>
</html>
