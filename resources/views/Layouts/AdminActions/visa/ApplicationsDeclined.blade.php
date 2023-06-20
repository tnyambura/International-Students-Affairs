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
                <td style='font-size: 12px;'> {{$val['expiry_date']}}</td>
                
                <td class="d-flex justify-content-around">
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
                                                    <label for="usr">Date Of Entry:</label>
                                                    <input type="text" class="form-control" id="usr" value="{{$val['date_of_entry']}}" disabled>
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
                                                        <td > <a class='download-file-btn' href="/downloadExtension/{{$val['passport_biodata']}}" style="color:green"> Download</a></td>
                                                        <td > <a class='download-file-btn' href="/downloadExtension/{{$val['current_visa']}}" style="color:green"> Download</a></td>
                                                        <td > <a class='download-file-btn' href="/downloadExtension/{{$val['entry_visa']}}" style="color:green"> Download</a></td>
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
                                                        <td class='bg-info' style='color:white'> <a class='download-file-btn' href="/downloadExtension/{{$val['uploads']}}"> Download</a></td>
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
                                                        <td > <a class='download-file-btn' href="/downloadKpps/{{$val['passport_biodata']}}" style="color:green"> Download</a></td>
                                                        <td > <a class='download-file-btn' href="/downloadKpps/{{$val['current_visa']}}" style="color:green"> Download</a></td>
                                                        <td > <a class='download-file-btn' href="/downloadKpps/{{$val['accademic_transcript']}}" style="color:green"> Download</a></td>
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
                                                        <td > <a class='download-file-btn' href="/downloadKpps/{{$val['commitment_letter']}}" style="color:green"> Download</a></td>
                                                        <td > <a class='download-file-btn' href="/downloadKpps/{{$val['police_clearance']}}" style="color:green"> Download</a></td>
                                                        <td > <a class='download-file-btn' href="/downloadKpps/{{$val['guardian_biodata']}}" style="color:green"> Download</a></td>
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
                                                        <td > <a class='download-file-btn' href="/downloadKpps/{{$val['passport_picture']}}" style="color:green"> Download</a></td>
                                                        @if($val['uploads'])
                                                        <td class='bg-info' style='color:white'> <a class='download-file-btn' href="/downloadKpps/{{$val['uploads']}}"> Download</a></td>
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
                                        
                                        <div class='d-flex flex-column mr-3 expire'>
                                            <label for="expiry_date">Expiry Date</label>
                                            <input type="date" class='pb-1' disabled style="border:0; border-bottom: 1px solid grey; " min='{{date("Y-m-d")}}' id="expiry_date" name ="expiry_date" required />
                                        </div>
                                        <div class='d-flex flex-column'>
                                            <label for="file_upload">Upload File</label>
                                            <input type="file" id='file_upload' name='fileResponse' required/>
                                        </div>
                                    </div>
                                    <input class="btn btn-outline-info p-2 select-change-btn w-100 mt-4" id="application_status_submit" type="submit" value='Save'/>
                                    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
                                    <script>
                                        $(function(){

                                            // $('#expiry_date').attr('disabled')
                                            
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
                                                if($(this).val() === 'approved'){
                                                    $(this).parent().siblings('.expire').find('input').prop('disabled',false)
                                                }else{
                                                    $(this).parent().siblings('.expire').find('input').prop('disabled',true)
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
@extends('Layouts.AdminActions.visa.responseIndex',
    [
        'newVisaReq'=>$newVisaReq,
        'BdCountReq'=>$BdCountReq,
        'data'=>$data,
        'applicationStatus'=>$applicationStatus,
        'visarequests'=>$visarequests,
        'ext_applicationStatus'=>$ext_applicationStatus,
        'extApproved'=>$extApproved,
        'extProgress'=>$extProgress,
        'extDeclined'=>$extDeclined,
        'kppApproved'=>$kppApproved,
        'kppProgress'=>$kppProgress,
        'kppDeclined'=>$kppDeclined
    ])
@section('subtabs_content')
    <div class="card subTab-Content mb-4 active" id='declined_visas'>
        <div class="card-header d-flex justify-content-between align-items-center" style="background:#113C7A;">
            <div style="color:#fff;">
                <i class="fas fa-table mr-1"></i>
                List of Declied Visa
            </div>
            <div class='d-flex align-items-center'>

                <form action='{{route("add.GeneratePDF")}}' method='post'>@csrf
                    <input type="hidden" name="function" value='getAllDeclinedVisaReport'>
                    <button type='submit'>
                    <i role='button' style='color:red; font-size:30px;' class='far fa-file-pdf'></i>
                    </button>
                </form>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead class="thead">
                        <tr>
                            <th>Icon</th>
                            <th>No</th>
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
@endsection