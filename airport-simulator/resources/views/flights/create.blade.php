@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Cadastrar Voo</h1>
    <form action="{{ route('flights.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="flight_number">Número do Voo</label>
            <input type="text" class="form-control" name="flight_number" required>
        </div>
        <div class="form-group">
            <label for="airline">Companhia Aérea</label>
            <input type="text" class="form-control" name="airline" required>
        </div>
        <div class="form-group">
            <label for="flight_type">Tipo de Voo</label>
            <select class="form-control" name="flight_type" required>
                <option value="Regular">Regular</option>
                <option value="Charter">Charter</option>
            </select>
        </div>
        <div class="form-group">
            <label for="aircraft_type">Tipo de Aeronave</label>
            <select class="form-control" name="aircraft_type" required>
                <option value="PC">PC</option>
                <option value="MC">MC</option>
                <option value="LC">LC</option>
            </select>
        </div>
        <div class="form-group">
            <label for="flight_count">Quantidade de Vôos</label>
            <input type="number" class="form-control" name="flight_count" required>
        </div>
        <div class="form-group">
            <label for="flight_time">Horário do Voo</label>
            <select class="form-control" name="flight_time" required>
                <option value="EAM">EAM</option>
                <option value="AM">AM</option>
                <option value="AN">AN</option>
                <option value="PM">PM</option>
            </select>
        </div>
        <div class="form-group">
            <label for="objective_rating">Nota de Objetivos</label>
            <select class="form-control" name="objective_rating" required>
                @foreach(['A', 'B', 'C', 'D', 'E', 'F'] as $rating)
                    <option value="{{ $rating }}">{{ $rating }}</option>
                @endforeach
            </select>
        </div>
        <!-- Adicione os outros campos de notas aqui -->
        <div class="form-group">
            <label for="passenger_count">Quantidade de Passageiros</label>
            <input type="number" class="form-control" name="passenger_count" required>
        </div>
        <button type="submit" class="btn btn-success">Cadastrar</button>
    </form>
</div>
@endsection
