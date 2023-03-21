@extends('Layouts.studentActions.studentMaster')
@section('content')
        <div class="container-fluid"><br/>
           
            
            <div class="row">
                            <div class="col-xl-4 col-md-6">
                                <div class="card bg-info text-white mb-4">
                                    <div class="card-body">Request the Allocation of a Buddy</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="{{ __('RequestBuddy')}}">Initiate a Request</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6">
                                <div class="card bg-secondary text-white mb-4">
                                    <div class="card-body">View My Buddy Allocation (completed)</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="{{__('MyBuddyAllocations')}}">View my Allocation</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="col-xl-4 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">View my Buddy Allocation Requests</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="{{ __('MyBuddyRequest')}}">View List</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div> -->
                            <!-- <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">Allocate New Buddies to New International Students</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">Allocate Buddies</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div> -->
                        </div>
            
            <div class="card mb-4">
                @if(Session::has('buddy_cancel_success'))
                <div class="alert alert-success" role="alert">
                {{Session::get('buddy_cancel_success')}}
                </div>
                @endif
                @if(Session::has('buddy_cancel_fail'))
                <div class="alert alert-danger" role="alert">
                {{Session::get('buddy_cancel_fail')}}
                </div>
                @endif
                <div class="card-header">
                    <i class="fas fa-table mr-1"></i>
                    Buddy Allocation Request for {{ Auth::user()->otherNAMES}} <a href="{{__('MyBuddyAllocations')}}"></a>.
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                                <tr>
                                    <th>request id</th>
                                    <th>Date Requested</th>
                                    <th>status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                 <tr>
                                    <th>request id</th>
                                    <th>Date Requested</th>
                                    <th>status</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @if($RequestsData !== false)
                                    @foreach($RequestsData as $data)
                                    <tr>
                                        <td>{{$data->buddy_request_id}}</td>
                                        <td>{{$data->request_date}}</td>
                                        <td>{{$data->status}}</td>
                                        <td>    
                                            @if(strtolower($data->status) == 'pending') 
                                            <a href="{{__('cancelBuddy')}}" style="color:red">
                                                <span class="fas fa-trash" rule="button" aria-hidden="true"></span> Cancel
                                            </a>
                                            @else
                                            <span class="fas fa-trash" aria-hidden="true" style="color:grey; cursor: default"></span> Cancel
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                @endif
                            </tbody>
                            
                        </table>
                    </div>
                </div>
            </div>
        </div>
           
@endsection