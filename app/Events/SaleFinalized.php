<?php

namespace App\Events;

use App\Models\Sale;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class SaleFinalized
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $sale;

    /**
     * Create a new event instance.
     */
    public function __construct(Sale $sale)
    {
        $this->sale = $sale;
    }
}
