@extends('Layouts.studentActions.studentMaster',['title'=>'Req. Kpp','userData'=>$user,'availability'=>$availability, 'NoBooking'=>$NoBooking, 'NoBooking'=>$NoBooking,'NoExt'=>$NoExt,'NoKpps'=>$NoKpps])
@section('content')
<nav class="d-flex align-items-center top-title-sticky" style='position:sticky; top:0; z-index:2999; padding:8px; background:#fff; width:100%; height: 56px;'>
    <span>Request Student Pass</span>
</nav>
<div class="container-fluid"><br/>
        <ol class="breadcrumb mb-4" style="background:#286DE7;">
            <li class="breadcrumb-item active" style="color:white;">Kenyan Student Pass Application Request</li>
        </ol> 
        @if(Session::has('booking-success'))
        <div class="alert alert-success" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        {{Session::get('booking-success')}}
        </div>
        @endif
        @if(Session::has('booking-error'))
        <div class="alert alert-danger" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        {{Session::get('booking-error')}}
        </div>
        @endif
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
        @if(Session::has('kpp_updated_successfully'))
        <div class="alert alert-success" role="alert">
        {{Session::get('kpp_updated_successfully')}}
        </div>
        @endif
        @if(Session::has('kpp_request_added'))
        <div class="alert alert-success" role="alert">
        {{Session::get('kpp_request_added')}}
        </div>
        @endif
        @if(Session::has('kpp_request_fail'))
        <div class="alert alert-danger" role="alert">
        {{Session::get('kpp_request_fail')}}
        </div>
        @endif
        @if(Session::has('kpp_request_ongoing'))
        <div class="alert alert-warning" role="alert">
        {{Session::get('kpp_request_ongoing')}}
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
                    <input type="text" class="form-control" name="surNAME" id="Surname" value="{{ $getUserDetails->surname}}" disabled>
                    
                    </div>
                    <div class="col-md-4 mb-3">
                    <label for="othernames">Prenom (Other Names)</label>
                    <input type="text" class="form-control" name="otherNAMES" id="othernames" value="{{ $getUserDetails->other_names}}"  disabled>
                    
                    </div>
                    <div class="col-md-4 mb-3">
                    <label for="validationServerUsername33">Passport Number</label>
                    <input type="text"  disabled name="passportNUMBER" class="form-control" id="validationServer023" value="{{ $getUserDetails->passport_number}}" >
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-4 mb-3">
                    <label for="AdmissionNo">Admission Number</label>
                    <input type="number"  disabled name="suID" class="form-control" id="admissionNo" placeholder="{{ Auth::user()->id}}" value="{{ Auth::user()->id}}" readonly="readonly"/>
                    </div>
                    <div class="col-md-4 mb-3">
                    <label for="Course">Course</label>
                    <input type="text" disabled name="Course" class="form-control" id="course" value="{{ $getUserDetails->course}}">                                    
                </div>
                <div class="col-md-4 mb-3">
                    <div class="form-group">
                        <label>Country</label>
                        <input disabled type="text" name="Nationality" class="form-control" id="course" value="{{ $getUserDetails->nationality}}">                                    
                    
                    </div>                                   
                </div>
                
                <div class="form-row">
                    <div class="col mb-3">
                    <label for="email">Email Address</label>
                    <input type="text" name="suEMAIL" class="form-control" id="email" value="{{ Auth::user()->email}}" readonly="readonly">
                    </div>
                    
                    <div class="col mb-3">
                    <label for="Residence">Residence</label>
                    <input type="text"  disabled name="Residence" class="form-control" id="Residence" placeholder="Residence" value="{{ $getUserDetails->residence}}">
                    </div>

                    <div class="col mb-3">
                        <label for="EntryDate">Date of Entry</label>
                        <input type="date" name="entry_date" class="form-control" id="Entrydate" placeholder="Date of Entry"
                            >                                    
                        </div>
                    </div>
                </div><br/>

                <div class="form-row">
                    <div class="col-md-6 mb-3">
                    <label for="PhoneNumber">Phone Number</label>
                    <input type="number"  disabled name="phoneNUMBER" class="form-control" id="PhoneNumber" placeholder="(+254) 700 000000" value="{{ $getUserDetails->phone_number}}" >
                    </div> 
                    <div class="col-md-6 mb-3">
                    <label for="Faculty">Faculty</label>
                    <input type="text"  disabled name="Faculty" class="form-control" id="Faculty" placeholder="Faculty" value="{{ $getUserDetails->faculty}}">
                    </div>                                      
                </div></br>


                
                <h4>DOCUMENTS UPLOADS</h4><br/>
                <div class="form-row">
                    <div class="col-md-4 mb-3">
                    <label for="PassportPicture">Upload your Passport Sized Picture</label>
                    <input type="file" name="passportPICTURE" class="form-control" id="passportPICTURE" placeholder="Upload Your Passport picture"
                        >
                        
                    </div>
                    <div class="col-md-4 mb-3">
                    <label for="Biodata">Upload Passport Biodata Page</label>
                    <input type="file" name="biodataPAGE" class="form-control" id="biodataPAGE" placeholder="Upload Biodata Page"
                        >
                    </div>                                    
                    <div class="col-md-4 mb-3">
                    <label for="Current Visa">Upload Current Visa</label>
                    <input type="file" name="currentVISA" class="form-control" id="currentVISA" placeholder="Upload your current visa"
                        >
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-4 mb-3">
                    <label for="ParentBiodata">Upload Parent/Guardians Passport Biodata Page</label>
                    <input type="file" name="guardiansID" class="form-control" id="guardiansID" placeholder="Upload Parents/Guardians Biodata Page"
                        >

                    </div>
                    <div class="col-md-4 mb-3">
                    <label for="CommitmentLetter">Commitment Letter</label>
                    <input type="file" name="commitmentLETTER" class="form-control" id="commitmentLETTER" placeholder="Upload Commitment Letter from Parent"
                        >
                    </div>
                    <div class="col-md-4 mb-3">
                    <label for="Academic Transcripts">Academic Transcripts</label>
                    <input type="file" name="academicTRANSCRIPTS" class="form-control" id="academicTRANSCRIPTS" placeholder="Upload your High school/Alevel/Olevel certificates"
                        >                                    
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-4 mb-3">
                    <label for="goodconduct">Valid Police Clearance/Good Conduct Certificate</label>
                    <input type="file" name="policeCLEARANCE" class="form-control" id="policeCLEARANCE" placeholder="Upload a valid Police Clearance/Good Conduct"
                        >
                    </div>                                   
                </div>
                <div class="form-group">
                    <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input is-valid" id="invalidCheck33" >
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