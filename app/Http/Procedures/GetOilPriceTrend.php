<?php

declare(strict_types=1);

namespace App\Http\Procedures;

use App\Models\OilPriceTag;
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
    public function trend(Request $request, $from_date, $to_date)
    {
        $validatedData = $request->validate([
            'from_date' => 'required|date',
            'to_date' => 'required|date',
        ]);

        $from = date($from_date);
        $to = date($to_date);

        $result = OilPriceTag::select('date','price')->whereBetween('date', [$from, $to])->get();

        # TODO: some pagination may be a good idea here
        return $result->toJson();
    }
}
