@extends('layouts.master')
@section('content')
   <padron-list url="{{route('padron.get')}}"></padron-list>
@endsection
@section('scripts')
<script src="{{asset(mix('js/padronlist.js'))}}"></script>
@endsection
