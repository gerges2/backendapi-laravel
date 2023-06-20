<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "name"=>$this[0]->name,
"email"=>$this[0]->email,
"password"=>$this[0]->password,
"barth_date"=>$this[0]->barth_date,
"roles"=>$this[0]->roles,
"token" => $this[1]
        ];
    }

}
