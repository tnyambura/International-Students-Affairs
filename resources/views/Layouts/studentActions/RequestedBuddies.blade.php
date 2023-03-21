@extends('Layouts.studentActions.studentMaster')
@section('content')
        <div class="container-fluid"><br/> 
        <ol class="breadcrumb mb-4">
                        <a href="{{__('BuddyProgram')}}">Return to Buddy Program Home</a>.<br/>

                        </ol>                  
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table mr-1"></i>
                My Requests for a Buddy Allocation.
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Sur Name</th>
                                    <th>Other Names</th>
                                    <th>Date Requested</th>
                                    <th>Email</th>
                                    <th>Nationality</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tfoot>
                                 <tr>
                                    <th>id</th>
                                    <th>Sur Name</th>
                                    <th>Other Names</th>
                                    <th>Date Requested</th>
                                    <th>Email</th>
                                    <th>Nationality</th>
                                    <th>Actions</th>
                                </tr>
                            </tfoot>
                            <tbody>
                            @foreach($data as $data)
                                <tr>
                                    <td>{{$data->buddy_request_id}}</td>
                                    <td>{{$data->student_id}}</td>
                                    <td>{{$data->request_date}}</td>
                                    <td>{{$data->status}}</td>
                                    <td>
                                    @php $data= Crypt::encrypt($data->buddy_request_id); @endphp                                                                                            


                                                <a href="" target="blank">
                                                    <span class="fas fa-eye" aria-hidden="false"></span>
                                                </a>                                                                                               
                                                <a href="" style="color:green">
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