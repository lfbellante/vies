<?php

namespace Lfbellante\Vies\Traits;

use Illuminate\Support\Str;

trait AddressTrait {

    /**
     * @return array
     */
    public function format(): array
    {
        $address = Str::of($this->address)->explode(PHP_EOL);
        $cityDetails = Str::of($address[1])->explode(' ');

        return [
            'street' => $address[0],
            'city' => $cityDetails[1],
            'province' => $cityDetails[2],
            'postalCode' => $cityDetails[0],
        ];
    }
}