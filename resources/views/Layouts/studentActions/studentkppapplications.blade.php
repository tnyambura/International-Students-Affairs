@extends('Layouts.studentActions.studentMaster')
@section('content')
                    <div class="container-fluid"><br/>
                        <ol class="breadcrumb mb-4" style="background:#286DE7;">
                            <li class="breadcrumb-item active" style="color:white;">List of my Student pass Applications</li>
                        </ol>
                        @if(Session::has('kpp_updated_successfully'))
                        <div class="alert alert-success" role="alert">
                        {{Session::get('kpp_updated_successfully')}}
                        </div>
                        @endif                       
                        @if(Session::has('kppApp_cancel_success'))
                        <div class="alert alert-success" role="alert">
                        {{Session::get('kppApp_cancel_success')}}
                        </div>
                        @endif                       
                        @if(Session::has('kppApp_cancel_fail'))
                        <div class="alert alert-danger" role="alert">
                        {{Session::get('kppApp_cancel_fail')}}
                        </div>
                        @endif                       
                       
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                               My student Pass Applications List.
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>application Id</th>
                                                <th>Full Name</th>
                                                <th>Passport Number</th>
                                                <th>Date Initiated</th>
                                                <th>status</th>
                                                <th>expire date</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>application Id</th>
                                                <th>Full Name</th>
                                                <th>Passport Number</th>
                                                <th>Date Initiated</th>
                                                <th>status</th>
                                                <th>expire date</th>
                                                <th>Actions</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                        @foreach($data as $appdata)
                                            <tr>
                                                <td>{{$appdata->id}} </td>
                                                <td>{{$userDetails->surname.' '.$userDetails->other_names}} </td>
                                                <td>{{$userDetails->passport_number}} </td>
                                                <td>{{$appdata->application_date}} </td>
                                                <td>{{$appdata->application_status}} </td>
                                                <th>-</th>
                                                <td class='d-flex flex-column justify-content-between align-items-center'>                                                                                           

                                                    <span class="fas fa-edit view-app-btn mt-2 mb-2" role='button' data-action="{{ __('fetchkppAppView') }}" aria-hidden="false" data-toggle="modal" data-target="#Viewkppapp_{{$appdata->id}}" data-target-focus="Viewkppapp_{{$appdata->id}}" style=" color:blue"></span>
                                                    <span class="fas fa-eye view-app-btn mt-2 mb-2" role='button' data-id="{{ $appdata->id }}" aria-hidden="false" style=" color:blue"></span>
                                                
                                                    <div class="modal fade modal-md" id="Viewkppapp_{{$appdata->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                                                    aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header text-center">
                                                                    <h4 class="modal-title w-100 font-weight-bold">{{$userDetails->surname.' '.$userDetails->other_names}}</h4>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class='loadKppApplicationData'></div>
                                                                <br/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <a role="button" href='{{__("cancelKppApp")}}' class="cancelkpp-btn" style=" color:#CC0D0D">
                                                        <span class="fas fa-trash " role='button' data-action="" aria-hidden="false" data-toggle="modal" data-target="#" data-target-focus=""></span>
                                                        Cancel application
                                                    </a>
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
                            $('.cancelkpp-btn').on('click',function(e){
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
                                        let div ='<div class="card mb-4"> \
                                                <div class="card-header">\
                                                <i class="fas fa-table mr-1"></i>\ My Student Pass Application View\
                                                </div>\
                                                <div class="card-body"> <div class="form-row">\
                                                    <div class="col-md-4 mb-3">\
                                                        <label for="Surname">Surname:</label> result \
                                                        </div>\
                                                    <div class="col-md-4 mb-3">\
                                                        <label for="Othernames">Other Names:</label>\
                                                        </div> <div class="col-md-4 mb-3">\
                                                        <label for="PassportNumber">Passport Number:</label>\
                                                    </div></div>\
                                                    <div class="form-row">';

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