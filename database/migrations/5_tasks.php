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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('code');

            $table->string('notes')->nullable();
            $table->boolean('is_published')->default(false);
            $table->boolean('is_online')->default(false);
            $table->boolean('is_available')->default(true);

            $table->foreignId('company_id')->constrained()->cascadeOnDelete();
            $table->foreignId('viewer_id')->nullable();
            $table->foreignId('customer_id');
            $table->foreignId('task_status_id')->default(1);
            $table->foreignId('city_id');
            $table->json('location');

            $table->timestamp('received_at')->nullable();
            $table->timestamp('must_do_at')->nullable();
            $table->timestamp('finished_at')->nullable();
            $table->timestamp('published_at')->nullable();

            $table->string('order_number')->nullable();
            $table->string('suk_number')->nullable();
            $table->string('license_number')->nullable();
            $table->string('scheme_number')->nullable();
            $table->string('piece_number')->nullable();

            $table->string('age')->nullable();
            $table->string('address')->nullable();
            $table->string('district')->nullable();
            $table->string('estate_type')->nullable();
            $table->string('near_south')->nullable();
            $table->string('near_north')->nullable();
            $table->string('near_west')->nullable();
            $table->string('near_east')->nullable();
            $table->string('company_feedback')->nullable();
            $table->json('attach')->nullable();
            $table->timestamps();

        });
        Schema::create('task_viewer', function (Blueprint $table) {
            $table->primary(['task_id', 'viewer_id']);
            $table->foreignId('task_id');
            $table->foreignId('viewer_id');
        });

        Schema::create('task_statuses', function (Blueprint $table) {
            $table->id();

            $table->foreignId('company_id')->nullable();
            $table->string('code');
            $table->unique(['company_id', 'code']);
            $table->boolean('is_default')->default(false);
            $table->string('name')->nullable();
            $table->string('color')->default('#ffffff00');
            $table->timestamps();
        });
        Schema::create('task_uploads', function (Blueprint $table) {
            $table->id();
            $table->foreignId('task_id');
            $table->foreignId('viewer_id')->nullable();
            $table->json('data')->nullable();
            $table->timestamps();
        });


    }
};
