<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;

class UserController extends Controller
{

    public function getUsers(Request $request)
    {
        return User::paginate($request->per_page);
    }

    public function getUser(int $id) : JsonResponse
    {
        $user = User::find($id);

        if (is_null($user)) {
            return response()->json(
                ['error' => 'User not found'],
                Response::HTTP_NOT_FOUND
            );
        }

        return response()->json($user);
    }

    public function create(Request $request) : JsonResponse
    {
        $user = User::create($request->all());
        return response()->json($user, Response::HTTP_CREATED);
    }

    public function update(int $id, Request $request) : JsonResponse
    {
        $user = User::find($id);

        if (is_null($user)) {
            return response()->json(
                ['error' => 'User not found'],
                Response::HTTP_NOT_FOUND
            );
        }

        $user->fill($request->all());
        $user->save();

        return response()->json($user);
    }

    public function delete(int $id) : JsonResponse
    {
        // authentification need for example with jwt
        //$this->authorize('delete', User::class);
        $user = User::find($id);

        if (is_null($user)) {
            return response()->json(
                ['error' => 'User not found'],
                Response::HTTP_NOT_FOUND
            );
        }

        $user->delete();
        return response()->json(['message' => 'User deleted.'], Response::HTTP_NO_CONTENT);
    }
}