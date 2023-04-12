@extends('Layouts.studentActions.studentMaster',['userData'=>$user,'availability'=>$availability])
@section('content')
                <div class="container-fluid"><br/>
                        <ol class="breadcrumb mb-4" style="background:#286DE7;">
                            <li class="breadcrumb-item active" style="color:white;">Kenyan Visa Extension Request</li>
                        </ol>
                        @if(Session::has('user_update_success'))
                        <div class="alert alert-success" role="alert">
                        {{Session::get('user_update_success')}}
                        </div>
                        @endif
                        @if(Session::has('user_update_failed'))
                        <div class="alert alert-danger" role="alert">
                        {{Session::get('user_update_failed')}}
                        </div>
                        @endif        
                        @if(Session::has('visa_request_added'))
                        <div class="alert alert-success" role="alert">
                        {{Session::get('visa_request_added')}}
                        </div>
                        @endif
                        @if(Session::has('visa_request_ongoing'))
                        <div class="alert alert-warning" role="alert">
                        {{Session::get('visa_request_ongoing')}}
                        </div>
                        @endif
                            <form method="POST" action="{{route('add.newvisaextension')}}" enctype="multipart/form-data">
                            @csrf
                                <div class="form-row">
                                    <div class="col-md-4 mb-3">
                                    <label for="Surname">NOM (SURNAME)</label>
                                    <input type="text" class="form-control" name="surNAME" id="Surname" value="{{ $userData->surname}}" readonly="readonly"
                                         >
                                    
                                    </div>
                                    <div class="col-md-4 mb-3">
                                    <label for="othernames">Prenom (Other Names)</label>
                                    <input type="text" class="form-control" name="otherNAMES" id="othernames" value="{{ $userData->other_names}}" readonly="readonly"
                                         >
                                    
                                    </div>
                                    <div class="col-md-4 mb-3">
                                    <label for="validationServerUsername33">Passport Number</label>
                                    <input type="text" class="form-control" name="passportNUMBER" disabled id="validationServer023" value="{{ $userData->passport_number}}">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                    <label for="AdmissionNo">Admission Number</label>
                                    <input type="number" name="suID" class="form-control" id="admissionNo" value="{{ $userData->student_id}}" readonly="readonly"/>
                                    
                                    </div>
                                    <div class="col-md-4 mb-3">
                                    <label for="email">Email Address</label>
                                    <input type="text" class="form-control" name="suEMAIL" id="email" value="{{ $userData->email}}" readonly="readonly"/>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="Nationality">Nationality</label>                                  
                                    <input type="text" class="form-control" name="Nationality" id="Nationality" value="{{ $userData->nationality}}" disabled readonly="readonly" />
                                </div>
                                   </div>
                                    
                                <div class="form-row">
                                    
                                    <div class="col-md-3 mb-3">
                                    <label for="EntryDate">Date of Entry</label>
                                    <input type="date" class="form-control" name="dateofENTRY" id="Entrydate" placeholder="Date of Entry"
                                        required>                                    
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-4 mb-3">
                                    <label for="email">Upload Passport Biodata Page</label>
                                    <input type="file" class="form-control" name="Biodata" id="biodataPAGE" placeholder="Upload Biodata Page"
                                        required>
                                    </div>
                                    <!-- <div class="col-md-4 mb-3">
                                    <label for="PassportPicture">Upload Passport Sized Picture</label>
                                    <input type="file" class="form-control" name="passportPIC" id="passportPICTURE" placeholder="Upload Your Passport picture"
                                        required>
                                    </div> -->
                                    <div class="col-md-4 mb-3">
                                    <label for="Entry Visa">Upload Entry Visa</label>
                                    <input type="file" class="form-control" name="entryVISA" id="entryV" placeholder="Upload your entry visa"
                                        required>                                    
                                    </div>
                                    <div class="col-md-4 mb-3">
                                    <label for="email">Upload Your Current Visa Page</label>
                                    <input type="file" class="form-control" name="currentVISA" id="currentVISA" placeholder="Upload Your Current Visa Page"
                                        required>
                                  </div>
                                </div>
                                <!-- <div class="form-row">
                                   
                                </div><br/> -->
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
                                <button class="btn btn-primary" type="submit">Submit Request</button>
                                </form>   
                            </div>   
                            <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
                            <script defer>
                                $(document).ready(function() {
                                    $('[type="file"]').on ('change',function(e){
                                        var fileExtension = ['png','jpg','jpeg','pdf']
                                        if($.inArray($(this).val().split('.').pop().toLowerCase(),fileExtension) == -1){
                                            alert("Only 'png','jpg','jpeg','pdf' files are accepted!")
                                            $(this).val("")
                                        }
                                    })
                                })
                            </script>
              @endsection