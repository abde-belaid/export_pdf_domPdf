<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create("chambre_user",function(Blueprint $table){
            $table->id();
            $table->timestamps();
            $table->foreignId("chambre_id")->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId("user_id")->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->date("date_arrivee");
            $table->date("date_depart");
$table->engine("InnoDB");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chambre_user');
        
    }
};
