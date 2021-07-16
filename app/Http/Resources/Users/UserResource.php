<?php

namespace App\Http\Resources\Users;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $response['user'] = [
            'id' => $this->id,
            'first_name' => $this->first_name,
            'last_name' => $this->first_name,
            'mobile' => $this->mobile,
            'email' => $this->email,
        ];

        if (isset($this->token))
            $response['token'] = $this->token;

        return $response;
    }
}
