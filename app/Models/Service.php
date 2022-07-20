<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
  use HasFactory;

  protected $fillable = [
    'title',
    'description',
    'other_advantage',
    'service_conditions',
    'service_id',
    'image',
    'service_slogan',
    'subscription_in_service',
    'questions'
  ];

  /**
   * The attributes that should be cast.
   *
   * @var array
   */
  protected $casts = [
    'title'                     => 'array',
    'description'               => 'array',
    'other_advantage'           => 'array',
    'service_conditions'        => 'array',
    'service_slogan'            => 'array',
    'subscription_in_service'   => 'array',
    'questions'                 => 'array',
  ];

  public function subServices()
  {
    return $this->hasMany(Service::class, 'service_id');
  }

  public function serviceAdvantages()
  {
    return $this->hasMany(ServiceAdvantage::class, 'service_id');
  }
}
