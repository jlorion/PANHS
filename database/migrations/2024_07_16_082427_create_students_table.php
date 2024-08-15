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
        Schema::create('students', function (Blueprint $table) {
            $table->id()->unique();
            $table->string('name');
            $table->longText('img')->nullable();
            $table->boolean('dropped')->default(false);
            $table->foreignId('class_id')->nullable()->references('id')->on('classes')->onUpdate('cascade')->onDelete('set null'); //doubt pls work amen
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
