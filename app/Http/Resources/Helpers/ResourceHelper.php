<?php

namespace App\Http\Resources\Helpers;


class ResourceHelper
{
  static function toArray(string | array $item)
  {
    return is_string($item) ? json_decode($item) : $item;
  }
}
