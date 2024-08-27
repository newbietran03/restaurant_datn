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
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('lang')->nullable();
            $table->string('tieuDe')->nullable();
            $table->text('tomTat')->nullable();
            $table->string('slug')->nullable();
            $table->string('urlHinh', 200)->nullable();
            $table->text('noiDung')->nullable();
            $table->integer('xem')->default(0);
            $table->unsignedBigInteger('idLT');
            $table->unsignedBigInteger('id_user');
            $table->integer('anHien')->default(1);
            $table->text('tags')->nullable();
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('idLT')->references('id')->on('news')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};
