<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class SuccessStory extends Model
{
  use HasFactory, HasTranslations;

  public $translatable = [
    'title',
    'description'
  ];

  protected $fillable = ['title', 'description', 'service_id', 'is_active'];

  /**
   * The attributes that should be cast.
   *
   * @var array
   */
  protected $casts = [
    'title'                     => 'array',
    'description'               => 'array',
  ];

  public function image()
  {
    return $this->hasOne(SuccessStoryImage::class, 'success_story_id');
  }

  public function images()
  {
    return $this->hasMany(SuccessStoryImage::class, 'success_story_id');
  }

  /**
   * get is_active attribute as a boolean.
   */
  public function getIsActiveAttribute()
  {
    return (bool) $this->attributes['is_active'];
  }
}
