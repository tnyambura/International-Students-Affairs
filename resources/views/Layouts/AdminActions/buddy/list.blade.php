@extends('Layouts.AdminActions.buddy.index')
@section('buddy_content')
<div class="container-fluid buddy-contents active" id="buddies_list"><br/>
    <div class="breadcrumb mb-4 d-flex  align-items-center" style="background:#113C7A;">
        <span class="breadcrumb-item active" style="color:white;">Number of all buddies </span>
        <span class="ml-4 badge badge-warning">{{sizeOf($buddies)}}</span>
    </div>
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <div>
                <i class="fas fa-table mr-1"></i>
                List of Trained Buddies.
            </div>
            <div class='d-flex align-items-center'>

                <form action='{{route("add.GeneratePDF")}}' method='post'>@csrf
                    <input type="hidden" name="function" value='getallAllBuddiesReport'>
                    <button type='submit'>
                    <i role='button' style='color:red; font-size:30px;' class='far fa-file-pdf'></i>
                    </button>
                </form>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead class="thead">
                        <tr>
                            <th>id</th>
                            <th>Name</th>
                            <th>email</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(sizeOf($buddies) === 0)
                        <tr>
                            <td colspan="4">No Buddy found</td>
                        </tr>
                        @endif
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
                                        if(confirm('Do you want to remove {{$buddy->surname." ".$buddy->other_names}} as a buddy? All the allocated students will be deallocated.')){
                                            $('body').find('.loader-load-container').removeClass('d-none')
                                            $('body').find('.loader-load-container').addClass('d-flex')
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
@endsection