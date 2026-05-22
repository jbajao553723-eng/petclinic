<?php

    use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('pets', function (Blueprint $table) {
            $table->id();

            // owner (client)
            $table->foreignId('user_id')
                  ->constrained()
                  ->onDelete('cascade');

            $table->string('name');
            $table->string('species'); // Dog, Cat, etc
            $table->string('breed')->nullable();
            $table->integer('age')->nullable();
            $table->string('gender')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pets');
    }
};