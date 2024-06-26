<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OurStoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=> $this->id,
            'heading'=> $this->heading,
            'about_us' => $this->about_us,
            'vision' => $this->vision,
            'history' => $this->history,
            'cover' => $this->cover,
        ];
    }
}
