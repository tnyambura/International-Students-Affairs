@extends('Layouts.studentActions.buddy_index')
@section('buddy_program_load')
<div class="container-fluid buddy-contents active" id="my_bd_req" style='color:white' ><br/>
    <ol class="breadcrumb mb-4 d-flex bg-info align-items-center" data-toggle="modal" data-target="#request_modal" role='button'>
        <i class="fas fa-user-plus mr-1"></i>
        <span class='ml-2'>Place a Request</span><br/>
    </ol> 
        
    <div class="card mb-4">
        <div class="card-header" style='color:#000'>
            <i class="fas fa-table mr-1"></i>
            Buddy Allocation Request for {{ Auth::user()->other_names}} <a href="{{__('MyBuddyAllocations')}}"></a>
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
                                        <button class='bd-cancelBtn btn border-none bg-transparent' type='submit' data-target="{{$data['buddy_request_id']}}">
                                            <span class="fas fa-trash"></span>
                                        </button>
                                    </form>
                                    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
                                    <script defer>
                                        $(document).ready(function() {
                                            $('.bd-cancelBtn').on('click',function(e){
                                                e.preventDefault()
                                                if(confirm(`Do you really want to cancel this buddy request with id: ${$(this).attr('data-target')}?`)){
                                                    $(this).parent().submit()
                                                }
                                            })
                                        })
                                    </script>
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

@endsection