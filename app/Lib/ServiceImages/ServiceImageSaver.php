<?php
namespace App\Lib\ServiceImages;

use Carbon\Carbon;

class ServiceImageSaver
{
    /**
     * @var ServiceImageRepository
     */
    private $serviceImageRepository;

    public function __construct(ServiceImageRepository $serviceImageRepository)
    {
        $this->serviceImageRepository = $serviceImageRepository;
    }

    /**
     * @param int $serviceId
     * @param array $serviceImages
     * @param int $userId
     */
    public function save(int $serviceId, array $serviceImages, int $userId)
    {
        $this->serviceImageRepository->deleteServiceImages($serviceId);
        $this->serviceImageRepository->massSave($this->formatServiceImages($serviceId, $serviceImages, $userId));
    }

    /**
     * @param int $serviceId
     * @param array $serviceImages
     * @param int $userId
     * @return array
     */
    private function formatServiceImages(int $serviceId, array $serviceImages, int $userId): array
    {
        $now = Carbon::now()->toDateTimeString();
        $formattedArray = [];
        foreach ($serviceImages as $serviceImage) {
            $formattedArray[] = [
                'si_service_id' => $serviceId,
                'si_image' => $serviceImage,
                'si_user_id' => $userId,
                'created_at'=> $now,
                'updated_at'=> $now
            ];
        }
        return $formattedArray;
    }
}
