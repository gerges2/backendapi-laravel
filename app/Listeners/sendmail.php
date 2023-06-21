<?php

namespace App\Listeners;
use App\Events\login;
use App\Mail\testmail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Mail;

class sendmail
{
    /**
     * Create the event listener.
     */
    public function __construct(login $event)
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(login $event): void
    {
        $this->sendmail($event->user);   //
    }
    function sendmail($user)
    {
        $mailData=[
            'title' => 'mail from title',
            'body' => 'This is test body from mail'];
        Mail::to($user->email)->send(new testmail($mailData));
        // $video->viewers = $video->viewers + 1;
        // $video->save();
        // session()->put('videoIsVisited', $video->id);
    }
}
