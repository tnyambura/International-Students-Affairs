@extends('Layouts.studentActions.studentMaster')
@section('content')
<div class="container-fluid"><br/>
                        <ol class="breadcrumb mb-4" style="background:#286DE7;">
                            <li class="breadcrumb-item active" style="color:white;">Request for a Buddy Allocation</li> 

                        </ol> 
                        <ol class="breadcrumb mb-4">
                        <a href="{{__('BuddyProgram')}}">Return to Buddy Program Home</a>.<br/>

                        </ol>             
                        @if(Session::has('Buddy_request_successful'))
                        <div class="alert alert-success" role="alert">
                        {{Session::get('Buddy_request_successful')}}
                        </div>
                        @endif
                        @if(Session::has('New_request_failed'))
                        <div class="alert alert-danger" role="alert">
                        {{Session::get('New_request_failed')}}
                        </div>
                        @endif
                        @if(Session::has('New_request_assigned'))
                        <div class="alert alert-warning" role="alert">
                        {{Session::get('New_request_assigned')}}
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
                        <form method="POST" action="{{route('add.requestabuddy')}}" enctype="multipart/form-data" onSubmit="return validate();">
                            @csrf
                                <div class="form-row">
                                    <div class="col-md-4 mb-3">
                                            <label for="Surname">NOM (SURNAME)</label>
                                            <input type="text" class="form-control" name="surNAME" id="Surname" value="{{ Auth::user()->surname}}"
                                                required>                                    
                                    </div>
                                    <div class="col-md-4 mb-3">
                                            <label for="othernames">Prenom (Other Names)</label>
                                            <input type="text" class="form-control" name="otherNAMES" id="othernames"  value="{{ Auth::user()->other_names}}"
                                                required>
                                            
                                    </div>
                                    <div class="col-md-4 mb-3">
                                            <label for="validationServerUsername33">Passport Number</label>
                                            <input type="text" name="PassportNumber" class="form-control" id="validationServer023" value="{{$user->passport_number}}"
                                                required>
                                    </div>
                                </div>
                            <div class="form-row">
                                <div class="col-md-4 mb-3">
                                        <label for="AdmissionNo">Admission Number</label>
                                        <input type="number" name="suID" class="form-control" id="admissionNo" value="{{ Auth::user()->id}}" readonly="readonly"/>
                                </div>
                                <div class="col-md-4 mb-3">
                                        <label for="Course">Course</label>
                                        <input type="text" name="course" class="form-control" id="course" placeholder="Course of Study" value="{{$user->course}}"
                                        required>                                    
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <div class="form-group">
                                            <label>Select Your Country<span style="color:red;">*</span></label>
                                            <input type="text" name="course" class="form-control" id="course" placeholder="Course of Study" value="{{$user->nationality}}" />
                                    
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                    <div class="col-md-4 mb-3">
                                    <label for="email">Email Address</label>
                                            <input type="text" name="email" class="form-control" id="email" value="{{ Auth::user()->email}}"
                                                required>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                    <label for="Residence">Year of Study</label>
                                    <input type="text" name="YearOfStudy" class="form-control" id="YearOfStudy" placeholder="YearOfStudy"
                                         required>
                                   </div>
                                   <div class="col-md-4 mb-3">
                                    <label for="Residence">Faculty</label>
                                    <input type="text" name="Faculty" class="form-control" id="Faculty" value="{{ $user->faculty }}"
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