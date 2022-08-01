<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Service extends Model
{
  use HasFactory, HasTranslations;

  public $translatable = [
    'title',
    'description',
    'other_advantage',
    'service_conditions',
    'service_slogan',
    'subscription_in_service',
    'questions'
  ];

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

  public function mainService()
  {
    return $this->belongsTo(Service::class, 'service_id');
  }

  public function successStories()
  {
    return $this->hasMany(SuccessStory::class, 'service_id');
  }

  /**
   * get is_active attribute as a boolean.
   */
  public function getIsActiveAttribute()
  {
    return (bool) $this->attributes['is_active'];
  }
}
