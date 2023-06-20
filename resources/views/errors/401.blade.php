@extends('errors::minimal',['passwordError'=>false])

@section('title', __('Unauthorized'))
@section('code', '401')
@section('message', __('Unauthorized'))
