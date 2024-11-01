@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Dashboard - Airport Simulator</h1>

    <!-- Informações Gerais -->
    <div class="row mb-4">
        <div class="col-md-3">
            <div class="card text-center">
                <div class="card-header">Total de Voos</div>
                <div class="card-body">
                    <h2>{{ $totalFlights }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-center">
                <div class="card-header">Total de Passageiros</div>
                <div class="card-body">
                    <h2>{{ $totalPassengers }}</h2>
                </div>
            </div>
        </div>
    </div>

    <!-- Gráfico de Voos por Companhia Aérea -->
    <div class="mb-4">
        <h2>Voos por Companhia Aérea</h2>
        <canvas id="flightsByAirlineChart" width="400" height="200"></canvas>
    </div>

    <!-- Gráfico de Médias das Notas -->
    <div class="mb-4">
        <h2>Média das Notas</h2>
        <canvas id="averageRatingsChart" width="400" height="200"></canvas>
    </div>
</div>

<script>
    // Gráfico de Voos por Companhia Aérea
    const ctx1 = document.getElementById('flightsByAirlineChart').getContext('2d');
    const flightsByAirlineChart = new Chart(ctx1, {
        type: 'bar',
        data: {
            labels: {!! json_encode($airlines) !!},
            datasets: [{
                label: 'Total de Voos',
                data: {!! json_encode($flightCounts) !!},
                backgroundColor: 'rgba(75, 192, 192, 0.6)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    // Gráfico de Médias das Notas
    const ctx2 = document.getElementById('averageRatingsChart').getContext('2d');
    const averageRatingsChart = new Chart(ctx2, {
        type: 'radar',
        data: {
            labels: ['Objetivos', 'Pontualidade', 'Serviços', 'Pátio', 'Relacionamento'],
            datasets: [{
                label: 'Média das Notas',
                data: [
                    {{ number_format($averageRatings['objective'], 2) }},
                    {{ number_format($averageRatings['punctuality'], 2) }},
                    {{ number_format($averageRatings['service'], 2) }},
                    {{ number_format($averageRatings['yard'], 2) }},
                    {{ number_format($averageRatings['relationship'], 2) }}
                ],
                backgroundColor: 'rgba(153, 102, 255, 0.6)',
                borderColor: 'rgba(153, 102, 255, 1)',
                borderWidth: 1
            }]
        },
        options: {
            elements: {
                line: {
                    tension: 0.1 // Para um gráfico mais suave
                }
            }
        }
    });
</script>
@endsection
