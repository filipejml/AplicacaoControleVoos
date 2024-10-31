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
            'flight_number' => 'required|string|max:255',
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

        // Criação do novo registro de voo
        Flight::create([
            'flight_number' => $request->flight_number,
            'airline' => $request->airline,
            'flight_type' => $request->flight_type,
            'aircraft_type' => $request->aircraft_type,
            'flight_count' => $request->flight_count,
            'flight_time' => $request->flight_time,
            'objective_rating' => $request->objective_rating,
            'punctuality_rating' => $request->punctuality_rating,
            'service_rating' => $request->service_rating,
            'yard_rating' => $request->yard_rating,
            'relationship_rating' => $request->relationship_rating,
            'passenger_count' => $request->passenger_count,
        ]);

        return redirect()->route('flights.index')->with('success', 'Voo cadastrado com sucesso.');
    }
}
