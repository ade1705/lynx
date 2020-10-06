<?php
namespace App\lib\Dashboard\Services;

use App\Http\Controllers\Controller;
use App\Lib\ServiceImages\ServiceImageSaver;
use App\Lib\Services\Service;
use App\Lib\Services\ServiceRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class DashboardServicesController extends Controller
{
    /**
     * @var ServiceRepository
     */
    private $serviceRepository;
    /**
     * @var ServiceImageSaver
     */
    private $serviceImageSaver;

    /**
     * DashboardServicesController constructor.
     * @param ServiceRepository $serviceRepository
     */
    public function __construct(ServiceRepository $serviceRepository, ServiceImageSaver $serviceImageSaver)
    {
        $this->middleware('auth');
        $this->serviceRepository = $serviceRepository;
        $this->serviceImageSaver = $serviceImageSaver;
    }

    public function index()
    {
        $title = "Services";
        $subtitle = "All your services";
        $services = $this->serviceRepository->getByUserId(Auth::id());
        return view('dashboard.services.index', compact('title', 'subtitle', 'services'));
    }

    public function create()
    {
        $title = "Services";
        $subtitle = "Create new service";
        return view('dashboard.services.create', compact('title', 'subtitle'));
    }

    public function edit(string $slug)
    {
        $title = "Services";
        $subtitle = "Edit service";
        $service = $this->serviceRepository->findBySlug($slug);
        $images = Arr::pluck($service->images->toArray(), 'si_image');
        return view('dashboard.services.edit', compact('title', 'subtitle', 'service', 'images'));
    }

    public function delete(string $slug)
    {
        $this->serviceRepository->delete($slug);
        return redirect()->route('dashboard-services')->with('status', 'Service deleted!');
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'service_title' => 'required',
            'service_price' => 'required',
//            'service_unit' => 'required',
            'service_category_id' => 'required',
            'service_description' => 'required',
        ]);
        $service = $this->hydrateModel($request);
        $service = $this->serviceRepository->save($service);
        $this->serviceImageSaver->save($service->service_id, explode(',', $request->service_images), Auth::id());
        return redirect()->route('dashboard-services')->with('status', 'Service updated!');
    }

    /**
     * @param Request $request
     * @return Service
     */
    private function hydrateModel(Request $request): Service
    {
        $requestVariables = $request->all();
        $service = ($request->has('service_slug'))
            ? $this->serviceRepository->findBySlug($request->service_slug)
            : $this->createNewService(Auth::user()->id, $request->service_title);
        $service->fill($requestVariables);
        return $service;
    }

    /**
     * @param int $userId
     * @param string $serviceTitle
     * @return Service
     */
    private function createNewService(int $userId, string $serviceTitle): Service
    {
        $service = new Service();
        $service->service_user_id = $userId;
        $service->service_slug = Str::slug($serviceTitle, '-') . mt_rand(2, 100);
        return $service;
    }
}
