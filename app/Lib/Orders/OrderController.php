<?php


namespace App\Lib\Orders;


use App\Http\Controllers\Controller;
use App\Lib\Services\ServiceRepository;
use App\Lib\Stripe\StripeCustomerHandler;
use App\Lib\Stripe\StripeInvoiceHandler;
use App\Lib\User\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * @var OrderRepository
     */
    private $orderRepository;
    /**
     * @var UserRepository
     */
    private $userRepository;
    /**
     * @var ServiceRepository
     */
    private $serviceRepository;

    public function __construct(OrderRepository $orderRepository, UserRepository $userRepository, ServiceRepository $serviceRepository)
    {
        $this->middleware('auth');
        $this->orderRepository = $orderRepository;
        $this->userRepository = $userRepository;
        $this->serviceRepository = $serviceRepository;
    }

    public function index()
    {
        $title = "Order";
        $subtitle = "Manage your orders";
        $orders = $this->orderRepository->getByProviderId(Auth::id());
        return view('dashboard.orders.index', compact('title', 'subtitle', 'orders'));
    }

    public function create()
    {
        $title = "Order";
        $subtitle = "Create new order";
        $customers = $this->userRepository->all()->pluck('name', 'id');
        $services = $this->serviceRepository->getByUserId(Auth::id())->pluck('service_title', 'service_id');
        return view('dashboard.orders.create', compact('title', 'subtitle', 'customers', 'services'));
    }

    public function store(Request $request, Order $order, StripeCustomerHandler $stripeCustomerHandler, StripeInvoiceHandler $stripeInvoiceHandler, UserRepository $userRepository)
    {
        $data = $request->all();
        $data['order_provider_id'] = Auth::id();
        $order->fill($data);
        $this->orderRepository->save($order);
        $user = $userRepository->find($request->order_customer_id);
        $stripeCustomerHandler->getCustomerStripeCustomerId($user);
        return redirect()->route('dashboard-orders')->with('Order Created');
    }

    public function pay(int $orderId)
    {

    }
}
