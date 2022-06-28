<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServicePoint extends Model
{
  use HasFactory;

  protected $fillable = ['name', 'address', 'working_hours', 'phone', 'second_phone', 'city_id'];

  public function city()
  {
    return $this->belongsTo(City::class, 'city_id');;
  }

  /**
   * The attributes that should be cast.
   *
   * @var array
   */
  protected $casts = [
    'name'            => 'array',
    'address'         => 'array',
    'working_hours'   => 'array',
  ];
}
