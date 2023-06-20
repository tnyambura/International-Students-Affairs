@extends('Layouts.studentActions.studentMaster',['title'=>'Buddy Program','userData'=>$user,'availability'=>$availability, 'NoBooking'=>$NoBooking, 'NoBooking'=>$NoBooking,'NoExt'=>$NoExt,'NoKpps'=>$NoKpps])
@section('content')
<nav class="d-flex align-items-center top-title-sticky" style='position:sticky; top:0; z-index:2999; padding:8px; background:#fff; width:100%; height: 56px;'>
    <span>Buddy Program</span>
</nav>

    @if(!$is_buddy)
        <div class="tab-nav d-flex mb-2 w-100">
            <a href='{{route("view.buddyprogram")}}' class="tab-link active" role='button' data-load-target='#my_bd_req'>
                <div style='color:var(--primary)'>
                    <i class="fas fa-user-plus mr-1"></i>
                    <span >Request a Buddy</span>
                </div>
            </a>
            <a href='{{route("view.myallocation")}}' class="tab-link" role='button' data-load-target='#my_buddy'>
                <div style='color:var(--info)'>
                    <i class="fas fa-user-friends mr-1"></i>
                    <span >My Allocation</span>
                </div>
            </a>
        </div>
        @if(Session::has('booking-success'))
        <div class="alert alert-success" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        {{Session::get('booking-success')}}
        </div>
        @endif
        @if(Session::has('booking-error'))
        <div class="alert alert-danger" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        {{Session::get('booking-error')}}
        </div>
        @endif
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
        <div>
            @yield('buddy_program_load')
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
        <div>
            @yield('buddy_load')
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
            
            // $('body').find('.tab-link').on('click',function(e){
            //     $(this).siblings().removeClass('active')
            //     $(this).addClass('active')
            //     // $('body').find($(this).attr('data-load-target')).siblings('.container-fluid').removeClass('active')
            //     // $('body').find($(this).attr('data-load-target')).addClass('active')
                
            // })

        })
    </script>
           
@endsection