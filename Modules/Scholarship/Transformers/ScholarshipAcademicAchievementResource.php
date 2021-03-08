<?php

namespace Modules\Scholarship\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;

class ScholarshipAcademicAchievementResource extends JsonResource
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
            "id" => $this->id,
            "achievement_id" => $this->achievement_id,
            "semester_id" => $this->semester_id,
            "student_id" => $this->student_id,
            "ip" => $this->ip,
            "sks" => $this->sks,
            "ipk" => $this->ipk,
            "description" => $this->description,
            "khs" => $this->khs != null ? asset('upload/' . $this->khs) : null,
            "created_at" => $this->created_at,
            "updated_at" => $this->updated_at,
            "semester" => $this->semester,
            "student" => $this->student,
            "achievement" => $this->achievement
        ];
    }
}
