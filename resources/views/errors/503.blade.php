@extends('errors::minimal',['passwordError'=>false])

@section('title', __('Service Unavailable'))
@section('code', '503')
@section('message', __('Service Unavailable'))
