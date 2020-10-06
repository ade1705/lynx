<?php
namespace App\Lib\Images;

use App\Http\Controllers\Controller;
use App\Lib\Utilities\ImageUploadTrait;
use Illuminate\Http\Request;

class ImagesController extends Controller
{
    use ImageUploadTrait;

    const IMAGE_PATH = '/uploads/';

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function upload(Request $request)
    {
        $imageFileUrl = '';
        $statusCode = 500;
        if ($request->hasFile('file')) {
            $imageFileUrl = $this->uploadImage($request->file('file'));
            $statusCode = 200;
        }
        return response()->json(['file_url' => $imageFileUrl], $statusCode);
    }
}
