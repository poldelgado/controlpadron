@extends('layouts.master')
@section('content')
   <user-list url="{{route('users.get')}}"></user-list>
@endsection
@section('scripts')
<script src="{{asset(mix('js/userslist.js'))}}"></script>
@endsection
