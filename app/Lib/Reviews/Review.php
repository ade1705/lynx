<?php
namespace App\Lib\Reviews;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    /**
     * @var string
     */
    protected $primaryKey = 'review_id';

    public function user()
    {
        return $this->belongsTo(User::class, 'review_user_id', 'id');
    }
}
