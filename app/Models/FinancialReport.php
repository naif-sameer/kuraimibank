<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class FinancialReport extends Model
{
  use HasFactory, HasTranslations;

  public $translatable = [
    'title',
    'description'
  ];

  protected $fillable = ['title', 'description', 'pdf'];

  /**
   * The attributes that should be cast.
   *
   * @var array
   */
  protected $casts = [
    'title'              => 'array',
    'description'        => 'array',
  ];

  /**
   * get is_active attribute as a boolean.
   */
  public function getIsActiveAttribute()
  {
    return (bool) $this->attributes['is_active'];
  }
}
