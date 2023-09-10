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
        Schema::create('news_logs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('news_id'); // reference to news
            $table->string('action'); // e.g. "created", "updated", "deleted"
            $table->timestamps();
            
            $table->foreign('news_id')->references('id')->on('news')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news_logs');
    }
};
