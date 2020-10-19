<?php
namespace App\Lib\Orders;

use App\Lib\Services\Service;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    const ORDER_STATUS_PENDING = 'pending';
    const ORDER_STATUS_COMPLETE = 'completed';
    /**
     * @var string
     */
    protected $primaryKey = 'order_id';

    /**
     * @var array
     */
    protected $fillable = [
        'order_provider_id', 'order_service_id', 'order_customer_id', 'order_job_name', 'order_details', 'order_price'
    ];

    public function customer()
    {
        return $this->belongsTo('App\User', 'order_customer_id', 'id');
    }

    public function service()
    {
        return $this->belongsTo(Service::class, 'order_service_id', 'service_id');
    }

    public function provider()
    {
        return $this->belongsTo('App\User', 'order_provider_id', 'id');
    }
}
