<?php

namespace App\Http\Repositories;

use App\Http\DTO\User\UserRequestData;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class UserRepository
{

    public function getAll(): Collection
    {
        return User::all();
    }

    public function update(UserUpdateRequest $request, User $user): bool
    {
        return $user->update(['name' => $request->get('Name')]);
    }

    public function create(UserRequestData $request): User
    {
        $user = new User();
        $user->id = $request->id;
        $user->name = $request->name;
        $user->is_admin = $request->isAdmin;
        $user->balance_usdt = $request->balanceUSDT;
        $user->ref_id = $request->refId;
        $user->email = $request->email;

        $user->save();

        return $user;
    }

    public function getById(int $id): User
    {
        return User::query()->find($id);
    }

    public function delete(User $user): void
    {
        $this->delete($user);
    }
}
