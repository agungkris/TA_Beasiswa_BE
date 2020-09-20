<?php

namespace Modules\Scholarship\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;

class ScholarshipAnnouncementResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return [
            "id" => $this->id,
            "period_id" => $this->period_id,
            "title" => $this->title,
            "description" => $this->description,
            "document" =>  $this->document != null ? asset('upload/' . $this->document) : null,
            "created_at" => $this->created_at,
            "updated_at" => $this->updated_at,
            "period" => $this->period,
        ];
    }
}
