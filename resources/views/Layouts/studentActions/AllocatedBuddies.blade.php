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
                                <th>Allocation Id</th>
                                <th>Buddy Id</th>
                                <th>Buddy Name</th>
                                <th>Buddy Email</th>
                                <th>Buddy Telephone</th>
                                <th>Actions</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Allocation Id</th>
                                    <th>Buddy Id</th>
                                    <th>Buddy Name</th>
                                    <th>Buddy Email</th>
                                    <th>Buddy Telephone</th>
                                    <th>Actions</th>

                                </tr>
                            </tfoot>
                            <tbody>
                            @foreach($allocationGetter as $Buddy)
                                <tr>
                                    <td>{{$Buddy['buddy_id']}}</td>
                                    <td>{{$Buddy['allocation_id']}}</td>
                                    <td>{{$Buddy['surname'].' '.$Buddy['other_names']}}</td>
                                    <td>{{$Buddy['email']}}</td>
                                    <td>-</td>


                                    <td>
                                    <a href="" target="blank">
                                        <span class="fas fa-edit" aria-hidden="false"></span>
                                        Request buddy change
                                    </a>  
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table mr-1"></i>
                    List of Students Allocated.
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                <th>Allocation Id</th>
                                <th>Buddy Id</th>
                                <th>Buddy Name</th>
                                <th>Buddy Email</th>
                                <th>Buddy Telephone</th>
                                <th>Actions</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Allocation Id</th>
                                    <th>Buddy Id</th>
                                    <th>Buddy Name</th>
                                    <th>Buddy Email</th>
                                    <th>Buddy Telephone</th>
                                    <th>Actions</th>

                                </tr>
                            </tfoot>
                            <tbody>
                            @foreach($allocationGetter as $Buddy)
                                <tr>
                                    <td>{{$Buddy['buddy_id']}}</td>
                                    <td>{{$Buddy['allocation_id']}}</td>
                                    <td>{{$Buddy['surname'].' '.$Buddy['other_names']}}</td>
                                    <td>{{$Buddy['email']}}</td>
                                    <td>-</td>


                                    <td>
                                    <a href="" target="blank">
                                        <span class="fas fa-edit" aria-hidden="false"></span>
                                        Request buddy change
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