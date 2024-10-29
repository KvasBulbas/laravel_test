<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRestingPlaceRequest;
use App\Models\RestingPlace;
use App\services\RestingPlaceService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class RestingPlaceController extends Controller
{
    public function __construct(
        private readonly RestingPlaceService $restingPlaceService,
    )
    {
    }

    public function index() : JsonResponse
    {
        $restingPlaces =  RestingPlace::all(['name', 'longitude', 'latitude']);
        return new JsonResponse($restingPlaces);
    }

    public function store(StoreRestingPlaceRequest $request) : JsonResponse
    {
        $restingPlace = $this->restingPlaceService->createRestingPlace($request);
        return new JsonResponse($restingPlace);
    }
}
