<?php

namespace App\Http\Resources;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Symfony\Component\HttpFoundation\Response;

/**
 * @mixin User
 */
class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'ID' => $this->id,
            'TelegramID' => $this->telegram_id,
            'BalanceUSDT' => $this->balance_usdt,
            'Name' => $this->name,
            'RefID' => $this->ref_id,
            'Email' => $this->email,
            'is_admin' => $this->is_admin,
            'JoinTime' => $this->created_at,
        ];
    }
}
