<?php

namespace App\Http\Resources;

use App\Http\Resources\Helpers\ResourceHelper;
use Illuminate\Http\Resources\Json\JsonResource;

class CountryResource extends JsonResource
{
  /**
   * Transform the resource into an array.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
   */
  public function toArray($request)
  {
    return [
      'id'              => $this->id,
      "is_active"       => (bool) $this->is_active,
      'created_at'      => $this->created_at,
      'updated_at'      => $this->updated_at,

      "title"           => $this->getTranslations('title'),
      "country_code"    => $this->country_code,
    ];
  }
}
