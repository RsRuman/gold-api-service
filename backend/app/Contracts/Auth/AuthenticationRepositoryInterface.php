<?php

namespace App\Contracts\Auth;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

interface AuthenticationRepositoryInterface
{
    public function storeUser(array $data);

    public function getToken(array $data);

    public function deleteToken(Model|Builder $user);
    public function myInfo(Model|Builder $user);
}
