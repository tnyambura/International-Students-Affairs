@extends('Layouts.studentActions.studentMaster')
@section('content')      
      <div class="container-fluid"><br/>
                        <ol class="breadcrumb mb-4" style="background:#286DE7;">
                            <li class="breadcrumb-item active" style="color:white;">Dashboard</li>
                        </ol>
                        <div class="alert alert-danger alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <ul>
                        <li><span>Upon successful submission of an application request, you can check the status of your uploads by clicking<b>"View a list of My Student Pass Applications"</b> from the dashboard.</span></li>
                        <li><span>For all Foreign Nationals Applications that require biometrics capture, please <b>Email</b> our office so that we can place an appointment booking with the immigrations on your behalf.</span></li>
                        <li><span>All visa extension requests can be placed by clicking <b>"VISA EXTENSIONS"</b> from the dashboard.</span></li>
                        <li><span>All Student Pass Application requests can be placed by clicking <b>"STUDENT PASS APPLICATIONS"</b> from the dashboard.</span></li>

                    </ul>
                </div>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">View a list of My Student Pass Applications</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="{{ __('MykppApplications')}}">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">VISA EXTENSION APPLICATIONS</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="{{ __('ApplyVisa')}}">Send a Request</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">STUDENT PASS APPLICATIONS</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="{{ __('ApplyKpp')}}">Send a Request</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">Request for a Buddy allocation</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="{{ __('RequestBuddy')}}">Request</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                       
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                My Details
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Student ID</th>
                                                <th>Surname</th>
                                                <th>Othernames</th>
                                                <th>Email</th>
                                                <th>User Type</th>
                                              
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Surname</th>
                                                <th>Othernames</th>
                                                <th>su ID</th>
                                                <th>User Type</th>
                                                <th>Email</th>
                                              
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <tr>
                                                <td>{{Auth::user()->id}}</td>

                                                
                                                                                                                                             
                                               </td>
                                            </tr>
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

              @endsection