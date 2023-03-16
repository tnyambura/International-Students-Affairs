@extends('Layouts.AdminActions.adminMaster')
@section('content')
                    <div class="container-fluid"><br/>
                        <ol class="breadcrumb mb-4" style="background:#286DE7;">
                            <li class="breadcrumb-item active" style="color:white;">List of Student pass Application Requests</li>
                        </ol>
                       
                        
                       
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                               List of Student Pass Application Requests.
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
                                          </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
               @endsection