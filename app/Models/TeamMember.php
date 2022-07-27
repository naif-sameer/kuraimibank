<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class TeamMember extends Model
{
  use HasFactory, HasTranslations;

  public $translatable = [
    'role',
  ];

  /**
   * The attributes that are mass assignable.
   *
   * @var array<int, string>
   */
  protected $fillable = [
    'name',
    'image',
    'role',
    'team_role_id'
  ];
}
