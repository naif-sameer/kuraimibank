<?php

namespace App\Http\Resources;

use App\Http\Resources\Helpers\ResourceHelper;
use Illuminate\Http\Resources\Json\JsonResource;

class OurPartnerResource extends JsonResource
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

      "title"           => ResourceHelper::toArray($this->title),
      "description"     => ResourceHelper::toArray($this->description),
      "image"           => $this->image,
    ];
  }
}
