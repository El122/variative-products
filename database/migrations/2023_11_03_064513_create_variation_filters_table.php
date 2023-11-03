<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('variation_filters', function (Blueprint $table) {
            $table->id();

            $table->string('value');

            $table->foreignId('variation_id');
            $table->foreignId('filter_id');
        });
    }

    public function down(): void {
        Schema::dropIfExists('variation_filters');
    }
};
