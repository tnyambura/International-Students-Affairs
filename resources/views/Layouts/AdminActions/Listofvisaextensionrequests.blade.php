@extends('Layouts.AdminActions.adminMaster')
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
                                    <table class="table table-bordered" id="VisaTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Name</th>
                                                <th>Passport Number</th>
                                                <th>Date Requested</th>
                                                <th>Email</th>
                                                <th>Status</th>
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
                                                <th>Status</th>
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
                                                <td>{{$visarequest['status']}}</td>
                                                <td>{{$visarequest['Nationality']}}</td>                                                                                             
                                                <td>
                                                @php $visarequestID= Crypt::encrypt($visarequest->id); @endphp                                                                                            

                                                <a href="/NewVISAVIEW/{{$visarequestID}}" target="blank">
                                                <p><span class="fas fa-list-ul" aria-hidden="false"></span> Verify</p>
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