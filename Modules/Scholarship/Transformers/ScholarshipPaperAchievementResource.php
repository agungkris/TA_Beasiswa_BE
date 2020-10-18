<?php

namespace Modules\Scholarship\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;

class ScholarshipPaperAchievementResource extends JsonResource
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
            "id" =>$this->id,
            "semester_id" =>$this->semester_id,
            "student_id" =>$this->student_id,
            "title" =>$this->title,
            "document" =>$this->document != null ? asset('upload/' . $this->document) : null,
            "created_at" =>$this->created_at,
            "updated_at" =>$this->updated_at,
            "semester" =>$this->semester,
            "student" =>$this->student,
        ];
    }
}
