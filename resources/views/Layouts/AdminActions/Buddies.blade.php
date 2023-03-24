@extends('Layouts.AdminActions.adminMaster')
@section('content')
        <div class="container-fluid"><br/>
           
            
            <div class="row">
                            <!-- <div class="col-xl-3 col-md-6">
                                <div class="card bg-secondary text-white mb-4" data-toggle="modal" data-target="#RegisterBuddyModal">
                                    <div class="card-body">Register A New trained and qualified Buddy</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <span class="small text-white stretched-link" >Register A new Buddy</span>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div> -->
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4" width='100'>
                                    <div class="card-body">View All Buddy Requests</div>
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
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div>
                        <i class="fas fa-table mr-1"></i>
                        List of Trained Buddies.
                    </div>
                    <a class="btn btn-success" width='100' href="{{__('ListOfBuddies')}}" style="float:right"><span class="fa fa-spinner fa-spin fa-1x fa-fw" aria-hidden="true"></span>Generate Report</a>
                </div>
                <div class="card-body">

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

                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Name</th>
                                    <th>email</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>id</th>
                                    <th>Name</th>
                                    <th>email</th>
                                    <th>Actions</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach($buddies as $buddy)
                                    <tr>
                                        <td>{{$buddy->id}}</td>
                                        <td>{{$buddy->surname.' '.$buddy->other_names}}</td>
                                        <td>{{$buddy->email}}</td>
                                        <td>
                                            <form method="POST" action="{{route('add.dismissBd')}}">
                                                @csrf
                                                <input type="hidden" name="bd_id" value="{{$buddy->id}}"/>
                                                <div role='button' id="rmvBd_{{$buddy->id}}"><span class="fas fa-trash" aria-hidden="false"></span> Remove as Buddy</div>
                                            </form>
                                        </td>
                                        <script>
                                            document.querySelector("#rmvBd_{{$buddy->id}}").addEventListener('click',function(e){
                                                e.preventDefault()
                                                if(confirm('Do you want to remove {{$buddy->surname.' '.$buddy->other_names}} as a buddy? All the allocated students will have a pending status in the request table')){
                                                    this.parentNode.submit()
                                                }
                                            })
                                        </script>
                                    </a>  
                                    </tr>
                                @endforeach
                                </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade " id="RegisterBuddyModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h4 class="modal-title w-100 font-weight-bold">Register New Buddy</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="POST" action="{{ __('AddUser') }}" class='new-staff-form p-4'>
                        @csrf

                        <!-- surNAME -->
                        <div class="form-row">
                            <div class="col-md-4 mb-3">   
                                <label for="surNAME">Surname</label>  
                                <input id="surNAME" class="form-control" type="text" name="surNAME" required autofocus />
                            </div></br>
                            <!-- otherNAMES -->
                            <div class="col-md-4 mb-3">            
                            <label for="otherNAMES">Other names</label>  
                                <input id="otherNAMES" class="form-control" type="text" name="otherNAMES" required autofocus />
                            </div></br>

                            <!-- suID or Username -->
                            <div class="col-md-4 mb-3">            
                            <label for="suID">suID</label>  
                                <input id="suID" class="form-control" type="number" name="suID" required autofocus />
                            </div></br>

                            <!-- Email Address -->
                            <div class="col-md-4 mb-3">            
                            <label for="email">Email</label>  
                                <input id="email" class="form-control" type="text" name="email" required autofocus />
                            </div>
                            <div class="col-md-4 mb-3"> 
                                <label for="role_id">Register as:</label>  
                                <select name="user_role" id="role_id" class="form-control">
                                    <option value='buddy' selected > Buddy</option>
                                </select>
                            </div></br>
                        
                        </div>
                        <br/>
                        <div class="form-row justify-content-center">

                            <div class="flex items-center justify-end mt-4">
                            <input class="btn btn-success" value="Save details" type="submit" />
                            
                            </div>
                        </div>
                    </form>
                    <br/>
                </div>
            </div>
        </div>
           
@endsection