<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Task;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

class SendDeadlineReminders extends Command
{
    protected $signature = 'tasks:deadline-reminder';
    protected $description = 'Send email reminders for tasks nearing deadline';

    public function handle()
    {
        $tomorrow = Carbon::tomorrow()->toDateString();

        $tasks = Task::with('assignedUser')
            ->whereDate('deadline', $tomorrow)
            ->get();

        foreach ($tasks as $task) {

            if ($task->assignedUser && $task->assignedUser->email) {

                Mail::raw(
                    "Reminder: Your task '{$task->title}' is due tomorrow ({$task->deadline})",
                    function ($message) use ($task) {
                        $message->to($task->assignedUser->email)
                                ->subject('Task Deadline Reminder');
                    }
                );
            }
        }

        $this->info('Deadline reminder emails sent successfully.');
    }
}
