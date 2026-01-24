<?php

namespace App\Http\Controllers\Tenant;

use App\Repository\TenantRepository;
use Illuminate\Support\Facades\Response;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class DownloadCvController
{
    public function __construct(
        private TenantRepository $repository
    ){
    }

    public function __invoke(): BinaryFileResponse
    {
        $activeTenant = $this->repository->findActive();

        return Response::download($activeTenant->cv, 'cv', [
            'Content-Type' => 'application/pdf'
        ]);
    }
}
