<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class TeamRole extends Model
{
  use HasFactory, HasTranslations;

  public $translatable = [
    'title',
    'description'
  ];

  /**
   * The attributes that are mass assignable.
   *
   * @var array<int, string>
   */
  protected $fillable = [
    'title',
    'description'
  ];

  public function members()
  {
    return $this->hasMany(TeamMember::class, 'team_role_id');
  }
}
