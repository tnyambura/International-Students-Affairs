@extends('Layouts.SuperAdminActions.superadminMaster')
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
                                                <th>Name</th>
                                                <th>Passport.</th>
                                                <th>Course</th>
                                                <th>SU ID</th>
                                                <th>Email</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Id</th>
                                                <th>Name</th>
                                                <th>Passport.</th>
                                                <th>Course</th>
                                                <th>SU ID</th>
                                                <th>Email</th>
                                                <th>Actions</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                        @foreach($students as $student)
                                            <tr>
                                                <td>{{$student['id']}}</td>
                                                <td>{{$student['surNAME']}},{{$student['firstNAME']}}</td>
                                                <td>{{$student['passportNUMBER']}}</td>
                                                <td>{{$student['Course']}}</td>
                                                <td>{{$student['suID']}}</td>
                                                <td>{{$student['suEMAIL']}}</td>

                                                <td>
                                                <a href="#" >
                                                    <span class="fas fa-eye" aria-hidden="false"></span>
                                                </a>
                                                <a href="/EditstudentRecords/{{$student->id}}" style="color:green">
                                                <span class="fas fa-edit" aria-hidden="true"></span>
                                                </a>                                                
                                                <a href="/DeleteRSTD/{{$student->id}}" style="color:red">
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