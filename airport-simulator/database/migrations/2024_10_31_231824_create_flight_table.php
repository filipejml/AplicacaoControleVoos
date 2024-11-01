<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFlightsTable extends Migration
{
    public function up()
    {
        Schema::create('flights', function (Blueprint $table) {
            $table->id();
            $table->string('flight_number')->unique();
            $table->string('airline');
            $table->enum('flight_type', ['Regular', 'Charter']);
            $table->enum('aircraft_type', ['PC', 'MC', 'LC']);
            $table->integer('flight_count');
            $table->enum('flight_time', ['EAM', 'AM', 'AN', 'PM']);
            $table->integer('objective_rating');
            $table->integer('punctuality_rating');
            $table->integer('service_rating');
            $table->integer('yard_rating');
            $table->integer('relationship_rating');
            $table->integer('passenger_count');
            $table->timestamps(); // Isso adiciona created_at e updated_at automaticamente
        });
    }

    public function down()
    {
        Schema::dropIfExists('flights');
    }
}

