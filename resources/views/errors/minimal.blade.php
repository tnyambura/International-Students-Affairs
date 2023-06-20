<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">

        <style>
            body {
                font-family: 'Nunito', sans-serif;
                background: #fff;
                box-sizing: border-box;
            }
            .top-layer{
                display:flex; 
                width: 90%; 
                margin-inline:auto; 
                align-items:center; 
                border-bottom: 3px solid #113C7A;
            }

            p{
                color: rgba(110,110,110,.4); 
                font-size:30px; 
                text-align:center;
                margin:0;
            }
            .link-back{
                display:flex;
                align-items:center;
                justify-content:center;
            }
            .link-back a{
                color: rgb(17,60,122);
                text-decoration:none;
                border-bottom: 3px solid rgb(208,161,83);
                padding-bottom: 10px;
                letter-spacing: 2px;
                transition: 1s;
            }
            .link-back a:hover{
                color: rgba(208,161,83);
                border-color: rgb(17,60,122);
            }
            .pass-change-container{
                margin-inline: 10px;
            }

            @media (min-width: 700px) {
                .pass-change-container{
                    width: 60%;
                    margin-inline: auto;
                }
            }
            @media (max-width: 600px) {
                .top-layer{
                    flex-direction: column;
                    align-items: center;
                    justify-content: center;
                }
            }

        </style>
        <link href="{{asset('css/app.css')}}" rel="stylesheet"/>
        <link href="{{asset('asset/css/styles.css')}}" rel="stylesheet"/>
    </head>
    <body class="antialiased">
        <div class='top-layer'>
            <img class="card-img-top" style="max-width: 15rem;" src="{{asset('asset/img/logo.png')}}" alt="Card image cap" style="size:14rem">
            <h2 style="text-align:center; color:rgba(17,60,122);"><span style="font-size:35px; font-weight:bold;">International students Portal</span></h2>
        </div>
        @if(!$passwordError)
        <div style="margin-block:100px;">
            <p style='font-weight: bold; font-size: 50px;'>@yield('code')</p>    
            <p style=''>@yield('message')</p>    
        </div>
        <div class='link-back' style="margin-block:100px;">
            <a href='/'>Go back Home</a>  
        </div>
        @else
        @yield('passwordReset')
        @endif
    </body>
</html>
