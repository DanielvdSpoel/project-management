<?php

namespace App\Http\Livewire;

use App\Models\Task;
use Filament\Notifications\Notification;
use Livewire\Component;
use Spatie\Activitylog\Models\Activity;
use Xetaio\Mentions\Parser\MentionParser;

class TaskActivityFeed extends Component
{
    public Task $task;
    public $newComment;

    protected $rules = [
        'newComment' => 'required|min:6',
    ];

    public function render()
    {
        return view('livewire.activity-log.feed', [
            'activity' => $this->task->activities()->with('causer')->latest()->get(),
        ]);
    }

    public function reply($activityId): void
    {
        $activity = Activity::find($activityId);
        $this->newComment = '@' . $activity->causer->name . ' ' . $this->newComment;
    }

    public function comment(): void
    {
        $this->validate();

        $activity = activity()
            ->causedBy(auth()->user())
            ->performedOn($this->task)
            ->event('commented')
            ->withProperties(['comment' => $this->newComment])
            ->log('Commented on');


        $parser = new MentionParser($activity);
        $content = $parser->parse($activity->getExtraProperty('comment'));

        $activity->update(['properties' => ['comment' => $content]]);


        Notification::make()
            ->title('Comment added')
            ->success()
            ->send();
        $this->newComment = '';
    }
}
