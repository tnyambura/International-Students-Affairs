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
                                                <th>ID</th>
                                                <th>Admission.</th>
                                                <th>Names</th>
                                                <th>Email</th>
                                                <th>Course</th>
                                                <th>Nationality</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>ID</th>
                                                <th>Admission.</th>
                                                <th>Names</th>
                                                <th>Email</th>
                                                <th>Course</th>
                                                <th>Nationality</th>
                                                <th>Actions</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                        @foreach($buddies as $student)
                                            <tr>
                                                <td>{{$student['id']}}</td>
                                                <td>{{$student['suID']}}</td>
                                                <td>{{$student['otherNAMES']}}</td>
                                                <td>{{$student['email']}}</td>
                                                <td>{{$student['course']}}</td>
                                                <td>{{$student['Nationality']}}</td>


                                                <td>
                                                @php $studentID= Crypt::encrypt($student->id); @endphp                                                                                            

                                                <a href="/AllocateBuddies/{{$studentID}}" target="blank" style="color:#CC0D0D">Allocate
                                                    <span class="fas fa-marker"aria-hidden="false"></span>
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