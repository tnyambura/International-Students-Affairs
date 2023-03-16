@extends('Layouts.SuperAdminActions.superadminMaster')
@section('content')   
                    <div class="container-fluid"><br/>
                        <ol class="breadcrumb mb-4" style="background:#286DE7;">
                            <li class="breadcrumb-item active" style="color:white;">List of Student pass Application Requests</li>
                        </ol>
                       
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
                                                <th>id</th>
                                                <th>Name</th>
                                                <th>Passport Number</th>
                                                <th>Date Requested</th>
                                                <th>Entry Date</th>
                                                <th>NATIONALITY</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>id</th>
                                                <th>Name</th>
                                                <th>Passport Number</th>
                                                <th>Date Requested</th>
                                                <th>Entry Date</th>
                                                <th>NATIONALITY</th>
                                                <th>Actions</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                        @foreach($data as $data)
                                            <tr>
                                                <td>{{$data['id']}}</td>
                                                <td>{{$data['otherNAMES']}}</td>
                                                <td>{{$data['passportNUMBER']}}</td>
                                                <td>{{$data['created_at']}}</td>
                                                <td>{{$data['dateofENTRY']}}</td>
                                                <td>{{$data['Nationality']}}</td>
                                                <td>
                                                <a href="#">
                                                    <span class="fas fa-eye" aria-hidden="false"></span>
                                                </a>                                                                                               
                                                
                                                <a href="#" style="color:green">
                                                <span class="fas fa-check" aria-hidden="true"></span>
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