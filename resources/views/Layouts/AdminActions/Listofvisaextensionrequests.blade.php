@extends('Layouts.AdminActions.adminMaster')
@section('content')
                    <div class="container-fluid"><br/>
                        <ol class="breadcrumb mb-4" style="background:#286DE7;">
                            <li class="breadcrumb-item active" style="color:white;">List Student Visa Extension Requests</li>
                        </ol>
                       
                        
                       
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                               List of Student Visa Extension Requests.
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="VisaTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Name</th>
                                                <th>Passport Number</th>
                                                <th>Date Requested</th>
                                                <th>Email</th>
                                                <th>Status</th>
                                                <th>Nationality</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>                                               
                                                <th>Id</th>
                                                <th>Name</th>
                                                <th>Passport Number</th>
                                                <th>Date Requested</th>
                                                <th>Email</th>
                                                <th>Status</th>
                                                <th>Nationality</th>
                                                <th>Actions</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            @foreach($visarequests as $visarequest)
                                                <tr>
                                                    <td> {{$visarequest['id']}}</td>
                                                    <td> {{$visarequest['student_id']}}</td>
                                                    <td> {{$visarequest['surname']}} {{$visarequest['other_names']}}</td>
                                                    <td> {{$visarequest['passport_number']}}</td>
                                                    <td> {{$visarequest['application_date']}}</td>
                                                    <td> {{$visarequest['application_status']}}</td>
                                                    
                                                    <td class="d-block">
                                                        @php $data= Crypt::encrypt($visarequest['student_id']); @endphp                                                                                            

                                                        <div class="d-flex justify-content-around">
                                                            <a href="/NewVISAVIEW/{{$visarequest['id']}}" target="blank">
                                                                <span class="fas fa-eye" aria-hidden="false"></span>
                                                            </a>
                                                        </div>
                                                        <form method="POST" action="{{route('add.extensionStatusUpdate')}}">
                                                        @csrf
                                                            <input type='hidden' value='{{$visarequest["id"]}}' name='app_id'/>
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