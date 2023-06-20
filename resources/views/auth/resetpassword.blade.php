
@if(Session::has('username')) 
@php $username= Session::get('username'); @endphp
@extends('auth.forgot-password',['title'=>'Reset Password'])
@section('content')
<style> 
/* ..................... */
</style>

@if(Session::has('update_success'))
    <a href="/" style='background: #113C7A !important;' class="btn btn-primary btn-block mb-4">
        Login to My account Now...
    </a>
@else
    <!-- <h2 class=" mb-5" style='color:#113C7A; font-size: 25px; font-weight: 800;'>Reset Password</h2> -->
    <div class="pass-message-display active" style=" border-radius:10px;">
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

    <form method="POST" action="{{ route('forgotPassNew') }}">
    @csrf
        <x-auth-validation-errors class="breadcrumb py-0 mb-4 d-flex align-items-center bg-danger" style="color:#fff; text-align:left;" :errors="$errors" />
    <!-- 2 column grid layout with text inputs for the first and last names -->

    <div class="row row-cols-auto">
        <div class="col mb-4">
        <div class="form-outline">
            <input type="hidden" name="username" value='{{$username}}' />
            <input type="password" id='newpassInput' name="new_pass" required autofocus class="form-control" />
            <label class="form-label mt-2" for="form3Example1">New Password</label>
            <input type="password" name="conf_pass" required autofocus class="form-control" />
            <label class="form-label mt-2" for="form3Example1">Confirm Password</label>
        </div>
        </div>
    </div>
    <button type="submit" style='background: rgb(199, 140, 22) !important; color:#fff; outline:transparent;' class="btn w-100 mb-4">
        Reset Password
    </button>
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
        $('#newpassInput').bind('paste',function(e){
            let theVal = $(this).val()
            PassValidation(theVal)
        })
        $('#newpassInput').on('keyup',function(e){
            let theVal = $(this).val()
            PassValidation(theVal)
        })
    })
</script>
@endsection
@else <script> window.location='/' </script> @endif