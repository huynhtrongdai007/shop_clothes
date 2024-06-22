<?php

namespace App\Service\Customer;


use App\Repositories\Customer\CustomerRepositoryInterface;
use App\Service\BaseService;

class CustomerService extends BaseService implements CustomerServiceInterface
{
    public $repository;

    public function __construct(CustomerRepositoryInterface $CustomerRepository)
    {
        $this->repository = $CustomerRepository;
    }
}
