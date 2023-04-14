@extends('Layouts.AdminActions.adminMaster')
@section('content')

<?php
    function DisplayData($dataArray,$tablename,$applicationStatus,$state='normal'){
        
        foreach($dataArray as $val){ ?>
            <tr>
                @if($tablename == 'kpp')
                <td><i class="far fa-address-card mr-1" style='color:var(--primary)'></i></td>
                @endif
                @if($tablename == 'ext')
                <td> <i class="material-icons mr-2" style="color:var(--success)">extension</i></td>
                @endif
                <td> {{$val['id']}}</td>
                <td> {{$val['student_id']}}</td>
                <td> {{$val['surname']}} {{$val['other_names']}}</td>
                <td> {{$val['nationality']}}</td>
                <td> {{$val['application_status']}}</td>
                
                <td>
                    @php $data= Crypt::encrypt($val['student_id']); @endphp                                                                                            
        
                    <span class="fas fa-eye " role='button' aria-hidden="false" data-toggle="modal" data-target="#Viewextapp_{{$val['id'].'_'.str_replace(' ','_',$val['application_status'])}}" style=" color:blue"></span>
                    @if($state !== 'normal')
                    <span class="fas fa-upload " role='button' aria-hidden="false" data-toggle="modal" data-target="#ChangeKpptapp_{{$val['id'].'_'.str_replace(' ','_',$val['application_status'])}}" style=" color:blue"></span>
                    @endif
                    <div class="modal fade "  id="Viewextapp_{{$val['id'].'_'.str_replace(' ','_',$val['application_status'])}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                    aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header text-center">
                                    <h4 class="modal-title w-100 font-weight-bold">{{$val['surname'].' '.$val['other_names']}}</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-table mr-1"></i>
                                    My Student Pass Application View.
                                    </div>
                                    
                                    <div class="card-body">                                    
                                        <div class="form-row " style="text-align:justify;">

                                            <div class="col">
                                                <div class="form-group">
                                                <label for="usr">Strathmore ID:</label>
                                                <input type="text" class="form-control" id="usr" value="{{$val['student_id']}}" disabled>
                                                </div>
                                            </div> 
                                            <div class="col">
                                            <div class="form-group">
                                                <label for="usr">Surname:</label>
                                                <input type="text" class="form-control" id="usr" value="{{$val['surname']}} " disabled>
                                                </div>
                                            </div>
                                            <div class="col">
                                            <div class="form-group">
                                                <label for="usr">Other Names:</label>
                                                <input type="text" class="form-control" id="usr" value="{{$val['other_names']}}" disabled>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-row" style="text-align:justify;">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="usr">Passport Number:</label>
                                                    <input type="text" class="form-control" id="usr" value="{{$val['passport_number']}}  " disabled>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="usr">Date Of Entryr:</label>
                                                    <input type="text" class="form-control" id="usr" value="----" disabled>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="usr">Date Requested:</label>
                                                    <input type="text" class="form-control" id="usr" value="{{$val['application_date']}}  " disabled>
                                                </div>
                                            </div>                                                                                                                                                                                                                                     
                                        </div><br/>    

                                        <!-- Uploaded Documents -->        
                                        <h4>Required Documents</h4><br/>
                                        @if($tablename == 'ext')
                                        <div class="container">
                                            <div class="row">
                                                <table class="table table-striped">
                                                    <thead>
                                                    <tr>
                                                        <th>Passport Biodata</th>
                                                        <th>Current Visa Page:</th>
                                                        <th>Entry Visa Page</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td > <a href="/downloadExtension/{{$val['passport_biodata']}}" style="color:green"> Download</a></td>
                                                        <td > <a href="/downloadExtension/{{$val['current_visa']}}" style="color:green"> Download</a></td>
                                                        <td > <a href="/downloadExtension/{{$val['entry_visa']}}" style="color:green"> Download</a></td>
                                                    </tr>
                                                    </tbody>
            
                                                    <thead>
                                                    <tr>
                                                        <th>Application Response</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        @if($val['uploads'])
                                                        <td class='bg-info' style='color:white'> <a href="/downloadExtension/{{$val['uploads']}}"> Download</a></td>
                                                        @else
                                                        <td > <span style="color:grey"> No File to Download</a></td>
                                                        @endif
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div><br/>
                                        </div>
                                        @endif
                                        @if($tablename == 'kpp')
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
                                                        <td > <a href="/downloadKpps/{{$val['passport_biodata']}}" style="color:green"> Download</a></td>
                                                        <td > <a href="/downloadKpps/{{$val['current_visa']}}" style="color:green"> Download</a></td>
                                                        <td > <a href="/downloadKpps/{{$val['accademic_transcript']}}" style="color:green"> Download</a></td>
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
                                                        <td > <a href="/downloadKpps/{{$val['commitment_letter']}}" style="color:green"> Download</a></td>
                                                        <td > <a href="/downloadKpps/{{$val['police_clearance']}}" style="color:green"> Download</a></td>
                                                        <td > <a href="/downloadKpps/{{$val['guardian_biodata']}}" style="color:green"> Download</a></td>
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
                                                        <td > <a href="/downloadKpps/{{$val['passport_picture']}}" style="color:green"> Download</a></td>
                                                        @if($val['uploads'])
                                                        <td class='bg-info' style='color:white'> <a href="/downloadKpps/{{$val['uploads']}}"> Download</a></td>
                                                        @else
                                                        <td > <span style="color:grey"> No File to Download</a></td>
                                                        @endif
                                                    </tr>
                                                    </tbody>
                                                </table>    
                                            </div><br/>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
                @if($state !== 'normal')
                <div class="modal fade"  id="ChangeKpptapp_{{$val['id'].'_'.str_replace(' ','_',$val['application_status'])}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header text-center">
                                <h4 class="modal-title w-100 font-weight-bold">{{$val['surname'].' '.$val['other_names']}}</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="card mb-4">
                                <div class="card-header p-0 d-flex justify-content-between">
                                    <div class='m-3'>
                                        <i class="fas fa-table mr-1"></i>
                                        Change Application Status
                                    </div>
                                    @if($val['uploads'])
                                    <span class='p-2 px-4 bg-info d-flex justify-content-center align-items-center'>{{$val['uploads']}}</span>
                                    
                                    @endif
                                </div>
                                
                                <div class="card-body">  
                                @if($tablename == 'kpp')
                                <form method="POST" action="{{route('add.kppStatusUpdate')}}" enctype="multipart/form-data">
                                @endif
                                @if($tablename == 'ext')
                                <form method="POST" action="{{route('add.extensionStatusUpdate')}}" enctype="multipart/form-data">
                                @endif                                  
                                @csrf
                                    <div class='d-flex'>

                                        <input type='hidden' value='{{$val["id"]}}' name='app_id'/>
                                        <input type='hidden' value='{{$val["email"]}}' name='applicant_email'/>
                                        <div class='d-flex flex-column flex-grow-1 mr-4'>
                                            <label for="application_status_select">Change Status</label>
                                            <select class="form-select form-select w-100 outline-none" id="application_status_select" width='100' name='status_select'>
                                                    <option value='in progress' selected>In Progress</option>
                                                    <option value='approved' >Approved</option>
                                                    <option value='declined' >Declined</option>
                                            </select>
                                        </div>
                                        
                                        <div class='d-flex flex-column'>
                                            <label for="file_upload">Upload File</label>
                                            <input type="file" id='file_upload' name='fileResponse'/>
                                        </div>
                                    </div>
                                    <input class="btn btn-outline-info p-2 select-change-btn w-100 mt-4" id="application_status_submit" type="submit" value='Save'/>
                                    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
                                    <script>
                                        $(function(){
                                            
                                            let currentSelected = 'in progress'
                                            let parentBox = $("#ChangeKpptapp_{{$val['id'].'_'.str_replace(' ','_',$val['application_status'])}}")
                                            let selectBox = parentBox.find('#application_status_select')
                                            let statusBtn = parentBox.find('#application_status_submit')
                                            selectBox.on('change',function(e){
                                                
                                                if(currentSelected !== $(this).val()){
                                                    statusBtn.addClass("active")
                                                }else{
                                                    statusBtn.removeClass("active")
                                                }

                                            })
                                        })
                                    </script>
                                </form>
                                </div>
                            </div>
                            <br/>
                        </div>
                    </div>
                </div>
                @endif
            </tr>
<?php   }
    }
?>
    <div class="tab-nav d-flex mb-2 ">
        <div class="tab-link main-tab active" role='button' data-load-target='#kpp_requests'>
            <div style='color:var(--primary)'>
                <i class="far fa-address-card mr-1"></i>
                <span >Kpps Application Requests</span>
                @if(sizeOf($data) > 0)
                    <span class="badge badge-warning ml-3">{{sizeOf($data)}}</span>
                @endif
            </div>
        </div>
        <div class="tab-link main-tab" role='button' data-load-target='#ext_requests'>
            <div class='d-flex align-items-center' style='color:var(--success)'>
                <i class="material-icons mr-2" style="color:var(--success)">extension</i>
                <span >Visa Extension Requests</span>
                @if(sizeOf($visarequests) > 0)
                    <span class="badge badge-warning ml-3">{{sizeOf($visarequests)}}</span>
                @endif
            </div>
        </div>
        <div class="tab-link main-tab" role='button' data-load-target='#visa_responses'>
            <div style='color:var(--info)'>
                <i class="fas fa-table mr-1"></i>
                <span >Visa Responses</span>
            </div>
        </div>
    </div>
    @if(Session::has('download_success') )
    <div class="alert alert-success" role="alert">
    {{Session::get('download_success')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    </div>
    @endif
    @if(Session::has('download_fail') )
    <div class="alert alert-danger" role="alert">
    {{Session::get('download_fail')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    </div>
    @endif

    @if(Session::has('email_send_success') )
    <div class="alert alert-success" role="alert">
    {{Session::get('email_send_success')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    </div>
    @endif
    @if(Session::has('email_send_fail') )
    <div class="alert alert-danger" role="alert">
    {{Session::get('email_send_fail')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    </div>
    @endif
    @if(Session::has('error') )
    <div class="alert alert-danger" role="alert">
    {{Session::get('error')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    </div>
    @endif

    <div class="container-fluid buddy-contents active" id="kpp_requests"><br/>
        <div class="card mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>application id</th>
                                <th>student id</th>
                                <th>student names</th>
                                <th>NATIONALITY</th>
                                <th>status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>application id</th>
                                <th>student id</th>
                                <th>student names</th>
                                <th>NATIONALITY</th>
                                <th>status</th>
                                <th>Actions</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach($data as $kpps)
                            @php $folder='kpps' @endphp
                                <tr>
                                    <td> {{$kpps['id']}}</td>
                                    <td> {{$kpps['student_id']}}</td>
                                    <td> {{$kpps['surname'].' '.$kpps['other_names']}}</td>
                                    <td> {{$kpps['nationality']}}</td>
                                    <td> {{$kpps['application_status']}}</td>
                                    
                                    <td class="d-flex justify-content-around">
                                        @php $data= Crypt::encrypt($kpps['student_id']); @endphp                                                                                            

                                        <span class="fas fa-eye " role='button' aria-hidden="false" data-toggle="modal" data-target="#Viewkppapp_{{$kpps['id']}}" style=" color:blue"></span>
                                        <span class="fas fa-upload " role='button' aria-hidden="false" data-toggle="modal" data-target="#ChangeKpptapp_{{$kpps['id']}}" style=" color:blue"></span>


                                        <div class="modal fade modal-md w-100"  id="Viewkppapp_{{$kpps['id']}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                                        aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header text-center">
                                                        <h4 class="modal-title w-100 font-weight-bold">{{$kpps['surname'].' '.$kpps['other_names']}}</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="card mb-4">
                                                        <div class="card-header">
                                                            <i class="fas fa-table mr-1"></i>
                                                        My Student Pass Application View.
                                                        </div>
                                                        
                                                            <div class="card-body">                                    
                                                                <div class="form-row " style="text-align:justify;">

                                                                    <div class="col">
                                                                        <div class="form-group">
                                                                        <label for="usr">Strathmore ID:</label>
                                                                        <input type="text" class="form-control" id="usr" value="{{$kpps['student_id']}}" disabled>
                                                                        </div>
                                                                    </div> 
                                                                    <div class="col">
                                                                    <div class="form-group">
                                                                        <label for="usr">Surname:</label>
                                                                        <input type="text" class="form-control" id="usr" value="{{$kpps['surname']}} " disabled>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col">
                                                                    <div class="form-group">
                                                                        <label for="usr">Other Names:</label>
                                                                        <input type="text" class="form-control" id="usr" value="{{$kpps['other_names']}}" disabled>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="form-row" style="text-align:justify;">
                                                                <div class="col">
                                                                    <div class="form-group">
                                                                        <label for="usr">Passport Number:</label>
                                                                        <input type="text" class="form-control" id="usr" value="{{$kpps['passport_number']}}  " disabled>
                                                                    </div>
                                                                </div>
                                                                <div class="col">
                                                                    <div class="form-group">
                                                                        <label for="usr">Date Of Entryr:</label>
                                                                        <input type="text" class="form-control" id="usr" value="----" disabled>
                                                                    </div>
                                                                </div>
                                                                <div class="col">
                                                                    <div class="form-group">
                                                                        <label for="usr">Date Requested:</label>
                                                                        <input type="text" class="form-control" id="usr" value="{{$kpps['application_date']}}  " disabled>
                                                                    </div>
                                                                </div>                                                                                                                                                                                                                                     
                                                    </div><br/>    

                                                <!-- Uploaded Documents -->        
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
                                                                <td > <a href="/downloadKpps/{{$kpps['passport_biodata']}}" style="color:green"> Download</a></td>
                                                                <td > <a href="/downloadKpps/{{$kpps['current_visa']}}" style="color:green"> Download</a></td>
                                                                <td > <a href="/downloadKpps/{{$kpps['accademic_transcript']}}" style="color:green"> Download</a></td>
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
                                                                <td > <a href="/downloadKpps/{{$kpps['commitment_letter']}}" style="color:green"> Download</a></td>
                                                                <td > <a href="/downloadKpps/{{$kpps['police_clearance']}}" style="color:green"> Download</a></td>
                                                                <td > <a href="/downloadKpps/{{$kpps['guardian_biodata']}}" style="color:green"> Download</a></td>
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
                                                                <td > <a href="/downloadKpps/{{$kpps['passport_picture']}}" style="color:green"> Download</a></td>
                                                                @if($kpps['uploads'])
                                                                <td class='bg-info' style='color:white'> <a href="/downloadKpps/{{$kpps['uploads']}}"> Download</a></td>
                                                                @else
                                                                <td > <span style="color:grey"> No File to Download</a></td>
                                                                @endif
                                                            </tr>
                                                            </tbody>
                                                        </table>    
                                                    </div><br/>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </td>
                                    <div class="modal fade"  id="ChangeKpptapp_{{$kpps['id']}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                                    aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header text-center">
                                                    <h4 class="modal-title w-100 font-weight-bold">{{$kpps['surname'].' '.$kpps['other_names']}}</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="card mb-4">
                                                    <div class="card-header p-0 d-flex justify-content-between">
                                                        <div class='m-3'>
                                                            <i class="fas fa-table mr-1"></i>
                                                            Change Application Status
                                                        </div>
                                                        @if($kpps['uploads'])
                                                        <span class='p-2 px-4 bg-info d-flex justify-content-center align-items-center'>{{$kpps['uploads']}}</span>
                                                        
                                                        @endif
                                                    </div>
                                                    
                                                    <div class="card-body">                                    
                                                    <form method="POST" action="{{route('add.kppStatusUpdate')}}" enctype="multipart/form-data">
                                                    @csrf
                                                        <div class='d-flex'>

                                                            <input type='hidden' value='{{$kpps["id"]}}' name='app_id'/>
                                                            <input type='hidden' value='{{$kpps["email"]}}' name='applicant_email'/>
                                                            <div class='d-flex flex-column flex-grow-1 mr-4'>
                                                                <label for="application_status_select">Change Status</label>
                                                                <select class="form-select form-select w-100 outline-none" id="application_status_select" width='100' name='status_select'>
                                                                    @foreach($applicationStatus[0] as $option)
                                                                        @if(strtolower($option) == strtolower($applicationStatus[1]))
                                                                            <option selected value='{{$option}}' >{{$option}}</option>
                                                                        @else
                                                                            <option value='{{$option}}' >{{$option}}</option>
                                                                        @endif
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            
                                                            <div class='d-flex flex-column'>
                                                                <label for="file_upload">Upload File</label>
                                                                <input type="file" id='file_upload' name='fileResponse'/>
                                                            </div>
                                                        </div>
                                                        <input class="btn btn-outline-info p-2 select-change-btn w-100 mt-4" id="application_status_submit" type="submit" value='Save'/>
                                                        <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
                                                        <script>
                                                            $(function(){
                                                                
                                                                let currentSelected = '<?php echo strtolower($applicationStatus[1])?>'
                                                                let parentBox = $("#ChangeKpptapp_{{$kpps['id']}}")
                                                                let selectBox = parentBox.find('#application_status_select')
                                                                let statusBtn = parentBox.find('#application_status_submit')
                                                                selectBox.on('change',function(e){
                                                                    // if(e.target.value.toLowerCase() !== 'in progress' || e.target.value.toLowerCase() !== 'approved'){
                                                                    //     document.querySelector("#ChangeExtapp_{{$kpps['id']}}").child('#file_upload').disabled=true
                                                                    // }else{
                                                                    //     document.querySelector("#ChangeExtapp_{{$kpps['id']}}").child('#file_upload').disabled=false
                                                                    // }

                                                                    if(currentSelected !== $(this).val()){
                                                                        statusBtn.addClass("active")
                                                                    }else{
                                                                        statusBtn.removeClass("active")
                                                                    }

                                                                })
                                                            })
                                                        </script>
                                                    </form>
                                                    </div>
                                                </div>
                                                <br/>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </tr>
                            @endforeach
                            </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid buddy-contents" id="ext_requests"><br/>
        <div class="card mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="VisaTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>application id</th>
                                <th>student id</th>
                                <th>student names</th>
                                <th>NATIONALITY</th>
                                <th>status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>application id</th>
                                <th>student id</th>
                                <th>student names</th>
                                <th>NATIONALITY</th>
                                <th>status</th>
                                <th>Actions</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach($visarequests as $val)
                            @if($val['application_status'] === 'pending')
                                <tr>
                                    <td> {{$val['id']}}</td>
                                    <td> {{$val['student_id']}}</td>
                                    <td> {{$val['surname']}} {{$val['other_names']}}</td>
                                    <td> {{$val['nationality']}}</td>
                                    <td> {{$val['application_status']}}</td>
                                    
                                    <td >
                                        @php $data= Crypt::encrypt($val['student_id']); @endphp                                                                                            

                                        <span class="fas fa-eye " role='button' aria-hidden="false" data-toggle="modal" data-target="#Viewextapp_{{$val['id']}}" style=" color:blue"></span>
                                        <span class="fas fa-upload " role='button' aria-hidden="false" data-toggle="modal" data-target="#ChangeExtapp_{{$val['id']}}" style=" color:blue"></span>

                                        <div class="modal fade "  id="Viewextapp_{{$val['id']}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                                        aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header text-center">
                                                        <h4 class="modal-title w-100 font-weight-bold">{{$val['surname'].' '.$val['other_names']}}</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="card mb-4">
                                                        <div class="card-header">
                                                            <i class="fas fa-table mr-1"></i>
                                                        My Student Pass Application View.
                                                        </div>
                                                        
                                                            <div class="card-body">                                    
                                                                    <div class="form-row " style="text-align:justify;">

                                                                        <div class="col">
                                                                            <div class="form-group">
                                                                            <label for="usr">Strathmore ID:</label>
                                                                            <input type="text" class="form-control" id="usr" value="{{$val['student_id']}}" disabled>
                                                                            </div>
                                                                        </div> 
                                                                        <div class="col">
                                                                        <div class="form-group">
                                                                            <label for="usr">Surname:</label>
                                                                            <input type="text" class="form-control" id="usr" value="{{$val['surname']}} " disabled>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col">
                                                                        <div class="form-group">
                                                                            <label for="usr">Other Names:</label>
                                                                            <input type="text" class="form-control" id="usr" value="{{$val['other_names']}}" disabled>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-row" style="text-align:justify;">
                                                                                <div class="col">
                                                                                    <div class="form-group">
                                                                                        <label for="usr">Passport Number:</label>
                                                                                        <input type="text" class="form-control" id="usr" value="{{$val['passport_number']}}  " disabled>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col">
                                                                                    <div class="form-group">
                                                                                        <label for="usr">Date Of Entryr:</label>
                                                                                        <input type="text" class="form-control" id="usr" value="----" disabled>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col">
                                                                                    <div class="form-group">
                                                                                        <label for="usr">Date Requested:</label>
                                                                                        <input type="text" class="form-control" id="usr" value="{{$val['application_date']}}  " disabled>
                                                                                    </div>
                                                                                </div>                                                                                                                                                                                                                                     
                                                                </div><br/>    

                                                            <!-- Uploaded Documents -->        
                                                            <h4>Required Documents</h4><br/>
                                                            <div class="container">
                                                                <div class="row">
                                                                    
                                                                <table class="table table-striped">
                                                                    <thead>
                                                                    <tr>
                                                                        <th>Passport Biodata</th>
                                                                        <th>Current Visa Page:</th>
                                                                        <th>Entry Visa Page</th>
                                                                    </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                    <tr>
                                                                        <td > <a href="/file-view/extension/{{Crypt::encrypt($val['passport_biodata'])}}" style="color:green"> Download</a></td>
                                                                        <!-- <td > <a href="/downloadKpps/{{$val['passport_biodata']}}" style="color:green"> Download</a></td> -->
                                                                        <td > <a href="/downloadKpps/{{$val['current_visa']}}" style="color:green"> Download</a></td>
                                                                        <td > <a href="/downloadKpps/{{$val['entry_visa']}}" style="color:green"> Download</a></td>
                                                                    </tr>
                                                                    </tbody>

                                                                    <thead>
                                                                    <tr>
                                                                        <th>Application Response</th>
                                                                    </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                    <tr>
                                                                        @if($val['uploads'])
                                                                        <td class='bg-info' style='color:white'> <a href="/downloadKpps/{{$val['uploads']}}"> Download</a></td>
                                                                        @else
                                                                        <td > <span style="color:grey"> No File to Download</a></td>
                                                                        @endif
                                                                    </tr>
                                                                    </tbody>
                                                                </table>
                                                            
                                                                
                                                    </div>
                                                        
                                                    <br/>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </td>
                                    <div class="modal fade"  id="ChangeExtapp_{{$val['id']}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                                        aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header text-center">
                                                        <h4 class="modal-title w-100 font-weight-bold">{{$val['surname'].' '.$val['other_names']}}</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="card mb-4">
                                                        <div class="card-header p-0 d-flex justify-content-between">
                                                            <div class='m-3'>
                                                                <i class="fas fa-table mr-1"></i>
                                                                Change Application Status
                                                            </div>
                                                            @if($val['uploads'])
                                                            <span class='p-2 px-4 bg-info d-flex justify-content-center align-items-center'>{{$val['uploads']}}</span>
                                                            
                                                            @endif
                                                        </div>
                                                        
                                                        <div class="card-body">                                    
                                                        <form method="POST" action="{{route('add.extensionStatusUpdate')}}" enctype="multipart/form-data">
                                                        @csrf
                                                            <div class='d-flex'>

                                                                <input type='hidden' value='{{$val["id"]}}' name='app_id'/>
                                                                <input type='hidden' value='{{$val["email"]}}' name='applicant_email'/>
                                                                <div class='d-flex flex-column flex-grow-1 mr-4'>
                                                                    <label for="application_status_select">Change Status</label>
                                                                    <select class="form-select form-select w-100 outline-none" id="application_status_select" width='100' name='status_select'>
                                                                        @foreach($ext_applicationStatus[0] as $option)
                                                                            @if(strtolower($option) == strtolower($ext_applicationStatus[1]))
                                                                                <option selected value='{{$option}}' >{{$option}}</option>
                                                                            @else
                                                                                <option value='{{$option}}' >{{$option}}</option>
                                                                            @endif
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                
                                                                <div class="mb-3">
                                                                    <label for="file_upload" class="form-label">Upload File</label>
                                                                    <input class="form-control" type="file" id="file_upload" name='fileResponse'>
                                                                </div>
                                                            </div>
                                                            <input class="btn btn-outline-info p-2 select-change-btn w-100 mt-4" id="application_status_submit" type="submit" value='Save'/>
                                                            <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
                                                            <script>
                                                                $(function(){
                                                                    
                                                                    let currentSelected = '<?php echo strtolower($ext_applicationStatus[1])?>'
                                                                    let parentBox = $("#ChangeExtapp_{{$val['id']}}")
                                                                    let selectBox = parentBox.find('#application_status_select')
                                                                    let statusBtn = parentBox.find('#application_status_submit')
                                                                    selectBox.on('change',function(e){
                                                                        // if(e.target.value.toLowerCase() !== 'in progress' || e.target.value.toLowerCase() !== 'approved'){
                                                                        //     document.querySelector("#ChangeExtapp_{{$val['id']}}").child('#file_upload').disabled=true
                                                                        // }else{
                                                                        //     document.querySelector("#ChangeExtapp_{{$val['id']}}").child('#file_upload').disabled=false
                                                                        // }

                                                                        if(currentSelected !== $(this).val()){
                                                                            statusBtn.addClass("active")
                                                                        }else{
                                                                            statusBtn.removeClass("active")
                                                                        }

                                                                    })
                                                                })
                                                            </script>
                                                        </form>
                                                        </div>
                                                    </div>
                                                    <br/>
                                                </div>
                                            </div>
                                        </div>
                                </tr>
                            @endif
                            @endforeach
                            </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid buddy-contents" id="visa_responses"><br/>
        <div class="tab-nav d-flex mb-4 mt-0">
            <div class="tab-link sub-tab active" role='button' data-load-target='#approved_visas'>
                <div style='color:var(--primary)'>
                    <i class="fas fa-table mr-1"></i>
                    <span >Approved Visas</span>
                </div>
            </div>
            <div class="tab-link sub-tab" role='button' data-load-target='#in_progress_visas'>
                <div style='color:var(--success)'>
                    <i class="fas fa-table mr-1"></i>
                    <span >Progress Visas</span>
                </div>
            </div>
            <div class="tab-link sub-tab" role='button' data-load-target='#declined_visas'>
                <div style='color:var(--danger)'>
                    <i class="fas fa-table mr-1"></i>
                    <span >Declined Visas</span>
                </div>
            </div>
        </div>
        <div class="card subTab-Content mb-4 active" id='approved_visas'>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="VisaTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Icon</th>
                                <th>application id</th>
                                <th>student id</th>
                                <th>student names</th>
                                <th>NATIONALITY</th>
                                <th>status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(sizeOf($kppApproved) > 0 || sizeOf($extApproved) > 0)
                                @php DisplayData($kppApproved,'kpp',$applicationStatus); @endphp
                                @php DisplayData($extApproved,'ext',$applicationStatus); @endphp
                            @else
                            <tr><td colspan='7'>No Data Found</td></tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="card subTab-Content mb-4 " id='in_progress_visas'>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="VisaTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Icon</th>
                                <th>application id</th>
                                <th>student id</th>
                                <th>student names</th>
                                <th>NATIONALITY</th>
                                <th>status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(sizeOf($kppProgress) > 0 || sizeOf($extProgress) > 0)
                                @php DisplayData($kppProgress,'kpp',$applicationStatus,'progress'); @endphp
                                @php DisplayData($extProgress,'ext',$applicationStatus,'progress'); @endphp
                            @else
                            <tr><td colspan='7'>No Data Found</td></tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="card subTab-Content mb-4 " id='declined_visas'>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="VisaTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Icon</th>
                                <th>application id</th>
                                <th>student id</th>
                                <th>student names</th>
                                <th>NATIONALITY</th>
                                <th>status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(sizeOf($kppDeclined) > 0 || sizeOf($extDeclined) > 0)
                                @php DisplayData($kppDeclined,'kpp',$applicationStatus); @endphp
                                @php DisplayData($extDeclined,'ext',$applicationStatus); @endphp
                            @else
                            <tr><td colspan='7'>No Data Found</td></tr>
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
            
            $('body').find('.tab-link.main-tab').on('click',function(e){
                $(this).siblings().removeClass('active')
                $(this).addClass('active')
                $('body').find($(this).attr('data-load-target')).siblings('.container-fluid').removeClass('active')
                $('body').find($(this).attr('data-load-target')).addClass('active')
                
            })
            $('body').find('.tab-link.sub-tab').on('click',function(e){
                $(this).siblings().removeClass('active')
                $(this).addClass('active')
                $('body').find($(this).attr('data-load-target')).siblings('.card').removeClass('active')
                $('body').find($(this).attr('data-load-target')).addClass('active')
                
            })

        })
    </script>
@endsection