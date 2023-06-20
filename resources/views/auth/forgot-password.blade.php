
<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>International Students Affairs</title>

  <!-- Bootstrap Core CSS -->
  <link href="../../homeassets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom Fonts -->
  <link href="../../homeassets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
  <link href="../../homeassets/vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">

  <!-- Custom CSS -->
  <link href="../../homeassets/css/stylish-portfolio.min.css" rel="stylesheet">
  <link href="../../asset/css/styles.css" rel="stylesheet"/>
  <link href="../../asset/css/startPage.css" rel="stylesheet"/>
  <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>

  
</head>

<body id="page-top" >

  <div class='loader-load-container d-none align-items-center justify-content-center position-fixed' style='top:0;left:0'>
      <div class='loader-load d-flex align-items-center justify-content-center'>
          <img src="{{asset('asset/img/isa_logo.png')}}" />
          <div><span></span></div>
      </div>
  </div>

  <div class="img-logo-container" >
      <div class='logo-wrapper'>
          <div class='logo-svg'>
              {!! file_get_contents(public_path('asset/img/strathLg.svg')) !!}
          </div>
      </div>
      <p>SU internation student's <br/> affairs</p>
  </div>
  <div class='form-data'>
      

  @if(Session::has('user-error'))
  <div class="alert alert-danger" role="alert">
  {{Session::get('user-error')}}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  </div>
  @endif
  @if(Session::has('code-error'))
  <div class="alert alert-danger" role="alert">
  {{Session::get('code-error')}}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  </div>
  @endif
  @if(Session::has('update_success'))
  <div class="alert alert-success" role="alert">
  {{Session::get('update_success')}}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  </div>
  @endif
  @if(Session::has('update_error'))
  <div class="alert alert-danger" role="alert">
  {{Session::get('update_error')}}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  </div>
  @endif
  @if(Session::has('reset_error'))
  <div class="alert alert-danger" role="alert">
  {{Session::get('reset_error')}}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  </div>
  @endif
  @if(Session::has('code_exists'))
  <div class="w-100 alert alert-warning" role="alert">
  {{Session::get('code_exists')}}
  </div>
  @endif
  <div class="py-3 px-md-5 d-flex flex-column justify-content-center">
    <h2 class='form-title mb-5'>SU Portal | {{$title}} </h2>  
    @yield('content')
  </div>
  <div class="w-100 justify-content-center align-items-center position-relative" >

    <div class=" mb-3" style='line-height: 50px; '>
      <h3 class='mb-4' style='color: rgb(199, 140, 22); font-size: 15px;'>More links</h3>
      <div class="more-links-container">
      <a href="https://susa.strathmore.edu/our-services/international-students/" class="more-link">
      <i class="fas fa-book-open pr-2"></i>About Us
      </a>
      <a href="/forgotpassword" class="more-link">
      <i class="fas fa-user-lock pr-2"></i>Forgot Password
      </a>
      <a href="https://su-sso.strathmore.edu/susams/servlet/edu/strathmore/ams/susams/Init.html" class="more-link">
      <i class="fas fa-chalkboard-teacher pr-2"></i>AMS
      </a>
      <a href="https://elearning.strathmore.edu/login/index.php" class="more-link">
      <i class="fas fa-book-reader pr-2"></i>E-learning
      </a>
      <a href="/" class="more-link">
      <i class="fas fa-lock-open pr-2"></i> Login
      </a>
      </div>
    </div>
  </div>
    

  <script src="../../asset/js/scripts.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script src="../../homeassets/vendor/jquery/jquery.min.js"></script>
  <script src="../../homeassets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="../../homeassets/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for this template -->
  <script src="../../homeassets/js/stylish-portfolio.min.js"></script>

</body>

</html>



