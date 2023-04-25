<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard || Student</title>
        <link href="../../asset/css/styles.css" rel="stylesheet"/>
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
        
    <style>
    
    </style>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark position-relative d-flex justify-content-end">
            <button class="btn btn-link btn-sm order-1 bg-light" id="sidebarToggle" href="#"><i class="fas fa-bars"  style='color:rgb(58,93,174);'></i></button>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">
                    <div class="d-flex flex-column mt-6">
                        <div class="dropbtn d-flex align-self-center justify-content-center mx-2" style="border:1px solid rgba(110,110,110,.6); width:80px; height:80px; border-radius:50%; object-fit:contain; overflow:hidden;" role="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img style="width:100%;" src="asset/img/logo.png" />
                        </div>
                        <div class=' d-flex flex-column'>
                            <span class="pt-2" style='font-weight:bolder; text-align:center;'>{{Auth::user()->surname.' '.explode(' ',Auth::user()->other_names)[0]}}</span>
                            <small class='mt-2 border-bottom py-2 px-3' data-toggle="modal" data-target="#MyProfile_{{Auth::user()->id}}" role='button' style='color: rgba(110,110,110,.5)'>View profile</small>
                        </div>
                    </div> 
                    <div class="sb-sidenav-menu d-flex flex-column justify-content-between">
                        <div class="nav">

                                <a class="nav-link" href="{{ __('dashboard')}}">
                                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                    Dashboard
                                </a>
                                <!-- Add a student list controller and view page-->
                                <a class="nav-link" href="{{ __('MykppApplications')}}">
                                    <div class="sb-nav-link-icon"><i class="fas fa-list"></i></div>
                                    My Student Pass Applications.
                                    @if($NoKpps > 0)
                                        <span class="badge badge-warning ml-2">{{$NoKpps}}</span>
                                    @endif
                                </a>
                                <a class="nav-link" href="{{ __('MyvisaextApplications')}}">
                                    <div class="sb-nav-link-icon"><i class="fas fa-list"></i></div>
                                    My Visa Extension Requests.
                                    @if($NoExt > 0)
                                        <span class="badge badge-warning ml-2">{{$NoExt}}</span>
                                    @endif
                                </a>
                                <a class="nav-link" href="{{ __('BuddyProgram')}}">
                                    <div class="sb-nav-link-icon"><i class="fas fa-clipboard-list"></i></div>
                                    Buddy Program
                                </a> 
                                <!-- Add a student list controller and view page-->
                                <a class="nav-link" href="{{ __('ApplyKpp')}}">
                                    <div class="sb-nav-link-icon"><i class="fas fa-marker"></i></div>
                                    Initiate a student pass Application.
                                </a>
                                <a class="nav-link" href="{{ __('ApplyVisa')}}">
                                    <div class="sb-nav-link-icon"><i class="fas fa-plus"></i></div>
                                    Initiate a Visa Extension Application.
                                </a>
                                
                                <div class="nav-link" role='button' data-toggle="modal" data-target="#BookMeeting_{{Auth::user()->id}}">
                                    <div class="sb-nav-link-icon"><i class="fas fa-plus"></i></div>
                                    Book Meeting
                                    @if(sizeOf($NoBooking) > 0)
                                        <span class="badge badge-warning ml-2">{{sizeOf($NoBooking)}}</span>
                                    @endif
                                </div>
                        </div>
                        <a class="sb-sidenav-footer bg-danger out w-100" style='color:white' href="{{ __('logout')}}">Logout</a>
                        
                    </div>
                </nav>
            </div>


             
            
               <div id="layoutSidenav_content">
                </main>
                @yield('content')
                </main>

                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy;Office of the International Students Affairs <?php echo date('Y'); ?></div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>

        <div class="modal fade " id="MyProfile_{{Auth::user()->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h4 class="modal-title w-100 font-weight-bold">{{Auth::user()->surname.' '.Auth::user()->other_names}}</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <i class="fas fa-table mr-1"></i>
                        Student Details
                        </div>
                        <div class="card-body">

                            <form method="POST" action="{{route('add.editMyProfile')}}">
                                @csrf
                                <input type="hidden" name="cr_id" value="{{Auth::user()->id}}">
                                
                                <div class="row">
                                    <div class='col'>
                                        <label for="surname">surname</label>
                                        <input type="text" class="form-control" name="sname" id="surname" value="{{Auth::user()->surname}}">
                                    </div>
                                    <div class='col'>
                                        <label for="othernames">other_names</label>
                                        <input type="text" class="form-control" name="oname" id="othernames" value="{{Auth::user()->other_names}}">
                                    </div>
                                    <div class='col'>
                                        <label for="email">email</label>
                                        <input type="text" class="form-control" name="email" id="email" value="{{Auth::user()->email}}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <label for="id">Admission No:</label>
                                        <input type="text" class="form-control" name="u_id" id="id" aria-describedby="idHelp" value="{{Auth::user()->id}}">
                                    </div>
                            @if($userData)
                                    <div class="col">
                                        <label for="phone_no">phone number</label>
                                        <input type="text" class="form-control" name="phone" id="phone_no" value="{{$userData['phone_number']}}">
                                    </div>
                                    <div class="col">
                                        <label for="residence">Residence</label>
                                        <input type="text" class="form-control" name="residence" id="residence" value="{{$userData['residence']}}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <label for="faculty">faculty</label>
                                        <input type="text" class="form-control" name="faculty" id="faculty" value="{{$userData['faculty']}}">
                                    </div>
                                    <div class="col">
                                        <label for="course">course</label>
                                        <input type="text" class="form-control" name="course" id="course" value="{{$userData['course']}}">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col">
                                        <label for="nationality">nationality</label>
                                        <input type="text" class="form-control" name="country" id="nationality" value="{{$userData['nationality']}}">
                                    </div>
                                    <div class="col">
                                        <label for="passport_no">passport Number</label>
                                        <input type="text" class="form-control" name="passNo" id="passport_no" value="{{$userData['passport_number']}}">
                                    </div>
                                    <div class="col">
                                        <label for="passport_ex">passport expire date</label>
                                        <input type="text" class="form-control" name="passEx" id="passport_ex" value="{{$userData['passport_expire_date']}}">
                                    </div>
                            @endif
                                </div>
                                <span class='btn btn-warning' id='change_pass' role='button'>Change Password</span>
                                <input type="hidden" name="is_change_active" id="is_change_active" value="false">
                                
                                <div class='pass-change-form'>
                                    <div class='col'>
                                        <label for="old_pass">Old Password</label>
                                        <input type="password" class="form-control" name="old_pass" id="old_pass" disabled>
                                    </div>
                                    <div class="form-group  d-flex justify-content-between">

                                        <div class='col'>
                                            <label for="new_pass">New Password</label>
                                            <input type="password" class="form-control" name="new_pass" id="new_pass" disabled>
                                        </div>
                                        <div class='col'>
                                            <label for="conf_pass">Confirm Password</label>
                                            <input type="password" class="form-control" name="conf_pass" id="conf_pass" disabled>
                                        </div>
                                        
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-info w-100" id='alterChanges'>Submit</button>
                            </form>
                            
                        </div>
                    </div>
                    <br/>
                </div>
            </div>
        </div>
        <div class="modal fade " id="BookMeeting_{{Auth::user()->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h4 class="modal-title w-100 font-weight-bold">Book a Meeting</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            
                            <div class="date-picker">
                                <div class="row">
                                    <button class="btn btn-trnasparent outline-none col prev"><i class="fas fa-angle-left"></i></button>
                                    <div class="col-6 month text-center">April</div>
                                    <div class="col year">2023</div>
                                    <button class="btn btn-trnasparent outline-none col next"><i class="fas fa-angle-right"></i></button>
                                </div>
                                <div class="row days_title"></div>
                                <div class="content days"></div>
                            </div>
                            <div class='container'>
                                <form action="{{route('add.bookMeeting')}}" method="post"> @csrf
                                    <div class="row row-cols-auto my-2 get-selected-dates"></div>
                
                                    <input type="hidden" name="selected_date_data" id='selected_date_data' value='[]'>
                                    <input class="btn btn-info w-100 align-self-center" id='save_schedule' type="submit" value="Book Now">
                                </form>
                            </div>
                            <div class='container my-4'>
                                <span class='p-2 rounded mb-5' style=' background: #113C7A; color:#fff; font-size: 15px; font-weight: bolder;'>My Appointment</span>
                                @php $aptmnt = explode(" ",$NoBooking[0]->booked_date_time); @endphp
                                <div class="d-flex justify-content-between my-3">
                                    <span class='mr-4' style='font-size: 20px; font-weight: bolder;'>
                                    {{date('Y-M-d',strtotime($aptmnt[0]))}}
                                    </span>
                                    <div class='badge badge-warning d-flex justify-content-center align-items-center'>
                                        <i class="fa fa-clock"></i>
                                        <span class='ml-2'>{{$aptmnt[1]}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
                        <script defer>

                            

                            function ToggleScheduleView(e){
                                let dataPicker = document.querySelector('.append-schedule')
                                if(dataPicker.classList.contains('d-none')){
                                    dataPicker.classList.remove('d-none','fade')
                                    dataPicker.classList.add('d-block')

                                    document.querySelector('#sched_title').innerHTML = 'Hide Schedule'
                                    document.querySelector('#btn_schd_icon').innerHTML = 'remove'
                                    document.querySelector('#btn_schd_icon').style.color = 'var(--danger)'
                                }else{
                                    dataPicker.classList.remove('d-block')
                                    dataPicker.classList.add('d-none','fade')
                                    
                                    document.querySelector('#sched_title').innerHTML = 'Add Schedule'
                                    document.querySelector('#btn_schd_icon').innerHTML = 'add'
                                    document.querySelector('#btn_schd_icon').style.color = 'var(--success)'
                                }
                            }
                            const monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun","Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
                            const Days = ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri","Sat"];
                            const Time = ["8am","9am","10am","11am","12pm","1pm","2pm","3pm","4pm","5pm"];

                            const datePicker = document.querySelector('.date-picker');
                            const prevBtn = datePicker.querySelector('.prev');
                            const nextBtn = datePicker.querySelector('.next');
                            const month = datePicker.querySelector('.month');
                            const year = datePicker.querySelector('.year');
                            const days_title = datePicker.querySelector('.days_title');
                            const daysGrid = datePicker.querySelector('.days');

                            let currentDate = new Date();
                            let TodayDate = new Date();

                            let availableDays=JSON.parse('{!! json_encode($availability) !!}')

                            let bookedDays = []
                            let allSelectedContainer = document.querySelector('.get-selected-dates')
                            let allSelectedInput = document.querySelector('#selected_date_data')

                        
                            
                            prevBtn.addEventListener('click', () => {
                            currentDate.setMonth(currentDate.getMonth() - 1);
                            daysGrid.innerHTML=''
                            renderCalendar();
                            });

                            nextBtn.addEventListener('click', () => {
                            currentDate.setMonth(currentDate.getMonth() + 1);
                            daysGrid.innerHTML=''
                            renderCalendar();
                            });

                            for(let a of Days){
                                let D = document.createElement('strong')
                                D.classList.add('col')
                                D.classList.add('text-center')
                                D.classList.add('py-2')
                                D.innerHTML= a
                                days_title.appendChild(D)
                            }

                            function renderCalendar() {
                                let firstDayOfMonth = new Date(currentDate.getFullYear(), currentDate.getMonth(), 1);
                                let lastDayOfMonth = new Date(currentDate.getFullYear(), currentDate.getMonth() + 1, 0);
                                let firstDayOfWeek = firstDayOfMonth.getDay();
                                let lastDayOfWeek = lastDayOfMonth.getDay();
                                
                                month.textContent = monthNames[currentDate.getMonth()];
                                year.textContent = currentDate.getFullYear();
                                let count=''
                                let allDays=[]
                                let GroupAllDays=[]

                                for (let i = 0; i < firstDayOfWeek; i++) {
                                    allDays.push(0)
                                }
                                for (let i = 1; i <= lastDayOfMonth.getDate(); i++) {
                                    allDays.push(i)
                                }
                                for (let i = lastDayOfWeek; i < 6; i++) {
                                    allDays.push(0)
                                }

                                for(let d=0; d<allDays.length;d++){
                                    let week = []
                                    if((d+1)%7 == 0){
                                        GroupAllDays.push(week)
                                    }    
                                }
                                let i = 0
                                for(let d=0; d<allDays.length;d++){
                                    if((d+1)%7 == 0){
                                        GroupAllDays[i].push(allDays[d])
                                        i = i+1
                                    }else{
                                        GroupAllDays[i].push(allDays[d])
                                    }
                                }

                                for(let x in GroupAllDays){
                                    let week=document.createElement('div')
                                    week.classList.add('row')
                                    let y =''
                                    let day = document.createElement('div')
                                    for(let m of GroupAllDays[x]){
                                        let this_day = document.createElement('div')
                                        let dropdownContainer = document.createElement('div')
                                        let dropdownList = document.createElement('div')
                                        let ListContainer = document.createElement('ul')

                                        
                                        let Timeicon = document.createElement('i')
                                        Timeicon.classList.add('fa','fa-clock','sched-time','position-absolute','dropdown-toggle')
                                        Timeicon.setAttribute('data-toggle','dropdown')
                                        Timeicon.setAttribute('aria-haspopup','true')
                                        Timeicon.setAttribute('aria-expanded','false')
                                        Timeicon.setAttribute('role','button')
                                        Timeicon.setAttribute('id',`timebtn_${year.textContent}_${month.textContent}_${m}`)
                                        dropdownContainer.classList.add('dropdown')
                                        dropdownContainer.style.display='none'

                                        this_day.innerHTML= parseInt(m)>0 ? m :''
                                        dropdownList.classList.add('dropdown-menu')
                                        dropdownList.setAttribute('aria-labelledby',`timebtn_${year.textContent}_${month.textContent}_${m}`)
                                        this_day.classList.add('col','text-center','border','py-3','position-relative','day-disabled')
                                        
                                        parseInt(m)>0 ? this_day.classList.add('day-btn') :''

                                        for(let t of Time){
                                            let div = document.createElement('div')
                                            let leb = document.createElement('label')
                                            let check = document.createElement('input')
                                            
                                            check.setAttribute('disabled',true)
                                            check.setAttribute('onClick','TimeCheck(event,this)')
                                            check.setAttribute('type','checkBox')
                                            check.setAttribute('data-time-check',`time_${t}_${year.textContent}_${month.textContent}_${m}`)
                                            check.setAttribute('id',`${year.textContent}_${month.textContent}_${m}`)
                                            check.value= t.toLowerCase()
                                            
                                            leb.innerHTML= t.toUpperCase()
                                            leb.classList.add('form-check-label','m-0','px-2')

                                            leb.setAttribute('for',`id_${t}`)
                                            div.classList.add('dropdown-item','form-check','d-flex','align-items-center','px-4')
                                            div.append(check,leb)

                                            dropdownList.appendChild(div)
                                        }
                                        
                                        if(TodayDate.getMonth() <= monthNames.indexOf(month.textContent) && TodayDate.getYear()<=currentDate.getYear()){
                                            if(TodayDate.getMonth() === monthNames.indexOf(month.textContent) && TodayDate.getDate() > parseInt(m)){
                                                this_day.classList.add('day-disabled')
                                            }else{
                                                parseInt(m)>0 ? this_day.setAttribute('onClick',"GetClickedDay(event,this)") :''
                                                parseInt(m)>0 ? this_day.setAttribute('data-day',`${year.textContent}_${month.textContent}_${m}`) :''
                                                parseInt(m)>0 ? this_day.setAttribute('role','button') :''
                                            }
                                        }else{
                                            this_day.classList.add('day-disabled')
                                        }

                                        parseInt(m)>0 ? dropdownContainer.appendChild(Timeicon) :''
                                        parseInt(m)>0 ? dropdownContainer.appendChild(dropdownList) :''
                                        parseInt(m)>0 ? this_day.appendChild(dropdownContainer) :''

                                        week.appendChild(this_day);
                                    }
                                    daysGrid.appendChild(week)
                                }
                                SaveScheduleBtn()
                            }
                            function SaveScheduleBtn(){
                                // let TimeSelect = document.querySelector('#save_schedule').previousElementSibling.previousElementSibling.querySelector('select')
                                // if(TimeSelect){
                                    if(JSON.parse(document.querySelector('#selected_date_data').value).length < 1 ){
                                        document.querySelector('#save_schedule').disabled = true
                                    }
                                    else{
                                        document.querySelector('#save_schedule').disabled = false
                                    }
                                // }else{
                                //     document.querySelector('#save_schedule').disabled = true
                                // }
                            }

                            renderCalendar();

                        
                            

                            function CheckExistance(bookedDays,item){
                                for(let a=0; a<bookedDays.length; a++){
                                    for(let i=0; i<bookedDays[a].length; i++){
                                        if(bookedDays[a][i][0] === item){
                                            return i
                                        }
                                    }
                                }
                            }
                            function TimeCheck(e,item){
                                if(e.target === item){
                                    // if(item.classList.contains('active')){
                                    //     item.classList.remove('active')
                                    //     bookedDays[CheckExistance(bookedDays,item.getAttribute('id'))][1].splice(bookedDays[CheckExistance(bookedDays,item.getAttribute('id'))][1].indexOf(item.value),1)

                                    // }else{
                                    // }
                                    console.log();
                                    item.classList.add('active')
                                    if(bookedDays[CheckExistance(bookedDays,item.getAttribute('id'))][1].indexOf(item.getAttribute('id')) < 0){
                                        bookedDays[CheckExistance(bookedDays,item.getAttribute('id'))][1].push(item.value)
                                    }
                                }
                                DisplaySelected()
                                // console.log(availableDays);
                            }
                            function DisplaySelected(){
                                let SelectedResult =''

                                for(let i in bookedDays){
                                    let item = `<div class="col shadow p-2 m-2 rounded d-flex flex-column align-items-center"> 
                                    <p class="flex-grow-1 py-2">${bookedDays[i][0].replaceAll('_','-')}</p>
                                    <div class="row row-cols-auto">`
                                    
                                    if(bookedDays[i][1].length > 0){
                                        item += `<select class="form-control" name="time_selected" required>`
                                        item += `<option value=''>select time</option>`
                                        for(let x of bookedDays[i][1]){
                                            // if()
                                            item += `<option value="${x}">${x}</option>`
                                        }
                                        item += `</select>`
                                    }
                                    item += `</div></div>`
                                    SelectedResult += item
                                }
                                allSelectedContainer.innerHTML=SelectedResult
                                allSelectedInput.value= bookedDays[0][0]
                                SaveScheduleBtn()
                            }
                            function GetClickedDay(e,item){
                                if(e.target === item){
                                    // if(item.classList.contains('active')){
                                    //     item.querySelector('.dropdown').style.display='none'
                                    //     item.classList.remove('active')
                                    //     bookedDays.splice(CheckExistance(bookedDays,item.getAttribute('data-day')),1)
                                    // }else{
                                        bookedDays=[];
                                        bookedDays.push([item.getAttribute('data-day'),JSON.parse(item.getAttribute('data-time'))])
                                        item.classList.add('active')
                                        item.querySelector('.dropdown').style.display='block'
                                        // if(bookedDays[0].indexOf(item.getAttribute('data-day')) == -1){
                                        //     // if(bookedDays.indexOf(item.getAttribute('data-day')) < 0){
                                        //     // }
                                        // }else{
                                        //     item.classList.remove('active')
                                        // }
                                    // }
                                }
                                DisplaySelected()
                                
                                console.log(bookedDays);
                            }

                            $(document).ready(function() {
                                // console.log(availableDays);

                                
                                // selectedTime.on('change',function(){
                                    //     if($(this).val()==''){
                                        //         $('#save_schedule').prop('disabled',true)
                                        //     }else{
                                            //         $('#save_schedule').prop('disabled',false)
                                            //     }
                                // })
                                
                                
                                setInterval(() => {
                                    let selectedTime = $('#save_schedule').siblings('.get-selected-dates').find('select')
                                    
                                    if(selectedTime.length > 0){
                                        if(selectedTime.find(':selected').val() == ""){
                                            $('#save_schedule').attr('disabled',true)
                                        }else{
                                            $('#save_schedule').attr('disabled',false)
                                        }
                                        
                                    }else{
                                        $('#save_schedule').attr('disabled',false)
                                    }
                                    if(availableDays.length > 0){
                                        for(let n in availableDays){
                                            for(let x in availableDays[n][2]){
                                                $('body').find(`[data-day='${availableDays[n][2][x][0]}']`).removeClass('day-disabled')
                                                $('body').find(`[data-day='${availableDays[n][2][x][0]}']`).attr('data-time',JSON.stringify(availableDays[n][2][x][1]))
                                                // $('body').find(`[data-day='${availableDays[n][2][x][0]}']`).removeClass('day-disabled')
                                                // $('body').find(`[data-day='${availableDays[n][2][x][0]}']`).addClass('active')
                                                // $('body').find(`[data-day='${availableDays[x][0]}']`).addClass('active')
                                                // $('body').find(`[data-day='${availableDays[x][0]}']`).find('.dropdown').css('display','block')
                                                
                                                for(let i of availableDays[n][2][x][1]){
                                                    $('body').find(`[data-time-check='time_${i}_${availableDays[n][2][x][0]}']`).attr('disabled',false)
                                                    // $('body').find(`[data-time-check='time_${i}_${availableDays[n][2][x][0]}']`).find('[value="i"]').addClass('active')
                                                }
                                            }
                                            // console.log(availableDays[n][2][0]);
                                        }
                                    }
                                    // for(let x in availableDays){
                                    //     $('body').find(`[data-day='${availableDays[x][0]}']`).addClass('active')
                                    //     $('body').find(`[data-day='${availableDays[x][0]}']`).find('.dropdown').css('display','block')
                                        
                                    //     for(let i of availableDays[x][1]){
                                    //         $('body').find(`[data-time-check='time_${i}_${availableDays[x][0]}']`).attr('checked',true)
                                    //         $('body').find(`[data-time-check='time_${i}_${availableDays[x][0]}']`).find('[value="i"]').addClass('active')
                                    //     }
                                    // }
                                },1000);
                            })
                        </script>
                    </div>
                    <br/>
                </div>
            </div>
        </div>
       
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

        <script src="../../asset/js/scripts.js"></script>
        <script src="../../asset/js/script.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="../../asset/assets/demo/chart-area-demo.js"></script>
        <script src="../../asset/assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="../../asset/assets/demo/datatables-demo.js"></script>

        <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
        <script defer>
            $(document).ready(function() {

                $('body').find('#alterChanges').on('click',function(e){
                    e.preventDefault()
                    let status = false;
                    if($('body').find('#change_pass').hasClass('active')){
                        $('body').find('#change_pass').siblings('.pass-change-form').find('input').each(function(){
                            if($(this).val() == ''){
                                status = true
                            }
                        })
                    }
                    if(status){
                        alert('Password fields are empty!')
                    }else{
                        $(this).parent().submit()
                    }
                })
                
                $('body').find('#change_pass').on('click',function(e){
                    if($(this).hasClass('active')){
                        $(this).removeClass('active')
                        $(this).siblings('#is_change_active').val(false)
                        $(this).siblings('.pass-change-form').find('input').attr('disabled',true)
                        $(this).siblings('.pass-change-form').find('input').val('')
                        $(this).text('Change Password').slow()
                    }else{
                        $(this).addClass('active')
                        $(this).siblings('#is_change_active').val(true)
                        $(this).siblings('.pass-change-form').find('input').attr('disabled',false)
                        $(this).text('Discard Change').slow()
                    }
                })

            })
        </script>
    </body>
</html>

