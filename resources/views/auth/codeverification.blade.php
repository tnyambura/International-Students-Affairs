@if(Session::has('username')) 
@extends('auth.forgot-password',['title'=>'Code Confirm'])
@section('content')
    <!-- <h2 class=" mb-5" style='color:#113C7A; font-size: 25px; font-weight: 800;'>Confirm code</h2> -->
    @php $emailGetter = explode('@',Crypt::decrypt(Session::get('email'))); @endphp
    <div class="breadcrumb mb-4 bg-light" style="border:1px solid rgb(110,110,110); border-radius:10px;">
        <p class="breadcrumb-item active">
        Verify, an email has been sent to {{mb_substr($emailGetter[0], 0, 3).'...@...'.mb_substr($emailGetter[1], 0, 3)}} with the code. <br/> 
        Do not close this page before completing the process<br/>
        Do not reload this page before completing the process<br/>
        Be also aware that you can contact the administrator to reset your password.
    </p>
    </div>

    <form method="POST" action="{{ route('forgotPassCodeVer') }}">
    @csrf
        <x-auth-validation-errors class="breadcrumb py-0 mb-4 d-flex align-items-center bg-danger" style="color:#fff; text-align:left;" :errors="$errors" />
    <!-- 2 column grid layout with text inputs for the first and last names -->
    <div class="row row-cols-auto">
        <div class="col mb-4">
        <div class="form-outline">
            <input type="hidden" name="username" value='{{Session::get("username")}}' />
            <input type="text" name="verification_code" required autofocus class="form-control" />
            <label class="form-label mt-2" for="form3Example1">Verification Code</label>
        </div>
        </div>
    </div>
    <button type="submit" style='background: rgb(199, 140, 22) !important; color:#fff; outline:transparent;' class="btn w-100 mb-4">
        Verify...
    </button>
    </form>
@endsection
@else <script> window.location='/' </script> @endif