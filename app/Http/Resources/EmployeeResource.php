<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EmployeeResource extends JsonResource
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
            'lastName' => $this->lastName,
            'firstName' => $this->firstName,
            'email' => $this->email,
            'image' => $this->profile_image,
            'last_log' => $this->last_login_at     
        ];
    }
}
