@extends('Layouts.AdminActions.adminMaster')
@section('content')
                <div class="container-fluid"><br/>
                        <ol class="breadcrumb mb-4" style="background:#113C7A;">
                            <li class="breadcrumb-item active" style="color:white;">New International Student Registration Portal</li>
                        </ol>             
                        @if(Session::has('New_Student_Added'))
                        <div class="alert alert-success" role="alert">
                        {{Session::get('New_Student_Added')}}
                        </div>
                        @endif
                        @if(Session::has('New_Student_failed'))
                        <div class="alert alert-danger" role="alert">
                        {{Session::get('New_Student_failed')}}
                        </div>
                        @endif
                            <form method="POST" action="{{route('add.AddNewInternationalStudent')}}">
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
                               
                               
                                <button class="btn btn-primary" type="submit">Add New Student</button>
                                </form>   
                            </div>   
@endsection