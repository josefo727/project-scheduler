<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;

class TaskResource extends JsonResource
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
            "resource" => $this->resource_id,
            "start" => Carbon::parse($this->start)->format('Y-m-d\TH:i:s'),
            "end" => Carbon::parse($this->end)->format('Y-m-d\TH:i:s'),
            "text" => $this->Work_Order_Code,
            'bubbleHtml' => 'Summary: '.$this->bubbleHtml,
            "barColor" => $this->barColor,
        ];
    }
}
