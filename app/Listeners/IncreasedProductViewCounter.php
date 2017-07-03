<?php

namespace App\Listeners;

use App\Events\ProductViewed;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class IncreasedProductViewCounter
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  ProductViewed  $event
     * @return void
     */
    public function handle(ProductViewed $event)
    {
        $product = $event->product;
        $product->increment('view_number');
        $product->view_number += 1;
    }
}
