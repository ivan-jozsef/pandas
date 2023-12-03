<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PandaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $today = new \DateTime();
        $birth = new \DateTime($this->birth);
        $age = $birth->diff($today);
        
        return [
            "name" => $this->name,
            "sex" => $this->sex,
            "birth" => $this->birth,
            "age" => $age->format('%y')
        ];
    }
}
