<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EducationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'degree' => $this->degree,
            'university' => $this->university,
            'faculty' => $this->faculty,
            'specialty' => $this->specialty,
            'from' => $this->from,
            'to' => $this->to
        ];
    }
}
