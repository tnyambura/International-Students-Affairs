@extends('Layouts.AdminActions.adminMaster',['title'=>'Add User','newVisaReq'=>$newVisaReq,'BdCountReq'=>$BdCountReq])
@section('content')
    <nav class="d-flex align-items-center top-title-sticky" style='position:sticky; top:0; z-index:2999; padding:8px; background:#fff; width:100%; height: 56px;'>
        <span>Add User</span>
    </nav>
    <div class="container-fluid"><br/>
            <ol class="breadcrumb mb-4 d-flex align-items-center" style="background: #113C7A;">
                <li class="breadcrumb-item active" style="color:white;">
                <div class="form-check form-check-inline">
                    <input class="form-check-input mr-2" type="checkbox" name="inlineRadioOptions" id="new_staff" value="new_staff">
                    <label class="form-check-label" for="new_staff">A New Staff</label>
                </div>
                </li>
            </ol> 
            @if(Session::has('New_User_Added') )
            <div class="alert alert-success" role="alert">
            {{Session::get('New_User_Added')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            @endif
            @if(Session::has('New_Student_Added'))
            <div class="alert alert-success" role="alert">
            {{Session::get('New_Student_Added')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            @endif
            @if(Session::has('New_User_failed'))
            <div class="alert alert-danger" role="alert">
            {{Session::get('New_User_failed')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            @endif
            @if(Session::has('New_Student_failed'))
            <div class="alert alert-danger" role="alert">
            {{Session::get('New_Student_failed')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            @endif
            @if(Session::has('email_send_success'))
            <div class="alert alert-success" role="alert">
            {{Session::get('email_send_success')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            @endif 
            @if(Session::has('email_send_fail'))
            <div class="alert alert-danger" role="alert">
            {{Session::get('email_send_fail')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            @endif 

            @php
            $facultiesArray = ['SCESA'];
            $coursesArray = ['BBIT','BCOM','DBIT'];
            @endphp


            <form method="POST" action="{{ __('AddUser') }}" class='new-staff-form'>
                @csrf

                <!-- surNAME -->
                <input type="hidden" name="status" value='active' />
                <div class="form-row">
                <div class="col-lg-6 mb-3">   
                    <label for="staff_surNAME">SURNAME</label>  
                    <input id="staff_surNAME" class="form-control" type="text" name="surNAME" required autofocus />
                </div></br>
                <!-- otherNAMES -->
                <div class="col-lg-6 mb-3">            
                <label for="staff_otherNAMES">OTHERNAMES</label>  
                    <input id="staff_otherNAMES" class="form-control" type="text" name="otherNAMES" required autofocus />
                </div></br>

                <!-- suID or Username -->
                <div class="col-lg-6 mb-3">            
                <label for="staff_suID">suID</label>  
                    <input id="staff_suID" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==8) return false;" class="form-control" type="number" name="id" required autofocus />
                </div></br>

                <!-- Email Address -->
                <div class="col-lg-6 mb-3">            
                <label for="staff_email">Email</label>  
                    <input id="staff_email" class="form-control" type="text" name="email" required autofocus />
                </div>
                <div class="col-lg-6 mb-3"> 
                <label for="role_id">Register as:</label>  
                    <select name="user_role" id='role_id' class="form-control">
                        @foreach($roles as $role)
                            <option value={{strtolower($role)}}> {{$role}} </option>
                        @endforeach
                    </select>

                </div></br>
                </div>
                <br/>
                <div class="form-row">

                    <div class="flex items-center justify-end mt-4">
                    <input class="btn btn-success" value="Save details" type="submit" />
                    
                    </div>
                </div>
            </form><br/>

            <ol class="breadcrumb mb-4" style="background: #113C7A;">
                <li class="breadcrumb-item active" style="color:white;">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input mr-2" type="checkbox" name="inlineRadioOptions" id="new_student" value="new_student">
                        <label class="form-check-label" for="new_student">A New Student</label>
                    </div>
                </li>
            </ol> 

            <form method="POST"  class='new-student-form' action="{{route('Add.signup')}}">
                @csrf
                <x-auth-validation-errors class="mb-4" :errors="$errors" />
                    <div class="form-row">
                        <div class="col-lg-4 mb-3">
                        <label for="surNAME">NOM (SURNAME)</label>
                        <input type="text" maxlength="50" class="form-control" name ="surNAME" id="surNAME" placeholder="Surname" autofocus required>
                        
                        </div>
                        <div class="col-lg-4 mb-3">
                            <label for="oNAME">Other Names</label>
                            <input type="text" maxlength="50" class="form-control" name ="otherNAMES" id="oNAME" placeholder="Other Names"
                            required>                                    
                        </div>                                  
                        <div class="col-lg-4 mb-3">
                            <label for="suID">Admission Number</label>
                            <input type="number" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==8) return false;" class="form-control" name ="id" id="suID" placeholder="Admission Number"required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-lg-4 mb-4">
                            <label for="gender">Gender</label>
                            <select class='form-control' name ="gender" id="gender" required>
                                <option value='m'>Male</option>
                                <option value='f'>Female</option>
                            </select>
                        </div>
                        <div class="col-lg-4 mb-3">
                            <label for="suEMAIL">Email Address</label>
                            <input type="text" class="form-control" name ="email" id="suEMAIL" placeholder="Email" required>
                        </div>
                        <div class="col-lg-4 mb-3">
                            <label for="phoneNUMBER">Kenyan Phone Number</label>
                            <input type="number" class="form-control" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==13) return false;" id="phoneNUMBER" name ="phoneNUMBER" placeholder="(+254) 700 000000" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-lg-6 mb-3">
                            <label for="Nationality">Country</label>
                            <select class='form-control' name ="Nationality" id="Nationality" required>
                                <option>--Select--</option>
                                @foreach($countries as $country)
                                    <option value='{{$country}}'>{{$country}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <label for="Residence">Residence</label>
                            <input type="text" class="form-control" maxlength="100" name ="Residence" id="Residence" placeholder="Residence" required>
                        </div> 
                    </div>
                    <div class="form-row">
                        <div class="col-lg-6 mb-3">
                            <label for="Course">Course</label>
                            <select class='form-control' name ="Course" id="Course" required>
                                <option>--Select--</option>
                                @foreach($coursesArray as $v)
                                    <option value='{{$v}}'>{{$v}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <label for="Faculty">Faculty</label>
                            <select class='form-control' name ="Faculty" id="Faculty" required>
                                <option>--Select--</option>
                                @foreach($facultiesArray as $v)
                                    <option value='{{$v}}'>{{$v}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-lg-6 mb-3">
                            <label for="passNo">Passport Number</label>
                            <input type="text" class="form-control" maxlength='15' id="passNo" name ="passport_number" placeholder="Passport Number" required>
                        </div>    
                        <div class="col-lg-6 mb-3">
                            <label for="passExp">Passport Expiry Date</label>
                            <input type="date" class="form-control" min='{{date("Y-m-d",strtotime("+1 year"))}}' id="passExp" name ="passport_expire" placeholder="Passport Expire Date" required />
                        </div>    
                    </div>

                    <div>
                        <h4>PARENTS DETAIL</h4>
                        <div class="form-check d-flex mb-4">
                            <input class="form-check-input me-2" type="checkbox" value="Applicable" id="notApplicable" />
                            <label class="form-check-label" for="notApplicable">
                                Not Applicable
                            </label>
                        </div>
                    </div>
                    <div class="form-row parent-details">
                        
                        <div class="col-lg-6 mb-3">
                            <label for="ParentEmail">Parent Email</label>
                            <input type="text" class="form-control" name ="ParentEmail" id="ParentEmail" placeholder="Parents Email" required>
                        </div>  
                        
                        <div class="col-lg-6 mb-3">
                            <label for="ParentPhone">Your parents Phone Number</label>
                            <input type="number" class="form-control" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==13) return false;" id="ParentPhone" name ="ParentPhone" placeholder="Parent Phone Number" required>
                        </div>
                        
                        <div class="col-lg-6 mb-3">
                            <label for="ParentNames">Your parents Names</label>
                            <input type="text" class="form-control" id="ParentNames" name ="ParentNames" placeholder="Full Names " required>
                        </div>
                    </div>
                    
                    <input class="btn btn-success" value="Save details" type="submit" />
            </form>
            <script>
                let staffCheckers = document.querySelector('#new_staff');
                let studentCheckers = document.querySelector('#new_student');
                let staffForm = document.querySelector('.new-staff-form');
                let studentForm = document.querySelector('.new-student-form');

                FormCheckers()
                staffCheckers.addEventListener('click',function(){
                    if(this.checked == true){
                        studentCheckers.checked=false
                        FormCheckers()
                    }else{
                        FormCheckers()
                    }
                })
                studentCheckers.addEventListener('click',function(){
                    if(this.checked == true){
                        staffCheckers.checked=false
                        FormCheckers()
                    }else{
                        FormCheckers()
                    }
                })

                function FormCheckers(){
                    if(staffCheckers.checked == true){
                        staffForm.querySelectorAll('input').forEach(element => {
                            element.disabled=false
                        });
                        staffForm.querySelectorAll('select').forEach(element => {
                            element.disabled=false
                        });
                    }else{
                        staffForm.querySelectorAll('input').forEach(element => {
                            element.disabled=true
                        });
                        staffForm.querySelectorAll('select').forEach(element => {
                            element.disabled=true
                        });
                    }
                    if(studentCheckers.checked == true){
                        studentForm.querySelectorAll('input').forEach(element => {
                            element.disabled=false
                        });
                        studentForm.querySelectorAll('select').forEach(element => {
                            element.disabled=false
                        });
                    }else{
                        studentForm.querySelectorAll('input').forEach(element => {
                            element.disabled=true
                        });
                        studentForm.querySelectorAll('select').forEach(element => {
                            element.disabled=true
                        });
                    }

                }
                
            </script>

        </div>   

        <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
    <script defer>
        $(document).ready(function() {
            $('#notApplicable').on('click',function(){
                if($(this).is(':checked')){
                    $(this).val('notApplicable')
                    $('.parent-details').find('input').prop('disabled',true)
                }else{
                    $(this).val('Applicable')
                    $('.parent-details').find('input').prop('disabled',false)
                }
            })
        })
    </script>
@endsection