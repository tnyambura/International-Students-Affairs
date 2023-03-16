@extends('Layouts.AdminActions.adminMaster')
@section('content')
        <div class="container-fluid"><br/>
           
            
            <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-info text-white mb-4">
                                    <div class="card-body">A list of all registered trained Buddies</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="{{ __('listofBuddies')}}">View All Buddies</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-secondary text-white mb-4">
                                    <div class="card-body">Register A New trained and qualified Buddy</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="{{ __('AddNewBuddy')}}">Register A new Buddy</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">View All Buddy Requests by New International students</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="{{ __('listofBuddyRequests')}}">View List</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">List of completed Buddy Allocations</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="{{ __('BuddyAllocationsList')}}">List of Allocations Completed</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
            
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table mr-1"></i>
                    List of Trained Buddies.
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Name</th>
                                    <th>Passport Number</th>
                                    <th>Date Requested</th>
                                    <th>Entry Date</th>
                                    <th>NATIONALITY</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>id</th>
                                    <th>Name</th>
                                    <th>Passport Number</th>
                                    <th>Date Requested</th>
                                    <th>Entry Date</th>
                                    <th>NATIONALITY</th>
                                    <th>Actions</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <tr>
                                    <td>Dummy</td>
                                    <td>Dummy</td>
                                    <td>Dummy</td>
                                    <td>Dummy</td>
                                    <td>Dummy</td>
                                    <td>Dummy</td>
                                    <td>

                                                                                                                                

                                    <a href="#" target="blank">
                                        <P><span class="fas fa-list-ul" aria-hidden="false"></span> Verify</p>
                                    </a>                                                                                               
                                    </td>
                                </tr>
                                </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
           
@endsection