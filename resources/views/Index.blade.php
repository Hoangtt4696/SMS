@extends('master')

@section('title')
    @yield('title')
@endsection

@section('sidebar')
    @include('Sidebar')
@endsection

@section('header')
    @include('Header')
@endsection

@section('content')
    @yield('content')
@endsection