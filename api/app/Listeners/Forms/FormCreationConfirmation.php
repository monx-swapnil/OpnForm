<?php

namespace App\Listeners\Forms;

use App\Events\Models\FormCreated;
use App\Mail\Forms\FormCreationConfirmationMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class FormCreationConfirmation
{
    public function handle(FormCreated $event)
    {
        if (config('app.self_hosted')) {
            return;
        }

        Mail::to($event->form->creator)
            ->send(new FormCreationConfirmationMail($event->form));
    }
}
