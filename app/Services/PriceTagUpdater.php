<?php

namespace App\Services;

use App\Models\OilPriceTag;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;

class PriceTagUpdater
{
  const OIL_PRICE_TAGS_URL = 'https://datahub.io/core/oil-prices/r/brent-daily.json';

  public static function perform()
  {
    $response = Http::get(self::OIL_PRICE_TAGS_URL);
    if ($response->status() != 200) { return false; }

    DB::transaction(function () use ($response) {
      OilPriceTag::truncate();
      OilPriceTag::insert($response->json());
    });

    return true;
  }
}
