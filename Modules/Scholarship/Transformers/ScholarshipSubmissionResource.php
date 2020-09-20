<?php

namespace Modules\Scholarship\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;

class ScholarshipSubmissionResource extends JsonResource
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
            "student_id" => $this->student_id,
            "period_id" => $this->period_id,
            "submit_form" => asset('upload/' . $this->submit_form),
            "brs" => asset('upload/' . $this->brs),
            "rapor" => asset('upload/' . $this->rapor),
            "cv" => asset('upload/' . $this->cv),
            "papers" => asset('upload/' . $this->papers),
            "other_requirements" => asset('upload/' . $this->other_requirements),
            "presentation" => $this->presentation,
            "papers_score" => $this->papers_score,
            "comment" => $this->comment,
            "next_stage" => $this->next_stage,
            "final_stage" => $this->final_stage,
            "created_at" => $this->created_at,
            "updated_at" => $this->updated_at,
            "period" => $this->period,
            "student" => $this->student,
        ];
    }
}
