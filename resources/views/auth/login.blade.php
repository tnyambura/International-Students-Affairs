<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Login || Portal</title>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        
 

</head>
 <body>  
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-4 col-md-offset-4">
                <div class="account-wall">
                <div class="mx-auto" style="width: 28rem; align:center;">
                <img class="card-img-top" src="../../asset/img/logo.png" alt="Card image cap" style="size:14rem">
            </div> 
            <h2 style="text-align:center;"><span style="font-weight:bold;">International students Portal</span></h2>
            <form class="form-signin" method="POST" action="{{ route('login') }}">
            @csrf
                <x-auth-validation-errors class="mb-4" :errors="$errors" />
                <label>SUID or USERNAME </label><br/>

                <input type="text" class="form-control" placeholder="suID" name="suID" required autofocus><br/>
                <label>PASSWORD</label><br/>
                <input type="password" class="form-control" placeholder="Password" name="password" required><br/>
                <button class="btn btn-lg btn-primary btn-block" type="submit">
                    Sign in</button><br/>
                <label class="checkbox pull-left">
                    <input type="checkbox" value="remember-me">
                    Remember me
                </label>
                <a href="{{route('password.request')}}" class="pull-right need-help">Forgotten Password? </a><span class="clearfix"></span>
            </form>
        </div>
            <a href="/signup" class="text-center new-account">Create an account </a>
    </div>
    <!-- </div>
</div> -->
 </body>
 </html>
