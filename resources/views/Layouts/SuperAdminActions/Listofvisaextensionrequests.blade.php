@extends('Layouts.SuperAdminActions.superadminMaster')
@section('content')   
                    <div class="container-fluid"><br/>
                        <ol class="breadcrumb mb-4" style="background:#286DE7;">
                            <li class="breadcrumb-item active" style="color:white;">List Student Visa Extension Requests</li>
                        </ol>
                       
                        
                       
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                               List of Student Visa Extension Requests.
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Name</th>
                                                <th>Passport Number</th>
                                                <th>Date Requested</th>
                                                <th>Email</th>
                                                <th>Nationality</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>                                               
                                                <th>Id</th>
                                                <th>Name</th>
                                                <th>Passport Number</th>
                                                <th>Date Requested</th>
                                                <th>Email</th>
                                                <th>Nationality</th>
                                                <th>Actions</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                        @foreach($visarequests as $visarequest)
                                            <tr>                                                 
                                                <td>{{$visarequest['id']}}</td>
                                                <td>{{$visarequest['otherNAMES']}}</td>
                                                <td>{{$visarequest['passportNUMBER']}}</td>
                                                <td>{{$visarequest['created_at']}}</td>
                                                <td>{{$visarequest['suEMAIL']}}</td>
                                                <td>{{$visarequest['Nationality']}}</td>
                                                <td>
                                                <a href="#" >
                                                    <span class="fas fa-eye" aria-hidden="false"></span>
                                                </a>
                                                <a href="#" style="color:green">
                                                <span class="fas fa-edit" aria-hidden="true"></span>
                                                </a>                                                
                                                <a href="#" style="color:red">
                                                <span class="fas fa-trash" aria-hidden="true"></span>
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