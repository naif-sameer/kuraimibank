<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceAdvantage extends Model
{
  use HasFactory;

  protected $fillable = ['title', 'description', 'service_id'];

  /**
   * The attributes that should be cast.
   *
   * @var array
   */
  protected $casts = [
    'title'    => 'array',
    'description'    => 'array',
  ];
}
