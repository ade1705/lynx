<?php
namespace App\Lib\Services;

use Illuminate\Database\Eloquent\Collection;

class ServiceRepository
{
    /**
     * @param Service $service
     * @return Service
     */
    public function save(Service $service): Service
    {
        $service->save();
        return $service->refresh();
    }

    /**
     * @param int $userId
     * @return Collection
     */
    public function getByUserId(int $userId): Collection
    {
        return Service::where('service_user_id', $userId)->with('images')->get();
    }

    /**
     * @param string $slug
     * @return Service
     */
    public function findBySlug(string $slug): Service
    {
        return Service::where('service_slug', $slug)->with('images')->first();
    }

    /**
     * @param string $slug
     * @return bool|null
     * @throws \Exception
     */
    public function delete(string $slug)
    {
        return $this->findBySlug($slug)->delete();
    }
}
