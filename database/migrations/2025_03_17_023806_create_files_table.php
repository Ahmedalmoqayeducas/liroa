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
        Schema::create('files', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('path');
            $table->string('mime_type');
            $table->bigInteger('size');
            $table->foreignId('folder_id')->nullable()->constrained('folders')->onDelete('cascade');
            $table->foreignId('admin_id')->nullable()->constrained('admins','id')->nullOnDelete();
            $table->softDeletes(); // <-- تفعيل الحذف الناعم
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('files');
    }
};
