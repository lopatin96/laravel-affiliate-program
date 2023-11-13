<?php

namespace Atin\LaravelAffiliateProgram\Listeners;

use Illuminate\Auth\Events\Registered;
use App\Models\User;

class SaveAffiliateId
{
    public function handle(Registered $event)
    {
        if (request()->cookie('aff_id')) {
            if (User::find((int) request()->cookie('aff_id'))) {
                $event->user->aff_id = request()->cookie('aff_id');
                $event->user->save();
            }

            cookie()->queue(cookie()->forget('aff_id'));
        }
    }
}
