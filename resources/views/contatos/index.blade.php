@extends('contatos.layout')

@section('content')

<div class="container">
    <h1>Lista de contatos:</h1>

    <table class="table table-striped">
        <thead class="thead-light">
            <tr>
            <th scope="col">ID</th>
            <th scope="col">Nome</th>
            <th scope="col">Telefone</th>
            <th scope="col">E-Mail</th>
            <th scope="col">CEP</th>
            <th></th>
            <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ( $contatos as $contato )
            <tr>
                <th>{{ $contato->id}}</th>
                <th>{{ $contato->name}}</th>
                <th>{{ $contato->telefone}}</th>
                <th>{{ $contato->email}}</th>
                <th>{{ $contato->cep}}</th>
                <th>
                    <a href="/contatos/edit/{{$contato->id}}">
                        <button class="btn btn-info">Editar<i class="fa fa-pen"></i></button>
                    <a>
                </th>
                <th>
                    <a href="/contatos/exclude/{{$contato->id}}">
                        <button class="btn btn-danger"> Excluir <i class="fa fa-trash"></i></button>
                    </a>
                </th>
            @endforeach
            </tr>
        </tbody>
    </table>
</div>

@endsection