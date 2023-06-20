

    @extends('Layouts.AdminActions.visa.index',
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
    @section('data_content')
        <div class="container-fluid buddy-contents active">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                            <thead class="thead">
                                <tr>
                                    <th>No</th>
                                    <th>student id</th>
                                    <th>student names</th>
                                    <th>NATIONALITY</th>
                                    <th>status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($visarequests as $val)
                                @if($val['application_status'] === 'pending')
                                    <tr>
                                        <td> {{$val['id']}}</td>
                                        <td> {{$val['student_id']}}</td>
                                        <td> {{$val['surname']}} {{$val['other_names']}}</td>
                                        <td> {{$val['nationality']}}</td>
                                        <td> {{$val['application_status']}}</td>
                                        
                                        <td class="d-flex justify-content-around align-items-center">

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
                                                                                <label for="usrId">Strathmore ID:</label>
                                                                                <input type="text" class="form-control" id="usrId" value="{{$val['student_id']}}" disabled>
                                                                                </div>
                                                                            </div> 
                                                                            <div class="col">
                                                                            <div class="form-group">
                                                                                <label for="surnName">Surname:</label>
                                                                                <input type="text" class="form-control" id="surnName" value="{{$val['surname']}} " disabled>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col">
                                                                            <div class="form-group">
                                                                                <label for="otherNames">Other Names:</label>
                                                                                <input type="text" class="form-control" id="otherNames" value="{{$val['other_names']}}" disabled>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-row" style="text-align:justify;">
                                                                                    <div class="col">
                                                                                        <div class="form-group">
                                                                                            <label for="passportNo">Passport Number:</label>
                                                                                            <input type="text" class="form-control" id="passportNo" value="{{$val['passport_number']}}  " disabled>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col">
                                                                                        <div class="form-group">
                                                                                            <label for="dateOfEntry">Date Of Entry:</label>
                                                                                            <input type="text" class="form-control" id="dateOfEntry" value="{{$val['date_of_entry']}}" disabled>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col">
                                                                                        <div class="form-group">
                                                                                            <label for="DateRequested">Date Requested:</label>
                                                                                            <input type="text" class="form-control" id="DateRequested" value="{{$val['application_date']}}  " disabled>
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
                                                                            <!-- <td > <a href="/file-view/extension/{{Crypt::encrypt($val['passport_biodata'])}}" style="color:green"> Download</a></td> -->
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
                                                                            <td class='bg-info' style='color:white'> <a class='download-file-btn' href="/downloadKpps/{{$val['uploads']}}"> Download</a></td>
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
                                                                                    @if(strtolower($option) === 'in progress')
                                                                                    <option value='{{$option}}' >{{$option}}</option>
                                                                                    @endif
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
    @endsection