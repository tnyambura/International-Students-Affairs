
@if(Session::has('username')) 
@php $username= Session::get('username'); @endphp
@extends('auth.forgot-password',['title'=>'Reset Password'])
@section('content')

@if(Session::has('success'))
    <a href="/" style='!important; text-decoration: underline; text-underline-offset: 10px;' class=" text-white underline btn btn-primary btn-block mb-4">
        Click here to Login to yor account Now...
    </a>
@else
    <div class="breadcrumb mb-4 bg-light text-sm text-[#9e9e9e]" >
        <ul >
            <li>We redirected you to this page, to strengthen your password.</li>
            <li>Your Password must: </li><br/>
            <div class='pass-rules'>
                <li id='leng'>Contain at least 8 characters</li>
                <li id='num'>Contain at least 1 number</li>
                <li id='lwc'>Contain lowercase</li>
                <li id='cap'>Contain at lease 1 uppercase</li> 
                <li id='chr'>Contain at least 1 special character. Acceptable: .,!,@,#,$,%,^,&,*,_ </li>
            </div>
        </ul>
    </div>

    <form method="POST" class='grid gap-4' action="{{ route('forgotPassNew') }}">
    @csrf
        <x-auth-validation-errors class="breadcrumb py-0 mb-4 d-flex align-items-center bg-danger" style="color:#fff; text-align:left;" :errors="$errors" />
        <input type="hidden" class="w-full p-2 pt-4 outline-none " name='username' value='{{$username}}'>
        <div class='flex bg-white overflow-hidden rounded-md'>
            <label class="absolute text-[15px] translate-y-[50%] left-[10px] text-slate-400" for="new_pass">New Password</label>
            <input type="password" class="w-full p-2 pt-4 outline-none " name='new_pass' onfocusin="inputFocusIn(event)" onfocusout="inputFocusOut(event)" id="new_pass">
            <i class="fa fa-lock px-4 flex place-items-center place-content-center"></i>
        </div>
        <div class='flex bg-white overflow-hidden rounded-md'>
            <label class="absolute text-[15px] translate-y-[50%] left-[10px] text-slate-400" for="conf_pass">Confirm Password</label>
            <input type="password" class="w-full p-2 pt-4 outline-none " name='conf_pass' onfocusin="inputFocusIn(event)" onfocusout="inputFocusOut(event)" id="conf_pass">
            <i class="fa fa-lock px-4 flex place-items-center place-content-center"></i>
        </div>
        <div class="sub-btn w-full mt-5 grid place-items-center place-content-center">
            <button type="submit" class="py-2 px-4 w-[150px] rounded text-white bg-[#D0A153]">Reset Password</button>
        </div>
    </form>
@endif
<script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
<script defer>
    $(document).ready(function() {
        let len=$('#leng'),num=$('#num'),lwc=$('#lwc'),cap=$('#cap'),chr=$('#chr')
        
        function PassValidation(theVal){
            if(theVal.length >= 8){
                len.addClass('pass')
            }else{len.removeClass('pass')}
            if(theVal.match(/[a-z]/)){
                lwc.addClass('pass')
            }else{lwc.removeClass('pass')}
            if(theVal.match(/[A-Z]/)){
                cap.addClass('pass')
            }else{cap.removeClass('pass')}
            if(theVal.match(/[0-9]/)){
                num.addClass('pass')
            }else{num.removeClass('pass')}
            if(theVal.match(/[.*,!,@,#,$,%,^,&,*,-,_]/)){
                chr.addClass('pass')
            }else{chr.removeClass('pass')}
        }
        $('#new_pass').bind('paste',function(e){
            let theVal = $(this).val()
            PassValidation(theVal)
        })
        $('#new_pass').on('keyup',function(e){
            let theVal = $(this).val()
            PassValidation(theVal)
        })
    })
</script>
@endsection
@else <script> window.location='/' </script> @endif