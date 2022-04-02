@extends('layouts.master')
@section('content')
   <padron-list url="{{route('padron.get')}}"
                url-banner="{{ asset('img/slider1.jpeg') }}"
                url-numeros="{{route('padron.getNumeros')}}">
    </padron-list>
@endsection
@section('scripts')

@endsection
