<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\UserRequest;
use App\Http\Resources\UserListResource;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $search = request('search', false);
        $perPage = request('per_page', 10);
        $sortField = request('sort_field', 'updated_at');
        $sortDirection = request('sort_direction', 'asc');

        $query = User::query();
        $query->orderBy($sortField, $sortDirection);

        if ($search) {
            $query->where('name', 'like', "%{$search}%")
                ->orWhere('email', 'like', "%{$search}%");
        }

        return UserListResource::collection($query->paginate($perPage));
    }

    public function store(UserRequest $request)
    {
        $data = $request->validated();

        $data['created_by'] = $request->user()->id;
        $data['updated_by'] = $request->user()->id;

        $data['is_admin'] = $request->is_admin ? 1 : 0;

        $user = User::create($data);
        return New UserResource($user);
    }

    public function show(User $user)
    {
        return new UserResource($user);
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $data = $request->validated();

        if (!empty($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        }
        $data['updated_by'] = $request->user()->id;
        $data['is_admin'] = $request->is_admin;

        $user->update($data);

        return new UserResource($user);
    }
}
