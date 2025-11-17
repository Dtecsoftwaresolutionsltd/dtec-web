<?php

namespace Modules\SupportTicket\App\Http\Controllers\Support\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Modules\SupportTicket\App\Models\MessageDocument;
use Modules\SupportTicket\App\Models\SupportTicket;
use Modules\SupportTicket\App\Models\SupportTicketMessage;

class UserSupportTicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::guard('web')->user();
        $support_tickets = SupportTicket::where('user_id', $user->id)
            ->where('user_type', 'user')
            ->latest()
            ->get();

        return view('supportticket::support.user.index', [
            'support_tickets' => $support_tickets
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('supportticket::support.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'subject' => 'required|max:255',
                'message' => 'required',
            ],
            [
                'subject.required' => 'Subject is required',
                'message.required' => 'Message is required',
            ]
        );

        $user = Auth::guard('web')->user();
        $support_ticket = new SupportTicket();
        $support_ticket->user_id = $user->id;
        $support_ticket->user_type = 'user';
        $support_ticket->subject = $request->subject;
        $support_ticket->ticket_id = 'TKT-' . time() . rand(1000, 9999);
        $support_ticket->status = 'open';
        $support_ticket->save();

        $ticket_message = new SupportTicketMessage();
        $ticket_message->support_ticket_id = $support_ticket->id;
        $ticket_message->message = $request->message;
        $ticket_message->message_user_id = $user->id;
        $ticket_message->send_by = 'user';
        $ticket_message->is_seen = 0; // Mark as unseen for admin
        $ticket_message->save();

        if ($request->hasFile('documents')) {
            foreach ($request->documents as $index => $request_file) {
                $extention = $request_file->getClientOriginalExtension();
                $file_name = 'support-ticket-' . time() . $index . '.' . $extention;
                $destinationPath = public_path('uploads/custom-images/');
                $request_file->move($destinationPath, $file_name);

                $document = new MessageDocument();
                $document->message_id = $ticket_message->id;
                $document->file_name = $file_name;
                $document->model_name = 'SupportTicketMessage';
                $document->save();
            }
        }

        $notify_message = 'Ticket created successfully';
        $notify_message = array('message' => $notify_message, 'alert-type' => 'success');
        return redirect()->route('user.ticket-support.show', $support_ticket->ticket_id)->with($notify_message);
    }

    /**
     * Show the specified resource.
     */
    public function show($ticket_id)
    {
        $user = Auth::guard('web')->user();

        $support_ticket = SupportTicket::where('ticket_id', $ticket_id)
            ->where('user_id', $user->id)
            ->where('user_type', 'user')
            ->firstOrFail();

        $ticket_messages = SupportTicketMessage::with('documents')->where('support_ticket_id', $support_ticket->id)->get();
        $last_message = SupportTicketMessage::with('documents')->where('support_ticket_id', $support_ticket->id)->latest()->first();

        // Mark all admin messages as seen when user views the ticket
        SupportTicketMessage::where('support_ticket_id', $support_ticket->id)
            ->where('send_by', 'admin')
            ->where('is_seen', 0)
            ->update(['is_seen' => 1]);

        return view('supportticket::support.user.show', [
            'support_ticket' => $support_ticket,
            'ticket_messages' => $ticket_messages,
            'last_message' => $last_message,
        ]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function support_ticket_message(Request $request, $id)
    {
        $request->validate(
            [
                'message' => 'required',
            ],
            [
                'message.required' => 'Message is required',
            ]
        );

        $user = Auth::guard('web')->user();

        $support_ticket = SupportTicket::where('id', $id)
            ->where('user_id', $user->id)
            ->where('user_type', 'user')
            ->firstOrFail();

        $ticket_message = new SupportTicketMessage();
        $ticket_message->support_ticket_id = $support_ticket->id;
        $ticket_message->message = $request->message;
        $ticket_message->message_user_id = $user->id;
        $ticket_message->send_by = 'user';
        $ticket_message->is_seen = 0; // Mark as unseen for admin
        $ticket_message->save();

        if ($request->hasFile('documents')) {
            foreach ($request->documents as $index => $request_file) {
                $extention = $request_file->getClientOriginalExtension();
                $file_name = 'support-ticket-' . time() . $index . '.' . $extention;
                $destinationPath = public_path('uploads/custom-images/');
                $request_file->move($destinationPath, $file_name);

                $document = new MessageDocument();
                $document->message_id = $ticket_message->id;
                $document->file_name = $file_name;
                $document->model_name = 'SupportTicketMessage';
                $document->save();
            }
        }

        $notify_message = 'Message sent successfully';
        $notify_message = array('message' => $notify_message, 'alert-type' => 'success');
        return redirect()->back()->with($notify_message);
    }
}
