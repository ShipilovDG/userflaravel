<?php

namespace App\Http\DTOFactories\User;

use App\Http\DTO\User\UserRequestData;
use Illuminate\Http\Request;

class UserRequestDataFactory
{
    public function make(Request $request): UserRequestData
    {
        $data = new UserRequestData();

        $data->id = $request->get('Id');
        $data->name = $request->get('Name');
        $data->email = $request->get('Email');
        $data->refId = $request->get('RefID');
        $data->isAdmin = (bool) $request->get('is_admin');
        $data->telegramId = $request->get('TelegramID');
        $data->balanceUSDT = $request->get('BalanceUSDT');
        $data->joinTime = $request->get('JoinTime');

        return $data;
    }
}
