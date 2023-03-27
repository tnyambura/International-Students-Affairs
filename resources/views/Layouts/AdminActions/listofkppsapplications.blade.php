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
                                                <th>Passport Number</th>
                                                <th>Date Requested</th>
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
                                                <th>Passport Number</th>
                                                <th>Date Requested</th>
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
                                                    <td> {{$kpps['passport_number']}}</td>
                                                    <td> {{$kpps['application_date']}}</td>
                                                    <td> {{$kpps['nationality']}}</td>
                                                    <td> {{$kpps['application_status']}}</td>
                                                    
                                                    <td>
                                                        <span class="fas fa-eye view-app-btn mt-2 mb-2" role='button' aria-hidden="false" data-toggle="modal" data-target="#Viewkppapp_{{$kpps['id']}}" style=" color:blue"></span>
                                                        <form method="POST" action="{{route('add.kppsStatusUpdate')}}">
                                                        @csrf
                                                            <input type='hidden' value='{{$kpps["id"]}}' name='app_id'/>
                                                            <input type='hidden' value='{{$kpps["email"]}}' name='applicant_email'/>
                                                            <select class="form-select form-select-lg" id="application_status_select" width='100' name='status_select'>
                                                                @foreach($applicationStatus[0] as $option)
                                                                    @if(strtolower($option) == strtolower($applicationStatus[1]))
                                                                        <option selected value='{{$option}}' >{{$option}}</option>
                                                                    @else
                                                                        <option value='{{$option}}' >{{$option}}</option>
                                                                    @endif
                                                                @endforeach
                                                            </select>
                                                            <input class="btn btn-outline-info p-1 btn-block select-change-btn mt-2" id="application_status_submit" type="submit" value='save'/>

                                                            <script>
                                                                let currentSelected = '<?php echo strtolower($applicationStatus[1])?>'
                                                                let selectBox = document.querySelector('#application_status_select')
                                                                let statusBtn = document.querySelector('#application_status_submit')
                                                                selectBox.addEventListener('change',function(e){
                                                                    if(currentSelected !== e.target.value){
                                                                        statusBtn.classList.add("active")
                                                                    }else{
                                                                        statusBtn.classList.remove("active")
                                                                    }
                                                                })
                                                            </script>
                                                        </form>
                                                        <div class="modal fade modal-md w-100"  id="Viewkppapp_{{$kpps['id']}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                                                        aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
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
                                                                            <div class="form-row">

                                                                                <div class="col-md-4 mb-3">
                                                                                <label for="Id Number">Strathmore ID:</label>&nbsp&nbsp {{$kpps['student_id']}} 
                                                                                </div> 
                                                                                <div class="col-md-4 mb-3">
                                                                                    <label for="Surname">Surname:</label>&nbsp&nbsp{{$kpps['surname']}}                                  
                                                                                </div>
                                                                                <div class="col-md-4 mb-3">
                                                                                    <label for="Othernames">Other Names:</label>&nbsp&nbsp{{$kpps['other_names']}}                                                                      
                                                                                </div>
                                                                                <div class="col-md-4 mb-3">
                                                                                    <label for="PassportNumber">Passport Number:</label>&nbsp&nbsp{{$kpps['passport_number']}}
                                                                                </div>                            
                                                                            </div>
                                                                            <div class="form-row">
                                                                                <div class="col-md-4 mb-3">
                                                                                <label for="dateofENTRY">Date Of Entry:</label>&nbsp&nbsp ---------                                  
                                                                                </div>                                   
                                                                                <div class="col-md-4 mb-3">
                                                                                <label for="Othernames">Date Requested:</label>&nbsp&nbsp {{$kpps['application_date']}}                                                                      
                                                                                </div>
                                                                            </div><br/>
                                                                            <h4>uploaded Documents</h4><br/>
                                                                            <div class="container">
                                                                                <div class="row">
                                                                                <div class="col-sm-6">
                                                                                <label>Passport Biodata Page:</label>&nbsp&nbsp
                                                                                <a href="/downloadKpps/{{$kpps['passport_biodata']}}" style="color:green">
                                                                                <span class="fas fa-eye" aria-hidden="false" style="color:green"></span> Download</a>
                                                                                </div>
                                                                                <div class="col-sm-6">
                                                                                <label>Passport Visa Page:</label>&nbsp&nbsp
                                                                                <a href="/downloadKpps/{{$kpps['current_visa']}}" style="color:green">
                                                                                <span class="fas fa-eye" aria-hidden="false" style="color:green"></span> Download</a> </li>
                                                                                </div>
                                                                                </div></br>
                                                                                <div class="row">
                                                                                <div class="col-sm-6">
                                                                                <label>Academic Transcripts:</label>&nbsp&nbsp
                                                                                <a href="/downloadKpps/{{$kpps['accademic_transcript']}}" style="color:green">
                                                                                <span class="fas fa-eye" aria-hidden="false" style="color:green"></span> Download</a> </li>
                                                                                </div>
                                                                                <div class="col-sm-6">
                                                                                <label>Parents ID/Biodata Page:</label>&nbsp&nbsp
                                                                                <a href="/downloadKpps/{{$kpps['guardian_biodata']}}"style="color:green" >
                                                                                <span class="fas fa-eye" aria-hidden="false" style="color:green"></span> Download</a> </li>
                                                                                </div>
                                                                                </div></br>
                                                                                <div class="row">
                                                                                <div class="col-sm-6">
                                                                                <label>Commitment Letter:</label>&nbsp&nbsp
                                                                                <a href="/downloadKpps/{{$kpps['commitment_letter']}}" style="color:green">
                                                                                <span class="fas fa-eye" aria-hidden="false" style="color:green"></span> Download</a> </li>
                                                                                </div>
                                                                                <div class="col-sm-6">
                                                                                <label>Police Clearance/Good Conduct:</label>&nbsp&nbsp
                                                                                <a href="/downloadKpps/{{$kpps['police_clearance']}}" style="color:green">
                                                                                <span class="fas fa-eye" aria-hidden="false" style="color:green"></span> Download</a> </li>
                                                                                </div>
                                                                                </div></br>
                                                                                <div class="row">
                                                                                <div class="col-sm-6">
                                                                                <label>Most Recent Passport Pictures:</label>&nbsp&nbsp
                                                                                <a href="/downloadKpps/{{$kpps['passport_picture']}}" style="color:green">
                                                                                <span class="fas fa-eye" aria-hidden="false" style="color:green"></span> Download</a> </li>
                                                                                </div>  
                                                                            </div>
                                                                        </div>
                                                                        <div class="card-footer">
                                                                            but
                                                                        </div>
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