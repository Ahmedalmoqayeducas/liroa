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
        Schema::create('team', function (Blueprint $table) {
            $table->id();
            $table->string('emp_name');
            $table->string('employment_name');
            $table->string('email')->unique();
            $table->longText('description');
            $table->string('picture')->default('user2.png');
            $table->string('phone')->nullable();
            $table->string('facebook')->nullable();
            $table->string('linked_in')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teams');
    }
};
