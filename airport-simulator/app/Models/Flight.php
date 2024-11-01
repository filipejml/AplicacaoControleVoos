<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    use HasFactory;

    // Definindo os atributos que podem ser preenchidos em massa
    protected $fillable = [
        'flight_number',
        'airline',
        'flight_type',
        'aircraft_type',
        'flight_count',
        'flight_time',
        'objective_rating',
        'punctuality_rating',
        'service_rating',
        'yard_rating',
        'relationship_rating',
        'passenger_count',
        'created_at', // opcional se você estiver usando timestamps automáticos
        'updated_at', // opcional se você estiver usando timestamps automáticos
    ];

    // Se você tiver timestamps automáticos
    public $timestamps = true;
}
