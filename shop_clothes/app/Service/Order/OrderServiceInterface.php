<?php

namespace App\Service\Order;

use App\Models\Order;
use App\Repositories\BaseRepository;

interface OrderServiceInterface
{
    public function getOrderById($userId);
}
