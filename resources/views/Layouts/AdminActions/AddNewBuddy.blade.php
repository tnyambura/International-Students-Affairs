@extends('Layouts.AdminActions.adminMaster')
@section('content')
                <div class="container-fluid"><br/>
                        <ol class="breadcrumb mb-4" style="background:#113C7A;">
                            <li class="breadcrumb-item active" style="color:white;">New Buddy Enrolment Portal</li>
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
                            <form method="POST" action="{{route('add.EnrolNewBuddy')}}">
                            @csrf
                                <div class="form-row">
                                    <div class="col-md-4 mb-3">
                                    <label for="Surname">NOM (SURNAME)</label>
                                    <input type="text" class="form-control" name ="surNAME" id="surNAME" placeholder="Surname"
                                         required>
                                    
                                    </div>
                                    <div class="col-md-4 mb-3">
                                    <label for="fNAME">Other Names</label>
                                    <input type="text" class="form-control" name ="otherNAMES" id="otherNAMES" placeholder="Other Names"
                                         required>                                    
                                    </div>
                                    <div class="col-md-4 mb-3">
                                    <label for="Residence">Residence</label>
                                    <input type="text" class="form-control" name ="Residence" id="Residence" placeholder="Residence"
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
                                    <input type="text" class="form-control" name ="course" id="Course" placeholder="Course of Study"
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
                                    <input type="text" class="form-control" name ="email" id="email" placeholder="Email"
                                        required>
                                  </div>
                                    <div class="col-md-6 mb-3">
                                    <label for="Nationality">Nationality</label>
                                    <input type="text" class="form-control"  name ="Nationality" id="Nationality" placeholder="Nationality"
                                        required>
                                    </div>
                                   
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6 mb-3">
                                    <label for="PhoneNumber">Kenyan Phone Number</label>
                                    <input type="number" class="form-control" id="phoneNUMBER" name ="phoneNUMBER" placeholder="(+254) 700 000000"
                                        required>
                                    </div>    
                                    <div class="col-md-6 mb-3">
                                    <label for="validationServerUsername33">Passport Number</label>
                                    <input type="text" class="form-control" id="validationServer023" name ="passportNUMBER" placeholder="Passport Number"
                                         required>
                                    </div>                            
                                </div><br>
                               
                               
                                <button class="btn btn-primary" type="submit">Add New Buddy</button>
                                </form>   
                            </div>   
@endsection