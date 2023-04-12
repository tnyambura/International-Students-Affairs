@extends('Layouts.AdminActions.adminMaster')
@section('content')
        <div class="container-fluid"><br/>
            @if(Session::has('success_schedule_save') )
            <div class="alert alert-success" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            {{Session::get('success_schedule_save')}}
            </div>
            @endif
            <div class="schedule-btn-toggle d-flex align-items-center btn border rounded mb-3" role='button' onclick="ToggleScheduleView(this)">
                <i class="material-icons" id='btn_schd_icon' style='color:var(--danger)'>remove</i>
                <span class='ml-2 fw-bold' id='sched_title'> Hide Schedule</span>
            </div>

            <div class="append-schedule">
                <div class="date-picker">
                    <div class="row">
                        <button class="col prev"><i class="fas fa-angle-left"></i></button>
                        <div class="col-6 month">April</div>
                        <div class="col year">2023</div>
                        <button class="col next"><i class="fas fa-angle-right"></i></button>
                    </div>
                    <div class="row days_title"></div>
                    <div class="content days"></div>
                </div>
                <div class='container'>
                    <form action="{{route('add.saveSchedule')}}" method="post"> @csrf
                        <div class="row row-cols-auto my-2 get-selected-dates"></div>
    
                        <input type="hidden" name="selected_date_data" id='selected_date_data' value='[]'>
                        <input class="btn btn-info w-100 align-self-center" id='save_schedule' type="submit" value="Save">
                    </form>
                </div>
            </div>
            
        </div><br/>

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
            const monthNames = ["January", "February", "March", "April", "May", "June",
            "July", "August", "September", "October", "November", "December"
            ];
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

            let availableDays=JSON.parse('{!! json_encode($schedule_list) !!}')
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
                        this_day.classList.add('col','text-center','border','py-3','position-relative')
                        
                        parseInt(m)>0 ? this_day.classList.add('day-btn') :''

                        for(let t of Time){
                            let div = document.createElement('div')
                            let leb = document.createElement('label')
                            let check = document.createElement('input')

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
                            parseInt(m)>0 ? this_day.setAttribute('onClick',"GetClickedDay(event,this)") :''
                            parseInt(m)>0 ? this_day.setAttribute('data-day',`${year.textContent}_${month.textContent}_${m}`) :''
                            parseInt(m)>0 ? this_day.setAttribute('role','button') :''
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
                if(JSON.parse(document.querySelector('#selected_date_data').value).length < 1){
                    document.querySelector('#save_schedule').disabled = true
                }else{
                    document.querySelector('#save_schedule').disabled = false
                }
            }

            renderCalendar();

        
            

            function CheckExistance(availableDays,item){
                for(let i=0; i<availableDays.length; i++){
                    if(availableDays[i][0] === item){
                        return i
                    }
                }
            }
            function TimeCheck(e,item){
                if(e.target === item){
                    if(item.classList.contains('active')){
                        item.classList.remove('active')
                        availableDays[CheckExistance(availableDays,item.getAttribute('id'))][1].splice(availableDays[CheckExistance(availableDays,item.getAttribute('id'))][1].indexOf(item.value),1)

                    }else{
                        item.classList.add('active')
                        if(availableDays[CheckExistance(availableDays,item.getAttribute('id'))][1].indexOf(item.getAttribute('id')) < 0){
                            availableDays[CheckExistance(availableDays,item.getAttribute('id'))][1].push(item.value)
                        }
                    }
                }
                DisplaySelected()
                // console.log(availableDays);
            }
            function DisplaySelected(){
                let SelectedResult =''

                for(let i in availableDays){
                    let item = `<div class="col shadow p-2 m-2 rounded d-flex flex-column align-items-center"> 
                    <p class="flex-grow-1 py-2">${availableDays[i][0].replaceAll('_','-')}</p>
                    <div class="row row-cols-auto">`
                    
                    if(availableDays[i][1].length > 0){
                        for(let x of availableDays[i][1]){
                            item += `<small class="col">${x}</small>`
                        }
                    }
                    item += `</div></div>`
                    SelectedResult += item
                }
                allSelectedContainer.innerHTML=SelectedResult
                allSelectedInput.value= JSON.stringify(availableDays)
                SaveScheduleBtn()
            }
            function GetClickedDay(e,item){
                if(e.target === item){
                    if(item.classList.contains('active')){
                        item.querySelector('.dropdown').style.display='none'
                        item.classList.remove('active')
                        availableDays.splice(CheckExistance(availableDays,item.getAttribute('data-day')),1)
                    }else{
                        item.classList.add('active')
                        item.querySelector('.dropdown').style.display='block'
                        if(availableDays.indexOf(item.getAttribute('data-day')) < 0){
                            availableDays.push([item.getAttribute('data-day'),[]])
                        }
                    }
                }
                DisplaySelected()
                
                // console.log(availableDays);
            }

            $(document).ready(function() {
                setInterval(() => {
                    for(let x in availableDays){
                        $('body').find(`[data-day='${availableDays[x][0]}']`).addClass('active')
                        $('body').find(`[data-day='${availableDays[x][0]}']`).find('.dropdown').css('display','block')
                        
                        for(let i of availableDays[x][1]){
                            $('body').find(`[data-time-check='time_${i}_${availableDays[x][0]}']`).attr('checked',true)
                            $('body').find(`[data-time-check='time_${i}_${availableDays[x][0]}']`).find('[value="i"]').addClass('active')
                        }
                    }
                },1000);
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
                    Booking Requests List
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Booked By</th>
                                    <th>Appointment On</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(sizeOf($bookingRequests) > 0)
                                    @foreach($bookingRequests as $bookRq)
                                        <tr>
                                            <td>{{$bookRq->id}}</td>
                                            <td>{{$bookRq->student_id}}</td>
                                            <td>{{$bookRq->booked_date_time}}</td>
                                            <td>{{$bookRq->status}}</td>
                                            <td><i class="fa fa-eye"></i></td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="5">No Booking Found</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

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
           
@endsection