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
                                                <th>Id</th>
                                                <th>Name</th>
                                                <th>Passport Number</th>
                                                <th>Email</th>
                                                <th>Status</th>
                                                <th>Date Requested</th>
                                                <th>su ID</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Id</th>
                                                <th>Name</th>
                                                <th>Passport Number</th>
                                                <th>Emails</th>
                                                <th>Status</th>
                                                <th>Date Requested</th>
                                                <th>su ID</th>
                                                <th>Actions</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                        @foreach($data as $data)
                                            <tr>
                                                <td>{{$userData->student_id}} </td>

                                                <td>
                                                @php $data= Crypt::encrypt($data->student_id); @endphp                                                                                            

                                                <a href="/MyVisaRequestVIEW/{{$data}}" target="blank">
                                                    <span class="fas fa-eye" aria-hidden="false"></span>
                                                </a>                                                                                               
                                                <a href="/MyvisaAppEDIT/{{$data}}" style="color:green">
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