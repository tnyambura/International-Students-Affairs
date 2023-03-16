@extends('Layouts.studentActions.studentMaster')
@section('content')
                <div class="container-fluid"><br/>
                        <ol class="breadcrumb mb-4" style="background:#286DE7;">
                            <li class="breadcrumb-item active" style="color:white;">Kenyan Student Pass Application Request</li>
                        </ol>             
                        @if(Session::has('kpp_request_added'))
                        <div class="alert alert-success" role="alert">
                        {{Session::get('kpp_request_added')}}
                        </div>
                        @endif

                        @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                            <form method="POST" action="{{route('add.newkppapp')}}" enctype="multipart/form-data" onSubmit="return validate();">
                            @csrf
                                <div class="form-row">
                                    <div class="col-md-4 mb-3">
                                    <label for="Surname">NOM (SURNAME)</label>
                                    <input type="text" class="form-control" name="surNAME" id="Surname" placeholder="{{ Auth::user()->surNAME}}" value="{{ Auth::user()->surNAME}}"
                                         required>
                                    
                                    </div>
                                    <div class="col-md-4 mb-3">
                                    <label for="othernames">Prenom (Other Names)</label>
                                    <input type="text" class="form-control" name="otherNAMES" id="othernames" placeholder="{{ Auth::user()->otherNAMES}}" value="{{ Auth::user()->otherNAMES}}"
                                         required>
                                    
                                    </div>
                                    <div class="col-md-4 mb-3">
                                    <label for="validationServerUsername33">Passport Number</label>
                                    <input type="text" name="passportNUMBER" class="form-control" id="validationServer023" placeholder="PASSPORT NUMBER"
                                         required>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-md-4 mb-3">
                                    <label for="AdmissionNo">Admission Number</label>
                                    <input type="number" name="suID" class="form-control" id="admissionNo" placeholder="{{ Auth::user()->suID}}" value="{{ Auth::user()->suID}}" readonly="readonly"/>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                    <label for="Course">Course</label>
                                    <input type="text" name="Course" class="form-control" id="course" placeholder="Course of Study"
                                    required>                                    
                                    </div>
                                    <div class="col-md-4 mb-3">
                                    <div class="form-group">
                                    <label>Select Your Country<span style="color:red;">*</span></label>
                                    <select name="Nationality" id="Nationality" class="form-control">
                                    <option selected="" disabled="">Select Country</option>
                                    <?php
                                    foreach($getCountries as $data){
                                    ?>
                                    <option value="{{$data}}">{{$data}}</option>
                                    <?php
                                    }
                                    ?>
                                    </select>
                                    </div>                                   
                                </div>
                                
                                <div class="form-row">
                                   <div class="col-md-4 mb-3">
                                    <label for="email">Email Address</label>
                                    <input type="text" name="suEMAIL" class="form-control" id="email" placeholder="{{ Auth::user()->email}}" value="{{ Auth::user()->email}}" readonly="readonly"
                                        required>
                                   </div>
                                   
                                   <div class="col-md-4 mb-3">
                                    <label for="Residence">Residence</label>
                                    <input type="text" name="Residence" class="form-control" id="Residence" placeholder="Residence"
                                         required>
                                   </div>

                                    <div class="col-md-4 mb-3">
                                        <label for="EntryDate">Date of Entry</label>
                                        <input type="date" name="dateofENTRY" class="form-control" id="Entrydate" placeholder="Date of Entry"
                                            required>                                    
                                     </div>
                                   </div>
                                </div><br/>

                                <div class="form-row">
                                    <div class="col-md-6 mb-3">
                                    <label for="PhoneNumber">Kenyan Phone Number</label>
                                    <input type="number" name="phoneNUMBER" class="form-control" id="PhoneNumber" placeholder="(+254) 700 000000"
                                        required>
                                    </div> 
                                    <div class="col-md-6 mb-3">
                                    <label for="Faculty">Faculty</label>
                                    <input type="text" name="Faculty" class="form-control" id="Faculty" placeholder="Faculty"
                                        required>
                                    </div>                                      
                                </div></br>

            
                                
                                <h4>DOCUMENTS UPLOADS</h4><br/>
                                <div class="form-row">
                                    <div class="col-md-4 mb-3">
                                    <label for="PassportPicture">Upload your Passport Sized Picture</label>
                                    <input type="file" name="passportPICTURE" class="form-control" id="passportPICTURE" placeholder="Upload Your Passport picture"
                                        required>
                                       
                                    </div>
                                    <div class="col-md-4 mb-3">
                                    <label for="Biodata">Upload Passport Biodata Page</label>
                                    <input type="file" name="biodataPAGE" class="form-control" id="biodataPAGE" placeholder="Upload Biodata Page"
                                        required>
                                  </div>                                    
                                    <div class="col-md-4 mb-3">
                                    <label for="Current Visa">Upload Current Visa</label>
                                    <input type="file" name="currentVISA" class="form-control" id="currentVISA" placeholder="Upload your current visa"
                                        required>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-4 mb-3">
                                    <label for="ParentBiodata">Upload Parent/Guardians Passport Biodata Page</label>
                                    <input type="file" name="guardiansID" class="form-control" id="guardiansID" placeholder="Upload Parents/Guardians Biodata Page"
                                        required>

                                  </div>
                                    <div class="col-md-4 mb-3">
                                    <label for="CommitmentLetter">Commitment Letter</label>
                                    <input type="file" name="commitmentLETTER" class="form-control" id="commitmentLETTER" placeholder="Upload Commitment Letter from Parent"
                                        required>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                    <label for="Academic Transcripts">Academic Transcripts</label>
                                    <input type="file" name="academicTRANSCRIPTS" class="form-control" id="academicTRANSCRIPTS" placeholder="Upload your High school/Alevel/Olevel certificates"
                                        required>                                    
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-4 mb-3">
                                    <label for="goodconduct">Valid Police Clearance/Good Conduct Certificate</label>
                                    <input type="file" name="policeCLEARANCE" class="form-control" id="policeCLEARANCE" placeholder="Upload a valid Police Clearance/Good Conduct"
                                        required>
                                  </div>                                   
                                </div>
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input is-valid" id="invalidCheck33" required>
                                    <label class="custom-control-label" for="invalidCheck33">All the Information provided is to the best of my Knowledge</label>
                                    <div class="valid-feedback">
                                        You must agree before submitting.
                                    </div>
                                    </div>
                                    <div class="invalid-feedback">
                                    You must agree before submitting.
                                    </div>
                                </div>
                                  <button class="btn btn-primary" id="btnSubmit" type="submit">Submit Request</button>
                                </form>   
                            </div>   
              @endsection