
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

<body id="page-top" style="width: 100vw; height:100: 100vh">

  <main class="row w-100 h-100">
    <header class="col-8 masthead d-flex " style="position:relative; padding-top: 10px">
      <div class="container text-center my-auto h-100 w-100 " style='position:absolute; top:0; left:0; background: rgba(58,93,174,.4);'>
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
            <form class="form-signin w-100" method="POST" action="{{ route('login') }}">
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
  </main>

  
  
 
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
