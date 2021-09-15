<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Task extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'taskid'         => $this->taskid,
            'taskname'       => $this->taskname,
            'projectid'         => $this->projectid,
            'username'       => $this->username,
            'hours'         => $this->hours,


        ];
    }
}
