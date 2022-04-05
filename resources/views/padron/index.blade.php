@extends('layouts.master')
@section('content')
@if(auth()->user()->enabled)
   <padron-list url="{{route('padron.get')}}"
                url-banner="{{ asset('img/slider1.jpeg') }}"
                url-numeros="{{route('padron.getNumeros')}}">
    </padron-list>
@else
    <h2>SU USUARIO NO SE ENCUENTRA HABILITADO, CONSULTE CON UN ADMINISTRADOR DEL SISTEMA</h2>
@endif
@endsection
@section('scripts')

@endsection
