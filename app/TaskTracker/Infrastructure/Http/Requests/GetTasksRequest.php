<?php

namespace App\TaskTracker\Infrastructure\Http\Requests;

use App\TaskTracker\Application\Queries\GetTasks\GetTasksQuery;
use App\TaskTracker\Domain\ValueObjects\TaskStatus;
use Illuminate\Foundation\Http\FormRequest;
use Ramsey\Uuid\Uuid;

class GetTasksRequest extends FormRequest
{
    public function rules() : array {
        return [
            'status' => ['nullable', 'string', 'in:todo,in_progress,done'],
            'assignId' => ['nullable'],
        ];
    }

    public function toQuery(): GetTasksQuery
    {
        return new GetTasksQuery(
            status: TaskStatus::tryFrom($this->input('status')),
            assignId: $this->has('assignId')
                ? Uuid::fromString($this->input('assignId'))
                : null
        );
    }
}