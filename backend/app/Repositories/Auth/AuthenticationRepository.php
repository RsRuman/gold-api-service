<?php

namespace App\Repositories\Auth;

use App\Contracts\Auth\AuthenticationRepositoryInterface;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class AuthenticationRepository implements AuthenticationRepositoryInterface
{
    public function storeUser(array $data)
    {
        return User::create($data);
    }

    public function getToken(array $data)
    {
        $user = User::where('email', $data['email'])->first();

        if (!$user || !Hash::check($data['password'], $user->password)) {
            return false;
        }

        return $user->createToken('GOLD:API:SERVICE')->plainTextToken;
    }

    public function deleteToken(Model|Builder $user)
    {
        return $user->currentAccessToken()->delete();
    }
}
