<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard || STUDENT</title>
        <link href="../../asset/css/styles.css" rel="stylesheet"/>
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="/studenthome">EDIT APPLICATION</a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
            <!-- Navbar UserName-->
           <div class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0 text-uppercase" style="color:white;">{{ Auth::user()->otherNAMES}}</div>
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto ml-md-0">                
             <a class="btn btn-success" href="{{ __('logout')}}">Logout</a> 
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Home</div>
                            <a class="nav-link" href="/studenthome">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <a class="nav-link" href="/MykppApplications">
                                <div class="sb-nav-link-icon"><i class="fas fa-list"></i></div>
                                My Student Pass Applications.
                            </a>
                            <a class="nav-link" href="/MyvisaextApplications">
                                <div class="sb-nav-link-icon"><i class="fas fa-list"></i></div>
                                My Visa Extension Requests.
                            </a>
                             <!-- Add a student list controller and view page-->
                             <a class="nav-link" href="/ApplyKpp">
                                <div class="sb-nav-link-icon"><i class="fas fa-marker"></i></div>
                                Initiate a student pass Application.
                            </a>
                            <a class="nav-link" href="/ApplyVisa">
                                <div class="sb-nav-link-icon"><i class="fas fa-plus"></i></div>
                                Initiate a Visa Extension Application.
                            </a>
                            <a class="nav-link" href="/MyIssuedKpp">
                                <div class="sb-nav-link-icon"><i class="fas fa-file"></i></div>
                                Copies of My initial student Passes.
                            </a>
                           
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        {{ Auth::user()->otherNAMES}}                   

                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                <div class="container-fluid"><br/>
                        <ol class="breadcrumb mb-4" style="background:#286DE7;">
                            <li class="breadcrumb-item active" style="color:white;">Kenyan Student Pass Application Request</li>
                        </ol>             
                        @if(Session::has('kpp_updated_successfully'))
                        <div class="alert alert-success" role="alert">
                        {{Session::get('kpp_updated_successfully')}}
                        </div>
                        @endif
                        @if(Session::has('kpp_request_fail'))
                        <div class="alert alert-danger" role="alert">
                        {{Session::get('kpp_request_fail')}}
                        </div>
                        @endif
                        @if(Session::has('kpp_request_ongoing'))
                        <div class="alert alert-danger" role="alert">
                        {{Session::get('kpp_request_fail')}}
                        </div>
                        @endif
                            <form method="POST" action="/MyAppEDIT/{id}" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <h4>BIODATA SECTION</h4><br/>
                                <div class="form-row">
                                
                                    <input type="hidden" class="form-control" name="id" id="id" value="{{ $data->id}}"
                                         required>                                    
                                    
                                    <div class="col-md-4 mb-3">
                                    <label for="Surname">NOM (SURNAME)</label>
                                    <input type="text" class="form-control" name="surNAME" id="Surname" value="{{ $data->surNAME}}"
                                         required>
                                    
                                    </div>
                                    <div class="col-md-4 mb-3">
                                    <label for="othernames">Prenom (Other Names)</label>
                                    <input type="text" class="form-control" name="otherNAMES" id="othernames" value="{{$data->otherNAMES}}"
                                         required>
                                    
                                    </div>
                                    <div class="col-md-4 mb-3">
                                    <label for="validationServerUsername33">Passport Number</label>
                                    <input type="text" name="passportNUMBER" class="form-control" id="validationServer023" value="{{$data->passportNUMBER}}"
                                         required>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-4 mb-3">
                                    <label for="AdmissionNo">Admission Number</label>
                                    <input type="number" name="suID" class="form-control" id="admissionNo" value="{{ $data->suID}}" readonly="readonly"/>
                                    
                                    </div>
                                    <div class="col-md-4 mb-3">
                                    <label for="Course">Course</label>
                                    <input type="text" name="Course" class="form-control" id="course" value="{{ $data->Course}}"
                                         required>
                                    
                                    </div>
                                    <div class="col-md-4 mb-3">
                                    <label for="Residence">Residence</label>
                                    <input type="text" name="Residence" class="form-control" id="Residence" value="{{ $data->Residence}}"
                                         required>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6 mb-3">
                                    <label for="email">Email Address</label>
                                    <input type="text" name="suEMAIL" class="form-control" id="email" value="{{ $data->suEMAIL}}"
                                        required>
                                  </div>
                                    <div class="col-md-3 mb-3">
                                    <label for="Nationality">Nationality</label>
                                    <input type="text" name="Nationality" class="form-control" id="Nationality" value="{{ $data->Nationality}}"
                                        required>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                    <label for="EntryDate">Date of Entry</label>
                                    <input type="date" name="dateofENTRY" class="form-control" id="Entrydate" value="{{ $data->dateofENTRY}}" 
                                        required>                                    
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6 mb-3">
                                    <label for="PhoneNumber">Kenyan Phone Number</label>
                                    <input type="number" name="phoneNUMBER" class="form-control" id="PhoneNumber" value="{{ $data->phoneNUMBER}}"
                                        required>
                                    </div> 
                                    <div class="col-md-6 mb-3">
                                    <label for="Faculty">Faculty</label>
                                    <input type="text" name="Faculty" class="form-control" id="Faculty" value="{{ $data->Faculty}}"
                                        required>
                                    </div>                                      
                                </div></br>
                                
                                <h4>DOCUMENTS UPLOADS</h4><br/>
                                <p><span style="color:red;">* Make sure you attach clear copies of all the required documents<span></p><br/>

                                <div class="form-row">                                    
                                    <div class="col-md-4 mb-3">
                                    <label for="email">Upload your Passport Sized Picture</label>
                                    <input type="file" name="passportPICTURE" class="form-control" id="passportPICTURE" value="{{old('passportPICTURE',$data->passportPICTURE)}}" required>
                                    <a href="/NewkppAPPFILEDOWNLOAD/{{$data->passportPICTURE}}" style="color:green">
                                    <span class="fas fa-eye" aria-hidden="false" style="color:green"></span> Download</a> </li>
                                    </div>  
                                    <div class="col-md-4 mb-3">
                                    <label for="email">Upload Passport Biodata Page</label>
                                    <input type="file" name="biodataPAGE" class="form-control" id="biodataPAGE" value="{{old('biodataPAGE',$data->passportPICTURE)}}" required>

                                   <a href="/NewkppAPPFILEDOWNLOAD/{{$data->biodataPAGE}}" style="color:green">
                                    <span class="fas fa-eye" aria-hidden="false" style="color:green"></span> Download</a> </li>                                  
                                    </div>                                    
                                    <div class="col-md-4 mb-3">
                                    <label for="Current Visa">Upload Current Visa</label>
                                    <input type="file" name="currentVISA" class="form-control" id="currentVISA" value="{{old('currentVISA',$data->passportPICTURE)}}" required>
                                    <a href="/NewkppAPPFILEDOWNLOAD/{{$data->currentVISA}}" style="color:green">
                                    <span class="fas fa-eye" aria-hidden="false" style="color:green"></span> Download</a> </li>                         
                                     </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-4 mb-3">
                                    <label for="ParentBiodata">Upload Parent/Guardians Passport Biodata Page</label>
                                    <input type="file" name="guardiansID" class="form-control" id="guardiansID" value="{{old('guardiansID',$data->passportPICTURE)}}" required>
                                    <a href="/NewkppAPPFILEDOWNLOAD/{{$data->guardiansID}}"style="color:green" >
                                    <span class="fas fa-eye" aria-hidden="false" style="color:green"></span> Download</a> </li>
                                  </div>
                                    <div class="col-md-4 mb-3">
                                    <label for="CommitmentLetter">Commitment Letter</label>
                                    <input type="file" name="commitmentLETTER" class="form-control" id="commitmentLETTER" placeholder="{{ $data->commitmentLETTER}}" value="{{old('commitmentLETTER')}}"
                                    required >
                                    <a href="/NewkppAPPFILEDOWNLOAD/{{$data->commitmentLETTER}}" style="color:green">
                                    <span class="fas fa-eye" aria-hidden="false" style="color:green"></span> Download</a> </li> 
                                   
                                    </div>
                                    <div class="col-md-4 mb-3">
                                    <label for="Academic Transcripts">Academic Transcripts</label>
                                    <input type="file" name="academicTRANSCRIPTS" class="form-control" id="academicTRANSCRIPTS" placeholder="{{ $data->academicTRANSCRIPTS}}" required
                                     >
                                    <a href="/NewkppAPPFILEDOWNLOAD/{{$data->academicTRANSCRIPTS}}" style="color:green">
                                    <span class="fas fa-eye" aria-hidden="false" style="color:green"></span> Download</a> </li>                                
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-4 mb-3">
                                    <label for="goodconduct">Valid Police Clearance/Good Conduct Certificate</label>
                                    <input type="file" name="policeCLEARANCE" class="form-control" id="policeCLEARANCE" value="{{ $data->policeCLEARANCE}}" required
                                 >
                                    <a href="/NewkppAPPFILEDOWNLOAD/{{$data->policeCLEARANCE}}" style="color:green">
                                    <span class="fas fa-eye" aria-hidden="false" style="color:green"></span> Download</a> </li>  
                                  </div>                                   
                                </div>
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input is-valid" id="invalidCheck33" required>
                                    <label class="custom-control-label" for="invalidCheck33">All the Information provided is to the best of my Knowledge</label>
                                    <div class="valid-feedback">
                                        You must agree before submitting.
                                    </div>
                                    </div>
                                    <div class="invalid-feedback">
                                    You must agree before submitting.
                                    </div>
                                </div>
                                <button class="btn btn-primary" type="submit">Update Record</button>
                                </form>   
                            </div>   
               </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy;Office of the International Students Affairs <?php echo date('Y'); ?></div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/js/bootstrapValidator.min.js"/>
   
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../../asset/js/scripts.js"></script>
        <script src="../../asset/js/script.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="../../asset/assets/demo/chart-area-demo.js"></script>
        <script src="../../asset/assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="../../asset/assets/demo/datatables-demo.js"></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    </body>
</html>
