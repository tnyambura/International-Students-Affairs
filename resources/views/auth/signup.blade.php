<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>REGISTRATION</title>
        <link href="../../asset/css/styles.css" rel="stylesheet"/>
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
            <main >
                <div class="container-fluid" ><br/>
                        <ol class="breadcrumb mb-4" style="background:#286DE7;">
                            <li class="breadcrumb-item active" style="color:white;">Welcome to the New International Student Registration Portal</li>
                        </ol>             
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
                        <form method="POST"  class='new-student-form' action="{{route('Add.signup')}}">
                            @csrf
                                <div class="form-row">
                                    <div class="col-md-4 mb-3">
                                    <label for="Surname">NOM (SURNAME)</label>
                                    <input type="text" class="form-control" name ="surNAME" id="surNAME" placeholder="Surname"
                                         required>
                                    
                                    </div>
                                    <div class="col-md-4 mb-3">
                                    <label for="fNAME">First Name</label>
                                    <input type="text" class="form-control" name ="firstNAME" id="firstNAME" placeholder="First Name"
                                         required>                                    
                                    </div>
                                    <div class="col-md-4 mb-3">
                                    <label for="lNAME">Last Name</label>
                                    <input type="text" class="form-control" name ="lastNAME" id="lastNAME" placeholder="Last Name"
                                         required>                                    
                                    </div>                                    
                                </div>
                                <div class="form-row">
                                    <div class="col-md-4 mb-3">
                                    <label for="suID">Admission Number</label>
                                    <input type="number" class="form-control" name ="id" id="suID" placeholder="Admission Number"
                                         required>
                                    
                                    </div>
                                    <div class="col-md-4 mb-3">
                                    <label for="Course">Course</label>
                                    <input type="text" class="form-control" name ="Course" id="Course" placeholder="Course of Study"
                                         required>
                                    
                                    </div>
                                    <div class="col-md-4 mb-3">
                                    <label for="Faculty">Faculty</label>
                                    <input type="text" class="form-control"  name ="Faculty" id="Faculty" placeholder="Faculty"
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
                                    <label for="validationServerUsername33">Passport Number</label>
                                    <input type="text" class="form-control" id="validationServer023" name ="passport_number" placeholder="Passport Number"
                                         required>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                    <label for="validationServerUsername33">Passport Expire</label>
                                    <input type="date" class="form-control" id="validationServer023" name ="passport_expire" placeholder="Passport Expire Date"
                                         required>
                                    </div>    
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6 mb-3">
                                    <label for="PhoneNumber">Kenyan Phone Number</label>
                                    <input type="number" class="form-control" id="phoneNUMBER" name ="phoneNUMBER" placeholder="(+254) 700 000000"
                                        required>
                                    </div>    
                                    <div class="col-md-4 mb-3">
                                    <label for="Residence">Residence</label>
                                    <input type="text" class="form-control" name ="Residence" id="Residence" placeholder="Residence"
                                         required>
                                    </div>                         
                                </div><br>

                                <div><h4>PARENTS DETAIL</h4></div>
                                <div class="form-row">
                                   
                                    <div class="col-md-4 mb-3">
                                    <label for="ParentEmail">Parent Email</label>
                                    <input type="text" class="form-control" name ="ParentEmail" id="ParentEmail" placeholder="Parents Email"
                                         required>
                                    </div>  
                                    
                                    <div class="col-md-4 mb-3">
                                    <label for="ParentPhone">Your parents Phone Number</label>
                                    <input type="number" class="form-control" id="ParentPhone" name ="ParentPhone" placeholder="Parent Phone Number"
                                        required>
                                    </div>
                                    
                                    <div class="col-md-4 mb-3">
                                    <label for="ParentNames">Your parents Names</label>
                                    <input type="text" class="form-control" id="ParentNames" name ="ParentNames" placeholder="Full Names "
                                        required>
                                    </div>
                                </div>
                               
                                <input class="btn btn-success" value="Save details" type="submit" />
                        </form>
                        <a href="/login" class="text-center new-account">Login to my account </a>
                            </div>   
               </main>


               <footer class="footer text-center " style="background-color:black">
    <div class="container">
     
    <div class="row">
				
    </div>

  </footer>
  

   <!-- Bootstrap core JavaScript -->
  <script src="../../homeassets/vendor/jquery/jquery.min.js"></script>
  <script src="../../homeassets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="../../homeassets/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for this template -->
  <script src="../../homeassets/js/stylish-portfolio.min.js"></script>

</body>

</html>
