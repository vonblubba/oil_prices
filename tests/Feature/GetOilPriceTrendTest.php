<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Sajya\Server\Testing\ProceduralRequests;

class GetOilPriceTrendTest extends TestCase
{
    use ProceduralRequests;

    /**
     * Test invalid date parameter
     *
     * @return void
     */
    public function test_invalid_date()
    {
        $response = $this
            ->setRpcRoute('rpc.endpoint')
            ->callProcedure('oil@trend', ['from_date' => 'invalid_date', 'to_date' => '2022-02-01'])
            ->assertJsonFragment([
                'message' => 'Invalid params'
            ]);
        // dd($response['error']['message']);
        // $response
        //     ->assertJsonFragment([
        //         'error.message' => 'Invalid params'
        //     ]);

    }

    /**
     * Test basic trend retrieval
     *
     * @return void
     */
    public function test_trend_retrieval()
    {
        $this
            ->setRpcRoute('rpc.endpoint')
            ->callProcedure('oil@trend', ['from_date' => '2022-01-01', 'to_date' => '2022-01-03'])
            ->assertJsonFragment([
                'result' => '[{"date":"2022-01-03","price":78.25}]'
            ]);
    }
}
