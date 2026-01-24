<?php

namespace App\Repository;

use App\Models\Contact;

class ContactRepository extends BaseRepository
{
    protected const string MODEL = Contact::class;

    public function create(array $data): Contact
    {
        $contact = new Contact();
        $contact->email = $data['email'];
        $contact->name = $data['name'] ?? null;
        $contact->social = $data['social'] ?? null;
        $contact->phone = $data['phone'] ?? null;
        $contact->subject = $data['subject'];
        $contact->message = $data['message'];

        $contact->save();

        return $contact;
    }
}
