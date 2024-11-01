<?php

namespace App\Http\Controllers;

use App\Models\Flight;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // Método index no DashboardController
    public function index()
    {
        // Total de voos
        $totalFlights = Flight::count();
        
        // Total de passageiros
        $totalPassengers = Flight::sum('passenger_count');
        
        // Total de voos por companhia aérea
        $flightsByAirline = Flight::select('airline')
            ->selectRaw('COUNT(*) as count')
            ->groupBy('airline')
            ->get();

        // Média das notas
        $averageRatings = [
            'objective' => Flight::avg('objective_rating'),
            'punctuality' => Flight::avg('punctuality_rating'),
            'service' => Flight::avg('service_rating'),
            'yard' => Flight::avg('yard_rating'),
            'relationship' => Flight::avg('relationship_rating'),
        ];

        // Preparando os dados para os gráficos
        $airlines = $flightsByAirline->pluck('airline')->toArray();
        $flightCounts = $flightsByAirline->pluck('count')->toArray();

        return view('dashboard.index', compact('totalFlights', 'totalPassengers', 'airlines', 'flightCounts', 'averageRatings'));
    }

}
