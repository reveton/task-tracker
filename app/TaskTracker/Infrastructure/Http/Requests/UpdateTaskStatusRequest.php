<?php

namespace App\TaskTracker\Infrastructure\Http\Requests;

use App\TaskTracker\Application\Commands\UpdateTaskStatus\UpdateTaskStatusCommand;
use App\TaskTracker\Domain\ValueObjects\TaskStatus;
use Illuminate\Foundation\Http\FormRequest;
use Ramsey\Uuid\Uuid;

class UpdateTaskStatusRequest extends FormRequest
{
    public function rules() : array {
        return [
            'status' => ['string', 'in:todo,in_progress,done', 'required'],
        ];
    }

    public function toCommand(): UpdateTaskStatusCommand
    {
        return new UpdateTaskStatusCommand(
            task_id: Uuid::fromString($this->route('task_id')),
            status: TaskStatus::from($this->input('status'))
        );
    }
}