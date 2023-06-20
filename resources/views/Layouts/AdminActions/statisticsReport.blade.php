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

.progresss {
   height: 10px;
   overflow: visible;
   margin-top: 30px;
   background: rgba(110,110,110,.2);
   border-radius: 20px;
}

.progresss .progress-bar {
   position: relative;
   overflow: visible !important;
   background: red;
}

.progresss .progress-bar {
   height: 100%;
   color: inherit;
   border-radius:20px
}

.bg-c-red {
   background: #FF5370;
}

.progresss .progress-bar.bg-c-red:after {
   border: 3px solid #FF5370;
}

.progresss .progress-bar:before {
    content: attr(data-progress);
   background: rgba(110,110,110,.4);
   position: absolute;
   right: -35px;
   top: -30px;
   width: 50px;
   height: 20px;
   font-size: 12px;
   overflow: hidden;
   padding: 2px;
   display: flex;
   align-items: center;
   justify-content: center;
   border-radius: 5px;
   border: 1px solid rgba(110,110,110,.4)
}
.progresss .progress-bar:after {
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

.progresss .progress-bar.bg-c-blue:after {
   border: 3px solid #4099ff;
}

.progresss .progress-bar.bg-c-green:after {
   border: 3px solid #2ed8b6;
}

.bg-c-green {
   background: #2ed8b6;
}

.bg-c-yellow {
   background: #FFB64D;
}

.progresss .progress-bar.bg-c-yellow:after {
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
 body{
    padding: 10px;
 }
 .data-statistics{
    width: 90%;
    border: 1px solid rgba(110,110,110,.4);
    /* box-shadow: 0 0 10px rgba(110,110,110,.4); */
    padding: 10px;
    margin: 20px auto;
    border-radius: 10px
 }
 .year_details{
    font-size: 12px;
    font-family: 'Gill Sans';
 }

 .container{
    min-height: 200px;
    border-left: 1px solid grey;
    border-bottom: 1px solid grey;
    position: relative;
}
/* .months-row-bottom */
.months-row-bottom, .months-col{
    margin:0;
	padding:0;
	list-style-type: none;
	display: table;
	table-layout: fixed;
	width: 100%;
}
.months-row-bottom span , .months-col span{
    display: table-cell;
    text-align: center;
    vertical-align: bottom
}
.months-col{
    /* background: grey; */
    position: absolute;
    bottom: 0;
    left: 0;
}

    </style>
    <script
src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js">
</script>
</head>
<body id='pdf_data' style='display:flex; flex-direction:column; justify-content:space-between;'>
    
    <div class='loadData'>
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
            @php $itemsData = [
                ['name'=>'Kpps','data'=>json_decode($data["kpps"])],
                ['name'=>'Visa Extensions','data'=>json_decode($data["ex"])],
                ['name'=>'Buddies','data'=>json_decode($data["bd"])],
                ['name'=>'Meetings','data'=>json_decode($data["meet"])]
                ]; 
            @endphp
            <script defer>
                const xValues = ["Jan", "Feb", "Mar", "Apr", "May", "Jun","Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
                let yValuesReq, yValuesApp, ReqMaxNo, AppMaxNo;
            </script>
            @foreach($itemsData as $item)
            <div class="data-statistics" style='display:flex; justify-content: space-between'>
                @php $kppCount = 0; $ValApp = [0,0,0,0,0,0,0,0,0,0,0,0]; $ValReq = [0,0,0,0,0,0,0,0,0,0,0,0]; @endphp
                @php $month = ["Jan", "Feb", "Mar", "Apr", "May", "Jun","Jul", "Aug", "Sep", "Oct", "Nov", "Dec"]; @endphp
                <div class="" style='width:100%; padding: 0 10px;'>

                    <div class='chart-display'>
                        <div class='container'>
                            <div class='months-col'>
                                <span>Jan</span>
                                <span style='height: 100px; border-top: 1px solid grey; background: red;'>Feb</span>
                                <span style='height: 50px; border-top: 1px solid grey; background: yellow;'>Mar</span>
                                <span>Apr</span>
                                <span>May</span>
                                <span>Jun</span>
                                <span>Jan</span>
                                <span>Feb</span>
                                <span>Mar</span>
                                <span>Apr</span>
                                <span>May</span>
                                <span>Jun</span>
                            </div>
                        </div>
                        <div class='months-row-bottom'>
                                <span>Jan</span>
                                <span>Feb</span>
                                <span>Mar</span>
                                <span>Apr</span>
                                <span>May</span>
                                <span>Jun</span>
                                <span>Jan</span>
                                <span>Feb</span>
                                <span>Mar</span>
                                <span>Apr</span>
                                <span>May</span>
                                <span>Jun</span>
                            </div>
                    </div>
                
                    <strong style="font-family: 'Gill Sans'; font-size: 12px;">Year Analysis</strong>
                    <div class='year_details'>
                        <p>Total number of Students registered: <span style='font-weight: bold; margin-left:10px;'>{{$NoStudents}}</span></p>
                        <p>Total number of request placed: <span style='font-weight: bold; margin-left:10px;'>{{sizeOf($item["data"])}}</span></p>
                        <p>Percentage: <span style='font-weight: bold; margin-left:10px;'>{{round(sizeOf($item["data"])*100/$NoStudents,1)}}%</span></p>
                    </div>
                </div>
                <div class="" style='width:100%; padding: 0 10px;'>
                    <canvas id="approved_{{str_replace(' ','_',$item['name'])}}" style="width:100%;max-width:700px"></canvas>
                    @foreach($item["data"] as $v)
                        @if(array_key_exists('application_status',(array)$v))
                            @php $month = (int) explode('-',$v->application_date)[1]-1; @endphp
                            @if($v->application_status === 'approved')
                                @php $kppCount = $kppCount + 1; 
                                $ValApp[$month]=$ValApp[$month]+1;
                                @endphp
                            @endif
                            @php $ValReq[$month]=$ValReq[$month]+1; @endphp
                        @endif
                        @if(array_key_exists('status',(array)$v))
                            @if(array_key_exists('request_date',(array)$v))
                                @php $month = (int) explode('-',$v->request_date)[1]-1; @endphp
                                @if($v->status === 'approved')
                                    @php $kppCount = $kppCount + 1; 
                                    $ValApp[$month]=$ValApp[$month]+1;
                                    @endphp
                                @endif
                                @php $ValReq[$month]=$ValReq[$month]+1; @endphp
                            @endif
                            @if(array_key_exists('booked_date_time',(array)$v))
                                @php $month = (int) explode('-',$v->booked_date_time)[1]-1; @endphp
                                @if($v->status === 'approved')
                                    @php $kppCount = $kppCount + 1; 
                                    $ValApp[$month]=$ValApp[$month]+1;
                                    @endphp
                                @endif
                                @php $ValReq[$month]=$ValReq[$month]+1; @endphp
                            @endif
                        @endif
                    @endforeach
                    <strong style="font-family: 'Gill Sans'; font-size: 12px;">Year Analysis</strong>
                    <div class='year_details'>
                        <p>Total number of request placed: <span style='font-weight: bold; margin-left:10px;'>{{sizeOf($item["data"])}}</span></p>
                        <p>Total number of request approved: <span style='font-weight: bold; margin-left:10px;'>{{$kppCount}}</span></p>
                        <p>Percentage: <span style='font-weight: bold; margin-left:10px;'>{{round($kppCount*100/sizeOf($item["data"]),1)}} %</span></p>
                    </div>
                </div>
            </div>
    
            <script defer>
                
                yValuesReq =  JSON.parse('{{json_encode($ValReq)}}');
                yValuesApp =  JSON.parse('{{json_encode($ValApp)}}');
                ReqMaxNo = (Math.max(...yValuesReq) < 10)? 10: Math.max(...yValuesReq)
                AppMaxNo = (Math.max(...yValuesApp) < 10)? 10: Math.max(...yValuesApp)
    
                new Chart("request_{{str_replace(' ','_',$item['name'])}}", {
                type: "line",
                data: {
                    labels: xValues,
                    datasets: [{
                    fill: false,
                    lineTension: 0,
                    backgroundColor: "rgba(0,0,255,1.0)",
                    borderColor: "rgba(0,0,255,0.1)",
                    data: yValuesReq
                    }]
                },
                options: {
                    legend: {display: false},
                    title:{
                        display: true,
                        text: "{{$item['name'].' '.$year.' Requests'}}"
                    },
                    scales: {
                    yAxes: [{ticks: {min: 0, max:ReqMaxNo}}],
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
                    backgroundColor: "rgba(0,0,255,1.0)",
                    borderColor: "rgba(0,0,255,0.1)",
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
        <div style='border-top: 1px solid rgba(110,110,110,.75); '>
            <small class="mb-0"><strong>Report Generated on</strong>: <?php echo date('d.m.Y'); ?></small><br>
            <small><strong>Time Generated </strong>: <?php date_default_timezone_set("Africa/Nairobi"); echo date("h:i:sa");?></small><br>
            <small><strong>Generated By </strong>: {{ Auth::user()->other_names}}</small>
        </div>
        
    </div>

    
</body>
</html>
<script src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>
<script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
<script defer>
    function parseHTML(html) {
        var t = document.createElement('template');
        t.innerHTML = html;
        return t.content;
    }
    // function downloadimage() {
        // const data = document.querySelector('body')

        // html2canvas(data, {
        //     useCORS: true,
        //     allowTaint: true,
        // }).then((canvas) => {
        //     let form = `<form method='post' action="{{route('add.stat')}}" class='pp'> @csrf
        //         <input type='hidden' name='year' value='{{$year}}'/>
        //         <input type='hidden' id='to_download' name='data' />
        //         <input type='submit' value='Print' style='border-radius:5px; border: none; background: green; text-align:center; padding: 5px;'/>
        //     </form>`
        //     let image = new Image();
        //     image.src = canvas.toDataURL('image/jpg',1.0);
        //     document.querySelector('body').innerHTML=''

        //     document.querySelector('body').append(parseHTML(form))
        //     document.querySelector('body').appendChild(image)
        //     // document.querySelector('#to_download').value= document.querySelector('.loadData').outterHTML.toString()

            
        // });



    // $(document).ready(function(){
    //     $('.pp').on('click',function(e){
    //         e.preventDefault()

    //         $.ajax({
    //             type:'post',
    //             url:'/StatReport',
    //             data: {year:'{{$year}}', data:$('html').html()},
    //             success: function(res){
    //                 console.log(res);
    //             }
    //         })
    //         // console.log('pass');
    //     })
    // })
        // function GetData(){
        //     console.log(document.querySelector('html').outerHTML);
        // }
        // alert('Pass')
    // }
    // // document.querySelector('button').addEventListener('click',)
    // window.onload=downloadimage

</script>