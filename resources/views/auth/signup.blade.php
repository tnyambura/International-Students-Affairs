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

<body id="page-top" style="width: 100vw; height:100: 100vh">


  <!-- Section: Design Block -->
<section class="text-center" style='background: rgb(58,93,174)'>
  <!-- Background image -->
  <div class="p-5 bg-image" style="
        background-image: url('homeassets/img/bg-masthead.jpg');
        background-position: center;
        background-repeat: no-repeat;
        background-origin: content-box;
        height: 300px;
        "></div>
  <!-- Background image -->

  <div class="row row-cols-auto mx-4 shadow-5-strong justify-content-center" style="
        margin-top: -100px;
        background: hsla(0, 0%, 100%, 0.8);
        backdrop-filter: blur(30px);
        min-height: calc(100vh - 200px);
        border-radius: 10px 10px 0 0;
        ">
    <div class="col-md-6 d-flex flex-column align-items-center">
      <img class="card-img-top" style="max-width: 28rem;" src="../../asset/img/logo.png" alt="Card image cap" style="size:14rem">
      <h2 style="text-align:center;"><span style="font-weight:bold;">International students Portal</span></h2>
    </div>
    @php
    $facultiesArray = ['SCESA'];
    $coursesArray = ['BBIT','BCOM','DBIT'];
    @endphp
    <div class="col py-5 px-md-5">
          <h2 class="fw-bold mb-5">Sign Up</h2>
          <x-auth-validation-errors class="breadcrumb py-0 mb-4 d-flex align-items-center" style="color:#fff; background:#113C7A;" :errors="$errors" />

          @if(Session::has('New_Student_Added'))
            <div class="alert alert-success" role="alert">
            {{Session::get('New_Student_Added')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            @endif
            @if(Session::has('New_Student_failed'))
            <div class="alert alert-danger" role="alert">
            {{Session::get('New_Student_failed')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            @endif
            <form method="POST"  action="{{route('Add.signup')}}" style='overflow:auto; '>
                @csrf
                <div class="form-row">
                    <div class="col-lg-6 mb-4">
                        <div class="form-outline">
                            <label for="Surname">NOM(SURNAME)</label>
                            <input type="text" maxlength="50" class="form-control" name ="surNAME" id="surNAME" placeholder="Surname"
                            required>
                        </div>
                    
                    </div>
                    <div class="col-lg-6 mb-4">
                        <div class="form-outline">
                            <label for="oNAME">Other Names</label>
                            <input type="text" maxlength="50" class="form-control" name ="otherNAMES" id="oNAME" placeholder="Other Names"
                            required>                                    
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-lg-3 mb-4">
                        <div class="form-outline">
                            <label for="suID">SU Id</label>
                            <input type="number" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==8) return false;" class="form-control" name ="id" id="suID" placeholder="Admission Number"
                            required>
                        </div>
                    </div>
                    <div class="col-lg-3 mb-4">
                        <label for="gender">Gender</label>
                        <select class='form-control' name ="gender" id="gender" required>
                            <option value='m'>Male</option>
                            <option value='f'>Female</option>
                        </select>
                    </div>
                    <div class="col-lg-6 mb-4">
                        <div class="form-outline">
                            <label for="suEMAIL">SU Email Address</label>
                            <input type="text" class="form-control" name ="email" id="suEMAIL" placeholder="Email"
                            required>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    
                    <div class="col-lg-6 mb-4">
                        <div class="form-outline">
                            <label for="Course">Course</label>
                            <select class='form-control' name ="Course" id="Course" required>
                                <option>--Select--</option>
                                @foreach($coursesArray as $v)
                                    <option value='{{$v}}'>{{$v}}</option>
                                @endforeach
                            </select>
                        </div>
                    
                    </div>
                    <div class="col-lg-6 mb-4">
                        <div class="form-outline">
                            <label for="Faculty">Faculty</label>
                            <select class='form-control' name ="Faculty" id="Faculty" required>
                                <option>--Select--</option>
                                @foreach($facultiesArray as $v)
                                    <option value='{{$v}}'>{{$v}}</option>
                                @endforeach
                            </select>
                        </div>
                    
                    </div>
                    
                </div>
                <div class="form-row">
                    <div class="col mb-3">
                    <label for="Nationality">Country</label>
                    <select class='form-control' name ="Nationality" id="Nationality" required>
                        <option>--Select--</option>
                        @foreach($countries as $country)
                            <option value='{{$country}}'>{{$country}}</option>
                        @endforeach
                    </select>
                    </div>
                    <div class="col mb-3">
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
                    <div class="col-lg-6 mb-4">
                        <div class="form-outline">
                            <label for="PhoneNumber">Kenyan Phone Number</label>
                            <input type="number" class="form-control" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==13) return false;" id="phoneNUMBER" name ="phoneNUMBER" placeholder="(+254) 700 000000"
                                required>
                        </div>
                    </div>    
                    <div class="col-lg-6 mb-4">
                        <div class="form-outline">
                            <label for="Residence">Residence</label>
                            <input type="text" class="form-control" maxlength="100" name ="Residence" id="Residence" placeholder="Residence"
                            required>
                        </div>
                    </div>                         
                </div><br>

                <div>
                    <h4>PARENTS DETAIL</h4>
                    <!-- Checkbox -->
                    <div class="form-check d-flex mb-4">
                        <input class="form-check-input me-2" type="checkbox" value="Applicable" id="notApplicable" />
                        <label class="form-check-label" for="notApplicable">
                            Not Applicable
                        </label>
                    </div>
                </div>
                <div class="form-row parent-details">
                    
                    <div class="col-lg-6 mb-4">
                        <div class="form-outline">
                            <label for="ParentNames">Your parents Names</label>
                            <input type="text" class="form-control" id="ParentNames" name ="ParentNames" placeholder="Full Names "
                            required>
                        </div>
                    </div>
                    <div class="col-lg-6 mb-4">
                        <div class="form-outline">
                            <label for="ParentEmail">Email</label>
                            <input type="text" class="form-control" name ="ParentEmail" id="ParentEmail" placeholder="Parents Email"
                            required>
                        </div>
                    </div>  
                    
                    <div class="col-lg-6 mb-4">
                        <div class="form-outline">
                            <label for="ParentPhone">Phone No</label>
                            <input type="number" class="form-control" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==13) return false;" id="ParentPhone" name ="ParentPhone" placeholder="Parent Phone Number"
                            required>
                        </div>
                    </div>
                    
                </div>

                <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
                <script defer>
                    $(document).ready(function() {
                        setTimeout(function(){
                            if("{{Session::has('New_Student_Added')}}"){
                                window.location.href = '/'
                            }
                        },2500)

                        $('#notApplicable').on('click',function(){
                            if($(this).is(':checked')){
                                $(this).val('notApplicable')
                                $('.parent-details').find('input').prop('disabled',true)
                            }else{
                                $(this).val('Applicable')
                                $('.parent-details').find('input').prop('disabled',false)
                            }
                        })

                    })
                </script>
                
                <!-- <div class="row">
                    <input class="col btn btn-success" value="Save details" type="submit" />
                    <a href="/" class="col-6 text-center new-account ml-5">Login to my account </a>
                </div> -->

                <button type="submit" class="btn btn-primary btn-block mb-4">
              Next
            </button>

            <!-- Register buttons -->
                <div class="text-center">
                    <p>More links:</p>
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
                    <a href="/" class="btn btn-link btn-floating mx-1 my-2">
                        <i class="fab fa-github"></i> Login
                    </a>
                </div>
            </form>
        <!-- </div>
      </div> -->
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

