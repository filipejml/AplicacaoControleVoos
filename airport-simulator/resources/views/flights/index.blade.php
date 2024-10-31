@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista de Vôos</h1>
    <a href="{{ route('flights.create') }}" class="btn btn-primary">Cadastrar Voo</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Número do Voo</th>
                <th>Companhia Aérea</th>
                <th>Tipo de Voo</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($flights as $flight)
            <tr>
                <td>{{ $flight->id }}</td>
                <td>{{ $flight->flight_number }}</td>
                <td>{{ $flight->airline }}</td>
                <td>{{ $flight->flight_type }}</td>
                <td>
                    <!-- Ações, como editar e deletar, podem ser adicionadas aqui -->
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
