<?php

namespace App\Repository;

use App\Enums\Roles;
use App\Models\User;
use Symfony\Component\HttpKernel\Exception\HttpException;

class UserRepository extends BaseRepository
{
    protected const string MODEL = User::class;

    public function findAdmin()
    {
        $builder = $this->getBuilder();

        $admin = $builder->whereJsonContains('roles', Roles::ADMIN->value)->first();

        if ($admin === null) {
            throw new HttpException(404, 'Admin not found');
        }

        return $admin;
    }
}
