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
    Schema::create('services', function (Blueprint $table) {
      $table->id();
      $table->json('title');
      $table->json('description');
      $table->json('other_advantage')->nullable();
      $table->json('service_conditions')->nullable();
      $table->json('subscription_in_service')->nullable();
      $table->json('questions')->nullable();
      $table->json('service_slogan')->nullable();

      $table->string('image');
      $table->boolean('is_main_service')->default(0);

      $table
        ->foreignId('service_id')
        ->nullable()
        ->references('id')
        ->on('services')
        ->cascadeOnDelete();

      $table->boolean('is_active')->default(1);
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
    Schema::dropIfExists('services');
  }
};
