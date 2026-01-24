<?php

namespace App\Repository;

use App\Models\Tenant;

class TenantRepository extends BaseRepository
{
    protected const string MODEL = Tenant::class;

    public function findActive(): Tenant
    {
        $builder = $this->getBuilder();

        return $builder->where('active', true)->first();
    }
}
