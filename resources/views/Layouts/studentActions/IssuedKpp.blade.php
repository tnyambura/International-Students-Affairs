@extends('Layouts.studentActions.studentMaster')
@section('content')
                    <div class="container-fluid"><br/>
                        <ol class="breadcrumb mb-4" style="background:#286DE7;">
                            <li class="breadcrumb-item active" style="color:white;">Details of My Initial Student Passes</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                               Details of My Intial student Passes.
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Passport Number</th>
                                                <th>R number</th>
                                                <th>KPP Number</th>
                                                <th>Date Issued</th>
                                                <th>Duration</th>
                                                <th>Expiry Date</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Name</th>
                                                <th>Passport Number</th>
                                                <th>R number</th>
                                                <th>KPP Number</th>
                                                <th>Date Issued</th>
                                                <th>Duration</th>
                                                <th>Expiry Date</th>
                                                <th>Actions</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <tr>
                                                <td>John Doe</td>
                                                <td>AB 2918292</td>
                                                <td>240410</td>
                                                <td>09876</td>
                                                <td>03/04/2019</td>
                                                <td>2 Years</td>
                                                <td>03/04/2019</td>

                                                <td>
                                                <a href="#" class="btn btn-primary a-btn-slide-text">
                                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                                                <span><strong>View</strong></span>            
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