@extends('Layouts.AdminActions.adminMaster',['title'=>'Buddy Management','newVisaReq'=>$newVisaReq,'BdCountReq'=>$BdCountReq])
@section('content')
    <nav class="d-flex align-items-center top-title-sticky" style='position:sticky; top:0; z-index:2999; padding:8px; background:#fff; width:100%; height: 56px;'>
        <span>Buddy Management</span>
    </nav>
    <div class="tab-nav d-flex mb-2 ">
        <a href='{{route("view.buddymanage")}}' class="tab-link active" role='button' data-load-target='#buddies_list'>
            <div style='color:var(--primary)'>
                <i class="fas fa-users mr-1"></i>
                <span >All Buddies</span>
            </div>
        </a>
        <a href='{{route("view.buddymanageRequest")}}' class="tab-link " role='button' data-load-target='#buddy_requests_list'>
            <div style='color:var(--danger)'>
                <i class="fas fa-user-clock mr-1"></i>
                <span >Buddy requests</span>
                @if(sizeOf($buddiesRequests) > 0)
                    <span class="badge badge-warning">{{sizeOf($buddiesRequests)}}</span>
                @endif
            </div>
        </a>
        <a href='{{route("view.buddymanageAllocation")}}' class="tab-link" role='button' data-load-target='#allocations_list'>
            <div style='color:var(--info)'>
                <i class="fas fa-user-friends mr-1"></i>
                <span >Buddy Allocations</span>
                @if($BuddiesChangeRequest > 0)
                <span class="ml-1 badge badge-warning">{{$BuddiesChangeRequest}}</span>
                @endif
            </div>
        </a>
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

    <div>
        @yield('buddy_content')
    </div>
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
    <script defer>
        $(document).ready(function() {
            $('.dissmiss-Request-Change').on('click',function(e){
                e.preventDefault()
                if(confirm('Do you really want to Dismiss this Buddy change request?')){
                    $('body').find('.loader-load-container').removeClass('d-none')
                    $('body').find('.loader-load-container').addClass('d-flex')
                    location.href=$(this).attr('href')
                }
            })
            $('.showBuddyChangeBtn').on('click',function(e){
                if($(this).parent().hasClass('hide')){
                    $(this).parent().removeClass('hide')
                    $(this).parent().css('left','0%').slow()
                }else{
                    $(this).parent().addClass('hide')
                    $(this).parent().css('left','88%').slow()
                }
            })
            
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