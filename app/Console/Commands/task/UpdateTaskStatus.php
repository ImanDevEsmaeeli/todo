<?php

namespace App\Console\Commands\task;

use App\Enums\Status;
use App\Models\task\Task;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class UpdateTaskStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'task:update-status';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'check time of task and update status';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $tasks=Task::wherestatus(Status::WAITING)->get();

        foreach ($tasks as $task){
            $date=Carbon::parse($task->deadline);
           if( $date->lessThan(now())){
               Task::whereId($task->id)->update(['status'=>Status::FAILED]);
               Log::channel('task')->info("task : $task->id failed ");
           }
        }
    }
}
