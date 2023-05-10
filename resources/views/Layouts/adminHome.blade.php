@extends('Layouts.AdminActions.adminMaster',['title'=>'Dashboard','newVisaReq'=>$newVisaReq])
@section('content')
    <nav class="d-flex align-items-center top-title-sticky" style='position:sticky; top:0; z-index:2999; padding:8px; background:#fff; width:100%; height: 56px;'>
        <span>Dashboard</span>
    </nav>
    <div class="container-fluid"><br/>
        <div class="row d-flex justify-content-center">
            <div class="col-xl-12">
                <div class="card proj-progress-card">
                    <div class="card-header py-2 px-2 d-flex justify-content-between align-items-center">
                        <div class='d-flex'>
                            <div class="select-dropdown pl-2">
                                <button href="#" role="button" data-value="" class="select-dropdown__button">
                                    <input type='hidden' id='selected_val' />
                                    <span>2023</span>
                                </button>
                                <ul class="select-dropdown__list">
                                    <li data-value="2023" class="select-dropdown__list-item">2023</li>
                                    <li data-value="2024" class="select-dropdown__list-item">2024</li>
                                    <li data-value="2025" class="select-dropdown__list-item">2025</li>
                                    <li data-value="2026" class="select-dropdown__list-item">2026</li>
                                </ul>
                            </div>
                            <p class="pl-4 d-flex align-items-center" style='font-size:20px; color: rgba(110,110,110,.4);'> Total Registered Students <strong class='pl-2'>{{$NoStudents}}</strong> </p>
                        </div>
                        <!-- <form action='{{route("add.statistics")}}' method='post'>@csrf
                            <input type="hidden" name="year" id='getStatisticsYear' value='{{date("Y")}}'>
                            <button type='submit' id='iids'>
                            <i role='button' style='color: rgba(110,110,110,.4); font-size:20px;' class='far fa-file-pdf'></i>
                            </button>
                        </form> -->
                    </div>
                    <ol class="breadcrumb d-flex mb-4 " style="border-radius:0; border-bottom:1px solid grey; background:transparent;" >
                        <li class="breadcrumb-item active d-flex w-100" style=""> 
                            <div class='mr-4' style='font-weight:bolder;'><i class='fa fa-mars mr-2' style='color:#113C7A;font-size:30px;'></i>Male: <span style='font-size:20px;'>{{$NumMale}}</span></div>
                            <div style='font-weight:bolder;'><i class='fa fa-venus mr-2' style='font-size:30px; color:#7A1171;'></i>Female: <span style='font-size:20px;'>{{$NumFemale}}</</span></div>
                        </li>
                    </ol> 
                    <div class="card-block statistics-display">
                        <div class="row">
                            <div class="col-xl-3 col-md-6 mt-4 mb-1">
                                <h6>No of Kpp Request</h6>
                                <div class="m-t-30 progresss">
                                    <div class="progress-bar bg-c-red" data-progress='{{(sizeOf($KppStatistics)>0)?round(sizeOf($KppStatistics)*100/$NoStudents,1):0}}%' style="width:{{(sizeOf($KppStatistics)>0)?sizeOf($KppStatistics)*100/$NoStudents:0}}%"></div>
                                </div>
                                <h5 class="f-w-700 progress-label pb-2">{{sizeOf($KppStatistics)}}</h5>

                                <div class='bg-c-red p-3 pt-0' style="color:#fff; border-radius: 0 0 10px 10px;">
                                    <h6 class='pb-3 pt-1'>No of Kpps Approved</h6>
                                    @php $kppCount = 0; @endphp
                                    @if(sizeOf($KppStatistics)>0)
                                    @foreach($KppStatistics as $v)
                                        @if($v->application_status === 'approved')
                                            @php $kppCount = $kppCount + 1; @endphp
                                        @endif
                                    @endforeach
                                    @endif
                                    <h5 class="f-w-700 progress-label pb-2 d-flex justify-content-between align-items-center" style='color: rgba(240,240,240)'>{{$kppCount}} <small style="font-size: 13px;">{{(sizeOf($KppStatistics)>0)?round($kppCount*100/sizeOf($KppStatistics),1):0}} %</small></h5>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6 mt-4 mb-1">
                                <h6>No of Visa Extension Request</h6>
                                <div class="m-t-30 progresss">
                                    <div class="progress-bar bg-c-blue"  data-progress='{{(sizeOf($ExtStatistics)>0)?round(sizeOf($ExtStatistics)*100/$NoStudents,1):0}}%' style="width:{{(sizeOf($ExtStatistics)>0)?sizeOf($ExtStatistics)*100/$NoStudents:0}}%"></div>
                                </div>
                                <h5 class="f-w-700 progress-label pb-2">{{sizeOf($ExtStatistics)}}</h5>
                                <div class='bg-c-blue p-3 pt-0' style="color:#fff; border-radius: 0 0 10px 10px;">
                                    <h6 class='pb-3 pt-1'>No of Extensions Approved</h6>
                                    @php $extCount = 0; @endphp
                                    @foreach($ExtStatistics as $v)
                                        @if($v->application_status === 'approved')
                                            @php $extCount = $extCount + 1; @endphp
                                        @endif
                                    @endforeach
                                    <h5 class="f-w-700 progress-label pb-2 d-flex justify-content-between align-items-center" style='color: rgba(240,240,240)'>{{$extCount}} <small style="font-size: 13px;">{{(sizeOf($ExtStatistics)>0)?round($extCount*100/sizeOf($ExtStatistics),1):0}} %</small></h5>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6 mt-4 mb-1">
                                <h6>No of Buddy Request</h6>
                                <div class="m-t-30 progresss">
                                    <div class="progress-bar bg-c-green"  data-progress='{{(sizeOf($BuddyStatistics)>0)?round(sizeOf($BuddyStatistics)*100/$NoStudents,1):0}}%' style="width:{{(sizeOf($BuddyStatistics)>0)?sizeOf($BuddyStatistics)*100/$NoStudents:0}}%"></div>
                                </div>
                                <h5 class="f-w-700 progress-label pb-2">{{sizeOf($BuddyStatistics)}}</h5>
                                <div class='bg-c-green p-3 pt-0' style="color:#fff; border-radius: 0 0 10px 10px;">
                                    <h6 class='pb-3 pt-1'>No of Allocations</h6>
                                    @php $bdCount = 0; @endphp
                                    @foreach($BuddyStatistics as $v)
                                        @if($v['status'] === 'approved')
                                            @php $bdCount = $bdCount + 1; @endphp
                                        @endif
                                    @endforeach
                                    <h5 class="f-w-700 progress-label pb-2 d-flex justify-content-between align-items-center" style='color: rgba(240,240,240)'>{{$bdCount}} <small style="font-size: 13px;">{{(sizeOf($BuddyStatistics)>0)?round($bdCount*100/sizeOf($BuddyStatistics),1):0}} %</small></h5>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6 mt-4 mb-1">
                                <h6>No of Meeting Request</h6>
                                <div class="m-t-30 progresss">
                                    <div class="progress-bar bg-c-yellow"  data-progress='{{(sizeOf($MeetingStatistics)>0)?round(sizeOf($MeetingStatistics)*100/$NoStudents,1):0}}%' style="width:{{(sizeOf($MeetingStatistics)>0)?sizeOf($MeetingStatistics)*100/$NoStudents:0}}%"></div>
                                </div>
                                <h5 class="f-w-700 progress-label pb-2">{{sizeOf($MeetingStatistics)}}</h5>
                                <div class='bg-c-yellow p-3 pt-0' style="color:#fff; border-radius: 0 0 10px 10px;">
                                    <h6 class='pb-3 pt-1'>No of Meetings Approved</h6>
                                    @php $meetCount = 0; @endphp
                                    @foreach($MeetingStatistics as $v)
                                        @if($v->status === 'met')
                                            @php $meetCount = $meetCount + 1; @endphp
                                        @endif
                                    @endforeach
                                    <h5 class="f-w-700 progress-label pb-2 d-flex justify-content-between align-items-center" style='color: rgba(240,240,240)'>{{$meetCount}} <small style="font-size: 13px;">{{(sizeOf($MeetingStatistics)>0)?round($meetCount*100/sizeOf($MeetingStatistics),1):0}} %</small></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    

    <div class="container-fluid"><br/>
    
    @if(Session::has('user_update_success') )
    <div class="alert alert-success" role="alert">
    {{Session::get('user_update_success')}}
    </div>
    @endif
    @if(Session::has('user_update_failed') )
    <div class="alert alert-danger" role="alert">
    {{Session::get('user_update_failed')}}
    </div>
    @endif
        
        
    @php $itemsData = [
        ['name'=>'Kpps','data'=>$KppStatistics],
        ['name'=>'Visa Extensions','data'=>$ExtStatistics],
        ['name'=>'Buddies','data'=>$BuddyStatistics],
        ['name'=>'Meetings','data'=>$MeetingStatistics]
        ]; 
        $year = 2023;
    @endphp
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <script defer>
        const xValues = ["Jan", "Feb", "Mar", "Apr", "May", "Jun","Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
        const colors = ['rgb(250,83,113)','rgb(64,153,255)','rgb(51,216,182)','rgb(252,182,78)']
        let yValuesReq, yValuesApp, ReqMaxNo, AppMaxNo;
    </script>
    <div class="data-charts-fill">
        @foreach($itemsData as $index => $item)
        <div class="data-statistics row" >
            @php $CountReq = 0; $CountApp = 0; $ValApp = [0,0,0,0,0,0,0,0,0,0,0,0]; $ValReq = [0,0,0,0,0,0,0,0,0,0,0,0]; @endphp
            @php $month = ["Jan", "Feb", "Mar", "Apr", "May", "Jun","Jul", "Aug", "Sep", "Oct", "Nov", "Dec"]; @endphp
            
            <div class="col-lg-6" style='width:100%; padding: 0 10px;'>
                <canvas id="request_{{str_replace(' ','_',$item['name'])}}" style="width:100%;max-width:700px"></canvas>
                @foreach($item["data"] as $v)
                    @if(array_key_exists('application_date',(array)$v))
                        @php $month = (int) explode('-',$v->application_date)[1]-1; @endphp
                        @php $ValReq[$month]=$ValReq[$month]+1; @endphp
                    @endif
                    @if(array_key_exists('request_date',(array)$v))
                        @php $month = (int) explode('-',$v['request_date'])[1]-1; @endphp
                        @php $ValReq[$month]=$ValReq[$month]+1; @endphp
                    @endif
                    @if(array_key_exists('booked_date_time',(array)$v))
                        @php $month = (int) explode('-',$v->booked_date_time)[1]-1; @endphp
                        @php $ValReq[$month]=$ValReq[$month]+1; @endphp
                    @endif
                @endforeach
                <strong style="font-family: 'Gill Sans'; font-size: 12px;">Year Analysis</strong>
                <div class='year_details mt-1 mb-4' style='font-size: 12px;'>
                    <p>Total number of Students registered: <span style='font-weight: bold; margin-left:10px;'>{{$NoStudents}}</span></p>
                    <p>Total number of request placed: <span style='font-weight: bold; margin-left:10px;'>{{sizeOf($item["data"])}}</span></p>
                    <p>Percentage: <span style='font-weight: bold; margin-left:10px;'>{{(sizeOf($item["data"])>0)?round(sizeOf($item["data"])*100/$NoStudents,1):0}}%</span></p>
                </div>
            </div>
            <div class="col-lg-6" style='width:100%; padding: 0 10px;'>
                <canvas id="approved_{{str_replace(' ','_',$item['name'])}}" style="width:100%;max-width:700px"></canvas>
                @foreach($item["data"] as $v)
                    @if(array_key_exists('application_status',(array)$v))
                        @php $month = (int) explode('-',$v->application_date)[1]-1; @endphp
                        @if($v->application_status === 'approved')
                            @php $CountApp = $CountApp + 1; 
                            $ValApp[$month]=$ValApp[$month]+1;
                            @endphp
                        @endif
                    @endif
                    @if(array_key_exists('status',(array)$v))
                        @if(array_key_exists('request_date',(array)$v))
                            @php $month = (int) explode('-',$v['request_date'])[1]-1; @endphp
                            @if($v['status'] === 'approved')
                                @php $CountApp = $CountApp + 1; 
                                $ValApp[$month]=$ValApp[$month]+1;
                                @endphp
                            @endif
                        @endif
                        @if(array_key_exists('booked_date_time',(array)$v))
                            @php $month = (int) explode('-',$v->booked_date_time)[1]-1; @endphp
                            @if($v->status === 'met')
                                @php $CountApp = $CountApp + 1; 
                                $ValApp[$month]=$ValApp[$month]+1;
                                @endphp
                            @endif
                        @endif
                    @endif
                @endforeach
                <strong style="font-family: 'Gill Sans'; font-size: 12px;">Year Analysis</strong>
                <div class='year_details mt-1 mb-4' style='font-size: 12px;'>
                    <p>Total number of request placed: <span style='font-weight: bold; margin-left:10px;'>{{sizeOf($item["data"])}}</span></p>
                    <p>Total number of request approved: <span style='font-weight: bold; margin-left:10px;'>{{$CountApp}}</span></p>
                    <p>Percentage: <span style='font-weight: bold; margin-left:10px;'>{{(sizeOf($item["data"])>0)?round($CountApp*100/sizeOf($item["data"]),1):0}} %</span></p>
                </div>
            </div>
        </div>
        <script defer>
            
            yValuesReq =  JSON.parse('{{json_encode($ValReq)}}');
            yValuesApp =  JSON.parse('{{json_encode($ValApp)}}');
            ReqMaxNo = (Math.max(...yValuesReq) < 10)? 10: Math.max(...yValuesReq)
            AppMaxNo = (Math.max(...yValuesApp) < 10)? 10: Math.max(...yValuesApp)

            new Chart("request_{{str_replace(' ','_',$item['name'])}}", {
            type: "bar",
            data: {
                labels: xValues,
                datasets: [{
                fill: false,
                lineTension: 0,
                backgroundColor: colors['{{$index}}'],
                data: yValuesReq
                }]
            },
            options: {
                responsive: true,
                legend: {display: false},
                title:{
                    display: true,
                    text: "{{$item['name'].' '.$year.' Requests'}}"
                },
                plugins: {
                    scales: {
                    yAxes: [{ticks: {min: 0, max:ReqMaxNo}}],
                    }
                }
            }
            });
            new Chart("approved_{{str_replace(' ','_',$item['name'])}}", {
            type: "line",
            data: {
                labels: xValues,
                datasets: [{
                fill: false,
                lineTension: 0,
                backgroundColor: colors['{{$index}}'],
                data: yValuesApp
                }]
            },
            options: {
                legend: {display: false},
                title:{
                    display: true,
                    text: "{{$item['name'].' '.$year.' Approved Requests'}}"
                },
                scales: {
                yAxes: [{ticks: {min: 0, max:AppMaxNo}}],
                }
            }
            });
        </script>
        @endforeach
    </div>
    </div>

    <script defer src='asset/js/custom_select.js'></script>
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
    <script>
        $(function(){
            $('.select-dropdown__button > span').on('DOMSubtreeModified',function(e){
                if($(this).html() !== ""){
                    let value = $(this).siblings('input').val()
                    $('#getStatisticsYear').val(value)
                    $.ajax({
                        type: "get",
                        url: `/statistics-filter/${value}`,
                        success: function (data) {

                            let kppCount = 0, exCount = 0, bdCount = 0, meetCount = 0;
                            for(let x of data.kpps){
                                if(x.application_status === 'approved'){
                                    kppCount ++
                                }
                            }
                            for(let a of data.ex){
                                if(a.application_status === 'approved'){
                                    exCount ++
                                }
                            }
                            for(let i of data.bd){
                                if(i.status === 'approved'){
                                    bdCount ++
                                }
                            }
                            for(let j of data.meet){
                                if(j.status === 'met'){
                                    meetCount ++
                                }
                            }

                            let content =`<div class="row">
                                <div class="col-xl-3 col-md-6 mt-4 mb-1">
                                    <h6>No of Kpp Request</h6>
                                    <div class="m-t-30 progresss">
                                        <div class="progress-bar bg-c-red" data-progress='${(data.kpps.length * 100 / parseInt('{{$NoStudents}}')).toFixed(2) }%' style="width:${(data.kpps.length * 100 / parseInt('{{$NoStudents}}')).toFixed(2) }%"></div>
                                    </div>
                                    <h5 class="f-w-700 progress-label pb-2">${data.kpps.length}</h5>

                                    <div class='bg-c-red p-3 pt-0' style="color:#fff; border-radius: 0 0 10px 10px;">
                                        <h6 class='pb-3 pt-1'>No of Kpps Approved</h6>
                                        
                                        <h5 class="f-w-700 progress-label pb-2 d-flex justify-content-between align-items-center" style='color: rgba(240,240,240)'>${kppCount}<small style="font-size: 13px;">${(data.kpps.length > 0)?(kppCount * 100 / data.kpps.length).toFixed(2):0.00} %</small></h5>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-6 mt-4 mb-1">
                                    <h6>No of Visa Extension Request</h6>
                                    <div class="m-t-30 progresss">
                                        <div class="progress-bar bg-c-blue" data-progress='${(data.ex.length * 100 / parseInt('{{$NoStudents}}')).toFixed(2) }%' style="width:${(data.ex.length * 100 / parseInt('{{$NoStudents}}')).toFixed(2) }%"></div>
                                    </div>
                                    <h5 class="f-w-700 progress-label pb-2">${data.ex.length}</h5>

                                    <div class='bg-c-blue p-3 pt-0' style="color:#fff; border-radius: 0 0 10px 10px;">
                                        <h6 class='pb-3 pt-1'>No of Visa Extension Approved</h6>
                                        
                                        <h5 class="f-w-700 progress-label pb-2 d-flex justify-content-between align-items-center" style='color: rgba(240,240,240)'>${exCount}<small style="font-size: 13px;">${(data.ex.length > 0)?(exCount * 100 / data.ex.length).toFixed(2):0.00} %</small></h5>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-6 mt-4 mb-1">
                                    <h6>No of Buddy Request</h6>
                                    <div class="m-t-30 progresss">
                                        <div class="progress-bar bg-c-green" data-progress='${(data.bd.length * 100 / parseInt('{{$NoStudents}}')).toFixed(2) }%' style="width:${(data.bd.length * 100 / parseInt('{{$NoStudents}}')).toFixed(2) }%"></div>
                                    </div>
                                    <h5 class="f-w-700 progress-label pb-2">${data.bd.length}</h5>

                                    <div class='bg-c-green p-3 pt-0' style="color:#fff; border-radius: 0 0 10px 10px;">
                                        <h6 class='pb-3 pt-1'>No of Buddy Approved</h6>
                                        
                                        <h5 class="f-w-700 progress-label pb-2 d-flex justify-content-between align-items-center" style='color: rgba(240,240,240)'>${bdCount}<small style="font-size: 13px;">${(data.bd.length > 0)?(bdCount * 100 / data.bd.length).toFixed(2):0.00} %</small></h5>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-6 mt-4 mb-1">
                                    <h6>No of Meeting Request</h6>
                                    <div class="m-t-30 progresss">
                                        <div class="progress-bar bg-c-yellow" data-progress='${(data.meet.length * 100 / parseInt('{{$NoStudents}}')).toFixed(2) }%' style="width:${(data.meet.length * 100 / parseInt('{{$NoStudents}}')).toFixed(2) }%"></div>
                                    </div>
                                    <h5 class="f-w-700 progress-label pb-2">${data.meet.length}</h5>

                                    <div class='bg-c-yellow p-3 pt-0' style="color:#fff; border-radius: 0 0 10px 10px;">
                                        <h6 class='pb-3 pt-1'>No of Meeting Approved</h6>
                                        
                                        <h5 class="f-w-700 progress-label pb-2 d-flex justify-content-between align-items-center" style='color: rgba(240,240,240)'>${meetCount}<small style="font-size: 13px;">${(data.meet.length > 0)?(meetCount * 100 / data.meet.length).toFixed(2):0.00} %</small></h5>
                                    </div>
                                </div>
                                
                            </div>`;

                            let ChartCategory = [
                            {name:'Kpps',DataArray: data.kpps},
                            {name:'Visa Extensions',DataArray: data.ex},
                            {name:'Buddies',DataArray: data.bd},
                            {name:'Meetings',DataArray: data.meet}
                            ]; let ChatData='<section class="data-view-chart">', lala="";
                            for(let i=0; i < ChartCategory.length; i++){
                                let category = ChartCategory[i];
                                let ValApp = [0,0,0,0,0,0,0,0,0,0,0,0], ValReq = [0,0,0,0,0,0,0,0,0,0,0,0], CountApp=0; 
                                let months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun","Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
                                if(category.DataArray.length > 0){
                                    for(let catData of category.DataArray){
                                        let monthIndex=0;
                                        if(catData['application_date'] !== undefined){ monthIndex = parseInt( catData.application_date.split('-')[1])-1; ValReq[monthIndex]++}
                                        if(catData['request_date'] !== undefined ){ monthIndex = parseInt( catData.request_date.split('-')[1])-1; ValReq[monthIndex]++}
                                        if(catData['booked_date_time'] !== undefined ){ monthIndex = parseInt( catData.booked_date_time.split('-')[1])-1; ValReq[monthIndex]++}
    
                                        if(catData['application_status'] !== undefined ){ 
                                            monthIndex = parseInt( catData.application_date.split('-')[1])-1; 
                                            if(catData.application_status === 'approved'){
                                                CountApp++
                                                ValApp[monthIndex]++
                                            }
                                        }
                                        if(catData['status'] !== undefined ){ 
                                            if(catData['request_date'] !== undefined ){
                                                monthIndex = parseInt( catData.request_date.split('-')[1])-1; 
                                                if(catData.status === 'approved'){
                                                    CountApp++
                                                    ValApp[monthIndex]++
                                                }
                                            }
                                        }
                                        if(catData['booked_date_time'] !== undefined ){ 
                                            monthIndex = parseInt( catData.booked_date_time.split('-')[1])-1; 
                                            if(catData.status === 'met'){
                                                CountApp++
                                                ValApp[monthIndex]++
                                            }
                                        }
                                    }
                                }
                                yValuesReq =  ValReq
                                yValuesApp =  ValApp
                                ReqMaxNo = (Math.max(...yValuesReq) < 10)? 10: Math.max(...yValuesReq)
                                AppMaxNo = (Math.max(...yValuesApp) < 10)? 10: Math.max(...yValuesApp)

                                ChatData += `<div class="data-statistics row" data-yValuesReq="${JSON.stringify(ValReq)}" data-yValuesApp="${JSON.stringify(ValApp)}" data-ReqMax="${ReqMaxNo}" data-AppMax="${AppMaxNo}" data-target-name='${category.name}'>
                                    <div class="col-lg-6" style='width:100%; padding: 0 10px;'>
                                        <canvas id="request_${category.name.replaceAll(' ','_')}" style="width:100%;max-width:700px"></canvas>
                                        <strong style="font-family: 'Gill Sans'; font-size: 12px;">Year Analysis</strong>
                                        <div class='year_details mt-1 mb-4' style='font-size: 12px;'>
                                            <p>Total number of Students registered: <span style='font-weight: bold; margin-left:10px;'>{{$NoStudents}}</span></p>
                                            <p>Total number of request placed: <span style='font-weight: bold; margin-left:10px;'>${category.DataArray.length}</span></p>
                                            <p>Percentage: <span style='font-weight: bold; margin-left:10px;'>${category.DataArray.length > 0 ?(category.DataArray.length*100/parseInt('{{$NoStudents}}')).toFixed(2):0}%</span></p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6" style='width:100%; padding: 0 10px;'>
                                        <canvas id="approved_${category.name.replaceAll(' ','_')}" style="width:100%;max-width:700px"></canvas>
                                        <strong style="font-family: 'Gill Sans'; font-size: 12px;">Year Analysis</strong>
                                        <div class='year_details mt-1 mb-4' style='font-size: 12px;'>
                                            <p>Total number of request placed: <span style='font-weight: bold; margin-left:10px;'>${category.DataArray.length}</span></p>
                                            <p>Total number of request approved: <span style='font-weight: bold; margin-left:10px;'>${CountApp}</span></p>
                                            <p>Percentage: <span style='font-weight: bold; margin-left:10px;'>${category.DataArray.length > 0 ?(CountApp*100/category.DataArray.length).toFixed(2):0}%</span></p>
                                        </div>
                                    </div>
                                    </div>`;

                            }
                            ChatData += "</section>"
                            $('.statistics-display').html(content)
                            $('.data-charts-fill').html(ChatData)

                            $('.data-view-chart').find('.data-statistics').each(function(k){

                                let YValReq = JSON.parse($(this).attr('data-yValuesReq'))
                                let YValApp = JSON.parse($(this).attr('data-yValuesApp'))
                                let MaxReq = parseInt($(this).attr('data-ReqMax'))
                                let MaxApp = parseInt($(this).attr('data-AppMax'))

                                // $(this).find('div:first-child').find('class')
                                // request_${category.name.replaceAll(' ','_')}
                                new Chart($(this).find('div:first-child').find('canvas'), {
                                    type: "bar",
                                    data: {
                                        labels: xValues,
                                        datasets: [{
                                        fill: false,
                                        lineTension: 0,
                                        backgroundColor: colors[k],
                                        data: YValReq
                                        }]
                                    },
                                    options: {
                                        responsive: true,
                                        legend: {display: false},
                                        title:{
                                            display: true,
                                            text: `${$(this).attr('data-target-name')+' '+value} Requests`
                                        },
                                        plugins: {
                                        scales: {
                                        yAxes: [{ticks: {min: 0, max:MaxReq}}],
                                        }
                                        }
                                    }
                                });
                                new Chart($(this).find('div:last-child').find('canvas'), {
                                    type: "line",
                                    data: {
                                        labels: xValues,
                                        datasets: [{
                                        fill: false,
                                        lineTension: 0,
                                        backgroundColor: colors[k],
                                        data: YValApp
                                        }]
                                    },
                                    options: {
                                        legend: {display: false},
                                        title:{
                                            display: true,
                                            text: `${$(this).attr('data-target-name')+' '+value} Approved Requests`
                                        },
                                        scales: {
                                        yAxes: [{ticks: {min: 0, max:MaxApp}}],
                                        }
                                    }
                                });
                            })
                        },
                        error: function (data, textStatus, errorThrown) {
                            console.log(data);

                        }
                    })
                }
                
            })
        })
    </script>
           
    
@endsection