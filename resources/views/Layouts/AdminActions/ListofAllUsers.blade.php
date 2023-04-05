@extends('Layouts.AdminActions.adminMaster')
@section('content')   
                    <div class="container-fluid"><br/>
                        <ol class="breadcrumb mb-4" style="background:#286DE7;">
                            <li class="breadcrumb-item active" style="color:white;"> List of all International students registered as Users.</li>
                        </ol>
                        @if(Session::has('activation_failed'))
                        <div class="alert alert-danger" role="alert">
                        {{Session::get('activation_failed')}}
                        </div>
                        @endif 
                        @if(Session::has('Buddy_Register_success'))
                        <div class="alert alert-success" role="alert">
                        {{Session::get('Buddy_Register_success')}}
                        </div>
                        @endif 
                        @if(Session::has('Buddy_Register_fail'))
                        <div class="alert alert-danger" role="alert">
                        {{Session::get('Buddy_Register_fail')}}
                        </div>
                        @endif 
                        @if(Session::has('user_update_success'))
                        <div class="alert alert-success" role="alert">
                        {{Session::get('user_update_success')}}
                        </div>
                        @endif 
                        @if(Session::has('user_update_failed'))
                        <div class="alert alert-danger" role="alert">
                        {{Session::get('user_update_failed')}}
                        </div>
                        @endif 
                        @if(Session::has('email_send_success'))
                        <div class="alert alert-success" role="alert">
                        {{Session::get('email_send_success')}}
                        </div>
                        @endif 
                        @if(Session::has('email_send_fail'))
                        <div class="alert alert-danger" role="alert">
                        {{Session::get('email_send_fail')}}
                        </div>
                        @endif 
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                               List of all International students registered as Users.
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>SurName</th>
                                                <th>OtherNames.</th>
                                                <th>email</th>
                                                <th>Role</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                            <th>Id</th>
                                                <th>SurName</th>
                                                <th>OtherNames.</th>
                                                <th>email</th>
                                                <th>Role</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                        @foreach($users as $user)
                                            <tr>
                                                <td>{{$user['user_id']}}</td>
                                                <td>{{$user['surname']}}</td>
                                                <td>{{$user['other_names']}}</td>
                                                <td>{{$user['email']}}</td>
                                                @if($user['isbuddy'])
                                                <td>student/buddy</td>
                                                @else
                                                <td>{{$user['role']}}</td>
                                                @endif
                                                @if($user['status'] === 1)
                                                <td style="color:green">Activated</td>
                                                @else
                                                <td style="color:red">Deactivated</td>
                                                @endif

                                                <td>
                                                    <span data-toggle="modal" role='button' data-target="#userDetails_{{$user['user_id']}}" class="fas fa-eye view-app-btn mt-2 mb-2" style=" color:blue"></span>
                                                <!-- <div role='button' >
                                                    View User
                                                <div> -->
                                                <div class="modal fade " id="userDetails_{{$user['user_id']}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                                                aria-hidden="true">
                                                    <div class="modal-dialog modal-lg" role="document">
                                                        <div class="modal-content">
                                                                <div class="modal-header text-center">
                                                                    <h4 class="modal-title w-100 font-weight-bold">{{$user['surname'].' '.$user['other_names']}}</h4>
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

                                                                        <form method="POST" action="{{route('add.editUserData')}}">
                                                                            @csrf
                                                                            <input type="hidden" name="cr_id" value="{{$user['user_id']}}">
                                                                            <div class="row d-flex justify-content-between">
                                                                                <div class="col">
                                                                                    <label for="id">Admission No:</label>
                                                                                    <input type="text" class="form-control" name="u_id" id="id" aria-describedby="idHelp" value="{{$user['user_id']}}">
                                                                                </div>
                                                                                <div class="col">
                                                                                    <label for="surname">surname</label>
                                                                                    <input type="text" class="form-control" name="sname" id="surname" value="{{$user['surname']}}">
                                                                                </div>
                                                                                <div class="col">
                                                                                    <label for="othernames">other_names</label>
                                                                                    <input type="text" class="form-control" name="oname" id="othernames" value="{{$user['other_names']}}">
                                                                                </div>
                                                                            </div>
                                                                            <div class="row  d-flex justify-content-between">
                                                                                <div class="col">
                                                                                    <label for="email">email</label>
                                                                                    <input type="text" class="form-control" name="email" id="email" value="{{$user['email']}}">
                                                                                </div>
                                                                                @if($user['role'] === 'student' || $user['role'] === 'buddy')
                                                                                <div class="col">
                                                                                    <label for="phone_no">phone number</label>
                                                                                    <input type="text" class="form-control" name="phone" id="phone_no" value="{{$user['phone_number']}}">
                                                                                </div>
                                                                            </div>
                                                                            <div class="row  d-flex justify-content-between">
                                                                                <div class="col ">
                                                                                    <label for="residence">Residence</label>
                                                                                    <input type="text" class="form-control" name="residence" id="residence" value="{{$user['residence']}}">
                                                                                </div>
                                                                                <div class="col">
                                                                                    <label for="faculty">faculty</label>
                                                                                    <input type="text" class="form-control" name="faculty" id="faculty" value="{{$user['faculty']}}">
                                                                                </div>
                                                                                <div class="col">
                                                                                    <label for="course">course</label>
                                                                                    <input type="text" class="form-control" name="course" id="course" value="{{$user['course']}}">
                                                                                </div>
                                                                            </div>
                                                                            <div class="row  d-flex justify-content-around">
                                                                                <div class="col">
                                                                                    <label for="nationality">nationality</label>
                                                                                    <input type="text" class="form-control" name="country" id="nationality" value="{{$user['nationality']}}">
                                                                                </div>
                                                                                <div class="col">
                                                                                    <label for="passport_no">passport Number</label>
                                                                                    <input type="text" class="form-control" name="passNo" id="passport_no" value="{{$user['passport_number']}}">
                                                                                </div>
                                                                                <div class="col">
                                                                                    <label for="passport_ex">passport expire date</label>
                                                                                    <input type="text" class="form-control" name="passEx" id="passport_ex" value="{{$user['passport_expire_date']}}">
                                                                                </div>
                                                                            @endif
                                                                            </div>
                                                                            <button type="submit" class="btn btn-primary w-50 mt-4">Submit</button>
                                                                        </form>
                                                                        
                                                                    </div>
                                                                    @if($user['status'] === 1 && $user['isbuddy'] === false && $user['role'] === 'student')
                                                                        <form method="POST" action='{{route("add.makeBuddy")}}'>
                                                                        @csrf
                                                                            <input type="hidden" name="user_id" value='{{$user["user_id"]}}'/>
                                                                            <button type='submit' class="btn btn-success w-100 mb-2">Make a Buddy</button>
                                                                        </form>
                                                                    @endif
                                                                    <form method="POST" action='{{route("add.activate")}}'>
                                                                        @csrf
                                                                        <input type="hidden" name="user_id" value='{{$user["user_id"]}}'/>
                                                                        <input type="hidden" name="email" value='{{$user["email"]}}'/>
                                                                        @if($user['status'] == 0)
                                                                            <input type="hidden" name="action" value='activate'/>
                                                                            <button type='submit' class="btn btn-success w-100">Activate User</button>
                                                                            @else
                                                                            <input type="hidden" name="action" value='deactivate'/>
                                                                            <button  type='submit' class="btn btn-danger w-100">Deactivate User</button>
                                                                        @endif
                                                                    </form>
                                                                </div>
                                                                <br/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                
                                                </td>
                                            </tr>
                                      @endforeach
                                          </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    
 @endsection             