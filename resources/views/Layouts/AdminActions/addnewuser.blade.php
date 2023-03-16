@extends('Layouts.AdminActions.adminMaster')
@section('content')
                <div class="container-fluid"><br/>
                        <ol class="breadcrumb mb-4" style="background:#286DE7;">
                            <li class="breadcrumb-item active" style="color:white;">A New User Enrollment Portal</li>
                        </ol>   
                        @if(Session::has('New_User_Added'))
                        <div class="alert alert-success" role="alert">
                        {{Session::get('New_User_Added')}}
                        </div>
                        @endif
                        @if(Session::has('New_User_failed'))
                        <div class="alert alert-danger" role="alert">
                        {{Session::get('New_User_failed')}}
                        </div>
                        @endif
  

                        <form method="POST" action="{{ __('AddUser') }}">
                            @csrf

                            <!-- surNAME -->
                            <div class="form-row">
                            <div class="col-md-4 mb-3">   
                                <label for="surNAME">SURNAME</label>  
                                <Input id="surNAME" class="form-control" type="text" name="surNAME" required autofocus />
                            </div></br>
                            <!-- otherNAMES -->
                            <div class="col-md-4 mb-3">            
                            <label for="otherNAMES">OTHERNAMES</label>  
                                <Input id="otherNAMES" class="form-control" type="text" name="otherNAMES" required autofocus />
                            </div></br>

                            <!-- suID or Username -->
                            <div class="col-md-4 mb-3">            
                            <label for="suID">suID</label>  
                                <Input id="suID" class="form-control" type="number" name="suID" required autofocus />
                            </div></br>

                            <!-- Email Address -->
                            <div class="col-md-4 mb-3">            
                            <label for="email">Email</label>  
                                <Input id="email" class="form-control" type="text" name="email" required autofocus />
                            </div>
                            <div class="col-md-4 mb-3"> 
                            <label for="role_id">Register as:</label>  
                                <select name="role_id" class="form-control">
                                <option value="Internationalstudent"> International Student </option>
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
                            <button class="btn btn-success" value="submit" type="submit">Register</button>
                               
                            </div>
                            </div>
                        </form>
    

                            </div>   
              @endsection