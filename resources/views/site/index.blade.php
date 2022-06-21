@extends('layouts.app')
@section('left_nav')
    @include('site.left_nav_blade_group')
@endsection

@section('home')
    @include('site.home')
@endsection

@section('student_details')
    @include('site.student_details')
@endsection

@section('groups')
    @include('site.groups')
@endsection


@section('services')
    @include('site.services')
@endsection


{{-- @section('about')
    @include('site.about_us')
@endsection --}}


@section('contact')
    @include('site.contact')
@endsection

