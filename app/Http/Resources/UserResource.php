<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $user = \App\Models\User::where('id', $this->id)->first();
        $userToken = $user->createToken('appToken')->plainTextToken;

        return [
            'id' => $this->id,
            'nome' => $this->name,
            'email' => $this->email,
            'token' => $userToken
        ];
    }
}
