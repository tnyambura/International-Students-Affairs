
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
 

</head>

<body id="page-top" style="width: 100vw; height:100: 100vh; background: rgb(58,93,174)">

  <!-- <main class="row w-100 h-100">
    <header class="col masthead d-flex " style="position:relative; padding-top: 10px">
      <div class="container text-center my-auto h-100 " style='width: auto; position:absolute; top:0; left:0; right:0; background: rgba(58,93,174,.4);'>
            <div class="">
                <div class="account-wall">
                <div class="mx-auto" style="width: 20rem; align:center;">
                <img class="card-img-top" src="../../asset/img/logo.png" alt="Card image cap" style="size:14rem">
            </div>
        <h2 class="mb-5" style="color:white; font-size:60px;">
          International Students affairs <span style="color:#E9292F">Portal</span>
        </h2>
        <a class="btn btn-primary btn-xl js-scroll-trigger p-2" href="https://susa.strathmore.edu/our-services/international-students/" target="_blank">Find Out More</a>
        <p class="h6" style="color:#ffffff; padding-top:15%;">International Students Affairs © <?php echo Date('Y');?>. All right Reserved.<a class="text-green ml-2" href="#" target="_blank" style="color:#E9292F"></a></p>

      
      </div>   

    </header>
    <div class="col py-5 px-4">
        <div class="">
          <h2 class="mb-5" style="color:#000; text-align:center; font-size:30px;">
            Login
          </h2>
          <x-auth-validation-errors class="mb-4" :errors="$errors" />
            <form style="margin-left:50px; margin-right:50px;" class=" w-100" method="POST" action="{{ route('login') }}">
            @csrf
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
  </main> -->


  <!-- Section: Design Block -->
<section class="text-centerss d-flex" style='width: 100%; height:100vh; overflow: hidden;' >
  <!-- Background image -->
  <div class="p-5 w-75 h-100 bg-image" style="
        background-image: url('homeassets/img/bg-masthead.jpg');
        background-position: center;
        background-repeat: no-repeat;
        background-origin: content-box;
        "></div>
  <!-- Background image -->

  <div class=" mx-4 shadow-5-strong align-items-center justify-content-center" style="
        max-width: 600px;
        max-height: 100%;
        /* margin-top: -100px; */
        background: hsla(0, 0%, 100%, 0.8);
        backdrop-filter: blur(30px);
        min-height: calc(100vh - 200px);
        border-radius: 10px;
        overflow: auto;
        position: absolute;
        top: 10px;
        bottom: 10px;
        right: 10px;
        box-shadow: 0 0 10px rgb(110,110,110);
        ">
    <div class='d-flex pb-3 flex-column align-items-center mt-4' style='border-bottom: 1px solid #113C7A;'>
      <img class="card-img-top" style="max-width: 8rem;" src="../../asset/img/logo.png" alt="Card image cap" style="size:14rem">
      <h2 class='d-flex align-items-center ' style="text-align:center;"><span style="font-weight:bold;">International students Portal</span></h2>
    </div>
    <div class="col py-3 px-md-5">
      
          <h2 class=" mb-5" style='color:#113C7A; font-size: 25px; font-weight: 800;'>Login</h2>

          <form method="POST" action="{{ route('login') }}">
            @csrf
              <x-auth-validation-errors class="breadcrumb py-0 mb-4 d-flex align-items-center bg-danger" style="color:#fff; text-align:left;" :errors="$errors" />
            <!-- 2 column grid layout with text inputs for the first and last names -->
            <div class="row row-cols-auto">
              <div class="col-lg-6 mb-4">
                <div class="form-outline">
                  <input type="text" name="suID" required autofocus class="form-control" />
                  <label class="form-label mt-2" for="form3Example1">SU Id | Email</label>
                </div>
              </div>
              <div class="col-lg-6 mb-4">
                <div class="form-outline">
                  <input type="password" name="password" required class="form-control" />
                  <label class="form-label mt-2" for="form3Example2">Password</label>
                </div>
              </div>
            </div>
            <button type="submit" style='background: #113C7A !important;' class="btn btn-primary btn-block mb-4">
              Login
            </button>
          </form>
        <!-- </div>
      </div> -->
    </div>
    <div class="col-lg w-100 justify-content-center align-items-center position-relative" >
      
      @if(Session::has('download_fail') )
      <div class="alert alert-success" role="alert">
      {{Session::get('download_fail')}}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      @endif
      <div class='mt-0 w-100' style='text-align:left'>
        <h3 class='mb-4' style='color: #113C7A; font-size: 15px;'>Useful resources</h3>
        @if($Guides)
          @foreach($Guides as $data)
            <div class='row align-items-center'>
                @foreach($data as $v)
                <a class='col-lg ml-3 mb-2 d-flex ' href="/downloadGuides/{{$v['file']}}"><i class='fa fa-file-pdf mr-2' style='font-size: 30px; color:var(--danger); height: 50px;'></i><span style='font-size:12px; color: #113C7A; align-self:center;'>{{$v['file_name']}}</span></a><br/>
                @endforeach
            </div>
            @endforeach
        @endif
      </div>

      <div class=" mb-3">
      <h3 class='mb-4' style='color: #113C7A; font-size: 15px;'>More links</h3>
        <a href="/" class="btn btn-link btn-floating mx-1 my-2">
          About Us</a>

        <button type="button" class="btn btn-link btn-floating mx-1 my-2">
          Forgot Password
        </button>

        <button type="button" class="btn btn-link btn-floating mx-1 my-2">
          AMS
        </button>

        <button type="button" class="btn btn-link btn-floating mx-1 my-2">
          <i class="fab fa-github"></i> E-Learning
        </button>
        <a href="/signup" class="btn btn-link btn-floating mx-1 my-2">
          <i class="fab fa-github"></i> Sign Up
        </a>
      </div>
    </div>
    
  </div>
</section>
<!-- Section: Design Block -->
  
  
 
  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded js-scroll-trigger" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Bootstrap core JavaScript -->
  <script src="../../homeassets/vendor/jquery/jquery.min.js"></script>
  <script src="../../homeassets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="../../homeassets/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for this template -->
  <script src="../../homeassets/js/stylish-portfolio.min.js"></script>

</body>

</html>
