@extends('Layouts.AdminActions.adminMaster')
@section('content')
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
                        <form action='{{route("add.statistics")}}' method='post'>@csrf
                            <input type="hidden" name="year" id='getStatisticsYear' value='{{date("Y")}}'>
                            <button type='submit' id='iids'>
                            <i role='button' style='color: rgba(110,110,110,.4); font-size:20px;' class='far fa-file-pdf'></i>
                            </button>
                        </form>
                    </div>
                    <div class="card-block statistics-display">
                        <div class="row">
                            <div class="col-xl-3 col-md-6 mt-4 mb-1">
                                <h6>No of Kpp Request</h6>
                                <div class="m-t-30 progresss">
                                    <div class="progress-bar bg-c-red" data-progress='{{round(sizeOf($KppStatistics)*100/$NoStudents,1)}}%' style="width:{{sizeOf($KppStatistics)*100/$NoStudents}}%"></div>
                                </div>
                                <h5 class="f-w-700 progress-label pb-2">{{sizeOf($KppStatistics)}}</h5>

                                <div class='bg-c-red p-3 pt-0' style="color:#fff; border-radius: 0 0 10px 10px;">
                                    <h6 class='pb-3 pt-1'>No of Kpps Approved</h6>
                                    @php $kppCount = 0; @endphp
                                    @foreach($KppStatistics as $v)
                                        @if($v->application_status === 'approved')
                                            @php $kppCount = $kppCount + 1; @endphp
                                        @endif
                                    @endforeach
                                    <h5 class="f-w-700 progress-label pb-2 d-flex justify-content-between align-items-center" style='color: rgba(240,240,240)'>{{$kppCount}} <small style="font-size: 13px;">{{round($kppCount*100/sizeOf($KppStatistics),1)}} %</small></h5>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6 mt-4 mb-1">
                                <h6>No of Visa Extension Request</h6>
                                <div class="m-t-30 progresss">
                                    <div class="progress-bar bg-c-blue"  data-progress='{{round(sizeOf($ExtStatistics)*100/$NoStudents,1)}}%' style="width:{{sizeOf($ExtStatistics)*100/$NoStudents}}%"></div>
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
                                    <h5 class="f-w-700 progress-label pb-2 d-flex justify-content-between align-items-center" style='color: rgba(240,240,240)'>{{$extCount}} <small style="font-size: 13px;">{{round($extCount*100/sizeOf($ExtStatistics),1)}} %</small></h5>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6 mt-4 mb-1">
                                <h6>No of Buddy Request</h6>
                                <div class="m-t-30 progresss">
                                    <div class="progress-bar bg-c-green"  data-progress='{{round(sizeOf($BuddyStatistics)*100/$NoStudents,1)}}%' style="width:{{sizeOf($BuddyStatistics)*100/$NoStudents}}%"></div>
                                </div>
                                <h5 class="f-w-700 progress-label pb-2">{{sizeOf($BuddyStatistics)}}</h5>
                                <div class='bg-c-green p-3 pt-0' style="color:#fff; border-radius: 0 0 10px 10px;">
                                    <h6 class='pb-3 pt-1'>No of Allocations</h6>
                                    @php $bdCount = 0; @endphp
                                    @foreach($BuddyStatistics as $v)
                                        @if($v->status === 'approved')
                                            @php $bdCount = $bdCount + 1; @endphp
                                        @endif
                                    @endforeach
                                    <h5 class="f-w-700 progress-label pb-2 d-flex justify-content-between align-items-center" style='color: rgba(240,240,240)'>{{$bdCount}} <small style="font-size: 13px;">{{round($bdCount*100/sizeOf($BuddyStatistics),1)}} %</small></h5>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6 mt-4 mb-1">
                                <h6>No of Meeting Request</h6>
                                <div class="m-t-30 progresss">
                                    <div class="progress-bar bg-c-yellow"  data-progress='{{round(sizeOf($MeetingStatistics)*100/$NoStudents,1)}}%' style="width:{{sizeOf($MeetingStatistics)*100/$NoStudents}}%"></div>
                                </div>
                                <h5 class="f-w-700 progress-label pb-2">{{sizeOf($MeetingStatistics)}}</h5>
                                <div class='bg-c-yellow p-3 pt-0' style="color:#fff; border-radius: 0 0 10px 10px;">
                                    <h6 class='pb-3 pt-1'>No of Meetings Approved</h6>
                                    @php $meetCount = 0; @endphp
                                    @foreach($MeetingStatistics as $v)
                                        @if($v->status === 'approved')
                                            @php $meetCount = $meetCount + 1; @endphp
                                        @endif
                                    @endforeach
                                    <h5 class="f-w-700 progress-label pb-2 d-flex justify-content-between align-items-center" style='color: rgba(240,240,240)'>{{$meetCount}} <small style="font-size: 13px;">{{round($meetCount*100/sizeOf($MeetingStatistics),1)}} %</small></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
                                if(j.status === 'approved'){
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
                                
                            </div>`
                            
                            $('.statistics-display').html(content)

                        },
                        error: function (data, textStatus, errorThrown) {
                            console.log(data);

                        }
                    })
                }
            })
            // $('.year-selection').on('change',function(e){
            //     $.ajax({
            //         type: "get",
            //         url: `/statistics-filter/${$(this).val()}`,
            //         success: function (data) {
            //             console.log(data);

            //             let kppCount = 0, exCount = 0, bdCount = 0, meetCount = 0;
            //             for(let x of data.kpps){
            //                 if(x.application_status === 'approved'){
            //                     kppCount ++
            //                 }
            //             }
            //             for(let a of data.ex){
            //                 if(a.application_status === 'approved'){
            //                     exCount ++
            //                 }
            //             }
            //             for(let i of data.bd){
            //                 if(i.status === 'approved'){
            //                     bdCount ++
            //                 }
            //             }
            //             for(let j of data.meet){
            //                 if(j.status === 'approved'){
            //                     meetCount ++
            //                 }
            //             }

            //             let content =`<div class="row">
            //                 <div class="col-xl-3 col-md-6 mt-4 mb-1">
            //                     <h6>No of Kpp Request</h6>
            //                     <div class="m-t-30 progresss">
            //                         <div class="progress-bar bg-c-red" data-progress='${(data.kpps.length * 100 / parseInt('{{$NoStudents}}')).toFixed(2) }%' style="width:${(data.kpps.length * 100 / parseInt('{{$NoStudents}}')).toFixed(2) }%"></div>
            //                     </div>
            //                     <h5 class="f-w-700 progress-label pb-2">${data.kpps.length}</h5>

            //                     <div class='bg-c-red p-3 pt-0' style="color:#fff; border-radius: 0 0 10px 10px;">
            //                         <h6 class='pb-3 pt-1'>No of Kpps Approved</h6>
                                    
            //                         <h5 class="f-w-700 progress-label pb-2 d-flex justify-content-between align-items-center" style='color: rgba(240,240,240)'>${kppCount}<small style="font-size: 13px;">${(data.kpps.length > 0)?(kppCount * 100 / data.kpps.length).toFixed(2):0.00} %</small></h5>
            //                     </div>
            //                 </div>
            //                 <div class="col-xl-3 col-md-6 mt-4 mb-1">
            //                     <h6>No of Visa Extension Request</h6>
            //                     <div class="m-t-30 progresss">
            //                         <div class="progress-bar bg-c-blue" data-progress='${(data.ex.length * 100 / parseInt('{{$NoStudents}}')).toFixed(2) }%' style="width:${(data.ex.length * 100 / parseInt('{{$NoStudents}}')).toFixed(2) }%"></div>
            //                     </div>
            //                     <h5 class="f-w-700 progress-label pb-2">${data.ex.length}</h5>

            //                     <div class='bg-c-blue p-3 pt-0' style="color:#fff; border-radius: 0 0 10px 10px;">
            //                         <h6 class='pb-3 pt-1'>No of Visa Extension Approved</h6>
                                    
            //                         <h5 class="f-w-700 progress-label pb-2 d-flex justify-content-between align-items-center" style='color: rgba(240,240,240)'>${exCount}<small style="font-size: 13px;">${(data.ex.length > 0)?(exCount * 100 / data.ex.length).toFixed(2):0.00} %</small></h5>
            //                     </div>
            //                 </div>
            //                 <div class="col-xl-3 col-md-6 mt-4 mb-1">
            //                     <h6>No of Buddy Request</h6>
            //                     <div class="m-t-30 progresss">
            //                         <div class="progress-bar bg-c-green" data-progress='${(data.bd.length * 100 / parseInt('{{$NoStudents}}')).toFixed(2) }%' style="width:${(data.bd.length * 100 / parseInt('{{$NoStudents}}')).toFixed(2) }%"></div>
            //                     </div>
            //                     <h5 class="f-w-700 progress-label pb-2">${data.bd.length}</h5>

            //                     <div class='bg-c-green p-3 pt-0' style="color:#fff; border-radius: 0 0 10px 10px;">
            //                         <h6 class='pb-3 pt-1'>No of Buddy Approved</h6>
                                    
            //                         <h5 class="f-w-700 progress-label pb-2 d-flex justify-content-between align-items-center" style='color: rgba(240,240,240)'>${bdCount}<small style="font-size: 13px;">${(data.bd.length > 0)?(bdCount * 100 / data.bd.length).toFixed(2):0.00} %</small></h5>
            //                     </div>
            //                 </div>
            //                 <div class="col-xl-3 col-md-6 mt-4 mb-1">
            //                     <h6>No of Meeting Request</h6>
            //                     <div class="m-t-30 progresss">
            //                         <div class="progress-bar bg-c-yellow" data-progress='${(data.meet.length * 100 / parseInt('{{$NoStudents}}')).toFixed(2) }%' style="width:${(data.meet.length * 100 / parseInt('{{$NoStudents}}')).toFixed(2) }%"></div>
            //                     </div>
            //                     <h5 class="f-w-700 progress-label pb-2">${data.meet.length}</h5>

            //                     <div class='bg-c-yellow p-3 pt-0' style="color:#fff; border-radius: 0 0 10px 10px;">
            //                         <h6 class='pb-3 pt-1'>No of Meeting Approved</h6>
                                    
            //                         <h5 class="f-w-700 progress-label pb-2 d-flex justify-content-between align-items-center" style='color: rgba(240,240,240)'>${meetCount}<small style="font-size: 13px;">${(data.meet.length > 0)?(meetCount * 100 / data.meet.length).toFixed(2):0.00} %</small></h5>
            //                     </div>
            //                 </div>
                            
            //             </div>`
                        
            //             $('.statistics-display').html(content)

            //         },
            //         error: function (data, textStatus, errorThrown) {
            //             console.log(data);

            //         }
            //     })
                
            // })
        })
    </script>

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
        
        
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table mr-1"></i>
                Appointment Requests
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                        <thead class="thead-dark">
                            <tr>
                                <th>id</th>
                                <th>Name</th>
                                <th>Passport Number</th>
                                <th>Date Requested</th>
                                <th>Entry Date</th>
                                <th>NATIONALITY</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                        
                            </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table mr-1"></i>
                Past Meetings
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                        <thead class="thead-dark">
                            <tr>
                                <th>id</th>
                                <th>Name</th>
                                <th>Passport Number</th>
                                <th>Date Requested</th>
                                <th>Entry Date</th>
                                <th>NATIONALITY</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                        
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script defer src='asset/js/custom_select.js'></script>
        
           
@endsection