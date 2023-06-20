@extends('errors.minimal',['passwordError'=>true])
@section('title','SU|Replace Password')
@section('passwordReset')

@if(!Hash::check('123456',Auth::user()->password))
<div style="margin-bottom:50px;margin-top:20px; margin-inline:50px;">
    <p style='font-weight: bold; font-size: 50px;'>200</p>    
    <p style=''> 
You have successfully Changed your Password. click below to proceed to your account!</p>    
</div>
<div class='link-back' style="margin-block:50px;">
    <a href='/'>Go back Home</a>  
</div>
@else

@if(Session::has('password_error'))
<div class="alert alert-danger" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
{{Session::get('password_error')}}
</div>
@endif

@if(Session::has('password_success'))
<div class="alert alert-success" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
{{Session::get('password_success')}}
</div>
@endif
<main class='pass-change-container'>
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
    <form method="POST" class='pt-5 px-4 d-flex flex-column align-items-center' action="{{route('add.replacePassword')}}" >
        @csrf
            
        <div class="col">
        <label for="newpassInput">New Password</label>
        <input type="password" name='password' id='newpassInput' class="form-control">
        </div>
    
        <div class="col">
        <label for="cpass">Confirm Password</label>
        <input type="password" name='confirm_password' id='cpass' class="form-control">
        </div>
        <button class="my-5 w-75 btn text-capitalize " id="btnSubmit" type="submit" style=' background:#fff; border:2px solid rgb(17,60,122); color: rgb(17,60,122);'>Send</button>
    </form>
</main>

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
@endif
@endsection