@extends('layouts.master')
@section('content')
   <padron-list url="{{route('users.get')}}"></padron-list>
@endsection
@section('scripts')
<script src="{{asset(mix('js/userslist.js'))}}"></script>
@endsection
