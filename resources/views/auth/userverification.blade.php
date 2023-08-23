@extends('auth.forgot-password',['title'=>'Forgot Password'])
@section('content')
    <!-- <h2 class=" mb-5" style='color:#113C7A; font-size: 25px; font-weight: 800;'>Forgot Password</h2> -->

    <form method="POST" action="{{ route('forgotPassUVer') }}">
    @csrf
        <!-- <x-auth-validation-errors class="breadcrumb py-0 mb-4 d-flex align-items-center bg-danger" style="color:#fff; text-align:left;" :errors="$errors" /> -->
    <!-- 2 column grid layout with text inputs for the first and last names -->
        <div class="input-field w-full rounded-md relative ">
            <div class='flex bg-white overflow-hidden rounded-md'>
                <label class="absolute text-[15px] translate-y-[50%] left-[10px] text-slate-400" for="username">SU Id | Email</label>
                <input type="text" class="w-full p-2 pt-4 outline-none " name='username' onfocusin="inputFocusIn(event)" onfocusout="inputFocusOut(event)" id="username">
                <i class="fa fa-lock px-4 flex place-items-center place-content-center"></i>
            </div>
            <small class="text-red-500 text-xs">@error('username') {{$message}} @enderror</small>
        </div>
        <div class="sub-btn w-full mt-10 grid place-items-center place-content-center">
            <button type="submit" class="py-2 px-4 w-[150px] rounded text-white bg-[#D0A153]">Verify</button>
        </div>

        <div class="form-footer w-full p-2">
            <h3 class='mb-4 text-[15px] text-slate-300'>More links</h3>
            <div class="more-links-container text-sm">
                @if($more_links)
                @foreach($more_links as $v)
                    @if($v['title'] !== 'Forgot Password' && $v['title'] !== 'Sign up')
                    <a href="{{$v['link']}}" class="more-link p-1">
                        <i class="{{$v['icon']}} pr-2"></i>{{$v['title']}}
                    </a>
                    @endif
                @endforeach
                @endif
            </div>
        </div>
    </form>
@endsection