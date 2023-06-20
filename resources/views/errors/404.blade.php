@extends('errors::minimal',['passwordError'=>false])

@section('title', __('Not Found'))
@section('code', '404')
@section('message', __('Sorry the page you are looking for could not be found!'))
