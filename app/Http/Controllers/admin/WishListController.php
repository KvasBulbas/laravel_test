<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddToWishListRequest;
use App\services\WishListService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class WishListController extends Controller
{
    public function __construct(
        private readonly WishListService $wishListService,
    )
    {
    }

    public function getWishList(int $id) : JsonResponse
    {
        $restingPlaces  = $this->wishListService->getWishList($id);
        return new JsonResponse($restingPlaces);
    }

    public function addToWishList(int $id, AddToWishListRequest  $request) : JsonResponse
    {
        $this->wishListService->addToWishList($id,$request->id);
        return new JsonResponse(null,204);
    }
}
