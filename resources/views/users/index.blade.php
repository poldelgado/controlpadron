@extends('layouts.master')
@section('content')
   <user-list></user-list>
@endsection
@section('scripts')
<script src="{{mix('js/userslist.js')}}"></script>
@endsection
