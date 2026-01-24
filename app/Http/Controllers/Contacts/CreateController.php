<?php

namespace App\Http\Controllers\Contacts;

use App\Http\Requests\ContactRequest;
use App\Notifications\ContactReceived;
use App\Repository\ContactRepository;
use App\Repository\UserRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Redirect;

class CreateController
{
    public function __construct(
        private readonly ContactRepository $repository,
        private readonly UserRepository $userRepository,
    ){
    }

    public function __invoke(ContactRequest $request): RedirectResponse
    {
        $this->repository->create($request->input());

        Notification::send($this->userRepository->findAdmin(), new ContactReceived());

        return Redirect::route('contact.get', ['created' => true]);
    }
}
