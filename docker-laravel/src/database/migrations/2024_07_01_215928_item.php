<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nome');
            $table->float('valor')->default(0.00);

            $table->unsignedBigInteger('explorers_id');
            $table->foreign('explorers_id')->references('id')->on('explorers')->onDelete('cascade');

            $table->unsignedBigInteger('locations_id');
            $table->foreign('locations_id')->references('id')->on('locations')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }


};
