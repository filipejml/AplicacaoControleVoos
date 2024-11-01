@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Cadastro de Voo</h1>
    
    <form action="{{ route('flights.store') }}" method="POST">
        @csrf
        
        <!-- Informações Gerais -->
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="flight_number">Número do Voo:</label>
                <input type="text" name="flight_number" class="form-control" required>
            </div>
            <div class="col-md-6 mb-3">
                <label for="airline">Companhia Aérea:</label>
                <select name="airline" class="form-control" required>
                    <option value="Pop">Pop</option>
                    <option value="Fast Travel">Fast Travel</option>
                    <option value="Gluck Airlines">Gluck Airlines</option>
                    <option value="Air Odysseia">Air Odysseia</option>
                    <option value="World Wide">World Wide</option>
                    <option value="Singapura Airlines">Singapura Airlines</option>
                    <option value="Alpha">Alpha</option>
                    <option value="Skyways">Skyways</option>
                    <option value="Ryoko Airlines">Ryoko Airlines</option>
                    <option value="AraSky">AraSky</option>
                    <option value="Outback">Outback</option>
                    <option value="Jurassic Pax">Jurassic Pax</option>
                    <option value="Reis">Reis</option>
                </select>
            </div>
        </div>
        
        <!-- Tipo de Voo e Aeronave -->
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="flight_type">Tipo de Voo:</label>
                <select name="flight_type" class="form-control" required>
                    <option value="Regular">Regular</option>
                    <option value="Charter">Charter</option>
                </select>
            </div>
            <div class="col-md-6 mb-3">
                <label for="aircraft_type">Tipo de Aeronave:</label>
                <select name="aircraft_type" class="form-control" required>
                    <option value="PC">PC</option>
                    <option value="MC">MC</option>
                    <option value="LC">LC</option>
                </select>
            </div>
        </div>

        <!-- Quantidade e Horário -->
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="flight_count">Quantidade de Voos:</label>
                <input type="number" name="flight_count" class="form-control" required>
            </div>
            <div class="col-md-6 mb-3">
                <label for="flight_time">Horário do Voo:</label>
                <select name="flight_time" class="form-control" required>
                    <option value="EAM">EAM</option>
                    <option value="AM">AM</option>
                    <option value="AN">AN</option>
                    <option value="PM">PM</option>
                </select>
            </div>
        </div>
        
        <!-- Seção de Notas -->
        <h5 class="mt-4">Notas de Avaliação</h5>
        <div class="row">
            <div class="col-md-4 mb-3">
                <label for="objective_rating">Nota de Objetivos:</label>
                <select name="objective_rating" class="form-control" required>
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                    <option value="D">D</option>
                    <option value="E">E</option>
                    <option value="F">F</option>
                </select>
            </div>
            <div class="col-md-4 mb-3">
                <label for="punctuality_rating">Nota de Pontualidade:</label>
                <select name="punctuality_rating" class="form-control" required>
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                    <option value="D">D</option>
                    <option value="E">E</option>
                    <option value="F">F</option>
                </select>
            </div>
            <div class="col-md-4 mb-3">
                <label for="service_rating">Nota de Serviços:</label>
                <select name="service_rating" class="form-control" required>
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                    <option value="D">D</option>
                    <option value="E">E</option>
                    <option value="F">F</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="yard_rating">Nota de Pátio:</label>
                <select name="yard_rating" class="form-control" required>
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                    <option value="D">D</option>
                    <option value="E">E</option>
                    <option value="F">F</option>
                </select>
            </div>
            <div class="col-md-6 mb-3">
                <label for="relationship_rating">Nota de Relacionamento:</label>
                <select name="relationship_rating" class="form-control" required>
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                    <option value="D">D</option>
                    <option value="E">E</option>
                    <option value="F">F</option>
                </select>
            </div>
        </div>

        <!-- Quantidade de Passageiros -->
        <div class="row">
            <div class="col-md-6 mb-4">
                <label for="passenger_count">Quantidade de Passageiros:</label>
                <input type="number" name="passenger_count" class="form-control" required>
            </div>
        </div>
        
        <!-- Botão de Submissão -->
        <button type="submit" class="btn btn-primary">Cadastrar Voo</button>
    </form>
</div>
@endsection
