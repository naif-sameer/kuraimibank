<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
  use HasFactory;

  protected $fillable = ['name', 'description', 'other_advantage', 'service_conditions', 'category_id', 'image',];

  /**
   * The attributes that should be cast.
   *
   * @var array
   */
  protected $casts = [
    'name'                  => 'array',
    'description'           => 'array',
    'other_advantage'       => 'array',
    'service_conditions'    => 'array',
  ];
}
