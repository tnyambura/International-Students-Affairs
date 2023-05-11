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
            .content{
                padding: 10px;
                border: 1px solid grey;
                border-radius: 10px;
                width: 100%;
                margin-inline: 20px;
            }
        </style>
    </head>
    <body class="sb-nav-fixed">
        <h3>{{$data['title']}}</h3>
        <div class='content'>{{$data['body']}}</div>
    </body>
</html>