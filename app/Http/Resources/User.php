<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class User extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $gavatar = $this->email ? 'https://www.gravatar.com/avatar/'
            . md5( strtolower( trim( $this->email ) ) ) : '';

        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'gavatar' => $gavatar,
            'created_at' => $this->created_at->toAtomString(),
            'updated_at' => $this->updated_at->toAtomString(),
            'deleted_at' => optional($this->deleted_at)->toAtomString(),
        ];
    }
}
