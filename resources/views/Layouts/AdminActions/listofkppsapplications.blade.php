@extends('Layouts.AdminActions.adminMaster')
@section('content')
                    <div class="container-fluid"><br/>
                        <ol class="breadcrumb mb-4" style="background:#286DE7;">
                            <li class="breadcrumb-item active" style="color:white;">List of Student pass Application Requests</li>
                        </ol>
                        @if(Session::has('email_send_success') )
                        <div class="alert alert-success" role="alert">
                        {{Session::get('email_send_success')}}
                        </div>
                        @endif
                        @if(Session::has('download_success') )
                        <div class="alert alert-success" role="alert">
                        {{Session::get('download_success')}}
                        </div>
                        @endif
                        @if(Session::has('download_fail') )
                        <div class="alert alert-danger" role="alert">
                        {{Session::get('download_fail')}}
                        </div>
                        @endif
                        @if(Session::has('email_send_fail') )
                        <div class="alert alert-danger" role="alert">
                        {{Session::get('email_send_fail')}}
                        </div>
                        @endif
                        
                       
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
                                                        <span class="fas fa-upload " role='button' aria-hidden="false" data-toggle="modal" data-target="#ChangeExtapp_{{$kpps['id']}}" style=" color:blue"></span>


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
                                                                         
                                                                               
                                                                    </div>
                                                                        
                                                                    <br/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                    </td>
                                                    <div class="modal fade"  id="ChangeExtapp_{{$kpps['id']}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
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
                                                                                    let parentBox = $("#ChangeExtapp_{{$kpps['id']}}")
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
               @endsection