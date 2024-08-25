<?php

namespace App\Repositories\Contact;

use App\Models\Contact;
use App\Repositories\BaseRepository;
use App\Service\Contact\ContactService;

class ContactRepository extends BaseRepository implements ContactRepositoryInterface
{

    public function getModel()
    {
        return Contact::class;
    }
}
