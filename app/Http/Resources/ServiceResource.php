<?php

namespace App\Http\Resources;

use App\Http\Resources\Helpers\ResourceHelper;
use Illuminate\Http\Resources\Json\JsonResource;

class ServiceResource extends JsonResource
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
      'id'                  => $this->id,
      "is_active"           => $this->is_active,
      'created_at'          => $this->created_at,
      'updated_at'          => $this->updated_at,

      "title"               => $this->getTranslations('title'),
      "description"         => $this->getTranslations('description'),
      "other_advantage"     => $this->getTranslations('other_advantage'),
      "service_conditions"  => $this->getTranslations('service_conditions'),
      "service_id"          => $this->service_id,
      "sub_services"        => $this->subServices,
      "service_advantages"  => ServiceAdvantageResource::collection($this->serviceAdvantages),
      "image"               => url('uploads/images', $this->image),
    ];
  }
}
