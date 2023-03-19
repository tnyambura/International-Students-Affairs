@extends('Layouts.AdminActions.adminMaster')
@section('content')   
                    <div class="container-fluid"><br/>
                        <ol class="breadcrumb mb-4" style="background:#286DE7;">
                            <li class="breadcrumb-item active" style="color:white;"> List of all International students registered as Users.</li>
                        </ol>
                       
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                               List of all International students registered as Users.
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>SurName</th>
                                                <th>OtherNames.</th>
                                                <th>email</th>
                                                <th>Telephone No</th>
                                                <th>Role</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                            <th>Id</th>
                                                <th>SurName</th>
                                                <th>OtherNames.</th>
                                                <th>email</th>
                                                <th>Telephone No</th>
                                                <th>Role</th>
                                                <th>Actions</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                        @foreach($users as $users)
                                            <tr>
                                                <td>{{$users->student_id}}</td>
                                                <td>{{$users->surname}}</td>
                                                <td>{{$users->other_names}}</td>
                                                <td>{{$users->email}}</td>
                                                <td>{{$users->phone_number}}</td>
                                                <td>role</td>

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