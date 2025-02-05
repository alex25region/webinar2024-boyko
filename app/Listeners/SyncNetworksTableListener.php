<?php

namespace App\Listeners;

use App\Events\SocialUserEvent;
use App\Models\Network;

class SyncNetworksTableListener
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
    public function handle(SocialUserEvent $event): void
    {
        Network::query()->updateOrCreate([
            'user_id' => $event->user->id,
            'network_type' => $event->socialUserDto->networkType,
            'network_id' => $event->socialUserDto->networkId
        ], [
            'token' => $event->socialUserDto->token,
            'refresh_token' => $event->socialUserDto->refreshToken,
            'avatar' => $event->socialUserDto->avatar,
        ]);
    }
}
