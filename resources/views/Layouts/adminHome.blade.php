@extends('Layouts.AdminActions.adminMaster')
@section('content')
        <div class="container-fluid"><br/>
        
        @if(Session::has('user_update_success') )
        <div class="alert alert-success" role="alert">
        {{Session::get('user_update_success')}}
        </div>
        @endif
        @if(Session::has('user_update_failed') )
        <div class="alert alert-danger" role="alert">
        {{Session::get('user_update_failed')}}
        </div>
        @endif
            <div class="card p-3 mb-3 d-flex flex-row">
                <div>
                    <figure class='profile-figure d-flex justify-centent-center align-items-center'>
                        <img src="asset/img/logo.png" class="">
                    </figure>
                </div>
                <div class="d-flex flex-column flex-grow-1 pl-3" style='font-size:12px'>
                    <div class="container flex-grow-1" >
                        <div class="row">
                            <div class='col d-flex flex-column'>
                                <label for="id">Identity No</label>
                                <span class='font-weight-bold' id="id">{{Auth::user()->id}}</span>
                            </div>
                            <div class='col d-flex flex-column'>
                                <label for="surname">Surname</label>
                                <span class='font-weight-bold' id="surname">{{Auth::user()->surname}}</span>
                            </div>
                            <div class='col d-flex flex-column'>
                                <label for="othernames">Other names</label>
                                <span class='font-weight-bold' id="othernames">{{Auth::user()->other_names}}</span>
                            </div>
                            <div class='col d-flex flex-column'>
                                <label for="email">Email</label>
                                <span class='font-weight-bold' id="email">{{Auth::user()->email}}</span>
                            </div>
                        </div>
                    </div>
                    <div class='border-top'>
                        <div class='py-2' role='button' data-toggle="modal" data-target="#Viewuser">
                            <i class="fas fa-edit mr-1"></i> Modify Profile
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade " id="Viewuser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
            aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                            <div class="modal-header text-center">
                                <h4 class="modal-title  font-weight-bold">{{Auth::user()->surname.' '.Auth::user()->other_names}}</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <i class="fas fa-table mr-1"></i>
                                User Details
                                </div>
                                <div class="card-body">

                                    <form method="POST" action="{{route('add.editUserData')}}">
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
                                        <button type="submit" class="btn btn-primary " id='alterChanges'>Submit</button>
                                    </form>
                                    
                                </div>
                            </div>
                            <br/>
                        </div>
                    </div>
                </div>
            
            
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table mr-1"></i>
                    List of Student Pass Application Requests.
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Name</th>
                                    <th>Passport Number</th>
                                    <th>Date Requested</th>
                                    <th>Entry Date</th>
                                    <th>NATIONALITY</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>id</th>
                                    <th>Name</th>
                                    <th>Passport Number</th>
                                    <th>Date Requested</th>
                                    <th>Entry Date</th>
                                    <th>NATIONALITY</th>
                                    <th>Actions</th>
                                </tr>
                            </tfoot>
                            <tbody>
                            
                                </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

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
           
@endsection