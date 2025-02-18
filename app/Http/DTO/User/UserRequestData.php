<?php

namespace App\Http\DTO\User;


class UserRequestData
{
    public string $name;
    public int $id;
    public int $refId;
    public string $email;
    public int $telegramId;
    public float $balanceUSDT;
    public string $joinTime;
    public bool $isAdmin;
}
