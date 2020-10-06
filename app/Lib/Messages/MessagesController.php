<?php
namespace App\Lib\Messages;

use App\Http\Controllers\Controller;
use App\Lib\Services\ServiceRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessagesController extends Controller
{
    /**
     * @var MessageRepository
     */
    private $messageRepository;

    /**
     * DashboardServicesController constructor.
     * @param MessageRepository $messageRepository
     */
    public function __construct(MessageRepository $messageRepository)
    {
        $this->middleware('auth', ['except' => ['apiStore']]);
        $this->messageRepository = $messageRepository;
    }

    public function index()
    {
        $title = "Messages";
        $subtitle = "Manage your conversations";
        $messages = $this->messageRepository->getMessages(Auth::id());
        return view('dashboard.messages', compact('title', 'subtitle', 'messages'));
    }

    /**
     * @param Request $request
     * @param Message $message
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request, Message $message)
    {
        $validatedData = $request->validate([
            'message_message' => 'required',
        ]);
        $message->message_message = $request->message_message;
        $message->message_sender_id = Auth::id();
        $message->message_receiver_id = $request->message_receiver_id;
        $this->messageRepository->save($message);
        return redirect()->back()->with('status', 'Message sent!');
    }

    /**
     * @param Request $request
     * @param Message $message
     * @return \Illuminate\Http\RedirectResponse
     */
    public function apiStore(Request $request, Message $message)
    {
        $message->message_message = $request->message_message;
        $message->message_sender_id = (int)$request->message_sender_id;
        $message->message_receiver_id = (int)$request->message_receiver_id;
        $this->messageRepository->save($message);
        response()->json('success');
    }
}
