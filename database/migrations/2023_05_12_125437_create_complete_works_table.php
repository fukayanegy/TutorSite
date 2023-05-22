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
        Schema::create('complete_works', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('price');
            $table->integer('client_user_id');
            $table->integer('contractor_user_id');
            $table->integer('field');
            $table->integer('type');
            $table->string('area');
            $table->date('start_date');
            $table->date('end_date');
            $table->string('work_summary');
            $table->integer('client_valuation_num');
            $table->string('client_valuation_str');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('complete_works');
    }
};
