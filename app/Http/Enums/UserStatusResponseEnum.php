<?php

namespace App\Http\Enums;

enum UserStatusResponseEnum: string
{
    case SuccessfulDeleted = 'User created successfully';
    case UserRetrievedSuccessfully = 'User retrieved successfully';
    case UserStoredSuccessfully = 'User stored successfully';
    case UserUpdatedSuccessfully = 'User updated successfully';
}
