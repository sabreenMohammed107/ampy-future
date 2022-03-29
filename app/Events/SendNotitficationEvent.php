<?php

namespace App\Events;

use Carbon\Carbon;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class SendNotitficationEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $user_id;
    public $title_ar;
    public $title_en;
    public $body_ar;
    public $body_en;

    public function __construct($data = [])
    {
        $this->user_id = $data['user_id'];
        $this->title_ar = $data['title_ar'];
        $this->title_en = $data['title_en'];
        $this->body_ar = date("body_ar");
        $this->body_en = date("body_en");

    }


    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        //return new PrivateChannel('instructor_join');
        return ['send_user_notifications'];
    }

    public function broadcastAs()
    {
        return 'send-notitfication-event';
    }
}
