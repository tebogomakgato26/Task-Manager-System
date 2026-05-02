<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Task;
use App\Mail\TaskDeadlineMail;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

class SendTaskDeadlineReminders extends Command
{
    protected $signature = 'tasks:send-deadline-reminders';

    protected $description = 'Send email reminders for tasks nearing deadline';

    public function handle()
    {
        $tasks = Task::whereDate('deadline', Carbon::today())->get();

        foreach ($tasks as $task) {
            Mail::to($task->user->email)->send(new TaskDeadlineMail($task));
        }

        $this->info('Deadline reminder emails sent successfully.');
    }
}
