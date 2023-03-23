@extends('Layouts.AdminActions.adminMaster')
@section('content')
                <div class="container-fluid"><br/>
                        <ol class="breadcrumb mb-4" style="background:#286DE7;">
                            <li class="breadcrumb-item active" style="color:white;">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input mr-2" type="checkbox" name="inlineRadioOptions" id="new_staff" value="new_staff">
                                <label class="form-check-label" for="new_staff">A New Staff</label>
                            </div>
                            </li>
                        </ol> 
                        @if(Session::has('New_User_Added') || Session::has('New_Student_Added'))
                        <div class="alert alert-success" role="alert">
                        {{Session::get('New_User_Added')}}
                        {{Session::get('New_Student_Added')}}
                        </div>
                        @endif
                        @if(Session::has('New_User_failed') || Session::has('New_Student_failed'))
                        <div class="alert alert-danger" role="alert">
                        {{Session::get('New_User_failed')}}
                        {{Session::get('New_Student_failed')}}
                        </div>
                        @endif
  

                        <form method="POST" action="{{ __('AddUser') }}" class='new-staff-form'>
                            @csrf

                            <!-- surNAME -->
                            <input type="hidden" name="status" value='active' />
                            <div class="form-row">
                            <div class="col-md-4 mb-3">   
                                <label for="surNAME">SURNAME</label>  
                                <input id="surNAME" class="form-control" type="text" name="surNAME" required autofocus />
                            </div></br>
                            <!-- otherNAMES -->
                            <div class="col-md-4 mb-3">            
                            <label for="otherNAMES">OTHERNAMES</label>  
                                <input id="otherNAMES" class="form-control" type="text" name="otherNAMES" required autofocus />
                            </div></br>

                            <!-- suID or Username -->
                            <div class="col-md-4 mb-3">            
                            <label for="suID">suID</label>  
                                <input id="suID" class="form-control" type="number" name="suID" required autofocus />
                            </div></br>

                            <!-- Email Address -->
                            <div class="col-md-4 mb-3">            
                            <label for="email">Email</label>  
                                <input id="email" class="form-control" type="text" name="email" required autofocus />
                            </div>
                            <div class="col-md-4 mb-3"> 
                            <label for="role_id">Register as:</label>  
                                <select name="user_role" class="form-control">
                                    @foreach($roles as $role)
                                        <option value={{strtolower($role)}}> {{$role}} </option>
                                    @endforeach
                                </select>

                            </div></br>

                            <!-- Password -->
                            <!-- <div class="col-md-4 mb-3">            
                            <label for="password">Password</label>  

                                <input id="password" class="form-control"
                                                type="password"
                                                name="password"
                                                required autocomplete="new-password" />
                            </div> -->

                            <!-- Confirm Password -->
                            <!-- <div class="col-md-4 mb-3">            
                                <label for="password_confirmation">Password</label>  
                                <input id="password_confirmation" class="form-control"
                                                type="password"
                                                name="password_confirmation" required />
                            </div> -->
                            <!-- Select Role -->
                            
                            </div>
                            <br/>
                            <div class="form-row">

                                <div class="flex items-center justify-end mt-4">
                                <input class="btn btn-success" value="Save details" type="submit" />
                                
                                </div>
                            </div>
                        </form><br/>

                        <ol class="breadcrumb mb-4" style="background:#286DE7;">
                            <li class="breadcrumb-item active" style="color:white;">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input mr-2" type="checkbox" name="inlineRadioOptions" id="new_student" value="new_student">
                                    <label class="form-check-label" for="new_student">A New Student</label>
                                </div>
                            </li>
                        </ol> 

                        <form method="POST"  class='new-student-form' action="{{route('Add.signup')}}">
                            @csrf
                                <div class="form-row">
                                    <div class="col-md-4 mb-3">
                                    <label for="Surname">NOM (SURNAME)</label>
                                    <input type="text" class="form-control" name ="surNAME" id="surNAME" placeholder="Surname"
                                         required>
                                    
                                    </div>
                                    <div class="col-md-4 mb-3">
                                    <label for="fNAME">First Name</label>
                                    <input type="text" class="form-control" name ="firstNAME" id="firstNAME" placeholder="First Name"
                                         required>                                    
                                    </div>
                                    <div class="col-md-4 mb-3">
                                    <label for="lNAME">Last Name</label>
                                    <input type="text" class="form-control" name ="lastNAME" id="lastNAME" placeholder="Last Name"
                                         required>                                    
                                    </div>                                    
                                </div>
                                <div class="form-row">
                                    <div class="col-md-4 mb-3">
                                    <label for="suID">Admission Number</label>
                                    <input type="number" class="form-control" name ="suID" id="suID" placeholder="Admission Number"
                                         required>
                                    
                                    </div>
                                    <div class="col-md-4 mb-3">
                                    <label for="Course">Course</label>
                                    <input type="text" class="form-control" name ="Course" id="Course" placeholder="Course of Study"
                                         required>
                                    
                                    </div>
                                    <div class="col-md-4 mb-3">
                                    <label for="Faculty">Faculty</label>
                                    <input type="text" class="form-control"  name ="Faculty" id="Faculty" placeholder="Faculty"
                                         required>
                                    
                                    </div>
                                  
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6 mb-3">
                                    <label for="email">Email Address</label>
                                    <input type="text" class="form-control" name ="suEMAIL" id="suEMAIL" placeholder="Email"
                                        required>
                                  </div>
                                    <div class="col-md-3 mb-3">
                                    <label for="Nationality">Nationality</label>
                                    <input type="text" class="form-control"  name ="Nationality" id="Nationality" placeholder="Nationality"
                                        required>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                    <label for="validationServerUsername33">Passport Number</label>
                                    <input type="text" class="form-control" id="validationServer023" name ="passportNUMBER" placeholder="Passport Number"
                                         required>
                                    </div>    
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6 mb-3">
                                    <label for="PhoneNumber">Kenyan Phone Number</label>
                                    <input type="number" class="form-control" id="phoneNUMBER" name ="phoneNUMBER" placeholder="(+254) 700 000000"
                                        required>
                                    </div>    
                                    <div class="col-md-4 mb-3">
                                    <label for="Residence">Residence</label>
                                    <input type="text" class="form-control" name ="Residence" id="Residence" placeholder="Residence"
                                         required>
                                    </div>                         
                                </div><br>

                                <div><h4>PARENTS DETAIL</h4></div>
                                <div class="form-row">
                                   
                                    <div class="col-md-4 mb-3">
                                    <label for="ParentEmail">Parent Email</label>
                                    <input type="text" class="form-control" name ="ParentEmail" id="ParentEmail" placeholder="Parents Email"
                                         required>
                                    </div>  
                                    
                                    <div class="col-md-4 mb-3">
                                    <label for="ParentPhone">Your parents Phone Number</label>
                                    <input type="number" class="form-control" id="ParentPhone" name ="ParentPhone" placeholder="Parent Phone Number"
                                        required>
                                    </div>
                                    
                                    <div class="col-md-4 mb-3">
                                    <label for="ParentNames">Your parents Names</label>
                                    <input type="text" class="form-control" id="ParentNames" name ="ParentNames" placeholder="Full Names "
                                        required>
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
              @endsection