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
            "submit_form" => $this->submit_form != null ? asset('upload/' . $this->submit_form) : "",
            "brs" => asset('upload/' . $this->brs),
            "raport" => asset('upload/' . $this->raport),
            "cv" => asset('upload/' . $this->cv),
            "papers" => asset('upload/' . $this->papers),
            "other_requirements" => $this->other_requirements != null ? asset('upload/' . $this->other_requirements) : "",
            "initial_ipk" => $this->initial_ipk,
            // "paper_assessments" => $this->paperAssessments,
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
