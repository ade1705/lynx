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
        return Order::where('order_provider_id', $userId)->with('customer')->with('provider.profile')->with('service.images')->get();
    }

    /**
     * @param int $orderId
     * @return Collection
     */
    public function updatePaymentStatusToPaid(int $orderId)
    {
        return Order::where('order_id', $orderId)->update(['order_has_paid' => 'yes']);
    }

    public function updateOrderStatus(int $orderId, string $status)
    {
        return Order::where('order_id', $orderId)->update(['order_status' => $status]);
    }

    public function save(Order $order)
    {
        $order->save();
    }
}
