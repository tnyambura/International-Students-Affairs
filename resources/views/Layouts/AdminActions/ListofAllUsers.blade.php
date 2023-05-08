@extends('Layouts.AdminActions.adminMaster',['title'=>'List of Users'])
@section('content')   
    <div class="container-fluid"><br/>
        <ol class="breadcrumb mb-4 border-2" style="background: #113C7A; color:#fff; border:none;" >
            <li class="breadcrumb-item active d-flex justify-content-between w-100" style="color:white;"> 
                <span style='color:#fff;' >List of all International students registered as Users.</span>
                <div class='d-flex align-items-center'>
                    <form action='{{route("add.GeneratePDF")}}' method='post'>@csrf
                        <input type="hidden" name="function" value='getAllStudentsReport'>
                        <button type='submit'>
                        <i role='button' style='color:red; font-size:30px;' class='far fa-file-pdf'></i>
                        </button>
                    </form>
                    <form action='{{route("add.exportExcel")}}' method='post'>@csrf
                        <input type="hidden" name="title" value='List of all students {{date("Y")}}'>
                        <input type="hidden" name="from" value='student'>
                        <button type='submit' style='outline:none'>
                        <i role='button' style='color:green; font-size:30px;' class='far fa-file-excel ml-3'></i>
                        </button>
                    </form>
                </div>
            </li>
        </ol>
        @if(Session::has('data_not_available'))
        <div class="alert alert-danger" role="alert">
        {{Session::get('data_not_available')}}
        </div>
        @endif 
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
                    <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                        <thead class="thead-dark">
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>email</th>
                                <th>Country</th>
                                <th>Role</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                        @php $key= 'nationality'; @endphp
                            <tr>
                                <td>{{$user['user_id']}}</td>
                                <td>{{$user['surname'].' '.$user['other_names']}}</td>
                                <td>{{$user['email']}}</td>
                                <td>{{
                                    array_key_exists($key, $user) ? $user[$key] : null
                                    }}</td>
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
                                                                    <label for="{{$user['user_id']}}_id">Admission No:</label>
                                                                    <input type="text" class="form-control" name="u_id" id="{{$user['user_id']}}_id" aria-describedby="idHelp" value="{{$user['user_id']}}">
                                                                </div>
                                                                <div class="col">
                                                                    <label for="{{$user['user_id']}}_surname">surname</label>
                                                                    <input type="text" class="form-control" name="sname" id="{{$user['user_id']}}_surname" value="{{$user['surname']}}">
                                                                </div>
                                                                <div class="col">
                                                                    <label for="{{$user['user_id']}}_othernames">other_names</label>
                                                                    <input type="text" class="form-control" name="oname" id="{{$user['user_id']}}_othernames" value="{{$user['other_names']}}">
                                                                </div>
                                                            </div>
                                                            <div class="row  d-flex justify-content-between">
                                                                <div class="col">
                                                                    <label for="{{$user['user_id']}}_email">email</label>
                                                                    <input type="text" class="form-control" name="email" id="{{$user['user_id']}}_email" value="{{$user['email']}}">
                                                                </div>
                                                                @if($user['role'] === 'student' || $user['role'] === 'buddy')
                                                                <div class="col">
                                                                    <label for="{{$user['user_id']}}_phone_no">phone number</label>
                                                                    <input type="text" class="form-control" name="phone" id="{{$user['user_id']}}_phone_no" value="{{$user['phone_number']}}">
                                                                </div>
                                                            </div>
                                                            <div class="row  d-flex justify-content-between">
                                                                <div class="col ">
                                                                    <label for="{{$user['user_id']}}_residence">Residence</label>
                                                                    <input type="text" class="form-control" name="residence" id="{{$user['user_id']}}_residence" value="{{$user['residence']}}">
                                                                </div>
                                                                <div class="col">
                                                                    <label for="{{$user['user_id']}}_faculty">faculty</label>
                                                                    <input type="text" class="form-control" name="faculty" id="{{$user['user_id']}}_faculty" value="{{$user['faculty']}}">
                                                                </div>
                                                                <div class="col">
                                                                    <label for="{{$user['user_id']}}_course">course</label>
                                                                    <input type="text" class="form-control" name="course" id="{{$user['user_id']}}_course" value="{{$user['course']}}">
                                                                </div>
                                                            </div>
                                                            <div class="row  d-flex justify-content-around">
                                                                <div class="col">
                                                                    <label for="{{$user['user_id']}}_nationality">nationality</label>
                                                                    <input type="text" class="form-control" name="country" id="{{$user['user_id']}}_nationality" value="{{$user['nationality']}}">
                                                                </div>
                                                                <div class="col">
                                                                    <label for="{{$user['user_id']}}_passport_no">passport Number</label>
                                                                    <input type="text" class="form-control" name="passNo" id="{{$user['user_id']}}_passport_no" value="{{$user['passport_number']}}">
                                                                </div>
                                                                <div class="col">
                                                                    <label for="{{$user['user_id']}}_passport_ex">passport expire date</label>
                                                                    <input type="text" class="form-control" name="passEx" id="{{$user['user_id']}}_passport_ex" value="{{$user['passport_expire_date']}}">
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