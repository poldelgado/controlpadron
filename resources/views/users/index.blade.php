@extends('layouts.master')
@section('content')
   <user-list url="{{route('maquetado')}}"></user-list>
@endsection
@section('scripts')
<script src="{{mix('js/userslist.js')}}"></script>
@endsection
