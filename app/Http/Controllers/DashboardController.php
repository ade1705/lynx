<?php

namespace App\Http\Controllers;

use App\Lib\Services\Service;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $title = "Dashboard";
        $subtitle = "Manage your orders";
        return view('dashboard.index', compact('title', 'subtitle'));
    }

    public function home()
    {
        $title = "Dashboard";
        $subtitle = "Manage your orders";
        $services = Service::all();
        return view('home', compact('title', 'subtitle', 'services'));
    }

    public function orders()
    {
        $title = "Orders";
        $subtitle = "Manage your orders";
        return view('dashboard.orders', compact('title', 'subtitle'));
    }

    public function services()
    {
        $title = "Services";
        $subtitle = "Manage your orders";
        return view('dashboard.services.index', compact('title', 'subtitle'));
    }

    public function settings()
    {
        $title = "Settings";
        $subtitle = "Manage your orders";
        return view('dashboard.settings', compact('title', 'subtitle'));
    }
}
