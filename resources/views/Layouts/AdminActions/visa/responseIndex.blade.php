

@extends('Layouts.AdminActions.visa.index',
    [
        'newVisaReq'=>$newVisaReq,
        'BdCountReq'=>$BdCountReq,
        'data'=>$data,
        'applicationStatus'=>$applicationStatus,
        'visarequests'=>$visarequests,
        'ext_applicationStatus'=>$ext_applicationStatus,
        'extApproved'=>$extApproved,
        'extProgress'=>$extProgress,
        'extDeclined'=>$extDeclined,
        'kppApproved'=>$kppApproved,
        'kppProgress'=>$kppProgress,
        'kppDeclined'=>$kppDeclined
    ])
    @section('data_content')
        <div class="container-fluid buddy-contents active" id="visa_responses"><br/>
            <div class="tab-nav d-flex mb-4 mt-0 justify-content-between">
                <div class="d-flex">
                    <a href='/visa/response/approved' class="tab-link sub-tab active" role='button' data-load-target='#approved'>
                        <div style='color:var(--primary)'>
                            <i class="fa fa-check mr-1"></i>
                            <span >Approved Visas</span>
                        </div>
                    </a>
                    <a href='/visa/response/in-progress' class="tab-link sub-tab" role='button' data-load-target='#in-progress'>
                        <div style='color:var(--success)'>
                            <i class="fa fa-spinner mr-1"></i>
                            <span >Progress Visas</span>
                        </div>
                    </a>
                    <a href='/visa/response/declined' class="tab-link sub-tab" role='button' data-load-target='#declined'>
                        <div style='color:var(--danger)'>
                            <i class="fa fa-ban mr-1"></i>
                            <span >Declined Visas</span>
                        </div>
                    </a>
                </div>
                <form action='{{route("add.exportExcel")}}' method='post'>@csrf
                    <input type="hidden" name="title" value='List of all visa applications {{date("Y")}}'>
                    <input type="hidden" name="from" value='visa'>
                    <button type='submit' style='outline:none'>
                    <i role='button' style='color:green; font-size:20px;' class='far fa-file-excel ml-3'></i>
                    </button>
                </form>
            </div>
            <div class='subTab-container'>
                
                @yield('subtabs_content')
            </div>
        </div>
    @endsection