<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('success_stories', function (Blueprint $table) {
      $table->id();

      $table->json('title');
      $table->json('description');

      $table
        ->foreignId('service_id')
        ->references('id')
        ->on('services')
        ->cascadeOnDelete();

      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('success_stories');
  }
};
