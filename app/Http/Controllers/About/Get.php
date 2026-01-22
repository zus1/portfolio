<?php

namespace App\Http\Controllers\About;

use App\Repository\UserRepository;
use Illuminate\Support\Facades\View;

class Get
{
    public function __construct(
        private UserRepository $repository
    ){
    }

    public function __invoke()
    {
        $admin = $this->repository->findAdmin();

        return View::make('about', ['admin' => $admin]);
    }
}
