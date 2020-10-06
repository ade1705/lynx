<?php
namespace App\Lib\Orders;

use Illuminate\Database\Eloquent\Collection;

class OrderRepository
{
    /**
     * @param int $userId
     * @return Collection
     */
    public function getByProviderId(int $userId): Collection
    {
        return Order::where('order_provider_id', $userId)->with('customer')->with('provider')->with('service')->get();
    }

    public function save(Order $order)
    {
        $order->save();
    }
}
