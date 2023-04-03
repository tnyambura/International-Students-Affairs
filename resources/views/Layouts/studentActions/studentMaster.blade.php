<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard || Student</title>
        <link href="../../asset/css/styles.css" rel="stylesheet"/>
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
        
    <style>
    
    </style>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="{{ __('MykppApplications')}}">STUDENT DASHBOARD</a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
            <!-- Navbar UserName-->
           <div class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0 text-capitalize" data-toggle="modal" data-target="#MyProfile_{{Auth::user()->id}}" role='button' style="color:white;">
                My Profile 
            </div>
            <!-- Navbar-->
            <!-- <ul class="navbar-nav ml-auto ml-md-0">                
             <a class="btn btn-success" href="{{ __('logout')}}">Logout</a> 
          </ul> -->
                <div class="dropdown ">
                    <div class="dropbtn d-flex align-items-center justify-content-center" style="width:50px; height:50px; border-radius:50%; object-fit:contain; overflow:hidden;" role="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img style="width:100%;" src="asset/img/logo.png" />
                    </div>
                    <!-- <div class="dropdown-content" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#">My Account</a>
                        <a class="dropdown-item btn-danger out" href="{{ __('logout')}}">Logout</a>
                    </div> -->
                </div>
            </div>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu d-flex flex-column justify-content-between">
                        <div class="nav">
                                <div class="sb-sidenav-menu-heading">Home</div>

                                <a class="nav-link" href="{{ __('dashboard')}}">
                                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                    Dashboard
                                </a>
                                <!-- Add a student list controller and view page-->
                                <a class="nav-link" href="{{ __('MykppApplications')}}">
                                    <div class="sb-nav-link-icon"><i class="fas fa-list"></i></div>
                                    My Student Pass Applications.
                                </a>
                                <a class="nav-link" href="{{ __('MyvisaextApplications')}}">
                                    <div class="sb-nav-link-icon"><i class="fas fa-list"></i></div>
                                    My Visa Extension Requests.
                                </a>
                                <a class="nav-link" href="{{ __('BuddyProgram')}}">
                                    <div class="sb-nav-link-icon"><i class="fas fa-clipboard-list"></i></div>
                                    Buddy Program
                                </a> 
                                <!-- Add a student list controller and view page-->
                                <a class="nav-link" href="{{ __('ApplyKpp')}}">
                                    <div class="sb-nav-link-icon"><i class="fas fa-marker"></i></div>
                                    Initiate a student pass Application.
                                </a>
                                <a class="nav-link" href="{{ __('ApplyVisa')}}">
                                    <div class="sb-nav-link-icon"><i class="fas fa-plus"></i></div>
                                    Initiate a Visa Extension Application.
                                </a>
                        </div>
                        <div class="sb-sidenav-footer mb-4 bg-danger">
                            <a class="out w-100" style='color:white' href="{{ __('logout')}}">Logout</a>
                        </div>
                    </div>
                </nav>
            </div>


             
            
               <div id="layoutSidenav_content">
                </main>
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

        <div class="modal fade " id="MyProfile_{{Auth::user()->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
            aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                            <div class="modal-header text-center">
                                <h4 class="modal-title w-100 font-weight-bold">{{Auth::user()->surname.' '.Auth::user()->other_names}}</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <i class="fas fa-table mr-1"></i>
                                Student Details
                                </div>
                                <div class="card-body">

                                    <form method="POST" action="{{route('add.editMyProfile')}}">
                                        @csrf
                                        <input type="hidden" name="cr_id" value="{{Auth::user()->id}}">
                                        <div class="form-group ">
                                            <label for="id">Admission No:</label>
                                            <input type="text" class="form-control" name="u_id" id="id" aria-describedby="idHelp" value="{{Auth::user()->id}}">
                                        </div>
                                        <div class="form-group d-flex justify-content-between">
                                            <div>
                                                <label for="surname">surname</label>
                                                <input type="text" class="form-control" name="sname" id="surname" value="{{Auth::user()->surname}}">
                                            </div>
                                            <div>
                                                <label for="othernames">other_names</label>
                                                <input type="text" class="form-control" name="oname" id="othernames" value="{{Auth::user()->other_names}}">
                                            </div>
                                        </div>
                                        <div class="form-group  d-flex justify-content-between">
                                            <div>
                                                <label for="email">email</label>
                                                <input type="text" class="form-control" name="email" id="email" value="{{Auth::user()->email}}">
                                            </div>
                                        @if($userData)
                                            <div>
                                                <label for="phone_no">phone number</label>
                                                <input type="text" class="form-control" name="phone" id="phone_no" value="{{$userData['phone_number']}}">
                                            </div>
                                        </div>
                                        <div class="form-group ">
                                            <label for="residence">Residence</label>
                                            <input type="text" class="form-control" name="residence" id="residence" value="{{$userData['residence']}}">
                                        </div>
                                        <div class="form-group  d-flex justify-content-between">
                                            <div>
                                                <label for="faculty">faculty</label>
                                                <input type="text" class="form-control" name="faculty" id="faculty" value="{{$userData['faculty']}}">
                                            </div>
                                            <div>
                                                <label for="course">course</label>
                                                <input type="text" class="form-control" name="course" id="course" value="{{$userData['course']}}">
                                            </div>
                                        </div>
                                        <div class="form-group  d-flex justify-content-around">
                                            <div>
                                                <label for="nationality">nationality</label>
                                                <input type="text" class="form-control" name="country" id="nationality" value="{{$userData['nationality']}}">
                                            </div>
                                            <div>
                                                <label for="passport_no">passport Number</label>
                                                <input type="text" class="form-control" name="passNo" id="passport_no" value="{{$userData['passport_number']}}">
                                            </div>
                                            <div>
                                                <label for="passport_ex">passport expire date</label>
                                                <input type="text" class="form-control" name="passEx" id="passport_ex" value="{{$userData['passport_expire_date']}}">
                                            </div>
                                        @endif
                                        </div>
                                        <span class='btn btn-info' id='change_pass' role='button'>Change Password</span>
                                        <input type="hidden" name="is_change_active" id="is_change_active" value="false">
                                        
                                        <div class='pass-change-form'>
                                            <div class='col'>
                                                <label for="old_pass">Old Password</label>
                                                <input type="password" class="form-control" name="old_pass" id="old_pass" disabled>
                                            </div>
                                            <div class="form-group  d-flex justify-content-between">

                                                <div class='col'>
                                                    <label for="new_pass">New Password</label>
                                                    <input type="password" class="form-control" name="new_pass" id="new_pass" disabled>
                                                </div>
                                                <div class='col'>
                                                    <label for="conf_pass">Confirm Password</label>
                                                    <input type="password" class="form-control" name="conf_pass" id="conf_pass" disabled>
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary" id='alterChanges'>Submit</button>
                                    </form>
                                    
                                </div>
                            </div>
                            <br/>
                        </div>
                    </div>
                </div>
       
        
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../../asset/js/scripts.js"></script>
        <script src="../../asset/js/script.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="../../asset/assets/demo/chart-area-demo.js"></script>
        <script src="../../asset/assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="../../asset/assets/demo/datatables-demo.js"></script>

        <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
        <script defer>
            $(document).ready(function() {

                $('body').find('#alterChanges').on('click',function(e){
                    e.preventDefault()
                    let status = false;
                    if($('body').find('#change_pass').hasClass('active')){
                        $('body').find('#change_pass').siblings('.pass-change-form').find('input').each(function(){
                            if($(this).val() == ''){
                                status = true
                            }
                        })
                    }
                    if(status){
                        alert('Password fields are empty!')
                    }else{
                        $(this).parent().submit()
                    }
                })
                
                $('body').find('#change_pass').on('click',function(e){
                    if($(this).hasClass('active')){
                        $(this).removeClass('active')
                        $(this).siblings('#is_change_active').val(false)
                        $(this).siblings('.pass-change-form').find('input').attr('disabled',true)
                        $(this).siblings('.pass-change-form').find('input').val('')
                        $(this).text('Change Password').slow()
                    }else{
                        $(this).addClass('active')
                        $(this).siblings('#is_change_active').val(true)
                        $(this).siblings('.pass-change-form').find('input').attr('disabled',false)
                        $(this).text('Discard Change').slow()
                    }
                })

            })
        </script>
    </body>
</html>

