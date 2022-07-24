<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class SocialMedia extends Model
{
  use HasFactory, HasTranslations;

  public $translatable = [
    'title',
  ];

  protected $fillable = ['title', 'link', 'icon'];
}
