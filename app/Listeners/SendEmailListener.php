<?php

namespace App\Listeners;

use App\Events\CreatedGoalEvent;
use App\Mail\GoalMail;
use Illuminate\Support\Facades\Mail;

final class SendEmailListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(CreatedGoalEvent $event): void
    {
        $project = optional($event->goal->project);
        $user = $project->user;
        Mail::to($user)->send(new GoalMail($event->goal));
    }
}
