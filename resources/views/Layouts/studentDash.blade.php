@extends('Layouts.studentActions.studentMaster')
@section('content')      
      <div class="container-fluid"><br/>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
            <ul>
                <li><span>Upon successful submission of an application request, you can check the status of your uploads by clicking<b>"View a list of My Student Pass Applications"</b> from the dashboard.</span></li>
                <li><span>For all Foreign Nationals Applications that require biometrics capture, please <b>Email</b> our office so that we can place an appointment booking with the immigrations on your behalf.</span></li>
                <li><span>All visa extension requests can be placed by clicking <b>"VISA EXTENSIONS"</b> from the dashboard.</span></li>
                <li><span>All Student Pass Application requests can be placed by clicking <b>"STUDENT PASS APPLICATIONS"</b> from the dashboard.</span></li>

            </ul>
        </div>
        <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-body">View a list of My Student Pass Applications</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="{{ __('MykppApplications')}}">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-warning text-white mb-4">
                    <div class="card-body">VISA EXTENSION APPLICATIONS</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="{{ __('ApplyVisa')}}">Send a Request</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-success text-white mb-4">
                    <div class="card-body">STUDENT PASS APPLICATIONS</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="{{ __('ApplyKpp')}}">Send a Request</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            @if(!$is_buddy)
            <div class="col-xl-3 col-md-6">
                <div class="card bg-danger text-white mb-4">
                    <div class="card-body">Request for a Buddy allocation</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="{{ __('RequestBuddy')}}">Request</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            @endif
        </div>

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
        
        
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between">
                <div>
                    <i class="fas fa-table mr-1"></i>
                    My Details
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Student ID</th>
                                <th>Surname</th>
                                <th>Othernames</th>
                                <th>Email</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Student ID</th>
                                <th>Surname</th>
                                <th>Othernames</th>
                                <th>Email</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <tr>
                                <td>{{Auth::user()->id}}</td>
                                <td>{{Auth::user()->surname}}</td>
                                <td>{{Auth::user()->other_names}}</td>
                                <td>{{Auth::user()->email}}</td>
                            </tr>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade " id="Viewuser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
        <div class="modal-dialog" role="document">
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
                                <input type="hidden" name="cr_id" value="{{$user['student_id']}}">
                                <div class="form-group ">
                                    <label for="id">Admission No:</label>
                                    <input type="text" class="form-control" name="u_id" id="id" aria-describedby="idHelp" value="{{$user['student_id']}}">
                                </div>
                                <div class="form-group d-flex justify-content-between">
                                    <div>
                                        <label for="surname">surname</label>
                                        <input type="text" class="form-control" name="sname" id="surname" value="{{$user['surname']}}">
                                    </div>
                                    <div>
                                        <label for="othernames">other_names</label>
                                        <input type="text" class="form-control" name="oname" id="othernames" value="{{$user['other_names']}}">
                                    </div>
                                </div>
                                <div class="form-group  d-flex justify-content-between">
                                    <div>
                                        <label for="email">email</label>
                                        <input type="text" class="form-control" name="email" id="email" value="{{$user['email']}}">
                                    </div>
                                    <div>
                                        <label for="phone_no">phone number</label>
                                        <input type="text" class="form-control" name="phone" id="phone_no" value="{{$user['phone_number']}}">
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="residence">Residence</label>
                                    <input type="text" class="form-control" name="residence" id="residence" value="{{$user['residence']}}">
                                </div>
                                <div class="form-group  d-flex justify-content-between">
                                    <div>
                                        <label for="faculty">faculty</label>
                                        <input type="text" class="form-control" name="faculty" id="faculty" value="{{$user['faculty']}}">
                                    </div>
                                    <div>
                                        <label for="course">course</label>
                                        <input type="text" class="form-control" name="course" id="course" value="{{$user['course']}}">
                                    </div>
                                </div>
                                <div class="form-group  d-flex justify-content-around">
                                    <div>
                                        <label for="nationality">nationality</label>
                                        <input type="text" class="form-control" name="country" id="nationality" value="{{$user['nationality']}}">
                                    </div>
                                    <div>
                                        <label for="passport_no">passport Number</label>
                                        <input type="text" class="form-control" name="passNo" id="passport_no" value="{{$user['passport_number']}}">
                                    </div>
                                    <div>
                                        <label for="passport_ex">passport expire date</label>
                                        <input type="text" class="form-control" name="passEx" id="passport_ex" value="{{$user['passport_expire_date']}}">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                            
                        </div>
                    </div>
                    <br/>
                </div>
            </div>
        </div> 
        <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
        <script defer>
            $(document).ready(function() {
                $('.alert').alert()
            })
        </script>
@endsection