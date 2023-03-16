<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard || ADMIN</title>
        <link href="../../asset/css/styles.css" rel="stylesheet"/>
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="#">STUDENT PROFILE</a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <div class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0 text-uppercase" style="color:white;">{{ Auth::user()->otherNAMES}}</div>
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto ml-md-0">                
             <a class="btn btn-success" href="/logout">Logout</a>                   
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Home</div>
                            <a class="nav-link" href="/dashboard">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <a class="nav-link" href="/ManageBuddies">
                                <div class="sb-nav-link-icon"><i class="fas fa-clipboard-list"></i></div>
                                Manage Buddies
                            </a>  
                            <a class="nav-link" href="/AddUser">
                                <div class="sb-nav-link-icon"><i class="fas fa-plus"></i></div>
                                Add New User
                            </a>                                              
                            
                            <a class="nav-link" href="/AddNewInternationalStudent">
                                <div class="sb-nav-link-icon"><i class="fas fa-plus"></i></div>
                                Add New International Student
                            </a>  
                           
                            <!-- Add a student list controller and view page-->
                            <a class="nav-link" href="/listofIS">
                                <div class="sb-nav-link-icon"><i class="fas fa-list"></i></div>
                                List of International Students
                            </a>
                             <!-- Add a student list controller and view page-->
                             <a class="nav-link" href="/kppRequestList">
                                <div class="sb-nav-link-icon"><i class="fas fa-marker"></i></div>
                                Kpp Application Requests
                            </a>
                            <a class="nav-link" href="/VisaRequestList">
                                <div class="sb-nav-link-icon"><i class="fas fa-marker"></i></div>
                                Visa Extension Requests 
                            </a>
                            
                            <a class="nav-link" href="/initiatedkpps'">
                                <div class="sb-nav-link-icon"><i class="fas fa-check"></i></div>
                                Initiated Applications
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
                    <div class="container-fluid"></br>  
                        <ol class="breadcrumb mb-4" style="background:#286DE7;">
                            <li class="breadcrumb-item active" style="color:white;">New International Student Details</li>
                        </ol> 
                        <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-table mr-1"></i>
                                    A New International Student Records.
                                    </div>
                                    <div class="card-body">  
                                                                          
                                     <div class="form-row">
                                            <div class="col-md-4 mb-3">                                                
                                            <label for="Surname">Surname:</label>
                                            <input type="text" class="form-control" name ="surNAME" id="surNAME" value="{{ $data->surNAME}}">
                                            </div>

                                            <div class="col-md-4 mb-3">                                          
                                            <label for="Othernames">First Name:</label>
                                            <input type="text" class="form-control" name ="firstNAME" id="firstNAME" value="{{ $data->firstNAME}}">                                                                   
                                            </div>

                                            <div class="col-md-4 mb-3">                                          
                                            <label for="firstNAME">Last Name:</label>
                                            <input type="text" class="form-control" name ="lastNAME" id="lastNAME" value="{{ $data->lastNAME}}">                                                                   
                                            </div>
                                                                      
                                     </div><br/>

                                     <div class="form-row">
                                            <div class="col-md-4 mb-3">                                                
                                            <label for="PassportNumber">Passport Number:</label>
                                            <input type="text" class="form-control" name ="passportNUMBER" id="passportNUMBER" value="{{ $data->passportNUMBER}}">
                                            </div>

                                            <div class="col-md-4 mb-3">                                          
                                            <label for="dateofENTRY">Nationality:</label>
                                            <input type="text" class="form-control" name ="Nationality" id="Nationality" value="{{ $data->Nationality}}">                                                                   
                                            </div>

                                            <div class="col-md-4 mb-3">                                          
                                            <label for="suID">Strathmore ID:</label>
                                            <input type="number" class="form-control" name ="suID" id="suID" value="{{ $data->suID}}">                                                                   
                                            </div>
                                                                      
                                     </div><br/>

                                     <div class="form-row">
                                            <div class="col-md-4 mb-3">                                                
                                            <label for="phoneNUMBER">Phone Number:</label>
                                            <input type="text" class="form-control" name ="phoneNUMBER" id="phoneNUMBER" value="{{ $data->phoneNUMBER}}">
                                            </div>

                                            <div class="col-md-4 mb-3">                                          
                                            <label for="dateofENTRY">Date Registration:</label>
                                            <input type="text" class="form-control" name ="created_at" id="created_at" value="{{ $data->created_at}}">                                                                   
                                            </div>

                                            <div class="col-md-4 mb-3">                                          
                                            <label for="Course">Course:</label>
                                            <input type="text" class="form-control" name ="Course" id="Course" value="{{ $data->Course}}">                                                                   
                                            </div>
                                                                      
                                     </div><br/>

                                     <div class="form-row">
                                            <div class="col-md-4 mb-3">                                                
                                            <label for="Faculty">Faculty:</label>
                                            <input type="text" class="form-control" name ="Faculty" id="Faculty" value="{{ $data->Faculty}}">
                                            </div>

                                            <div class="col-md-4 mb-3">                                          
                                            <label for="ParentEmail">Parent Email:</label>
                                            <input type="email" class="form-control" name ="ParentEmail" id="ParentEmail" value="{{ $data->ParentEmail}}">                                                                   
                                            </div>

                                            <div class="col-md-4 mb-3">                                          
                                            <label for="ParentPhone">Parent Phone:</label>
                                            <input type="number" class="form-control" name ="ParentPhone" id="ParentPhone" value="{{ $data->ParentPhone}}">                                                                   
                                            </div>
                                                                      
                                     </div><br/>

                                     <div class="form-row">
                                            <div class="col-md-4 mb-3">                                          
                                            <label for="ParentNames">Parent Names:</label>
                                            <input type="text" class="form-control" name ="ParentNames" id="ParentNames" value="{{ $data->ParentNames}}">                                                                   
                                            </div>
                
                                     </div><br/>

                                   <button class="btn btn-primary" ><a href="/listofIS" style="color:white;">Close</a></button>

                                  </div>
                              </div>
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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="../../asset/assets/demo/chart-area-demo.js"></script>
        <script src="../../asset/assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="../../asset/assets/demo/datatables-demo.js"></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    </body>
</html>
