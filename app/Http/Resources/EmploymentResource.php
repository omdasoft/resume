<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\EmploymentDeatilsResource;
class EmploymentResource extends JsonResource
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
            'designation' => $this->designation,
            'company' => $this->company,
            'country' => $this->country,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'until_now' => $this->until_now,
            'employment_details' => EmploymentDeatilsResource::collection($this->employmentDetails)
        ];
    }
}
