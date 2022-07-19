<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExchangeRate extends Model
{
  use HasFactory;

  protected $fillable = ['title', 'sale', 'buy'];

  /**
   * The attributes that should be cast.
   *
   * @var array
   */
  protected $casts = [
    'title'            => 'array',
  ];
}
