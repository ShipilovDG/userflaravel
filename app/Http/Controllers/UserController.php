<?php

namespace App\Http\Controllers;

use App\Http\DTOFactories\User\UserRequestDataFactory;
use App\Http\Enums\UserStatusResponseEnum;
use App\Http\Requests\UserUpdateRequest;
use App\Http\Resources\UserResource;
use App\Http\Services\UserService;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    public function __construct(
        private readonly UserService $userService,
        private readonly UserRequestDataFactory $requestDataFactory
    ) {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        return new JsonResponse([
            'data' => UserResource::collection(
                $this->userService->getAll()
            ),
            'status' => Response::HTTP_OK,
            'description' => UserStatusResponseEnum::UserRetrievedSuccessfully,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'RefID' => 'required',
            'ID' => 'required',
            'Name' => 'required',
            'Email' => 'required|email|unique:users,email',
            'BalanceUSDT' => 'required|numeric',
            'TelegramID' => 'integer',
            'JoinTime' => 'date',
        ]);
        $requestData = $this->requestDataFactory->make($request);

        return new JsonResponse([
            'data' => new UserResource(
                $this->userService->store($requestData)
            ),
            'status' => Response::HTTP_OK,
            'description' => UserStatusResponseEnum::UserStoredSuccessfully,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user): JsonResponse
    {
        return new JsonResponse([
            'data' => new UserResource(
                $user
            ),
            'status' => Response::HTTP_OK,
            'description' => Response::$statusTexts[Response::HTTP_OK],
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserUpdateRequest $request, User $user): JsonResponse
    {
        return new JsonResponse([
            'data' => new UserResource(
                $this->userService->update($request, $user)
            ),
            'status' => Response::HTTP_OK,
            'description' => UserStatusResponseEnum::UserUpdatedSuccessfully,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user): JsonResponse
    {
        $this->userService->delete($user);

        return new JsonResponse([
            'status' => Response::HTTP_NO_CONTENT,
            'description' => UserStatusResponseEnum::SuccessfulDeleted->value,
        ]);
    }
}
