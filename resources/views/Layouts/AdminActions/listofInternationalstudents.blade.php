@extends('Layouts.AdminActions.adminMaster')
@section('content')
                    <div class="container-fluid"><br/>
                        <ol class="breadcrumb mb-4" style="background:#286DE7;">
                            <li class="breadcrumb-item active" style="color:white;">List of all  Registered international Students</li>
                        </ol>
                        @if(Session::has('Record_Updated'))
                        <div class="alert alert-success" role="alert">
                        {{Session::get('Record_Updated')}}
                        </div>
                        @endif

                        @if(Session::has('Not_Available'))
                        <div class="alert alert-danger" role="alert">
                        {{Session::get('Not_Available')}}
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
                            <a class="btn btn-success" href="{{ _('PDF')}}" style="float:right"><span class="fa fa-spinner fa-spin fa-1x fa-fw" aria-hidden="true"></span>Generate Report</a>
                            <i class="fas fa-table mr-1"></i>
                               List of all Registered International Students.
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
                                                <td>{{$student['student_id']}}</td>
                                                <td>{{$student['suID']}}</td>
                                                <td>{{$student['firstNAME']}}</td>
                                                <td>{{$student['lastNAME']}}</td>
                                                <td>{{$student['suEMAIL']}}</td>
                                                <td>{{$student['Course']}}</td>
                                                <td>{{$student['Nationality']}}</td>


                                                <td>
                                                @php $studentID= Crypt::encrypt($student->id); @endphp                                                                                            

                                                <a href="/NewStudentView/{{$studentID}}" target="blank">
                                                    <span class="fas fa-eye" aria-hidden="false"></span>
                                                </a>
                                                <a href="/EditstudentDetails/{{$studentID}}" style="color:green">
                                                <span class="fas fa-edit" aria-hidden="true"></span>
                                                </a>                                                
                                                <a class="delete" href="/ISdelete/{{$studentID}}" style="color:red" data-confirm="Are you sure to delete this Record?">
                                                <span class="fas fa-trash" aria-hidden="true" ></span>
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