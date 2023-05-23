<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;

class CreateTachesTable extends Migration
{
    
    public function up()
    {
        Schema::create('taches', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->constrained()->onDelete('cascade');
            $table->string('name_tache');
            $table->string('type');
            $table->string('description');
            $table->string('pieces_de_rechange')->nullable();
            $table->string('etat')->nullable();
            $table->string('photo')->nullable();
            $table->string('cause')->nullable();
            $table->timestamps();
        });
    }

   
    public function down()
    {
        Schema::dropIfExists('taches');
    }
}
