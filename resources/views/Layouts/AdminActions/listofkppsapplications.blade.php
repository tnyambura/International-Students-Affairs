@extends('Layouts.AdminActions.adminMaster')
@section('content')
                    <div class="container-fluid"><br/>
                        <ol class="breadcrumb mb-4" style="background:#286DE7;">
                            <li class="breadcrumb-item active" style="color:white;">List of Student pass Application Requests</li>
                        </ol>
                       
                        
                       
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                               List of Student Pass Application Requests.
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>application id</th>
                                                <th>student id</th>
                                                <th>student names</th>
                                                <th>Passport Number</th>
                                                <th>Date Requested</th>
                                                <th>NATIONALITY</th>
                                                <th>status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>application id</th>
                                                <th>student id</th>
                                                <th>student names</th>
                                                <th>Passport Number</th>
                                                <th>Date Requested</th>
                                                <th>NATIONALITY</th>
                                                <th>status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            @foreach($data as $kpps)
                                                <tr>
                                                    <td> {{$kpps['id']}}</td>
                                                    <td> {{$kpps['student_id']}}</td>
                                                    <td> {{$kpps['surname'].' '.$kpps['other_names']}}</td>
                                                    <td> {{$kpps['passport_number']}}</td>
                                                    <td> {{$kpps['application_date']}}</td>
                                                    <td> {{$kpps['nationality']}}</td>
                                                    <td> {{$kpps['application_status']}}</td>
                                                    
                                                    <td>
                                                        @php $data= Crypt::encrypt($kpps['student_id']); @endphp                                                                                            

                                                        <!-- <a href="/NewKPPVIEW/{{$kpps['id']}}" target="blank">
                                                            <span class="fas fa-eye" aria-hidden="false"></span>
                                                        </a>  -->
                                                        <form method="POST" action="{{route('add.kppsStatusUpdate')}}">
                                                        @csrf
                                                            <input type='hidden' value='{{$kpps["id"]}}' name='app_id'/>
                                                            <select class="form-select form-select-lg mt-3 mb-3" id="application_status_select" width='100' name='status_select'>
                                                                @foreach($applicationStatus[0] as $option)
                                                                    @if(strtolower($option) == strtolower($applicationStatus[1]))
                                                                        <option selected value='{{$option}}' >{{$option}}</option>
                                                                    @else
                                                                        <option value='{{$option}}' >{{$option}}</option>
                                                                    @endif
                                                                @endforeach
                                                            </select>
                                                            <input class="btn btn-outline-info p-1 btn-block select-change-btn" id="application_status_submit" type="submit" value='save'/>

                                                            <script>
                                                                let currentSelected = '<?php echo strtolower($applicationStatus[1])?>'
                                                                let selectBox = document.querySelector('#application_status_select')
                                                                let statusBtn = document.querySelector('#application_status_submit')
                                                                selectBox.addEventListener('change',function(e){
                                                                    if(currentSelected !== e.target.value){
                                                                        statusBtn.classList.add("active")
                                                                    }else{
                                                                        statusBtn.classList.remove("active")
                                                                    }
                                                                })
                                                            </script>
                                                        </form>
                                                    </td>
                                                    
                                                </tr>
                                            @endforeach
                                          </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
               @endsection