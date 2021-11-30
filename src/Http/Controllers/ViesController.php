<?php

namespace Lfbellante\Vies\Http\Controllers;

use App\Http\Controllers\Controller;
use Lfbellante\Vies\Http\Resources\Company;
use RicorocksDigitalAgency\Soap\Facades\Soap;
use Throwable;

class ViesController extends Controller
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
     * @param string $vatId
     * @param  string  $countryCode
     * @return \never|Company
     */
    public function checkVat(string $vatId, string $countryCode = 'IT'): \never|Company
    {
        $company = Soap::to(config('vies.endpoint'))
            ->call('checkVat',
                [
                    'vatNumber' => $vatId,
                    'countryCode' => $countryCode
                ]
            );

        if ($company->valid) {
            return new Company($company);
        }

        return abort(404);
    }
}
