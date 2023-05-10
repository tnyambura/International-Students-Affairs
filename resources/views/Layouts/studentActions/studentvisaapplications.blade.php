@extends('Layouts.studentActions.studentMaster',['title'=>'My Ext','userData'=>$user,'availability'=>$availability, 'NoBooking'=>$NoBooking,'NoExt'=>$NoExt,'NoKpps'=>$NoKpps])
@section('content')
    <nav class="d-flex align-items-center top-title-sticky" style='position:sticky; top:0; z-index:2999; padding:8px; background:#fff; width:100%; height: 56px;'>
        <span>My extension</span>
    </nav>
    <div class="container-fluid"><br/>
        <div class="breadcrumb mb-4 bg-light" style="border:1px solid rgb(110,110,110); border-radius:10px;">
            <p class="breadcrumb-item active">
            All extension applications with wrong information will be directly rejected. 
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



        @if(sizeOf($data) == 0)
        <!-- <div class="card d-flex align-items-center" style=""> -->
            {!! file_get_contents(public_path('asset/img/dataNotFound.svg')) !!}
        <!-- </div> -->
        @else
        <!-- <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table mr-1"></i>
                My student Pass Applications List.
            </div>-->
            <div class="visa-card-container">
            @foreach($data as $appdata)
            
                    <div class="course">
                        <div class="course-preview">
                            <div class="d-flex flex-column justify-content-between h-100">
                                <h6>Student Pass
                                    <small>{{$appdata->id}}</small>
                                </h6>
                                <div class='d-flex align-items-center first-Open' data-app-id='{{$appdata->id}}' title="View Application" role='button' aria-hidden="false" data-toggle="modal" data-target="#Viewextapp_{{$appdata->id}}" data-target-focus="Viewkppapp_{{$appdata->id}}" style=" color:#fff; font-size:12px;">
                                    <span class="material-icons view-app-btn mr-2">attachment</span>
                                    View More
                                </div>
                            </div>
                            @php $ContentW='100%'; @endphp
                            @if(!empty($appdata->uploads))
                            @php $ContentW='80%'; @endphp
                            <a href='/downloadKpps/{{$appdata->uploads}}' class='top-rslt-file ' style='display:none; width: 20%; color:red;'><i style='box-sizing:content-box; font-size:30px;' class='far fa-file-pdf'></i></a>
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
                                <div style='font-size: 13px; width:{{$ContentW}};'>
                                    <p>Full Name: <strong>{{$userDetails->surname.' '.$userDetails->other_names}}</strong></p>
                                    <p class='m-0'>Passport: <strong>{{$userDetails->passport_number}}</strong> </p>
                                    <p class='m-0'>Requested Date: <strong>{{$appdata->application_date}}</strong></p>
                                    <p>Expiry Date: <strong>{{$appdata->expiry_date}}</strong></p>
                                </div>
                                @if(!empty($appdata->uploads))
                                <a href='/downloadExtension/{{$appdata->uploads}}' class='rslt-file d-flex align-items-center justify-content-center' style='width: 20%; color:red;'><i style='box-sizing:content-box; font-size:30px;' class='far fa-file-pdf'></i></a>
                                @endif
                                @if($appdata->application_status === 'pending')
                                <a role="button" href='{{__("cancelextApp")}}' class="cancelkpp-btn" style=" color:#CC0D0D" title="Cancel Application" data-target='{{$appdata->id}}'>
                                    <span class="fas fa-trash " role='button' data-action="" aria-hidden="false" data-toggle="modal" data-target="#" data-target-focus=""></span>
                                </a>
                                @endif
                                
                            </div>
                        </div>
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
                                                        <td class='bg-info'> <a href="/downloadExtension/{{$v->uploads}}" style='color:white'> Download</a></td>
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
            @endforeach
            </div>
        <!-- </div> -->
        @endif
    </div>
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
    <script defer>
        $(document).ready(function() {
            $('.first-Open').on('click',function(e){
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