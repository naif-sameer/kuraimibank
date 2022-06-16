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
    Schema::create('service_points', function (Blueprint $table) {
      $table->id();
      $table->json('name');
      $table->json('address');
      $table->json('working_hours');
      $table->string('phone');
      $table->string('second_phone');

      $table
        ->foreignId('city_id')
        ->references('id')
        ->on('cities')
        ->onDelete('cascade');

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
    Schema::dropIfExists('service_points');
  }
};
