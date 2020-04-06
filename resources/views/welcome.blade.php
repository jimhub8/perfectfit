@extends('layouts.app')
@section('content')
@if(Auth::check() || Auth::guard('seller')->check() || Auth::guard('admin')->check())
<my-header :user="{{ json_encode($auth_user) }}"></my-header>
<transition name="fade">
    <router-view :user="{{ json_encode($auth_user) }}"></router-view>
</transition>
@else
<my-header></my-header>
<transition name="fade">
    <router-view></router-view>
</transition>
@endif
    <my-footer></my-footer>
@endsection
