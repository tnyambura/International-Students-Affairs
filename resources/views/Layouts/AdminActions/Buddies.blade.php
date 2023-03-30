@extends('Layouts.AdminActions.adminMaster')
@section('content')
    <div class="tab-nav d-flex mb-2 ">
        <!-- <div class="col-xl-3 col-md-6">
            <div class="card bg-secondary text-white mb-4" data-toggle="modal" data-target="#RegisterBuddyModal">
                <div class="card-body">Register A New trained and qualified Buddy</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <span class="small text-white stretched-link" >Register A new Buddy</span>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div> -->
        <!-- <div class="col col-md-6">
            <div class="card bg-success text-white mb-4" width='100'>
                <i class="fa-solid fa-code-pull-request"></i>
                <div class="card-body">View All Buddy Requests</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="{{ __('listofBuddyRequests')}}">View List</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col col-md-6">
            <div class="card bg-danger text-white mb-4">
                <div class="card-body">List of completed Buddy Allocations</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="{{ __('BuddyAllocationsList')}}">List of Allocations Completed</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div> -->
        <div class="tab-link active" role='button' data-load-target='#buddy_requests_list'>
            <div style='color:var(--danger)'>
                <i class="fas fa-table mr-1"></i>
                <span >Buddy requests</span>
            </div>
        </div>
        <div class="tab-link" role='button' data-load-target='#allocations_list'>
            <div style='color:var(--info)'>
                <i class="fas fa-table mr-1"></i>
                <span >Buddy Allocations</span>
            </div>
        </div>
    </div>
    <div class="container-fluid buddy-contents active" id="buddy_requests_list"><br/>
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div>
                    <i class="fas fa-table mr-1"></i>
                    List of Trained Buddies.
                </div>
                <a class="btn btn-success" width='100' href="{{__('ListOfBuddies')}}" style="float:right"><span class="fa fa-spinner fa-spin fa-1x fa-fw" aria-hidden="true"></span>Generate Report</a>
            </div>
            <div class="card-body">

            @if(Session::has('New_User_Added'))
            <div class="alert alert-success" role="alert">
            {{Session::get('New_User_Added')}}
            </div>
            @endif
            @if(Session::has('New_User_failed'))
            <div class="alert alert-danger" role="alert">
            {{Session::get('New_User_failed')}}
            </div>
            @endif

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
    <div class="modal fade " id="RegisterBuddyModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">Register New Buddy</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="{{ __('AddUser') }}" class='new-staff-form p-4'>
                    @csrf

                    <!-- surNAME -->
                    <div class="form-row">
                        <div class="col-md-4 mb-3">   
                            <label for="surNAME">Surname</label>  
                            <input id="surNAME" class="form-control" type="text" name="surNAME" required autofocus />
                        </div></br>
                        <!-- otherNAMES -->
                        <div class="col-md-4 mb-3">            
                        <label for="otherNAMES">Other names</label>  
                            <input id="otherNAMES" class="form-control" type="text" name="otherNAMES" required autofocus />
                        </div></br>

                        <!-- suID or Username -->
                        <div class="col-md-4 mb-3">            
                        <label for="suID">suID</label>  
                            <input id="suID" class="form-control" type="number" name="suID" required autofocus />
                        </div></br>

                        <!-- Email Address -->
                        <div class="col-md-4 mb-3">            
                        <label for="email">Email</label>  
                            <input id="email" class="form-control" type="text" name="email" required autofocus />
                        </div>
                        <div class="col-md-4 mb-3"> 
                            <label for="role_id">Register as:</label>  
                            <select name="user_role" id="role_id" class="form-control">
                                <option value='buddy' selected > Buddy</option>
                            </select>
                        </div></br>
                    
                    </div>
                    <br/>
                    <div class="form-row justify-content-center">

                        <div class="flex items-center justify-end mt-4">
                        <input class="btn btn-success" value="Save details" type="submit" />
                        
                        </div>
                    </div>
                </form>
                <br/>
            </div>
        </div>
    </div>

    <div class="container-fluid buddy-contents" id="allocations_list"><br/>
        <ol class="breadcrumb mb-4" style="background:#113C7A;">
            <li class="breadcrumb-item active" style="color:white;">List of all Buddy Allocations</li>
        </ol>
        @if(Session::has('Buddy_modification_success'))
        <div class="alert alert-success" role="alert">
        {{Session::get('Buddy_modification_success')}}
        </div>
        @endif
        @if(Session::has('dissmiss_student'))
        <div class="alert alert-success" role="alert">
        {{Session::get('dissmiss_student')}}
        </div>
        @endif
        @if(Session::has('dissmiss_student_fail'))
        <div class="alert alert-danger" role="alert">
        {{Session::get('dissmiss_student_fail')}}
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
                                                                            if(confirm('Do you really want to remove this student?')){
                                                                                window.location = $(this).parent().submit()
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
            
            $('body').find('.tab-link').on('click',function(e){
                $(this).siblings().removeClass('active')
                $(this).addClass('active')
                $('body').find($(this).attr('data-load-target')).siblings('.container-fluid').removeClass('active')
                $('body').find($(this).attr('data-load-target')).addClass('active')
                
            })

        })
    </script>
           
@endsection