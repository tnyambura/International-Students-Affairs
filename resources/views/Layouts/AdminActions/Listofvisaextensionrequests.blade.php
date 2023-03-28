@extends('Layouts.AdminActions.adminMaster')
@section('content')
                    <div class="container-fluid"><br/>
                        <ol class="breadcrumb mb-4" style="background:#286DE7;">
                            <li class="breadcrumb-item active" style="color:white;">List Student Visa Extension Requests</li>
                        </ol>
                        @if(Session::has('email_send_success') )
                        <div class="alert alert-success" role="alert">
                        {{Session::get('email_send_success')}}
                        </div>
                        @endif
                        @if(Session::has('email_send_fail') )
                        <div class="alert alert-danger" role="alert">
                        {{Session::get('email_send_fail')}}
                        </div>
                        @endif
                        @if(Session::has('error') )
                        <div class="alert alert-danger" role="alert">
                        {{Session::get('error')}}
                        </div>
                        @endif
                       
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                               List of Student Visa Extension Requests.
                            </div>
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
                                            @foreach($visarequests as $visarequest)
                                                <tr>
                                                    <td> {{$visarequest['id']}}</td>
                                                    <td> {{$visarequest['student_id']}}</td>
                                                    <td> {{$visarequest['surname']}} {{$visarequest['other_names']}}</td>
                                                    <td> {{$visarequest['nationality']}}</td>
                                                    <td> {{$visarequest['application_status']}}</td>
                                                    
                                                    <td class="d-flex justify-content-around">
                                                        @php $data= Crypt::encrypt($visarequest['student_id']); @endphp                                                                                            

                                                        <span class="fas fa-eye " role='button' aria-hidden="false" data-toggle="modal" data-target="#Viewkppapp_{{$visarequest['id']}}" style=" color:blue"></span>
                                                        <span class="fas fa-upload " role='button' aria-hidden="false" data-toggle="modal" data-target="#ChangeExtapp_{{$visarequest['id']}}" style=" color:blue"></span>

                                                        <div class="modal fade"  id="Viewkppapp_{{$visarequest['id']}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                                                        aria-hidden="true">
                                                            <div class="modal-dialog modal-lg" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header text-center">
                                                                        <h4 class="modal-title w-100 font-weight-bold">{{$visarequest['surname'].' '.$visarequest['other_names']}}</h4>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="card mb-4">
                                                                        <div class="card-header">
                                                                            <i class="fas fa-table mr-1"></i>
                                                                        Visa extension Application View.
                                                                        </div>
                                                                        
                                                                        <div class="card-body">                                    
                                                                            <div class="form-row">

                                                                                <div class="col-md-4 mb-3">
                                                                                <label for="Id Number">Strathmore ID:</label>&nbsp&nbsp {{$visarequest['student_id']}} 
                                                                                </div> 
                                                                                <div class="col-md-4 mb-3">
                                                                                    <label for="Surname">Surname:</label>&nbsp&nbsp{{$visarequest['surname']}}                                  
                                                                                </div>
                                                                                <div class="col-md-4 mb-3">
                                                                                    <label for="Othernames">Other Names:</label>&nbsp&nbsp{{$visarequest['other_names']}}                                                                      
                                                                                </div>
                                                                                <div class="col-md-4 mb-3">
                                                                                    <label for="PassportNumber">Passport Number:</label>&nbsp&nbsp{{$visarequest['passport_number']}}
                                                                                </div>                            
                                                                            </div>
                                                                            <div class="form-row">
                                                                                <div class="col-md-4 mb-3">
                                                                                <label for="dateofENTRY">Date Of Entry:</label>&nbsp&nbsp {{$visarequest['date_of_entry']}}                                
                                                                                </div>                                   
                                                                                <div class="col-md-4 mb-3">
                                                                                <label for="Othernames">Date Requested:</label>&nbsp&nbsp {{$visarequest['application_date']}}                                                                      
                                                                                </div>
                                                                            </div><br/>
                                                                            <h4>uploaded Documents</h4><br/>
                                                                            <div class="container">
                                                                                <div class="row">
                                                                                <div class="col-sm-6">
                                                                                <label>Passport Biodata Page:</label>&nbsp&nbsp
                                                                                <a href="/downloadExtension/{{$visarequest['passport_biodata']}}" style="color:green">
                                                                                <span class="fas fa-eye" aria-hidden="false" style="color:green"></span> Download</a>
                                                                                </div>
                                                                                <div class="col-sm-6">
                                                                                <label>Entry Visa:</label>&nbsp&nbsp
                                                                                <a href="/downloadExtension/{{$visarequest['entry_visa']}}" style="color:green">
                                                                                <span class="fas fa-eye" aria-hidden="false" style="color:green"></span> Download</a> </li>
                                                                                </div>
                                                                                </div></br>
                                                                                <div class="row">
                                                                                <div class="col-sm-6">
                                                                                <label>Current Visa:</label>&nbsp&nbsp
                                                                                <a href="/downloadExtension/{{$visarequest['current_visa']}}" style="color:green">
                                                                                <span class="fas fa-eye" aria-hidden="false" style="color:green"></span> Download</a> </li>
                                                                                </div> 
                                                                                <div class="col-sm-6">
                                                                                <label>Response File:</label>&nbsp&nbsp
                                                                                @if($visarequest['uploads'])
                                                                                <a href="/downloadExtension/{{$visarequest['uploads']}}" style="color:green">
                                                                                <span class="fas fa-eye" aria-hidden="false" style="color:green"></span> Download</a> 
                                                                                @else
                                                                                <span class="fas fa-eye" aria-hidden="false" style="color:grey"></span> No file uploaded</a> 
                                                                                @endif
                                                                                </div> 
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <br/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                    </td>
                                                    <div class="modal fade"  id="ChangeExtapp_{{$visarequest['id']}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                                                        aria-hidden="true">
                                                            <div class="modal-dialog modal-lg" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header text-center">
                                                                        <h4 class="modal-title w-100 font-weight-bold">{{$visarequest['surname'].' '.$visarequest['other_names']}}</h4>
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
                                                                            @if($visarequest['uploads'])
                                                                            <span class='p-2 px-4 bg-info d-flex justify-content-center align-items-center'>{{$visarequest['uploads']}}</span>
                                                                            
                                                                            @endif
                                                                        </div>
                                                                        
                                                                        <div class="card-body">                                    
                                                                        <form method="POST" action="{{route('add.extensionStatusUpdate')}}" enctype="multipart/form-data">
                                                                        @csrf
                                                                            <div class='d-flex'>

                                                                                <input type='hidden' value='{{$visarequest["id"]}}' name='app_id'/>
                                                                                <input type='hidden' value='{{$visarequest["email"]}}' name='applicant_email'/>
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
                                                                                    let parentBox = $("#ChangeExtapp_{{$visarequest['id']}}")
                                                                                    let selectBox = parentBox.find('#application_status_select')
                                                                                    let statusBtn = parentBox.find('#application_status_submit')
                                                                                    selectBox.on('change',function(e){
                                                                                        // if(e.target.value.toLowerCase() !== 'in progress' || e.target.value.toLowerCase() !== 'approved'){
                                                                                        //     document.querySelector("#ChangeExtapp_{{$visarequest['id']}}").child('#file_upload').disabled=true
                                                                                        // }else{
                                                                                        //     document.querySelector("#ChangeExtapp_{{$visarequest['id']}}").child('#file_upload').disabled=false
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