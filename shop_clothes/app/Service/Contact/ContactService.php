<?php

namespace App\Service\Contact;


use App\Repositories\Contact\ContactRepositoryInterface;
use App\Service\BaseService;


class ContactService extends BaseService implements ContactServiceInterface
{
    public $repository;

    public function __construct(ContactRepositoryInterface $ContactRepository)
    {
        $this->repository = $ContactRepository;
    }
}
