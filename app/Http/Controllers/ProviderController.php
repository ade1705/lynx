<?php

namespace App\Http\Controllers;

use App\Lib\Profile\Profile;
use App\Lib\Profile\ProfileRepository;
use App\Lib\Reviews\ReviewRepository;
use App\Lib\ServiceImages\ServiceImage;
use App\Lib\Services\Service;
use Illuminate\Http\Request;

class ProviderController extends Controller
{
    /**
     * @var ProfileRepository
     */
    private $profileRepository;
    /**
     * @var ReviewRepository
     */
    private $reviewRepository;

    public function __construct(ProfileRepository $profileRepository, ReviewRepository $reviewRepository)
    {
        $this->profileRepository = $profileRepository;
        $this->reviewRepository = $reviewRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $services = Service::all();
        $profile = $this->profileRepository->findOrCreate($id);
        $reviews = $this->reviewRepository->getProviderReviews($id);
        return view('providers.provider', compact('services', 'profile', 'reviews'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
