@extends('Layouts.studentActions.studentMaster',['title'=>'Req. Ext','userData'=>$user,'availability'=>$availability, 'NoBooking'=>$NoBooking, 'NoBooking'=>$NoBooking,'NoExt'=>$NoExt,'NoKpps'=>$NoKpps])
@section('content')
<nav class="d-flex align-items-center top-title-sticky" style='position:sticky; top:0; z-index:2999; padding:8px; background:#fff; width:100%; height: 56px;'>
    <span>Request Extension</span>
</nav>
<div class="container-fluid"><br/>
        <ol class="breadcrumb mb-4" style="background:#113C7A;">
            <li class="breadcrumb-item active" style="color:white;">Kenyan Visa Extension Request</li>
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
                    <input type="text" class="form-control" name="surNAME" id="Surname" value="{{ $userData->surname}}" disabled />
                    
                    </div>
                    <div class="col-md-4 mb-3">
                    <label for="othernames">Prenom (Other Names)</label>
                    <input type="text" class="form-control" name="otherNAMES" id="othernames" value="{{ $userData->other_names}}" disabled />
                    
                    </div>
                    <div class="col-md-4 mb-3">
                    <label for="validationServerUsername33">Passport Number</label>
                    <input type="text" class="form-control" name="passportNUMBER" disabled id="validationServer023" value="{{ $userData->passport_number}}">
                    </div>
                    <div class="col-md-4 mb-3">
                    <label for="AdmissionNo">Admission Number</label>
                    <input type="number" name="suID" class="form-control" id="admissionNo" value="{{ $userData->student_id}}" disabled/>
                    
                    </div>
                    <div class="col-md-4 mb-3">
                    <label for="email">Email Address</label>
                    <input type="text" class="form-control" name="suEMAIL" id="email" value="{{ $userData->email}}" disabled/>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="Nationality">Nationality</label>                                  
                    <input type="text" class="form-control" name="Nationality" id="Nationality" value="{{ $userData->nationality}}" disabled  />
                </div>
                    </div>
                    
                <div class="form-row mb-5">
                    <div class="col-lg">
                    <label for="EntryDate">Date of Entry</label>
                    <input type="date" class="form-control" name="dateofENTRY" id="Entrydate" placeholder="Date of Entry" required />                                    
                    </div>
                </div>
                <div class="form-row mt-3">
                    <div class="col-md-4 file-uplod-container mb-3">
                        <p>Upload Passport Biodata Page</p>
                        <label class='file-upload-label' for="biodataPAGE">
                            <span>Choose File</span>
                            <input type="file" accept=".pdf,.jpg,.jpeg,.png"  name="Biodata" id="biodataPAGE" style="display:none"/>
                        </label>
                    </div>
                    <div class="col-md-4 file-uplod-container mb-3">
                        <p>Upload Entry Visa</p>
                    <label class='file-upload-label' for="entryV">
                        <span>Choose File</span>
                        <input type="file" accept=".pdf,.jpg,.jpeg,.png"  name="entryVISA" id="entryV" style="display:none"/>                                    
                    </label>
                    </div>
                    <div class="col-md-4 file-uplod-container mb-3">
                        <p>Upload Your Current Visa Page</p>
                    <label class='file-upload-label' for="currentVISA">
                        <span>Choose File</span>
                    <input type="file" accept=".pdf,.jpg,.jpeg,.png"  name="currentVISA" id="currentVISA" style="display:none"/>
                        </label>
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
                <div class='d-flex my-4 justify-content-center align-items-center'>
                    <input class="btn w-75" style='margin-inline:center; border: 2px solid rgb(17,60,122); color:rgb(17,60,122); font-weight: bold' value="Submit" type="submit" />
                </div>
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