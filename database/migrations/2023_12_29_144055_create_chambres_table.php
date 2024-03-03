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
        Schema::create('chambres', function (Blueprint $table) {
            $table->id();
            $table->foreignId("type_id")->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->string("description");
            $table->integer("superficier")->default(20);
            $table->enum("etage",['RDC',1,2,3]);
            $table->decimal("prix")->nullable();
            $table->timestamps();
            $table->engine("InnoDB");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chambres');
    }
};
