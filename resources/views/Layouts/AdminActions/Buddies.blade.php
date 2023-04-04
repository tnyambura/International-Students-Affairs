@extends('Layouts.AdminActions.adminMaster')
@section('content')
    <div class="tab-nav d-flex mb-2 ">
        <div class="tab-link active" role='button' data-load-target='#buddies_list'>
            <div style='color:var(--primary)'>
                <i class="fas fa-users mr-1"></i>
                <span >All Buddies</span>
            </div>
        </div>
        <div class="tab-link " role='button' data-load-target='#buddy_requests_list'>
            <div style='color:var(--danger)'>
                <i class="fas fa-user-clock mr-1"></i>
                <span >Buddy requests</span>
                @if(sizeOf($buddiesRequests) > 0)
                    <span class="badge badge-warning">{{sizeOf($buddiesRequests)}}</span>
                @endif
            </div>
        </div>
        <div class="tab-link" role='button' data-load-target='#allocations_list'>
            <div style='color:var(--info)'>
                <i class="fas fa-user-friends mr-1"></i>
                <span >Buddy Allocations</span>
            </div>
        </div>
    </div>

    @if(Session::has('New_User_Added'))
    <div class="alert alert-success" role="alert">
    {{Session::get('New_User_Added')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    </div>
    @endif
    @if(Session::has('New_User_failed'))
    <div class="alert alert-danger" role="alert">
    {{Session::get('New_User_failed')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    </div>
    @endif
    @if(Session::has('Buddy_modification_success'))
    <div class="alert alert-success" role="alert">
    {{Session::get('Buddy_modification_success')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    </div>
    @endif
    @if(Session::has('dissmiss_student'))
    <div class="alert alert-success" role="alert">
    {{Session::get('dissmiss_student')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    </div>
    @endif
    @if(Session::has('dissmiss_student_fail'))
    <div class="alert alert-danger" role="alert">
    {{Session::get('dissmiss_student_fail')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    <div class="container-fluid buddy-contents active" id="buddies_list"><br/>
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div>
                    <i class="fas fa-table mr-1"></i>
                    List of Trained Buddies.
                </div>
                <a class="btn btn-success" width='100' href="{{__('ListOfBuddies')}}" style="float:right"><span class="fa fa-spinner fa-spin fa-1x fa-fw" aria-hidden="true"></span>Generate Report</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                            <tr>
                                <th>id</th>
                                <th>Name</th>
                                <th>email</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>id</th>
                                <th>Name</th>
                                <th>email</th>
                                <th>Actions</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach($buddies as $buddy)
                                <tr>
                                    <td>{{$buddy->id}}</td>
                                    <td>{{$buddy->surname.' '.$buddy->other_names}}</td>
                                    <td>{{$buddy->email}}</td>
                                    <td>
                                        <form method="POST" action="{{route('add.dismissBd')}}">
                                            @csrf
                                            <input type="hidden" name="bd_id" value="{{$buddy->id}}"/>
                                            <div role='button' id="rmvBd_{{$buddy->id}}"><span class="fas fa-trash" aria-hidden="false"></span> Remove as Buddy</div>
                                        </form>
                                    </td>
                                    <script>
                                        document.querySelector("#rmvBd_{{$buddy->id}}").addEventListener('click',function(e){
                                            e.preventDefault()
                                            if(confirm('Do you want to remove {{$buddy->surname.' '.$buddy->other_names}} as a buddy? All the allocated students will be deallocated.')){
                                                this.parentNode.submit()
                                            }
                                        })
                                    </script>
                                </a>  
                                </tr>
                            @endforeach
                            </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid buddy-contents" id="buddy_requests_list"><br/>
        
        <div class="card mb-4">
            <div class="card-header">
            <i class="fas fa-table mr-1"></i>
                Buddy Requests.
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                            <th>Request Id</th>
                                <th>user Id</th>
                                <th>Names</th>
                                <th>Email</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Request Id</th>
                                <th>user Id</th>
                                <th>Names</th>
                                <th>Email</th>
                                <th>Actions</th>
                            </tr>
                        </tfoot>
                        <tbody>
                        @foreach($buddiesRequests as $student)
                            <tr>
                                <td>{{$student['buddy_request_id']}}</td>
                                <td>{{$student['id']}}</td>
                                <td>{{$student['surname'].' '.$student['other_names']}}</td>
                                <td>{{$student['email']}}</td>

                                <td>
                                @php $studentID= Crypt::encrypt($student['id']); @endphp      
                                <div class="d-flex alig-items-center justify-content-center" role='button' style="color:#CC0D0D" data-toggle="modal" data-target="#AllocateBuddyModal" >
                                    <span > Allocate</span>
                                    <span class="fas fa-marker ml-2"aria-hidden="false"></span>
                                </div>
                                
                                <div class="modal fade " id="AllocateBuddyModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                                aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header text-center">
                                                <h4 class="modal-title w-100 font-weight-bold">Register New Buddy</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form method="POST" action="{{ __('AllocateBuddy') }}" class='new-staff-form p-4'>
                                                @csrf

                                                <!-- surNAME -->
                                                <div class="form-row w-100">
                                                    <div class="col-lg-4 mb-3 ">   
                                                        <p class="w-100 ">Allocate budy to student <strong>{{$student["id"]. ' - '. $student['surname'].' '.$student['other_names']}}</strong> </p> 
                                                        <input id="request_id" class="form-control" type="hidden" value='{{$student["buddy_request_id"]}}' name="request_id" required autofocus />
                                                        <input id="student_id" class="form-control" type="hidden" value='{{$student["id"]}}' name="student_id" required autofocus />
                                                        <label for="surNAME">Select Buddy</label> 
                                                        <select class='form-select form-select-lg' name="buddy_id" id='select_new_buddy'>
                                                            <option disabled selected>--SELECT BUDDY--</option> 
                                                            @foreach($buddies as $buddy)
                                                                <option value='{{$buddy->id}}'>{{$buddy->id.' - '. $buddy->surname. $buddy->other_names}}</option> 
                                                            @endforeach
                                                        </select> 
                                                    </div></br>
                                                </div>
                                                <br/>
                                                <div class="form-row justify-content-center">

                                                    <div class="flex items-center justify-end mt-4">
                                                    <input class="btn btn-success" value="Allocate" id='allocate_a_buddy_btn' disabled type="submit" />
                                                    
                                                    </div>
                                                </div>
                                            </form>
                                            <br/>
                                        </div>
                                    </div>
                                </div>
                                </td>
                            </tr>
                        @endforeach
                            </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid buddy-contents" id="allocations_list"><br/>
        <ol class="breadcrumb mb-4" style="background:#113C7A;">
            <li class="breadcrumb-item active" style="color:white;">List of all Buddy Allocations</li>
        </ol>
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
                                <th>Buddy ID</th>
                                <th>Buddy Name</th>
                                <th>List of Allocation</th>
                                <th>Number of allocations</th>
                                <!-- <th>Actions</th> -->
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                            <th>Buddy ID</th>
                                <th>Buddy Name</th>
                                <th>List of Allocation</th>
                                <th>Number of allocations</th>
                                <!-- <th>Actions</th> -->
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach($allbuddies as $Buddy)
                            <?php $count=0; ?>
                            @php($count=[])
                            <tr style='text-align:center;'>
                                <td>{{$Buddy->id}}</td>
                                <td>{{$Buddy->surname.' '.$Buddy->other_names}}</td>
                                
                                <td class='flex-grow-1'>
                                    <ul class="d-flex flex-fill ">
                                        @foreach($BuddiesAllocations as $bdAlloc)
                                            @foreach($stUsers as $st_u)
                                                @if($st_u->id == $bdAlloc['id'] && $bdAlloc['bd_id'] == $Buddy->id)
                                                    @php(array_push($count,$st_u->id))
                                                    <li>
                                                        <div class="d-flex ">
                                                            <span>{{$bdAlloc['id']}}</li>
                                                            <span>{{$bdAlloc['surname'].' '.$bdAlloc['other_names']}}</li>
                                                            <div class="flex-shrink-1">
                                                                <span data-toggle="modal" data-target="#EditAllocation_{{$st_u->id}}" style=" color:blue" class="fas fa-edit" aria-hidden="true"></span>
                                                                <form action="{{route('add.dismiss')}}" method='post'> @csrf
                                                                    <input type="hidden" name="user" value="{{$bdAlloc['id']}}">
                                                                    <button id="btn_{{$bdAlloc['id']}}" type='submit'>
                                                                        <span style=" color:#CC0D0D" class="fas fa-trash" aria-hidden="true"></span>
                                                                    </button>
                                                                </form>
                                                                <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
                                                                <script defer>
                                                                    $(document).ready(function() {
                                                                        $('body').find("#btn_{{$bdAlloc['id']}}").on('click',function(e){
                                                                            e.preventDefault()
                                                                            let form = $(this).parent()
                                                                            if(confirm('Do you really want to remove this student?')){
                                                                                form.submit()
                                                                            }
                                                                        })
                                                                    })
                                                                </script>
                                                                

                                                                <div class="modal fade " id="EditAllocation_{{$st_u->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                                                                aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header text-center">
                                                                                <h4 class="modal-title w-100 font-weight-bold">Change Student Buddy</h4>
                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                                </button>
                                                                            </div>
                                                                            <form method="POST" action="{{ __('EditAllocatedBuddy') }}" class='new-staff-form p-4'>
                                                                                @csrf

                                                                                <!-- surNAME -->
                                                                                <div class="form-row w-100">
                                                                                    <div class="col-lg-4 mb-3 ">   
                                                                                        <p class="w-100 ">Modify Student Allocation <strong>{{$st_u->id. ' - '. $st_u->surname.' '.$st_u->other_names}}</strong> </p> 
                                                                                        <input id="student_id" class="form-control" type="hidden" value={{$st_u->id}} name="student_id" required autofocus />
                                                                                        <label for="surNAME">Select Buddy</label> 
                                                                                        <select class='form-select form-select-lg' name="buddy_id">
                                                                                            <option disabled selected>--SELECT BUDDY--</option> 
                                                                                            @foreach($allbuddies as $a_buddy)
                                                                                                @if($a_buddy->id == $bdAlloc['bd_id'])
                                                                                                    <option value={{$a_buddy->id}} selected>{{$a_buddy->id.' - '. $a_buddy->surname. $a_buddy->other_names}}</option> 
                                                                                                @else
                                                                                                    <option value={{$a_buddy->id}}>{{$a_buddy->id.' - '. $a_buddy->surname. $a_buddy->other_names}}</option> 
                                                                                                @endif
                                                                                            @endforeach
                                                                                        </select> 
                                                                                    </div></br>
                                                                                </div>
                                                                                <br/>
                                                                                <div class="form-row justify-content-center">

                                                                                    <div class="flex items-center justify-end mt-4">
                                                                                    <input class="btn btn-success" value="Allocate" type="submit" />
                                                                                    
                                                                                    </div>
                                                                                </div>
                                                                            </form>
                                                                            <br/>
                                                                        </div>
                                                                    </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                @endif
                                            @endforeach
                                        @endforeach
                                    </ul>
                                </td>
                                <td>{{sizeOf($count)}}</td>
                            </tr>
                        @endforeach
                            </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
    <script defer>
        $(document).ready(function() {
            
            $('body').find('#select_new_buddy').on('change',function(e){
                if($(this).val() !== ""){
                    $('body').find('#allocate_a_buddy_btn').attr('disabled',false)

                }
            })
            $('body').find('.tab-link').on('click',function(e){
                $(this).siblings().removeClass('active')
                $(this).addClass('active')
                $('body').find($(this).attr('data-load-target')).siblings('.container-fluid').removeClass('active')
                $('body').find($(this).attr('data-load-target')).addClass('active')
                
            })

        })
    </script>
           
@endsection