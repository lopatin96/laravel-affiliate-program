<?php

namespace Atin\LaravelAffiliateProgram\Listeners;

use Illuminate\Auth\Events\Registered;
use App\Models\User;

class SaveAffiliateId
{
    public function handle(Registered $event)
    {
        if (
            request()->session()->has('aff_id')
            && User::findOrFail(request()->session()->get('aff_id'))
        ) {
            $event->user->aff_id = request()->session()->get('aff_id');
            $event->user->save();

            request()->session()->forget('aff_id');
        }
    }
}
