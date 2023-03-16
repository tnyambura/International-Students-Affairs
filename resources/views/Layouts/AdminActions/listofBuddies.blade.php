@extends('Layouts.AdminActions.adminMaster')
@section('content')
                    <div class="container-fluid"><br/>
                        <ol class="breadcrumb mb-4" style="background:#113C7A;">
                            <li class="breadcrumb-item active" style="color:white;">List of all  Registered Buddies</li>
                        </ol>
                        @if(Session::has('Record_Updated'))
                        <div class="alert alert-success" role="alert">
                        {{Session::get('Record_Updated')}}
                        </div>
                        @endif

                        @if(Session::has('New_Student_Added'))
                        <div class="alert alert-success" role="alert">
                        {{Session::get('New_Student_Added')}}
                        </div>
                        @endif
                       
                        @if(Session::has('Record_deleted'))
                        <div class="alert alert-danger" role="alert">
                        {{Session::get('Record_deleted')}}
                        </div>
                        @endif
                           
                        @if(Session::has('data_not_available'))
                        <div class="alert alert-danger" role="alert">
                        {{Session::get('data_not_available')}}
                        </div>
                        @endif
                        <div class="card mb-4">
                            <div class="card-header">
                            <a class="btn btn-success" href="{{__('ListOfBuddies')}}" style="float:right"><span class="fa fa-spinner fa-spin fa-1x fa-fw" aria-hidden="true"></span>Generate Report</a>
                            <i class="fas fa-table mr-1"></i>
                               Registered Buddies.
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Admission.</th>
                                                <th>Firstname</th>
                                                <th>Lastname</th>
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
                                                <th>Firstname</th>
                                                <th>Lastname</th>
                                                <th>Email</th>
                                                <th>Course</th>
                                                <th>Nationality</th>
                                                <th>Actions</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                        @foreach($students as $student)
                                            <tr>
                                                <td>{{$student['id']}}</td>
                                                <td>{{$student['suID']}}</td>
                                                <td>{{$student['surNAME']}}</td>
                                                <td>{{$student['otherNAMES']}}</td>
                                                <td>{{$student['email']}}</td>
                                                <td>{{$student['course']}}</td>
                                                <td>{{$student['Nationality']}}</td>


                                                <td>
                                                @php $studentID= Crypt::encrypt($student->id); @endphp                                                                                            

                                                <a href="/BuddyDetailsView/{{$studentID}}" target="blank">
                                                    <span class="fas fa-eye" aria-hidden="false"></span>
                                                </a>
                                                <a href="/EditBuddyDetails/{{$studentID}}" style="color:green">
                                                <span class="fas fa-edit" aria-hidden="true"></span>
                                                </a>                                                
                                                <a href="/DeleteBuddy/{{$studentID}}" style="color:red">
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