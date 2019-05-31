<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Utility;
use Illuminate\Support\Facades\Log;
use App\Notifications\NotifySubscriber;
use App\Notify;
use Mail;

class NotifyCRON extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'subscriber:alert';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send an email to the subscribers, alerting them of their set Notifications etc';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        // $this->subscriber;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        // your logic 
     
        $notifications = Notify::where(['status' => 1, 'time' => date('H:i')])->get();
        foreach($notifications as $n){
            $n->notify(new NotifySubscriber($n));
        }
        

        $this->info('Notification has been sent');

    }
}
