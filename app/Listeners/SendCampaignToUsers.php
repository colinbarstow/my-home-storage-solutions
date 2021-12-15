<?php

namespace App\Listeners;

use App\Events\SendCampaign;
use App\Mail\Campaign;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendCampaignToUsers
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
     * @param  SendCampaign  $event
     * @return void
     */
    public function handle(SendCampaign $event)
    {
        foreach ($event->campaign->marketingLists as $marketingList){
            Mail::to($marketingList->email)->send(new Campaign($event->campaign));
        }
    }
}
