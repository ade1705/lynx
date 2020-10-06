<?php
namespace App\Lib\ServiceImages;

use Illuminate\Database\Eloquent\Model;

class ServiceImage extends Model
{
    /**
     * @var string
     */
    protected $primaryKey = 'si_id';

    /**
     * @var array
     */
    protected $fillable = ['si_service_id', 'si_image', 'si_user_id'];

   /**
     * @return string
     */
    public function getFullUrlAttribute(): string
    {
        return "/uploads/" . $this->si_image;
    }
}
