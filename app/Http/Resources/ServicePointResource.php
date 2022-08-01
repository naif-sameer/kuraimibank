<?php

namespace App\Http\Resources;

use App\Http\Resources\Helpers\ResourceHelper;
use Illuminate\Http\Resources\Json\JsonResource;

class ServicePointResource extends JsonResource
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
      "is_active"       => $this->is_active,
      'created_at'      => $this->created_at,
      'updated_at'      => $this->updated_at,

      "title"           => $this->getTranslations('title'),
      "address"         => $this->getTranslations('address'),
      "working_hours"   => $this->getTranslations('working_hours'),
      "phone"           => $this->phone,
      "second_phone"    => $this->second_phone,
      "city_id"         => $this->city_id,
      "city"            => new CityResource($this->city)
    ];
  }
}
