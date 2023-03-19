@extends('Layouts.AdminActions.adminMaster')
@section('content')
                    <div class="container-fluid"><br/>
                        <ol class="breadcrumb mb-4" style="background:#113C7A;">
                            <li class="breadcrumb-item active" style="color:white;">List of all Buddy Allocations</li>
                        </ol>
                        @if(Session::has('Buddy_modification_success'))
                        <div class="alert alert-success" role="alert">
                        {{Session::get('Buddy_modification_success')}}
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
                                                                                <span data-toggle="modal" data-target="#EditAllocation_{{$st_u->id}}" style=" color:#CC0D0D" class="fas fa-edit" aria-hidden="true"></span>
                                                                                

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
               @endsection