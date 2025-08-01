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
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->text('title')->nullable();
            $table->string('page_heading')->nullable();
            $table->text('slug')->nullable();
            $table->text('meta_description')->nullable();
            $table->longtext('schema')->nullable();
            $table->longtext('content')->nullable();
            $table->string('appearance_type')->nullable();
            $table->string('status')->default(1);
            $table->string('type')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pages');
    }
};
