@extends('Layouts.AdminActions.adminMaster')
@section('content')
                    <div class="container-fluid"><br/>
                        <ol class="breadcrumb mb-4" style="background:#113C7A;">
                            <li class="breadcrumb-item active" style="color:white;">List of all Buddy Allocations</li>
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
                       
                        @if(Session::has('data_not_available'))
                        <div class="alert alert-danger" role="alert">
                        {{Session::get('data_not_available')}}
                        </div>
                        @endif
                       
                        <div class="card mb-4">
                            <div class="card-header">
                            <a class="btn btn-success" href="{{__('/BuddyAllocationsPDF')}}" style="float:right"><span class="fa fa-spinner fa-spin fa-1x fa-fw" aria-hidden="true"></span>Generate Report</a>
                            <i class="fas fa-table mr-1"></i>
                               Buddies Allocation.
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>BuddySUID.</th>
                                                <th>Buddy Names</th>
                                                <th>suID</th>
                                                <th>Names</th>
                                                <th>Email</th>
                                                <th>Course</th>
                                                <th>Date Allocated</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>BuddySUID.</th>
                                                <th>Buddy Names</th>
                                                <th>suID</th>
                                                <th>Names</th>
                                                <th>Email</th>
                                                <th>Course</th>
                                                <th>Date Allocated</th>
                                                <th>Actions</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                        @foreach($Buddies as $Buddy)
                                            <tr>
                                                <td hidden>{{$Buddy['id']}}</td>
                                                <td>{{$Buddy['Buddy_suID']}}</td>
                                                <td>{{$Buddy['Buddy_otherNAMES']}}</td>
                                                <td>{{$Buddy['NewSTD_suID']}}</td>
                                                <td>{{$Buddy['NewSTD_otherNAMES']}}</td>
                                                <td>{{$Buddy['NewSTD_email']}}</td>
                                                <td>{{$Buddy['NewSTD_course']}}</td>
                                                <td>{{$Buddy['created_at']}}</td>



                                                <td>
                                                @php $BuddyID= Crypt::encrypt($Buddy->id); @endphp                                                                                            

                                                <a href="#" target="blank">
                                                    <span class="fas fa-eye" aria-hidden="false"></span>
                                                </a>
                                                <a href="#" style="color:green">
                                                <span class="fas fa-edit" aria-hidden="true"></span>
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