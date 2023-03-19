@extends('Layouts.AdminActions.adminMaster')
@section('content')
                <div class="container-fluid"><br/>
                        <ol class="breadcrumb mb-4" style="background:#113C7A;">
                            <li class="breadcrumb-item active" style="color:white;">New International Student Registration Portal</li>
                        </ol>             
                        @if(Session::has('New_Student_Added'))
                        <div class="alert alert-success" role="alert">
                        {{Session::get('New_Student_Added')}}
                        </div>
                        @endif
                        @if(Session::has('New_Student_failed'))
                        <div class="alert alert-danger" role="alert">
                        {{Session::get('New_Student_failed')}}
                        </div>
                        @endif
                               
                            </div>   
@endsection