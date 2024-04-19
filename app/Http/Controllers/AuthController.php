<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends APIController
{
    public function user(): JsonResponse
    {
        $user = Auth::user();

        $resource = new UserResource($user);

        return $this->sendResponse($resource);

    }
}
