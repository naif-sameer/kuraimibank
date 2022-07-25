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
    Schema::create('about_us', function (Blueprint $table) {
      $table->id();

      $table->json('title');
      $table->json('description');
      $table->json('who_are_we');
      $table->json('vision');
      $table->json('message');
      $table->json('clarity_transparency');
      $table->json('purpose');
      $table->json('commitment');

      $table->text('image');

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
    Schema::dropIfExists('about_us');
  }
};
