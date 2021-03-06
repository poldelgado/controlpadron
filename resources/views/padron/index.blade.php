@extends('layouts.master')
@section('content')
@if(auth()->user()->enabled)
   <padron-list admin="{{Auth::user()->admin}}"
                url="{{route('padron.get')}}"
                url-banner="{{ asset('img/lista_plural_candidatos.jpg') }}"
                url-banner-estamento="{{'img/lista_plural_estamento.jpg'}}"
                url-numeros="{{route('padron.getNumeros')}}">
    </padron-list>
@else
    <h2>SU USUARIO NO SE ENCUENTRA HABILITADO, CONSULTE CON UN ADMINISTRADOR DEL SISTEMA</h2>
@endif
@endsection
@section('scripts')

@endsection
