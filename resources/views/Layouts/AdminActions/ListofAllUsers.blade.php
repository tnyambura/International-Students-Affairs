@extends('Layouts.AdminActions.adminMaster',['title'=>'All Users','newVisaReq'=>$newVisaReq,'BdCountReq'=>$BdCountReq])
@section('content')  
    <nav class="d-flex align-items-center top-title-sticky" style='position:sticky; top:0; z-index:2999; padding:8px; background:#fff; width:100%; height: 56px;'>
        <span>All Users</span>
    </nav> 
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
        <ol class="breadcrumb d-flex mb-4 " style="border-radius:0; border-bottom:1px solid grey; background:transparent;" >
            <li class="breadcrumb-item active d-flex w-100" style=""> 
                <div class='mr-4' style='font-weight:bolder;'><i class='fa fa-mars mr-2' style='color:#113C7A;font-size:30px;'></i>Male: <span style='font-size:20px;'>{{$NumMale}}</span></div>
                <div style='font-weight:bolder;'><i class='fa fa-venus mr-2' style='font-size:30px; color:#7A1171;'></i>Female: <span style='font-size:20px;'>{{$NumFemale}}</</span></div>
            </li>
        </ol> 
        @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
        {{Session::get('success')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        @endif 
        @if(Session::has('fail'))
        <div class="alert alert-danger" role="alert">
        {{Session::get('fail')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        @endif
        <div class="card mb-4">
            <!-- <div class="card-header">
                <i class="fas fa-table mr-1"></i>
                List of all International students registered as Users.
            </div> -->
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                        <thead class="thead">
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>email</th>
                                <th>gender</th>
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
                                <td style="text-transform: capitalize;">{{($user['gender'] === 'm')?'male':'female'}}</td>
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
                                    <span data-toggle="modal" role='button' data-target="#userDetails_{{$user['user_id']}}" class="fas fa-eye view-app-btn mt-2 mb-2" style=" color:rgb(17,60,122)"></span>
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
                                                            <button type="submit" class="btn w-50 mt-4" style='background: rgba(17,60,122,.4); color:#fff'>Submit</button>
                                                        </form>
                                                        
                                                    </div>
                                                    <div class='row px-4'>
                                                        @if($user['status'] === 1 && $user['isbuddy'] === false && $user['role'] === 'student')
                                                        <form method="POST" class='col' action='{{route("add.makeBuddy")}}'>
                                                        @csrf
                                                            <input type="hidden" name="user_id" value='{{$user["user_id"]}}'/>
                                                            <button type='submit' class="btn w-100 mb-2" style='background:#113C7A; color:#fff'>Make a Buddy</button>
                                                        </form>
                                                        @endif
                                                        <form method="POST" class='col' action='{{route("add.reset_password")}}'>
                                                        @csrf
                                                            <input type="hidden" name="user_id" value='{{$user["user_id"]}}'/>
                                                            <input type="hidden" name="user_email" value='{{$user["email"]}}'/>
                                                            <button type='submit' data-target="{{$user['surname'].' '.$user['other_names']}}" class="restPassBtn btn w-100 mb-2" style='color:#fff; background: rgba(110,110,110,.6)'>Reset Password</button>
                                                        </form>
                                                    </div>
                                                    <form class='px-4' method="POST" action='{{route("add.activate")}}'>
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

    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
    <script defer>
        $(document).ready(function() {
            
            $('.restPassBtn').on('click',function(e){
                e.preventDefault()
                let form = $(this).parent()
                if(confirm(`Do you really want to reset password for ${$(this).attr('data-target')}?`)){
                    form.submit()
                }
            })
        })
    </script>
                    
 @endsection             