@extends('Layouts.studentActions.studentMaster',['userData'=>$user,'availability'=>$availability])
@section('content')

    @if(!$is_buddy)
        <div class="tab-nav d-flex mb-2 w-100">
            <div class="tab-link active" role='button' data-load-target='#my_bd_req'>
                <div style='color:var(--primary)'>
                    <i class="fas fa-user-plus mr-1"></i>
                    <span >Request a Buddy</span>
                </div>
            </div>
            <div class="tab-link" role='button' data-load-target='#my_buddy'>
                <div style='color:var(--info)'>
                    <i class="fas fa-user-friends mr-1"></i>
                    <span >My Allocation</span>
                </div>
            </div>
        </div>
        @if(Session::has('New_request_assigned'))
        <div class="alert alert-success" role="alert">
        {{Session::get('New_request_assigned')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        @endif
        @if(Session::has('user_update_success'))
        <div class="alert alert-success" role="alert">
        {{Session::get('user_update_success')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        @endif
        @if(Session::has('user_update_failed'))
        <div class="alert alert-danger" role="alert">
        {{Session::get('user_update_failed')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        @endif
        @if(Session::has('request_change_success'))
        <div class="alert alert-success" role="alert">
        {{Session::get('request_change_success')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        @endif
        @if(Session::has('request_change_fail'))
        <div class="alert alert-danger" role="alert">
        {{Session::get('request_change_fail')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        @endif
        @if(Session::has('New_request_failed'))
        <div class="alert alert-danger" role="alert">
        {{Session::get('New_request_failed')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        @endif
        @if(Session::has('buddy_cancel_success'))
        <div class="alert alert-success" role="alert">
        {{Session::get('buddy_cancel_success')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        @endif
        @if(Session::has('buddy_cancel_fail'))
        <div class="alert alert-danger" role="alert">
        {{Session::get('buddy_cancel_fail')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        @endif

        <div class="container-fluid buddy-contents active" id="my_bd_req" style='color:white' ><br/>
            <ol class="breadcrumb mb-4 d-flex bg-info align-items-center" data-toggle="modal" data-target="#request_modal" role='button'>
                <i class="fas fa-user-plus mr-1"></i>
                <span class='ml-2'>Place a Request</span><br/>
            </ol> 
             
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table mr-1"></i>
                    Buddy Allocation Request for {{ Auth::user()->otherNAMES}} <a href="{{__('MyBuddyAllocations')}}"></a>.
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                                <tr class='sticky-top'>
                                    <th>request id</th>
                                    <th>Date Requested</th>
                                    <th>status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(sizeOf($RequestsData) >0)
                                    @foreach($RequestsData as $data)
                                    <tr>
                                        <td>{{$data['buddy_request_id']}}</td>
                                        <td>{{$data['request_date']}}</td>
                                        <td>{{$data['status']}}</td>
                                        <td>    
                                            @if(strtolower($data['status']) == 'cancel')
                                            <span class="fas fa-trash" aria-hidden="true" style="color:grey; cursor: default"></span> ------
                                            @elseif(strtolower($data['status']) == 'pending') 
                                            <form action="{{route('add.cancelBuddy')}}" method='post'> @csrf
                                                <input type="hidden" name='bd_rq_id' value="{{$data['buddy_request_id']}}">
                                                <button class='btn border-none bg-transparent' type='submit'>
                                                    <span class="fas fa-trash" style="color:red"></span> Cancel
                                                </button>
                                            </form>
                                            @else
                                            <span class="fas fa-trash" style="color:grey; cursor: default"></span> Cancel
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

        <div class="container-fluid buddy-contents" id="my_buddy"><br/>                 
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table mr-1"></i>
                    Completed Buddy Allocations.
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead class='sticky-top'>
                                <tr>
                                <th>Allocation Id</th>
                                <th>Buddy Id</th>
                                <th>Buddy Name</th>
                                <th>Buddy Email</th>
                                <th>Buddy Telephone</th>
                                <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($allocationGetter as $Buddy)
                                <tr>
                                    <td>{{$Buddy['request_id']}}</td>
                                    <td>{{$Buddy['buddy_id']}}</td>
                                    <td>{{$Buddy['surname'].' '.$Buddy['other_names']}}</td>
                                    <td>{{$Buddy['email']}}</td>
                                    <td>{{$Buddy['phone_number']}}</td>


                                    <td>
                                    
                                    <form method='post' action='{{route("add.requestBuddyChange")}}'> @csrf
                                        <input type='hidden' name='request_id' value="{{$Buddy['request_id']}}"/>
                                        @if($Buddy['request_change'] == '')
                                        <button target="blank" type='submit' role='button' class='btn btn-info d-flex align-items-center'>
                                            <span class="fas fa-edit mr-2" aria-hidden="false"></span>Request buddy change
                                        </button>  
                                        @else
                                        <button target="blank" disabled class='btn btn-info d-flex align-items-center'>
                                            <!-- <span class="badge badge-warning"></span> -->
                                            <span class="fas fa-exclamation-circle mr-2" style='color:var(--warning)'></span>Request Pending
                                        </button> 
                                        @endif
                                    </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
        </div>
    @else
        <div class="tab-nav d-flex mb-2 w-100">
            <div class="tab-link" role='button' data-load-target='#my__allocations'>
                <div style='color:var(--info)'>
                    <i class="fas fa-user-friends mr-1"></i>
                    <span >My Allocations</span>
                </div>
            </div>
        </div>
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
                                <th>Actions</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Student Id</th>
                                    <th>Student Name</th>
                                    <th>Student Email</th>
                                    <th>Student Telephone</th>
                                    <th>Actions</th>
                                </tr>
                            </tfoot>
                            <tbody>
                            @foreach($allAllocated as $st)
                                <tr>
                                    <td>{{$st['student_id']}}</td>
                                    <td>{{$st['surname'].' '.$st['other_names']}}</td>
                                    <td>{{$st['email']}}</td>
                                    <td>{{$st['phone_number']}}</td>
                                    <td>
                                        <span class="fas fa-eye" aria-hidden="false"></span>
                                        
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <div class="modal fade " id="request_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
            aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header text-center">
                            <div>
                                <i class="fas fa-table "></i> Request a buddy
                            </div>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <br/>

                        <div class="card border-0">
                            
                            <div class="card-body m-0">

                            <form method="POST" action="{{route('add.requestabuddy')}}" >
                                @csrf
                                    
                                <div class="row">
                                    <div class="col">
                                    <label for="Residence">Surname</label>
                                    <input type="text" value="{{Auth::user()->surname}}" class="form-control" disabled>
                                    </div>
                                    <div class="col">
                                    <label for="Residence">Other names</label>
                                    <input type="text" value="{{Auth::user()->other_names}}" class="form-control" disabled>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                    <label for="Residence">Admission No</label>
                                    <input type="text" value="{{Auth::user()->id}}" class="form-control" disabled>
                                    </div>
                                    <div class="col">
                                    <label for="Residence">Email</label>
                                    <input type="text" value="{{Auth::user()->email}}" class="form-control" disabled>
                                    </div>
                                </div>
                                
                                <div class="form-row">
                                    <div class="col-md-6 mb-3">
                                        <label for="Residence">Year of Study</label>
                                        <select class='form-control px-4' name="YearOfStudy" required id="">
                                            <option value="1">First Year</option>
                                            <option value="2">Second Year</option>
                                            <option value="3">Third Year</option>
                                            <option value="4">Fourth Year</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input is-valid" id="invalidCheck33" required>
                                        <label class="custom-control-label" for="invalidCheck33">All the Information provided is to the best of my Knowledge</label>
                                        <div class="valid-feedback">
                                            You must agree before submitting.
                                        </div>
                                        </div>
                                        <div class="invalid-feedback">
                                        You must agree before submitting.
                                        </div>
                                </div>
                                <button class="btn btn-info w-100 text-capitalize" id="btnSubmit" type="submit">Submit Request</button>




                            </form>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
    <script defer>
        $(document).ready(function() {
            
            $('body').find('.tab-link').on('click',function(e){
                $(this).siblings().removeClass('active')
                $(this).addClass('active')
                $('body').find($(this).attr('data-load-target')).siblings('.container-fluid').removeClass('active')
                $('body').find($(this).attr('data-load-target')).addClass('active')
                
            })

        })
    </script>
           
@endsection