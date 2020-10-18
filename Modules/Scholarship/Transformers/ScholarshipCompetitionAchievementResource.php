<?php

namespace Modules\Scholarship\Transformers;
use Illuminate\Http\Resources\Json\JsonResource;

class ScholarshipCompetitionAchievementResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return[
            "id" => $this->id,
            "semester_id" => $this->semester_id,
            "student_id" => $this->student_id,
            "activity" => $this->activity,
            "level" => $this->level,
            "realization" => $this->realization,
            "result" => $this->result,
            "document" => $this->document != null ? asset('upload/' . $this->document) : null,
            "created_at" => $this->created_at,
            "updated_at" => $this->updated_at,
            "semester" => $this->semester,
            "student" => $this->student,
        ];
    }
}
