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
        Schema::create('works', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('price');
            $table->integer('user_id');
            $table->integer('field');
            $table->integer('type');
            $table->integer('suggestion');
            $table->string('area');
            $table->string('address');
            $table->integer('required_rank');
            $table->date('deadline_date');
            $table->date('start_date');
            $table->date('end_date');
            $table->string('summary');
            $table->string('compensation');
            $table->string('application_term');
            $table->string('attention');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('works');
    }
};
