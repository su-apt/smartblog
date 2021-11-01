@extends('layouts.app')

@section('title', __('About me'))

@section('content')

<h2>@lang('interface.welcome_to_website') : {{$username}}</h2>
<a href="clear-name">clear the name</a>
@endsection

