<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewUserRegistered extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    /**
     * Create a new message instance.
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this->subject('New User Registration Request')
                    ->markdown('emails.new-user')
                    ->with([
                        'name' => $this->user->name,
                        'email' => $this->user->email,
                        'role' => ucfirst($this->user->role),
                    ]);
    }
}
