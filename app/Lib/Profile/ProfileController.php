<?php
namespace App\Lib\Profile;

use App\Http\Controllers\Controller;
use App\Lib\Utilities\ImageUploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    use ImageUploadTrait;
    /**
     * @var ProfileRepository
     */
    private $profileRepository;

    public function __construct(ProfileRepository $profileRepository)
    {
        $this->middleware('auth');
        $this->profileRepository = $profileRepository;
    }

    public function index()
    {
        $title = "Profile";
        $subtitle = "Manage your profile";
        $profile = $this->profileRepository->findOrCreate(Auth::id());
        return view('dashboard.profile', compact('title', 'subtitle', 'profile'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $profile = $this->profileRepository->findOrCreate(Auth::id());
        if ($request->hasFile('profile_avatar')) {
            $data['profile_avatar'] = $this->uploadImage($request->file('profile_avatar'));
        }
        $profile->fill($data);
        $this->profileRepository->save($profile);
        return redirect()->back()->with('Done');
    }
}
