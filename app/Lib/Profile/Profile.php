<?php
namespace App\Lib\Profile;

use App\Lib\ServiceImages\ServiceImage;
use App\Lib\Services\Service;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Profile extends Model
{
    /**
     * @var string
     */
    protected $primaryKey = 'profile_id';

    /**
     * @var array
     */
    protected $fillable = [
        'profile_user_id', 'profile_username', 'profile_avatar', 'profile_bio', 'profile_website', 'profile_instagram', 'profile_twitter', 'profile_facebook'
    ];

    /**
     * @return string
     */
    public function getProfileFullAvatarAttribute(): string
    {
        return empty($this->profile_avatar)
            ? "https://picsum.photos/id/237/200/200"
            : "/uploads/" . $this->profile_avatar;
    }

    /**
     * @return HasMany
     */
    public function images(): HasMany
    {
        return $this->HasMany(ServiceImage::class, 'si_user_id', 'profile_user_id');
    }
}
