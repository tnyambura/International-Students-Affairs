
<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>International Students Affairs</title>

  <!-- Bootstrap Core CSS -->
  <link href="{{asset('homeassets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

  <!-- Custom Fonts -->
  <link href="{{asset('homeassets/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
  <link href="{{asset('homeassets/vendor/simple-line-icons/css/simple-line-icons.css')}}" rel="stylesheet">

  <!-- Custom CSS -->
  <link href="{{asset('homeassets/css/stylish-portfolio.min.css')}}" rel="stylesheet">
  <link href="{{asset('asset/css/styles.css')}}" rel="stylesheet"/>
  <link href="{{asset('asset/css/startPage.css')}}" rel="stylesheet"/>
  <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>

  
</head>

<body id="page-top" style="width: 100vw;">

  <div class='loader-load-container d-none align-items-center justify-content-center position-fixed' style='top:0;left:0'>
      <div class='loader-load d-flex align-items-center justify-content-center'>
          <img src="asset/img/isa_logo.png" />
          <div><span></span></div>
      </div>
  </div>

  <div class="img-logo-container" style="">
        <div class='logo-wrapper'>
            <div class='logo-svg'>
                {!! file_get_contents(public_path('asset/img/strathLg.svg')) !!}
            </div>
        </div>
        <p>SU internation student's <br/> affairs</p>
    </div>
    <div class='form-data'>
      <h2 class='form-title'>SU Portal | Login </h2>

      @if(Session::has('dummy-superUser') )
      <div class="alert alert-success" role="alert">
      {{Session::get('dummy-superUser')}}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      @endif
      @if(Session::has('download_fail') )
      <div class="alert alert-danger" role="alert">
      {{Session::get('download_fail')}}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      @endif
      <x-auth-validation-errors class="breadcrumb py-0 mb-4 d-flex align-items-center bg-danger" style="color:#fff; text-align:left;" :errors="$errors" />

        <form method="POST" action="{{ route('login') }}">
            @csrf
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
        <div class="w-100 justify-content-center align-items-center position-relative" >
      
      
          <div class='mt-0 w-100' style='text-align:left'>
            <h3 class='mb-4' style='color: rgb(199, 140, 22); font-size: 15px;'>Useful resources</h3>
            @if($Guides)
            @php $GuideData = array_chunk($Guides,2); @endphp
              @foreach($GuideData as $data)
                @foreach($data as $items)
                  <div class='row align-items-center'>
                      @foreach($items as $v)
                        <a class='col-lg ml-3 mb-2 d-flex ' href="/downloadGuides/{{Crypt::encrypt($v['file_name'])}}"><i class='fa fa-file-pdf mr-2' style='font-size: 30px; color:var(--light); height: 50px;'></i><span style='font-size:12px; color: #fff; align-self:center;'>{{explode('.',$v['file_name'])[0]}}</span></a><br/>
                      @endforeach
                    </div>
                    @endforeach
                @endforeach
            @endif
          </div>

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
              <a href="/signup" class="more-link">
              <i class="fas fa-user-plus pr-2"></i> Sign up
              </a>
            </div>
          </div>
        </div>
    </div>
    

  <script src="{{asset('asset/js/scripts.js')}}"></script>
  <!-- Bootstrap core JavaScript -->
  <script src="{{asset('homeassets/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('homeassets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

  <!-- Plugin JavaScript -->
  <script src="{{asset('homeassets/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

  <!-- Custom scripts for this template -->
  <script src="{{asset('homeassets/js/stylish-portfolio.min.js')}}"></script>

</body>

</html>
