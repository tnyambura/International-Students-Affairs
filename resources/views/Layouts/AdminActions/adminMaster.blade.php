<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard || {{$title}}</title>
        <link href="asset/css/styles.css" rel="stylesheet"/>
        <link href="asset/css/progress.css" rel="stylesheet"/>
        <link href="asset/css/custom_select.css" rel="stylesheet"/>
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
        <link rel="icon" type="image/x-icon" href="asset/img/isa_logo.png">

       <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark d-flex justify-content-end" style='z-index:3000;  top:0;'>
            <button class="btn btn-link btn-sm order-1 bg-light" id="sidebarToggle" href="#"><i class="fas fa-bars"  style='color:rgb(58,93,174);'></i></button>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav" style='z-index:4000;'>
                <nav class="sb-sidenav accordion sb-sidenav " style='background:#113C7A; color:#fff; border:none;' id="sidenavAccordion">
                    <div class="d-flex flex-column mt-6">
                        <div class="dropbtn d-flex align-self-center justify-content-center mx-2" style="border:1px solid rgba(180,180,180); width:80px; height:80px; border-radius:50%; object-fit:contain; overflow:hidden;" role="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img style="width:100%;" src="asset/img/isa_logo.png" />
                        </div>
                        <div class=' d-flex flex-column'>
                            <span class="pt-2" style='font-weight:bolder; text-align:center;'>{{Auth::user()->surname.' '.explode(' ',Auth::user()->other_names)[0]}}</span>
                            <small class='mt-2 border-bottom py-2 px-3' data-toggle="modal" data-target="#MyProfile_{{Auth::user()->id}}" role='button' style='color: rgba(180,180,180)'>My Profile</small>
                        </div>
                    </div>    
                    <div class="sb-sidenav-menu d-flex flex-column justify-content-between pt-4">
                        <div class="nav">
                            <a class="nav-link" href="{{ __('dashboard')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-bar"></i></div>
                                Dashboard
                            </a>   
                            <a class="nav-link" href="{{ __('manageFiles')}}">
                                <div class="sb-nav-link-icon"><i class="far fa-folder-open"></i></div>
                                Manage Files
                            </a>   
                            <a class="nav-link" href="{{ __('ManageBuddies')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-clipboard-list"></i></div>
                                Manage Buddies
                                @if($BdCountReq > 0)
                                    <span class="badge badge-warning ml-2">{{$BdCountReq}}</span>
                                @endif
                            </a>                        
                            <a class="nav-link" href="{{ __('myschedule')}}">
                                <div class="sb-nav-link-icon"><i class="far fa-calendar-times"></i></div>
                                My Schedule
                            </a>                        
                            <a class="nav-link" href="{{ __('AddUser')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-user-plus"></i></div>
                                Add New User
                            </a>
                            <a class="nav-link" href="{{ __('listsofAllusers')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-list"></i></div>
                                List of all Users
                            </a>
                             <!-- Add a student list controller and view page-->
                             <a class="nav-link" href="{{ __('kppRequestList')}}">
                                <div class="sb-nav-link-icon"><i class="fab fa-cc-visa"></i></div>
                                Visa Applications
                                @if($newVisaReq > 0)
                                    <span class="badge badge-warning ml-2">{{$newVisaReq}}</span>
                                @endif
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
                    <a class="sb-sidenav-footer bg-danger out w-100" style='color:white' href="{{ __('logout')}}">Logout</a>
                          
                </nav>
            </div>
       <div id="layoutSidenav_content">

       <div class="modal fade " id="MyProfile_{{Auth::user()->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
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
                                
                                <div class="row">
                                    <div class='col'>
                                        <label for="surname">surname</label>
                                        <input type="text" class="form-control" name="sname" id="surname" value="{{Auth::user()->surname}}">
                                    </div>
                                    <div class='col'>
                                        <label for="othernames">other_names</label>
                                        <input type="text" class="form-control" name="oname" id="othernames" value="{{Auth::user()->other_names}}">
                                    </div>
                                    <div class='col'>
                                        <label for="email">email</label>
                                        <input type="text" class="form-control" name="email" id="email" value="{{Auth::user()->email}}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <label for="id">Admission No:</label>
                                        <input type="text" class="form-control" name="u_id" id="id" aria-describedby="idHelp" value="{{Auth::user()->id}}">
                                    </div>
                                </div>
                                <span class='btn btn-warning mt-4' id='change_pass' role='button'>Change Password</span>
                                <input type="hidden" name="is_change_active" id="is_change_active" value="false">
                                
                                <div class='pass-change-form mb-3'>
                                    <div class='col'>
                                        <label for="old_pass">Old Password</label>
                                        <input type="password" class="form-control" name="old_pass" id="old_pass" disabled>
                                    </div>
                                    <div class="row  d-flex justify-content-between">

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
                                <button type="submit" class="btn btn-info w-100" id='alterChanges'>Submit</button>
                            </form>
                            
                        </div>
                    </div>
                    <br/>
                </div>
            </div>
        </div>

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
