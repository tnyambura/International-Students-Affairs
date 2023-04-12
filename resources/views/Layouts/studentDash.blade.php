@extends('Layouts.studentActions.studentMaster',['userData'=>$user,'availability'=>$availability])
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
        @if(Session::has('user_update_success'))
        <div class="alert alert-success" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        {{Session::get('user_update_success')}}
        </div>
        @endif
        @if(Session::has('user_update_failed'))
        <div class="alert alert-danger" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        {{Session::get('user_update_failed')}}
        </div>
        @endif
        @if(Session::has('booking-success'))
        <div class="alert alert-success" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        {{Session::get('booking-success')}}
        </div>
        @endif
        @if(Session::has('booking-error'))
        <div class="alert alert-danger" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        {{Session::get('booking-error')}}
        </div>
        @endif
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
                        <a class="small text-white stretched-link" href="{{ __('BuddyProgram')}}">Request</a>
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
            </div>
        </div>
        
        
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between">
                <div>
                    <i class="fas fa-table mr-1"></i>
                    My Appointments
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Appointment On</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(sizeOf($myAppointments) > 0)
                                @foreach($myAppointments as $val)
                                @php $aptmnt = json_decode($val->booked_date_time); @endphp
                                    <tr>
                                        <td>{{$val->id}}</td>
                                        <td>{{str_replace('_','-',$aptmnt[0])}}</td>
                                        <td>{{$val->status}}</td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="5">No Appointment Found</td>
                                </tr>
                            @endif

                            
                        </tbody>
                    </table>
                </div>
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