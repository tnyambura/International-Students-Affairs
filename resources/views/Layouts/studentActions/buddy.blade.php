@extends('Layouts.studentActions.buddy_index')
@section('buddy_load')
<div class="container-fluid buddy-contents active" id="my__allocations">
    <div class="card mb-4 flex-grow-1">
        <div class="card-header">
            <i class="fas fa-table mr-1"></i>
            List of Students Allocated. Total of ({{sizeOf($allAllocated)}})
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                        <th>Student Id</th>
                        <th>Student Name</th>
                        <th>Student Email</th>
                        <th>Student Telephone</th>
                        <th>Student Year</th>
                        <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    @if(sizeOf($allAllocated) > 0)
                    @foreach($allAllocated as $st)
                        <tr>
                            <td>{{$st['student_id']}}</td>
                            <td>{{$st['surname'].' '.$st['other_names']}}</td>
                            <td>{{$st['email']}}</td>
                            <td>{{$st['phone_number']}}</td>
                            <td>{{$st['year']}}</td>
                            <td>
                                <span class="fas fa-eye" aria-hidden="false"></span>
                                
                            </td>
                        </tr>
                    @endforeach
                    @else
                        <tr>
                            <td colspan='5'>No Allocation Found</td>
                        </tr>
                    @endif
                    
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection