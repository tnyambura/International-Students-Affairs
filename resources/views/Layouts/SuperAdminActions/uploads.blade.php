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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="{{ __('UploadedDocs')}}">ADMIN DASHBOARD</a>
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
                            <div class="sb-sidenav-menu-heading" style="font-size:16px">Home</div>
                            <a class="nav-link" href="{{ __('UploadedDocs')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <a class="nav-link" href="{{ __('EnrollNewUser')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-plus"></i></div>
                                Add a New User
                            </a>
                            <a class="nav-link" href="{{ __('RegisterNewStudent')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-plus"></i></div>
                                Add a New International Student
                            </a>
                            <a class="nav-link" href="{{ __('listsofAllUsers')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-list"></i></div>
                                List of all Users
                            </a>
                            <a class="nav-link" href="{{ __('listsofIS')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-list"></i></div>
                                List of International Students
                            </a>
                             <!-- Add a student list controller and view page-->
                             <a class="nav-link" href="{{ __('kppRequests')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-marker"></i></div>
                                Kpp Application Requests
                            </a>
                            <a class="nav-link" href="{{ __('VisaRequests')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-marker"></i></div>
                                Visa Extension Requests 
                                </a>
                            <a class="nav-link" href="{{ __('initiatedkpp')}}">
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
                    <div class="container-fluid"><br/>
                        <ol class="breadcrumb mb-4" style="background:#286DE7;">
                            <li class="breadcrumb-item active" style="color:white;">Uploaded Documents</li>
                        </ol>
                       
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                               Uploaded Documents.
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Admission</th>
                                                <th>Biodata</th>
                                                <th>Visa</th>
                                                <th>Passport Pic</th>
                                                <th>Academic Certs</th>
                                                <th>Good Conduct</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Admission</th>
                                                <th>Biodata</th>
                                                <th>Visa</th>
                                                <th>Passport Pic</th>
                                                <th>Academic Certs</th>
                                                <th>Good Conduct</th>
                                                <th>Actions</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <tr>
                                                <td>089654</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>

                                                <td>
                                                <a href="#" >
                                                    <span class="fas fa-eye" aria-hidden="false"></span>
                                                </a>
                                                                                                                                        
                                                </td>
                                            </tr>
                                      
                                          </tbody>
                                    </table>
                                </div>
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
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../../asset/js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="../../asset/assets/demo/chart-area-demo.js"></script>
        <script src="../../asset/assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="../../asset/assets/demo/datatables-demo.js"></script>
    </body>
</html>
