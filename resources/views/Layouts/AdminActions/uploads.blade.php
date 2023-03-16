@extends('Layouts.AdminActions.adminMaster')
@section('content')
                    <div class="container-fluid"><br/>
                        <ol class="breadcrumb mb-4" style="background:#286DE7;">
                            <li class="breadcrumb-item active" style="color:white;">Uploaded Documents</li>
                        </ol>
                       
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                               Uploaded Documents.
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Admission</th>
                                                <th>Biodata</th>
                                                <th>Visa</th>
                                                <th>Passport Pic</th>
                                                <th>Academic Certs</th>
                                                <th>Good Conduct</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Admission</th>
                                                <th>Biodata</th>
                                                <th>Visa</th>
                                                <th>Passport Pic</th>
                                                <th>Academic Certs</th>
                                                <th>Good Conduct</th>
                                                <th>Actions</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <tr>
                                                <td>089654</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>

                                                <td>
                                                <a href="#">
                                                    <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
                                                    <span><strong>ViewDocs</strong></span>            
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