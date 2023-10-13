<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\QuestionDetailResource;

class QuestionResource extends JsonResource
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
            'name' => $this->name,
            'type' => $this->getQuestionType->code,
            'relationship' => $this->relationship,
            'relationship_answer' => $this->relationship_answer,
            'question_detail' => in_array($this->getQuestionType->code, array('CHECKBOX','RADIO_BUTTON','RADIO_BUTTON_RANGE','SORT'))?QuestionDetailResource::collection($this->getQuestionDetail):array()
        ];
    }
}
