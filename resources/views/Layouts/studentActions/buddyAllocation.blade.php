@extends('Layouts.studentActions.buddy_index')
@section('buddy_program_load')

<div class="container-fluid buddy-contents active" id="my_buddy"><br/>                 
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
                    @if(sizeOf($allocationGetter) > 0)
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
                                @if($Buddy['already_changed'] == 0)
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
                                @endif
                            </form>
                            </td>
                        </tr>
                    @endforeach
                    @else
                        <tr>
                            <td colspan='6'>No Allocation Found</td>
                        </tr>
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
</div>

@endsection