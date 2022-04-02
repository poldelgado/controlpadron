@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">NUEVA LISTA</div>
                <form method="POST" action="{{ route('lista.store') }}">
                @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <label class="visually-hidden" for="autoSizingInputGroup">NOMBRE DE LISTA</label>
                                <div class="input-group">
                                <div class="input-group-text">NOMBRE DE LISTA</div>
                                <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{ old('nombre') }}" required autofocus>
                                @error('nombre')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                            </div>
                            <div class="col-md-4 mt-2">
                                <div class="form-check form-switch">
                                    <label class="form-check-label" for="partido_propio">LISTA PROPIA</label>
                                    <input class="form-check-input" type="checkbox" role="switch" id="partido_propio" value="{{true}}" name="partido_propio">
                                  </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">
                                <strong>CREAR</strong>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
