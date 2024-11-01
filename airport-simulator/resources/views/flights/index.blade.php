@extends('layouts.app')

@section('content')
<div class="container" style="max-width: 100%;"> <!-- Ajuste a largura aqui -->
    <h1>Lista de Vôos</h1>
    
    <!-- Formulário de pesquisa por companhia aérea -->
    <form method="GET" action="{{ route('flights.index') }}" class="mb-3">
        <div class="input-group">
            <select name="airline" class="form-select" aria-label="Select Airline">
                <option value="">Selecione a Companhia Aérea</option>
                <option value="Prosperity Lines" {{ isset($selectedAirline) && $selectedAirline == 'Prosperity Lines' ? 'selected' : '' }}>Prosperity Lines</option>
                <option value="Pop" {{ isset($selectedAirline) && $selectedAirline == 'Pop' ? 'selected' : '' }}>Pop</option>
                <option value="Fast Travel" {{ isset($selectedAirline) && $selectedAirline == 'Fast Travel' ? 'selected' : '' }}>Fast Travel</option>
                <option value="Gluck Airlines" {{ isset($selectedAirline) && $selectedAirline == 'Gluck Airlines' ? 'selected' : '' }}>Gluck Airlines</option>
                <option value="Air Odysseia" {{ isset($selectedAirline) && $selectedAirline == 'Air Odysseia' ? 'selected' : '' }}>Air Odysseia</option>
                <option value="World Wide" {{ isset($selectedAirline) && $selectedAirline == 'World Wide' ? 'selected' : '' }}>World Wide</option>
                <option value="Singapura Airlines" {{ isset($selectedAirline) && $selectedAirline == 'Singapura Airlines' ? 'selected' : '' }}>Singapura Airlines</option>
                <option value="Alpha" {{ isset($selectedAirline) && $selectedAirline == 'Alpha' ? 'selected' : '' }}>Alpha</option>
                <option value="Skyways" {{ isset($selectedAirline) && $selectedAirline == 'Skyways' ? 'selected' : '' }}>Skyways</option>
                <option value="Ryoko Airlines" {{ isset($selectedAirline) && $selectedAirline == 'Ryoko Airlines' ? 'selected' : '' }}>Ryoko Airlines</option>
                <option value="AraSky" {{ isset($selectedAirline) && $selectedAirline == 'AraSky' ? 'selected' : '' }}>AraSky</option>
                <option value="Outback" {{ isset($selectedAirline) && $selectedAirline == 'Outback' ? 'selected' : '' }}>Outback</option>
                <option value="Jurassic Pax" {{ isset($selectedAirline) && $selectedAirline == 'Jurassic Pax' ? 'selected' : '' }}>Jurassic Pax</option>
                <option value="Reis" {{ isset($selectedAirline) && $selectedAirline == 'Reis' ? 'selected' : '' }}>Reis</option>
            </select>
            <button type="submit" class="btn btn-primary">Pesquisar</button>
        </div>
    </form>

    <!-- Botão de cadastro de voo alinhado à direita -->
    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('flights.create') }}" class="btn btn-primary">Cadastrar Voo</a>
    </div>

    <!-- Primeira Tabela: Informações Gerais do Voo -->
    <div class="table-responsive mb-4">
        <h2>Informações Gerais do Voo</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Número do Voo</th>
                    <th>Companhia Aérea</th>
                    <th>Tipo de Voo</th>
                    <th>Tipo de Aeronave</th>
                    <th>Quantidade de Voos</th>
                    <th>Horário do Voo</th>
                    <th>Quantidade de Passageiros</th>
                    <th class="text-center">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($flights as $flight)
                <tr>
                    <td>{{ $flight->id }}</td>
                    <td>{{ $flight->flight_number }}</td>
                    <td>{{ $flight->airline }}</td>
                    <td>{{ $flight->flight_type }}</td>
                    <td>{{ $flight->aircraft_type }}</td>
                    <td>{{ $flight->flight_count }}</td>
                    <td>{{ $flight->flight_time }}</td>
                    <td>{{ $flight->passenger_count }}</td>
                    <td class="text-center">
                        <a href="{{ route('flights.edit', $flight->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('flights.destroy', $flight->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Deletar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Segunda Tabela: Notas de Avaliação -->
    <div class="table-responsive">
        <h2>Notas de Avaliação</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Número do Voo</th>
                    <th>Companhia Aérea</th>
                    <th>Nota de Objetivos</th>
                    <th>Nota de Pontualidade</th>
                    <th>Nota de Serviços</th>
                    <th>Nota de Pátio</th>
                    <th>Nota de Relacionamento</th>
                </tr>
            </thead>
            <tbody>
                @foreach($flights as $flight)
                <tr>
                    <td>{{ $flight->id }}</td>
                    <td>{{ $flight->flight_number }}</td>
                    <td>{{ $flight->airline }}</td>
                    <td>{{ $flight->objective_rating }}</td>
                    <td>{{ $flight->punctuality_rating }}</td>
                    <td>{{ $flight->service_rating }}</td>
                    <td>{{ $flight->yard_rating }}</td>
                    <td>{{ $flight->relationship_rating }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
