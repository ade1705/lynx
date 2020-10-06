<?php
namespace App\Lib\Utilities;

use Illuminate\Http\UploadedFile;

trait ImageUploadTrait
{
    /**
     * @param UploadedFile $filename
     * @return string
     */
    public function uploadImage(UploadedFile $filename): string
    {
        $name = md5(microtime() . $filename->getClientOriginalName()) . "." . $filename->extension();
        $filename->move('uploads/', $name);
        return $name;
    }
}
