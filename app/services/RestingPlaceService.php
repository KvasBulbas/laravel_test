<?php

namespace App\services;

use App\Models\RestingPlace;
use Illuminate\Http\Request;

class RestingPlaceService
{
    function createRestingPlace(Request $request) : array
    {
        $restingPlace = $request->all();
        RestingPlace::query()->create($restingPlace);

        return $restingPlace;
    }
}
