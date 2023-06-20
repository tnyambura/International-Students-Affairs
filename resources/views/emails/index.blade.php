<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard || Dashboard</title>
        <link href="../../asset/css/styles.css" rel="stylesheet"/>
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <title>Account Confirm</title>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
        <style>
            *{
                box-sizing: box-contai
            }
            .content{
                padding: 10px;
                /* border: 1px solid grey; */
                border-radius: 10px;
                width: 90%;
                margin-inline: auto;
                /* box-shadow: 0 0 5px grey; */
            }
            .email-top-image{
                height: 200px; 
                width:100%;
                background-image: url('homeassets/img/bg-masthead.jpg');
                background-position: center;
                background-repeat: no-repeat;
                background-origin: content-box;
                position:relative;
                display:flex;
                align-items:center;
            }
            .email-title{
                margin: 20px 20px;
                margin-left: 30px;
                font-size: 20px;
                font-weight: 800;
                color: #113C7A;
            }
        </style>
    </head>
    <body class="sb-nav-fixed">
        <div class='email-top-image'>
        <div style='display:flex; width: 90%; margin-inline:auto; align-items:center; border-bottom: 3px solid #113C7A;'>
            <img class="card-img-top" style="max-width: 15rem;" src="{{ asset('img/logo.png')}}" alt="Card image cap" style="size:14rem">
            <h2 style="text-align:center; color:#fff;"><span style="font-weight:bold;">International students Portal</span></h2>
        </div>
        </div>
        <h3 class='email-title'>{{$data['title']}}</h3>
        <div class='content'>{!! $data['body'] !!}</div>
    </body>
</html>