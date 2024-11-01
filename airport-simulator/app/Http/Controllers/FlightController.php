<?php

namespace App\Http\Controllers;

use App\Models\Flight;
use Illuminate\Http\Request;

class FlightController extends Controller
{
    // Exibe a tela inicial com dados gerais
    public function welcome()
    {
        $totalFlights = Flight::count();
        $totalPassengers = Flight::sum('passenger_count');

        return view('welcome', compact('totalFlights', 'totalPassengers'));
    }

    // Lista todos os voos
    public function index()
    {
        $flights = Flight::all();
        return view('flights.index', compact('flights'));

        // Captura o parâmetro da companhia aérea da requisição
        $selectedAirline = $request->input('airline');
        
        // Busca os voos, filtrando por companhia aérea se selecionada
        if ($selectedAirline) {
            $flights = Flight::where('airline', $selectedAirline)->get();
        } else {
            $flights = Flight::all();
        }
        
        return view('flights.index', compact('flights', 'selectedAirline'));
    }

    // Exibe o formulário para criar um novo voo
    public function create()
    {
        return view('flights.create');
    }

    // Armazena um novo voo no banco de dados
    public function store(Request $request)
    {
        // Validação dos dados recebidos
        $request->validate([
            'flight_number' => 'required|string|max:255|unique:flights', // Assegure-se de que o número do voo seja único
            'airline' => 'required|string|max:255',
            'flight_type' => 'required|string|in:Regular,Charter',
            'aircraft_type' => 'required|string|in:PC,MC,LC',
            'flight_count' => 'required|integer|min:1',
            'flight_time' => 'required|string|in:EAM,AM,AN,PM',
            'objective_rating' => 'required|string|size:1|in:A,B,C,D,E,F',
            'punctuality_rating' => 'required|string|size:1|in:A,B,C,D,E,F',
            'service_rating' => 'required|string|size:1|in:A,B,C,D,E,F',
            'yard_rating' => 'required|string|size:1|in:A,B,C,D,E,F',
            'relationship_rating' => 'required|string|size:1|in:A,B,C,D,E,F',
            'passenger_count' => 'required|integer|min:0',
        ]);

        // Mapeamento das notas de letras para números
        $ratingMap = [
            'A' => 10,
            'B' => 9,
            'C' => 8,
            'D' => 6,
            'E' => 4,
            'F' => 2,
        ];

        // Criação do novo registro de voo com as notas convertidas
        Flight::create([
            'flight_number' => $request->flight_number,
            'airline' => $request->airline,
            'flight_type' => $request->flight_type,
            'aircraft_type' => $request->aircraft_type,
            'flight_count' => $request->flight_count,
            'flight_time' => $request->flight_time,
            'objective_rating' => $ratingMap[$request->objective_rating], // Conversão
            'punctuality_rating' => $ratingMap[$request->punctuality_rating], // Conversão
            'service_rating' => $ratingMap[$request->service_rating], // Conversão
            'yard_rating' => $ratingMap[$request->yard_rating], // Conversão
            'relationship_rating' => $ratingMap[$request->relationship_rating], // Conversão
            'passenger_count' => $request->passenger_count,
        ]);

        return redirect()->route('flights.index')->with('success', 'Voo cadastrado com sucesso.');
    }
}
