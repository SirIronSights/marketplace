<?php

namespace App\Mail;

use App\Models\Message;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewInboxMessage extends Mailable
{
    use Queueable, SerializesModels;

    public $messageModel;

    public function __construct(Message $message)
    {
        $this->messageModel = $message;
    }

    public function build()
    {
        return $this->subject('New Message in Your Inbox')
                    ->view('emails.new_message')
                    ->with([
                        'title' => $this->messageModel->title,
                        'text' => $this->messageModel->text,
                        'sender' => $this->messageModel->sender->username,
                    ]);
    }
}
