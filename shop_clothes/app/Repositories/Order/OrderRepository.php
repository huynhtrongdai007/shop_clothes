<?php

namespace App\Repositories\Order;

use App\Models\Order;
use App\Repositories\BaseRepository;

class OrderRepository extends BaseRepository implements OrderRepositoryInterface
{

    public function getModel()
    {
        return Order::class;
    }

    public function getOrderById($userId)
    {
        return $this -> model
            -> where('user_id', $userId)
            -> get();
    }
}
