@extends('layouts.app')

@section('content')
<div class="container" style="max-width: 100%;">
    <h1 class="mt-3">Lista de Vôos</h1>
    
    <!-- Seleção de Tabela -->
    <div class="mb-4">
        <label for="tableSelect" class="form-label">Selecione a Tabela para Exibir:</label>
        <select id="tableSelect" class="form-select">
            <option value="general-info">Informações Gerais do Voo</option>
            <option value="evaluation-notes">Notas de Avaliação</option>
        </select>
    </div>

    <!-- Formulário de Pesquisa por Companhia Aérea e Botão de Cadastro -->
    <form method="GET" action="{{ route('flights.index') }}" class="mb-4 d-flex align-items-center gap-3">
        <div class="input-group">
            <select name="airline" class="form-select" aria-label="Select Airline">
                <option value="">Selecione a Companhia Aérea</option>
                @foreach(['Prosperity Lines', 'Pop', 'Fast Travel', 'Gluck Airlines', 'Air Odysseia', 'World Wide', 'Singapura Airlines', 'Alpha', 'Skyways', 'Ryoko Airlines', 'AraSky', 'Outback', 'Jurassic Pax', 'Reis'] as $airline)
                    <option value="{{ $airline }}" {{ isset($selectedAirline) && $selectedAirline == $airline ? 'selected' : '' }}>{{ $airline }}</option>
                @endforeach
            </select>
            <button type="submit" class="btn btn-primary">Pesquisar</button>
        </div>
        <a href="{{ route('flights.create') }}" class="btn btn-success">Cadastrar Voo</a>
    </form>
    

    <!-- Tabela de Informações Gerais do Voo -->
    <div id="general-info" class="table-responsive mb-4">
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

    <!-- Tabela de Notas de Avaliação -->
    <div id="evaluation-notes" class="table-responsive" style="display: none;">
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

<script>
    document.getElementById('tableSelect').addEventListener('change', function() {
        var generalInfo = document.getElementById('general-info');
        var evaluationNotes = document.getElementById('evaluation-notes');
        
        if (this.value === 'general-info') {
            generalInfo.style.display = 'block';
            evaluationNotes.style.display = 'none';
        } else if (this.value === 'evaluation-notes') {
            generalInfo.style.display = 'none';
            evaluationNotes.style.display = 'block';
        }
    });
</script>
@endsection
