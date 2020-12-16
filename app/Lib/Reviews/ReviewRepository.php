<?php
namespace App\Lib\Reviews;

use Illuminate\Database\Eloquent\Collection;

class ReviewRepository
{
    public function save(Review $review)
    {
        $review->save();
    }

    public function getProviderReviews(int $providerUserId): Collection
    {
        return Review::where('review_provider_id', $providerUserId)->with('user.profile')->orderBy('id', 'desc')->get();
    }
}
