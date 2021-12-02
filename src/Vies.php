<?php

namespace Lfbellante\Vies;

use Illuminate\Support\Str;
use RicorocksDigitalAgency\Soap\Facades\Soap;
use Throwable;

class Vies
{
    /**
     * @throws Throwable
     */
    public function __construct()
    {
        throw_if(!config('vies'), 'Error, VIES file not found');
        throw_if(!config('vies.endpoint'), 'Error, VIES Endpoint not found');
    }

    /**
     * @param  string  $vatId
     * @param  string  $countryCode
     * @return array
     */
    public static function checkVat(string $vatId, string $countryCode = 'IT'): array
    {
       try {
            $company = Soap::to(config('vies.endpoint'))
                ->call('checkVat',
                    [
                        'vatNumber' => $vatId,
                        'countryCode' => $countryCode
                    ]
                );

            if ($company->valid) {
                return [
                    'vatId' => $company->vatNumber,
                    'companyName' => $company->name,
                    'address' => Vies::format($company->address),
                ];
            }

            return [];
        } catch (\Exception $exception) {
            return [];
        }
    }

    /**
     * @param $address
     * @return array
     */
    private static function format($address): array
    {
        if ($address != '***'){
            $address = Str::of($address)->explode(PHP_EOL);
            $cityDetails = Str::of($address[1])->explode(' ');

            return [
                'street' => $address[0],
                'city' => $cityDetails[1],
                'province' => $cityDetails[2],
                'postalCode' => $cityDetails[0],
            ];
        }

        return [];
    }
}
