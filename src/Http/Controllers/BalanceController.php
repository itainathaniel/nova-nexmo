<?php

namespace Itainathaniel\NovaNexmo\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Nexmo\Laravel\Facade\Nexmo;

class BalanceController
{
	public function show()
	{
		if (is_null(config('nexmo'))) {
			return response()->json(['error' => 'Looks like Nexmo is not installed'], 503);
		}

		try {
			$data = Cache::remember('itainathaniel::nexmo::balance', 5, function () {
				return Nexmo::account()->getBalance();
			});

			return response()->json($data);
		} catch (\ErrorException $e) {
			return response()->json(['error' => 'Nexmo Balance: error fetching data'], 503);
		}
	}
}
