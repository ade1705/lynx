<?php
namespace App\Lib\Services;

use App\Lib\ServiceImages\ServiceImage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use NumberFormatter;

class Service extends Model
{
    use SoftDeletes;

    const SERVICE_CATEGORIES  = ["Business Cards", "Logos", "Video Editing", "Accounting & Tax Services"];

    /**
     * @var string
     */
    protected $primaryKey = 'service_id';

    /**
     * @var array
     */
    protected $fillable = ['service_title', 'service_price', 'service_unit', 'service_slug', 'service_description', 'service_category_id'];

    /**
     * @return BelongsTo
     */
    public function user():  BelongsTo
    {
        return $this->belongsTo('App\User', 'service_user_id', 'id');
    }

    /**
     * @return HasMany
     */
    public function images(): HasMany
    {
        return $this->HasMany(ServiceImage::class, 'si_service_id', 'service_id');
    }

    /**
     * @return string
     */
    public function getCategoryAttribute(): string
    {
        return self::SERVICE_CATEGORIES[(int)$this->service_category_id - 2];
    }

    /**
     * @return string
     */
    public function getImagesStringAttribute(): string
    {
        return implode(",", Arr::pluck($this->images, 'full_url'));
    }

    public function getFormattedServicePriceAttribute()
    {
        return '$' .  number_format($this->service_price, 2, '.', ',');
    }


    public function getServiceImageAttribute()
    {
        return is_null($this->images->first())
            ? 'https://images.unsplash.com/photo-1492707892479-7bc8d5a4ee93?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=900&q=60'
            : '/uploads/' . $this->images->first()->si_image;
    }
}
