namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TaskAssignedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $task;

    public function __construct($task)
    {
        $this->task = $task;
    }

    public function build()
    {
        return $this->subject('New Task Assigned to You')
            ->view('emails.task_assigned');
    }
}
