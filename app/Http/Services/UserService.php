<?php

namespace App\Http\Services;

use App\Http\DTO\User\UserRequestData;
use App\Http\Repositories\UserRepository;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use Illuminate\Support\Collection;

readonly class UserService
{
    public function __construct(
        private UserRepository $userRepository
    ) {
    }

    public function getAll(): Collection
    {
        return $this->userRepository->getAll();
    }

    public function store(UserRequestData $requestData): User
    {
        return $this->userRepository->create($requestData);
    }

    public function delete(User $user): void
    {
        $this->userRepository->delete($user);
    }

    public function update(UserUpdateRequest $requestData, User $user): User
    {
        return $this->userRepository->update($requestData, $user);
    }
}
