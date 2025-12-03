<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Models\Message;                       
use App\Models\User;                          
use App\Notifications\NewMessageNotification; 

class MessageController extends Controller
{
    public function index(){
        $messages = Message::with('sender')->where('receiver_id', Auth::id())->latest()->get();

        DB::table('notifications')
        ->where('notifiable_type', 'App\Models\User')
        ->where('notifiable_id', Auth::id())
        ->whereNull('read_at')
        ->where('type', 'App\Notifications\NewMessageNotification')
        ->update(['read_at' => now()]);

        return view('messages.index', compact('messages'));
    }

    public function create(){
        $users = User::where('id', '!=', Auth::id())->get();

        return view('messages.create', compact('users'));
    }

    public function store(Request $request){
        $request->validate([
            'receiver_id' => 'required|exists:users,id',
            'title' => 'required|string|max:255',
            'text' => 'required|string',
        ]);

        $message = Message::create([
            'sender_id' => Auth::id(),
            'receiver_id' => $request->receiver_id,
            'title' => $request->title,
            'text' => $request->text,
        ]);

        $receiver = User::find($request->receiver_id);

        if ($receiver->notify_by_email) {
            Mail::to($receiver->email)->send(new \App\Mail\NewInboxMessage($message));
        }
        

        return redirect()->back()->with('success', 'message send');
    }

    public function show(Message $message){
        abort_unless(
            $message->receiver_id === Auth::id() || $message->sender_id === Auth::id(), 403);

            return view('messages.show', compact('message'));
    }
}
