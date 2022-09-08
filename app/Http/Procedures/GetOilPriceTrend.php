<?php

declare(strict_types=1);

namespace App\Http\Procedures;

use Illuminate\Http\Request;
use Sajya\Server\Procedure;

class GetOilPriceTrend extends Procedure
{
    /**
     * The name of the procedure that will be
     * displayed and taken into account in the search
     *
     * @var string
     */
    public static string $name = 'oil';

    /**
     * Execute the procedure.
     *
     * @param Request $request
     *
     * @return string
     */
    public function trend(Request $request)
    {
        # TODO: implement this
        return 'ok';
    }
}
