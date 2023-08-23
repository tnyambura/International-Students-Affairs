@if(Session::has('username')) 
@extends('auth.forgot-password',['title'=>'Code Confirm'])
@section('content')
    <!-- <h2 class=" mb-5" style='color:#113C7A; font-size: 25px; font-weight: 800;'>Confirm code</h2> -->
    @php $emailGetter = explode('@',Crypt::decrypt(Session::get('email'))); @endphp
    <div class="breadcrumb mb-4 bg-light text-sm text-[#9e9e9e]" >
        <p class="breadcrumb-item active">
        Verify, an email has been sent to {{mb_substr($emailGetter[0], 0, 3).'...@...'.mb_substr($emailGetter[1], 0, 3)}} with the code. <br/> 
        Do not close this page before completing the process<br/>
        Do not reload this page before completing the process<br/>
        Be also aware that you can contact the administrator to reset your password.
        </p>
    </div>

    <form method="POST" action="{{ route('forgotPassCodeVer') }}">
    @csrf
        <!-- <x-auth-validation-errors class="breadcrumb py-0 mb-4 d-flex align-items-center bg-danger" style="color:#fff; text-align:left;" :errors="$errors" /> -->
        
        <div class="input-field w-full rounded-md relative ">
            <input type="hidden" class="w-full p-2 pt-4 outline-none " name='username' value='{{Session::get("username")}}'>
            <div class='flex bg-white overflow-hidden rounded-md'>
                <label class="absolute text-[15px] translate-y-[50%] left-[10px] text-slate-400" for="verification_code">Verification Code</label>
                <input type="text" class="w-full p-2 pt-4 outline-none " name='verification_code' onfocusin="inputFocusIn(event)" onfocusout="inputFocusOut(event)" id="verification_code">
                <i class="fa fa-lock px-4 flex place-items-center place-content-center"></i>
            </div>
            <small class="text-red-500 text-xs">@error('verification_code') {{$message}} @enderror</small>
        </div>
        <div class="sub-btn w-full mt-10 grid place-items-center place-content-center">
            <button type="submit" class="py-2 px-4 w-[150px] rounded text-white bg-[#D0A153]">Verify</button>
        </div>
    </form>
@endsection
@else <script> window.location='/' </script> @endif