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
                                                <th>Status</th>
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
                                                <th>Status</th>
                                                <th>Role</th>
                                                <th>Actions</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                        @foreach($users as $user)
                                            <tr>
                                                <td>{{$user['surname']}}</td>
                                                <td>{{$user['other_names']}}</td>
                                                <td>{{$user['email']}}</td>
                                                @if($user['phone_number'])
                                                <td>{{$user['phone_number']}}</td>
                                                <td>{{$user['status']}}</td>
                                                @endif
                                                <td>-</td>
                                                <td>role</td>

                                                <td>
                                                <div>
                                                    <span class="fas fa-eye view-app-btn mt-2 mb-2" role='button' aria-hidden="false" data-toggle="modal" data-target="#Viewkppapp_{{$user['user_id']}}" style=" color:blue"></span>
                                                    View User
                                                <div>
                                                <div class="modal fade modal-md w-100"  id="Viewkppapp_{{$user['user_id']}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                                                    aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header text-center">
                                                                    <h4 class="modal-title w-100 font-weight-bold">{{$user['surname'].' '.$user['other_names']}}</h4>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="card mb-4">
                                                                    <div class="card-header">
                                                                        <i class="fas fa-table mr-1"></i>
                                                                    My Student Pass Application View.
                                                                    </div>
                                                                    <div class="card-body">
                                                                        @if($user['status'] == 0)
                                                                            <button>Activate User</button>
                                                                        @else
                                                                            <button>Deactivate User</button>
                                                                        @endif
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
                    
 @endsection             