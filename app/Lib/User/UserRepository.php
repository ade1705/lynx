<?php
namespace App\Lib\User;

use App\User;
use Illuminate\Database\Eloquent\Collection;

class UserRepository
{
    /**
     * @return Collection
     */
    public function all(): Collection
    {
        return User::all();
    }

    /**
     * @param int $userId
     * @return User|null
     */
    public function find(int $userId): ?User
    {
        return User::find($userId);
    }
}
