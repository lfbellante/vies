<?php

namespace Lfbellante\Vies\Http\Resources;

use Lfbellante\Vies\Traits\AddressTrait;
use Illuminate\Http\Resources\Json\JsonResource;

class Company extends JsonResource
{
    use AddressTrait;

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'vatId' => $this->vatNumber,
            'companyName' => $this->name,
            'address' => $this->format(),
        ];
    }
}
