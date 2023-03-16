@extends('Layouts.studentActions.studentMaster')
@section('content')
        <div class="container-fluid"><br/>  
        <ol class="breadcrumb mb-4">
                        <a href="{{__('BuddyProgram')}}">Return to Buddy Program Home</a>.<br/>
                        </ol>                 
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table mr-1"></i>
                    Completed Buddy Allocations.
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                                                <th>Buddy SUID.</th>
                                                <th>Buddy Name</th>
                                                <th>Student ID</th>
                                                <th>Student Name</th>
                                                <th>Email</th>
                                                <th>Course</th>
                                                <th>Nationality</th>
                                                <th>Actions</th>

                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Buddy SUID.</th>
                                                <th>Buddy Name</th>
                                                <th>Student ID</th>
                                                <th>Student Name</th>
                                                <th>Email</th>
                                                <th>Course</th>
                                                <th>Nationality</th>
                                                <th>Actions</th>

                                            </tr>
                                        </tfoot>
                                        <tbody>
                                        @foreach($Buddies as $Buddy)
                                            <tr>
                                                <td hidden>{{$Buddy->id}}</td>
                                                <td>{{$Buddy->Buddy_suID}}</td>
                                                <td>{{$Buddy->Buddy_otherNAMES}}</td>
                                                <td>{{$Buddy->NewSTD_suID}}</td>
                                                <td>{{$Buddy->NewSTD_otherNAMES}}</td>
                                                <td>{{$Buddy->NewSTD_email}}</td>
                                                <td>{{$Buddy->NewSTD_course}}</td>
                                                <td>{{$Buddy->NewSTD_Nationality}}</td>


                                                <td>
                                                @php $BuddyID= Crypt::encrypt($Buddy->id); @endphp                                                                                            

                                                <a href="" target="blank">
                                                    <span class="fas fa-eye" aria-hidden="false"></span>
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