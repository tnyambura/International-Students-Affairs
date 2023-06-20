@extends('Layouts.AdminActions.buddy.index')
@section('buddy_content')
<div class="container-fluid buddy-contents active" id="allocations_list"><br/>
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
            <!-- <div class="row"><div class="col-sm-12 col-md-6"><div class="dataTables_length" id="dataTable_length"><label>Show <select name="dataTable_length" aria-controls="dataTable" class="custom-select custom-select-sm form-control form-control-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div></div><div class="col-sm-12 col-md-6"><div id="dataTable_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="dataTable"></label></div></div></div> -->
                <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead class="thead">
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
                                                <li class="mb-2 border-bottom position-relative" style='max-width: 500px; min-width: 400px; overflow: hidden;'>
                                                    <div class="row w-100 position-absolute hide" style="z-index:2; left:88%; transition: ease-in-out;">
                                                        <div role='button' class='showBuddyChangeBtn col-2 btn-info text-nowrap d-flex align-items-center justify-content-center'><span class='fa fa-refresh ' >&#xf021;</span></div>
                                                        <span class='col-6 btn-warning text-nowrap' role='button' data-toggle="modal" data-target="#NewAllocation_{{$st_u->id}}">Change Requested</span>
                                                        <a href='/dismissBuddyChange/{{$bdAlloc["allocation_id"]}}' class='dissmiss-Request-Change col-4 btn-danger text-nowrap' role='button'>Dissmiss</a>
                                                    </div>
                                                @endif
                                                    <div class="row flex-nowrap">
                                                        <span class="col-3 text-nowrap">{{$bdAlloc['id']}}</span>
                                                        <span class="col-6 text-nowrap">{{$bdAlloc['surname'].' '.$bdAlloc['other_names']}}</span>
                                                        <div class="col-3  d-flex justify-content-around align-items-center">
                                                            @if($bdAlloc['change_req'] == '')
                                                            <span data-toggle="modal" data-target="#EditAllocation_{{$st_u->id}}" style=" color:blue" class="fas fa-edit" aria-hidden="true"></span>
                                                            <form action="{{route('add.dismiss')}}" method='post'> @csrf
                                                                <input type="hidden" name="req_id" value="{{$bdAlloc['req_id']}}">
                                                                <input type="hidden" name="user" value="{{$bdAlloc['id']}}">
                                                                <button id="btn_{{$bdAlloc['id']}}" type='submit'>
                                                                    <span style=" color:#CC0D0D" class="fas fa-trash" aria-hidden="true"></span>
                                                                </button>
                                                            </form>
                                                            @endif
                                                            <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
                                                            <script defer>
                                                                $(document).ready(function() {
                                                                    $('body').find("#btn_{{$bdAlloc['id']}}").on('click',function(e){
                                                                        e.preventDefault()
                                                                        let form = $(this).parent()
                                                                        if(confirm('Do you really want to remove this student?')){
                                                                            $('body').find('.loader-load-container').removeClass('d-none')
                                                                            $('body').find('.loader-load-container').addClass('d-flex')
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
@endsection