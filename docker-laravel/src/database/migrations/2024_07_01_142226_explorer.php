<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
        public function up(): void
        {
            Schema::create('explorers', function (Blueprint $table) {
                $table->id();
                $table->timestamps();
                $table->string('nome');
                $table->integer('idade');
                $table->string('inventario');
    
                
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
