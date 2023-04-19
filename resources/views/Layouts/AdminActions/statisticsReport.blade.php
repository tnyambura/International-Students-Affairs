<!DOCTYPE html>
<html>
<head>
    <title>List of all students</title>
    
    <style>
        .stretch-card>.card {
    width: 100%;
    min-width: 100%
}

.flex {
    -webkit-box-flex: 1;
    -ms-flex: 1 1 auto;
    flex: 1 1 auto
}

@media (max-width:991.98px) {
    .padding {
        padding: 1.5rem
    }
}

@media (max-width:767.98px) {
    .padding {
        padding: 1rem
    }
}

.padding {
    padding: 3rem
}

.card {
    box-shadow: none;
    -webkit-box-shadow: none;
    -moz-box-shadow: none;
    -ms-box-shadow: none
}
.col-xl-3 h6{
    font-weight: 100;
}

.card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 1px solid #3da5f;
    border-radius: 0
}

.card .card-block {
   padding: 1.25rem;
}

h6 {
   font-size: 16px !important;
}

.text-c-green {
   color: #2ed8b6;
}

.m-l-10 {
   margin-left: 10px;
}

.year-selection:focus{
    outline: none;
}

.proj-progress-card .progresss {
   height: 6px;
   overflow: visible;
   margin-bottom: 10px;
   background: rgba(110,110,110,.2);
   border-radius: 20px;
}

.proj-progress-card .progresss .progress-bar {
   position: relative;
   overflow: visible !important;
}

.progresss .progress-bar {
   height: 100%;
   color: inherit;
}

.bg-c-red {
   background: #FF5370;
}

.proj-progress-card .progresss .progress-bar.bg-c-red:after {
   border: 3px solid #FF5370;
}

.proj-progress-card .progresss .progress-bar:before {
    content: attr(data-progress);
   background: #fff;
   position: absolute;
   right: -35px;
   top: -25px;
   width: 50px;
   height: 20px;
   font-size: 12px;
   overflow: hidden;
   padding: 6px 4px;
   display: flex;
   align-items: center;
   justify-content: center;
   border-radius: 5px;
   border: 1px solid rgba(110,110,110,.4)
}
.proj-progress-card .progresss .progress-bar:after {
   content: '';
   background: #fff;
   position: absolute;
   right: -6px;
   top: -4px;
   border-radius: 50%;
   width: 15px;
   height: 15px;
}

.bg-c-blue {
   background: #4099ff;
}

.proj-progress-card .progresss .progress-bar.bg-c-blue:after {
   border: 3px solid #4099ff;
}

.proj-progress-card .progresss .progress-bar.bg-c-green:after {
   border: 3px solid #2ed8b6;
}

.bg-c-green {
   background: #2ed8b6;
}

.bg-c-yellow {
   background: #FFB64D;
}

.proj-progress-card .progresss .progress-bar.bg-c-yellow:after {
   border: 3px solid #FFB64D;
}

.m-b-30 {
   margin-bottom: 30px;
}
.m-t-30 {
    margin-top: 30px;
 }
 
 .text-c-red {
    color: #FF5370;
 }
 .progress-label{
     font-weight: bold; 
     font-size: 25px; 
     color: rgba(110,110,110,.65);
 }
    </style>
</head>
<body style='display:flex; flex-direction:column; justify-content:space-between;'>
    <div style="display: flex; flex-direction:column; align-items:center; text-align: center;">
            <img src="data:image/png;base64,{{base64_encode(file_get_contents(public_path('asset/img/logo.png')))}}" style="width:220px; height:150px;">    
            <h2>Strathmore University International Students Affairs</h2>
        </div>
        <div style="text-align: center;">
            <i class="fas fa-table mr-1" style="text-decoration:underline"></i><u>
                {{$year}} Analysis</u>
        </div><br/> 
    </div>
    <div class="card-block statistics-display">
        <div class="row" style='padding: 10px 20px'>
            <div class="col-xl-3 col-md-6 mt-4 mb-1">
                <h6>No of Kpp Request</h6>
                <div class="m-t-30 progresss">
                    <div class="progress-bar bg-c-red" data-progress='{{round(sizeOf(json_decode($data["kpps"]))*100/$NoStudents,1)}}%' style="width:{{sizeOf(json_decode($data["kpps"]))*100/$NoStudents}}%"></div>
                </div>
                <h5 class="f-w-700 progress-label pb-2">{{sizeOf(json_decode($data["kpps"]))}}</h5>

                <div class='bg-c-red p-3 pt-0' style="color:#fff; border-radius: 0 0 10px 10px;">
                    <h6 class='pb-3 pt-1'>No of Kpps Approved</h6>
                    @php $kppCount = 0; @endphp
                    @foreach(json_decode($data["kpps"]) as $v)
                        @if($v->application_status === 'approved')
                            @php $kppCount = $kppCount + 1; @endphp
                        @endif
                    @endforeach
                    <h5 class="f-w-700 progress-label pb-2 d-flex justify-content-between align-items-center" style='color: rgba(240,240,240)'>{{$kppCount}} <small style="font-size: 13px;">{{round($kppCount*100/sizeOf(json_decode($data["kpps"])),1)}} %</small></h5>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mt-4 mb-1">
                <h6>No of Visa Extension Request</h6>
                <div class="m-t-30 progresss">
                    <div class="progress-bar bg-c-blue"  data-progress='{{round(sizeOf(json_decode($data["ex"]))*100/$NoStudents,1)}}%' style="width:{{sizeOf(json_decode($data["ex"]))*100/$NoStudents}}%"></div>
                </div>
                <h5 class="f-w-700 progress-label pb-2">{{sizeOf(json_decode($data["ex"]))}}</h5>
                <div class='bg-c-blue p-3 pt-0' style="color:#fff; border-radius: 0 0 10px 10px;">
                    <h6 class='pb-3 pt-1'>No of Extensions Approved</h6>

                    @php $extCount = 0; @endphp
                    @foreach(json_decode($data["ex"]) as $v)
                        @if($v->application_status === 'approved')
                            @php $extCount = $extCount + 1; @endphp
                        @endif
                    @endforeach
                    <h5 class="f-w-700 progress-label pb-2 d-flex justify-content-between align-items-center" style='color: rgba(240,240,240)'>{{$extCount}} <small style="font-size: 13px;">{{round($extCount*100/sizeOf(json_decode($data["ex"])),1)}} %</small></h5>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mt-4 mb-1">
                <h6>No of Buddy Request</h6>
                <div class="m-t-30 progresss">
                    <div class="progress-bar bg-c-green"  data-progress='{{round(sizeOf(json_decode($data["bd"]))*100/$NoStudents,1)}}%' style="width:{{sizeOf(json_decode($data["bd"]))*100/$NoStudents}}%"></div>
                </div>
                <h5 class="f-w-700 progress-label pb-2">{{sizeOf(json_decode($data["bd"]))}}</h5>
                <div class='bg-c-green p-3 pt-0' style="color:#fff; border-radius: 0 0 10px 10px;">
                    <h6 class='pb-3 pt-1'>No of Allocations</h6>
                    @php $bdCount = 0; @endphp
                    @foreach(json_decode($data["bd"]) as $v)
                        @if($v->status === 'approved')
                            @php $bdCount = $bdCount + 1; @endphp
                        @endif
                    @endforeach
                    <h5 class="f-w-700 progress-label pb-2 d-flex justify-content-between align-items-center" style='color: rgba(240,240,240)'>{{$bdCount}} <small style="font-size: 13px;">{{round($bdCount*100/sizeOf(json_decode($data["bd"])),1)}} %</small></h5>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mt-4 mb-1">
                <h6>No of Meeting Request</h6>
                <div class="m-t-30 progresss">
                    <div class="progress-bar bg-c-yellow"  data-progress='{{round(sizeOf(json_decode($data["meet"]))*100/$NoStudents,1)}}%' style="width:{{sizeOf(json_decode($data["meet"]))*100/$NoStudents}}%"></div>
                </div>
                <h5 class="f-w-700 progress-label pb-2">{{sizeOf(json_decode($data["meet"]))}}</h5>
                <div class='bg-c-yellow p-3 pt-0' style="color:#fff; border-radius: 0 0 10px 10px;">
                    <h6 class='pb-3 pt-1'>No of Meetings Approved</h6>
                    @php $meetCount = 0; @endphp
                    @foreach(json_decode($data["meet"]) as $v)
                        @if($v->status === 'approved')
                            @php $meetCount = $meetCount + 1; @endphp
                        @endif
                    @endforeach
                    <h5 class="f-w-700 progress-label pb-2 d-flex justify-content-between align-items-center" style='color: rgba(240,240,240)'>{{$meetCount}} <small style="font-size: 13px;">{{round($meetCount*100/sizeOf(json_decode($data["meet"])),1)}} %</small></h5>
                </div>
            </div>
        </div>
    </div>
    <div style='border-top: 1px solid rgba(110,110,110,.75); '>
        <small class="mb-0"><strong>Report Generated on</strong>: <?php echo date('d.m.Y'); ?></small><br>
        <small><strong>Time Generated </strong>: <?php date_default_timezone_set("Africa/Nairobi"); echo date("h:i:sa");?></small><br>
        <small><strong>Generated By </strong>: {{ Auth::user()->other_names}}</small>
    </div>
</body>
</html>