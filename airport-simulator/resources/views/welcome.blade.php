@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Bem-vindo à aplicação do Airport Simulator: Plane City</h1>
    <p>Total de Vôos Cadastrados: {{ $totalFlights ?? 0 }}</p>
    <p>Total de Passageiros Transportados: {{ $totalPassengers ?? 0 }}</p>
    <!-- Aqui você pode adicionar mais dados gerais -->
</div>
@endsection
