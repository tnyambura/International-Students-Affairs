@extends('Layouts.studentActions.studentMaster',['userData'=>$user,'availability'=>$availability, 'NoBooking'=>$NoBooking,'NoExt'=>$NoExt,'NoKpps'=>$NoKpps])
@section('content')
                    <div class="container-fluid"><br/>
                        <ol class="breadcrumb mb-4" style="background:#286DE7;">
                            <li class="breadcrumb-item active" style="color:white;">List of my Visa Extension Requests</li>
                        </ol>

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
                        @if(Session::has('extApp_cancel_success'))
                        <div class="alert alert-success" role="alert">
                        {{Session::get('extApp_cancel_success')}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        @endif                       
                        @if(Session::has('extApp_cancel_fail'))
                        <div class="alert alert-danger" role="alert">
                        {{Session::get('extApp_cancel_fail')}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        @endif 
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                               My Visa Extension Request List.
                            </div>                      
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr class='sticky-top'>
                                                <th>application Id</th>
                                                <th>entry date</th>
                                                <th>application date</th>
                                                <th>application status</th>
                                                <th>expire date</th>
                                                <th>action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($data as $appdata)
                                        @if(!empty($appdata->first_open))
                                            <tr style='background: rgba(144,238,144,.2)'>
                                        @else
                                            <tr>
                                        @endif
                                                <td>{{$appdata->id}} </td>
                                                <td>{{$appdata->date_of_entry}} </td>
                                                <td>{{$appdata->application_date}} </td>
                                                <td>{{$appdata->application_status}} </td>
                                                <th>{{$appdata->expiry_date}}</th>
                                                <td>  
                                                    <div class='d-flex align-items-center justify-content-around'>
                                                    @if(!empty($appdata->first_open))
                                                        <span class="fas fa-eye first-Open" data-app-id='{{$appdata->id}}' role='button' data-toggle="modal" title="View Application" data-target="#Viewextapp_{{$appdata->id}}" style=" color:blue"></span>
                                                    @else
                                                        <span class="fas fa-eye"  role='button' data-toggle="modal" title="View Application" data-target="#Viewextapp_{{$appdata->id}}" style=" color:blue"></span>
                                                    @endif
                                                        @if($appdata->application_status === 'pending')
                                                        <a role="button" href='{{__("cancelextApp")}}' title="Cancel Application" class="cancelext-btn" style=" color:#CC0D0D">
                                                            <span class="fas fa-trash " role='button' ></span>
                                                        </a>
                                                        @endif
                                                    </div> 
                                                    <div class="modal fade modal-md w-100"  id="Viewextapp_{{$appdata->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
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
                                                                                    <label for="usr">Expiry Date:</label>
                                                                                    <input type="text" class="form-control" id="usr" value="{{$v->expiry_date}}" disabled>
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
                                                                                        <th>Current Visa Page</th>
                                                                                        <th>Entry Visa</th>
                                                                                    </tr>
                                                                                    </thead>
                                                                                    <tbody>
                                                                                    <tr>
                                                                                        <td > <a href="/downloadExtension/{{$v->passport_biodata}}" style="color:green"> Download</a></td>
                                                                                        <td > <a href="/downloadExtension/{{$v->current_visa}}" style="color:green"> Download</a></td>
                                                                                        <td > <a href="/downloadExtension/{{$v->entry_visa}}" style="color:green"> Download</a></td>
                                                                                        <!-- <td > <a href="/file-view/extension/{{Crypt::encrypt($v->passport_biodata)}}" style="color:green"> Download</a></td>
                                                                                        <td > <a href="/file-view/extension/{{Crypt::encrypt($v->current_visa)}}" style="color:green"> Download</a></td>
                                                                                        <td > <a href="/file-view/extension/{{$v->entry_visa}}" style="color:green"> View</a></td> -->
                                                                                        <!-- <td > <a href="/file-view/extension/{{Crypt::encrypt($v->entry_visa)}}" style="color:green"> Download</a></td> -->
                                                                                    </tr>
                                                                                    </tbody>
    
                  
                                                                                    <tr>
                                                                                        <th>Application Response</th>
                                                                                    </tr>
                                                                                    </thead>
                                                                                    <tbody>
                                                                                    <tr>
                                                                                        @if($v->uploads)
                                                                                        <td class='bg-info'> <a href="/downloadKpps/{{$v->uploads}}" style='color:white'> Download</a></td>
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
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
                    <script defer>
                        $(document).ready(function() {
                            console.log('{{json_encode($getDataView)}}');
                            $('.first-Open').on('click',function(e){
                                // console.log(parseInt($(this).attr('data-app-id')));
                                $.ajax({
                                    url: '{{route("add.firstOpen")}}',
                                    method: 'GET',
                                    data: {id:parseInt($(this).attr('data-app-id')),table:'extension_application'},
                                    success: function(res){ console.log(res);}
                                })
                            })
                            $('.cancelext-btn').on('click',function(e){
                                e.preventDefault()
                                if(confirm('Do you really want to cancel this application?')){
                                    window.location = $(this).attr('href')
                                }
                            })

                            $('table').find('.view-app-btn').on('click',function(){
                                let loadDiv = $('body').find(`#${$(this).attr('data-target-focus')}`).find(('.loadKppApplicationData'))
                                let data= []
                                let modalContainer=$('#Viewkppapp_'+parseInt($(this).attr('data-id')))
                                // if(data.length > 0){
                                    // console.log(+1);
                                    // }
                                $.ajax({
                                    url: '{{route("add.viewKppApp")}}',
                                    method: 'GET',
                                    data: {id:parseInt($(this).attr('data-id')),session:'{{Auth::user()->id}}'},
                                    success: function(result){
                                        let div =`<div class="card mb-4"> \
                                                <div class="card-header">\
                                                <i class="fas fa-table mr-1"></i>\ My Student Pass Application Details\
                                                </div>\
                                                <div class="card-body"> <div class="form-row">\
                                                    <div class="col-md-4 mb-3">\
                                                        <label for="Surname">Surname:</label> ${result[0].surname} \
                                                        </div>\
                                                    <div class="col-md-4 mb-3">\
                                                        <label for="Othernames">Other Names:</label>${result[0].other_names}\
                                                        </div> <div class="col-md-4 mb-3">\
                                                        <label for="PassportNumber">Passport Number:</label>${result[0].passport_number}\
                                                    </div></div>\
                                                    <div class="form-row">\
                                                    <div class="col-md-4 mb-3">\
                                                    <label for="dateofENTRY">Requested on:</label>&nbsp&nbsp ${result[0].application_date}\
                                                    </div>\
                                                    <div class="col-md-4 mb-3">\
                                                    <label for="PassportNumber">Strathmore ID:</label> ${result[0].student_id}\
                                                    </div>\</div><br/>\<h4>uploaded Documents</h4><br/>\
                                                    <div class="container"><div class="row">\
                                                    <div class="col-3 bg-red " style='width:50px;height:100px'><div>\</div>
                                                    </div></div>`;

                                        modalContainer.find('.loadKppApplicationData').html(div)
                                        setTimeout(() => {
                                            modalContainer.modal('toggle')
                                        }, 500);
                                    }
                                });
                                // console.log('result');
                                // loadDiv.html('<p>'+$(this).attr('data-action')+'</p>')
                            })

                        })
                    </script>
               @endsection