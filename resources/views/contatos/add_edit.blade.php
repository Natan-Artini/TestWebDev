@extends('contatos.layout')

@section('content')

<!--Exemplo de componente
--- Arquivo esta em Resources -> js
--- Registra no app.js
-->

@if(isset($contato))
    <form-component :contato="{{$contato}}">
    </form-component>
@else
    <form-component>
    </form-component>
@endif

@endsection