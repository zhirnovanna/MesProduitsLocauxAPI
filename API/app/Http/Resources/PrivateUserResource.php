<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PrivateUserResource extends JsonResource
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
          'email'=> $this->email,
          'lastname'=> $this->lastname,
          'firstname'=> $this->firstname,
          'city'=> $this->city,
          'pc'=> $this->pc,
          'phone'=> $this->phone,
          'admin'=> $this->admin,
          'address'=> $this->address

    ];
  }
}
