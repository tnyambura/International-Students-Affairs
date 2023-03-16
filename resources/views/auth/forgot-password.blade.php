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


                <x-auth-card>
       

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

         <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email Address -->
            <div>               
                <input type="text" class="form-control" placeholder="email" name="email" :value="old('email')" required autofocus><br/>
            </div>
            <x-button class="btn btn-lg btn-primary btn-block">
                    {{ __('Email Password Reset Link') }}
             </x-button>
         </form>
        </x-auth-card>
              
            <a href="{{ route('login') }}" class="text-center new-account">Login</a>
        </div>
    </div>
</div>
 </body>
 </html>

