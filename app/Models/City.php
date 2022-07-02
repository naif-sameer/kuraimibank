<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
  use HasFactory;

  protected $fillable = ['name', 'country_id', 'city_code', 'is_active'];

  public function country()
  {
    return $this->belongsTo(Country::class, 'country_id');
  }

  /**
   * The attributes that should be cast.
   *
   * @var array
   */
  protected $casts = [
    'name'            => 'array',
  ];
}
