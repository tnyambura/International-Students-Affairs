@extends('Layouts.studentActions.studentMaster',['title'=>'My Kpp','userData'=>$user,'availability'=>$availability, 'NoBooking'=>$NoBooking,'NoExt'=>$NoExt,'NoKpps'=>$NoKpps])
@section('content')
    <nav class="d-flex align-items-center top-title-sticky" style='position:sticky; top:0; z-index:2999; padding:8px; background:#fff; width:100%; height: 56px;'>
        <span>My Student Pass</span>
    </nav>
    <div class="container-fluid"><br/>
        <div class="breadcrumb mb-4 bg-light" style="border:1px solid rgb(110,110,110); border-radius:10px;">
            <p class="breadcrumb-item active">
            All applications with wrong information will be directly rejected. 
            At each stage a document will be attached as result to the process.
            </p>
        </div>

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
        @if(Session::has('user_update_success'))
        <div class="alert alert-success" role="alert">
        {{Session::get('user_update_success')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        @endif
        @if(Session::has('user_update_failed'))
        <div class="alert alert-danger" role="alert">
        {{Session::get('user_update_failed')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        @endif
        @if(Session::has('kpp_updated_successfully'))
        <div class="alert alert-success" role="alert">
        {{Session::get('kpp_updated_successfully')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        @endif                       
        @if(Session::has('kppApp_cancel_success'))
        <div class="alert alert-success" role="alert">
        {{Session::get('kppApp_cancel_success')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        @endif                       
        @if(Session::has('kppApp_cancel_fail'))
        <div class="alert alert-danger" role="alert">
        {{Session::get('kppApp_cancel_fail')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        @endif  


        @if(sizeOf($data) == 0)
        <!-- <div class="card d-flex align-items-center" style=""> -->
            {!! file_get_contents(public_path('asset/img/dataNotFound.svg')) !!}
        <!-- </div> -->
        @else
        <!-- <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table mr-1"></i>
                My student Pass Applications List.
            </div>
            <div class="card-body"> -->
            @foreach($data as $appdata)
            
                <div class="courses-container">
                    <div class="course">
                        <div class="course-preview">
                            <div class="d-flex flex-column justify-content-between h-100">
                                <h6>Student Pass
                                    <small>{{$appdata->id}}</small>
                                </h6>
                                <div class='d-flex align-items-center first-Open' data-app-id='{{$appdata->id}}' title="View Application" id='view_first_{{$appdata->id}}' role='button' aria-hidden="false" data-toggle="modal" data-target="#Viewkppapp_{{$appdata->id}}" data-target-focus="Viewkppapp_{{$appdata->id}}" style=" color:#fff; font-size:12px;">
                                    <span class="material-icons view-app-btn mr-2">attachment</span>
                                    View More
                                </div>
                            </div>
                            @if(!empty($appdata->uploads))
                            <a href='/downloadKpps/{{$appdata->uploads}}' class='download-file-btn top-rslt-file ' style='display:none; width: 20%; color:red;'><i style='box-sizing:content-box; font-size:30px;' class='far fa-file-pdf'></i></a>
                            @endif
                            @if($appdata->application_status === 'pending')
                            <a role="button" href='{{route("view.cancelkpp")}}' class="top-rmv-visa cancelkpp-btn" style=" display:none; width: 20%; color:#CC0D0D" title="Cancel Application" data-target='{{$appdata->id}}'>
                                <span class="fas fa-trash " role='button' data-action="" aria-hidden="false" data-toggle="modal" data-target="#" data-target-focus=""></span>
                            </a>
                            @endif
                        </div>
                        <div class="course-info" style=''>
                        @php $classAdd='active'; @endphp
                        @if(!empty($appdata->first_open)) @php $classAdd='firstOpen'; @endphp @endif
                        @if(empty($appdata->first_open) && $appdata->application_status === 'approved') @php $classAdd='completed'; @endphp @endif
                        @if($appdata->application_status === 'declined') @php $classAdd='declined'; @endphp @endif
                        @if($appdata->application_status === 'approved' && date($appdata->expiry_date) < date('Y-m-d')) @php $classAdd='expired'; @endphp  @endif
                            <div class='w-100 d-flex align-items-center status-progress {{$classAdd}}' style='height:15px;'>
                            @if(!empty($appdata->expiry_date) && date($appdata->expiry_date) < date('Y-m-d'))
                            <span>Expired</span>
                            @else
                            <span>{{$appdata->application_status}}...</span>
                            @endif
                            </div>
                            <div class='main-data d-flex align-items-center mx-4 my-3'>
                                <div style='width: 80%'>
                                    <p>Full Name: <strong>{{$userDetails->surname.' '.$userDetails->other_names}}</strong></p>
                                    <p class='m-0'>Passport: <strong>{{$userDetails->passport_number}}</strong> </p>
                                    <p class='m-0'>Requested Date: <strong>{{$appdata->application_date}}</strong></p>
                                    <p>Expiry Date: <strong>{{$appdata->expiry_date}}</strong></p>
                                </div>
                                @if(!empty($appdata->uploads))
                                <a href='/downloadKpps/{{$appdata->uploads}}' class='download-file-btn rslt-file d-flex align-items-center justify-content-center' style='width: 20%; color:red;'><i style='box-sizing:content-box; font-size:30px;' class='far fa-file-pdf'></i></a>
                                @endif
                                @if($appdata->application_status === 'pending')
                                <a role="button" href='{{route("view.cancelkpp")}}' class="rmv-visa cancelkpp-btn" style=" color:#CC0D0D" title="Cancel Application" data-target='{{$appdata->id}}'>
                                    <span class="fas fa-trash " role='button' data-action="" aria-hidden="false" data-toggle="modal" data-target="#" data-target-focus=""></span>
                                </a>
                                @endif
                                
                            </div>
                        </div>
                    </div>
                    <div class="modal fade modal-md w-100"  id="Viewkppapp_{{$appdata->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                    aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header text-center">
                                    <h4 class="modal-title w-100 font-weight-bold">{{$userDetails->surname.' '.$userDetails->other_names}}</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="card mb-4">
                                    <div class="card-header" style='background: {{($appdata->application_status == "approved")? "rgb(40,167,68)": "inherite"}}'>
                                        <i class="fas fa-table mr-1"></i>
                                    My Student Pass Application View.
                                    </div>
                                    
                                    <div class="card-body">                                    
                                        <div class="form-row " style="text-align:justify;">

                                            <div class="col">
                                                <div class="form-group">
                                                <label for="usr">Strathmore ID:</label>
                                                <input type="text" class="form-control" id="usr" value="{{$userDetails->student_id}}" disabled>
                                                </div>
                                            </div> 
                                            <div class="col">
                                            <div class="form-group">
                                                <label for="usr">Surname:</label>
                                                <input type="text" class="form-control" id="usr" value="{{$userDetails->surname}} " disabled>
                                                </div>
                                            </div>
                                            <div class="col">
                                            <div class="form-group">
                                                <label for="usr">Other Names:</label>
                                                <input type="text" class="form-control" id="usr" value="{{$userDetails->other_names}}" disabled>
                                                </div>
                                            </div>
                                            </div>

                                            <div class="form-row" style="text-align:justify;">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="usr">Passport Number:</label>
                                                    <input type="text" class="form-control" id="usr" value="{{$userDetails->passport_number}}  " disabled>
                                                </div>
                                            </div>
                                            
                                            @foreach($getDataView as $v)
                                                @if($v->id === $appdata->id)
                                                <div class="col">
                                                <div class="form-group">
                                                    <label for="usr">Date Of Entryr:</label>
                                                    <input type="text" class="form-control" id="usr" value="{{$v->date_of_entry}}" disabled>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="usr">Date Requested:</label>
                                                    <input type="text" class="form-control" id="usr" value="{{$v->application_date}}  " disabled>
                                                </div>
                                            </div>                                                                                                                                                                                                                                     
                                            </div><br/> 
                                            <h4>Required Documents</h4><br/>
                                            <div class="container">
                                                <div class="row">
                                                    
                                                <table class="table table-striped">
                                                    <thead>
                                                    <tr>
                                                        <th>Passport Biodata</th>
                                                        <th>Passport Visa Page:</th>
                                                        <th>Academic Transcripts</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td > <a class='download-file-btn' href="/downloadKpps/{{$v->passport_biodata}}" style="color:green"> Download</a></td>
                                                        <td > <a class='download-file-btn' href="/downloadKpps/{{$v->current_visa}}" style="color:green"> Download</a></td>
                                                        <td > <a class='download-file-btn' href="/downloadKpps/{{$v->accademic_transcript}}" style="color:green"> Download</a></td>
                                                    </tr>
                                                    </tbody>

                                                    <thead>
                                                    <tr>
                                                        <th>Commitment Letter</th>
                                                        <th>Police Clearance:</th>
                                                        <th>Parents ID/Biodata</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td > <a class='download-file-btn' href="/downloadKpps/{{$v->commitment_letter}}" style="color:green"> Download</a></td>
                                                        <td > <a class='download-file-btn' href="/downloadKpps/{{$v->police_clearance}}" style="color:green"> Download</a></td>
                                                        <td > <a class='download-file-btn' href="/downloadKpps/{{$v->guardian_biodata}}" style="color:green"> Download</a></td>
                                                    </tr>
                                                    </tbody>

                                                    <thead>
                                                    <tr>
                                                        <th>Most Recent Passport Picture</th>
                                                        <th>Application Response</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td > <a class='download-file-btn' href="/downloadKpps/{{$v->passport_picture}}" style="color:green"> Download</a></td>
                                                        @if($v->uploads)
                                                        <td class='bg-info' style='color:white'> <a class='download-file-btn' href="/downloadKpps/{{$v->uploads}}"> Download</a></td>
                                                        @else
                                                        <td > <span style="color:grey"> No File to Download</a></td>
                                                        @endif
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            
                                                
                                            </div>
                                                
                                            <br/>
                                        </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                                <br/>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            <!-- </div>
        </div> -->
        @endif
    </div>
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
    <script defer>
        $(document).ready(function() {
            console.log('{{json_encode($getDataView)}}');
            $('.cancelkpp-btn').on('click',function(e){
                e.preventDefault()
                if(confirm(`Do you really want to cancel the application (${$(this).attr('data-target')})?  If you do, be aware that you will not be able to activate this particular application. You will have to initiate a new application.`)){
                    window.location = $(this).attr('href')
                }
            })

            $('.first-Open').on('click',function(e){
                $.ajax({
                    url: '{{route("add.firstOpen")}}',
                    method: 'GET',
                    data: {id:parseInt($(this).attr('data-app-id')),table:'kpps_application'},
                    success: function(res){ $('body').find('.nokpp-badge').css('display','none');}
                })
            })
            

        })
    </script>
@endsection