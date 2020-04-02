{{-- @extends('layouts.app')

@section('content')
<my-header></my-header>
<router-view></router-view>
<my-footer></my-footer>
@endsection --}}


@extends('layouts.app')
@section('content')
@if(Auth::check())
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
