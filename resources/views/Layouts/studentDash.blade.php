<?php
$AppReq = [];

if(sizeOf($myAppointments) > 0){
    foreach($myAppointments as $val){
        if($val->status == 'pending'){
            // $AppReq = $AppReq+1;
            $AppReq = [$val];
            break;
        }
    }
}
function meetingCard($val){
    $aptmnt = explode(" ",$val->booked_date_time);
    $color; $icon; $statusVal;
    if($val->status === 'pending'){$color='var(--secondary)'; $icon='fa-solid fa-minus'; $statusVal='Pending';}
    if($val->status === 'met'){$color='var(--success)'; $icon='fa-solid fa-check'; $statusVal='Met';}
    if($val->status === 'past'){$color='var(--danger)'; $icon='fa-solid fa-xmark'; $statusVal='Not Met';}

    return ("<div class='row p-2 mb-4 rounded align-items-center' style='box-shadow: 0 0 5px var(--secondary);'>
            <i class='fa-solid fa-calendar col-2' style='color: ".$color."; text-align:center; font-size: 30px;'></i>
            <div class='col-8' style='display:flex; flex-direction: column;'>
                <p>Date: <span>".date('Y-M-d',strtotime($aptmnt[0]))."</span></p>
                <p class='m-0'>Time: <span>".$aptmnt[1]."</span></p>
            </div>
            <p class='col-2 d-flex align-items-center p-0  m-0'><i class='".$icon." col-1' style='text-align:center; font-size: 20px; color: ".$color.";'></i><span class='meeting-status-note mx-2' style='box-sizing: none;'>".$statusVal."</span></p>
        </div>
    ");
}

function GetMeetingBooked($myAppointments,$type){
    foreach($myAppointments as $k => $val){
        if($type == 'recent'){
            if($k < 2){
                echo meetingCard($val);
            }
        }
        if($type == 'all'){
            if($k > 1){
                echo meetingCard($val);
            }
        }
    }
}
?>
@extends('Layouts.studentActions.studentMaster',['title'=>'Dashboard','userData'=>$user,'availability'=>$availability, 'NoBooking'=>$AppReq,'NoExt'=>$NoExt,'NoKpps'=>$NoKpps])
@section('content')  
<nav class="d-flex align-items-center top-title-sticky" style='position:sticky; top:0; z-index:2999; padding:8px; background:#fff; width:100%; height: 56px;'>
    <span>Dashboard</span>
</nav> 

<style>
    .progress{
        width: 0%;
        height: 8px;
        position: relative;
        overflow: visible !important;
    }
    .progress.active{
        /* background: rgba(10,210,90,.3); */
        animation: 4s progressBarAnim infinite alternate;
    }
    .icon{
        position: absolute;
        top: -15px;
        right: 0;
        font-size: 25px;
        width: 150px;
        color: rgb(21,119,247)
        text-align: center;
        padding: 2px,5px;

        /* animation: 5s ColorPendingAnim infinite alternate; */
    }
    .progress.complete{
        width: 100%;
        background: rgba(144,238,144,.7);
    }
    .progress.complete .icon{
        color: rgb(40,167,68);
        animation: none;
        z-index:2;
    }
    .progress-bar{
        box-shadow: 0 0 0px rgba(110, 110, 110,.9);
        /* background: rgba(255, 255, 255,.9); */
        background: none;
        color: #fff;
        /* background: rgba(24, 39, 74,.9); */
    }
    .progress-bar,.progress{
        border-radius: 5px
    }
    @keyframes progressBarAnim {
        to {width: 100%;}
    }
    @keyframes ColorPendingAnim {
        0% {color: rgba(110,110,110);}
        50% {color: rgba(90,220,255,.7);}
        100% {color: rgb(21,119,247);}
    }
</style>
<?php
    function findObjectById($item,$array){
        foreach ( $array as $element ) {
            if ( isset( $array[$id] ) ) {
                return $array[$id];
            }
        }
        return false;
    }
?>
@if(sizeOf($ExpireDocs) > 0)
<div class=" p-2 mb-2 mx-4 row row-cols-auto" style='background:#7a1111;'>
    @foreach($ExpireDocs as $val)
        <span class='col-md-4 col-lg my-1' style='color: var(--light);'>{{$val}}</span>
    @endforeach
</div>
@endif
<div class="container-fluid">
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <ul>
            <li><span>Upon successful submission of an application request, you can check the status of your uploads by clicking<b>"View a list of My Student Pass Applications"</b> from the dashboard.</span></li>
            <li><span>For all Foreign Nationals Applications that require biometrics capture, please <b>Email</b> our office so that we can place an appointment booking with the immigrations on your behalf.</span></li>
            <li><span>All visa extension requests can be placed by clicking <b>"VISA EXTENSIONS"</b> from the dashboard.</span></li>
            <li><span>All Student Pass Application requests can be placed by clicking <b>"STUDENT PASS APPLICATIONS"</b> from the dashboard.</span></li>

        </ul>
    </div>
    @if(Session::has('user_update_success'))
    <div class="alert alert-success" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    {{Session::get('user_update_success')}}
    </div>
    @endif
    @if(Session::has('user_update_failed'))
    <div class="alert alert-danger" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    {{Session::get('user_update_failed')}}
    </div>
    @endif
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
    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div style='background: rgb(17,60,122); ' class="card text-white mb-4">
                <div class="card-body">View a list of My Student Pass Applications</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="{{ route('view.mykpp')}}">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div style='background: rgb(17,60,122); ' class="card text-white mb-4">
                <div class="card-body">VISA EXTENSION APPLICATIONS</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="{{ route('view.myextension')}}">Send a Request</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div style='background: rgb(17,60,122); ' class="card text-white mb-4">
                <div class="card-body">Apply to student Pass</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="{{ route('view.newkpp')}}">Send a Request</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        @if(!$is_buddy)
        <div class="col-xl-3 col-md-6">
            <div style='background: rgb(17,60,122); ' class="card text-white mb-4">
                <div class="card-body">Request for a Buddy allocation</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="{{ route('view.buddyprogram')}}">Request</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        @endif
    </div>

    <div class="card mb-4" style='border:none;'>
        <div class="card-header">
            <i class="fab fa-cc-visa mr-2"></i>
            <span>On going Visa Application</span>
        </div>
            <div class="card-body">
                <div class="courses-container">
                    <div class="course">
                        <div class="course-preview" style='background:rgb(110,110,110,.4)'>
                            <div class="d-flex flex-column justify-content-between h-100">
                                <div class='silhouette-text' >
                                    <span></span><small></small>
                            </div>
                                <div class='silhouette-text' >
                                    <span></span><span></span>
                                </div>
                            </div>
                            <span class='top-rslt-file ' style='display:none; width: 20%; color:red;'>Top Download PDF</span>
                            
                        </div>
                        <style>
                            .silhouette-text{
                                display: flex;
                                gap: 5px;
                                margin-block: 5px;
                            }
                            .silhouette-text > *{
                                border-radius: 5px;
                                background: rgb(110,110,110,.2);
                                height: 10px;
                            }
                            .silhouette-text > *:first-child{ width: 20%;}
                            .silhouette-text > *:last-child{ width: 80%;}
                        </style>
                        <div class="course-info" style=''>
                            <div class='w-100 d-flex align-items-center status-progress ' style='height:15px;'>

                            <span>Expired</span>
                            <span>status</span>

                            </div>
                            <div class='main-data d-flex align-items-center mx-4 my-3'>
                                <div style='width: 80%'>
                                    <div class='silhouette-text'> <span></span>  <span></span></div>
                                    <div class='silhouette-text'> <span></span>  <span></span> </div>
                                    <div class='silhouette-text'> <span></span>  <span></span></div>
                                    <div class='silhouette-text'><span></span>  <span></span></div>
                                </div>
                                <div>

                                </div>
                                <span></span>                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>

    <div class="card mb-4" style='border:none;'>
        <div class="card-header">
            <i class="fa-solid fa-calendar mr-2"></i>
            <span>Appointments for <span>{{date('M')}}</span></span>
        </div>
        @if(sizeOf($myAppointments) > 0)
            <div class="card-body">
                {!! GetMeetingBooked($myAppointments,'recent') !!}
                <br/> <hr/>
                @if(sizeOf($myAppointments) > 2)
                <button style='outline:transparent; text-decoration: underline; color: rgb(17,60,122);' onclick='displayOldMeetings(event)'>View old meetings</button>
                <div class='my-3 view-old-meets' style='
                    overflow:hidden;
                    padding:20px;
                    display:none;
                    transition: 1s;
                '>
                {!! GetMeetingBooked($myAppointments,'all') !!}
                </div>
                @endif
            </div>
        @endif
    </div>
</div>

    
        <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
        <script defer>
            function displayOldMeetings(e){
                let container = e.target.nextElementSibling
                if(container.style.display == 'none'){
                    e.target.innerHTML = 'Hide old meetings'
                    container.style.display='block'
                }else{
                    container.style.display='none'
                    e.target.innerHTML = 'View old meetings'
                }
            }
            $(document).ready(function() {
                $('.alert').alert()
            })

        </script>

@endsection