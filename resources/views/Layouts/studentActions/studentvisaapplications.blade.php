@extends('Layouts.studentActions.studentMaster')
@section('content')
                    <div class="container-fluid"><br/>
                        <ol class="breadcrumb mb-4" style="background:#286DE7;">
                            <li class="breadcrumb-item active" style="color:white;">List of my Visa Extension Requests</li>
                        </ol>
                        @if(Session::has('visa_updated_successfully'))
                        <div class="alert alert-success" role="alert">
                        {{Session::get('visa_updated_successfully')}}
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
                                            <tr>
                                                <th>application Id</th>
                                                <th>entry date</th>
                                                <th>application date</th>
                                                <th>application status</th>
                                                <th>expire date</th>
                                                <th>action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>application Id</th>
                                                <th>entry date</th>
                                                <th>application date</th>
                                                <th>application status</th>
                                                <th>expire date</th>
                                                <th>action</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                        @foreach($data as $data)
                                            <tr>
                                                <td>{{$data->id}} </td>
                                                <td>{{$data->date_of_entry}} </td>
                                                <td>{{$data->application_date}} </td>
                                                <td>{{$data->application_status}} </td>
                                                <th>-</th>
                                                <td>                                                                                           

                                                <a href="/MyVisaRequestVIEW/{{$data->id}}" target="blank">
                                                    <span class="fas fa-eye" aria-hidden="false"></span>
                                                </a>                                                                                               
                                                <a href="/MyvisaAppEDIT/{{$data->id}}" style="color:green">
                                                <span class="fas fa-edit" aria-hidden="true"></span>
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
               @endsection