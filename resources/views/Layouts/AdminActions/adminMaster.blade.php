<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard || Dashboard</title>
        <link href="asset/css/styles.css" rel="stylesheet"/>
        <link href="{{asset('css/app.css')}}" rel="stylesheet"/>
        <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous"> -->
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&display=swap"
        rel="stylesheet"
        />
        <link
        href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined"
        rel="stylesheet"
        />

       <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
            <div class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0 text-uppercase" style="color:white;">{{ Auth::user()->surname}}</div>
            <!-- <ul class="navbar-nav ml-auto ml-md-0">                
             <a class="btn btn-success" href="{{ __('logout')}}">Logout</a>                   
            </ul> -->
            <div class="dropdown ">
                <div class="dropbtn d-flex align-items-center justify-content-center" style="width:50px; height:50px; border-radius:50%; object-fit:contain; overflow:hidden;" role="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img style="width:100%;" src="asset/img/logo.png" />
                </div>
                <!-- <ul>
                    <li class="sub-item">
                    <span class="material-icons-outlined"> grid_view </span>
                    <p>Dashboard</p>
                    </li>
                </ul> -->
                
            </div>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark " id="sidenavAccordion">
                    <div class="sb-sidenav-menu d-flex flex-column justify-content-between">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Admin</div>
                            <a class="nav-link" href="{{ __('dashboard')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>   
                            <a class="nav-link" href="{{ __('ManageBuddies')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-clipboard-list"></i></div>
                                Manage Buddies
                            </a>                        
                            <a class="nav-link" href="{{ __('AddUser')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-plus"></i></div>
                                Add New User
                            </a>
                            <a class="nav-link" href="{{ __('listsofAllusers')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-list"></i></div>
                                List of all Users
                            </a>
                             <!-- Add a student list controller and view page-->
                             <a class="nav-link" href="{{ __('kppRequestList')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-marker"></i></div>
                                Visa Applications
                            </a>                            
                             <!-- <a class="nav-link" href="{{ __('kppRequestList')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-marker"></i></div>
                                Kpp Requests
                            </a>                            
                            <a class="nav-link" href="{{ __('VisaRequestList')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-marker"></i></div>
                                Extension Requests 
                            </a> -->
                            
                           
                    </div>
                    <div class="sb-sidenav-footer mb-4 bg-danger">
                        <a class="out w-100" style='color:white' href="{{ __('logout')}}">Logout</a>
                    </div>
                          
                </nav>
            </div>
       <div id="layoutSidenav_content">

    <main>
           @yield('content')
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
        <script>
                var deleteLinks = document.querySelectorAll('.delete');

                for (var i = 0; i < deleteLinks.length; i++) {
                deleteLinks[i].addEventListener('click', function(event) {
                    event.preventDefault();

                    var choice = confirm(this.getAttribute('data-confirm'));

                    if (choice) {
                        window.location.href = this.getAttribute('href');
                    }
                });
                }

        </script>      
        <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
        <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script> -->
        <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script> -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js" integrity="sha512-F636MAkMAhtTplahL9F6KmTfxTmYcAcjcCkyu0f0voT3N/6vzAuJ4Num55a0gEJ+hRLHhdz3vDvZpf6kqgEa5w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->
        <script src="../../asset/js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="../../asset/assets/demo/chart-area-demo.js"></script>
        <script src="../../asset/assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="../../asset/assets/demo/datatables-demo.js"></script>
        <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.min.js" integrity="sha384-heAjqF+bCxXpCWLa6Zhcp4fu20XoNIA98ecBC1YkdXhszjoejr5y9Q77hIrv8R9i" crossorigin="anonymous"></script> -->
    </body>
</html>
