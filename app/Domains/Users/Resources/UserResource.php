<?php

namespace App\Domains\Users\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'reference_code' => $this->reference_code,
            'name' => $this->name,
            'email' => $this->email
        ];
    }
}
