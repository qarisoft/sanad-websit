<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->primary(['company_id']);
            $table->foreignId('company_id')->constrained()->cascadeOnDelete();
            $table->enum('red_per', ['h', 'm', 'd'])->default('h');
            $table->enum('blue_per', ['h', 'm', 'd'])->default('h');
            $table->integer('red_minutes')->default(0);
            $table->integer('blue_minutes')->default(0);
            $table->timestamps();
        });
    }
};
