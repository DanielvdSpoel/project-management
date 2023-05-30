<?php

namespace App\Filament\Pages;

use App\Enums\TaskStatus;
use App\Models\Task;
use Filament\Pages\Page;
use Illuminate\Support\Collection;
use InvadersXX\FilamentKanbanBoard\Pages\FilamentKanbanBoard;

class TaskBoardPage extends FilamentKanbanBoard
{
    protected function getTitle(): string
    {
        return __('filament.pages.task_board.title');
    }

    protected static function getNavigationLabel(): string
    {
        return __('filament.pages.task_board.title');
    }

    protected static ?string $navigationIcon = 'heroicon-o-view-boards';

    public bool $sortable = true;
    public bool $sortableBetweenStatuses = true;

    public bool $recordClickEnabled = true;
    public bool $modalRecordClickEnabled = true;

    protected function statuses(): Collection
    {
        $values = array_column(TaskStatus::cases(), 'value');
        return collect($values)->map(function ($value) {
            return [
                'id' => $value,
                'title' => __($value),
            ];
        });
    }

    protected function records() : Collection
    {
        $tasks = Task::all()
            ->map(function (Task $task) {
                return [
                    'id' => $task->id,
                    'title' => $task->name,
                    'status' => $task->status->value
                ];
            });
        return $tasks;
    }

    protected function styles(): array
    {
        return [
            'wrapper' => 'w-full h-full flex space-x-4 overflow-x-auto',
            'kanbanWrapper' => 'h-full flex-1',
            'kanban' => 'dark:bg-gray-800 bg-white rounded px-2 flex flex-col h-full',
            'kanbanHeader' => 'p-2 text-sm font-bold text-gray-900 dark:text-gray-100',
            'kanbanFooter' => '',
            'kanbanRecords' => 'space-y-2 p-2 flex-1 overflow-y-auto',
            'record' => 'shadow g-gray-100 dark:bg-gray-900 dark:border-gray-800 p-2 rounded border',
            'recordContent' => 'w-full',
        ];
    }

}
