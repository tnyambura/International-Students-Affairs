@extends('Layouts.AdminActions.buddy.index')
@section('buddy_content')
<div class="container-fluid buddy-contents active" id="buddy_requests_list"><br/>
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
                    <thead class="thead">
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
@endsection