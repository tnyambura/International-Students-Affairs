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
                                                                                        
                                                                                    </tr>
                                                                                    </thead>
                                                                                    <tbody>
                                                                                    <tr>
                                                                                        <td > <a href="/downloadKpps/{{$kpps['passport_picture']}}" style="color:green"> Download</a></td>
                                                                                       
                                                                                    </tr>
                                                                                  </tbody>
                                                                                </table>
                                                                         
                                                                               
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