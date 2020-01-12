<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class InterviewEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $noti_id;
    public $apply_id;
    public $interview_id;
    public $company_name;
    public $position_name;
    public $interview_name;
    public $time,$logo;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($noti_id,$apply_id,$interview_id,$company_name,$position_name,$interview_name,$time,$logo)
    {
        $this->noti_id = $noti_id;
        $this->apply_id = $apply_id;
        $this->interview_id = $interview_id;
        $this->company_name = $company_name;
        $this->position_name =$position_name;
        $this->interview_name =$interview_name;
        $this->time = $time;
        $this->logo = $logo;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return ['my-channel'];
    }

    // public function broadcastAs()
    // {
    //     return 'interview-event';
    // }
}
