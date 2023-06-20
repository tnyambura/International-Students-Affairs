<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="asset/css/styles.css" rel="stylesheet"/>
        <link href="asset/css/progress.css" rel="stylesheet"/>
        <link href="asset/css/custom_select.css" rel="stylesheet"/>
        <link href="{{asset('css/app.css')}}" rel="stylesheet"/>
    <style>
        body{
            width: 100vw;
            height: 100vh;
            background: rgb(17,60,122);
            display: grid;
            grid-template-columns: 40% 1fr;
        }
        .img-logo-container{
            position: relative;
            display: flex;
            flex-direction:column;
            justify-content:center;
            align-items:center;
        }
        .img-logo-container p{
            margin-block: 5px;
            text-transform: capitalize;
            font-size: 35px;
            color: #fff;
            font-weight: bolder;
            letter-spacing: 2px;
            text-align:center;
            line-height: 35px;
        }
        .logo-wrapper{
            width: max-content;
            height: max-content;
            overflow: hidden;
            background: url('homeassets/img/bg-masthead.jpg') repeat-x;
            border-radius: 50%;
            animation: animatedBackground 25s ease-in-out infinite alternate;
            filter: blur(2px)
        }
        #anim_logo{
            width:100%;
        }
        .logo-svg{

        }
        #path1143{
            fill: rgb(17,60,122);
            fill-opacity:.9;
        }
        .form-data {
            display: flex;
            flex-direction:column;
            place-items:center;
            overflow: auto;
            padding-inline: 30px;
        }
        .form-title{
            text-align: left;
            font-size: 30px;
            color: #fff;
            width: 100%;
            margin-block: 10px;
            margin-top: 50px;
        }
        .form-data form{
            padding-inline: 40px;
            width: 100%;
        }
        .form-data form label{
            color: rgb(199, 140, 22);
        }
        .form-data form input:not([type='submit']){
            border-radius: 10px;
        }
        .more-link{
            padding: 10px 15px;
            color: #fff;
            font-size: 12px;
        }
        .more-link:not(.more-link:last-child){ border-right: 2px solid #fff}
        @keyframes animatedBackground {
            from {
                background-position: 0 50%;
            }
            to {
                background-position: 100% 50%;
            }
        }
    </style>
</head>
<body>
    <div class="img-logo-container" style="height: 100vh">
        <div class='logo-wrapper'>
            <div class='logo-svg'>
                {!! file_get_contents(public_path('asset/img/strathLg.svg')) !!}
            </div>
        </div>
        <p>SU internation student's <br/> affairs</p>
    </div>
    <div class='form-data'>
        <h2 class='form-title'>SU Portal | Login </h2>
        <form method="POST" action="{{ route('login') }}">
            @csrf
              <x-auth-validation-errors class="breadcrumb py-0 mb-4 d-flex align-items-center bg-danger" style="color:#fff; text-align:left;" :errors="$errors" />
            <div class="">
              <div class=" mb-4">
                <div class="form-outline">
                    <label class="form-label mt-2" for="form3Example1">SU Id | Email</label>
                  <input type="text" name="suID" required autofocus class="form-control" />
                </div>
              </div>
              <div class=" mb-4">
                <div class="form-outline">
                    <label class="form-label mt-2" for="form3Example2">Password</label>
                  <input type="password" name="password" required class="form-control" />
                </div>
              </div>
            </div>
            <button type="submit" style='background: rgb(199, 140, 22) !important; color:#fff; outline:transparent;' class="btn w-100 mb-4">
              Login
            </button>
        </form>
        <div class="col-lg w-100 justify-content-center align-items-center position-relative" >
      
      
      <div class='mt-0 w-100' style='text-align:left'>
        <h3 class='mb-4' style='color: rgb(199, 140, 22); font-size: 15px;'>Useful resources</h3>
        
            <div class='row align-items-center'>
                <a class='col-lg ml-3 mb-2 d-flex ' href="/downloadGuides/k"><i class='fa fa-file-pdf mr-2' style='font-size: 30px; color: red; height: 50px;'></i><span style='font-size:12px; color: #fff; align-self:center;'>The name of File</span></a><br/>
                <a class='col-lg ml-3 mb-2 d-flex ' href="/downloadGuides/k"><i class='fa fa-file-pdf mr-2' style='font-size: 30px; color: red; height: 50px;'></i><span style='font-size:12px; color: #fff; align-self:center;'>The name of File</span></a><br/>
            </div>
            <div class='row align-items-center'>
                <a class='col-lg ml-3 mb-2 d-flex ' href="/downloadGuides/k"><i class='fa fa-file-pdf mr-2' style='font-size: 30px; color: red; height: 50px;'></i><span style='font-size:12px; color: #fff; align-self:center;'>The name of File</span></a><br/>
                <a class='col-lg ml-3 mb-2 d-flex ' href="/downloadGuides/k"><i class='fa fa-file-pdf mr-2' style='font-size: 30px; color: red; height: 50px;'></i><span style='font-size:12px; color: #fff; align-self:center;'>The name of File</span></a><br/>
            </div>
      </div>

      <div class=" mb-3" style='line-height: 50px; '>
        <h3 class='mb-4' style='color: rgb(199, 140, 22); font-size: 15px;'>More links</h3>
        <a href="https://susa.strathmore.edu/our-services/international-students/" class="more-link">
          About Us
        </a>
        <a href="/forgotpassword" class="more-link">
            Forgot Password
        </a>
        <a href="https://su-sso.strathmore.edu/susams/servlet/edu/strathmore/ams/susams/Init.html" class="more-link">
            AMS
        </a>
        <a href="https://elearning.strathmore.edu/login/index.php" class="more-link">
            E-learning
        </a>
        <a href="/signup" class="more-link">
          <i class="fab fa-github"></i> Sign Up
        </a>
      </div>
    </div>
    </div>
    
    
    <script >
    </script>
</body>
</html>

