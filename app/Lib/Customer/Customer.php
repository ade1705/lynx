<?php
namespace App\Lib\Customer;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    /**
     * @var string
     */
    protected $primaryKey = 'customer_id';

    /**
     * Get the user that owns the phone.
     */
    public function user()
    {
        return $this->belongsTo('App\User', 'customer_user_id', 'id');
    }
}
