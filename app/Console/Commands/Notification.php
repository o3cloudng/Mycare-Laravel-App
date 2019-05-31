<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\NotifyUserController;

class Notification extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Notification:getNotification';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send Notification to users';
    private $notify;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        //$this->notify = new NotifyUserController;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        NotifyUserController::getNotification();
    }
}
