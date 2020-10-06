<?php
namespace App\Lib\Profile;

class ProfileRepository
{
    public function save(Profile $profile)
    {
        $profile->save();
    }

    /**
     * @param int $userId
     * @return Profile
     */
    public function findOrCreate(int $userId): Profile
    {
        return Profile::firstOrCreate(['profile_user_id' => $userId]);
    }
}
