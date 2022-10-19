<?php

namespace App\Http\Controllers;

use App\Models\SubscribeEmail;
use Illuminate\Http\Request;
use Stevebauman\Location\Facades\Location;

class SubscribeEmailController extends Controller
{
    public function create(Request $request)
    {
        $email = $request->email;
        $check = SubscribeEmail::where('email', $email)->first();
        if(!$check) {
            $location = Location::get($request->ip());

            SubscribeEmail::create([
                'email'     => $email,
                'ip'        => $request->ip(),
                'location'  => $location->latitude . ',' . $location->longitude . ' - Tại: ' . $location->cityName,
            ]);
        }

        return response()->json(['status' => true]);
    }
}
