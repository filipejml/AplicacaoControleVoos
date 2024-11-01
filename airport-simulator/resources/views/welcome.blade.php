@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Bem-vindo ao Airport Simulator: Plane City</h1>

    <div class="row">
        <div class="col-md-6">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Total de Vôos Cadastrados</h5>
                    <p class="card-text display-4">{{ $totalFlights ?? 0 }}</p>
                </div>
            </div>
        </div>
        
        <div class="col-md-6">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Total de Passageiros Transportados</h5>
                    <p class="card-text display-4">{{ $totalPassengers ?? 0 }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Adicione mais cards aqui, caso queira exibir outros dados -->
</div>
@endsection
