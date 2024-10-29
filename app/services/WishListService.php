<?php

namespace App\services;

use App\Models\User;

class WishListService
{
    function getWishList(int $user_id) : array
    {
        $user = User::query()->find($user_id);
        $restingPlaces = $user->resting_places()->select('name', 'longitude', 'latitude')->get()->toArray();
        $restingPlaces = array_map(function ($place) { unset($place['pivot']); return $place;}, $restingPlaces);

        return $restingPlaces;
    }

    function addToWishList(int $userId, int $restingPlaceId) : void
    {
        $user = User::query()->find($userId);
        $user->resting_places()->attach($restingPlaceId);
    }

}
