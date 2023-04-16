@extends('Layouts.AdminActions.adminMaster')
@section('content')
        <div class="container-fluid"><br/>
        
        @if(Session::has('user_update_success') )
        <div class="alert alert-success" role="alert">
        {{Session::get('user_update_success')}}
        </div>
        @endif
        @if(Session::has('user_update_failed') )
        <div class="alert alert-danger" role="alert">
        {{Session::get('user_update_failed')}}
        </div>
        @endif
            <div class="card p-3 mb-3 d-flex flex-row">
                <div>
                    <figure class='profile-figure d-flex justify-centent-center align-items-center'>
                        <img src="asset/img/logo.png" class="">
                    </figure>
                </div>
                <div class="d-flex flex-column flex-grow-1 pl-3" style='font-size:12px'>
                    <div class="container flex-grow-1" >
                        <div class="row">
                            <div class='col d-flex flex-column'>
                                <label for="id">Identity No</label>
                                <span class='font-weight-bold' id="id">{{Auth::user()->id}}</span>
                            </div>
                            <div class='col d-flex flex-column'>
                                <label for="surname">Surname</label>
                                <span class='font-weight-bold' id="surname">{{Auth::user()->surname}}</span>
                            </div>
                            <div class='col d-flex flex-column'>
                                <label for="othernames">Other names</label>
                                <span class='font-weight-bold' id="othernames">{{Auth::user()->other_names}}</span>
                            </div>
                            <div class='col d-flex flex-column'>
                                <label for="email">Email</label>
                                <span class='font-weight-bold' id="email">{{Auth::user()->email}}</span>
                            </div>
                        </div>
                    </div>
                    <div class='border-top'>
                        <div class='py-2' role='button' data-toggle="modal" data-target="#Viewuser">
                            <i class="fas fa-edit mr-1"></i> Modify Profile
                        </div>
                    </div>
                </div>
            </div>
            
            
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table mr-1"></i>
                    List of Student Pass Application Requests.
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                            <thead class="thead-dark">
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
                            
                            <tbody>
                            
                                </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        
           
@endsection