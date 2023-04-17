
<script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
        <script defer>
            $(document).ready(function() {
                setTimeout(function(){
                    if("{{Session::has('New_Student_Added')}}"){
                        window.location.href = '/login'
                    }
                },2500)

            })
        </script>
</html>

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

<body id="page-top" style="width: 100vw; height: 100vh; overflow:hidden;">

  <main class="row m-0 w-100 h-100">
    <header class="col-6 masthead d-flex " style="position:relative; padding-top: 10px">
        <div class="container text-center my-auto h-100 w-100 " style='position:absolute; top:0; left:0; background: rgba(58,93,174,.4);'>
            <div style=''>
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
        </div>   

    </header>
    <div class="col mb-2 px-4 h-100 pb-4" style="overflow: auto;">
        
        <h2 class="mb-2" style="color:#000; text-align:center; font-size:30px;">
            Sign Up
        </h2>
        <div class="container-fluid h-100"><br/>
            @if(Session::has('New_Student_Added'))
            <div class="alert alert-success" role="alert">
            {{Session::get('New_Student_Added')}}
            </div>
            @endif
            @if(Session::has('New_Student_failed'))
            <div class="alert alert-danger" role="alert">
            {{Session::get('New_Student_failed')}}
            </div>
            @endif
            <form method="POST"  class='new-student-form mb-4' action="{{route('Add.signup')}}" style='overflow:auto; '>
                @csrf
                <div class="form-row">
                    <div class="col-md-4 mb-3">
                    <label for="Surname">NOM(SURNAME)</label>
                    <input type="text" maxlength="50" class="form-control" name ="surNAME" id="surNAME" placeholder="Surname"
                            required>
                    
                    </div>
                    <div class="col-md-4 mb-3">
                    <label for="fNAME">First Name</label>
                    <input type="text" maxlength="50" class="form-control" name ="firstNAME" id="firstNAME" placeholder="First Name"
                            required>                                    
                    </div>
                    <div class="col-md-4 mb-3">
                    <label for="lNAME">Last Name</label>
                    <input type="text" maxlength="50" class="form-control" name ="lastNAME" id="lastNAME" placeholder="Last Name"
                            required>                                    
                    </div>                                    
                </div>
                <div class="form-row">
                    <div class="col-md-4 mb-3">
                    <label for="suID">SU Id</label>
                    <input type="number" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==8) return false;" class="form-control" name ="id" id="suID" placeholder="Admission Number"
                            required>
                    
                    </div>
                    <div class="col-md-4 mb-3">
                    <label for="Course">Course</label>
                    <input type="text" maxlength="50" class="form-control" name ="Course" id="Course" placeholder="Course of Study"
                            required>
                    
                    </div>
                    <div class="col-md-4 mb-3">
                    <label for="Faculty">Faculty</label>
                    <input type="text" maxlength="50" class="form-control"  name ="Faculty" id="Faculty" placeholder="Faculty"
                            required>
                    
                    </div>
                    
                </div>
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                    <label for="email">Email Address</label>
                    <input type="text" class="form-control" name ="email" id="suEMAIL" placeholder="Email"
                        required>
                    </div>
                    <div class="col-md-3 mb-3">
                    <label for="Nationality">Country</label>
                    <select class='form-control' name ="Nationality" id="Nationality" required>
                        <option>--Select--</option>
                        @foreach($countries as $country)
                            <option value='{{$country}}'>{{$country}}</option>
                        @endforeach
                    </select>
                    </div>
                    <div class="col-md-3 mb-3">
                    <label for="validationServerUsername33">Passport No</label>
                    <input type="text" class="form-control" maxlength='15' id="validationServer023" name ="passport_number" placeholder="Passport Number"
                            required>
                    </div>    
                    <div class="col mb-3">
                    <label for="validationServerUsername33">Passport Expiry Date</label>
                    <input type="date" class="form-control" min='{{date("Y-m-d",strtotime("+1 year"))}}' id="validationServer023" name ="passport_expire" placeholder="Passport Expire Date"
                            required>
                    </div>    
                </div>
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                    <label for="PhoneNumber">Kenyan Phone Number</label>
                    <input type="number" class="form-control" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==13) return false;" id="phoneNUMBER" name ="phoneNUMBER" placeholder="(+254) 700 000000"
                        required>
                    </div>    
                    <div class="col-md-4 mb-3">
                    <label for="Residence">Residence</label>
                    <input type="text" class="form-control" maxlength="100" name ="Residence" id="Residence" placeholder="Residence"
                            required>
                    </div>                         
                </div><br>

                <div><h4>PARENTS DETAIL</h4></div>
                <div class="form-row">
                    
                    <div class="col-md-4 mb-3">
                    <label for="ParentNames">Your parents Names</label>
                    <input type="text" class="form-control" id="ParentNames" name ="ParentNames" placeholder="Full Names "
                        required>
                    </div>
                    <div class="col-md-4 mb-3">
                    <label for="ParentEmail">Email</label>
                    <input type="text" class="form-control" name ="ParentEmail" id="ParentEmail" placeholder="Parents Email"
                            required>
                    </div>  
                    
                    <div class="col-md-4 mb-3">
                    <label for="ParentPhone">Phone No</label>
                    <input type="number" class="form-control" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==13) return false;" id="ParentPhone" name ="ParentPhone" placeholder="Parent Phone Number"
                        required>
                    </div>
                    
                </div>
                
                <div class="row">
                    <input class="col btn btn-success" value="Save details" type="submit" />
                    <a href="/" class="col-6 text-center new-account ml-5">Login to my account </a>
                </div>
            </form>
        </div>
            <!-- <a href="/signup" class="text-center new-account">Create an account </a> -->
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
