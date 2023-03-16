@extends('Layouts.SuperAdminActions.superadminMaster')
@section('content')   
                    <div class="container-fluid"><br/>
                        <ol class="breadcrumb mb-4" style="background:#286DE7;">
                            <li class="breadcrumb-item active" style="color:white;">List of all  Registered international Students</li>
                        </ol>
                       
                        
                       
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                               List of all Registered International Students.
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>SurName</th>
                                                <th>OtherNames.</th>
                                                <th>SU ID</th>
                                                <th>Email</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Id</th>
                                                <th>SurName</th>
                                                <th>OtherNames.</th>
                                                <th>SU ID</th>
                                                <th>Email</th>
                                                <th>Actions</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                        @foreach($users as $users)
                                            <tr>
                                                <td>{{$users['id']}}</td>
                                                <td>{{$users['surNAME']}}</td>
                                                <td>{{$users['otherNAMES']}}</td>
                                                <td>{{$users['suID']}}</td>
                                                <td>{{$users['email']}}</td>

                                                <td> 
                                                 @php $studentID= Crypt::encrypt($users->id); @endphp                                                                                            
                                             
                                                <a href="#" style="color:green">
                                                <span class="fas fa-edit" aria-hidden="true"></span>
                                                </a>                                                
                                                <a href="/ManageUser/{{$studentID}}" style="color:red">
                                                <span class="fas fa-list" aria-hidden="true"></span>
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