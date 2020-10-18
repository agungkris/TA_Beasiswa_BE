<?php

namespace Modules\Scholarship\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;

class ScholarshipOrganizationAchievementResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return[
            "id" => $this->id,
            "semester_id" => $this->semester_id,
            "student_id" => $this->student_id,
            "name" => $this->name,
            "period" => $this->period,
            "position" => $this->position,
            "document" => $this->document != null ? asset('upload/' . $this->document) : null,
            "created_at" => $this->created_at,
            "updated_at" => $this->updated_at,
            "semester" => $this->semester,
            "student"  => $this->student,
        ];
    }
}
