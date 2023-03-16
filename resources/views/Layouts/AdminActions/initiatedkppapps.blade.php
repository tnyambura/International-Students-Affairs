@extends('Layouts.AdminActions.adminMaster')
@section('content')
                    <div class="container-fluid"><br/>
                        <ol class="breadcrumb mb-4" style="background:#286DE7;">
                            <li class="breadcrumb-item active" style="color:white;">Issued Student Pass Applications</li>
                        </ol>
                       
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                Issued Student Pass Applications.
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Passport No.</th>
                                                <th>Date Initiated</th>
                                                <th>Date Received</th>
                                                <th>Expiry Date</th>
                                                <th>EPASS No.</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Name</th>
                                                <th>Passport No.</th>
                                                <th>Date Initiated</th>
                                                <th>Date Received</th>
                                                <th>Expiry Date</th>
                                                <th>EPASS No.</th>
                                                <th>Actions</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <tr>
                                                <td>Johnnnnnn Doeeeeeeeee</td>
                                                <td>AB2930276</td>
                                                <td>03/04/2021</td>
                                                <td>03/04/2021</td>
                                                <td>Progress</td>
                                                <td>89776</td>

                                                <td>
                                                <a href="#" class="btn btn-success a-btn-slide-text">
                                                    <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
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