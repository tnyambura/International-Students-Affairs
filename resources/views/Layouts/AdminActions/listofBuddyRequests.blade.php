@extends('Layouts.AdminActions.adminMaster')
@section('content')
                    <div class="container-fluid"><br/>
                        <ol class="breadcrumb mb-4" style="background:#113C7A;">
                            <li class="breadcrumb-item active" style="color:white;">List of all Buddy Allocation Requests</li>
                        </ol>
                        @if(Session::has('Buddy_Allocated'))
                        <div class="alert alert-success" role="alert">
                        {{Session::get('Buddy_Allocated')}}
                        </div>
                        @endif
                        @if(Session::has('Buddy_Allocation_fail'))
                        <div class="alert alert-danger" role="alert">
                        {{Session::get('Buddy_Allocation_fail')}}
                        </div>
                        @endif

                       
                        <div class="card mb-4">
                            <div class="card-header">
                            <i class="fas fa-table mr-1"></i>
                               Buddy Requests.
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                            <th>Request Id</th>
                                                <th>user Id</th>
                                                <th>Names</th>
                                                <th>Email</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Request Id</th>
                                                <th>user Id</th>
                                                <th>Names</th>
                                                <th>Email</th>
                                                <th>Actions</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                        @foreach($buddiesRequests as $student)
                                            <tr>
                                                <td>{{$student['buddy_request_id']}}</td>
                                                <td>{{$student['id']}}</td>
                                                <td>{{$student['surname'].' '.$student['other_names']}}</td>
                                                <td>{{$student['email']}}</td>

                                                <td>
                                                @php $studentID= Crypt::encrypt($student['id']); @endphp      
                                                <div class="d-flex alig-items-center justify-content-center" role='button' style="color:#CC0D0D" data-toggle="modal" data-target="#AllocateBuddyModal" >
                                                    <span > Allocate</span>
                                                    <span class="fas fa-marker ml-2"aria-hidden="false"></span>
                                                </div>
                                                
                                                <div class="modal fade " id="AllocateBuddyModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                                                aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header text-center">
                                                                <h4 class="modal-title w-100 font-weight-bold">Register New Buddy</h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <form method="POST" action="{{ __('AllocateBuddy') }}" class='new-staff-form p-4'>
                                                                @csrf

                                                                <!-- surNAME -->
                                                                <div class="form-row w-100">
                                                                    <div class="col-lg-4 mb-3 ">   
                                                                        <p class="w-100 ">Allocate budy to student <strong>{{$student["id"]. ' - '. $student['surname'].' '.$student['other_names']}}</strong> </p> 
                                                                        <input id="student_id" class="form-control" type="hidden" value={{$student["id"]}} name="student_id" required autofocus />
                                                                        <label for="surNAME">Select Buddy</label> 
                                                                        <select class='form-select form-select-lg'>
                                                                            <option disabled selected>--SELECT BUDDY--</option> 
                                                                            @foreach($buddies as $buddy)
                                                                                <option value={{$buddy->id}}>{{$buddy->id.' - '. $buddy->surname. $buddy->other_names}}</option> 
                                                                            @endforeach
                                                                        </select> 
                                                                    </div></br>
                                                                </div>
                                                                <br/>
                                                                <div class="form-row justify-content-center">

                                                                    <div class="flex items-center justify-end mt-4">
                                                                    <input class="btn btn-success" value="Allocate" type="submit" />
                                                                    
                                                                    </div>
                                                                </div>
                                                            </form>
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