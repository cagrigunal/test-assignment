<?php

namespace App\Helpers;

class SubscriberState
{
    public const SUBSCRIBER_STATE = [
        'active' => 1,
        'unsubscribed' => 2,
        'junk' => 3,
        'bounced' => 4,
        'unconfirmed' => 5
    ];
}
