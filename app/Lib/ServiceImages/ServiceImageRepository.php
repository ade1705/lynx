<?php
namespace App\Lib\ServiceImages;

use Illuminate\Support\Facades\DB;

class ServiceImageRepository
{
    /**
     * @param ServiceImage $serviceImage
     */
    public function save(ServiceImage $serviceImage)
    {
        $serviceImage->save();
    }

    /**
     * @param int $serviceId
     */
    public function deleteServiceImages(int $serviceId)
    {
        ServiceImage::where('si_service_id', $serviceId)->delete();
    }

    /**
     * @param array $saveData
     */
    public function massSave(array $saveData)
    {
        DB::table('service_images')->insert($saveData);
    }
}
