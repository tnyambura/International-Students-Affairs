
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

<body id="page-top">

  <!-- Navigation -->
  <a class="menu-toggle rounded" href="#">
    <i class="fas fa-bars"></i>
  </a>
  <nav id="sidebar-wrapper" style="background-color:#00447D">
    <ul class="sidebar-nav">
      <li class="sidebar-brand">
        <a class="js-scroll-trigger" href="#page-top">Welcome</a>
      </li>
      @if(!Auth::user())
      <li class="sidebar-nav-item">
        <!-- <span class="nav-link" style='color:#fff' role='button' data-toggle="modal" data-target="#loginModal">Login</span> -->
        <a class="js-scroll-trigger" href="{{route('login')}}" >Login</a>
      </li>
      <li class="sidebar-nav-item">
        <a class="js-scroll-trigger" href="{{ __('signup')}}" >Register an International Student</a>
      </li>
      @else
      <li class="sidebar-nav-item">
        <a class="js-scroll-trigger" href="{{ route('dashboard')}}" >
        <span>My Account</span>
        <small class='text-muted'>{{Auth::user()->surname}}</small>
        </a>
      </li>
      @endif
    </ul>
  </nav>

  <!-- Header -->
  <header class="masthead d-flex" style="padding-top:20%">
    <div class="container text-center my-auto">
      <h2 class="mb-5" style="color:white; font-size:60px;">
        International Students affairs <span style="color:#E9292F">Portal</span>
      </h2>
      <a class="btn btn-primary btn-xl js-scroll-trigger" href="https://susa.strathmore.edu/our-services/international-students/" target="_blank">Find Out More</a>
      <p class="h6" style="color:#ffffff; padding-top:15%;">International Students Affairs © <?php echo Date('Y');?>. All right Reserved.<a class="text-green ml-2" href="#" target="_blank" style="color:#E9292F"></a></p>

    
    </div>   

  </header>
 
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
