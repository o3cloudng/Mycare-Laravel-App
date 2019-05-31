<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\BmiGoal;
use App\Notifications\BMIGoalNotify;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class BodyMassIndexGoal extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'goal:bmi';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Set a Body Mass Index Goal';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        Log::info('BMI Cron Job Started');
        $query   = "SELECT * FROM `bmi_goals` 
                    WHERE status = \"activate\" AND hour = HOUR(now()) AND frequency = \"daily\" 
                    OR (status = \"activate\" AND hour = HOUR(now()) AND frequency = \"weekly\" AND weekDay = DAYOFWEEK(date(now())) ) 
                    OR (status = \"activate\" AND hour = HOUR(now()) AND frequency = \"monthly\" AND monthDay = DAYOFMONTH(date(now())) )";

        $bmiGoals = BmiGoal::hydrate( DB::select($query));

        foreach($bmiGoals as $bmiGoal){
           $bmiGoal->notify(new BMIGoalNotify($bmiGoal));
        }
        Log::info('BMI Cron Job ended');
        $this->info('Body Mass Index Goal notification sent');
    }
}
