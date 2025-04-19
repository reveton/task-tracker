<?php

namespace App\TaskTracker\Infrastructure\Http\Requests;

use App\TaskTracker\Application\Commands\AssignTaskToUser\AssignTaskToUserCommand;
use Illuminate\Foundation\Http\FormRequest;
use Ramsey\Uuid\Uuid;

class AssignTaskToUserRequest extends FormRequest
{
    public function rules() : array {
        return [
            'user_id' => ['uuid', 'required']
        ];
    }

    public function toCommand(): AssignTaskToUserCommand
    {
        return new AssignTaskToUserCommand(
            task_id: Uuid::fromString($this->route('task_id')),
            user_id: Uuid::fromString($this->input('user_id'))
        );
    }
}