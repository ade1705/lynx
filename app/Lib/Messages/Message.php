<?php
namespace App\Lib\Messages;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    /**
     * @var string
     */
    protected $primaryKey = 'message_id';

    protected $appends = ['created_formatted'];

    protected $fillable = [
        'message_message', 'message_sender_id', 'message_receiver_id', 'message_attachment', 'message_is_read'
    ];

    /**
     * Get the user that owns the phone.
     */
    public function sender()
    {
        return $this->belongsTo('App\User', 'message_sender_id', 'id');
    }


    public function getCreatedFormattedAttribute()
    {
        return Carbon::parse($this->created_at)->diffForHumans();
    }
}
