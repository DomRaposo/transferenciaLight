<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Services\UserService;

class UserController extends Controller
{
    private UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        return response()->json($this->userService->getAllUsers());
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $data['role'] = 'isAdmin';
        $user = $this->userService->createUser($data);
        return response()->json(['message' => 'Create with sucess', 'user' => $user], 201);
    }

    public function show($id)
    {
        return response()->json($this->userService->getUser($id), 200);
    }

    public function update(Request $request, $id)
    {
        $user = $this->userService->updateUser($id, $request->all());
        return response()->json($user);
    }

    public function destroy($id)
    {
        $this->userService->deleteUser($id);
        return response()->json(['message' => 'Delete with sucess'],200);
    }
}
