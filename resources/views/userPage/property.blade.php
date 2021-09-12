@extends('userPage/_subLayout')

@section('title')
Properti
@endsection

@section('contents')
{{ Request::is('property') }}
<!-- Hello -->
@endsection