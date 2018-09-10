<?php

namespace Itainathaniel\NovaNexmo\Http\Controllers;

use Illuminate\Http\Request;
use Nexmo\Laravel\Facade\Nexmo;

class SendSMSController
{
	public function store(Request $request)
	{
		$this->validate($request, [
			'to' => 'required',
			'from' => 'required',
			'text' => 'required'
		]);

		try {
			$message = Nexmo::message()->send([
				'to' => $request->to,
				'from' => $request->from,
				'text' => $request->text
			]);

			return response()->json(['message' => $message]);
		} catch (\ErrorException $e) {
			return response()->json(['error' => $e->getMessage()], 503);
		}
	}
}
