@extends('auth.forgot-password',['title'=>'Forgot Password'])
@section('content')
    <!-- <h2 class=" mb-5" style='color:#113C7A; font-size: 25px; font-weight: 800;'>Forgot Password</h2> -->

    <form method="POST" action="{{ route('forgotPassUVer') }}">
    @csrf
        <x-auth-validation-errors class="breadcrumb py-0 mb-4 d-flex align-items-center bg-danger" style="color:#fff; text-align:left;" :errors="$errors" />
    <!-- 2 column grid layout with text inputs for the first and last names -->
    <div class="row row-cols-auto">
        <div class="col mb-4">
        <div class="form-outline">
            <input type="text" name="username" required autofocus class="form-control" />
            <label class="form-label mt-2" for="form3Example1">SU Id | Email</label>
        </div>
        </div>
    </div>
    <button type="submit" style='background: rgb(199, 140, 22) !important; color:#fff; outline:transparent;' class="btn w-100 mb-4">
        Verify
    </button>
    </form>
@endsection