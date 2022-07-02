<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceAdvantage extends Model
{
  use HasFactory;

  protected $fillable = ['name', 'icon', 'service_id'];

  /**
   * The attributes that should be cast.
   *
   * @var array
   */
  protected $casts = [
    'name'    => 'array',
  ];
}
