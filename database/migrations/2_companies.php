<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('avatar_url')->nullable();
            $table->foreignId('owner_id');
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });


        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->unique();
            $table->foreignId('company_id');
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });


        Schema::create('viewers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->unique();
            $table->string('device')->nullable();
            $table->string('device_token')->nullable();
            $table->timestamps();
        });
        Schema::create('company_viewer', function (Blueprint $table) {
            $table->primary(['company_id', 'viewer_id']);
            $table->foreignId('company_id');
            $table->foreignId('viewer_id');
            $table->boolean('is_active')->default(true);
        });


        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->unique();
            $table->string('name');
            $table->timestamps();
        });
        Schema::create('company_customer', function (Blueprint $table) {
            $table->primary(['company_id', 'customer_id']);
            $table->foreignId('company_id');
            $table->foreignId('customer_id');
            $table->boolean('is_active')->default(false);
        });


        Schema::create('estate_pricings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id');
            $table->boolean('is_default')->default(false);
//            $table->float('total_price')->default(0);
//            $table->float('meter_square_price')->default(0);
//            $table->float('meter_square_area')->default(0);
            $table->string('name');
            $table->string('key');
            $table->unique(['company_id', 'key']);
            $table->timestamps();
        });


    }
};
