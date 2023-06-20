@extends('Layouts.AdminActions.adminMaster',['title'=>'Visa Application','newVisaReq'=>$newVisaReq,'BdCountReq'=>$BdCountReq])
@section('content')
<nav class="d-flex align-items-center top-title-sticky" style='position:sticky; top:0; z-index:2999; padding:8px; background:#fff; width:100%; height: 56px;'>
    <span>Visa Application</span>
</nav>

    <div class="tab-nav d-flex mb-2 ">
        <a href='/visa/kpps/request' style='text-decoration:none !important;' class="tab-link main-tab active" role='button' data-load-target='#kpps'>
            <div style='color:var(--primary)'>
                <i class="far fa-address-card mr-1"></i>
                <span >Kpps Application Requests</span>
                @if(sizeOf($data) > 0)
                    <span class="badge badge-warning ml-3">{{sizeOf($data)}}</span>
                @endif
            </div>
        </a>
        <a href='/visa/extension/request' style='text-decoration:none !important;' class="tab-link main-tab" role='button' data-load-target='#extension'>
            <div class='d-flex align-items-center' style='color:var(--success)'>
                <i class="material-icons mr-2" style="color:var(--success)">extension</i>
                <span >Visa Extension Requests</span>
                @if(sizeOf($visarequests) > 0)
                    <span class="badge badge-warning ml-3">{{sizeOf($visarequests)}}</span>
                @endif
            </div>
        </a>
        <a href='/visa/response/approved' style='text-decoration:none !important;' class="tab-link main-tab" role='button' data-load-target='#response'>
            <div class='d-flex align-items-center' style='color:var(--info)'>
                <i class="fas fa-table mr-1"></i>
                <span >Visa Responses</span>
            </div>
        </a>
    </div>
    @if(Session::has('user_update_success'))
    <div class="alert alert-success" role="alert">
    {{Session::get('user_update_success')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    </div>
    @endif 
    @if(Session::has('user_update_failed'))
    <div class="alert alert-danger" role="alert">
    {{Session::get('user_update_failed')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    </div>
    @endif 
    @if(Session::has('download_success') )
    <div class="alert alert-success" role="alert">
    {{Session::get('download_success')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    </div>
    @endif
    @if(Session::has('download_fail') )
    <div class="alert alert-danger" role="alert">
    {{Session::get('download_fail')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    </div>
    @endif

    @if(Session::has('email_send_success') )
    <div class="alert alert-success" role="alert">
    {{Session::get('email_send_success')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    </div>
    @endif
    @if(Session::has('email_send_fail') )
    <div class="alert alert-danger" role="alert">
    {{Session::get('email_send_fail')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    </div>
    @endif
    @if(Session::has('error') )
    <div class="alert alert-danger" role="alert">
    {{Session::get('error')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    </div>
    @endif

    <div claa='data-content-display'>
        @yield('data_content')
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
    <script defer>
        $(document).ready(function() {

            let url = location.href.split('visa')[1].split('/')[1]
            let urlSub = location.href.split('visa')[1].split('/')[2]

            $('body').find(`.main-tab[data-load-target="#${url}"]`).siblings('.main-tab').removeClass('active');
            $('body').find(`.main-tab[data-load-target="#${url}"]`).addClass('active');
            $('body').find(`.sub-tab[data-load-target="#${urlSub}"]`).siblings('.sub-tab').removeClass('active');
            $('body').find(`.sub-tab[data-load-target="#${urlSub}"]`).addClass('active');

        })
    </script>
@endsection