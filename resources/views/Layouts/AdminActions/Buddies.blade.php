@extends('Layouts.AdminActions.adminMaster',['title'=>'Buddy Management','newVisaReq'=>$newVisaReq,'BdCountReq'=>$BdCountReq])
@section('content')
    <nav class="d-flex align-items-center top-title-sticky" style='position:sticky; top:0; z-index:2999; padding:8px; background:#fff; width:100%; height: 56px;'>
        <span>Buddy Management</span>
    </nav>
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
    @if(Session::has('Buddy_Allocation_success'))
    <div class="alert alert-success" role="alert">
    {{Session::get('Buddy_Allocation_success')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    </div>
    @endif
    @if(Session::has('Buddy_Allocation_fail'))
    <div class="alert alert-danger" role="alert">
    {{Session::get('Buddy_Allocation_fail')}}
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
        <div class="breadcrumb mb-4 d-flex  align-items-center" style="background:#113C7A;">
            <span class="breadcrumb-item active" style="color:white;">Number of all buddies </span>
            <span class="ml-4 badge badge-warning">{{sizeOf($buddies)}}</span>
        </div>
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div>
                    <i class="fas fa-table mr-1"></i>
                    List of Trained Buddies.
                </div>
                <div class='d-flex align-items-center'>
    
                    <form action='{{route("add.GeneratePDF")}}' method='post'>@csrf
                        <input type="hidden" name="function" value='getallAllBuddiesReport'>
                        <button type='submit'>
                        <i role='button' style='color:red; font-size:30px;' class='far fa-file-pdf'></i>
                        </button>
                    </form>
                    <i role='button' style='color:green; font-size:30px;' class='far fa-file-excel ml-3'></i>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                        <thead class="thead-dark">
                            <tr>
                                <th>id</th>
                                <th>Name</th>
                                <th>email</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(sizeOf($buddies) === 0)
                            <tr>
                                <td colspan="4">No Buddy found</td>
                            </tr>
                            @endif
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
                                            if(confirm('Do you want to remove {{$buddy->surname." ".$buddy->other_names}} as a buddy? All the allocated students will be deallocated.')){
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
        <div class="breadcrumb mb-4 d-flex align-items-center" style="background:#113C7A;">
            <span class="breadcrumb-item active" style="color:white;">Number of all requests </span>
            <span class="ml-4 badge badge-warning">{{sizeOf($buddiesRequests)}}</span>
        </div>
        <div class="card mb-4">
            <div class="card-header">
            <i class="fas fa-table mr-1"></i>
                Buddy Requests.
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                        <thead class="thead-dark">
                            <tr>
                            <th>Request Id</th>
                                <th>user Id</th>
                                <th>Names</th>
                                <th>Email</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        @if(sizeOf($buddiesRequests) === 0)
                            <tr>
                                <td colspan="5">No Request found</td>
                            </tr>
                        @endif
                        @foreach($buddiesRequests as $std)
                            <tr>
                                <td>{{$std['buddy_request_id']}}</td>
                                <td>{{$std['id']}}</td>
                                <td>{{$std['surname'].' '.$std['other_names']}}</td>
                                <td>{{$std['email']}}</td>

                                <td>

                                <div class="d-flex alig-items-center justify-content-center" role='button' style="color:#CC0D0D" data-toggle="modal" data-target="#AllocateBuddyModal_{{$std['id']}}" >
                                    <span > Allocate</span>
                                    <span class="fas fa-marker ml-2"aria-hidden="false"></span>
                                </div>
                                
                                <div class="modal fade " id="AllocateBuddyModal_{{$std['id']}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                                aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header text-center">
                                                <h4 class="modal-title w-100 font-weight-bold">Assign New Buddy To:</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form method="POST" action="{{ route('add.allocate') }}" class='new-staff-form p-4'>
                                                @csrf
                                                <div class="row">
                                                    <div class="col">
                                                    <label for="Residence">Surname</label>
                                                    <input type="text" value="{{$std['surname']}}" class="form-control" disabled>
                                                    </div>
                                                    <div class="col">
                                                    <label for="Residence">Other names</label>
                                                    <input type="text" value="{{$std['other_names']}}" class="form-control" disabled>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                    <label for="Residence">Admission No</label>
                                                    <input type="text" value="{{$std['id']}}" class="form-control" disabled>
                                                    </div>
                                                    <div class="col">
                                                    <label for="Residence">Email</label>
                                                    <input type="text" value="{{$std['email']}}" class="form-control" disabled>
                                                    </div>
                                                </div>
                                                <!-- surNAME -->
                                                <div class="row mt-3 mb-3">
                                                    <div class="col ">
                                                        <input type="hidden" name="request_id" value="{{$std['buddy_request_id']}}">
                                                        <input type="hidden" name='studentId' value="{{$std['id']}}">
                                                        <label for="surNAME">Select Buddy</label> 
                                                        <select class='form-control select_new_buddy' name="buddy_id" id=''>
                                                            <option disabled selected >--SELECT BUDDY--</option> 
                                                            @foreach($buddies as $buddy)
                                                                <option value='{{$buddy->id}}'>{{$buddy->id.' - '. $buddy->surname. $buddy->other_names}}</option> 
                                                            @endforeach
                                                        </select> 
                                                    </div></br>
                                                </div>
                                                <br/>
                                                <div class="form-row justify-content-center sbmt-btn">
    
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
        <div class="breadcrumb mb-4 d-flex align-items-center" style="background:#113C7A;">
            <span class="breadcrumb-item active" style="color:white;">Number of all Allocations </span>
            <span class="ml-4 badge badge-warning">{{sizeOf($BuddiesAllocations)}}</span>
        </div>
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div>
                    <i class="fas fa-table mr-1"></i>
                    Buddies Allocation.
                </div>
                <div class='d-flex align-items-center'>
    
                    <form action='{{route("add.GeneratePDF")}}' method='post'>@csrf
                        <input type="hidden" name="function" value='getallAllocationsReport'>
                        <button type='submit'>
                        <i role='button' style='color:red; font-size:30px;' class='far fa-file-pdf'></i>
                        </button>
                    </form>
                    <i role='button' style='color:green; font-size:30px;' class='far fa-file-excel ml-3'></i>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                        <thead class="thead-dark">
                            <tr>
                                <th>Buddy ID</th>
                                <th>Buddy Name</th>
                                <th>List of Allocation</th>
                                <th>No</th>
                                <!-- <th>Actions</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            @if(sizeOf($allbuddies) === 0)
                                <tr>
                                    <td colspan="4">No Buddy found</td>
                                </tr>
                            @endif
                            @foreach($allbuddies as $Buddy)
                            <?php $count=0; ?>
                            @php($count=[])
                            <tr style='text-align:center;'>
                                <td>{{$Buddy->id}}</td>
                                <td>{{$Buddy->surname.' '.$Buddy->other_names}}</td>
                                
                                <td class='flex-grow-1'>
                                    <ul style="max-height:100px; overflow:auto;">
                                        @foreach($BuddiesAllocations as $bdAlloc)
                                            @foreach($stUsers as $st_u)
                                                @if($st_u->id == $bdAlloc['id'] && $bdAlloc['bd_id'] == $Buddy->id)
                                                    @php(array_push($count,$st_u->id))

                                                    @if($bdAlloc['change_req'] == '')
                                                    <li class="mb-2 py-2 border-bottom position-relative">
                                                    @else
                                                    <li class="mb-2 border-bottom position-relative">
                                                        <div class="row w-100 position-absolute" style="z-index:2; right:-78%;">
                                                            <span class='col-8 btn-warning text-nowrap' role='button' data-toggle="modal" data-target="#NewAllocation_{{$st_u->id}}">Change Requested</span>
                                                            <span class='col btn-danger text-nowrap' role='button'>Dissmiss</span>
                                                        </div>
                                                    @endif
                                                        <div class="row flex-nowrap">
                                                            <span class="col-3 text-nowrap">{{$bdAlloc['id']}}</span>
                                                            <span class="col-6 text-nowrap">{{$bdAlloc['surname'].' '.$bdAlloc['other_names']}}</span>
                                                            <div class="col-3  d-flex justify-content-around align-items-center">
                                                                <span data-toggle="modal" data-target="#EditAllocation_{{$st_u->id}}" style=" color:blue" class="fas fa-edit" aria-hidden="true"></span>
                                                                <form action="{{route('add.dismiss')}}" method='post'> @csrf
                                                                    <input type="hidden" name="req_id" value="{{$bdAlloc['req_id']}}">
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
                                                                                <input type="hidden" value="normal" name='change_req'>
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
                                                                                <div class="row">
                                                                                    <div class="col d-flex flex-column my-4 ">   
                                                                                        
                                                                                        <input id="student_id" type="hidden" value='{{$st_u->id}}' name="student_id" required autofocus />
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
                                                                                <div class="">
                                                                                    <input class="btn btn-success w-50" value="Allocate" type="submit" />
                                                                                </div>
                                                                            </form>
                                                                            <br/>
                                                                        </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal fade " id="NewAllocation_{{$st_u->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                                                        aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header text-center">
                                                                        <h4 class="modal-title w-100 font-weight-bold">New Buddy Allocation</h4>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <form method="POST" action="{{ __('EditAllocatedBuddy') }}" class='new-staff-form p-4'>
                                                                        @csrf
                                                                        
                                                                        <input type="hidden" value="ChangeRequested" name='change_req'>
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
                                                                        <div class="row">
                                                                            <div class="col d-flex flex-column my-4 ">   
                                                                                
                                                                                <input id="student_id" type="hidden" value='{{$st_u->id}}' name="student_id" required autofocus />
                                                                                <label for="surNAME">Select Buddy</label> 
                                                                                <select class='form-select form-select-lg' name="buddy_id">
                                                                                    <option disabled selected>--SELECT BUDDY--</option> 
                                                                                    @foreach($allbuddies as $a_buddy)
                                                                                        @if($Buddy->id !== $a_buddy->id)
                                                                                            @if($a_buddy->id == $bdAlloc['bd_id'])
                                                                                                <option value={{$a_buddy->id}} selected>{{$a_buddy->id.' - '. $a_buddy->surname. $a_buddy->other_names}}</option> 
                                                                                            @else
                                                                                                <option value={{$a_buddy->id}}>{{$a_buddy->id.' - '. $a_buddy->surname. $a_buddy->other_names}}</option> 
                                                                                            @endif
                                                                                        @endif
                                                                                    @endforeach
                                                                                </select> 
                                                                            </div></br>
                                                                        </div>
                                                                        <br/>
                                                                        <div class="">
                                                                            <input class="btn btn-success w-50" value="Allocate" type="submit" />
                                                                        </div>
                                                                    </form>
                                                                    <br/>
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
            
            $('body').find('.select_new_buddy').on('change',function(e){
                if($(this).val() !== ""){
                    $(this).parent().parent().siblings('.sbmt-btn').find('#allocate_a_buddy_btn').attr('disabled',false)
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