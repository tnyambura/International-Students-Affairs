
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

<body id="page-top">

    <div class='loader-load-container d-none align-items-center justify-content-center position-fixed' style='top:0;left:0'>
        <div class='loader-load d-flex align-items-center justify-content-center'>
            <img src="asset/img/isa_logo.png" />
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
        <h2 class='form-title'>SU Portal | Register </h2>

        @if(Session::has('download_fail') )
        <div class="alert alert-danger" role="alert">
        {{Session::get('download_fail')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        @endif
        <x-auth-validation-errors class="breadcrumb py-0 mb-4 d-flex align-items-center bg-danger" style="color:#fff; text-align:left;" :errors="$errors" />

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
                <form method="POST"  action="{{route('Add.signup')}}">
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
                                    @foreach($courses as $v)
                                        <option value='{{$v[0]}}'>{{$v[0].' ('.$v[1].')'}}</option>
                                    @endforeach
                                </select>
                            </div>
                        
                        </div>
                        <div class="col-lg-6 mb-4">
                            <div class="form-outline">
                                <label for="Faculty">Faculty</label>
                                <select class='form-control' name ="Faculty" id="Faculty" required>
                                    <option>--Select--</option>
                                    @foreach($faculties as $v)
                                        <option value='{{$v}}'>{{$v}}</option>
                                    @endforeach
                                </select>
                            </div>
                        
                        </div>
                        
                    </div>
                    <div class="form-row">
                        <div class="col-lg mb-3">
                        <label for="Nationality">Country</label>
                        <select class='form-control' name ="Nationality" id="Nationality" required>
                            <option>--Select--</option>
                            @foreach($countries as $country)
                                <option value='{{$country}}'>{{$country}}</option>
                            @endforeach
                        </select>
                        </div>
                        <div class="col-lg mb-3">
                        <label for="validationServerUsername33">Passport No</label>
                        <input type="text" class="form-control" maxlength='15' id="validationServer023" name ="passport_number" placeholder="Passport Number"
                                required>
                        </div>    
                        <div class="col-lg mb-3">
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

                    <button type="submit" style='background: rgb(199, 140, 22) !important; color:#fff; outline:transparent;' class="btn w-100 mb-4">
                Register
                </button>
                </form>
            <div class="col-lg w-100 justify-content-center align-items-center position-relative" >
        
        
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

